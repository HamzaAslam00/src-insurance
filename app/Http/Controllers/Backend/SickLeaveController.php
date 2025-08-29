<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Leave;
use App\Jobs\SendEmailJob;
use App\Models\SickReport;
use Illuminate\Http\Request;
use App\Models\HolidayAgenda;
use App\Mail\EmailSendingMail;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;

class SickLeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.sick_report.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sick = SickReport::findOrFail($id);
        if ($sick) {
            return response()->json(['success' => true, 'data' => $sick]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();
    
            $sick = SickReport::findOrFail($id);
            if (Carbon::parse($sick->sending_date)->isToday()) {
                $user = User::findOrFail($sick->applied_by);
                $user->call_in_better = true;
                $user->save();
            }
            $sick->delete();

            DB::commit();
            return response()->json([
                'success' => JsonResponse::HTTP_OK,
                'message' => 'Sick leave deleted successfully'
            ], JsonResponse::HTTP_OK);
        } catch (\Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage()
            ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    
    public function requestSickLeave(Request $request)
    {
        $user = Auth::user();
        $sickDate = date('Y-m-d');
        
        if (!Carbon::parse($sickDate)->isWeekend()) {
            $leaveRecord = Leave::where('applied_by', $user->id)->whereDate('start_date', '<=', $sickDate)
            ->whereDate('end_date', '>=', $sickDate)->where('status', '!=', 'cancelled')
            ->exists();
            
            if($leaveRecord == false)
            {
                //// check holiday 
                $holiday = HolidayAgenda::where('start_date', '<=', $sickDate)
                ->where('end_date', '>=', $sickDate)
                ->exists();

                if($holiday == false)
                {
                    //// check alreay applied leave with approved and pinding status.
                    
                    $report =  SickReport::where('sending_date', $sickDate)->where('applied_by', $user->id)->where('status', 'pending')
                    ->orWhere('status', 'approved')->exists();
                    
                    if($report == false)
                    {
                        $admin = User::role('admin')->first();
                        $body = $request->reason;
                        SickReport::create([
                            'applied_by' => $user->id,
                            'sending_date' => date('Y-m-d'),
                            'reason' => $body,
                            'status' => 'pending',
                        ]);
                        $date = date('Y-m-d');
                        $currentDateTime = Carbon::now();
                        $modifiedDateTime = $currentDateTime->addHours(12);

                        $call_in_better_time = $modifiedDateTime->format('Y-m-d H:i:s');

                        $user->update([
                            'call_in_better' => 0,
                            'call_in_better_time' => $call_in_better_time,
                        ]);
                        $subject = "Sick Leave Request";
                        $message = '<p>Dear Admin,</p>'
                        .'<p>Hierbij ontvangt u mijn ingediende ziekteaanvraag.</p>'
        
                            .'<p><strong> Dag en datum: </strong>'.$date.'</p>'
                            
                            .'<p><strong>Reden: </strong>'.$request->reason.' </p>'
                            
                            .'<p>Met vriendelijke groet, <br>'.$user->first_name.' '.$user->last_name. '</p>';
                        // .'<p>I hope this message finds you well. I am writing to formally request sick leave for the following date:</p>'
        
                        //     .'<p><strong> Date:</strong>'.$date.'</p>'
                            
                        //     .'<p><strong>Reason for Sick Leave:</strong>'.$request->reason.' </p>'
                            
                        //     .'<p>Best regards,<br>'.$user->first_name.' '.$user->last_name. '</p>';

                        /// sending email to admin.
                        Mail::to($admin->email)->send(new EmailSendingMail($subject, $message));
                        // SendEmailJob::dispatch($admin->email, $subject, $message);

                        return response()->json([
                            'success' => JsonResponse::HTTP_OK,
                            'message' => 'Sick leave applied successfully.',
                            'redirect_url' => route('sick-leave.index'),
                        ], JsonResponse::HTTP_OK);

                        //return response()->json(['success' => true]);
                    }
                    else
                    {
                        return response()->json([
                            'error' => 'record exist',
                            'message' => 'Sick leave already exists.',
                        ], 404);

                    }
                }else {
                    return response()->json([
                        'error' => 'record exist',
                        'message' => 'Your sick leave date coincides with a holiday period. No need to apply.'
                    ], 404);
                }
            }else {
                return response()->json([
                    'error' => 'record exist',
                    'message' => 'A Leave request already created for same date.'
                ], 404);
            }
        }else {
            return response()->json([
                'error' => 'Weekend',
                'message' => 'You cannot apply for sick leave on weekend.'
            ], 404);
        }
    }


    public function datatable(Request $request)
    {
        $user = Auth::user();
        
        if($user->user_type == "employee")
        {
            $sick_leaves = SickReport::with('appliedByUser')->where('applied_by', $user->id)->get();
        }
        else
        {
            $sick_leaves = SickReport::with('appliedByUser')->get();
        }
        return Datatables::of($sick_leaves)
            ->addColumn('actions', function ($record) {
                $actions = '';
            if (auth()->user()->hasPermissionTo('approve_sick_leave')) {
                $actions = '<div class="btn-list">';
                $disabled = $record->status !== 'pending' ? 'disabled' : '';
                if(auth()->user()->hasRole('admin'))
                {
                    $actions .= '<button type="button" class="btn btn-sm btn-success" onclick="updateStatus(' . $record->id . ', \'approved\')" ' . $disabled . '>
                            <span class="fe fe-check-circle"> </span>
                                </button>';
                    $actions .= '<button type="button" class="btn btn-sm btn-danger" onclick="updateStatus(' . $record->id . ', \'cancelled\')" ' . $disabled . '>
                            <span class="fe fe-x-circle"> </span>
                                </button>';
                   
                }
                else
                {
                    if($record->status == 'pending')
                    {
                        $actions .= '<button type="button" class="btn btn-sm btn-danger delete" data-url="' . route('sick-leave.destroy', $record->id) . '" data-method="get" data-table="#sick_datatable">
                            <span class="fe fe-trash-2"> </span>
                            </button>';
                    }
                }
                $actions .= '<button type="button" class="btn btn-sm btn-primary" onclick="showDetails(' . $record->id . ')">
                <span class="fe fe-eye"> </span>
                    </button>';
        $actions .= '</div>';
            }
            return $actions;   
            })
            ->addColumn('name', function ($record) {
                return getFullName($record->appliedByUser);
            })
            ->addColumn('date', function ($record) {
                return Carbon::parse($record->sending_date)->format('Y-m-d');
            })
            ->addColumn('reason', function ($record) {
                return addEllipsis($record->reason);
            })
            ->addColumn('status', function ($record) {
                return '<span class="badge bg-' . statusClasses($record->status) . '">' . ucfirst($record->status) . '</span>';
            })
            ->rawColumns(['name','date', 'reason', 'status', 'actions'])
            ->addIndexColumn()->make(true);
    }

    public function updateStatus(Request $request)
    {
        $sick = SickReport::find($request->id);
        $user = User::find($sick->applied_by);

        if ($sick) {
            $sick->status = $request->status;
            $sick->save();
            // /// When update status then sending email to respective user.
            // $subject = 'Sick Leavr Status Update';
            // $body = '<p> We are pleased to inform you that your sick leave status has been updated from <strong>'.$sick->status.'</strong> to <strong>'.$request->status.'<strong> </p>';
            // SendEmailJob::dispatch($user->email, $subject, $body);
            
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }


}
