<?php

namespace App\Http\Controllers;

use App\Models\Kredit;
use App\Models\Setting;
use Codedge\Fpdf\Fpdf\Fpdf;
use Illuminate\Http\Request;

class PDF extends Fpdf
{
    public function Header()
    {
        $profile = Setting::first();
        // Menambahkan Logo
        // $this->Image('/img/logo/smac%20white%20transparent.png', 10, 6, 20);
        // Menambahkan judul header
        $this->SetFont('Arial', 'B', 18);
        $this->Cell(30);
        $this->Cell(140, 5, $profile->nama_toko, 0, 1, 'C');

        $this->SetFont('Arial', 'B', 13);
        $this->SetTextColor(0, 0, 0);
        $this->Cell(30);
        $this->Cell(140, 9, 'JUAL BELI MOTOR BEKAS CASH/KREDIT', 0, 1, 'C');

        $this->SetFont('Arial', '', 10);
        $this->SetTextColor(0);
        $this->Cell(30);
        $this->Cell(140, 5, strtoupper($profile->alamat_toko), 0, 1, 'C');

        // Menambahkan garis header
        $this->SetLineWidth(1);
        $this->Line(10, 36, 200, 36);
        $this->SetLineWidth(0);
        $this->Line(10, 37, 200, 37);
        $this->Ln();
    }
    // // Membuat page footer
    // public function Footer()
    // {

    //     $this->SetY(-15);
    //     $this->SetFont('Arial', 'I', 8);
    //     $this->Cell(0, 10, 'Halaman ' . $this->PageNo(), 0, 0, 'C');
    // }
}

class CetakTagihanController extends Controller
{
    protected $pdf;


    public function __construct()
    {
        $this->pdf = new PDF;
    }

    public function cetak_tagihan(Request $request)
    {
        $setting = Setting::first();
        $data = Kredit::get_data($request->unique);
        //SURAT JALAN
        $this->pdf->AddPage('P', 'A4');

        $this->pdf->SetFont('Arial', 'U', '16');
        $this->pdf->Cell(0, 16, 'SURAT JALAN', '0', 1, 'C');

        $this->pdf->SetFont('Arial', '', '8');
        $this->pdf->SetFillColor(255, 255, 255);
        $this->pdf->SetTextColor(0);
        $this->pdf->SetDrawColor(255);
        // $this->pdf->SetDrawColor(255, 255, 255);
        $this->pdf->Cell(44, 7, 'Yang bertanda tangan dibawah ini', 1, '0', 'L', true);
        $this->pdf->Cell(4, 7, ':', 1, '0', 'L', true);
        $this->pdf->Ln();
        $this->pdf->Cell(44, 7, 'Nama', 1, '0', 'L', true);
        $this->pdf->Cell(2, 7, ':', 1, '0', 'L', true);
        $this->pdf->Cell(145, 7, strtoupper($setting->nama_pemilik), 1, '0', 'L', true);
        $this->pdf->Ln();
        $this->pdf->Cell(44, 7, 'Alamat', 1, '0', 'L', true);
        $this->pdf->Cell(2, 7, ':', 1, '0', 'L', true);
        $this->pdf->Cell(145, 7, strtoupper($setting->alamat_toko), 1, '0', 'L', true);
        $this->pdf->Ln();
        $this->pdf->Ln();
        $this->pdf->Cell(100, 7, 'Barang diterima dengan baik 1(satu) unit Sepeda Motor:', 1, '0', 'L', true);
        $this->pdf->Ln();
        $this->pdf->Cell(44, 7, 'No Polisi', 1, '0', 'L', true);
        $this->pdf->Cell(2, 7, ':', 1, '0', 'L', true);
        $this->pdf->Cell(54, 7, $data->no_polisi, 1, '0', 'L', true);
        $this->pdf->Cell(44, 7, 'No Rangka', 1, '0', 'L', true);
        $this->pdf->Cell(2, 7, ':', 1, '0', 'L', true);
        $this->pdf->Cell(45, 7, $data->no_rangka, 1, '0', 'L', true);
        $this->pdf->Ln();
        $this->pdf->Cell(44, 7, 'No BPKB', 1, '0', 'L', true);
        $this->pdf->Cell(2, 7, ':', 1, '0', 'L', true);
        $this->pdf->Cell(54, 7, $data->bpkb, 1, '0', 'L', true);
        $this->pdf->Cell(44, 7, 'No Mesin', 1, '0', 'L', true);
        $this->pdf->Cell(2, 7, ':', 1, '0', 'L', true);
        $this->pdf->Cell(45, 7, $data->no_mesin, 1, '0', 'L', true);
        $this->pdf->Ln();
        $this->pdf->Cell(44, 7, 'Merk/Type', 1, '0', 'L', true);
        $this->pdf->Cell(2, 7, ':', 1, '0', 'L', true);
        $this->pdf->Cell(30, 7, $data->merek, 1, '0', 'L', true);
        $this->pdf->Cell(44, 7, $data->type, 1, '0', 'L', true);
        $this->pdf->Ln();
        $this->pdf->Cell(44, 7, 'Atas Nama BPKB', 1, '0', 'L', true);
        $this->pdf->Cell(2, 7, ':', 1, '0', 'L', true);
        $this->pdf->Cell(145, 7, strtoupper($data->nama_bpkb), 1, '0', 'L', true);
        $this->pdf->Ln();
        $this->pdf->Cell(44, 7, 'Tahun/Warna', 1, '0', 'L', true);
        $this->pdf->Cell(2, 7, ':', 1, '0', 'L', true);
        $this->pdf->Cell(30, 7, $data->tahun_pembuatan, 1, '0', 'L', true);
        $this->pdf->Cell(44, 7, $data->warna, 1, '0', 'L', true);
        $this->pdf->Ln();
        $this->pdf->Cell(44, 7, 'Nama Nasabah', 1, '0', 'L', true);
        $this->pdf->Cell(2, 7, ':', 1, '0', 'L', true);
        $this->pdf->Cell(145, 7, strtoupper($data->nama), 1, '0', 'L', true);
        $this->pdf->Ln();
        $this->pdf->Cell(44, 7, 'Alamat', 1, '0', 'L', true);
        $this->pdf->Cell(2, 7, ':', 1, '0', 'L', true);
        $this->pdf->Cell(145, 7, $data->alamat, 1, '0', 'L', true);
        $this->pdf->Ln();
        $this->pdf->Cell(44, 7, 'No Hp', 1, '0', 'L', true);
        $this->pdf->Cell(2, 7, ':', 1, '0', 'L', true);
        $this->pdf->Cell(145, 7, $data->no_telepon, 1, '0', 'L', true);
        $this->pdf->Ln();
        $this->pdf->Ln();
        $this->pdf->Ln();
        $this->pdf->Ln();
        $this->pdf->SetFillColor(255);
        $this->pdf->SetTextColor(0, 0, 0);
        $this->pdf->SetXY(145, 181);
        $this->pdf->MultiCell(55, 5, $setting->kota, 0, 'L',  true);
        $this->pdf->SetXY(9, 186);
        $this->pdf->MultiCell(55, 5, 'Yang menerima', 0, 'L',  true);
        $this->pdf->SetXY(145, 186);
        $this->pdf->MultiCell(55, 5, 'Yang menyerahkan', 0, 'L',  true);
        $this->pdf->SetXY(9, 220);
        $this->pdf->MultiCell(55, 5, '(..............................................)', 0, 'L',  true);
        $this->pdf->SetXY(145, 220);
        $this->pdf->MultiCell(55, 5, $setting->nama_pemilik, 0, 'L',  true);
        $this->pdf->Ln();

        //KWITANSI PELUNASAN
        $this->pdf->AddPage('P', 'A4');

        $this->pdf->SetFont('Arial', 'U', '16');
        $this->pdf->Cell(0, 16, 'KWITANSI PELUNASAN', '0', 1, 'C');

        $this->pdf->SetFont('Arial', '', '8');
        $this->pdf->SetFillColor(255, 255, 255);
        $this->pdf->SetTextColor(0);
        $this->pdf->SetDrawColor(255);
        // $this->pdf->SetDrawColor(255, 255, 255);
        $this->pdf->Cell(44, 7, 'Sudah Terima Dari', 1, '0', 'L', true);
        $this->pdf->Cell(2, 7, ':', 1, '0', 'L', true);
        $this->pdf->Cell(145, 7, strtoupper($request->nama_leasing), 1, '0', 'L', true);
        $this->pdf->Ln();
        $this->pdf->Cell(44, 7, 'Nama Nasabah', 1, '0', 'L', true);
        $this->pdf->Cell(2, 7, ':', 1, '0', 'L', true);
        $this->pdf->Cell(145, 7, strtoupper($data->nama), 1, '0', 'L', true);
        $this->pdf->Ln();
        $this->pdf->Cell(44, 7, 'Banyaknya Uang', 1, '0', 'L', true);
        $this->pdf->Cell(2, 7, ':', 1, '0', 'L', true);
        $this->pdf->Cell(145, 7, terbilang($data->pencairan) . " Rupiah", 1, '0', 'L', true);
        $this->pdf->Ln();
        $this->pdf->Cell(44, 7, 'Untuk Pembayaran', 1, '0', 'L', true);
        $this->pdf->Cell(2, 7, ':', 1, '0', 'L', true);
        $this->pdf->Cell(145, 7, 'Pelunasan 1 (unit) Sepeda Motor dengan data-data Sebagai berikut :', 1, '0', 'L', true);
        $this->pdf->Ln();
        $this->pdf->Cell(44, 7, 'No Polisi', 1, '0', 'L', true);
        $this->pdf->Cell(2, 7, ':', 1, '0', 'L', true);
        $this->pdf->Cell(54, 7, $data->no_polisi, 1, '0', 'L', true);
        $this->pdf->Cell(44, 7, 'No Rangka', 1, '0', 'L', true);
        $this->pdf->Cell(2, 7, ':', 1, '0', 'L', true);
        $this->pdf->Cell(45, 7, $data->no_rangka, 1, '0', 'L', true);
        $this->pdf->Ln();
        $this->pdf->Cell(44, 7, 'No BPKB', 1, '0', 'L', true);
        $this->pdf->Cell(2, 7, ':', 1, '0', 'L', true);
        $this->pdf->Cell(54, 7, $data->bpkb, 1, '0', 'L', true);
        $this->pdf->Cell(44, 7, 'No Mesin', 1, '0', 'L', true);
        $this->pdf->Cell(2, 7, ':', 1, '0', 'L', true);
        $this->pdf->Cell(45, 7, $data->no_mesin, 1, '0', 'L', true);
        $this->pdf->Ln();
        $this->pdf->Cell(44, 7, 'Merk/Type', 1, '0', 'L', true);
        $this->pdf->Cell(2, 7, ':', 1, '0', 'L', true);
        $this->pdf->Cell(30, 7, $data->merek, 1, '0', 'L', true);
        $this->pdf->Cell(44, 7, $data->type, 1, '0', 'L', true);
        $this->pdf->Ln();
        $this->pdf->Cell(44, 7, 'Atas Nama BPKB', 1, '0', 'L', true);
        $this->pdf->Cell(2, 7, ':', 1, '0', 'L', true);
        $this->pdf->Cell(145, 7, strtoupper($data->nama_bpkb), 1, '0', 'L', true);
        $this->pdf->Ln();
        $this->pdf->Cell(44, 7, 'Tahun/Warna', 1, '0', 'L', true);
        $this->pdf->Cell(2, 7, ':', 1, '0', 'L', true);
        $this->pdf->Cell(30, 7, $data->tahun_pembuatan, 1, '0', 'L', true);
        $this->pdf->Cell(44, 7, $data->warna, 1, '0', 'L', true);
        $this->pdf->Ln();
        $this->pdf->Ln();
        $this->pdf->Cell(44, 7, 'Pelunasan', 1, '0', 'L', true);
        $this->pdf->Cell(38, 7, ':', 1, '0', 'L', true);
        $this->pdf->Cell(30, 7, rupiah($data->pencairan), 1, '0', 'L', true);
        $this->pdf->Ln();
        $this->pdf->Ln();
        $this->pdf->Ln();
        $this->pdf->Ln();
        $this->pdf->SetFillColor(255);
        $this->pdf->SetTextColor(0, 0, 0);
        $this->pdf->SetXY(145, 181);
        $this->pdf->MultiCell(55, 5, $setting->kota, 0, 'L',  true);
        $this->pdf->SetXY(145, 220);
        $this->pdf->MultiCell(55, 5, $setting->nama_pemilik, 0, 'L',  true);
        $this->pdf->Ln();


        //KWITANSI UANG MUKA
        $this->pdf->AddPage('P', 'A4');

        $this->pdf->SetFont('Arial', 'U', '16');
        $this->pdf->Cell(0, 16, 'KWITANSI UANG MUKA', '0', 1, 'C');

        $this->pdf->SetFont('Arial', '', '8');
        $this->pdf->SetFillColor(255, 255, 255);
        $this->pdf->SetTextColor(0);
        $this->pdf->SetDrawColor(255);
        // $this->pdf->SetDrawColor(255, 255, 255);
        $this->pdf->Cell(44, 7, 'Sudah Terima Dari', 1, '0', 'L', true);
        $this->pdf->Cell(2, 7, ':', 1, '0', 'L', true);
        $this->pdf->Cell(145, 7, strtoupper($request->nama_leasing), 1, '0', 'L', true);
        $this->pdf->Ln();
        $this->pdf->Cell(44, 7, 'Nama Nasabah', 1, '0', 'L', true);
        $this->pdf->Cell(2, 7, ':', 1, '0', 'L', true);
        $this->pdf->Cell(145, 7, strtoupper($data->nama), 1, '0', 'L', true);
        $this->pdf->Ln();
        $this->pdf->Cell(44, 7, 'Banyaknya Uang', 1, '0', 'L', true);
        $this->pdf->Cell(2, 7, ':', 1, '0', 'L', true);
        $this->pdf->Cell(145, 7, terbilang($data->dp_po) . " Rupiah", 1, '0', 'L', true);
        $this->pdf->Ln();
        $this->pdf->Cell(44, 7, 'Untuk Pembayaran', 1, '0', 'L', true);
        $this->pdf->Cell(2, 7, ':', 1, '0', 'L', true);
        $this->pdf->Cell(145, 7, 'Down Payment 1 (unit) Sepeda Motor dengan data-data Sebagai berikut :', 1, '0', 'L', true);
        $this->pdf->Ln();
        $this->pdf->Ln();
        $this->pdf->Cell(44, 7, 'No Polisi', 1, '0', 'L', true);
        $this->pdf->Cell(2, 7, ':', 1, '0', 'L', true);
        $this->pdf->Cell(54, 7, $data->no_polisi, 1, '0', 'L', true);
        $this->pdf->Cell(44, 7, 'No Rangka', 1, '0', 'L', true);
        $this->pdf->Cell(2, 7, ':', 1, '0', 'L', true);
        $this->pdf->Cell(45, 7, $data->no_rangka, 1, '0', 'L', true);
        $this->pdf->Ln();
        $this->pdf->Cell(44, 7, 'No BPKB', 1, '0', 'L', true);
        $this->pdf->Cell(2, 7, ':', 1, '0', 'L', true);
        $this->pdf->Cell(54, 7, $data->bpkb, 1, '0', 'L', true);
        $this->pdf->Cell(44, 7, 'No Mesin', 1, '0', 'L', true);
        $this->pdf->Cell(2, 7, ':', 1, '0', 'L', true);
        $this->pdf->Cell(45, 7, $data->no_mesin, 1, '0', 'L', true);
        $this->pdf->Ln();
        $this->pdf->Cell(44, 7, 'Merk/Type', 1, '0', 'L', true);
        $this->pdf->Cell(2, 7, ':', 1, '0', 'L', true);
        $this->pdf->Cell(30, 7, $data->merek, 1, '0', 'L', true);
        $this->pdf->Cell(44, 7, $data->type, 1, '0', 'L', true);
        $this->pdf->Ln();
        $this->pdf->Cell(44, 7, 'Atas Nama BPKB', 1, '0', 'L', true);
        $this->pdf->Cell(2, 7, ':', 1, '0', 'L', true);
        $this->pdf->Cell(145, 7, strtoupper($data->nama_bpkb), 1, '0', 'L', true);
        $this->pdf->Ln();
        $this->pdf->Cell(44, 7, 'Tahun/Warna', 1, '0', 'L', true);
        $this->pdf->Cell(2, 7, ':', 1, '0', 'L', true);
        $this->pdf->Cell(30, 7, $data->tahun_pembuatan, 1, '0', 'L', true);
        $this->pdf->Cell(44, 7, $data->warna, 1, '0', 'L', true);
        $this->pdf->Ln();
        $this->pdf->Ln();
        $this->pdf->Cell(44, 7, 'Uang Muka', 1, '0', 'L', true);
        $this->pdf->Cell(38, 7, ':', 1, '0', 'L', true);
        $this->pdf->Cell(30, 7, rupiah($data->dp_po), 1, '0', 'L', true);
        $this->pdf->Ln();
        $this->pdf->Ln();
        $this->pdf->Ln();
        $this->pdf->Ln();
        $this->pdf->SetFillColor(255);
        $this->pdf->SetTextColor(0, 0, 0);
        $this->pdf->SetXY(145, 181);
        $this->pdf->MultiCell(55, 5, $setting->kota, 0, 'L',  true);
        $this->pdf->SetXY(145, 220);
        $this->pdf->MultiCell(55, 5, $setting->nama_pemilik, 0, 'L',  true);
        $this->pdf->Ln();

        //TANPA JUDUL 1
        $this->pdf->AddPage('P', 'A4');

        $this->pdf->Ln();
        $this->pdf->Ln();

        $this->pdf->SetFont('Arial', '', '8');
        $this->pdf->SetFillColor(255, 255, 255);
        $this->pdf->SetTextColor(0);
        $this->pdf->SetDrawColor(255);
        // $this->pdf->SetDrawColor(255, 255, 255);
        $this->pdf->Cell(44, 7, 'Nama Nasabah', 1, '0', 'L', true);
        $this->pdf->Cell(2, 7, ':', 1, '0', 'L', true);
        $this->pdf->Cell(145, 7, strtoupper($data->nama), 1, '0', 'L', true);
        $this->pdf->Ln();
        $this->pdf->Cell(44, 7, 'Jenis Kendaraan', 1, '0', 'L', true);
        $this->pdf->Cell(2, 7, ':', 1, '0', 'L', true);
        $this->pdf->Cell(145, 7, "SEPEDA MOTOR", 1, '0', 'L', true);
        $this->pdf->Ln();
        $this->pdf->Ln();
        $this->pdf->Cell(44, 7, 'No Polisi', 1, '0', 'L', true);
        $this->pdf->Cell(2, 7, ':', 1, '0', 'L', true);
        $this->pdf->Cell(54, 7, $data->no_polisi, 1, '0', 'L', true);
        $this->pdf->Ln();
        $this->pdf->Cell(44, 7, 'No BPKB', 1, '0', 'L', true);
        $this->pdf->Cell(2, 7, ':', 1, '0', 'L', true);
        $this->pdf->Cell(54, 7, $data->bpkb, 1, '0', 'L', true);
        $this->pdf->Ln();
        $this->pdf->Cell(44, 7, 'Atas Nama BPKB', 1, '0', 'L', true);
        $this->pdf->Cell(2, 7, ':', 1, '0', 'L', true);
        $this->pdf->Cell(145, 7, strtoupper($data->nama_bpkb), 1, '0', 'L', true);
        $this->pdf->Ln();
        $this->pdf->Cell(44, 7, 'Merk/Type', 1, '0', 'L', true);
        $this->pdf->Cell(2, 7, ':', 1, '0', 'L', true);
        $this->pdf->Cell(30, 7, $data->merek . '   /' . $data->type, 1, '0', 'L', true);
        $this->pdf->Ln();
        $this->pdf->Cell(44, 7, 'Tahun/Warna', 1, '0', 'L', true);
        $this->pdf->Cell(2, 7, ':', 1, '0', 'L', true);
        $this->pdf->Cell(30, 7, $data->tahun_pembuatan . '   /' . $data->warna, 1, '0', 'L', true);
        $this->pdf->Ln();
        $this->pdf->Cell(44, 7, 'No Mesin', 1, '0', 'L', true);
        $this->pdf->Cell(2, 7, ':', 1, '0', 'L', true);
        $this->pdf->Cell(30, 7, $data->no_mesin, 1, '0', 'L', true);
        $this->pdf->Ln();
        $this->pdf->Ln();
        $this->pdf->Cell(80, 7, 'BPKB', 1, '0', 'L', true);
        $this->pdf->Cell(25, 7, "Asli", 1, '0', 'L', true);
        $this->pdf->Cell(15, 7, "Duplikat", 1, '0', 'L', true);
        $this->pdf->Ln();
        $this->pdf->Cell(80, 7, 'Faktur', 1, '0', 'L', true);
        $this->pdf->Cell(25, 7, "Ada", 1, '0', 'L', true);
        $this->pdf->Cell(15, 7, "Tidak ada", 1, '0', 'L', true);
        $this->pdf->Ln();
        $this->pdf->Cell(80, 7, 'Kwitansi Blangko BBN atas nama BPKB', 1, '0', 'L', true);
        $this->pdf->Cell(25, 7, "Ada", 1, '0', 'L', true);
        $this->pdf->Cell(15, 7, "Tidak ada", 1, '0', 'L', true);
        $this->pdf->Ln();
        $this->pdf->Cell(80, 7, 'FC KTP atas nama BPKB', 1, '0', 'L', true);
        $this->pdf->Cell(25, 7, "Ada", 1, '0', 'L', true);
        $this->pdf->Cell(15, 7, "Tidak ada", 1, '0', 'L', true);
        $this->pdf->Ln();
        $this->pdf->Cell(80, 7, 'FC STNK dan Nota Pajak', 1, '0', 'L', true);
        $this->pdf->Cell(25, 7, "Ada", 1, '0', 'L', true);
        $this->pdf->Cell(15, 7, "Tidak ada", 1, '0', 'L', true);
        $this->pdf->Ln();
        $this->pdf->Cell(80, 7, 'Nomor Polisi Sesuai STNK & BPKB', 1, '0', 'L', true);
        $this->pdf->Cell(25, 7, "Ada", 1, '0', 'L', true);
        $this->pdf->Cell(15, 7, "Tidak ada", 1, '0', 'L', true);
        $this->pdf->Ln();
        $this->pdf->Cell(80, 7, 'Noka dan Nosin Sesuai STNK & BPKB', 1, '0', 'L', true);
        $this->pdf->Cell(25, 7, "Ada", 1, '0', 'L', true);
        $this->pdf->Cell(15, 7, "Tidak ada", 1, '0', 'L', true);
        $this->pdf->Ln();
        $this->pdf->SetFillColor(255);
        $this->pdf->SetTextColor(0, 0, 0);
        $this->pdf->SetXY(9, 220);
        $this->pdf->MultiCell(55, 5, $setting->kota . ',', 0, 'L',  true);
        $this->pdf->SetXY(9, 225);
        $this->pdf->MultiCell(55, 5, 'Yang menyatakan,', 0, 'L',  true);
        $this->pdf->SetXY(9, 259);
        $this->pdf->MultiCell(55, 5, $setting->nama_pemilik, 0, 'L',  true);

        //KOTAK CEKLIS
        $this->pdf->SetFillColor(255, 255, 255);
        $this->pdf->SetTextColor(0, 0, 0);
        $this->pdf->SetDrawColor(0, 0, 0);
        //BPKB
        $this->pdf->SetXY(85, 115);
        $this->pdf->MultiCell(4, 4, '', 1, 'L',  true);
        $this->pdf->SetXY(110, 115);
        $this->pdf->MultiCell(4, 4, '', 1, 'L',  true);
        //Faktur
        $this->pdf->SetXY(85, 122);
        $this->pdf->MultiCell(4, 4, '', 1, 'L',  true);
        $this->pdf->SetXY(110, 122);
        $this->pdf->MultiCell(4, 4, '', 1, 'L',  true);
        $this->pdf->Ln();
        //Kwitansi Blangko BBN atas nama BPKB
        $this->pdf->SetXY(85, 129);
        $this->pdf->MultiCell(4, 4, '', 1, 'L',  true);
        $this->pdf->SetXY(110, 129);
        $this->pdf->MultiCell(4, 4, '', 1, 'L',  true);
        $this->pdf->Ln();
        //FC KTP atas nama BPKB
        $this->pdf->SetXY(85, 136);
        $this->pdf->MultiCell(4, 4, '', 1, 'L',  true);
        $this->pdf->SetXY(110, 136);
        $this->pdf->MultiCell(4, 4, '', 1, 'L',  true);
        $this->pdf->Ln();
        //FC STNK dan Nota Pajak
        $this->pdf->SetXY(85, 143);
        $this->pdf->MultiCell(4, 4, '', 1, 'L',  true);
        $this->pdf->SetXY(110, 143);
        $this->pdf->MultiCell(4, 4, '', 1, 'L',  true);
        $this->pdf->Ln();
        //Nomor Polisi Sesuai STNK & BPKB
        $this->pdf->SetXY(85, 150);
        $this->pdf->MultiCell(4, 4, '', 1, 'L',  true);
        $this->pdf->SetXY(110, 150);
        $this->pdf->MultiCell(4, 4, '', 1, 'L',  true);
        $this->pdf->Ln();
        //Noka dan Nosin Sesuai STNK & BPKB
        $this->pdf->SetXY(85, 157);
        $this->pdf->MultiCell(4, 4, '', 1, 'L',  true);
        $this->pdf->SetXY(110, 157);
        $this->pdf->MultiCell(4, 4, '', 1, 'L',  true);
        $this->pdf->Ln();
        //Pernyataan
        $this->pdf->SetXY(9, 181);
        $this->pdf->MultiCell(190, 7, 'Apabila dikemudian hari diketahui bahwa surat-surat kendaraan tersebut di atas PALSU dan atau SEDANG DALAM PEMBLOKIRAN, maka dengan ini kami (dealer / sub dealer / showroom / perorangan) menyatakan "akan membeli kembali atau melunasi kendaraan tersebut di atas kepada ' . strtoupper($request->nama_leasing) . ' sesuai dengan perhitungan pelunasan dari ' . strtoupper($request->nama_leasing) . ' selambat-lambatnya 1 (satu) minggu sejak adanya pemberitahuan".', 0, 'L',  true);
        $this->pdf->Ln();


        // Simpan file PDF ke server
        $this->pdf->Output('Laporan Penjualan.pdf', 'I');
        exit;
    }
}
