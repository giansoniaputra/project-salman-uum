<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Dashboards | SMAC',
            'judul' => 'Dashboards',
            'breadcumb1' => 'Dashboard',
            'breadcumb2' => 'Info Transaksi Showroom',
        ];
        return view('index', $data);
    }
}
