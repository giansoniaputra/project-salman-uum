<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf;


class PDFController extends Controller
{

    protected $fpdf;

    public function __construct()
    {
        $this->fpdf = new Fpdf;
    }
    public function testPDF()
    {
        $pdf = new Fpdf();

        // Mengatur ukuran halaman menjadi A4
        $pdf->AddPage('P', 'A4');

        // Mengatur font yang akan digunakan
        $pdf->SetFont('Arial', 'B', 16);

        // Menambahkan konten ke halaman
        $pdf->Cell(0, 10, 'Ini adalah contoh teks di PDF', 0, 1);

        // Simpan file PDF ke server
        $pdf->Output('i', 'Laporan Transaksi.pdf', 'false');

        // Kembalikan respon yang diinginkan
        return response()->json(['message' => 'PDF berhasil dibuat']);
    }
}
