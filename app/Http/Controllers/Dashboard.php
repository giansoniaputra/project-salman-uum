<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index()
    {
        $data=[
            'judul'=> 'Dashboard',
            'breadcumb1' => 'Dashboard',
            'breadcumb2' => 'Dashboard',
        ];
        return view('index',$data);
    }
}
