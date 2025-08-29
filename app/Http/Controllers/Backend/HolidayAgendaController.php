<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\HolidayAgenda;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class HolidayAgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.holiday_agenda.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.holiday_agenda.modal');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'start_date' => 'required',
            'end_date' => 'required',
            'detail' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => JsonResponse::HTTP_UNPROCESSABLE_ENTITY,
                'message' => $validator->errors()->first(),
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            DB::beginTransaction();
            $user = HolidayAgenda::create([
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'detail' => $request->detail,
            ]);
            DB::commit();
            return response()->json([
                'success' => JsonResponse::HTTP_OK,
                'message' => 'Holiday created successfully.',
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
        $holiday = HolidayAgenda::findOrFail($id);
        $show = true;
        return view('backend.holiday_agenda.modal', compact('holiday', 'show'));    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $holiday = HolidayAgenda::findOrFail($id);
        return view('backend.holiday_agenda.modal', compact('holiday'));
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
            $holiday = HolidayAgenda::findOrFail($id);
            $holiday->delete();
            return response()->json([
                'success' => JsonResponse::HTTP_OK,
                'message' => 'Holiday deleted successfully'
            ], JsonResponse::HTTP_OK);
        } catch (\Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage()
            ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function dataTable(Request $request)
    {
        $holidays = HolidayAgenda::orderBy('id', 'desc')->get();
        return Datatables::of($holidays)
            ->addColumn('actions', function ($record) {
                $actions = '';
                $currentDate = date('Y-m-d'); // Get the current date/time
                
                $startDate = Carbon::parse($record->start_date); 
                
                if ($startDate->greaterThanOrEqualTo($currentDate) && (auth()->user()->hasPermissionTo('edit_user') || auth()->user()->hasPermissionTo('delete_user'))) {

                    $actions = '<div class="btn-list">';
                    
                    if (auth()->user()->hasPermissionTo('edit_holiday')) {
                            // $actions .= '<a data-act="ajax-modal" data-action-url="' . route('holiday-agenda.edit', $record->id) . '" data-title="Edit Holiday" class="btn btn-sm btn-primary">
                            //                 <span class="fe fe-edit"> </span>
                            //             </a>';
                    }
                    if (auth()->user()->hasPermissionTo('delete_holiday')) {
                        $actions .= '<button type="button" class="btn btn-sm btn-danger delete" data-url="' . route('holiday-agenda.destroy', $record->id) . '" data-method="get" data-table="#holidays_datatable">
                                        <span class="fe fe-trash-2"> </span>
                                    </button>';
                    }
                }
                else {
                    if (auth()->user()->hasPermissionTo('view_holiday')) {
                        $actions .= '<a data-act="ajax-modal" data-action-url="' . route('holiday-agenda.show', $record->id) . '" data-title="View Holiday" class="btn btn-sm btn-success">
                                        <span class="fe fe-eye"> </span>
                                    </a>';
                    } 
                }  
                return $actions;
            })
            ->addColumn('start_date', function ($record) {
                return $record->start_date;
            })
            ->addColumn('end_date', function ($record) {
                return $record->end_date;
            })
            ->addColumn('detail', function ($record) {
                return addEllipsis($record->detail);
            })
            ->rawColumns(['actions', 'start_date', 'end_date', 'detail'])
            ->addIndexColumn()->make(true);
    }
}
