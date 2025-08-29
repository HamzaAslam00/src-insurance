<?php

namespace App\Http\Controllers\Backend;

use App\Models\Document;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class PersonalFileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.personal_file.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function destroy(string $id)
    {
        //
    }

    public function dataTable(Request $request)
    {
        $user_id = Auth::user()->id;
        $documents = Document::where('user_id', $user_id)->orderBy('id', 'desc')->get();
        return Datatables::of($documents)
            ->addColumn('actions', function ($record) {
                $actions = '';
                if (auth()->user()->hasPermissionTo('view_personal_file')) {
                    $actions = '<div class="btn-list">';
                    if (auth()->user()->hasPermissionTo('view_personal_file')) {
                        $actions .= '<a href="' . asset('storage/' . $record->file_path) . '" target="_blank"  class="btn btn-sm btn-primary">
                            <i class="fa fa-eye"></i>  
                            </a>';
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
