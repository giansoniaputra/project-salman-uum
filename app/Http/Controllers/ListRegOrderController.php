<?php

namespace App\Http\Controllers;

use App\Models\Regorder;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\List_regorder;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

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
        $rules = [
            'nama_dealer' => 'required',
            'cmo' => 'required',
            'pic' => 'required',
            'jenis_transaksi' => 'required',
            'via' => 'required',
            'merk' => 'required',
            'type' => 'required',
            'tahun_pembuatan' => 'required',
            'otr' => 'required',
            'dp_po' => 'required',
            'pencairan' => 'required',
            'dp' => 'required',
            'angsuran' => 'required',
            'tenor' => 'required',
        ];
        $pesan = [
            'nama_dealer.required' => 'Nama dealer tidak boleh kosong',
            'cmo.required' => 'CMO tidak boleh kosong',
            'pic.required' => 'PIC/Seles tidak boleh kosong',
            'jenis_transaksi.required' => 'Jenis transaksi tidak boleh kosong',
            'via.required' => 'Kredit via tidak boleh kosong',
            'merk.required' => 'Merk tidak boleh kosong',
            'type.required' => 'Tipe motor tidak boleh kosong',
            'tahun_pembuatan.required' => 'Tahun pembuatan tidak boleh kosong',
            'dp.required' => 'DP tidak boleh kosong',
            'pencairan.required' => 'Nilai Pencairan jual tidak boleh kosong',
            'angsuran.required' => 'Angsuran tidak boleh kosong',
            'tenor.required' => 'Tenor tidak boleh kosong',
            'otr.required' => 'OTR tidak boleh kosong',
            'dp_po.required' => 'DP PO tidak boleh kosong',
        ];
        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        } else {
            $data = [
                'unique' => Str::orderedUuid(),
                'regorder_id' => $request->unique_no_reg,
                'nama_dealer' => ucwords(strtolower($request->nama_dealer)),
                'cmo' => ucwords(strtolower($request->cmo)),
                'pic' => ucwords(strtolower($request->pic)),
                'jenis_transaksi' => $request->jenis_kelamin,
                'via' => $request->via,
                'merk' => ucwords(strtolower($request->merk)),
                'type' => ucwords(strtolower($request->type)),
                'tahun_pembuatan' => $request->tahun_pembuatan,
                'otr' => $request->otr,
                'dp_po' => $request->dp_po,
                'pencairan' => $request->pencairan,
                'dp' => $request->dp,
                'angsuran' => $request->angsuran,
                'tenor' => $request->tenor,
                'status' => 'DALAM PENGAJUAN',
            ];
            List_regorder::create($data);
            return response()->json(['success' => 'List Order Berhasil Ditambahkan']);
        }
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
