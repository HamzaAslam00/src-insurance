<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Quote;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;


class ClientController extends Controller
{
    public function index()
    {
        return view('backend.clients.index');
    }
    public function create()
    {
        $quoteData = null;
        return view('backend.clients.form', compact('quoteData'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'business_name' => 'required',
            'owner_name' => 'required',
            'email' => 'required|email|unique:clients,email',
            'phone' => 'required',
            'client_name' => 'required',
            'client_email' => 'required|email|unique:clients,client_email',
            'client_phone' => 'required',
            'client_address' => 'required',
            'client_city' => 'required',
            'client_state' => 'required',
            'client_zip_code' => 'required',
            'client_business_type_other' => 'required_if:client_business_type,other',
            'client_business_organization_other' => 'required_if:client_business_organization,other',
            'password' => 'required|confirmed',
        ],[
            'client_business_type_other.required_if' => 'Other business type is required',
            'client_business_organization_other.required_if' => 'Other business organization is required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => JsonResponse::HTTP_UNPROCESSABLE_ENTITY,
                'message' => $validator->errors()->first(),
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        }
        try {
            DB::beginTransaction();
            $user = User::where('email', $request->client_email)->first();
            $client = Client::where('client_email', $request->client_email)->first();

            if (!$user) {
                // If the user does not exist, create a new one
                $user = User::create([
                    'first_name' => $request->client_name,
                    'email' => $request->client_email,
                    'password' => Hash::make($request->password),
                    'user_type' => 'client',
                ]);
                $user->assignRole('client');
            }
            $data = [
                'business_name' => $request->business_name,
                'user_id' => $user->id,
                'quote_id' => $request->quote_id,
                'owner_name' => $request->owner_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'client_name' => $request->client_name,
                'client_phone' => $request->client_phone,
                'client_email' => $request->client_email,
                'client_address' => $request->client_address,
                'client_city' => $request->client_city,
                'client_state' => $request->client_state,
                'client_zip_code' => $request->client_zip_code,
                'client_business_type' => $request->client_business_type,
                'client_business_type_other' => $request->client_business_type_other,
                'client_business_organization' => $request->client_business_organization,
                'client_business_organization_other' => $request->client_business_organization_other,
                'client_fein' => $request->client_fein,
                'client_no_of_employees' => $request->client_no_of_employees,
                'client_accountant_name' => $request->client_accountant_name,
                'client_accountant_phone' => $request->client_accountant_phone,
                'client_accountant_email' => $request->client_accountant_email,
                'client_estimated_sales' => $request->client_estimated_sales,
                'client_estimated_payroll' => $request->client_estimated_payroll,
            ];
            if ($request->hasFile('business_image')) {
                $businessImageFile = $request->file('business_image');
                $directory = 'business_images';
                $data['business_image'] = saveResizeImage($businessImageFile, $directory, 300, 300);
            }
            if ($request->hasFile('client_image')) {
                $clientImageFile = $request->file('client_image');
                $directory = 'client_images';
                $data['client_image'] = saveResizeImage($clientImageFile, $directory, 300, 300);
            }
            if (!$client) {
                Client::create($data);
            }
            if($request->quote_id) {
                Quote::where('id', $request->quote_id)->update(['status' => 'replied']);
            }
            DB::commit();
            return response()->json([
                'success' => JsonResponse::HTTP_OK,
                'redirectUrl' => auth()->user()->user_type == 'admin' ? route('clients.index') : route('quotes.index'),
                'message' => 'Client created successfully.',
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
        $client = Client::findOrFail($id);

        if ((auth()->user()->roles[0]->name !== 'admin' && $client->user_id !== auth()->id()) && !(auth()->user()->roles[0]->name == 'partner' && $client->user->status == 'active')) {
            abort(403, 'You do not have permission to access this page.');
        }

        return view('backend.clients.edit', compact('client'));

    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'business_name' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => JsonResponse::HTTP_UNPROCESSABLE_ENTITY,
                'message' => $validator->errors()->first(),
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        }
        try {
            DB::beginTransaction();


            $client = Client::findOrFail($id); // Find the client record by ID

            // Update data
            $data = [
                'business_name' => $request->business_name,
                'owner_name' => $request->owner_name,
                'email' => $request->email,
                'phone' => $request->phone,

            ];
            if ($request->hasFile('business_image')) {
                $businessImageFile = $request->file('business_image');
                $directory = 'business_images';
                $data['business_image'] = saveResizeImage($businessImageFile, $directory, 300, 300);

                if ($client->business_image) {
                }
            } else {
                $data['business_image'] = $client->business_image;
            }
            $client->update($data);
            DB::commit();
            return response()->json([
                'success' => JsonResponse::HTTP_OK,
                'redirectUrl' => route('clients.index'),
                'message' => 'Business updated successfully.',
            ], JsonResponse::HTTP_OK);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => JsonResponse::HTTP_INTERNAL_SERVER_ERROR,
                'message' => $e->getMessage(),
            ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();
            $client = Client::findOrFail($id);
            foreach ($client->policies as $policy) {
                $policy->notices()->delete();
                $policy->payment()->delete();
                $policy->delete();
            }
            // dd($client);
            if ($client->user_id) {
                User::findOrFail($client->user_id)->delete();
            }
            $client->delete();
            DB::commit();
            return response()->json([
                'success' => JsonResponse::HTTP_OK,
                'message' => 'Client and associated user deleted successfully'
            ], JsonResponse::HTTP_OK);
        } catch (\Exception $exception) {
            DB::rollBack(); // Rollback transaction on any error
            return response()->json([
                'message' => $exception->getMessage()
            ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    public function client(Request $request, $id)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'client_name'=>'required',
            'client_email' => 'required|email|unique:clients,client_email,' . $id,
            'client_phone' => 'required',
            'client_address' => 'required',
            'client_city' => 'required',
            'client_state' => 'required',
            'client_zip_code' => 'required',
            'client_business_type_other' => 'required_if:client_business_type,other',
            'client_business_organization_other' => 'required_if:client_business_organization,other',
    ], [
        'client_business_type_other.required_if' => 'Other business type is required',
        'client_business_organization_other.required_if' => 'Other business organization is required',
    ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => JsonResponse::HTTP_UNPROCESSABLE_ENTITY,
                'message' => $validator->errors()->first(),
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        }
        try {
            DB::beginTransaction();
            $client = Client::findOrFail($id);
            $user = User::findOrFail($client->user_id);
            $user->update([
                'first_name' => $request->client_name,
                'email' => $request->client_email,
                'password' => $request->password ? Hash::make($request->password) : $user->password, // Only update if password provided
            ]);
            $data = [
                'client_name' => $request->client_name,
                'client_phone' => $request->client_phone,
                'client_email' => $request->client_email,
                'client_address' => $request->client_address,
                'client_city' => $request->client_city,
                'client_state' => $request->client_state,
                'client_zip_code' => $request->client_zip_code,
                'client_business_type' => $request->client_business_type,
                'client_business_type_other' => $request->client_business_type_other,
                'client_business_organization' => $request->client_business_organization,
                'client_business_organization_other' => $request->client_business_organization_other,
                'client_fein' => $request->client_fein,
                'client_no_of_employees' => $request->client_no_of_employees,
                'client_accountant_name' => $request->client_accountant_name,
                'client_accountant_phone' => $request->client_accountant_phone,
                'client_accountant_email' => $request->client_accountant_email,
                'client_estimated_sales' => $request->client_estimated_sales,
                'client_estimated_payroll' => $request->client_estimated_payroll,
            ];
            if ($request->hasFile('client_image')) {
                $clientImageFile = $request->file('client_image');
                $directory = 'client_images';
                $data['client_image'] = saveResizeImage($clientImageFile, $directory, 300, 300);

                if ($client->client_image) {
                }
            } else {
                $data['client_image'] = $client->client_image;
            }
            $client->update($data);
            DB::commit();
            return response()->json([
                'success' => JsonResponse::HTTP_OK,
                'redirectUrl' => route('clients.edit', $id),
                'message' => 'Client updated successfully.',

            ], JsonResponse::HTTP_OK);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => JsonResponse::HTTP_INTERNAL_SERVER_ERROR,
                'message' => $e->getMessage(),
            ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    public function dataTable(Request $request)
    {

        $clientQuery = Client::orderByRaw("LOWER(client_name) ASC")->where('status', 'active');
        if (auth()->user()->roles[0]->name == 'partner') {
            $clientQuery->where('partner_id', auth()->user()->id);
        }
        $clients = $clientQuery->get();
        return Datatables::of($clients)
            ->addColumn('actions', function ($record) {
                $actions = '';
                if (auth()->user()->hasPermissionTo('edit_client') || auth()->user()->hasPermissionTo('delete_client')) {
                    $actions = '<div class="btn-list">';
                    if (auth()->user()->hasPermissionTo('edit_client')) {
                        $actions .= '<a href="' . route('clients.edit', $record->id) . '" class="btn btn-sm btn-primary">
                                        <span class="fe fe-edit"> </span>
                                    </a>';
                    }
                    if (auth()->user()->hasPermissionTo('delete_user')) {
                        $actions .= '<button type="button" class="btn btn-sm btn-danger delete" data-url="' . route('clients.destroy', $record->id) . '" data-method="get" data-table="#clients_datatable">
                                        <span class="fe fe-trash-2"> </span>
                                    </button>';
                    }
                    $actions .= '</div>';
                }
                return $actions;
            })
            ->addColumn('client_name', function ($record) {
                $route = auth()->user()->hasPermissionTo('edit_client') ? route('clients.edit', $record->id) : '#';
                return '<a href="' . $route . '" class="link" data-toggle="tooltip" data-placement="top" data-title="Edit User">' . $record->client_name . '</a>';
            })
            ->addColumn('email', function ($record) {
                return $record->email;
            })
            ->addColumn('phone', function ($record) {
                return isValue($record->phone);
            })
            ->rawColumns(['actions', 'email', 'client_name', 'phone'])
            ->addIndexColumn()->make(true);
    }
}
