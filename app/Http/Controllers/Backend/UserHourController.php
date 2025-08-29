<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Project;
use App\Models\WorkingHour;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class UserHourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        return view('backend.user-hours.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($user_id)
    {
        $currentDate = date('Y-m-d');
        $user = User::with('projects')->find($user_id);
        //// get the projects that alreay have added hours for this given date.

        // $hoursPojectIids = WorkingHour::select('project_id')->where('user_id', $user_id)->where('register_type', 'hours')
        //     ->whereDate('start_date', '<=', $currentDate)
        //     ->whereDate('end_date', '>=', $currentDate)
        //     ->pluck('project_id')->toArray();

        // $KMProjectIds = WorkingHour::select('project_id')->where('user_id', $user_id)->where('register_type', 'km')
        // ->whereDate('start_date', '<=', $currentDate)
        // ->whereDate('end_date', '>=', $currentDate)
        //     ->pluck('project_id')->toArray();

        // $HoursProjects = Project::whereNotIn('id', $hoursPojectIids)->whereHas('users', function($q) use($user_id){
        //         $q->where('user_id', $user_id);
        //     })->get();
        $HoursProjects = $user->projects;

        $KMProjects = $user->projects;

        return view('backend.user-hours.create-modal', ['date' =>$currentDate, 'user_id' => $user_id, 'HoursProjects' => $HoursProjects, 'KMProjects' => $KMProjects]);

    }
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
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $user_id)
    {
        if($request->register_type == "km")
        {
            $validator = Validator::make($request->all(), [
                'start_date' => 'required|date',
                'project' => 'required',
                'kilometer' => 'required',
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
            if($request->register_type == "km")
            {
                $working_hour = WorkingHour::create([
                    'user_id' => $user_id,
                    'register_type' => $request->register_type,
                    'start_date' => $request->start_date,
                    'end_date' => $end_date,
                    'project_id' => $request->project,
                    'kilometer' => $request->kilometer,
                ]);
            }
            else{ $startTime = $this->convertTo24Hour($request->start_time, $request->start_am_pm);
                $endTime = $this->convertTo24Hour($request->end_time, $request->end_am_pm);
                $working_hour = WorkingHour::create([
                    'user_id' => $user_id,
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
            }

            DB::commit();
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
    public function edit(string $user_id, $id)
    {
        $workingHours = WorkingHour::findOrFail($id);
        $user = User::with('projects')->find($user_id);
        // $formattedDate =  Carbon::parse($workingHours->start_date);

        // $projectIids = WorkingHour::select('project_id')->where('user_id', $user_id)->where('register_type', $workingHours->register_type)
        // ->whereDate('start_date', '<=', $formattedDate)
        // ->whereDate('end_date', '>=', $formattedDate)
        // ->pluck('project_id')->toArray();

        // $filteredProjectIids = array_filter($projectIids, function($projectId) use ($workingHours) {
        //     return $projectId != $workingHours->project_id;
        // });

        $projects = $user->projects;

        return view('backend.user-hours.modal', compact('workingHours', 'projects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $user_id, $id)
    {
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
                'end_time' => $endTime ?? NULL,
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
    public function destroy(string $user, $id)
    {
        try {
            $work = WorkingHour::findOrFail($id);
            if($work->register_type == "hours")
            {
                $val = "Hour";
            }
            else
            {
                $val = "Kilometer";
            }
            $work->delete();
            return response()->json([
                'success' => JsonResponse::HTTP_OK,
                'message' =>  $val.' deleted successfully'
            ], JsonResponse::HTTP_OK);
        } catch (\Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage()
            ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function dataTable(Request $request, $user_id)
    {
        $date = $request->date;
        $hoursQuery = WorkingHour::with('project', 'user')->where('user_id', $user_id)->where('register_type', 'hours');

        if ($date) {
            $selectedDate = Carbon::createFromFormat('F Y', $date);
            $hoursQuery->whereMonth('start_date', $selectedDate->month)->whereYear('start_date', $selectedDate->year);
        }

        $hours = $hoursQuery->get();

        return Datatables::of($hours)
            ->addColumn('actions', function ($record) {
                $actions = '';
                if (auth()->user()->hasPermissionTo('edit_user') || auth()->user()->hasPermissionTo('delete_user')) {
                    $actions = '<div class="btn-list">';
                    if (auth()->user()->hasPermissionTo('edit_user')) {
                        $actions .= '<a data-act="ajax-modal" data-action-url="' . route('user.hours.edit', [$record->user_id, $record->id]) . '" data-title="' . __('messages.edit_hour') . '" class="btn btn-sm btn-primary">
                                        <span class="fe fe-edit"> </span>
                                    </a>';
                        $actions .= '<button type="button" class="btn btn-sm btn-danger delete" data-url="' . route('user.hours.destroy', [$record->user_id, $record->id]) . '" data-method="get" data-table="#user_hour_datatable">
                        <span class="fe fe-trash-2"> </span>
                        </button>';
                    }

                    $actions .= '</div>';
                }
                return $actions;
            })
            ->addColumn('project_name', function ($record) {
                return $record->project->name;
            })
            ->addColumn('start_date', function ($record) {
                return Carbon::parse($record->start_date)->toDateString();
            })
            ->addColumn('end_date', function ($record) {
                return Carbon::parse($record->end_date)->toDateString();
            })
            ->addColumn('hours', function($record) {
                return $record->hours;
            })
            ->rawColumns(['actions', 'project_name', 'start_date', 'end_date', 'hours'])
            ->addIndexColumn()->make(true);
    }

    public function kilometerDataTable(Request $request, $user_id)
    {
        $date = $request->date;
        $kmsQuery = WorkingHour::with('project', 'user')->where('user_id', $user_id)->where('register_type', 'km');

        if ($date) {
            $selectedDate = Carbon::createFromFormat('F Y', $date);
            $kmsQuery->whereMonth('start_date', $selectedDate->month)->whereYear('start_date', $selectedDate->year);
        }

        $kms = $kmsQuery->get();

        return Datatables::of($kms)
            ->addColumn('actions', function ($record) {
                $actions = '';
                if (auth()->user()->hasPermissionTo('edit_user') || auth()->user()->hasPermissionTo('delete_user')) {
                    $actions = '<div class="btn-list">';
                    if (auth()->user()->hasPermissionTo('edit_user')) {
                        $actions .= '<a data-act="ajax-modal" data-action-url="' . route('user.hours.edit', [$record->user_id, $record->id]) . '" data-title="Edit Kilometer" class="btn btn-sm btn-primary">
                                        <span class="fe fe-edit"> </span>
                                    </a>';
                        $actions .= '<button type="button" class="btn btn-sm btn-danger delete" data-url="' . route('user.hours.destroy', [$record->user_id, $record->id]) . '" data-method="get" data-table="#user_km_datatable">
                            <span class="fe fe-trash-2"> </span>
                            </button>';
                    }

                    $actions .= '</div>';
                }
                return $actions;
            })
            ->addColumn('project_name', function ($record) {
                return $record->project->name;
            })
            ->addColumn('start_date', function($record) {
                return Carbon::parse($record->start_date)->toDateString();
            })
            ->addColumn('end_date', function($record) {
                return Carbon::parse($record->end_date)->toDateString();
            })
            ->addColumn('kilometer', function($record) {
                return $record->kilometer;
            })
            ->rawColumns(['actions', 'project_name', 'start_date', 'end_date', 'kilometer'])
            ->addIndexColumn()->make(true);
        }
    }
