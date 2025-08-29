<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Location;
use App\Models\WorkingHour;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class WorkingHoursController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.working_hours.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $locations = Location::where('status', 'active')->get();
        return view('backend.working_hours.modal', compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'start_date' => 'required|date|before_or_equal:end_date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'location' => 'required',
        ]);

        $validator->after(function ($validator) use ($request) {
            $start = Carbon::parse($request->start_date);
            $end = Carbon::parse($request->end_date);

            if ($start->isWeekend()) {
                $validator->errors()->add('start_date', 'The start date must not be on a weekend.');
            }

            if ($end->isWeekend()) {
                $validator->errors()->add('end_date', 'The end date must not be on a weekend.');
            }
        });

        if ($validator->fails()) {
            return response()->json([
                'status' => JsonResponse::HTTP_UNPROCESSABLE_ENTITY,
                'message' => $validator->errors()->first(),
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        }
        
        try {
            DB::beginTransaction();

            WorkingHour::create([
                'user_id' => auth()->user()->id,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'location_id' => $request->location,
                'work_detail' => $request->work_detail,
            ]);

            DB::commit();
            return response()->json([
                'success' => JsonResponse::HTTP_OK,
                'message' => 'Working hours recorded successfully.',
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
        $work = WorkingHour::findOrFail($id);
        $locations = Location::where('status', 'active')->get();
        return view('backend.working_hours.modal', compact('work', 'locations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'start_date' => 'required|date|before_or_equal:end_date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'location' => 'required',
        ]);

        $validator->after(function ($validator) use ($request) {
            $start = Carbon::parse($request->start_date);
            $end = Carbon::parse($request->end_date);

            if ($start->isWeekend()) {
                $validator->errors()->add('start_date', 'The start date must not be on a weekend.');
            }

            if ($end->isWeekend()) {
                $validator->errors()->add('end_date', 'The end date must not be on a weekend.');
            }
        });
        
        if ($validator->fails()) {
            return response()->json([
                'status' => JsonResponse::HTTP_UNPROCESSABLE_ENTITY,
                'message' => $validator->errors()->first(),
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            DB::beginTransaction();
            $workingHour = WorkingHour::findOrFail($id);

            $workingHour->update([
                'user_id' => auth()->user()->id,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'location_id' => $request->location,
                'work_detail' => $request->work_detail,
            ]);

            DB::commit();
            return response()->json([
                'success' => JsonResponse::HTTP_OK,
                'message' => 'Working hours updated successfully.',
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
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $work = WorkingHour::findOrFail($id);
            $work->delete();
            return response()->json([
                'success' => JsonResponse::HTTP_OK,
                'message' => 'Working Hours deleted successfully'
            ], JsonResponse::HTTP_OK);
        } catch (\Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage()
            ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function dataTable()
    {
        $workingHourQuery = WorkingHour::with('location', 'user')->orderByDesc('id');
        $check = auth()->user()->hasRole('admin');
        if (!$check) {
            $workingHourQuery->where('applied_by', auth()->user()->id);
        }
        $workingHours = $workingHourQuery->get();

        return Datatables::of($workingHours)
            ->addColumn('actions', function ($record) {
                $actions = '';
            if (auth()->user()->hasRole('admin')) {
                $actions = '<div class="btn-list">';
                    $actions .= '<a data-act="ajax-modal" data-action-url="' . route('working.edit', $record->id) . '" data-title="Edit Work Hours" class="btn btn-sm btn-primary">
                    <span class="fe fe-edit"> </span>
                    </a>';
                    $actions .= '<button type="button" class="btn btn-sm btn-danger delete" data-url="' . route('working.destroy', $record->id) . '" data-method="get" data-table="#work_datatable">
                                        <span class="fe fe-trash-2"> </span>
                                    </button>';
                $actions .= '</div>';
            }else{
                $actions = '<div class="btn-list">';
                $actions .= '<a data-act="ajax-modal" data-action-url="' . route('working.edit', $record->id) . '" data-title="Edit Work Hour" class="btn btn-sm btn-primary">
                <span class="fe fe-edit"> </span>
                </a>';
                $actions .= '</div>';
            }
            return $actions;   
            })
            ->addColumn('start_date', function ($record) {
                return Carbon::parse($record->start_date)->format('Y-m-d');
            })
            ->addColumn('end_date', function ($record) {
                return Carbon::parse($record->end_date)->format('Y-m-d');
            })
            ->addColumn('name', function ($record) {
                return getFullName($record->user);
            })
            ->addColumn('location', function ($record) {
                return $record->location->name;
            })
            ->rawColumns(['start_date','end_date','actions', 'name', 'location'])
            ->addIndexColumn()->make(true);
    }
}
