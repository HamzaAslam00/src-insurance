<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Location;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.locations.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.locations.modal');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => JsonResponse::HTTP_UNPROCESSABLE_ENTITY,
                'message' => $validator->errors()->first(),
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            DB::beginTransaction();
            Location::create([
                'name' => $request->name,
                'status' => $request->status,
            ]);
            DB::commit();
            return response()->json([
                'success' => JsonResponse::HTTP_OK,
                'message' => 'Location created successfully.',
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
        $location = Location::findOrFail($id);
        return view('backend.locations.modal', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => JsonResponse::HTTP_UNPROCESSABLE_ENTITY,
                'message' => $validator->errors()->first(),
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $location = Location::findOrFail($id);
            $location->update([
                'name' => $request->name,
                'status' => $request->status,
            ]);
            return response()->json([
                'success' => JsonResponse::HTTP_OK,
                'message' => 'Location updated successfully.',
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
            $location = Location::findOrFail($id);
            $location->delete();
            return response()->json([
                'success' => JsonResponse::HTTP_OK,
                'message' => 'Location deleted successfully'
            ], JsonResponse::HTTP_OK);
        } catch (\Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage()
            ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function dataTable()
    {
        $locations = Location::all();
        return Datatables::of($locations)
        ->addColumn('action', function ($record) {
            $actions = '';
            if (auth()->user()->hasPermissionTo('edit_location') || auth()->user()->hasPermissionTo('delete_location')) {
                $actions = '<div class="btn-list">';
                if (auth()->user()->hasPermissionTo('edit_location')) {
                    $actions .= '<a data-act="ajax-modal" data-action-url="' . route('locations.edit', $record->id) . '" data-title="Edit Location" class="btn btn-sm btn-primary" data-table="#locations_datatable">
                                    <span class="fe fe-edit"> </span>
                                </a>';
                }
                // if (auth()->user()->hasPermissionTo('delete_location')) {
                //     $actions .= '<button type="button" class="btn btn-sm btn-danger delete" data-url="' . route('locations.destroy', $record->id) . '" data-method="get" data-table="#locations_datatable">
                //                     <span class="fe fe-trash-2"> </span>
                //                 </button>';
                // }
                $actions .= '</div>';
            }
            return $actions;
        })
        ->addColumn('name', function ($record) {
            $route = auth()->user()->hasPermissionTo('edit_location') ? route('locations.edit', $record->id) : '#';
            return '<a href="javascript:void(0)" data-act="ajax-modal" data-action-url="' . $route . '" class="link" data-toggle="tooltip" data-placement="top" data-title="Edit Location">' . $record->name . '</a>';
        })
        ->addColumn('status', function ($record) {
            return '<span class="badge bg-' . statusClasses($record->status) . '">' . ucfirst($record->status) . '</span>';
        })
        ->rawColumns(['name', 'status', 'action'])
        ->addIndexColumn()->make(true);
    }
}
