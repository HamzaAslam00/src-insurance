<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Leave;
use App\Models\HolidayAgenda;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Yajra\DataTables\Facades\DataTables;

class DashboardController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;
        $totalHour = Auth::user()->working_hour;

        $currentDate = Carbon::now()->toDateString();
        $dateArray = getDateOfSubmitHour($user_id);

        // Fetch holidays where end_date is greater than or equal to current date
        $upcomingHolidays = HolidayAgenda::where('end_date', '>=', $currentDate)
            ->first();

        $registeredHour = getUserRegisterHours($user_id);
        $missing = $totalHour-$registeredHour;
        if($missing < 0)
        {
            $missingHours = 0;
        }
        else
        {
            $missingHours = $missing;
        }

        $employeesCount = User::where('user_type', '!=', 'admin')->count();
        $LeavesCount = Leave::count();
        $pendingLeavesCount = Leave::where('status', 'pending')->count();
        $approvedLeavesCount = Leave::where('status', 'approved')->count();
        $rejectedLeavesCount = Leave::where('status', 'cancelled')->count();
        $latestLeaveApplications = Leave::where('status', 'pending')->orderby('id', 'desc')->get();

        return view('backend.dashboard', compact('dateArray', 'upcomingHolidays', 'totalHour', 'registeredHour', 'missingHours', 'employeesCount', 'LeavesCount', 'approvedLeavesCount', 'rejectedLeavesCount', 'pendingLeavesCount'));
    }

    public function dataTable(){
        $leavesQuery = Leave::with('appliedByUser')->where('status', 'pending')->orderByDesc('id');
        $leaves = $leavesQuery->get();
        return Datatables::of($leaves)
        ->addColumn('actions', function ($record) {
            $actions = '';
        if (auth()->user()->hasPermissionTo('approve_leave')) {
            $actions = '<div class="btn-list">';
            $disabled = $record->status !== 'pending' ? 'disabled' : '';
            $actions .= '<button type="button" class="btn btn-sm btn-success" onclick="updateStatus(' . $record->id . ', \'approved\')" ' . $disabled . '>
                        <span class="fe fe-check-circle"> </span>
                        </button>';
            $actions .= '<button type="button" class="btn btn-sm btn-danger" onclick="updateStatus(' . $record->id . ', \'cancelled\')" ' . $disabled . '>
                        <span class="fe fe-x-circle"> </span>
                        </button>';
            $actions .= '<button type="button" class="btn btn-sm btn-primary" onclick="showDetails(' . $record->id . ')">
                        <span class="fe fe-eye"> </span>
                        </button>';
            $actions .= '</div>';
        }else{
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
        ->addColumn('document', function ($record) {
            $document = '<a href="' . getFiles($record->document) . '" target="_blank"><span class="fe fe-file"></span></a>';
            return $record->document ? $document : 'N/A';
        })
        ->addColumn('status', function ($record) {
            return '<span class="badge bg-' . statusClasses($record->status) . '">' . ucfirst($record->status) . '</span>';
        })
        ->rawColumns(['name','start_date','end_date','status', 'reason','document','actions'])
        ->addIndexColumn()->make(true);
    }
}
