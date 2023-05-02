<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
