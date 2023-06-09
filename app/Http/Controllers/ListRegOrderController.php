<?php

namespace App\Http\Controllers;

use App\Models\Regorder;
use Illuminate\Http\Request;
use App\Models\List_regorder;
use Yajra\DataTables\Facades\DataTables;

class ListRegOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(List_regorder $list_regorder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(List_regorder $list_regorder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, List_regorder $list_regorder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(List_regorder $list_regorder)
    {
        //
    }

    public function dataTables(Request $request)
    {
        $query = List_regorder::dataTables($request->id);
        return DataTables::of($query)->addColumn('action', function ($row) {
            $actionBtn =
                '<button class="btn btn-secondary btn-sm list-order-button" data-unique="' . $row->unique . '"><i class="bi-folder-plus"></i></button>
                <form onSubmit="JavaScript:submitHandler()" action="javascript:void(0)" class="d-inline form-delete">
                    <button type="button" class="btn btn-danger btn-sm delete-button" data-token="' . csrf_token() . '" data-unique="' . $row->unique . '"><i class="text-white bi-trash"></i>
                </form>';
            return $actionBtn;
        })->make(true);
    }
}
