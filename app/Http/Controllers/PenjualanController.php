<?php

namespace App\Http\Controllers;

use App\Models\Buy;
use App\Models\Bike;
use App\Models\Sele;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
            'no_polisi' => DB::table('bikes')->select('no_polisi', 'id')->get()
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
            ];
            $pesan = [
                'no_polisi.required' => 'Pilih Nomor Polisi',
                'jenis_pembayaran.required' => 'Pilih Jenis Pembayaran',
                'tanggal_jual.required' => 'Tidak boleh kosong',
            ];
        } else if ($request->jenis_pembayaran == 'CASH') {
            $rules = [
                'no_polisi' => 'required',
                'jenis_pembayaran' => 'required',
                'harga_jual' => 'required',
                'jumlah_bayar' => 'required',
                'tanggal_jual' => 'required',
            ];
            $pesan = [
                'no_polisi.required' => 'Pilih Nomor Polisi',
                'jenis_pembayaran.required' => 'Pilih Jenis Pembayaran',
                'jumlah_bayar.required' => 'Tidak boleh kosong',
                'harga_jual.required' => 'Tidak boleh kosong',
                'tanggal_jual.required' => 'Tidak boleh kosong',
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
                    'bike_id' => $request->no_polisi,
                    'tanggal_jual' => $request->tanggal_jual,
                    'harga_beli' => $request->harga_beli,
                    'harga_jual' => $request->harga_jual,
                ];

                Sele::create($data);
                return response()->json(['success' => 'Data penjualan berhasil ditambahkan']);
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
}
