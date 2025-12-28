<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Quote;
use App\Models\Client;
use App\Models\Proposal;
use ReCaptcha\ReCaptcha;
use App\Mail\ContactUsMail;
use Illuminate\Http\Request;
use App\Mail\QuoteRequestMail;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Mail\ProposalCreatedMail;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class QuoteController extends Controller
{
    public function requestAQuote(Request $request)
    {
        // dd($request->all());
        if ($request->isMethod('get')) {
            return view('backend.quotes.request_a_quote');
        }

        $serviceTypes = ['business_owners_policy', 'umbrellas', 'commercial_packages'];
        $request->validate([
            'service_type' => 'required',
            'business_name' => 'required',
            'business_owner' => 'required',
            'business_email' => 'required',
            'organization' => 'required',
            'organization_other' => 'required_if:organization,other',
            'business_address' => 'required',
            'business_telephone' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip_code' => 'required',
            'fein' => in_array($request->service_type, $serviceTypes) ? 'nullable' : 'required',
            'year_business_started' => 'required',
            'year_business_started_other' => 'required_if:year_business_started,other',
            'business_kind' => 'required',
            'business_kind_other' => 'required_if:business_kind,other',
            'no_of_employees' => 'required',
            'no_of_employees_other' => 'required_if:no_of_employees,other',
            'business_personal_property' => in_array($request->service_type, $serviceTypes) ? 'required' : 'nullable',
            'business_personal_property_other' => 'required_if:business_personal_property,other',
            'annual_employee_payroll' => in_array($request->service_type, $serviceTypes) ? 'nullable' : 'required',
            'annual_employee_payroll_other' => 'required_if:annual_employee_payroll,other',
            'owner_payroll' => in_array($request->service_type, $serviceTypes) ? 'nullable' : 'required',
            'owner_payroll_other' => 'required_if:owner_payroll,other',
            'revenue' => in_array($request->service_type, $serviceTypes) ? 'required' : 'nullable',
            'revenue_other' => 'required_if:revenue,other',
            'g-recaptcha-response' => 'required',
        ], [
            'organization_other.required_if' => 'Other organization is required',
            'year_business_started_other.required_if' => 'Other business started year is required',
            'business_kind_other.required_if' => 'Other kind of business is required',
            'no_of_employees_other.required_if' => 'Other no. fo employees is required',
            // 'business_personal_property_other.required_if' => 'Other business personal property is required',
            'annual_employee_payroll_other.required_if' => 'Other anual employee payroll is required',
            'owner_payroll_other.required_if' => 'Other owner payroll is required',
            'revenue_other.required_if' => 'Other revenue is required',
            'g-recaptcha-response.required' => 'Please complete the reCAPTCHA to proceed.',
        ]);

        try {
            $recaptcha_response = $request->input('g-recaptcha-response');
            if ($recaptcha_response) {
                // Verify reCAPTCHA
                $recaptcha_secret = env('RECAPTCHA_SITE_SECRET');
                $recaptcha = new ReCaptcha($recaptcha_secret);
                $recaptcha_result = $recaptcha->verify($recaptcha_response, $request->ip());

                if (!$recaptcha_result->isSuccess()) {
                    return response()->json([
                        'status' => JsonResponse::HTTP_UNPROCESSABLE_ENTITY,
                        'message' => 'reCAPTCHA verification failed. Please try again.',
                    ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
                }
            }
            $userId = $request->user_id;
            $userType = $request->user_type;
            $authUserId = $request->user_id ?? 1;
            $newUser = false;
            $user = User::where('id', $userId)->first();
            if (isset($user) && $user?->user_type != 'admin' && $user?->user_type != 'partner') {
                $userId = $user->id;
            } else {
                $checkUser = User::where('email', $request->business_email)->first();
                if (isset($checkUser) && $checkUser?->user_type == 'client') {
                    return response()->json([
                        'message' => 'Account Exist! Please login to apply your quote.'
                    ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
                }
                if (isset($checkUser) && $checkUser?->user_type != 'client') {
                    $userId = $checkUser->id;
                } else {
                    $newUserPassword = uniqid();
                    $user = User::create([
                        'first_name' => $request->business_name,
                        'email' => $request->business_email,
                        'password' => Hash::make($newUserPassword),
                        'b_name' => $request->business_name,
                        'owner_name' => $request->business_owner,
                        'b_email' => $request->business_email,
                        'b_address' => $request->business_address,
                        'user_type' => 'client',
                    ]);
                    $user->assignRole('client');
                    $userId = $user->id;
                    $authUserId = $user->id;
                    $newUser = true;
                }
            }
            Quote::create([
                'service_type' => $request->service_type,
                'business_name' => $request->business_name,
                'business_owner' => $request->business_owner,
                'business_email' => $request->business_email,
                'organization' => $request->organization,
                'organization_other' => $request->organization_other,
                'business_address' => $request->business_address,
                'business_telephone' => $request->business_telephone,
                'city' => $request->city,
                'state' => $request->state,
                'zip_code' => $request->zip_code,
                'fein' => isset($request->fein) ? $request->fein : null,
                'year_business_started' => $request->year_business_started,
                'year_business_started_other' => $request->year_business_started_other,
                'business_kind' => $request->business_kind,
                'business_kind_other' => $request->business_kind_other,
                'no_of_employees' => $request->no_of_employees,
                'no_of_employees_other' => $request->no_of_employees_other,
                'business_personal_property' => isset($request->business_personal_property) ? $request->business_personal_property : null,
                'business_personal_property_other' => $request->business_personal_property_other,
                'annual_employee_payroll' => isset($request->annual_employee_payroll) ? $request->annual_employee_payroll : null,
                'annual_employee_payroll_other' => $request->annual_employee_payroll_other,
                'owner_payroll' => isset($request->owner_payroll) ? $request->owner_payroll : null,
                'owner_payroll_other' => $request->owner_payroll_other,
                'include_officer' => isset($request->include_officer) ? $request->include_officer : null,
                'include_disablility' => isset($request->include_disablility) ? $request->include_disablility : null,
                'revenue' => isset($request->revenue) ? $request->revenue : null,
                'revenue_other' => $request->revenue_other,
                'note' => $request->note,
                'status' => 'pending',
            ]);
            $data = [
                'business_email' => $request->business_email,
                'business_name' => $request->business_name,
            ];
            // Mail::to(env('ADMIN_EMAIL'))->send(new ContactUsMail($data));
            // Mail::to($request->business_email)->cc(config('services.adminemail'))->send(new QuoteRequestMail($request->business_email, $newUser, $newUserPassword));
            return response()->json([
                'success' => JsonResponse::HTTP_OK,
                'message' => 'Quote requested successfully',
            ], JsonResponse::HTTP_OK);
        } catch (\Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage()
            ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    public function index(Request $request, $type = null)
    {
        return view('backend.quotes.index', compact('type'));
    }

    public function show($id)
    {
        $quoteData = Quote::findOrFail($id);
        $client = Client::where('quote_id', $quoteData->id)->first();
        return view('backend.quotes.view_modal', compact('quoteData', 'client'));
    }
    public function create($id)
    {
        $quoteData = Quote::findOrFail($id);
        $client = Client::where('quote_id', $id)->first();
        return view('backend.clients.form', compact('quoteData', 'client'));
    }
    public function editQuote(Request $request, $id)
    {
        if ($request->isMethod('get')) {
            $quoteData = Quote::findOrFail($id);
            if ($quoteData->partner_id != auth()->user()->id) {
                abort(403);
            }
            $client = Client::where('quote_id', $id)->first();
            return view('backend.quotes.edit_quote', compact('quoteData', 'client'));
        }
        if ($request->partner_id != auth()->user()->id) {
            abort(403);
        }

        $validator = Validator::make($request->all(), [
            'business_name' => 'required',
            'owner_name' => 'required',
            'email' => 'required|email|unique:clients,email,' . $request->client_id,
            'phone' => 'required',
            'client_name' => 'required',
            'client_email' => 'required|email|unique:clients,client_email,' . $request->client_id,
            'client_phone' => 'required',
            'client_address' => 'required',
            'client_city' => 'required',
            'client_state' => 'required',
            'client_zip_code' => 'required',
            'client_business_type_other' => 'required_if:client_business_type,other',
            'client_business_organization_other' => 'required_if:client_business_organization,other',
            'password' => 'nullable|confirmed',
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
            $client = Client::where('id', $request->client_id)->first();

            $quote = Quote::where('id', $request->quote_id)->update([
                'business_name' => $request->business_name,
                'business_owner' => $request->owner_name,
                'business_email' => $request->email,
                'organization' => $request->client_business_organization,
                'organization_other' => $request->client_business_organization_other,
                'business_address' => $request->client_address,
                'business_telephone' => $request->phone,
                'city' => $request->client_city,
                'state' => $request->client_state,
                'zip_code' => $request->client_zip_code,
                'fein' => isset($request->client_fein) ? $request->client_fein : null,
                'business_kind' => $request->client_business_type,
                'business_kind_other' => $request->client_business_type_other,
                'no_of_employees' => $request->client_no_of_employees,
            ]);

            $data = [
                'business_name' => $request->business_name,
                'user_id' => $client->user_id,
                'quote_id' => $request->quote_id,
                'partner_id' => auth()->user()->id,
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
                'status' => 'inactive',
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
            } else {
                $client->update($data);
            }
            DB::commit();

            return response()->json([
                'success' => JsonResponse::HTTP_OK,
                'message' => 'Client data updated successfully',
                'redirectUrl' => route('quotes.index'),
            ], JsonResponse::HTTP_OK);
        } catch (\Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage()
            ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    public function destroy(string $id)
    {
        try {
            $quote = Quote::findOrFail($id);
            $client = Client::where('quote_id', $id)->first();
            $user = User::where('id', $client?->id)->first();
            $user?->delete();
            $client?->delete();
            $quote->delete();
            return response()->json([
                'success' => JsonResponse::HTTP_OK,
                'message' => 'Quote deleted successfully'
            ], JsonResponse::HTTP_OK);
        } catch (\Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage()
            ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function dataTable(Request $request, $type = null)
    {
        $pendingQuotesQuery = Quote::orderBy('id', 'desc');
        if (auth()->user()->user_type == 'partner') {
            $pendingQuotesQuery->where('partner_id', auth()->user()->id);
        }
        if (auth()->user()->user_type == 'admin') {
            if ($type == 'partner') {
                $pendingQuotesQuery->where('partner_id', '>', 0);
            } else {
                $pendingQuotesQuery->where('partner_id', 0);
            }
        }
        $pendingQuotes = $pendingQuotesQuery->get();

        return Datatables::of($pendingQuotes)
            ->addColumn('actions', function ($record) {
                $actions = '<div class="btn-list">';
                if (auth()->user()->hasPermissionTo('create_proposal') && ($record->status == 'replied' || ($record->partner_id > 0 && $record->status == 'pending'))) {
                    $actions .= '<a href="' . route('create-proposal', $record->id) . '" class="btn btn-sm btn-primary">
                                    <span class="fe fe-plus"> </span>
                                </a>';
                }
                if (auth()->user()->hasPermissionTo('view_pending_quotes')) {
                    $actions .= '<a href="' . route('quotes.show', $record->id) . '" class="btn btn-sm btn-info">
                                    <span class="fe fe-eye"> </span>
                                </a>';
                }

                if (auth()->user()->hasPermissionTo('delete_pending_quote') && $record->status !== 'pending') {
                    $actions .= '<button type="button" class="btn btn-sm btn-danger delete" data-url="' . route('quotes.destroy', $record->id) . '" data-method="get" data-table="#quote_datatable">
                                    <span class="fe fe-trash-2"> </span>
                                </button>';
                }
                if (auth()->user()->hasPermissionTo('view_pending_quotes') && !in_array($record->status, ['replied', 'ready_quote', 'signed'])) {
                    if ((auth()->user()->user_type == 'admin' && $record->partner_id == 0) || auth()->user()->user_type == 'partner' && $record->partner_id > 0 && $record->status == 'pending') {
                        $url = auth()->user()->user_type == 'admin' ? route('quotes.create', $record->id) : route('edit-quote', $record->id);
                        $actions .= '<a href="' . $url . '" data-title="Requested Quote" class="btn btn-sm btn-info">
                                        <span class="fe fe-edit-3"> </span>
                                    </a>';
                    }
                }
                if (in_array(auth()->user()->user_type, ['partner', 'admin']) && $record->status == 'ready_quote') {
                    $proposal = Proposal::where('quote_id', $record->id)->first();
                    $actions .= '<a href="' . route('download-proposal', ['clientId' => $proposal->client_id, 'proposalId' => $proposal->id]) . '" target="_blank" data-title="Requested Quote" class="btn btn-sm btn-success">
                        <span class="fe fe-download"> </span>
                    </a>';
                }
                $actions .= '</div>';
                return $actions;
            })
            ->addColumn('business_owner', function ($record) {
                // $route = auth()->user()->hasPermissionTo('edit_user') ?  : '#';
                $quote = Quote::where('id', $record->id)->first();
                $url = auth()->user()->user_type == "admin" ? route("quotes.show.acrobat-forms", $quote ? $quote->id : 0) : "javascript:void(0)";
                return '<a href="' . $url . '" class="link" data-toggle="tooltip" data-placement="top" data-title="View Details">' . $record->business_owner . '</a>';
            })
            ->addColumn('city', function ($record) {
                return $record->city;
            })
            ->addColumn('service', function ($record) {
                return config('policyservices.' . $record->service_type);
            })
            ->addColumn('business_name', function ($record) {
                return $record->business_name;
            })
            ->addColumn('partner_name', function ($record) {
                $result = NULL;
                if ($record->partner_id > 0) {
                    $partner = User::find($record->partner_id);
                    if ($partner) {
                        $result =  getFullName($partner);
                    }
                }
                return $result;
            })
            ->addColumn('status', function ($record) {
                return '<span class="badge bg-' . statusClasses($record->status) . '">' . ucwords(formatString($record->status)) . '</span>';
            })
            ->rawColumns(['actions', 'business_owner', 'city', 'business_name', 'service', 'status', 'partner_name'])
            ->addIndexColumn()->make(true);
    }

    public function requestAQuoteByPartner(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('backend.quotes.form');
        }
        $validator = Validator::make($request->all(), [
            'service_type' => 'required',
            'business_name' => 'required',
            'owner_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required',
            'client_name' => 'required',
            'client_email' => 'required|email|unique:users,email',
            'client_phone' => 'required',
            'client_address' => 'required',
            'client_city' => 'required',
            'client_state' => 'required',
            'client_zip_code' => 'required',
            'client_business_type_other' => 'required_if:client_business_type,other',
            'client_business_organization_other' => 'required_if:client_business_organization,other',
            'year_business_started' => 'required',
            'year_business_started_other' => 'required_if:year_business_started,other',
            'password' => 'required|confirmed',
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

            $quote = Quote::create([
                'partner_id' => auth()->user()->id,
                'service_type' => $request->service_type,
                'business_name' => $request->business_name,
                'business_owner' => $request->owner_name,
                'business_email' => $request->email,
                'organization' => $request->client_business_organization,
                'organization_other' => $request->client_business_organization_other,
                'business_address' => $request->client_address,
                'business_telephone' => $request->phone,
                'city' => $request->client_city,
                'state' => $request->client_state,
                'zip_code' => $request->client_zip_code,
                'fein' => isset($request->client_fein) ? $request->client_fein : null,
                'year_business_started' => $request->year_business_started,
                'year_business_started_other' => $request->year_business_started_other,
                'business_kind' => $request->client_business_type,
                'business_kind_other' => $request->client_business_type_other,
                'no_of_employees' => $request->client_no_of_employees,
                'status' => 'pending',
            ]);

            $data = [
                'business_name' => $request->business_name,
                'user_id' => $user->id,
                'quote_id' => $quote->id,
                'partner_id' => auth()->user()->id,
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
                'status' => 'inactive',
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
            DB::commit();
            
            $userId = $user->id;
            $data = [
                'business_email' => $request->business_email,
                'business_name' => $request->business_name,
            ];
            // Mail::to(env('ADMIN_EMAIL'))->send(new ContactUsMail($data));
            // Mail::to($request->business_email)->cc(config('services.adminemail'))->send(new QuoteRequestMail($request->business_email, $newUser, $newUserPassword));
            return response()->json([
                'success' => JsonResponse::HTTP_OK,
                'message' => 'Quote requested successfully',
                'redirectUrl' => route('quotes.index'),
            ], JsonResponse::HTTP_OK);
        } catch (\Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage()
            ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function acrobatForms($quoteId)
    {
        $quote = Quote::findOrFail($quoteId);
        $client = Client::where('quote_id', $quoteId)->first();
        return view('backend.clients.acrobat_forms', compact('quote', 'client'));
    }

    public function acrobatPrintForm($quoteId, $formId)
    {
        $quote = Quote::findOrFail($quoteId);
        $client = Client::where('quote_id', $quoteId)->first();
        if($formId == 125) {
            $data['date'] = Carbon::today()->format('d-m-Y');
            $pdf = Pdf::loadView('backend.clients.forms.form125', compact('quote', 'client', 'data'));
            return $pdf->stream('125.pdf');
            // return view('backend.clients.forms.form125', compact('quote', 'client'));
        } elseif($formId == 126) {
            $pdf = Pdf::loadView('backend.clients.forms.form126', compact('quote', 'client'));
            return $pdf->stream('126.pdf');
        } else {
            $pdf = Pdf::loadView('backend.clients.forms.form140', compact('quote', 'client'));
            return $pdf->download('140.pdf');
            // return view('backend.clients.forms.form140', compact('quote', 'client'));
        }
    }
    
    public function createProposal(Request $request, $quoteId)
    {
        $quote = Quote::where('id', $quoteId)->first();
        if ($request->isMethod('get')) {
            $client = Client::where('quote_id', $quoteId)->first();
            if ($quote->service_type == 'worker_compensation') {
                return view('backend.quotes.workr_comp_proposal_form', compact('client', 'quote'));
            } else {
                return view('backend.quotes.general_insurance_proposal_form', compact('client', 'quote'));
            }
        }

        $validator = Validator::make($request->all(), [
            'client_id' => 'required',
            'quote_id' => 'required',
            'business_name' => 'required',
            'owner_name' => 'required',
            'business_telephone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip_code' => 'required',
            'insurance_carrier' => 'required',
            'down_payment' => 'required',
            'monthly_payment' => 'required',
            'no_of_monthly_payment' => 'required',
            'total' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => JsonResponse::HTTP_UNPROCESSABLE_ENTITY,
                'message' => $validator->errors()->first(),
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            DB::beginTransaction();
            $client = Client::where('id', $request->client_id)->first();
            if ($quote->service_type == 'worker_compensation') {
                $data = [
                    'client_id' => $request->client_id,
                    'quote_id' => $request->quote_id,
                    'business_name' => $request->business_name,
                    'owner_name' => $request->owner_name,
                    'business_telephone' => $request->business_telephone,
                    'address' => $request->address,
                    'city' => $request->city,
                    'state' => $request->state,
                    'zip_code' => $request->zip_code,
                    'insurance_carrier' => $request->insurance_carrier,
                    'down_payment' => $request->down_payment,
                    'monthly_payment' => $request->monthly_payment,
                    'no_of_monthly_payment' => $request->no_of_monthly_payment,
                    'finance_charge' => $request->finance_charge,
                    'total' => $request->total,
                    'dbl_policy_cost' => $request->dbl_policy_cost,
                    'brokers_fee_wc' => $request->brokers_fee_wc,
                    'brokers_fee_wc_other' => $request->brokers_fee_wc_other,
                    'service_fee_dbl' => $request->service_fee_dbl,
                    'service_fee_dbl_other' => $request->service_fee_dbl_other,
                    'wc_coverage_by_accident' => $request->wc_coverage_by_accident,
                    'wc_coverage_by_accident_other' => $request->wc_coverage_by_accident_other,
                    'wc_coverage_each_employee' => $request->wc_coverage_each_employee,
                    'wc_coverage_each_employee_other' => $request->wc_coverage_each_employee_other,
                    'policy_limit' => $request->policy_limit,
                    'disability_weekly_pay' => $request->disability_weekly_pay,
                ];
            } else {
                $data = [
                    'client_id' => $request->client_id,
                    'quote_id' => $request->quote_id,
                    'business_name' => $request->business_name,
                    'owner_name' => $request->owner_name,
                    'business_telephone' => $request->business_telephone,
                    'address' => $request->address,
                    'city' => $request->city,
                    'state' => $request->state,
                    'zip_code' => $request->zip_code,
                    'insurance_carrier' => $request->insurance_carrier,
                    'down_payment' => $request->down_payment,
                    'monthly_payment' => $request->monthly_payment,
                    'no_of_monthly_payment' => $request->no_of_monthly_payment,
                    'finance_charge' => $request->finance_charge,
                    'total' => $request->total,
                    'aggregate' => $request->aggregate,
                    'aggregate_other' => $request->aggregate_other,
                    'products_complicated_oprations' => $request->products_complicated_oprations,
                    'products_complicated_oprations_other' => $request->products_complicated_oprations_other,
                    'each_occurence' => $request->each_occurence,
                    'each_occurence_other' => $request->each_occurence_other,
                    'damage_to_rented_premises' => $request->damage_to_rented_premises,
                    'damage_to_rented_premises_other' => $request->damage_to_rented_premises_other,
                    'medical_expenses' => $request->medical_expenses,
                    'medical_expenses_other' => $request->medical_expenses_other,
                    'business_personal_property' => $request->business_personal_property,
                    'business_personal_property_other' => $request->business_personal_property_other,
                    'building_coverage' => $request->building_coverage,
                    'building_coverage_other' => $request->building_coverage_other,
                    'deductible' => $request->deductible,
                    'deductible_other' => $request->deductible_other,
                    'service_fee' => $request->service_fee,
                    'service_fee_other' => $request->service_fee_other,
                    'liqour_interruption' => $request->liqour_interruption,
                    'business_interruption' => $request->business_interruption,
                    'professional_liability' => $request->professional_liability,
                    'theft' => $request->theft,
                    'food_water_damage' => $request->food_water_damage,
                    'vandalism' => $request->vandalism,
                    'fire_wind' => $request->fire_wind,
                ];

            }
            $proposal = Proposal::create($data);
            Quote::where('id', $client->quote_id)->update(['status' => 'ready_quote']);
            $client->update(['status' => 'active', 'proposal_id' => $proposal->id]);
            
            $data = [
                'name' => $request->client_name,
                'email' => $client->email,
                'message' => __('messages.proposal_has_been_created_please_review_and_sign'),
            ];
            $ccMail[] = config('services.adminemail');
            if ($client->partner_id > 0) {
                $partner = User::find($client->partner_id);
                if ($partner) {
                    $ccMail[]= $partner->email;
                }
            }
            // dd($ccMail);
            Mail::to($client->email)->cc($ccMail)->send(new ProposalCreatedMail($data));
            DB::commit();

            return response()->json([
                'success' => JsonResponse::HTTP_OK,
                'message' => 'Proposal created successfully',
                'redirectUrl' => route('quotes.index', 'partner'),
            ], JsonResponse::HTTP_OK);
        } catch (\Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage()
            ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function downloadProposal($clientId, $proposalId)
    {
        $proposalData = Proposal::findOrFail($proposalId);
        $quote = Quote::where('id', $proposalData->quote_id)->first();
        $date = Carbon::parse($proposalData->created_at)->format('F j, Y');
        // $client = Client::where('id', $clientId)->first();
        if ($proposalData->status == 'signed') {
            // download file path in proposal signed
        } else {
            if ($quote->service_type == 'worker_compensation') {
                $pdf = Pdf::loadView('backend.clients.forms.wc_proposal_form', compact('proposalData', 'date'));
                return $pdf->download("Worker's Compensation _Proposal.pdf");
            }
            $pdf = Pdf::loadView('backend.clients.forms.bo_proposal_form', compact('proposalData', 'date'));
            return $pdf->download('Business Owners Proposal.pdf');
        }
    }
    
    public function signProposal(Request $request, $clientId)
    {
        if ($request->isMethod('get')) {
            $client = Client::find($clientId);
            return view('backend.quotes.sign_proposal_modal', compact('client'));
        }

        dd($request->all());
        $validator = Validator::make($request->all(), [
            'client_name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => JsonResponse::HTTP_UNPROCESSABLE_ENTITY,
                'message' => $validator->errors()->first(),
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            DB::beginTransaction();
            $client = Client::where('id', $request->client_id)->first();
            
            $data = [
                'name' => $request->client_name,
                'email' => $client->email,
                'message' => __('messages.proposal_has_been_signed_successfully'),
            ];
            $ccMail = config('services.adminemail');
            if ($client->partner_id > 0) {
                $partner = User::find($client->partner_id);
                if ($partner) {
                    $ccMail .= ',' . $partner->email;
                }
            }
            Mail::to($request->business_email)->cc($ccMail)->send(new ProposalCreatedMail($data));
            DB::commit();

            return response()->json([
                'success' => JsonResponse::HTTP_OK,
                'message' => 'Proposal Signed successfully',
            ], JsonResponse::HTTP_OK);
        } catch (\Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage()
            ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}