<?php

namespace App\Http\Controllers;

use App\Models\Buy;
use App\Models\Bike;
use App\Models\Sele;
use App\Models\Buyer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
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
                'nik' => 'required',
                'alamat' => 'required',
            ];
            $pesan = [
                'no_polisi.required' => 'Pilih Nomor Polisi',
                'jenis_pembayaran.required' => 'Pilih Jenis Pembayaran',
                'tanggal_jual.required' => 'Tidak boleh kosong',
                'nama_pembeli.required' => 'Tidak boleh kosong',
                'nik.required' => 'Tidak boleh kosong',
                'alamat.required' => 'Tidak boleh kosong',
            ];
        } else if ($request->jenis_pembayaran == 'CASH') {
            $rules = [
                'no_polisi' => 'required',
                'jenis_pembayaran' => 'required',
                'harga_jual' => 'required',
                'jumlah_bayar' => 'required',
                'tanggal_jual' => 'required',
                'nama_pembeli' => 'required',
                'nik' => 'required',
                'alamat' => 'required',
            ];
            $pesan = [
                'no_polisi.required' => 'Pilih Nomor Polisi',
                'jenis_pembayaran.required' => 'Pilih Jenis Pembayaran',
                'jumlah_bayar.required' => 'Tidak boleh kosong',
                'harga_jual.required' => 'Tidak boleh kosong',
                'tanggal_jual.required' => 'Tidak boleh kosong',
                'nama_pembeli.required' => 'Tidak boleh kosong',
                'nik.required' => 'Tidak boleh kosong',
                'alamat.required' => 'Tidak boleh kosong',
            ];
        }
        //Mengubah base64 menjadi file image

        if ($request->photo_ktp) {
            $jenis_file = explode(":", $request->photo_ktp);
            $jenis_file2 = explode("/", $jenis_file[1]);
            $jenis_foto = $jenis_file2[0];
        }
        // Validasi Photo KTP
        $validator_photo_ktp = Validator::make([
            'photo_ktp' => base64_encode($request->photo_ktp),
        ], [
            'photo_ktp' => 'max:' . (2 * 1024 * 1024) // Batasan ukuran 2 megabyte
        ], [
            'photo_ktp.max' => 'Ukuran tidak boleh lebih dari 2MB.',
        ]);
        //Validasi base64 apakah sebuah gambar
        //Validasi Inputan yang Lain
        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()) {
            $send_error = [
                'errors' => $validator->errors(),
            ];
            if ($validator_photo_ktp->fails()) {
                $send_error['error_ktp'] = $validator_photo_ktp->errors();
            }
            if ($request->photo_ktp && $jenis_foto != 'image') {
                $send_error['error_ktp_type'] = 'File harus berupa gambar';
            }
            return response()->json($send_error);
        } else if ($validator_photo_ktp->fails()) {
            $send_error = [
                'error_ktp' => $validator_photo_ktp->errors(),
            ];
            return response()->json($send_error);
        } else if ($jenis_foto != 'image') {
            return response()->json(['error_ktp_type' => 'File harus berupa gambar',]);
        } else {
            if ($request->jenis_pembayaran == 'CASH') {
                if ($request->kembali < "0") {
                    return response()->json(['error' => 'Jumlah bayar tidak boleh kurang dari harga beli']);
                }
                //Cek apakah nik yang dikirim terdaftar di table buyers
                $buyer = Buyer::where('nik', $request->nik)->first();
                //Jika nik terdaftar di table
                if (!$buyer) {
                    //Jika nik tidak ada di table
                    $data_buyer = [
                        'unique' => Str::orderedUuid(),
                        'nik' => $request->nik,
                        'nama' => ucwords(strtolower($request->nama_pembeli)),
                        'alamat' => $request->alamat,
                    ];
                    //Upload jika ada gambar
                    if ($request->photo_ktp) {
                        $base_Image = $request->photo_ktp;  // your base64 encoded

                        $jenis_file = explode(":", $request->photo_ktp);
                        $jenis_file2 = explode("/", $jenis_file[1]);
                        $jenis_file3 = explode(";", $jenis_file2[1]);
                        $jenis_foto = $jenis_file3[0];
                        if ($jenis_foto == 'jpeg') {
                            $base_Image = str_replace('data:image/jpeg;base64,', '', $base_Image);
                        } else if ($jenis_foto == 'jpg') {
                            $base_Image = str_replace('data:image/jpg;base64,', '', $base_Image);
                        } else if ($jenis_foto == 'png') {
                            $base_Image = str_replace('data:image/png;base64,', '', $base_Image);
                        }
                        $base_Image = str_replace(' ', '+', $base_Image);
                        $name_Image = Str::random(40) . '.' . 'png';
                        File::put(storage_path() . '/app/public/ktp_pembeli/' . $name_Image, base64_decode($base_Image));
                        $data_buyer['photo_ktp'] = $name_Image;
                    }
                    Buyer::create($data_buyer);
                    //Ambil id buyer yang baru saja dimasukan ke table
                }
                //Membuat random nota
                $trx = 'TRXSALE-00';
                $last_trx = Sele::latest()->first();;
                if ($last_trx == NULL) {
                    $random_num = 1;
                } else {
                    $last_nota = explode('-', $last_trx->nota);
                    $random_num = $last_nota[1] + 1;
                }
                $nota = $trx . $random_num;
                $data_sele = [
                    'unique' => Str::orderedUuid(),
                    'nota' => $nota,
                    'bike_id' => $request->no_polisi,
                    'tanggal_jual' => $request->tanggal_jual,
                    'harga_beli' => preg_replace('/[,]/', '', $request->harga_beli),
                    'harga_jual' => preg_replace('/[,]/', '', $request->harga_jual),
                ];
                if ($buyer) {
                    $data_sele['buyer_id'] = $buyer->id;
                } else if (!$buyer) {
                    $last_input = Buyer::latest()->first();
                    $data_sele['buyer_id'] = $last_input->id;
                }
                Sele::create($data_sele);
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

    public function get_data(Request $request)
    {
        $data = DB::table('seles')
            ->join('bikes', 'bikes.id', '=', 'seles.bike_id')
            ->where('seles.id', $request->id)
            ->first();
        return response()->json(['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function update_data(Request $request)
    {
        $rules = [
            'harga_jual' => 'required',
            'jumlah_bayar' => 'required',
            'tanggal_jual' => 'required',
            'nama_pembeli' => 'required',
        ];
        $pesan = [
            'jumlah_bayar.required' => 'Tidak boleh kosong',
            'harga_jual.required' => 'Tidak boleh kosong',
            'tanggal_jual.required' => 'Tidak boleh kosong',
            'nama_pembeli.required' => 'Tidak boleh kosong',
        ];
        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }
        if ($request->kembali < "0") {
            return response()->json(['error' => 'Jumlah bayar tidak boleh kurang dari harga beli']);
        }

        $data = [
            'pembeli' => $request->nama_pembeli,
            'harga_jual' => preg_replace('/[,]/', '', $request->harga_jual),
            'tanggal_jual' => $request->tanggal_jual,
        ];

        Sele::where('id', $request->current_id)->update($data);
        return response()->json(['success' => 'Data Penjualan Berhasil Diupdate']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function cek_nik(Request $request)
    {
        $query = Buyer::where('nik', $request->nik)->first();
        return response()->json(['success' => $query]);
    }

    public function dataTables()
    {
        $query = DB::table('seles')
            ->join('bikes', 'bikes.id', '=', 'seles.bike_id')
            ->join('buyers', 'buyers.id', '=', 'seles.buyer_id')
            ->get();
        foreach ($query as $row) {
            $row->tanggal_jual = tanggal_hari($row->tanggal_jual);
            $row->harga_jual = rupiah($row->harga_jual);
        }
        return DataTables::of($query)->addColumn('action', function ($row) {
            $actionBtn =
                '<button class="btn btn-success btn-sm edit-button" data-id="' . $row->id . '"><i class="flaticon-381-edit-1"></i></button>
                <form onSubmit="JavaScript:submitHandler()" action="javascript:void(0)" class="d-inline form-delete">
                    <button type="button" class="btn btn-danger btn-sm delete-button" data-token="' . csrf_token() . '" data-id="' . $row->id . '"><i class="flaticon-381-trash-1"></i></button>
                </form>';
            return $actionBtn;
        })->make(true);
    }
}
