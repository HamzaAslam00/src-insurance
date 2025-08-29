<?php

namespace App\Http\Controllers\Backend;

use App\Models\Client;
use App\Models\Policy;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class PolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.policies.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($clientId)
    {
        return view('backend.policies.modal', compact('clientId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'policy_type' => 'required',
            'policy_type_other' => 'required_if:policy_type,other',
            'policy_number' => 'required',
            'expiration_date' => 'sometimes|after:effective_date',
            'file' => 'required',
        ],[
            'file.required' => 'Policy document is required.',
            'policy_type_other.required_if' => 'Other business organization is required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => JsonResponse::HTTP_UNPROCESSABLE_ENTITY,
                'message' => $validator->errors()->first(),
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            DB::beginTransaction();
            $file = saveAnyFile($request->file, 'policies', $request->name);
            $policy = Policy::create([
                'name' => $request->name,
                'company_name' => $request->company_name,
                'premium' => $request->premium,
                'policy_type' => $request->policy_type,
                'policy_type_other' => $request->policy_type_other,
                'policy_number' => $request->policy_number,
                'description' => $request->description,
                'expiration_date' => $request->expiration_date,
                'effective_date' => $request->effective_date,
                'client_id' => $request->client_id,
                'file' => $file,
                'status' => $request->status,
            ]);

            DB::commit();
            return response()->json([
                'success' => JsonResponse::HTTP_OK,
                'message' => 'Policy added successfully.',
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
        $policy = Policy::findOrFail($id);
        $client = Client::findOrFail($policy->client_id);
        return view('backend.policies.form', compact('policy','client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (!auth()->user()->hasRole('admin')) {
            return response()->json([
                'status' => JsonResponse::HTTP_FORBIDDEN,
                'message' => "You do not have the required role to update this policy.",
            ], JsonResponse::HTTP_FORBIDDEN);
        }

        // Validation rules for the update
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'policy_type' => 'required',
            'policy_type_other' => 'required_if:policy_type,other',
            'policy_number' => 'required',
            'expiration_date' => 'sometimes|after:effective_date',
        ], [
            'policy_type_other.required_if' => 'Other business organization is required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => JsonResponse::HTTP_UNPROCESSABLE_ENTITY,
                'message' => $validator->errors()->first(),
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            // Find the policy by ID
            $policy = Policy::findOrFail($id);

            // Update the policy details
            $policy->update([
                'name' => $request->name,
                'company_name' => $request->company_name,
                'premium' => $request->premium,
                'policy_type' => $request->policy_type,
                'policy_type_other' => $request->policy_type_other,
                'policy_number' => $request->policy_number,
                'description' => $request->description,
                'expiration_date' => $request->expiration_date,
                'effective_date' => $request->effective_date,
                'status' => $request->status,
            ]);
            // dd($policy);

            // Handle file upload if present
            if ($request->hasFile('file')) {
                $file = saveAnyFile($request->file, 'policies', $request->name);
                $policy->update(['file' => $file]);
            }

            // Return success response
            return response()->json([
                'success' => JsonResponse::HTTP_OK,
                'message' => 'Policy details updated successfully.',
            ], JsonResponse::HTTP_OK);

        } catch (\Exception $e) {
            // Return error response if any exception occurs
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

            $policy = Policy::findOrFail($id);
            $policy->notices()->delete();
            $policy->payment()->delete();
            // dd($policy);
            $policy->delete();
            return response()->json([
                'success' => JsonResponse::HTTP_OK,
                'message' => 'Policy deleted successfully'
            ], JsonResponse::HTTP_OK);
        } catch (\Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage()
            ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function dataTable(Request $request, $clientId)
    {
        $policies = Policy::where('client_id', $clientId) // Fetch policies for the specified client
        ->orderBy('id', 'desc')
        ->get();
        return Datatables::of($policies)
            ->addColumn('actions', function ($record) {
                $actions = '';
                if (auth()->user()->hasPermissionTo('edit_policy') || auth()->user()->hasPermissionTo('delete_policy') ) {
                    $actions = '<div class="btn-list">';

                    if (auth()->user()->hasPermissionTo('edit_policy')) {
                        $actions .= '<a href="' . route('policies.edit', $record->id) . '" data-title="Edit Policy" class="btn btn-sm btn-primary">
                                        <span class="fe fe-edit"> </span>
                                    </a>';
                    }
                    if (auth()->user()->hasPermissionTo('delete_policy')) {
                        $actions .= '<button type="button" class="btn btn-sm btn-danger delete" data-url="' . route('policies.destroy', $record->id) . '" data-method="get" data-table="#policies_datatable">
                                        <span class="fe fe-trash-2"> </span>
                                    </button>';
                    }
                    $actions .= '</div>';
                }
                return $actions;
            })
            ->addColumn('name', function ($record) {
                $route = auth()->user()->hasPermissionTo('edit_policy') ? route('policies.edit', $record->id) : '#';
                return '<a href="' . $route . '" class="link" data-toggle="tooltip" data-placement="top" data-title="Edit Policy">' . $record->name . '</a>';
            })
            ->addColumn('effective_date', function ($record) {
                return $record->effective_date;
            })
            ->addColumn('expiration_date', function ($record) {
                return $record->expiration_date;
            })
            ->addColumn('file', function ($record) {
                return '<a href="'. getImage($record->file) . '" target="_blank"><i class="side-menu__icon fe fe-link"></i></a>';
            })
            ->addColumn('status', function ($record) {
                return '<span class="badge bg-' . statusClasses($record->status) . '">' . ucfirst($record->status) . '</span>';
            })
            ->rawColumns(['actions', 'name', 'expiration_date', 'effective_date', 'file', 'status'])
            ->addIndexColumn()->make(true);
    }
}
