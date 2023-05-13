<?php

namespace App\Http\Controllers;

use App\Models\Buy;
use App\Models\Bike;
use App\Models\Sele;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'Penjualan | SMAC',
            'judul' => 'Penjualan',
            'breadcumb1' => 'Transaksi',
            'breadcumb2' => 'Penjualan',
            'no_polisi' => DB::table('bikes')->select('no_polisi', 'id')->where('status', 'READY STOCK')->get()
        ];
        return view('penjualan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'Tambah Transaksi Penjualan | SMAC',
            'judul' => 'Tambah Transaksi Penjualan',
            'breadcumb1' => 'Pembelian',
            'breadcumb2' => 'Tambah Transaksi Penjualan',

        ];
        return view('penjualan.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function tambah_data(Request $request)
    {
        if ($request->jenis_pembayaran == '') {
            $rules = [
                'no_polisi' => 'required',
                'jenis_pembayaran' => 'required',
                'tanggal_jual' => 'required',
                'nama_pembeli' => 'required',
            ];
            $pesan = [
                'no_polisi.required' => 'Pilih Nomor Polisi',
                'jenis_pembayaran.required' => 'Pilih Jenis Pembayaran',
                'tanggal_jual.required' => 'Tidak boleh kosong',
                'nama_pembeli.required' => 'Tidak boleh kosong',
            ];
        } else if ($request->jenis_pembayaran == 'CASH') {
            $rules = [
                'no_polisi' => 'required',
                'jenis_pembayaran' => 'required',
                'harga_jual' => 'required',
                'jumlah_bayar' => 'required',
                'tanggal_jual' => 'required',
                'nama_pembeli' => 'required',
            ];
            $pesan = [
                'no_polisi.required' => 'Pilih Nomor Polisi',
                'jenis_pembayaran.required' => 'Pilih Jenis Pembayaran',
                'jumlah_bayar.required' => 'Tidak boleh kosong',
                'harga_jual.required' => 'Tidak boleh kosong',
                'tanggal_jual.required' => 'Tidak boleh kosong',
                'nama_pembeli.required' => 'Tidak boleh kosong',
            ];
        }
        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        } else {
            if ($request->jenis_pembayaran == 'CASH') {
                if ($request->kembali < "0") {
                    return response()->json(['error' => 'Jumlah bayar tidak boleh kurang dari harga beli']);
                }

                $trx = 'TRXSALE-00';
                $last_trx = Sele::orderBy('id', 'DESC')->first();
                if ($last_trx == NULL) {
                    $random_num = 1;
                } else {
                    $last_nota = explode('-', $last_trx->nota);
                    $random_num = $last_nota[1] + 1;
                }
                $nota = $trx . $random_num;
                $data = [
                    'unique' => Str::orderedUuid(),
                    'nota' => $nota,
                    'pembeli' => ucwords(strtolower($request->nama_pembeli)),
                    'bike_id' => $request->no_polisi,
                    'tanggal_jual' => $request->tanggal_jual,
                    'harga_beli' => $request->harga_beli,
                    'harga_jual' => $request->harga_jual,
                ];
                Sele::create($data);
                Bike::where('id', $request->no_polisi)->update(['status' => 'TERJUAL']);
                return response()->json(['success' => 'Data Penjualan Berhasil Ditambahkan']);
            }
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

    public function dataTables()
    {
        $query = DB::table('seles')
            ->join('bikes', 'bikes.id', '=', 'seles.bike_id')
            ->get();
        foreach ($query as $row) {
            $row->tanggal_jual = tanggal_hari($row->tanggal_jual);
            $row->harga_jual = rupiah($row->harga_jual);
        }
        return DataTables::of($query)->addColumn('action', function ($row) {
            $actionBtn =
                '<a href="/edit-transaksi/' . $row->unique . '" class="btn btn-success btn-sm edit-button" data-id="' . $row->id . '"><i class="flaticon-381-edit-1"></i></a>
                <form onSubmit="JavaScript:submitHandler()" action="javascript:void(0)" class="d-inline form-delete">
                    <button type="button" class="btn btn-danger btn-sm delete-button" data-token="' . csrf_token() . '" data-id="' . $row->id . '"><i class="flaticon-381-trash-1"></i></button>
                </form>';
            return $actionBtn;
        })->make(true);
    }
}
