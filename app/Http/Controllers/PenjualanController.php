<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=[
            'title'=> 'Penjualan | SMAC',
            'judul'=> 'Penjualan',
            'breadcumb1' => 'Transaksi',
            'breadcumb2' => 'Penjualan',
        ];
        return view('penjualan.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data=[
            'title'=> 'Tambah Transaksi Penjualan | SMAC',
            'judul'=> 'Tambah Transaksi Penjualan',
            'breadcumb1' => 'Pembelian',
            'breadcumb2' => 'Tambah Transaksi Penjualan',

        ];
        return view('penjualan.create',$data);
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
