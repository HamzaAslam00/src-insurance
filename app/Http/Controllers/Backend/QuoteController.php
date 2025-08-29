<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Quote;
use ReCaptcha\ReCaptcha;
use App\Mail\ContactUsMail;
use Illuminate\Http\Request;
use App\Mail\QuoteRequestMail;
use Illuminate\Http\JsonResponse;
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
            if (isset($user) && $user?->user_type != 'admin' && $user?->user_type != 'src_partner') {
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
    public function index(Request $request)
    {
        return view('backend.quotes.index');
    }

    public function show($id)
    {
        $quote = Quote::findOrFail($id);
        return view('backend.quotes.view_modal', compact('quote'));
    }
    public function create($id)
    {
        $quoteData = Quote::findOrFail($id);
        return view('backend.clients.form', compact('quoteData'));
    }
    public function destroy(string $id)
    {
        try {
            $quote = Quote::findOrFail($id);
            $quote->delete();
            return response()->json([
                'success' => JsonResponse::HTTP_OK,
                'message' => 'Quote  deleted successfully'
            ], JsonResponse::HTTP_OK);
        } catch (\Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage()
            ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function dataTable(Request $request)
    {
        $pendingQuotes = Quote::orderBy('id', 'desc');

        return Datatables::of($pendingQuotes)
            ->addColumn('actions', function ($record) {
                $actions = '<div class="btn-list">';
                if (auth()->user()->hasPermissionTo('view_pending_quotes')) {
                    $actions .= '<a data-act="ajax-modal" data-action-url="' . route('quotes.show', $record->id) . '" data-title="' . __('messages.requested_quote') . '" class="btn btn-sm btn-info">
                                    <span class="fe fe-eye"> </span>
                                 </a>';
                }

                if (auth()->user()->hasPermissionTo('delete_pending_quote')) {
                    $actions .= '<button type="button" class="btn btn-sm btn-danger delete" data-url="' . route('quotes.destroy', $record->id) . '" data-method="get" data-table="#quote_datatable">
                                    <span class="fe fe-trash-2"> </span>
                                </button>';
                }
                if (auth()->user()->hasPermissionTo('view_pending_quotes') && $record->status !== 'replied') {
                    $actions .= '<a href="' . route('quotes.create', $record->id) . '" data-title="Requested Quote" class="btn btn-sm btn-info">
                                    <span class="fe fe-edit-3"> </span>
                                </a>';
                }
                $actions .= '</div>';
                return $actions;
            })
            ->addColumn('business_owner', function ($record) {
                return $record->business_owner;
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
            ->addColumn('status', function ($record) {
                return '<span class="badge bg-' . statusClasses($record->status) . '">' . ucfirst($record->status) . '</span>';
            })
            ->rawColumns(['actions', 'business_owner', 'city', 'business_name', 'service', 'status'])
            ->addIndexColumn()->make(true);
    }

}
