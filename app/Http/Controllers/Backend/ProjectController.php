<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.projects.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('backend.projects.modal', compact('users'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'start_date' => 'required|date|before_or_equal:end_date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'user' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => JsonResponse::HTTP_UNPROCESSABLE_ENTITY,
                'message' => $validator->errors()->first(),
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            DB::beginTransaction();
            $project = Project::create([
                'name' => $request->name,
                'client_name' => $request->client_name,
                'cost' => $request->cost,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'description' => $request->description,
            ]);
            $project->users()->sync($request->user);
            DB::commit();
            return response()->json([
                'success' => JsonResponse::HTTP_OK,
                'message' => 'Project created successfully.',
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
        $project = Project::with('users')->findOrFail($id);
        $users = User::all();
        return view('backend.projects.modal', compact('project', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'start_date' => 'required|date|before_or_equal:end_date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'user' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => JsonResponse::HTTP_UNPROCESSABLE_ENTITY,
                'message' => $validator->errors()->first(),
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $Project = Project::findOrFail($id);
            $Project->update([
                'name' => $request->name,
                'client_name' => $request->client_name,
                'cost' => $request->cost,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'description' => $request->description,
            ]);
            $Project->users()->sync($request->user);
           
            return response()->json([
                'success' => JsonResponse::HTTP_OK,
                'message' => 'Project updated successfully.',
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
            $Project = Project::findOrFail($id);
            $Project->delete();
            return response()->json([
                'success' => JsonResponse::HTTP_OK,
                'message' => 'Project deleted successfully'
            ], JsonResponse::HTTP_OK);
        } catch (\Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage()
            ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function dataTable()
    {
        $projects = Project::with('users')->orderBy('created_at', 'desc')->get();
        return Datatables::of($projects)
            ->addColumn('actions', function ($record) {
                $actions = '';
                $actions = '<div class="btn-list">';
                    $actions .= '<a data-act="ajax-modal" data-action-url="' . route('projects.edit', $record->id) . '" data-title="' . __('messages.edit_project') . '" class="btn btn-sm btn-primary">
                    <span class="fe fe-edit"> </span>
                    </a>';
                    $actions .= '<button type="button" class="btn btn-sm btn-danger delete" data-url="' . route('projects.destroy', $record->id) . '" data-method="get" data-table="#project_datatable">
                                        <span class="fe fe-trash-2"> </span>
                                    </button>';
                $actions .= '</div>';
              return $actions;   
            })
            ->addColumn('start_date', function ($record) {
                return Carbon::parse($record->start_date)->format('Y-m-d');
            })
            ->addColumn('end_date', function ($record) {
                return Carbon::parse($record->end_date)->format('Y-m-d');
            })
            ->addColumn('name', function ($record) {
                return $record->name;
            })
            ->addColumn('cost', function ($record) {
                return $record->cost;
            })
            ->addColumn('users', function ($record) {
                return $record->users->map(function($user) {
                    return '<span class="badge bg-success">' . $user->first_name . ' ' . $user->last_name . '</span>';
                })->implode(' ');
            })
            ->addColumn('client', function ($record) {
                return $record->client;
            })
            ->rawColumns(['start_date','end_date','actions', 'name', 'cost', 'users', 'client'])
            ->addIndexColumn()->make(true);
    }
}
