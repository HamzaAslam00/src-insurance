<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\WorkingHour;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd($authUser);
        return view('backend.users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('backend.users.modal', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'role'=>'required',
            'working_hour' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => JsonResponse::HTTP_UNPROCESSABLE_ENTITY,
                'message' => $validator->errors()->first(),
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            DB::beginTransaction();
            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
                'user_type' => $request->role,
                'status' => $request->status,
                'designation' => $request->designation,
                'working_hour' => $request->working_hour,
            ]);
            $user->assignRole($request->role);


            DB::commit();
            return response()->json([
                'success' => JsonResponse::HTTP_OK,
                'message' => 'User created successfully.',
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
        $user = User::findOrFail($id);
        $roles = Role::all();
        $userRoles = $user->roles->pluck('name')->toArray();
        return view('backend.users.modal', compact('user','roles','userRoles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id . ',id',
            'password' => 'nullable|min:8|confirmed',
            'role'=>'required',
            'working_hour' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => JsonResponse::HTTP_UNPROCESSABLE_ENTITY,
                'message' => $validator->errors()->first(),
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $user = User::findOrFail($id);
            $user->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'user_type' => $request->role,
                'status' => $request->status,
                'designation' => $request->designation,
                'working_hour' => $request->working_hour,
            ]);
            $user->syncRoles([$request->role]);
            if ($request->has('password')) {
                $user->update([
                    'password' => Hash::make($request->password),
                ]);
            }
            return response()->json([
                'success' => JsonResponse::HTTP_OK,
                'message' => 'User updated successfully.',
            ], JsonResponse::HTTP_OK);

        } catch (\Exception $e) {
            return response()->json([
                'status' => JsonResponse::HTTP_INTERNAL_SERVER_ERROR,
                'message' => $e->getMessage(),
            ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    public function destroy(string $id)
    {
        try {
            $user = User::findOrFail($id);
            if ($user->status == 'inactive') {
                DB::beginTransaction();
                $user->leavesApplied()->delete();
                $user->workingHours()->delete();
                $user->sickLeaves()->delete();
                $user->delete();
                DB::commit();
                return response()->json([
                    'success' => JsonResponse::HTTP_OK,
                    'message' => 'User deleted successfully'
                ], JsonResponse::HTTP_OK);
            } else {
                return response()->json([
                    'message' => 'You cannot delete an active user.'
                ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
            }
        } catch (\Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage()
            ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function dataTable(Request $request)
    {
        $date = $request->date;
        $usersQuery = User::where('id', '!=', 1)->orderBy('id', 'desc');
        
        if ($request->status && $request->status != 'all_status') {
            $usersQuery->where('status', $request->status);
        }

        $users = $usersQuery->get();
        
        return Datatables::of($users)
            ->addColumn('actions', function ($record) {
                $actions = '';
                if (auth()->user()->hasPermissionTo('edit_user') || auth()->user()->hasPermissionTo('delete_user')) {
                    $actions = '<div class="btn-list">';
                    if (auth()->user()->hasPermissionTo('edit_user')) {
                        $actions .= '<a data-act="ajax-modal" data-action-url="' . route('users.edit', $record->id) . '" data-title="'.__('messages.edit_user').'" class="btn btn-sm btn-primary">
                                        <span class="fe fe-edit"> </span>
                                    </a>';
                    }
                    if (auth()->user()->hasPermissionTo('upload_document')) {
                        $actions .= '<a href="' . route('user.documents.index', $record->id) . '" class="btn btn-sm btn-primary">
                                        <span class="fe fe-upload"> </span>
                                    </a>';
                    }
                    $actions .= '<a href="' . route('user.hours.index', $record->id) . '" class="btn btn-sm btn-primary">
                                        <span class="fe fe-clock"> </span>
                                    </a>';
                    if (auth()->user()->hasPermissionTo('delete_user')) {
                        $actions .= '<button type="button" class="btn btn-sm btn-danger delete" data-url="' . route('users.destroy', $record->id) . '" data-method="get" data-table="#users_datatable">
                                        <span class="fe fe-trash-2"> </span>
                                    </button>';
                    }
                    $actions .= '</div>';
                }
                return $actions;
            })
            ->addColumn('name', function ($record) {
                $route = auth()->user()->hasPermissionTo('edit_user') ? route('users.edit', $record->id) : '#';
                return '<a href="javascript:void(0)" data-act="ajax-modal" data-action-url="' . $route . '" class="link" data-toggle="tooltip" data-placement="top" data-title="'.__('messages.edit_user').'">' . getFullName($record) . '</a>';
            })
            ->addColumn('email', function ($record) {
                return $record->email;
            })
            ->addColumn('phone', function ($record) {
                return isValue($record->phone);
            })
            ->addColumn('hours', function($record) {
                return $record->working_hour; 
            })
            ->addColumn('register_hours', function($record) use($date) {
                return getUserRegisterHours($record->id, $date);
            })
            ->addColumn('status', function ($record) {
                return '<span class="badge bg-' . statusClasses($record->status) . '">' . ucfirst($record->status) . '</span>';
            })
            ->rawColumns(['actions', 'email', 'name', 'hours', 'register_hours', 'status', 'phone'])
            ->addIndexColumn()->make(true);
    }
}

    
