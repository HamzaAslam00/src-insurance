<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Leave;
use App\Models\SickReport;
use Illuminate\Http\Request;
use App\Mail\EmailSendingMail;
use App\Mail\GetASickReportMail;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($status)
    {
        return view('backend.leaves.index', compact('status'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.leaves.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'start_date' => ['required', 'date', 'after_or_equal:today'],
            'end_date' => ['required', 'date', 'after_or_equal:start_date'],
            'reason' => 'required|string',
            'detail' => 'nullable|string',
            'applied_by' => 'required|exists:users,id',
            'approved_by' => 'nullable|exists:users,id',
            'document' => 'nullable|file',
            'day_type' => ['required_if:start_date,end_date', 'in:Full Day,Half Day'],
        ]);
        $validatedData = $validator->validated();
        $startDate = Carbon::parse($request->start_date)->format('Y-m-d');
        $endDate = Carbon::parse($request->end_date)->format('Y-m-d');
        if ($startDate === $endDate) {
            if (!$request->has('day_type')) {
                return response()->json([
                    'error' => 'day_type_required',
                    'message' => 'Day type is required .',
                ], 422);
            }
            $validatedData['day_type'] = $request->day_type; // Use the selected day_type
        } else {
            // If dates are different, set the default value
            $validatedData['day_type'] = 'Full Day';
        }
        if ($validator->fails()) {
            return response()->json([
                'status' => JsonResponse::HTTP_UNPROCESSABLE_ENTITY,
                'message' => $validator->errors()->first(),
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        }
        $validatedData = $validator->validated();

        $startDate = Carbon::parse($request->start_date)->format('Y-m-d');
        $endDate = Carbon::parse($request->end_date)->format('Y-m-d');

        $leaveRecord = Leave::where('applied_by', $request->applied_by)
            ->where(function ($query) use ($startDate, $endDate) {
                $query->where(function ($query) use ($startDate, $endDate) {
                    $query->whereDate('start_date', '<=', $endDate)
                        ->whereDate('end_date', '>=', $startDate);
                });
            })
            ->where(function ($query) {
                $query->where('status', 'pending')
                    ->orWhere('status', 'approved');
            })
            ->exists();

        if ($leaveRecord == true) {
            return response()->json([
                'error' => 'record exist',
                'message' => 'Leave application already exist between these dates.',
            ], 404);
        }

        $dates = getDatesBetweenTwoDates($startDate, $endDate);

        foreach ($dates as $dateVal) {
            $sickRecord = SickReport::where('applied_by', $request->applied_by)->where('sending_date', $dateVal)
                ->where('status', '!=', 'cancelled')
                ->exists();

            if ($sickRecord == true) {
                return response()->json([
                    'error' => 'record exist',
                    'message' => 'A sick leave request has already been created for the same date.',
                ], 404);
            }
        }

        if ($request->hasFile('document')) {
            $validatedData['document'] = $request->file('document')->store('documents');
        }
        Leave::create($validatedData);
        Mail::to(env('ADMIN_EMAIL'))->send(new GetASickReportMail($request));

        return response()->json([
            'success' => JsonResponse::HTTP_OK,
            'message' => 'Leave created successfully.',
        ], JsonResponse::HTTP_OK);

        //return redirect()->route('leaves.index', 'pending')->with('success', 'Leave created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $leave = Leave::findOrFail($id);
        // $leave = Leave::with('appliedByUser')->where($id);
        if ($leave) {
            return response()->json(['success' => true, 'data' => $leave]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $leave = Leave::findOrFail($id);
        return view('backend.leaves.modal', compact('leave'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'start_date' => ['required', 'date', 'after_or_equal:today'],
            'end_date' => ['required', 'date', 'after_or_equal:start_date'],
            'reason' => 'required|string',
            'detail' => 'nullable|string',
            'applied_by' => 'required|exists:users,id',
            'approved_by' => 'nullable|exists:users,id',
            'document' => 'nullable|file',
            'day_type' => ['required_if:start_date,end_date', 'in:Full Day,Half Day'],

        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => JsonResponse::HTTP_UNPROCESSABLE_ENTITY,
                'message' => $validator->errors()->first(),
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        }

        $validatedData = $validator->validated();

        $startDate = Carbon::parse($request->start_date)->format('Y-m-d');
        $endDate = Carbon::parse($request->end_date)->format('Y-m-d');
        if ($startDate === $endDate) {
            if (!$request->has('day_type')) {
                return response()->json([
                    'error' => 'day_type_required',
                    'message' => 'Day type is required .',
                ], 422);
            }
            $validatedData['day_type'] = $request->day_type; // Use the selected day_type
        } else {
            // If dates are different, set the default value
            $validatedData['day_type'] = 'Full Day';
        }
        if ($validator->fails()) {
            return response()->json([
                'status' => JsonResponse::HTTP_UNPROCESSABLE_ENTITY,
                'message' => $validator->errors()->first(),
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        }
        $validatedData = $validator->validated();
        $leaveRecord = Leave::where('applied_by', $request->applied_by)
            ->where('id', '!=', $id)
            ->where(function ($query) use ($startDate, $endDate) {
                $query->where(function ($query) use ($startDate, $endDate) {
                    $query->whereDate('start_date', '<=', $endDate)
                        ->whereDate('end_date', '>=', $startDate);
                });
            })
            ->where(function ($query) {
                $query->where('status', 'pending')
                    ->orWhere('status', 'approved');
            })
            ->exists();
        if ($leaveRecord == true) {
            return response()->json([
                'error' => 'record exist',
                'message' => 'Leave application already exists between these dates.',
            ], 404);
        }
        $dates = getDatesBetweenTwoDates($startDate, $endDate);
        foreach ($dates as $dateVal) {
            $sickRecord = SickReport::where('applied_by', $request->applied_by)
                ->where('sending_date', $dateVal)
                ->where('status', '!=', 'cancelled')
                ->exists();
            if ($sickRecord == true) {
                return response()->json([
                    'error' => 'record exist',
                    'message' => 'A sick leave request has already been created for the same date.',
                ], 404);
            }
        }
        try {
            if ($request->hasFile('document')) {
                $validatedData['document'] = $request->file('document')->store('documents');
            }
            $leave = Leave::findOrFail($id);
            $leave->update($validatedData);
            return response()->json([
                'success' => JsonResponse::HTTP_OK,
                'message' => 'Leave updated successfully.',
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
            $leave = Leave::findOrFail($id);
            $leave->delete();
            return response()->json([
                'success' => JsonResponse::HTTP_OK,
                'message' => 'Leave deleted successfully',
            ], JsonResponse::HTTP_OK);
        } catch (\Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage(),
            ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function datatable(Request $request, $status)
    {
        $date = $request->date;

        $leavesQuery = Leave::with('appliedByUser')->orderByDesc('id');
        $check = auth()->user()->hasRole('admin');
        if (!$check) {
            $leavesQuery->where('applied_by', auth()->user()->id);
        }
        if ($status != 'all') {
            $leavesQuery->where('status', $status);
        }
        if ($date) {
            $selectedDate = Carbon::createFromFormat('F Y', $date);
            $leavesQuery->whereMonth('start_date', $selectedDate->month)->whereYear('start_date', $selectedDate->year);
        }
        $leaves = $leavesQuery->get();
        return Datatables::of($leaves)
            ->addColumn('actions', function ($record) {
                $actions = '';
                if (auth()->user()->hasPermissionTo('approve_leave')) {
                    $actions = '<div class="btn-list">';
                    $disabled = $record->status !== 'pending' ? 'disabled' : '';
                    if (auth()->user()->hasRole('admin')) {
                        $actions .= '<button type="button" class="btn btn-sm btn-success" onclick="updateStatus(' . $record->id . ', \'approved\')" ' . $disabled . '>
                            <span class="fe fe-check-circle"> </span>
                            </button>';
                        $actions .= '<button type="button" class="btn btn-sm btn-danger" onclick="updateStatus(' . $record->id . ', \'cancelled\')" ' . $disabled . '>
                            <span class="fe fe-x-circle"> </span>
                            </button>';
                    } else {
                        if ($record->status == 'pending') {
                            $actions .= '<a data-act="ajax-modal" data-action-url="' . route('leaves.edit', $record->id) . '" data-title="Edit Leave" class="btn btn-sm btn-primary">
                        <span class="fe fe-edit"> </span>
                        </a>';
                            $actions .= '<button type="button" class="btn btn-sm btn-danger delete" data-url="' . route('leaves.destroy', $record->id) . '" data-method="get" data-table="#leaves_datatable">
                            <span class="fe fe-trash-2"> </span>
                        </button>';
                        }
                    }

                    $actions .= '<button type="button" class="btn btn-sm btn-primary" onclick="showDetails(' . $record->id . ')">
                            <span class="fe fe-eye"> </span>
                            </button>';
                    $actions .= '</div>';
                } else {
                    $actions = '<div class="btn-list">';
                    $actions .= '<a data-act="ajax-modal" data-action-url="' . route('leaves.edit', $record->id) . '" data-title="Edit Leave" class="btn btn-sm btn-primary">
                <span class="fe fe-edit"> </span>
                </a>';
                    $actions .= '</div>';
                }
                return $actions;
            })
            ->addColumn('name', function ($record) {
                return getFullName($record->appliedByUser);
            })
            ->addColumn('start_date', function ($record) {
                return Carbon::parse($record->start_date)->format('Y-m-d');
            })
            ->addColumn('end_date', function ($record) {
                return Carbon::parse($record->end_date)->format('Y-m-d');
            })
            ->addColumn('reason', function ($record) {
                return addEllipsis($record->reason);
            })
            ->addColumn('status', function ($record) {
                return '<span class="badge bg-' . statusClasses($record->status) . '">' . ucfirst($record->status) . '</span>';
            })
            ->rawColumns(['name', 'start_date', 'end_date', 'status', 'reason', 'actions'])
            ->addIndexColumn()->make(true);
    }

    public function callInBetter()
    {
        $user = Auth::user();

        $user->update([
            'call_in_better' => 1,
        ]);
        $admin = User::role('admin')->first();

        $subject = "Call in Better Request";
        $message = '<p>Dear Admin,</p>'
        . '<p>Hierbij ontvangt u mijn betermelding.</p>'

        . '<p>Met vriendelijke groet, <br>' . $user->first_name . ' ' . $user->last_name . '</p>';

        /// sending email to admin.
        Mail::to($admin->email)->send(new EmailSendingMail($subject, $message));
        // SendEmailJob::dispatch($admin->email, $subject, $message);

        return redirect()->route('dashboard')->with('success', 'Call In Better updated successfully.');
    }

    public function updateStatus(Request $request)
    {
        $leave = Leave::find($request->id);
        $user = User::find($leave->applied_by);
        if ($leave) {
            $leave->status = $request->status;
            $leave->save();
            /// When update status then sending email to respective user.
            // $subject = 'Leave Status Update';
            // $body = '<p> We are pleased to inform you that your leave status has been updated from <strong>'.$leave->status.'</strong> to <strong>'.$request->status.'<strong> </p>';
            // SendEmailJob::dispatch($user->email, $subject, $body);

            return response()->json([
                'success' => JsonResponse::HTTP_OK,
                'message' => 'Leave status updated successfully.',
            ], JsonResponse::HTTP_OK);
        }
        return response()->json([
            'error' => JsonResponse::HTTP_OK,
            'message' => 'Failed to update leave status',
        ], JsonResponse::HTTP_OK);
    }
}
