<?php

namespace App\Http\Controllers\Backend;

use DateTime;
use DatePeriod;
use DateInterval;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Leave;
use App\Models\Project;
use App\Jobs\SendEmailJob;
use App\Models\SickReport;
use App\Models\WorkingHour;
use Illuminate\Http\Request;
use App\Models\HolidayAgenda;
use App\Mail\EmailSendingMail;
use App\Models\UserSubmitHour;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        $dateArray = getDateOfSubmitHour($user->id);


        return view('backend.register.index', compact('dateArray'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($date)
    {
        $dateCarbon = Carbon::parse($date);
        $formattedDate = $dateCarbon->format('Y-m-d');
        $user_id = Auth::user()->id;
        //// get the projects that alreay have added hours for this given date.

        // $hoursPojectIids = WorkingHour::select('project_id')->where('user_id', $user_id)->where('register_type', 'hours')
        //     ->whereDate('start_date', '<=', $formattedDate)
        //     ->whereDate('end_date', '>=', $formattedDate)
        //     ->pluck('project_id')->toArray();

        // $KMProjectIds = WorkingHour::select('project_id')->where('user_id', $user_id)->where('register_type', 'km')
        // ->whereDate('start_date', '<=', $formattedDate)
        // ->whereDate('end_date', '>=', $formattedDate)
        //     ->pluck('project_id')->toArray();

        // $HoursProjects = Project::whereNotIn('id', $hoursPojectIids)->whereHas('users', function($q) use($user_id){
        //         $q->where('user_id', $user_id);
        //     })->get();

        $HoursProjects = auth()->user()->projects;

        $KMProjects = auth()->user()->projects;

        return view('backend.register.create', ['date' => $formattedDate, 'HoursProjects' => $HoursProjects, 'KMProjects' => $KMProjects]);
    }

    /**
     * Store a newly created resource in storage.
     */
    private function convertTo24Hour($time, $amPm)
    {
        $hour = (int) $time;

        // Convert to 24-hour format
        if ($amPm == 'PM' && $hour != 12) {
            $hour += 12;
        } elseif ($amPm == 'AM' && $hour == 12) {
            $hour = 0;
        }

        return sprintf('%02d:00', $hour); // Return time in HH:00 format
    }
    public function store(Request $request)
    {
        $user = Auth::user();
        if($request->register_type == "km")
        {
            $validator = Validator::make($request->all(), [
                'start_date' => 'required|date',
                'project' => 'required',
                'kilometer' => 'required',
            ]);

            $validator->after(function ($validator) use ($request) {
                $existingProjectsCheck = WorkingHour::where('start_date', $request->start_date)->where('register_type', $request->register_type)->where('project_id', $request->project)->where('user_id', auth()->user()->id)->first();
                $start = Carbon::parse($request->start_date);

                if ($start->isWeekend()) {
                    $validator->errors()->add('start_date', 'The start date must not be on a weekend.');
                }
                if ($existingProjectsCheck) {
                    $validator->errors()->add('project', 'The project is already registered for this date.');
                }

            });

            $validator->sometimes('end_date', 'required|date|after_or_equal:start_date', function ($input) {
                return $input->dateOption === 'multipleDays';
            });
        }
        else
        {
            if($request->kind == "working_hours")
            {
                $type = 'working_hour';
            }
            else
            {
                $type = 'overtime';
            }
            $validator = Validator::make($request->all(), [
                'kind' => 'required',
                'start_date' => 'required',
                'project' => 'required',
                $type => 'required',
                'start_time' => 'required',
                'end_time' => 'required',
                'hour' => 'required',

            ]);

            $validator->after(function ($validator) use ($request) {
                $start = Carbon::parse($request->start_date);
                $existingProjectsCheck = WorkingHour::where('start_date', $request->start_date)->where('register_type', $request->register_type)->where('project_id', $request->project)->where('user_id', auth()->user()->id)->first();

                if ($start->isWeekend()) {
                    $validator->errors()->add('start_date', 'The start date must not be on a weekend.');
                }
                if ($existingProjectsCheck) {
                    $validator->errors()->add('project', 'The project is already registered for this date.');
                }
            });

            $validator->sometimes('end_date', 'required|date|after_or_equal:start_date', function ($input) {
                return $input->dateOption === 'multipleDays';
            });
        }
        if ($validator->fails()) {
            return response()->json([
                'status' => JsonResponse::HTTP_UNPROCESSABLE_ENTITY,
                'message' => $validator->errors()->first(),
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            if($request->dateOption == "oneDay")
            {
                $end_date = $request->start_date;
            }
            else{
                $end_date = $request->end_date;
            }
            DB::beginTransaction();
            $admin = User::role('admin')->first();
            $project = Project::find($request->project);
            if($request->register_type == "km")
            {
                $working_hour = WorkingHour::create([
                    'user_id' => $user->id,
                    'register_type' => $request->register_type,
                    'start_date' => $request->start_date,
                    'end_date' => $end_date,
                    'project_id' => $request->project,
                    'kilometer' => $request->kilometer,
                ]);
                $subject = "Kilometer Added";
                $message = '<p>Dear Admin,</p>'
                .'<p>Hierbij ontvangt u mijn ingediende uren: </p>'

                .'<p>Project Name: '.$project->name.'<p>'
                .'<p>Kilometer: '.$request->kilometer.'<p>'
                .'<p>Met vriendelijke groet, <br>'.$user->first_name.' '.$user->last_name. '</p>';
            }
            else{
                $startTime = $this->convertTo24Hour($request->start_time, $request->start_am_pm);
                 $endTime = $this->convertTo24Hour($request->end_time, $request->end_am_pm);
                //  dd($startTime,$endTime);
                $working_hour = WorkingHour::create([
                    'user_id' => $user->id,
                    'register_type' => $request->register_type,
                    'start_date' => $request->start_date,
                    'end_date' => $end_date,
                    'project_id' => $request->project,
                    'working_kind' => $request->kind,
                    'type' => $request->{$type},
                    'hours' => $request->hour,
                    'start_time' => $startTime,
                    'end_time' => $endTime,
                    'break_duration' => $request->break_duration,
                ]);
                $subject = "Work Hours Added";
                $message = '<p>Dear Admin,</p>'
                .'<p>Hierbij ontvangt u mijn ingediende uren:</p>'

                .'<p>Project: '.$project->name.'<p>'
                .'<p>Uren: '.$request->hour.'<p>'
                .'<p>Met vriendelijke groet, <br>'.$user->first_name.' '.$user->last_name. '</p>';
            }

            DB::commit();

            /// sending email to admin.

            // Mail::to($admin->email)->send(new EmailSendingMail($subject, $message));
            // SendEmailJob::dispatch($admin->email, $subject, $message);

            return response()->json([
                'success' => JsonResponse::HTTP_OK,
                'message' => 'Working hour created successfully.',
            ], JsonResponse::HTTP_OK);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => JsonResponse::HTTP_INTERNAL_SERVER_ERROR,
                'message' => $e->getMessage(),
            ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $user = Auth::user();
        $data = explode("_", $id);
        $id = $data[0];

        if($data[2] == 1)
        {
            $type = "hours";
        }
        elseif($data[2] == 2)
        {
            $type = "km";
        }

        $workingHours = WorkingHour::findOrFail($id);

        $dateCarbon = Carbon::parse($data[1]);
        // $formattedDate = $dateCarbon->format('Y-m-d');

        // $projectIids = WorkingHour::select('project_id')->where('user_id', $user->id)->where('register_type', $type)
        //     ->whereDate('start_date', '<=', $formattedDate)
        //     ->whereDate('end_date', '>=', $formattedDate)
        //     ->pluck('project_id')->toArray();

        // $filteredProjectIids = array_filter($projectIids, function($projectId) use ($workingHours) {
        //     return $projectId != $workingHours->project_id;
        // });


        $projects = auth()->user()->projects;

        $working_hour = WorkingHour::findOrFail($id);
        return view('backend.register.modal', compact('working_hour', 'projects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request);
        if($request->type == "hours")
        {
            $validator = Validator::make($request->all(), [
                'project' => 'required',
                'start_time' => 'required',
                'end_time' => 'required',
                'hour' => 'required',
            ]);
        }
        elseif($request->type == "km")
        {
            $validator = Validator::make($request->all(), [
                'project' => 'required',
                'kilometer' => 'required',
            ]);
        }
        if ($validator->fails()) {
            return response()->json([
                'status' => JsonResponse::HTTP_UNPROCESSABLE_ENTITY,
                'message' => $validator->errors()->first(),
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $working_hour = WorkingHour::findOrFail($id);
            $startTime = $this->convertTo24Hour($request->start_time, $request->start_am_pm);
            $endTime = $this->convertTo24Hour($request->end_time, $request->end_am_pm);
            $working_hour->update([
                // 'project_id' => $request->project,
                'break_duration' => isset($request->break_duration) ? $request->break_duration : NULL,  // Added break_duration
               'start_time' => $startTime ?? NULL,  // Convert and set start_time or NULL
                'end_time' => $endTime ?? NULL,  // Convert and set end_time or NULL
                'hours' => isset($request->hour) ? $request->hour : NULL,
                'kilometer' => isset($request->kilometer) ? $request->kilometer : NULL,
            ]);

            return response()->json([
                'success' => JsonResponse::HTTP_OK,
                'message' => 'Record updated successfully.',
            ], JsonResponse::HTTP_OK);

        } catch (\Exception $e) {
            return response()->json([
                'status' => JsonResponse::HTTP_INTERNAL_SERVER_ERROR,
                'message' => $e->getMessage(),
            ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $workHour = WorkingHour::findOrFail($id);
            $workHour->delete();
            return response()->json([
                'success' => JsonResponse::HTTP_OK,
                'message' => 'Hour deleted successfully'
            ], JsonResponse::HTTP_OK);
        } catch (\Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage()
            ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function fetchRecords(Request $request)
    {
        $user = Auth::user();
        $date = $request->query('date');
        /// first check current date is holiday or not
        $formattedDate = date("Y-m-d", strtotime($date));
        $dateTime = new DateTime($date);
        $datevalue = $dateTime->format('l, F j');

        // check date is weekend date
        $dateTime = Carbon::parse($date);

        if ($dateTime->isWeekend()) {
            $result = [
                'type' => 'no_record',

            ];
            return response()->json($result);
        }

        /// check holiday
        $isHoliday = HolidayAgenda::select('id', 'start_date', 'end_date', 'detail')
        ->whereDate('start_date', '<=', $formattedDate)
        ->whereDate('end_date', '>=', $formattedDate)
        ->first();
        if($isHoliday != Null)
        {
            $result = [
                'date' => $datevalue,
                'reason' => $isHoliday->detail,
                'type' => 'holiday',
                'status' => '',

            ];
            return response()->json($result);
        }
        else
        {
            $leaves = Leave::select('id', 'start_date', 'end_date', 'reason', 'status')
            ->where('applied_by', $user->id) // Filter by user ID
            ->whereDate('start_date', '<=', $formattedDate)
            ->whereDate('end_date', '>=', $formattedDate)
            ->orderBY('id', 'DESC')
            ->first();

            $workingHour = WorkingHour::where('user_id', $user->id)
                ->whereDate('start_date', '<=', $formattedDate)->whereDate('end_date', '>=', $formattedDate)
                ->exists();
            if($workingHour == true)
            {
                $leaves = NULL;
            }
            else
            {
                if(!empty($leaves) && $leaves->status == 'cancelled')
                {
                    $sickRecord = SickReport::where('applied_by', $user->id)
                    ->where('status', '!=', 'cancelled')->where('sending_date', $request->query('date'))
                    ->exists();
                    if($sickRecord == true)
                    {
                        $leaves = NULL;
                    }
                }
            }

            if($leaves !== NULL)
            {
                $result = [
                    'date' => $datevalue,
                    'reason' => $leaves->reason,
                    'type' => 'leave',
                    'status' => $leaves->status,
                ];
                return response()->json($result);

            } else {
                /// check sick leave
                $sicks = SickReport::select('sending_date','reason', 'status')->where('applied_by', $user->id)
                ->where('sending_date', $formattedDate)->orderBY('id', 'DESC')->first();
                //dd($sicks);
                $workingHour = WorkingHour::where('user_id', $user->id)
                ->whereDate('start_date', '<=', $formattedDate)->whereDate('end_date', '>=', $formattedDate)
                ->exists();
                if($workingHour == true)
                {
                    $sicks = NULL;
                }
                if($sicks !== NULL)
                {
                    $result = [
                        'date' => $datevalue,
                        'reason' => $sicks->reason,
                        'type' => 'sick',
                        'status' => $sicks->status,
                    ];
                    return response()->json($result);
                } else {

                    // $records = WorkingHour::select('project_id', 'id', 'hours', 'kilometer', 'register_type')
                    // ->with('project')->where('user_id', $user->id)
                    // ->whereDate('start_date', '<=', $formattedDate)
                    // ->whereDate('end_date', '>=', $formattedDate)
                    // ->whereIn('register_type', ['hours', 'km'])
                    // ->groupBy('project_id', 'id', 'hours', 'kilometer', 'register_type')
                    // ->get();

                    $records = WorkingHour::with('project')->where('user_id', $user->id)
                    ->whereDate('start_date', '<=', $formattedDate)
                    ->whereDate('end_date', '>=', $formattedDate)->get();


                    // if(!$records->isEmpty())
                    // {
                    //     $projects = [];
                    //     foreach ($records as $record)
                    //     {
                    //         $projectId = $record->project_id;
                    //         if (!isset($projects[$projectId]) && $record->register_type == "hours" && $record->hours != NULL)
                    //         {
                    //             // If project_id does not exist in $projects array, initialize it
                    //             $projects[$projectId] = [
                    //                 'id' => $record->id,
                    //                 'date' => $datevalue,
                    //                 'project_id' => $projectId,
                    //                 'project_name' => $record->project->name,
                    //                 'hours' => $record->hours,
                    //                 'type' => 'hour',
                    //                 'other_values' => []
                    //             ];
                    //         }
                    //         else
                    //         {
                    //             // Add other values to the existing project_id entry
                    //             $projects[$projectId]['other_values'][] = [
                    //                 'km_id' => $record->id,
                    //                 'project_name' => $record->project->name,
                    //                 'kilometer' => $record->kilometer
                    //                 // Add more fields as needed
                    //             ];
                    //         }
                    //     }

                    //     $hours = [
                    //         'hours' => $projects,
                    //     ];

                    //     return response()->json($hours);
                    // }


                    if(!$records->isEmpty())
                    {
                        $hours = [
                                'hours' => $records,
                            ];
                        return response()->json($hours);
                    }
                    else
                    {
                        $result = [
                            'type' => 'no_record',

                        ];
                        return response()->json($result);
                    }
                }
            }
        }
    }





    public function fetchDates()
    {
        $user_id = Auth::user()->id;
        $working_hours = WorkingHour::select('project_id', 'start_date', 'end_date')->where('user_id', $user_id)
        ->groupBy('project_id', 'start_date', 'end_date')
        ->get();

        /// hours
        //  /// get pending leaves dates.
        //$working_hours = WorkingHour::where('user_id', $user_id)->get();
        $hourRegisteredDates = [];
        foreach ($working_hours as $hour) {
            $period = Carbon::parse($hour->start_date)->daysUntil(Carbon::parse($hour->end_date));
            foreach ($period as $date) {
                if (!$date->isWeekend()) {
                    $hourRegisteredDates[] = $date->toDateString();
                }
            }
        }



        $holidays = HolidayAgenda::all();

        // Generate the individual dates within each holiday period
        $holidayDates = [];
        foreach ($holidays as $holiday) {
            $period = Carbon::parse($holiday->start_date)->daysUntil(Carbon::parse($holiday->end_date));
            foreach ($period as $date) {
                if (!$date->isWeekend()) {
                    $holidayDates[] = $date->toDateString();
                }
            }
        }

        $pendingLeaves = Leave::where('applied_by', $user_id)->where('status', 'pending')->get();
        $approvedLeaves = Leave::where('applied_by', $user_id)->where('status', 'approved')->get();
        $cancelledLeaves = Leave::where('applied_by', $user_id)->where('status', 'cancelled')->get();

        $leaveDateArray = [];
        if($cancelledLeaves)
        {
            foreach($cancelledLeaves as $leave)
            {
                $start_date = $leave->start_date;
                $end_date = $leave->end_date;
                $dates = getDatesBetweenTwoDates($start_date, $end_date);

                foreach ($dates as $date)
                {
                    //$startDate = Carbon::parse($leave->start_date)->format('Y-m-d');
                    //$endDate = Carbon::parse($leave->end_date)->format('Y-m-d');
                    $sickRecord = SickReport::where('applied_by', $user_id)->where('sending_date', $date)
                    ->where('status', '!=', 'cancelled')
                    ->exists();

                    if($sickRecord == true)
                    {
                        $leaveDateArray[] = $date;
                    }
                }
            }
            //dd($leaveDateArray);
        }

        //  /// get pending leaves dates.
        $leavePendingDates = [];
        foreach ($pendingLeaves as $pending) {
            $period = Carbon::parse($pending->start_date)->daysUntil(Carbon::parse($pending->end_date));

            foreach ($period as $date) {
                if (!$date->isWeekend()) {
                    $leavePendingDates[] = $date->toDateString();
                }
            }
        }
        //  /// get approved leaves dates.

        $leaveApprovedDates = [];
        foreach ($approvedLeaves as $approved) {
            $period = Carbon::parse($approved->start_date)->daysUntil(Carbon::parse($approved->end_date));
            foreach ($period as $date) {
                if (!$date->isWeekend()) {
                    $leaveApprovedDates[] = $date->toDateString();
                }
            }
        }

        //  /// get pending leaves dates.
        $leaveCancelledDates = [];
        foreach ($cancelledLeaves as $cancelled) {
            $period = Carbon::parse($cancelled->start_date)->daysUntil(Carbon::parse($cancelled->end_date));
            foreach ($period as $date) {
                if (!$date->isWeekend()) {
                    $current_date = $date->toDateString();

                    if (!collect($leaveDateArray)->contains($current_date)) {
                        $leaveCancelledDates[] = $date->toDateString();
                    }
                }
            }
        }

        $leaveCancelledDates = array_unique($leaveCancelledDates);

        $approvedSick = SickReport::where('status', 'approved')->where('applied_by', $user_id)->get();
        $pendingSick = SickReport::where('status', 'pending')->where('applied_by', $user_id)->get();
        $cancelledSick = SickReport::where('status', 'cancelled')->where('applied_by', $user_id)->get();

        $sickDateArray = [];
        if($cancelledSick)
        {
            foreach($cancelledSick as $sick)
            {
                $leaveRecord = Leave::where('applied_by', $user_id)->whereDate('start_date', '<=', $sick->sending_date)
                ->whereDate('end_date', '>=', $sick->sending_date)
                ->exists();
                if($leaveRecord == true)
                {
                    $sickDateArray[] = $sick->sending_date;
                }
            }
        }

        /// get cancelled sick leaves dates.
        $cancelledSickDates = [];
        foreach ($cancelledSick as $cancelled) {
            $date = $cancelled->sending_date;
            $val = Carbon::parse($date);
            if (!$val->isWeekend())
            {
                /// check if sending_date  not exist in sickdatearray then in cancelledSickDates.
                if (!collect($sickDateArray)->contains($cancelled->sending_date)) {
                    $cancelledSickDates[] = $cancelled->sending_date;
                }
            }
        }
        $cancelledSickDates = array_unique($cancelledSickDates);


        /// get pending  sick leaves dates.
        $pendingSickDates = [];
        foreach ($pendingSick as $pending) {
            $date = $pending->sending_date;
            $val = Carbon::parse($date);
            if (!$val->isWeekend()) {
                $pendingSickDates[] = $pending->sending_date;
            }
        }
        /// get approved sick leaves dates.
        $approvedSickDates = [];
        foreach ($approvedSick as $approved) {
            $date = $approved->sending_date;
            $val = Carbon::parse($date);
            if (!$val->isWeekend()) {
                $approvedSickDates[] = $approved->sending_date;
            }
        }


        $remainingLeaveCancelledDates = array_diff($leaveCancelledDates, $holidayDates);
        $remainingLeavePendingDates = array_diff($leavePendingDates, $holidayDates);
        $remainingLeaveApprovedDates = array_diff($leaveApprovedDates, $holidayDates);
        $remainingSickCancelledDates = array_diff($cancelledSickDates, $holidayDates);
        $remainingApprovedSickDates = array_diff($approvedSickDates, $holidayDates);
        $remainingHourRegisteredDates = array_diff($hourRegisteredDates, $holidayDates);


        $remainingLeavePendingDates = array_diff($remainingLeavePendingDates, $remainingHourRegisteredDates);
        $remainingLeaveApprovedDates = array_diff($remainingLeaveApprovedDates, $remainingHourRegisteredDates);
        $remainingLeaveCancelledDates = array_diff($remainingLeaveCancelledDates, $remainingHourRegisteredDates);
        $remainingSickCancelledDates = array_diff($remainingSickCancelledDates, $remainingHourRegisteredDates);
        $pendingSickDates = array_diff($pendingSickDates, $remainingHourRegisteredDates);
        $remainingApprovedSickDates = array_diff($remainingApprovedSickDates, $remainingHourRegisteredDates);


        $remainingSickCancelledDates = array_diff($remainingSickCancelledDates, $pendingSickDates);
        $remainingSickCancelledDates = array_diff($remainingSickCancelledDates, $remainingApprovedSickDates);

        $remainingLeaveCancelledDates = array_diff($remainingLeaveCancelledDates, $remainingLeavePendingDates);
        $remainingLeaveCancelledDates = array_diff($remainingLeaveCancelledDates, $remainingLeaveApprovedDates);

        // Example response, replace with your actual data fetching logic
        $dates = [
            'hours' => array_values($remainingHourRegisteredDates),
            'holidays' => array_values($holidayDates),
            'pendingLeaves' => array_values($remainingLeavePendingDates),
            'approvedLeaves' => array_values($remainingLeaveApprovedDates),
            'cancelledLeaves' => array_values($remainingLeaveCancelledDates),
            'cancelledSickLeaves' => array_values($remainingSickCancelledDates),
            'pendingSickLeaves' => array_values($pendingSickDates),
            'approvedSickLeaves' => array_values($remainingApprovedSickDates),
        ];

        return response()->json($dates);
    }

    public function requestSubmitHour()
    {
        $user = Auth::user();
        $currentMonthYear = date('Y-m-d');

        try {
            DB::beginTransaction();
            $project = UserSubmitHour::create([
                'user_id' => $user->id,
                'submit_date' => $currentMonthYear,
            ]);
            $admin = User::role('admin')->first();

            $subject = "Hours Submitted";
            $message = '<p>Dear Admin,</p>'
                . '<p>Ik heb zojuist mijn uren ingediend </p>'

                . '<p>Met vriendelijke groet, <br>' . $user->first_name . ' ' . $user->last_name . '</p>';

            /// sending email to admin.
            Mail::to($admin->email)->send(new EmailSendingMail($subject, $message));

            DB::commit();
            return response()->json([
                'success' => JsonResponse::HTTP_OK,
                'message' => 'Submit hours successfully.',
                'redirect_url' => route('dashboard'),
            ], JsonResponse::HTTP_OK);

            return response()->json([
                'success' => JsonResponse::HTTP_OK,
                'message' => 'Submit hours successfully.',
            ], JsonResponse::HTTP_OK);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => JsonResponse::HTTP_INTERNAL_SERVER_ERROR,
                'message' => $e->getMessage(),
            ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
