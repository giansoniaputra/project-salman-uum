<?php

namespace App\Http\Controllers;

use App\Models\Buy;
use App\Models\Bike;
use App\Models\Consumer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=[
            'title'=> 'Pembelian | SMAC',
            'judul'=> 'Pembelian',
            'breadcumb1' => 'Pembelian',
            'breadcumb2' => 'Data Motor',
        ];
        return view('pembelian.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data=[
            'title'=> 'Pembelian | SMAC',
            'judul'=> 'Pembelian',
            'breadcumb1' => 'Pembelian',
            'breadcumb2' => 'Tambah Transaksi',

        ];
        return view('pembelian.create',$data);
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'nik' => 'required',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'merek' => 'required',
            'daya' => 'required',
            'tahun_pembuatan' => 'required',
            'warna' => 'required',
            'no_rangka' => 'required',
            'bpkb' => 'required',
            'type' => 'required',
            'bahan_bakar' => 'required',
            'no_polisi' => 'required',
            'berlaku_sampai' => 'required',
            'harga_beli' => 'required',
            'tanggal_beli' => 'required',
            'photo_stnk' => 'image|file|max:3072',
            'photo_bpkb' => 'image|file|max:3072',
        ];
        $pesan = [
            'nik.required' => 'Tidak boleh Kosong' ,
            'nama.required' => 'Tidak boleh Kosong' ,
            'tempat_lahir.required' => 'Tidak boleh Kosong' ,
            'tanggal_lahir.required' => 'Tidak boleh Kosong' ,
            'alamat.required' => 'Tidak boleh Kosong' ,
            'merek.required' => 'Tidak boleh Kosong',
            'daya.required' => 'Tidak boleh Kosong',
            'tahun_pembuatan.required' => 'Tidak boleh Kosong',
            'warna.required' => 'Tidak boleh Kosong',
            'no_rangka.required' => 'Tidak boleh Kosong',
            'bpkb.required' => 'Tidak boleh Kosong',
            'type.required' => 'Tidak boleh Kosong',
            'bahan_bakar.required' => 'Tidak boleh Kosong',
            'no_polisi.required' => 'Tidak boleh Kosong',
            'berlaku_sampai.required' => 'Tidak boleh Kosong',
            'harga_beli.required' => 'Tidak boleh Kosong',
            'tanggal_beli.required' => 'Tidak boleh Kosong',
            // 'photo_pria.required' => 'Gambar Tidak Boleh Kosong',
            // 'photo_wanita.required' => 'Gambar Tidak Boleh Kosong',
            'photo_stnk.image' => 'File Harus Berupa Gambar',
            'photo_bpkb.image' => 'File Harus Berupa Gambar',
            'photo_stnk.max' => 'Gambar Minimal Berukuran 3MB',
            'photo_bpkb.max' => 'Gambar Minimal Berukuran 3MB',
         ];
         $validator = Validator::make($request->all(),$rules, $pesan);
         if ($validator->fails()) {
            return redirect()
                ->back()
                ->with('error', 'Pastikan anda menginput dengan benar')
                ->withErrors($validator)
                ->withInput();
        } else {
         $consumer = Consumer::where('nik', $request->nik)->first();

        if(!$consumer){
            $data_consumer = [
                'unique' => Str::random(36),
                'nik' => $request->nik,
                'nama' => ucwords(strtolower($request->nama)),
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->alamat,
             ];

             Consumer::create($data_consumer);
            }
        $path1 = $request->file('photo_stnk')->store('stnk');
        $path2 = $request->file('photo_bpkb')->store('bpkb');
        $data_motor = [
            'unique' => Str::random(26),
            'merek' => ucwords(strtolower($request->merek)),
            'daya' => $request->daya,
            'tahun_pembuatan' => $request->tahun_pembuatan,
            'warna' => ucwords(strtolower($request->warna)),
            'no_rangka' => $request->no_rangka,
            'bpkb' => $request->bpkb,
            'type' => $request->type,
            'bahan_bakar' => ucwords(strtolower($request->bahan_bakar)),
            'no_polisi' => strtoupper($request->no_polisi),
            'berlaku_sampai' => $request->berlaku_sampai,
            'status' => 'READY STOCK',
            'photo_stnk' => $path1,
            'photo_bpkb' => $path2,
        ];
        Bike::create($data_motor);

        if($consumer) {
            $consumer_id = $consumer->id;
        } else {
            $last_consumer = Consumer::orderBy('id', 'DESC')->first();
            $consumer_id = $last_consumer->id;
        }

        $last_motor = Bike::orderBy('id', 'DESC')->first();
        
        $data_transaksi = [
            'unique' => Str::random(36),
            'consumer_id' => $consumer_id,
            'bike_id' => $last_motor->id,
            'tanggal_beli' => $request->tanggal_beli,
            'harga_beli' => $request->harga_beli,
        ];

        Buy::create($data_transaksi);

        return redirect('/pembelian')->with('success', 'Data Transaksi Berhasil Ditambahkan');
            
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Buy $buy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buy $buy)
    {
        
    }

    public function page_edit(Buy $buy)
    {
        
        $data = [
            'title'=> 'Edit Pembelian | SMAC',
            'judul'=> 'Edit Data Pembelian',
            'breadcumb1' => 'Pembelian',
            'breadcumb2' => 'Edit Data Pembelian',
            'beli' => $buy,
            'motor' => $buy->bike,
            'consumer' => $buy->consumer,

        ];
        return view('pembelian.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $buy)
    {
        $rules = [
            'nik' => 'required',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'merek' => 'required',
            'daya' => 'required',
            'tahun_pembuatan' => 'required',
            'warna' => 'required',
            'no_rangka' => 'required',
            'bpkb' => 'required',
            'type' => 'required',
            'bahan_bakar' => 'required',
            'no_polisi' => 'required',
            'berlaku_sampai' => 'required',
            'harga_beli' => 'required',
            'tanggal_beli' => 'required',
            'photo_stnk' => 'image|file|max:3072',
            'photo_bpkb' => 'image|file|max:3072',
        ];
        $pesan = [
            'nik.required' => 'Tidak boleh Kosong' ,
            'nama.required' => 'Tidak boleh Kosong' ,
            'tempat_lahir.required' => 'Tidak boleh Kosong' ,
            'tanggal_lahir.required' => 'Tidak boleh Kosong' ,
            'alamat.required' => 'Tidak boleh Kosong' ,
            'merek.required' => 'Tidak boleh Kosong',
            'daya.required' => 'Tidak boleh Kosong',
            'tahun_pembuatan.required' => 'Tidak boleh Kosong',
            'warna.required' => 'Tidak boleh Kosong',
            'no_rangka.required' => 'Tidak boleh Kosong',
            'bpkb.required' => 'Tidak boleh Kosong',
            'type.required' => 'Tidak boleh Kosong',
            'bahan_bakar.required' => 'Tidak boleh Kosong',
            'no_polisi.required' => 'Tidak boleh Kosong',
            'berlaku_sampai.required' => 'Tidak boleh Kosong',
            'harga_beli.required' => 'Tidak boleh Kosong',
            'tanggal_beli.required' => 'Tidak boleh Kosong',
            'photo_stnk.image' => 'File Harus Berupa Gambar',
            'photo_bpkb.image' => 'File Harus Berupa Gambar',
            'photo_stnk.max' => 'Gambar Minimal Berukuran 3MB',
            'photo_bpkb.max' => 'Gambar Minimal Berukuran 3MB',
         ];
         $validator = Validator::make($request->all(),$rules, $pesan);
         if ($validator->fails()) {
            return redirect()
                ->back()
                ->with('error', 'Pastikan anda menginput dengan benar')
                ->withErrors($validator)
                ->withInput();
        } else {
            $beli = Buy::where('unique', $buy)->first();
            $motor = Bike::where('id', $beli->bike_id)->first();
            $consumer = Consumer::where('id', $beli->consumer_id)->first();

            //Update Consumer

            $data_consumer = [
                'nik' => $request->nik,
                'nama' => ucwords(strtolower($request->nama)),
                'tempat_lahir' => ucwords(strtolower($request->tempat_lahir)),
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->alamat,
             ];

             Consumer::where('id', $consumer->id)->update($data_consumer);

            //  Update Motor
             if($request->file('photo_stnk') == NULL && $request->file('photo_bpkb') != NULL){
                $data_motor = [
                    'merek' => ucwords(strtolower($request->merek)),
                    'daya' => $request->daya,
                    'tahun_pembuatan' => $request->tahun_pembuatan,
                    'warna' => ucwords(strtolower($request->warna)),
                    'no_rangka' => $request->no_rangka,
                    'bpkb' => $request->bpkb,
                    'type' => $request->type,
                    'bahan_bakar' => ucwords(strtolower($request->bahan_bakar)),
                    'no_polisi' => strtoupper($request->no_polisi),
                    'berlaku_sampai' => $request->berlaku_sampai,
                    'photo_bpkb' => $request->file('photo_bpkb')->store('bpkb'),
                ];
                if($request->oldImageBPKB != NULL){
                    Storage::delete($request->oldImageBPKB);
                }
                Bike::where('id', $motor->id)->update($data_motor);
            } elseif($request->file('photo_stnk') != NULL && $request->file('photo_bpkb') == NULL){
                $data_motor = [
                    'merek' => ucwords(strtolower($request->merek)),
                    'daya' => $request->daya,
                    'tahun_pembuatan' => $request->tahun_pembuatan,
                    'warna' => ucwords(strtolower($request->warna)),
                    'no_rangka' => $request->no_rangka,
                    'bpkb' => $request->bpkb,
                    'type' => $request->type,
                    'bahan_bakar' => ucwords(strtolower($request->bahan_bakar)),
                    'no_polisi' => strtoupper($request->no_polisi),
                    'berlaku_sampai' => $request->berlaku_sampai,
                    'photo_stnk' => $request->file('photo_stnk')->store('stnk'),
                ];
                if($request->oldImageSTNK != NULL){
                    Storage::delete($request->oldImageSTNK);
                }
                Bike::where('id', $motor->id)->update($data_motor);
            } elseif($request->file('photo_stnk') == NULL && $request->file('photo_bpkb') == NULL){
                $data_motor = [
                    'merek' => ucwords(strtolower($request->merek)),
                    'daya' => $request->daya,
                    'tahun_pembuatan' => $request->tahun_pembuatan,
                    'warna' => ucwords(strtolower($request->warna)),
                    'no_rangka' => $request->no_rangka,
                    'bpkb' => $request->bpkb,
                    'type' => $request->type,
                    'bahan_bakar' => ucwords(strtolower($request->bahan_bakar)),
                    'no_polisi' => strtoupper($request->no_polisi),
                    'berlaku_sampai' => $request->berlaku_sampai,
                ];
                Bike::where('id', $motor->id)->update($data_motor);
            } elseif($request->file('photo_stnk') != NULL && $request->file('photo_bpkb') != NULL){
                $data_motor = [
                    'merek' => ucwords(strtolower($request->merek)),
                    'daya' => $request->daya,
                    'tahun_pembuatan' => $request->tahun_pembuatan,
                    'warna' => ucwords(strtolower($request->warna)),
                    'no_rangka' => $request->no_rangka,
                    'bpkb' => $request->bpkb,
                    'type' => $request->type,
                    'bahan_bakar' => ucwords(strtolower($request->bahan_bakar)),
                    'no_polisi' => strtoupper($request->no_polisi),
                    'berlaku_sampai' => $request->berlaku_sampai,
                    'photo_bpkb' => $request->file('photo_bpkb')->store('bpkb'),
                    'photo_stnk' => $request->file('photo_stnk')->store('stnk'),
                ];
                if($request->oldImageSTNK != NULL){
                    Storage::delete($request->oldImageSTNK);
                }
                if($request->oldImageBPKB != NULL){
                    Storage::delete($request->oldImageBPKB);
                }
                Bike::where('id', $beli->id)->update($data_motor);
            }

            return redirect('/pembelian')->with('success', 'Data Transaksi Berhasil Diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buy $buy)
    {
        //
    }

    public function cek_nik(Request $request)
    {
        $data = Consumer::where('nik', $request->nik)->first();

        if($data){
            return response()->json(['success' => $data]);
        } else {
            return response()->json(['errors' => 'data belum terdaftar']);
        }
    }

    public function dataTables(Request $request)
    {
        if ($request->ajax()) {
            $query = DB::table('bikes')
                    ->join('buys', 'bikes.id', '=' , 'buys.bike_id');
            $data = $query->get();

            foreach ($data as $row){
                $row->tgl_beli = date('l, d-m-Y', strtotime($row->tanggal_beli));
                $row->harga = "Rp. " . number_format($row->harga_beli,0,',','.');
            }
            
            return DataTables::of($data)->addColumn('action', function($row){
                    $actionBtn =
                    '<button class="btn btn-info btn-sm info-button" data-id="'.$row->id.'"><i class="flaticon-381-view-2"></i></button>
                    <a href="/edit/'.$row->unique.'" class="btn btn-success btn-sm edit-button" data-id="'.$row->id.'"><i class="flaticon-381-edit-1"></i></a>
                    <button class="btn btn-warning btn-sm setting-button" data-id="'.$row->id.'"><i class="flaticon-381-settings-6"></i></button>
                    <form onSubmit="JavaScript:submitHandler()" action="javascript:void(0)" class="d-inline form-delete">
                        <button type="button" class="btn btn-danger btn-sm delete-button" data-token="'.csrf_token().'" data-id="'.$row->id.'"><i class="flaticon-381-trash-1"></i></button>
                    </form>';
                    return $actionBtn;
            })
            ->make(true);
        }
    }
}
