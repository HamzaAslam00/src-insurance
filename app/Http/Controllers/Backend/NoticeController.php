<?php

namespace App\Http\Controllers\Backend;

use App\Mail\NoticeMail;
use Carbon\Carbon;
use App\Models\Notice;
use App\Models\Policy;
use Illuminate\Http\Request;
use App\Mail\CreatePolicyMail;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($policy)
    {
        return view('backend.notices.index', compact('policy'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($policy)
    {
        return view('backend.notices.modal', compact('policy'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $policy)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required_if:file,null',
            'file' => 'required_if:title,null',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => JsonResponse::HTTP_UNPROCESSABLE_ENTITY,
                'message' => $validator->errors()->first(),
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            DB::beginTransaction();
            $file = null;
            if ($request->hasFile('file')) {
                $file = saveAnyFile($request->file, 'notices', $request->title);
            }
            $notice = Notice::create([
                'policy_id' => $policy,
                'title' => $request->title,
                'description' => $request->description,
                'file' => $file,
                'required_followup' => isset($request->required_followup) ? 1 : 0,

            ]);
            if ($request->send_mail) {
                $clientPolicy = Policy::with('client')->findOrFail($policy);
                $clientMail = $clientPolicy->client->client_email;
                Mail::to($clientMail)->send(new NoticeMail($clientPolicy->client->client_name));
            }

            DB::commit();

            return response()->json([
                'success' => JsonResponse::HTTP_OK,
                'message' => 'Notice added successfully.',
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
        $notice = Notice::findOrFail($id);
        return view('backend.notices.view_modal', compact('notice', 'policy'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($policy, string $id)
    {
        $notice = Notice::findOrFail($id);
        return view('backend.notices.modal', compact('notice', 'policy'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $policy, string $id)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required_if:file,null',
            'file' => 'required_if:title,null',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => JsonResponse::HTTP_UNPROCESSABLE_ENTITY,
                'message' => $validator->errors()->first(),
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            // $policyId = ($policy == 'all-policies') ? null : $policy;
            $notice = Notice::findOrFail($id);
            $notice->update([
                'policy_id' => $policy,
                'title' => $request->title,
                'description' => $request->description,
                'required_followup' => isset($request->required_followup) ? 1 : 0,
            ]);
            if ($request->hasFile('file')) {
                $file = saveAnyFile($request->file, 'notices', $request->title);
                $notice->update(['file' => $file]);
            }

            return response()->json([
                'success' => JsonResponse::HTTP_OK,
                'message' => 'Notice updated successfully.',
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
    public function destroy($policy, string $id)
    {
        try {
            $notice = Notice::findOrFail($id);
            $notice->delete();
            return response()->json([
                'success' => JsonResponse::HTTP_OK,
                'message' => 'Notice deleted successfully'
            ], JsonResponse::HTTP_OK);
        } catch (\Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage()
            ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

        public function dataTable(Request $request, $policy)
        {
            // dd($policy->all());
            $notices = Notice::where('policy_id', $policy)->orderBy('id', 'desc')->get();

            return Datatables::of($notices)
                ->addColumn('actions', function ($record) use ($policy) {
                    $actions = '';
                    if (auth()->user()->hasPermissionTo('view_notices') || auth()->user()->hasPermissionTo('edit_notice') || auth()->user()->hasPermissionTo('delete_notice')) {
                        $actions = '<div class="btn-list">';
                        if (auth()->user()->hasPermissionTo('view_notices')) {
                            $actions .= '<a data-act="ajax-modal" data-action-url="' . route('notices-and-files.show', [$policy, $record->id]) . '" data-title="' . __('messages.notes_detail') . '" class="btn btn-sm btn-info" data-bs-placement="top" data-bs-toggle="tooltip" title="View notice details">
                                            <span class="fe fe-eye"> </span>
                                         </a>';
                        }

                        if (auth()->user()->hasPermissionTo('edit_notice')) {
                            $actions .= '<a data-act="ajax-modal" data-action-url="' . route('notices-and-files.edit', [$policy, $record->id]) . '" data-title="' . __('messages.edit_notes') . '" class="btn btn-sm btn-primary">
                                            <span class="fe fe-edit"> </span>
                                         </a>';
                        }


                        if (auth()->user()->hasPermissionTo('delete_notice')) {
                            $actions .= '<button type="button" class="btn btn-sm btn-danger delete" data-url="' . route('notices-and-files.destroy', [$policy, $record->id]) . '" data-method="get" data-table="#notices_datatable">
                                            <span class="fe fe-trash-2"> </span>
                                        </button>';
                        }
                        $actions .= '</div>';
                    }
                    return $actions;
                })
                ->addColumn('title', function ($record) use ($policy) {
                    $dataModel = auth()->user()->hasPermissionTo('edit_notice') ? 'ajax-modal' : '#';
                    return '<a href="javascript:void(0)" data-act="' . $dataModel . '" data-action-url="' . route('notices-and-files.edit', [$policy, $record->id]) . '" class="link" data-toggle="tooltip" data-placement="top" data-title="' . __('messages.edit_notes') . '">' . $record->title . '</a>';
                })

                ->addColumn('file', function ($record) {
                    if (!isset($record->file)) {
                        return 'N/A';
                    }
                    return '<a href="'. url('storage/'.$record->file) . '" target="_blank">View File</a>';
                })
                ->addColumn('description', function ($record) {
                    return addEllipsis(isValue($record->description));
                })

                ->addColumn('required_followup', function ($record) {
                    $status = $record->required_followup ? 'required' : 'final';
                    return '<span class="badge bg-' . statusClasses($status) . '">' . ucfirst($status) . '</span>';
                })
                ->addColumn('created_at', function ($record) {
                    return Carbon::parse($record->created_at)->toDateString();
                })
                ->rawColumns(['actions', 'title', 'file', 'description',  'required_followup', 'created_at'])
                ->addIndexColumn()->make(true);
        }
}
