<?php

namespace App\Http\Controllers;

use App\Models\Buy;
use App\Models\Kredit;
use App\Models\Setting;
use Codedge\Fpdf\Fpdf\Fpdf;
use Illuminate\Http\Request;

class KwitansiController extends Controller
{
    protected $pdf;


    public function __construct()
    {
        $this->pdf = new Fpdf;
    }

    public function cetak_kwitansi(Request $request)
    {
        $data = Kredit::get_data($request->unique);
        $setting = Setting::first();

        $this->pdf->AddPage('P', 'A4');
        $this->pdf->SetFont('Arial', 'B', '8');
        $this->pdf->SetFillColor(255, 255, 255);
        $this->pdf->SetTextColor(0, 0, 0);
        $this->pdf->SetDrawColor(0, 0, 0);
        $this->pdf->SetXY(10, 10);
        $this->pdf->MultiCell(8, 65, '', 1, '0', 'C', true);
        $this->pdf->SetXY(10, 77);
        $this->pdf->MultiCell(8, 65, '', 1, '0', 'C', true);
        $this->pdf->SetXY(10, 144);
        $this->pdf->MultiCell(8, 65, '', 1, '0', 'C', true);
        $this->pdf->SetXY(10, 211);
        $this->pdf->MultiCell(8, 65, '', 1, '0', 'C', true);


        //Row 2
        $this->pdf->SetXY(18, 10);
        $this->pdf->MultiCell(178, 65, "", 1, 'L',  true);
        $this->pdf->SetXY(18, 77);
        $this->pdf->MultiCell(178, 65, '', 1, 'J',  true);
        $this->pdf->SetXY(18, 144);
        $this->pdf->MultiCell(178, 65, '', 1, 'J',  true);
        $this->pdf->SetXY(18, 211);
        $this->pdf->MultiCell(178, 65, '', 1, 'J',  true);


        // KWITANSI PELUNASAN
        $this->pdf->SetFont('Arial', 'U', '10');
        $this->pdf->SetXY(19, 11);
        $this->pdf->MultiCell(50, 5, "KWITANSI PELUNASAN", 0, 'L',  true);
        $this->pdf->SetFont('Arial', '', '8');
        $this->pdf->SetXY(19, 17);
        $this->pdf->MultiCell(50, 5, "Telah diterima dari", 0, 'L',  true);
        $this->pdf->SetXY(19, 22);
        $this->pdf->MultiCell(50, 5, "Jumlah", 0, 'L',  true);
        $this->pdf->SetXY(19, 27);
        $this->pdf->MultiCell(50, 5, "Terbilang", 0, 'L',  true);
        $this->pdf->SetXY(19, 32);
        $this->pdf->MultiCell(50, 5, "Untuk Pembayaran", 0, 'L',  true);
        $this->pdf->SetXY(19, 37);
        $this->pdf->MultiCell(50, 5, "No Rangka", 0, 'L',  true);
        $this->pdf->SetXY(19, 42);
        $this->pdf->MultiCell(50, 5, "No Mesin", 0, 'L',  true);
        $this->pdf->SetXY(19, 47);
        $this->pdf->MultiCell(50, 5, "No Polisi", 0, 'L',  true);
        // KWITANSI PELUNASAN (DATA)
        $this->pdf->SetFont('Arial', '', '8');
        $this->pdf->SetXY(62, 17);
        $this->pdf->MultiCell(130, 5, ": " . $request->nama_leasing, 0, 'L',  true);
        $this->pdf->SetXY(62, 22);
        $this->pdf->MultiCell(130, 5, ": " . rupiah($data->pencairan), 0, 'L',  true);
        $this->pdf->SetXY(62, 27);
        $this->pdf->MultiCell(130, 5, ": " . terbilang($data->pencairan) . " Rupiah", 0, 'L',  true);
        $this->pdf->SetXY(62, 32);
        $this->pdf->MultiCell(130, 5, ": Pelunasan", 0, 'L',  true);
        $this->pdf->SetXY(62, 37);
        $this->pdf->MultiCell(130, 5, ": " . $data->no_rangka, 0, 'L',  true);
        $this->pdf->SetXY(62, 42);
        $this->pdf->MultiCell(130, 5, ": " . $data->no_mesin, 0, 'L',  true);
        $this->pdf->SetXY(62, 47);
        $this->pdf->MultiCell(130, 5, ": " . $data->no_polisi, 0, 'L',  true);
        $this->pdf->SetXY(130, 52);
        $this->pdf->MultiCell(30, 5, $setting->kota . ",", 0, 'L',  true);
        $this->pdf->SetXY(130, 68);
        $this->pdf->MultiCell(30, 5, $setting->nama_pemilik, 0, 'L',  true);

        // KWITANSI UANG MUKA
        $this->pdf->SetFont('Arial', 'U', '10');
        $this->pdf->SetXY(19, 78);
        $this->pdf->MultiCell(50, 5, "KWITANSI UANG MUKA", 0, 'L',  true);
        $this->pdf->SetFont('Arial', '', '8');
        $this->pdf->SetXY(19, 84);
        $this->pdf->MultiCell(50, 5, "Telah diterima dari", 0, 'L',  true);
        $this->pdf->SetXY(19, 89);
        $this->pdf->MultiCell(50, 5, "Jumlah", 0, 'L',  true);
        $this->pdf->SetXY(19, 94);
        $this->pdf->MultiCell(50, 5, "Terbilang", 0, 'L',  true);
        $this->pdf->SetXY(19, 99);
        $this->pdf->MultiCell(50, 5, "Untuk Pembayaran", 0, 'L',  true);
        $this->pdf->SetXY(19, 104);
        $this->pdf->MultiCell(50, 5, "No Rangka", 0, 'L',  true);
        $this->pdf->SetXY(19, 109);
        $this->pdf->MultiCell(50, 5, "No Mesin", 0, 'L',  true);
        $this->pdf->SetXY(19, 114);
        $this->pdf->MultiCell(50, 5, "No Polisi", 0, 'L',  true);

        // KWITANSI UANG MUKA (DATA)
        $this->pdf->SetFont('Arial', '', '8');
        $this->pdf->SetXY(62, 84);
        $this->pdf->MultiCell(130, 5, ": " . $data->nama, 0, 'L',  true);
        $this->pdf->SetXY(62, 89);
        $this->pdf->MultiCell(130, 5, ": " . rupiah($data->dp_po), 0, 'L',  true);
        $this->pdf->SetXY(62, 94);
        $this->pdf->MultiCell(130, 5, ": " . terbilang($data->dp_po) . " Rupiah", 0, 'L',  true);
        $this->pdf->SetXY(62, 99);
        $this->pdf->MultiCell(130, 5, ": Uang Muka", 0, 'L',  true);
        $this->pdf->SetXY(62, 104);
        $this->pdf->MultiCell(130, 5, ": " . $data->no_rangka, 0, 'L',  true);
        $this->pdf->SetXY(62, 109);
        $this->pdf->MultiCell(130, 5, ": " . $data->no_mesin, 0, 'L',  true);
        $this->pdf->SetXY(62, 115);
        $this->pdf->MultiCell(130, 5, ": " . $data->no_polisi, 0, 'L',  true);
        $this->pdf->SetXY(130, 120);
        $this->pdf->MultiCell(30, 5, $setting->kota . ",", 0, 'L',  true);
        $this->pdf->SetXY(130, 135);
        $this->pdf->MultiCell(30, 5, $setting->nama_pemilik, 0, 'L',  true);

        // KWITANSI SUBSIDI
        $this->pdf->SetFont('Arial', 'U', '10');
        $this->pdf->SetXY(19, 145);
        $this->pdf->MultiCell(50, 5, "KWITANSI SUBSIDI", 0, 'L',  true);
        $this->pdf->SetFont('Arial', '', '8');
        $this->pdf->SetXY(19, 151);
        $this->pdf->MultiCell(50, 5, "Telah diterima dari", 0, 'L',  true);
        $this->pdf->SetXY(19, 156);
        $this->pdf->MultiCell(50, 5, "Jumlah", 0, 'L',  true);
        $this->pdf->SetXY(19, 161);
        $this->pdf->MultiCell(50, 5, "Terbilang", 0, 'L',  true);
        $this->pdf->SetXY(19, 166);
        $this->pdf->MultiCell(50, 5, "Untuk Pembayaran", 0, 'L',  true);
        $this->pdf->SetXY(19, 171);
        $this->pdf->MultiCell(50, 5, "No Rangka", 0, 'L',  true);
        $this->pdf->SetXY(19, 176);
        $this->pdf->MultiCell(50, 5, "No Mesin", 0, 'L',  true);
        $this->pdf->SetXY(19, 181);
        $this->pdf->MultiCell(50, 5, "No Polisi", 0, 'L',  true);

        // KWITANSI SUBSIDI (DATA)
        $this->pdf->SetFont('Arial', '', '8');
        $this->pdf->SetXY(62, 151);
        $this->pdf->MultiCell(130, 5, ": " . $request->nama_leasing, 0, 'L',  true);
        $this->pdf->SetXY(62, 156);
        $this->pdf->MultiCell(130, 5, ": " . rupiah(preg_replace('/[,]/', '', $request->subsidi)), 0, 'L',  true);
        $this->pdf->SetXY(62, 161);
        $this->pdf->MultiCell(130, 5, ": " . terbilang(preg_replace('/[,]/', '', $request->subsidi)) . " Rupiah", 0, 'L',  true);
        $this->pdf->SetXY(62, 166);
        $this->pdf->MultiCell(130, 5, ": Subsidi", 0, 'L',  true);
        $this->pdf->SetXY(62, 171);
        $this->pdf->MultiCell(130, 5, ": " . $data->no_rangka, 0, 'L',  true);
        $this->pdf->SetXY(62, 176);
        $this->pdf->MultiCell(130, 5, ": " . $data->no_mesin, 0, 'L',  true);
        $this->pdf->SetXY(62, 181);
        $this->pdf->MultiCell(130, 5, ": " . $data->no_polisi, 0, 'L',  true);
        $this->pdf->SetXY(130, 186);
        $this->pdf->MultiCell(30, 5, $setting->kota . ",", 0, 'L',  true);
        $this->pdf->SetXY(130, 202);
        $this->pdf->MultiCell(30, 5, $setting->nama_pemilik, 0, 'L',  true);

        // SURAT JALAN
        $this->pdf->SetXY(18, 211);
        $this->pdf->MultiCell(178, 12, '', 1, 'J',  true);
        $this->pdf->SetFont('Arial', 'U', '10');
        $this->pdf->SetXY(19, 212);
        $this->pdf->MultiCell(176, 5, "SURAT JALAN", 0, 'C',  true);
        $this->pdf->SetFont('Arial', '', '8');
        $this->pdf->SetXY(19, 218);
        $this->pdf->MultiCell(176, 5, "No: ....................................................................................", 0, 'C',  true);

        $this->pdf->SetFont('Arial', '', '8');
        $this->pdf->SetXY(19, 224);
        $this->pdf->MultiCell(50, 5, "NAMA", 0, 'L',  true);
        $this->pdf->SetXY(19, 229);
        $this->pdf->MultiCell(50, 5, "ALAMAT", 0, 'L',  true);
        $this->pdf->SetXY(19, 234);
        $this->pdf->MultiCell(50, 5, "MERK/TYPE/WARNA/TAHUN", 0, 'L',  true);
        $this->pdf->SetXY(19, 239);
        $this->pdf->MultiCell(50, 5, "No Rangka", 0, 'L',  true);
        $this->pdf->SetXY(19, 244);
        $this->pdf->MultiCell(50, 5, "No Mesin", 0, 'L',  true);
        $this->pdf->SetXY(19, 249);
        $this->pdf->MultiCell(50, 5, "No Polisi", 0, 'L',  true);


        // SURAT JALAN (DATA)
        $this->pdf->SetFont('Arial', '', '8');
        $this->pdf->SetXY(62, 224);
        $this->pdf->MultiCell(130, 5, ": " . $data->nama, 0, 'L',  true);
        $this->pdf->SetXY(62, 229);
        $this->pdf->MultiCell(130, 5, ": " . $data->alamat, 0, 'L',  true);
        $this->pdf->SetXY(62, 234);
        $this->pdf->MultiCell(130, 5, ": " . $data->merek . "/" . $data->type . "/" . $data->warna . "/" . $data->tahun_pembuatan, 0, 'L',  true);
        $this->pdf->SetXY(62, 239);
        $this->pdf->MultiCell(130, 5, ": " . $data->no_rangka, 0, 'L',  true);
        $this->pdf->SetXY(62, 244);
        $this->pdf->MultiCell(130, 5, ": " . $data->no_mesin, 0, 'L',  true);
        $this->pdf->SetXY(62, 249);
        $this->pdf->MultiCell(130, 5, ": " . $data->no_polisi, 0, 'L',  true);
        $this->pdf->SetXY(130, 255);
        $this->pdf->MultiCell(30, 5, "Hormat Kami,", 0, 'L',  true);
        $this->pdf->SetXY(130, 270);
        $this->pdf->MultiCell(30, 5, $setting->nama_pemilik, 0, 'L',  true);
        $this->pdf->SetXY(29, 255);
        $this->pdf->MultiCell(30, 5, "Yang Menerima,", 0, 'L',  true);
        // $this->pdf->SetXY(29, 270);
        // $this->pdf->MultiCell(30, 5, "Gian Sonia,", 0, 'L',  true);



        // Simpan file PDF ke server
        $this->pdf->Output('Kwitansi.pdf', 'I');
        exit;
    }

    public function cetak_kwitansi_cash($unique)
    {

        $data = Buy::get_data($unique);
        $setting = Setting::first();

        $this->pdf->AddPage('P', 'A4');
        $this->pdf->SetFont('Arial', 'B', '8');
        $this->pdf->SetFillColor(255, 255, 255);
        $this->pdf->SetTextColor(0, 0, 0);
        $this->pdf->SetDrawColor(0, 0, 0);
        $this->pdf->SetXY(10, 10);
        $this->pdf->MultiCell(8, 100, '', 1, '0', 'C', true);


        //Row 2
        $this->pdf->SetXY(18, 10);
        $this->pdf->MultiCell(178, 100, "", 1, 'L',  true);


        // KWITANSI PELUNASAN
        $this->pdf->SetFont('Arial', 'U', '10');
        $this->pdf->SetXY(19, 11);
        $this->pdf->MultiCell(50, 5, "KWITANSI PENJUALAN", 0, 'L',  true);
        $this->pdf->SetFont('Arial', '', '8');
        $this->pdf->SetXY(19, 17);
        $this->pdf->MultiCell(50, 5, "Telah diterima dari", 0, 'L',  true);
        $this->pdf->SetXY(19, 22);
        $this->pdf->MultiCell(50, 5, "Jumlah", 0, 'L',  true);
        $this->pdf->SetXY(19, 27);
        $this->pdf->MultiCell(50, 5, "Terbilang", 0, 'L',  true);
        $this->pdf->SetXY(19, 32);
        $this->pdf->MultiCell(50, 5, "Untuk Pembayaran", 0, 'L',  true);
        $this->pdf->SetXY(19, 37);
        $this->pdf->MultiCell(50, 5, "Merk", 0, 'L',  true);
        $this->pdf->SetXY(19, 42);
        $this->pdf->MultiCell(50, 5, "Tipe", 0, 'L',  true);
        $this->pdf->SetXY(19, 47);
        $this->pdf->MultiCell(50, 5, "Tahun Pembuatan", 0, 'L',  true);
        $this->pdf->SetXY(19, 52);
        $this->pdf->MultiCell(50, 5, "Warna", 0, 'L',  true);
        $this->pdf->SetXY(19, 57);
        $this->pdf->MultiCell(50, 5, "No Rangka", 0, 'L',  true);
        $this->pdf->SetXY(19, 62);
        $this->pdf->MultiCell(50, 5, "No Mesin", 0, 'L',  true);
        $this->pdf->SetXY(19, 67);
        $this->pdf->MultiCell(50, 5, "No Polisi", 0, 'L',  true);
        // KWITANSI PELUNASAN (DATA)
        $this->pdf->SetFont('Arial', '', '8');
        $this->pdf->SetXY(62, 17);
        $this->pdf->MultiCell(130, 5, ": " . strtoupper($data->nama), 0, 'L',  true);
        $this->pdf->SetXY(62, 22);
        $this->pdf->MultiCell(130, 5, ": " . rupiah($data->harga_jual), 0, 'L',  true);
        $this->pdf->SetXY(62, 27);
        $this->pdf->MultiCell(130, 5, ": "  . terbilang($data->harga_jual) . " Rupiah", 0, 'L',  true);
        $this->pdf->SetXY(62, 32);
        $this->pdf->MultiCell(130, 5, ": Pembelian 1(Satu) Unit Motor", 0, 'L',  true);
        $this->pdf->SetXY(62, 37);
        $this->pdf->MultiCell(130, 5, ": " . $data->merek, 0, 'L',  true);
        $this->pdf->SetXY(62, 42);
        $this->pdf->MultiCell(130, 5, ": " . $data->type, 0, 'L',  true);
        $this->pdf->SetXY(62, 47);
        $this->pdf->MultiCell(130, 5, ": " . $data->tahun_pembuatan, 0, 'L',  true);
        $this->pdf->SetXY(62, 52);
        $this->pdf->MultiCell(130, 5, ": " . $data->warna, 0, 'L',  true);
        $this->pdf->SetXY(62, 57);
        $this->pdf->MultiCell(130, 5, ": " . $data->no_rangka, 0, 'L',  true);
        $this->pdf->SetXY(62, 62);
        $this->pdf->MultiCell(130, 5, ": " . $data->no_mesin, 0, 'L',  true);
        $this->pdf->SetXY(62, 67);
        $this->pdf->MultiCell(130, 5, ": " . $data->no_polisi, 0, 'L',  true);
        $this->pdf->SetXY(130, 73);
        $this->pdf->MultiCell(30, 5, $setting->kota . ",", 0, 'L',  true);
        $this->pdf->SetXY(130, 96);
        $this->pdf->MultiCell(30, 5, $setting->nama_pemilik, 0, 'L',  true);

        // Simpan file PDF ke server
        $this->pdf->Output('Kwitansi.pdf', 'I');
        exit;
    }
}
