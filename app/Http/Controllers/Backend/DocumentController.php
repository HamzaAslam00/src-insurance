<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        return view('backend.users.documents.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($user)
    {
        return view('backend.users.documents.modal', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $user)
    {
        $validator = Validator::make($request->all(), [
            'document' => 'required|mimes:pdf,doc,docx',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => JsonResponse::HTTP_UNPROCESSABLE_ENTITY,
                'message' => $validator->errors()->first(),
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            DB::beginTransaction();
            $file = $request->file('document');
            $filename = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('documents', $filename, 'public');
            
            $document = Document::create([
                'user_id' => $user,
                'name' => $filename,
                'file_path' => $filePath,
            ]);
            
            DB::commit();
            return response()->json([
                'success' => JsonResponse::HTTP_OK,
                'message' => 'Document Upload successfully.',
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
    public function show(string $id, $doc_id)
    {
        $document = Document::where('user_id', $id)->where('id', $doc_id)->firstOrFail();
        
        $url = url('/storage/' . $document->file_path);
        
        return $url;
         
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
    public function destroy(string $user_id, $doc_id)
    {
        try {
            $document = Document::findOrFail($doc_id);
            $document->delete();
            return response()->json([
                'success' => JsonResponse::HTTP_OK,
                'message' => 'Document deleted successfully'
            ], JsonResponse::HTTP_OK);
        } catch (\Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage()
            ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    
    public function dataTable(Request $request, $user_id)
    {
        $documents = Document::where('user_id', $user_id)->orderBy('id', 'desc')->get();
        return Datatables::of($documents)
            ->addColumn('actions', function ($record) {
                $actions = '';
                if (auth()->user()->hasPermissionTo('view_documents') || auth()->user()->hasPermissionTo('delete_document')) {
                    $actions = '<div class="btn-list">';
                    if (auth()->user()->hasPermissionTo('view_documents')) {
                        $actions .= '<a href="' . asset('storage/' . $record->file_path) . '" target="_blank"  class="btn btn-sm btn-primary">
                                        <i class="fa fa-eye"></i>  
                                     </a>';
                    }
                    
                    if (auth()->user()->hasPermissionTo('delete_document')) {
                        $actions .= '<button type="button" class="btn btn-sm btn-danger delete" data-url="' . route('user.documents.destroy', [$record->user_id, $record->id]) . '" data-method="get" data-table="#user_documents_datatable">
                                        <span class="fe fe-trash-2"> </span>
                                    </button>';
                    }
                    $actions .= '</div>';
                }
                return $actions;
            })
            ->addColumn('name', function ($record) {
                return $record->name;
            })
            ->rawColumns(['actions', 'name'])
            ->addIndexColumn()->make(true);
    }
}
