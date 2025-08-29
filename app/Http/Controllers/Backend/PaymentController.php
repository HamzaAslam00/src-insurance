<?php

namespace App\Http\Controllers\Backend;

use App\Models\Policy;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;



class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($policyId)
    {
        $policy = Policy::with('client')->findOrFail($policyId);
        return view('backend.payments.index', compact('policy'));
    }

    public function create($policyId)
    {
        $policy = Policy::with('client')->findOrFail($policyId);
        // dd($policy);
        return view('backend.payments.modal', compact('policy'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $policyId)
    {
        $validator = Validator::make($request->all(), [
            'transaction_date' => 'required|date',
            'payment_method' => 'required|string',
            'paid_amount' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => JsonResponse::HTTP_UNPROCESSABLE_ENTITY,
                'message' => $validator->errors()->first(),
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        }
        try {
            DB::beginTransaction();

            $payment = Payment::create([
                'policy_id' => $policyId, // Use policy ID passed from route or request
                'paid_amount' => $request->paid_amount,
                'transaction_date' => $request->transaction_date,
                'payment_method' => $request->payment_method,
            ]);

            DB::commit();

            return response()->json([
                'success' => JsonResponse::HTTP_OK,
                'message' => 'Payment added successfully.',
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
    public function show($policy, string $id)
    {
        $payment = Payment::with('policy.client')->findOrFail($id);
        return view('backend.payments.view_modal',compact('payment', 'policy'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($policy, string $id)
    {

        $payment = Payment::with('policy.client')->findOrFail($id);
        // dd($policy,$payment);
        return view('backend.payments.modal', compact('payment', 'policy'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $policyId, string $id)
    {
        $validator = Validator::make($request->all(), [
            'transaction_date' => 'required|date',
            'payment_method' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => JsonResponse::HTTP_UNPROCESSABLE_ENTITY,
                'message' => $validator->errors()->first(),
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $payment = Payment::findOrFail($id);
            $payment->update([
                'policy_id' => $policyId, // Use policy ID passed from route or request
                'paid_amount' => $request->paid_amount,
                'transaction_date' => $request->transaction_date,
                'payment_method' => $request->payment_method,
            ]);
            return response()->json([
                'success' => JsonResponse::HTTP_OK,
                'message' => 'Payment updated successfully.',
            ], JsonResponse::HTTP_OK);

        } catch (\Exception $e) {
            return response()->json([
                'status' => JsonResponse::HTTP_INTERNAL_SERVER_ERROR,
                'message' => $e->getMessage(),
            ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    public function destroy($policy, string $id)
    {
        try {
            $payment = Payment::findOrFail($id);
            $payment->delete();
            return response()->json([
                'success' => JsonResponse::HTTP_OK,
                'message' => 'Payment deleted successfully'
            ], JsonResponse::HTTP_OK);
        } catch (\Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage()
            ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
        public function dataTable(Request $request, $policy)
        {
            $payment = Payment::where('policy_id', $policy)->orderBy('id', 'desc')->get();
            return Datatables::of($payment)
                ->addColumn('actions', function ($record) use ($policy) {
                    $actions = '';
                    if (auth()->user()->hasPermissionTo('view_payments') || auth()->user()->hasPermissionTo('edit_payment') || auth()->user()->hasPermissionTo('delete_payment')) {
                        $actions = '<div class="btn-list">';

                        if (auth()->user()->hasPermissionTo('edit_payment')) {
                            $actions .= '<a data-act="ajax-modal" data-action-url="' . route('payments.edit', [$policy, $record->id]) . '" data-title="' . __('messages.edit_payments') . '" class="btn btn-sm btn-primary">
                                            <span class="fe fe-edit"> </span>
                                         </a>';
                        }
                        if (auth()->user()->hasPermissionTo('view_payments')) {
                            $actions .= '<a data-act="ajax-modal" data-action-url="' . route('payments.show', [$policy, $record->id]) . '" data-title="' . __('messages.print_invoice') . '" class="btn btn-sm btn-primary">
                                            <span class="fe fe-eye"> </span>
                                         </a>';
                        }

                        if (auth()->user()->hasPermissionTo('delete_payment')) {
                            $actions .= '<button type="button" class="btn btn-sm btn-danger delete" data-url="' . route('payments.destroy', [$policy, $record->id]) . '" data-method="get" data-table="#payments_datatable">
                                            <span class="fe fe-trash-2"> </span>
                                        </button>';
                        }
                        $actions .= '</div>';
                    }
                    return $actions;
                })
                ->addColumn('payment_method', function ($record) {
                    return ucwords(formatString($record->payment_method));
                })
                ->rawColumns(['actions', 'payment_method'])
                ->addIndexColumn()->make(true);
        }
}
