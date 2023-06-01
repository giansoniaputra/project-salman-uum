<?php

namespace App\Http\Controllers;

use App\Models\Buy;
use App\Models\Sele;
use App\Models\Kredit;
use Codedge\Fpdf\Fpdf\Fpdf;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PDF extends Fpdf
{
    public function Header()
    {
        // Menambahkan Logo
        // $this->Image('/img/logo/smac%20white%20transparent.png', 10, 6, 20);
        // Menambahkan judul header
        $this->SetFont('Arial', 'B', 13);
        $this->Cell(30);
        $this->Cell(140, 5, 'SHOWROOM MOTOR', 0, 1, 'C');

        $this->SetFont('Arial', 'B', 18);
        $this->SetTextColor(0, 0, 0);
        $this->Cell(30);
        $this->Cell(140, 9, 'RIFFAT JAYA MOTOR', 0, 1, 'C');

        $this->SetFont('Arial', '', 10);
        $this->SetTextColor(0);
        $this->Cell(30);
        $this->Cell(140, 5, 'Al-Misbah, Gg. Pesantren Jl. Cieunteung No.28, Cilembang, Kec. Cihideung', 0, 1, 'C');
        $this->Cell(30);
        $this->Cell(140, 5, 'Kota Tasikmalaya, Jawa Barat 46122', 0, 1, 'C');

        // Menambahkan garis header
        $this->SetLineWidth(1);
        $this->Line(10, 36, 200, 36);
        $this->SetLineWidth(0);
        $this->Line(10, 37, 200, 37);
        $this->Ln();
    }
    // Membuat page footer
    public function Footer()
    {

        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Halaman ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

class PDFController extends Controller
{

    protected $pdf;


    public function __construct()
    {
        $this->pdf = new PDF;
    }
    //CETAK PENJUALAN
    public function cetak_penjualan_cash_date(Request $request)
    {
        $tanggal_awal = $request->tanggal_awal;
        $tanggal_akhir = $request->tanggal_akhir;
        $query_cash = Sele::data_pertanggal($tanggal_awal, $tanggal_akhir);

        $this->pdf->AddPage('P', 'A4');

        $this->pdf->SetFont('Arial', 'B', '16');
        $this->pdf->Cell(0, 16, 'LAPORAN PENJUALAN CASH', '0', 1, 'C');

        //periode laporan

        $this->pdf->SetFont('Arial', '', '12');
        $this->pdf->Cell(0, 12, 'Periode Laporan: ' . tanggal_hari($tanggal_awal) . ' - ' . tanggal_hari($tanggal_akhir), '0', 1, 'L');

        //Membuat kolom judul tabel
        $this->pdf->SetFont('Arial', '', '8');
        $this->pdf->SetFillColor(9, 132, 227);
        $this->pdf->SetTextColor(255);
        $this->pdf->SetDrawColor(0, 0, 0);
        $this->pdf->Cell(8, 7, 'No', 1, '0', 'C', true);
        $this->pdf->Cell(32, 7, 'Pembeli', 1, '0', 'C', true);
        $this->pdf->Cell(40, 7, 'No Polisi', 1, '0', 'C', true);
        $this->pdf->Cell(29, 7, 'Merk', 1, '0', 'C', true);
        $this->pdf->Cell(29, 7, 'Type', 1, '0', 'C', true);
        $this->pdf->Cell(27, 7, 'Tanggal Jual', 1, '0', 'C', true);
        $this->pdf->Cell(27, 7, 'Harga Jual', 1, '0', 'C', true);
        $this->pdf->Ln();

        //isi data kredit
        //Membuat kolom isi tabel
        $this->pdf->SetFont('Arial', '', '8');
        $this->pdf->SetFillColor(224, 235, 255);
        $this->pdf->SetDrawColor(0, 0, 0);
        $this->pdf->SetTextColor(0);
        $no = 1;
        foreach ($query_cash as $row) {
            $this->pdf->Cell(8, 7, $no++, 1, '0', 'C', true);
            $this->pdf->Cell(32, 7, $row->nama, 1, '0', 'C', true);
            $this->pdf->Cell(40, 7, $row->no_polisi, 1, '0', 'C', true);
            $this->pdf->Cell(29, 7, $row->merek, 1, '0', 'C', true);
            $this->pdf->Cell(29, 7, $row->type, 1, '0', 'C', true);
            $this->pdf->Cell(27, 7, tanggal_hari($row->tanggal_jual), 1, '0', 'C', true);
            $this->pdf->Cell(27, 7, rupiah($row->harga_jual), 1, '0', 'C', true);
            $this->pdf->Ln();
        }
        $this->pdf->Ln();
        $this->pdf->Ln();

        $query_kredit = Kredit::data_pertanggal($tanggal_awal, $tanggal_akhir);
        $this->pdf->SetFont('Arial', 'B', '16');
        $this->pdf->Cell(0, 16, 'LAPORAN PENJUALAN KREDIT', '0', 1, 'C');

        //periode laporan

        $this->pdf->SetFont('Arial', '', '12');
        $this->pdf->Cell(0, 12, 'Periode Laporan: ' . tanggal_hari($tanggal_awal) . ' - ' . tanggal_hari($tanggal_akhir), '0', 1, 'L');

        //Membuat kolom judul tabel
        $this->pdf->SetFont('Arial', '', '8');
        $this->pdf->SetFillColor(9, 132, 227);
        $this->pdf->SetTextColor(255);
        $this->pdf->SetDrawColor(0, 0, 0);
        $this->pdf->Cell(8, 7, 'No', 1, '0', 'C', true);
        $this->pdf->Cell(32, 7, 'Pembeli', 1, '0', 'C', true);
        $this->pdf->Cell(40, 7, 'No Polisi', 1, '0', 'C', true);
        $this->pdf->Cell(29, 7, 'Merk', 1, '0', 'C', true);
        $this->pdf->Cell(29, 7, 'Type', 1, '0', 'C', true);
        $this->pdf->Cell(27, 7, 'Tanggal Jual', 1, '0', 'C', true);
        $this->pdf->Cell(27, 7, 'Harga Jual', 1, '0', 'C', true);
        $this->pdf->Ln();

        //isi data cash
        //Membuat kolom isi tabel
        $this->pdf->SetFont('Arial', '', '8');
        $this->pdf->SetFillColor(224, 235, 255);
        $this->pdf->SetDrawColor(0, 0, 0);
        $this->pdf->SetTextColor(0);
        $no = 1;
        foreach ($query_kredit as $row) {
            $this->pdf->Cell(8, 7, $no++, 1, '0', 'C', true);
            $this->pdf->Cell(32, 7, $row->nama, 1, '0', 'C', true);
            $this->pdf->Cell(40, 7, $row->no_polisi, 1, '0', 'C', true);
            $this->pdf->Cell(29, 7, $row->merek, 1, '0', 'C', true);
            $this->pdf->Cell(29, 7, $row->type, 1, '0', 'C', true);
            $this->pdf->Cell(27, 7, tanggal_hari($row->tanggal_jual), 1, '0', 'C', true);
            $this->pdf->Cell(27, 7, rupiah($row->harga_beli), 1, '0', 'C', true);
            $this->pdf->Ln();
        }
        // Simpan file PDF ke server
        $this->pdf->Output('Laporan Penjualan (' . tanggal_hari($tanggal_awal) . ' - ' . tanggal_hari($tanggal_akhir) . ').pdf', 'I');
        exit;
    }

    public function cetak_day(Request $request)
    {
        $hari_ini =  date('Y-m-d', strtotime(Carbon::now()));
        $query_cash = Sele::data_hari_ini($hari_ini);

        $this->pdf->AddPage('P', 'A4');

        $this->pdf->SetFont('Arial', 'B', '16');
        $this->pdf->Cell(0, 16, 'LAPORAN PENJUALAN CASH', '0', 1, 'C');

        //periode laporan

        $this->pdf->SetFont('Arial', '', '12');
        $this->pdf->Cell(0, 12, 'Periode Laporan: ' . tanggal_hari($hari_ini), '0', 1, 'L');

        //Membuat kolom judul tabel
        $this->pdf->SetFont('Arial', '', '8');
        $this->pdf->SetFillColor(9, 132, 227);
        $this->pdf->SetTextColor(255);
        $this->pdf->SetDrawColor(0, 0, 0);
        $this->pdf->Cell(8, 7, 'No', 1, '0', 'C', true);
        $this->pdf->Cell(32, 7, 'Pembeli', 1, '0', 'C', true);
        $this->pdf->Cell(40, 7, 'No Polisi', 1, '0', 'C', true);
        $this->pdf->Cell(29, 7, 'Merk', 1, '0', 'C', true);
        $this->pdf->Cell(29, 7, 'Type', 1, '0', 'C', true);
        $this->pdf->Cell(27, 7, 'Tanggal Jual', 1, '0', 'C', true);
        $this->pdf->Cell(27, 7, 'Harga Jual', 1, '0', 'C', true);
        $this->pdf->Ln();

        //isi data cash
        //Membuat kolom isi tabel
        $this->pdf->SetFont('Arial', '', '8');
        $this->pdf->SetFillColor(224, 235, 255);
        $this->pdf->SetDrawColor(0, 0, 0);
        $this->pdf->SetTextColor(0);
        $no = 1;
        foreach ($query_cash as $row) {
            $this->pdf->Cell(8, 7, $no++, 1, '0', 'C', true);
            $this->pdf->Cell(32, 7, $row->nama, 1, '0', 'C', true);
            $this->pdf->Cell(40, 7, $row->no_polisi, 1, '0', 'C', true);
            $this->pdf->Cell(29, 7, $row->merek, 1, '0', 'C', true);
            $this->pdf->Cell(29, 7, $row->type, 1, '0', 'C', true);
            $this->pdf->Cell(27, 7, tanggal_hari($row->tanggal_jual), 1, '0', 'C', true);
            $this->pdf->Cell(27, 7, rupiah($row->harga_jual), 1, '0', 'C', true);
            $this->pdf->Ln();
        }
        $this->pdf->Ln();
        $this->pdf->Ln();

        $query_kredit = Kredit::data_hari_ini($hari_ini);;
        $this->pdf->SetFont('Arial', 'B', '16');
        $this->pdf->Cell(0, 16, 'LAPORAN PENJUALAN KREDIT', '0', 1, 'C');

        //periode laporan

        $this->pdf->SetFont('Arial', '', '12');
        $this->pdf->Cell(0, 12, 'Periode Laporan: ' . tanggal_hari($hari_ini), '0', 1, 'L');

        //Membuat kolom judul tabel
        $this->pdf->SetFont('Arial', '', '8');
        $this->pdf->SetFillColor(9, 132, 227);
        $this->pdf->SetTextColor(255);
        $this->pdf->SetDrawColor(0, 0, 0);
        $this->pdf->Cell(8, 7, 'No', 1, '0', 'C', true);
        $this->pdf->Cell(32, 7, 'Pembeli', 1, '0', 'C', true);
        $this->pdf->Cell(40, 7, 'No Polisi', 1, '0', 'C', true);
        $this->pdf->Cell(29, 7, 'Merk', 1, '0', 'C', true);
        $this->pdf->Cell(29, 7, 'Type', 1, '0', 'C', true);
        $this->pdf->Cell(27, 7, 'Tanggal Jual', 1, '0', 'C', true);
        $this->pdf->Cell(27, 7, 'Harga Jual', 1, '0', 'C', true);
        $this->pdf->Ln();

        //isi data cash
        //Membuat kolom isi tabel
        $this->pdf->SetFont('Arial', '', '8');
        $this->pdf->SetFillColor(224, 235, 255);
        $this->pdf->SetDrawColor(0, 0, 0);
        $this->pdf->SetTextColor(0);
        $no = 1;
        foreach ($query_kredit as $row) {
            $this->pdf->Cell(8, 7, $no++, 1, '0', 'C', true);
            $this->pdf->Cell(32, 7, $row->nama, 1, '0', 'C', true);
            $this->pdf->Cell(40, 7, $row->no_polisi, 1, '0', 'C', true);
            $this->pdf->Cell(29, 7, $row->merek, 1, '0', 'C', true);
            $this->pdf->Cell(29, 7, $row->type, 1, '0', 'C', true);
            $this->pdf->Cell(27, 7, tanggal_hari($row->tanggal_jual), 1, '0', 'C', true);
            $this->pdf->Cell(27, 7, rupiah($row->harga_beli), 1, '0', 'C', true);
            $this->pdf->Ln();
        }
        $this->pdf->Output('Laporan Penjualan Hari Ini (' . tanggal_hari(Carbon::now()) . ').pdf', 'I');
        exit;
    }

    public function cetak_week(Request $request)
    {
        $minggu_awal =  Carbon::now()->startOfWeek()->toDateString();
        $minggu_akhir =  Carbon::now()->endOfWeek()->toDateString();
        $query_cash = Sele::data_minggu_ini();

        $this->pdf->AddPage('P', 'A4');

        $this->pdf->SetFont('Arial', 'B', '16');
        $this->pdf->Cell(0, 16, 'LAPORAN PENJUALAN CASH', '0', 1, 'C');

        //periode laporan

        $this->pdf->SetFont('Arial', '', '12');
        $this->pdf->Cell(0, 12, 'Periode Laporan: ' . tanggal_hari($minggu_awal) . ' - ' . tanggal_hari($minggu_akhir), '0', 1, 'L');

        //Membuat kolom judul tabel
        $this->pdf->SetFont('Arial', '', '8');
        $this->pdf->SetFillColor(9, 132, 227);
        $this->pdf->SetTextColor(255);
        $this->pdf->SetDrawColor(0, 0, 0);
        $this->pdf->Cell(8, 7, 'No', 1, '0', 'C', true);
        $this->pdf->Cell(32, 7, 'Pembeli', 1, '0', 'C', true);
        $this->pdf->Cell(40, 7, 'No Polisi', 1, '0', 'C', true);
        $this->pdf->Cell(29, 7, 'Merk', 1, '0', 'C', true);
        $this->pdf->Cell(29, 7, 'Type', 1, '0', 'C', true);
        $this->pdf->Cell(27, 7, 'Tanggal Jual', 1, '0', 'C', true);
        $this->pdf->Cell(27, 7, 'Harga Jual', 1, '0', 'C', true);
        $this->pdf->Ln();

        //isi data cash
        //Membuat kolom isi tabel
        $this->pdf->SetFont('Arial', '', '8');
        $this->pdf->SetFillColor(224, 235, 255);
        $this->pdf->SetDrawColor(0, 0, 0);
        $this->pdf->SetTextColor(0);
        $no = 1;
        foreach ($query_cash as $row) {
            $this->pdf->Cell(8, 7, $no++, 1, '0', 'C', true);
            $this->pdf->Cell(32, 7, $row->nama, 1, '0', 'C', true);
            $this->pdf->Cell(40, 7, $row->no_polisi, 1, '0', 'C', true);
            $this->pdf->Cell(29, 7, $row->merek, 1, '0', 'C', true);
            $this->pdf->Cell(29, 7, $row->type, 1, '0', 'C', true);
            $this->pdf->Cell(27, 7, tanggal_hari($row->tanggal_jual), 1, '0', 'C', true);
            $this->pdf->Cell(27, 7, rupiah($row->harga_jual), 1, '0', 'C', true);
            $this->pdf->Ln();
        }

        $this->pdf->Ln();
        $this->pdf->Ln();

        $query_kredit = Kredit::data_minggu_ini();
        $this->pdf->SetFont('Arial', 'B', '16');
        $this->pdf->Cell(0, 16, 'LAPORAN PENJUALAN KREDIT', '0', 1, 'C');

        //periode laporan

        $this->pdf->SetFont('Arial', '', '12');
        $this->pdf->Cell(0, 12, 'Periode Laporan: ' . tanggal_hari($minggu_awal) . ' - ' . tanggal_hari($minggu_akhir), '0', 1, 'L');

        //Membuat kolom judul tabel
        $this->pdf->SetFont('Arial', '', '8');
        $this->pdf->SetFillColor(9, 132, 227);
        $this->pdf->SetTextColor(255);
        $this->pdf->SetDrawColor(0, 0, 0);
        $this->pdf->Cell(8, 7, 'No', 1, '0', 'C', true);
        $this->pdf->Cell(32, 7, 'Pembeli', 1, '0', 'C', true);
        $this->pdf->Cell(40, 7, 'No Polisi', 1, '0', 'C', true);
        $this->pdf->Cell(29, 7, 'Merk', 1, '0', 'C', true);
        $this->pdf->Cell(29, 7, 'Type', 1, '0', 'C', true);
        $this->pdf->Cell(27, 7, 'Tanggal Jual', 1, '0', 'C', true);
        $this->pdf->Cell(27, 7, 'Harga Jual', 1, '0', 'C', true);
        $this->pdf->Ln();

        //isi data cash
        //Membuat kolom isi tabel
        $this->pdf->SetFont('Arial', '', '8');
        $this->pdf->SetFillColor(224, 235, 255);
        $this->pdf->SetDrawColor(0, 0, 0);
        $this->pdf->SetTextColor(0);
        $no = 1;
        foreach ($query_kredit as $row) {
            $this->pdf->Cell(8, 7, $no++, 1, '0', 'C', true);
            $this->pdf->Cell(32, 7, $row->nama, 1, '0', 'C', true);
            $this->pdf->Cell(40, 7, $row->no_polisi, 1, '0', 'C', true);
            $this->pdf->Cell(29, 7, $row->merek, 1, '0', 'C', true);
            $this->pdf->Cell(29, 7, $row->type, 1, '0', 'C', true);
            $this->pdf->Cell(27, 7, tanggal_hari($row->tanggal_jual), 1, '0', 'C', true);
            $this->pdf->Cell(27, 7, rupiah($row->harga_beli), 1, '0', 'C', true);
            $this->pdf->Ln();
        }
        // Simpan file PDF ke server
        $this->pdf->Output('Laporan Penjualan (' . tanggal_hari($minggu_awal) . ' - ' . tanggal_hari($minggu_akhir) . ').pdf', 'I');
        exit;
    }

    public function cetak_month(Request $request)
    {
        $bulan_awal =  Carbon::now()->startOfMonth()->toDateString();
        $bulan_akhir =  Carbon::now()->endOfMonth()->toDateString();
        $query_cash = Sele::data_bulan_ini();

        $this->pdf->AddPage('P', 'A4');

        $this->pdf->SetFont('Arial', 'B', '16');
        $this->pdf->Cell(0, 16, 'LAPORAN PENJUALAN CASH', '0', 1, 'C');

        //periode laporan

        $this->pdf->SetFont('Arial', '', '12');
        $this->pdf->Cell(0, 12, 'Periode Laporan: ' . tanggal_hari($bulan_awal) . ' - ' . tanggal_hari($bulan_akhir), '0', 1, 'L');

        //Membuat kolom judul tabel
        $this->pdf->SetFont('Arial', '', '8');
        $this->pdf->SetFillColor(9, 132, 227);
        $this->pdf->SetTextColor(255);
        $this->pdf->SetDrawColor(0, 0, 0);
        $this->pdf->Cell(8, 7, 'No', 1, '0', 'C', true);
        $this->pdf->Cell(32, 7, 'Pembeli', 1, '0', 'C', true);
        $this->pdf->Cell(40, 7, 'No Polisi', 1, '0', 'C', true);
        $this->pdf->Cell(29, 7, 'Merk', 1, '0', 'C', true);
        $this->pdf->Cell(29, 7, 'Type', 1, '0', 'C', true);
        $this->pdf->Cell(27, 7, 'Tanggal Jual', 1, '0', 'C', true);
        $this->pdf->Cell(27, 7, 'Harga Jual', 1, '0', 'C', true);
        $this->pdf->Ln();

        //isi data cash
        //Membuat kolom isi tabel
        $this->pdf->SetFont('Arial', '', '8');
        $this->pdf->SetFillColor(224, 235, 255);
        $this->pdf->SetDrawColor(0, 0, 0);
        $this->pdf->SetTextColor(0);
        $no = 1;
        foreach ($query_cash as $row) {
            $this->pdf->Cell(8, 7, $no++, 1, '0', 'C', true);
            $this->pdf->Cell(32, 7, $row->nama, 1, '0', 'C', true);
            $this->pdf->Cell(40, 7, $row->no_polisi, 1, '0', 'C', true);
            $this->pdf->Cell(29, 7, $row->merek, 1, '0', 'C', true);
            $this->pdf->Cell(29, 7, $row->type, 1, '0', 'C', true);
            $this->pdf->Cell(27, 7, tanggal_hari($row->tanggal_jual), 1, '0', 'C', true);
            $this->pdf->Cell(27, 7, rupiah($row->harga_jual), 1, '0', 'C', true);
            $this->pdf->Ln();
        }

        $this->pdf->Ln();
        $this->pdf->Ln();

        $query_kredit = Kredit::data_bulan_ini();
        $this->pdf->SetFont('Arial', 'B', '16');
        $this->pdf->Cell(0, 16, 'LAPORAN PENJUALAN KREDIT', '0', 1, 'C');

        //periode laporan

        $this->pdf->SetFont('Arial', '', '12');
        $this->pdf->Cell(0, 12, 'Periode Laporan: ' . tanggal_hari($bulan_awal) . ' - ' . tanggal_hari($bulan_akhir), '0', 1, 'L');

        //Membuat kolom judul tabel
        $this->pdf->SetFont('Arial', '', '8');
        $this->pdf->SetFillColor(9, 132, 227);
        $this->pdf->SetTextColor(255);
        $this->pdf->SetDrawColor(0, 0, 0);
        $this->pdf->Cell(8, 7, 'No', 1, '0', 'C', true);
        $this->pdf->Cell(32, 7, 'Pembeli', 1, '0', 'C', true);
        $this->pdf->Cell(40, 7, 'No Polisi', 1, '0', 'C', true);
        $this->pdf->Cell(29, 7, 'Merk', 1, '0', 'C', true);
        $this->pdf->Cell(29, 7, 'Type', 1, '0', 'C', true);
        $this->pdf->Cell(27, 7, 'Tanggal Jual', 1, '0', 'C', true);
        $this->pdf->Cell(27, 7, 'Harga Jual', 1, '0', 'C', true);
        $this->pdf->Ln();

        //isi data cash
        //Membuat kolom isi tabel
        $this->pdf->SetFont('Arial', '', '8');
        $this->pdf->SetFillColor(224, 235, 255);
        $this->pdf->SetDrawColor(0, 0, 0);
        $this->pdf->SetTextColor(0);
        $no = 1;
        foreach ($query_kredit as $row) {
            $this->pdf->Cell(8, 7, $no++, 1, '0', 'C', true);
            $this->pdf->Cell(32, 7, $row->nama, 1, '0', 'C', true);
            $this->pdf->Cell(40, 7, $row->no_polisi, 1, '0', 'C', true);
            $this->pdf->Cell(29, 7, $row->merek, 1, '0', 'C', true);
            $this->pdf->Cell(29, 7, $row->type, 1, '0', 'C', true);
            $this->pdf->Cell(27, 7, tanggal_hari($row->tanggal_jual), 1, '0', 'C', true);
            $this->pdf->Cell(27, 7, rupiah($row->harga_beli), 1, '0', 'C', true);
            $this->pdf->Ln();
        }
        // Simpan file PDF ke server
        $this->pdf->Output('Laporan Penjualan (' . tanggal_hari($bulan_awal) . ' - ' . tanggal_hari($bulan_akhir) . ').pdf', 'I');
        exit;
    }

    public function cetak_select_month(Request $request)
    {
        if ($request->bulan == '02') {
            if (Carbon::now()->year % 4 == 0) {
                $tanggal_akhir = '29';
            } else {
                $tanggal_akhir = '28';
            }
        } else if ($request->bulan == '01' || $request->bulan == '03' || $request->bulan == '05' || $request->bulan == '07' || $request->bulan == '08' || $request->bulan == '10' || $request->bulan == '12') {
            $tanggal_akhir = '31';
        } else {
            $tanggal_akhir = '30';
        }
        $bulan_awal = Carbon::now()->year . '-' . $request->bulan . '-01';
        $bulan_akhir = Carbon::now()->year . '-' . $request->bulan . '-' . $tanggal_akhir;

        $query_cash = Sele::data_bulan_ini_select($bulan_awal, $bulan_akhir);

        $this->pdf->AddPage('P', 'A4');

        $this->pdf->SetFont('Arial', 'B', '16');
        $this->pdf->Cell(0, 16, 'LAPORAN PENJUALAN CASH', '0', 1, 'C');

        //periode laporan

        $this->pdf->SetFont('Arial', '', '12');
        $this->pdf->Cell(0, 12, 'Periode Laporan: ' . tanggal_hari($bulan_awal) . ' - ' . tanggal_hari($bulan_akhir), '0', 1, 'L');

        //Membuat kolom judul tabel
        $this->pdf->SetFont('Arial', '', '8');
        $this->pdf->SetFillColor(9, 132, 227);
        $this->pdf->SetTextColor(255);
        $this->pdf->SetDrawColor(0, 0, 0);
        $this->pdf->Cell(8, 7, 'No', 1, '0', 'C', true);
        $this->pdf->Cell(32, 7, 'Pembeli', 1, '0', 'C', true);
        $this->pdf->Cell(40, 7, 'No Polisi', 1, '0', 'C', true);
        $this->pdf->Cell(29, 7, 'Merk', 1, '0', 'C', true);
        $this->pdf->Cell(29, 7, 'Type', 1, '0', 'C', true);
        $this->pdf->Cell(27, 7, 'Tanggal Jual', 1, '0', 'C', true);
        $this->pdf->Cell(27, 7, 'Harga Jual', 1, '0', 'C', true);
        $this->pdf->Ln();

        //isi data cash
        //Membuat kolom isi tabel
        $this->pdf->SetFont('Arial', '', '8');
        $this->pdf->SetFillColor(224, 235, 255);
        $this->pdf->SetDrawColor(0, 0, 0);
        $this->pdf->SetTextColor(0);
        $no = 1;
        foreach ($query_cash as $row) {
            $this->pdf->Cell(8, 7, $no++, 1, '0', 'C', true);
            $this->pdf->Cell(32, 7, $row->nama, 1, '0', 'C', true);
            $this->pdf->Cell(40, 7, $row->no_polisi, 1, '0', 'C', true);
            $this->pdf->Cell(29, 7, $row->merek, 1, '0', 'C', true);
            $this->pdf->Cell(29, 7, $row->type, 1, '0', 'C', true);
            $this->pdf->Cell(27, 7, tanggal_hari($row->tanggal_jual), 1, '0', 'C', true);
            $this->pdf->Cell(27, 7, rupiah($row->harga_jual), 1, '0', 'C', true);
            $this->pdf->Ln();
        }

        $this->pdf->Ln();
        $this->pdf->Ln();

        $query_kredit = Kredit::data_bulan_ini();
        $this->pdf->SetFont('Arial', 'B', '16');
        $this->pdf->Cell(0, 16, 'LAPORAN PENJUALAN KREDIT', '0', 1, 'C');

        //periode laporan

        $this->pdf->SetFont('Arial', '', '12');
        $this->pdf->Cell(0, 12, 'Periode Laporan: ' . tanggal_hari($bulan_awal) . ' - ' . tanggal_hari($bulan_akhir), '0', 1, 'L');

        //Membuat kolom judul tabel
        $this->pdf->SetFont('Arial', '', '8');
        $this->pdf->SetFillColor(9, 132, 227);
        $this->pdf->SetTextColor(255);
        $this->pdf->SetDrawColor(0, 0, 0);
        $this->pdf->Cell(8, 7, 'No', 1, '0', 'C', true);
        $this->pdf->Cell(32, 7, 'Pembeli', 1, '0', 'C', true);
        $this->pdf->Cell(40, 7, 'No Polisi', 1, '0', 'C', true);
        $this->pdf->Cell(29, 7, 'Merk', 1, '0', 'C', true);
        $this->pdf->Cell(29, 7, 'Type', 1, '0', 'C', true);
        $this->pdf->Cell(27, 7, 'Tanggal Jual', 1, '0', 'C', true);
        $this->pdf->Cell(27, 7, 'Harga Jual', 1, '0', 'C', true);
        $this->pdf->Ln();

        //isi data cash
        //Membuat kolom isi tabel
        $this->pdf->SetFont('Arial', '', '8');
        $this->pdf->SetFillColor(224, 235, 255);
        $this->pdf->SetDrawColor(0, 0, 0);
        $this->pdf->SetTextColor(0);
        $no = 1;
        foreach ($query_kredit as $row) {
            $this->pdf->Cell(8, 7, $no++, 1, '0', 'C', true);
            $this->pdf->Cell(32, 7, $row->nama, 1, '0', 'C', true);
            $this->pdf->Cell(40, 7, $row->no_polisi, 1, '0', 'C', true);
            $this->pdf->Cell(29, 7, $row->merek, 1, '0', 'C', true);
            $this->pdf->Cell(29, 7, $row->type, 1, '0', 'C', true);
            $this->pdf->Cell(27, 7, tanggal_hari($row->tanggal_jual), 1, '0', 'C', true);
            $this->pdf->Cell(27, 7, rupiah($row->harga_beli), 1, '0', 'C', true);
            $this->pdf->Ln();
        }
        // Simpan file PDF ke server
        $this->pdf->Output('Laporan Penjualan (' . tanggal_hari($bulan_awal) . ' - ' . tanggal_hari($bulan_akhir) . ').pdf', 'I');
        exit;
    }
    //CETAK PEMBELIAN

    public function cetak_pembelian(Request $request)
    {
        $tanggal_awal = $request->tanggal_awal;
        $tanggal_akhir = $request->tanggal_akhir;
        $query_cash = Buy::data_pertanggal($tanggal_awal, $tanggal_akhir);

        $this->pdf->AddPage('P', 'A4');

        $this->pdf->SetFont('Arial', 'B', '16');
        $this->pdf->Cell(0, 16, 'LAPORAN PEMBELIAN', '0', 1, 'C');

        //periode laporan

        $this->pdf->SetFont('Arial', '', '12');
        $this->pdf->Cell(0, 12, 'Periode Laporan: ' . tanggal_hari($tanggal_awal) . ' - ' . tanggal_hari($tanggal_akhir), '0', 1, 'L');

        //Membuat kolom judul tabel
        $this->pdf->SetFont('Arial', '', '8');
        $this->pdf->SetFillColor(9, 132, 227);
        $this->pdf->SetTextColor(255);
        $this->pdf->SetDrawColor(0, 0, 0);
        $this->pdf->Cell(8, 7, 'No', 1, '0', 'C', true);
        $this->pdf->Cell(32, 7, 'Penjual', 1, '0', 'C', true);
        $this->pdf->Cell(40, 7, 'No Polisi', 1, '0', 'C', true);
        $this->pdf->Cell(29, 7, 'Merk', 1, '0', 'C', true);
        $this->pdf->Cell(29, 7, 'Type', 1, '0', 'C', true);
        $this->pdf->Cell(27, 7, 'Tanggal Beli', 1, '0', 'C', true);
        $this->pdf->Cell(27, 7, 'Harga Beli', 1, '0', 'C', true);
        $this->pdf->Ln();

        //isi data cash
        //Membuat kolom isi tabel
        $this->pdf->SetFont('Arial', '', '8');
        $this->pdf->SetFillColor(224, 235, 255);
        $this->pdf->SetDrawColor(0, 0, 0);
        $this->pdf->SetTextColor(0);
        $no = 1;
        foreach ($query_cash as $row) {
            $this->pdf->Cell(8, 7, $no++, 1, '0', 'C', true);
            $this->pdf->Cell(32, 7, $row->nama, 1, '0', 'C', true);
            $this->pdf->Cell(40, 7, $row->no_polisi, 1, '0', 'C', true);
            $this->pdf->Cell(29, 7, $row->merek, 1, '0', 'C', true);
            $this->pdf->Cell(29, 7, $row->type, 1, '0', 'C', true);
            $this->pdf->Cell(27, 7, tanggal_hari($row->tanggal_beli), 1, '0', 'C', true);
            $this->pdf->Cell(27, 7, rupiah($row->harga_beli), 1, '0', 'C', true);
            $this->pdf->Ln();
        }
        // Simpan file PDF ke server
        $this->pdf->Output('Laporan Pembelian (' . tanggal_hari($tanggal_awal) . ' - ' . tanggal_hari($tanggal_akhir) . ').pdf', 'I');
        exit;
    }

    public function cetak_day_buy(Request $request)
    {
        $hari_ini =  date('Y-m-d', strtotime(Carbon::now()));
        $query_cash = Buy::data_hari_ini($hari_ini);

        $this->pdf->AddPage('P', 'A4');

        $this->pdf->SetFont('Arial', 'B', '16');
        $this->pdf->Cell(0, 16, 'LAPORAN PEMBELIAN', '0', 1, 'C');

        //periode laporan

        $this->pdf->SetFont('Arial', '', '12');
        $this->pdf->Cell(0, 12, 'Periode Laporan: ' . tanggal_hari($hari_ini), '0', 1, 'L');

        //Membuat kolom judul tabel
        $this->pdf->SetFont('Arial', '', '8');
        $this->pdf->SetFillColor(9, 132, 227);
        $this->pdf->SetTextColor(255);
        $this->pdf->SetDrawColor(0, 0, 0);
        $this->pdf->Cell(8, 7, 'No', 1, '0', 'C', true);
        $this->pdf->Cell(32, 7, 'Penjual', 1, '0', 'C', true);
        $this->pdf->Cell(40, 7, 'No Polisi', 1, '0', 'C', true);
        $this->pdf->Cell(29, 7, 'Merk', 1, '0', 'C', true);
        $this->pdf->Cell(29, 7, 'Type', 1, '0', 'C', true);
        $this->pdf->Cell(27, 7, 'Tanggal Beli', 1, '0', 'C', true);
        $this->pdf->Cell(27, 7, 'Harga Beli', 1, '0', 'C', true);
        $this->pdf->Ln();

        //isi data cash
        //Membuat kolom isi tabel
        $this->pdf->SetFont('Arial', '', '8');
        $this->pdf->SetFillColor(224, 235, 255);
        $this->pdf->SetDrawColor(0, 0, 0);
        $this->pdf->SetTextColor(0);
        $no = 1;
        foreach ($query_cash as $row) {
            $this->pdf->Cell(8, 7, $no++, 1, '0', 'C', true);
            $this->pdf->Cell(32, 7, $row->nama, 1, '0', 'C', true);
            $this->pdf->Cell(40, 7, $row->no_polisi, 1, '0', 'C', true);
            $this->pdf->Cell(29, 7, $row->merek, 1, '0', 'C', true);
            $this->pdf->Cell(29, 7, $row->type, 1, '0', 'C', true);
            $this->pdf->Cell(27, 7, tanggal_hari($row->tanggal_beli), 1, '0', 'C', true);
            $this->pdf->Cell(27, 7, rupiah($row->harga_beli), 1, '0', 'C', true);
            $this->pdf->Ln();
        }
        // Simpan file PDF ke server
        $this->pdf->Output('Laporan Pembelian Hari Ini (' . tanggal_hari(Carbon::now()) . ').pdf', 'I');
        exit;
    }

    public function cetak_week_buy(Request $request)
    {
        $minggu_awal =  Carbon::now()->startOfWeek()->toDateString();
        $minggu_akhir =  Carbon::now()->endOfWeek()->toDateString();
        $query_cash = Buy::data_minggu_ini();

        $this->pdf->AddPage('P', 'A4');

        $this->pdf->SetFont('Arial', 'B', '16');
        $this->pdf->Cell(0, 16, 'LAPORAN PEMBELIAN', '0', 1, 'C');

        //periode laporan

        $this->pdf->SetFont('Arial', '', '12');
        $this->pdf->Cell(0, 12, 'Periode Laporan: ' . tanggal_hari($minggu_awal) . ' - ' . tanggal_hari($minggu_akhir), '0', 1, 'L');

        //Membuat kolom judul tabel
        $this->pdf->SetFont('Arial', '', '8');
        $this->pdf->SetFillColor(9, 132, 227);
        $this->pdf->SetTextColor(255);
        $this->pdf->SetDrawColor(0, 0, 0);
        $this->pdf->Cell(8, 7, 'No', 1, '0', 'C', true);
        $this->pdf->Cell(32, 7, 'Penjual', 1, '0', 'C', true);
        $this->pdf->Cell(40, 7, 'No Polisi', 1, '0', 'C', true);
        $this->pdf->Cell(29, 7, 'Merk', 1, '0', 'C', true);
        $this->pdf->Cell(29, 7, 'Type', 1, '0', 'C', true);
        $this->pdf->Cell(27, 7, 'Tanggal Beli', 1, '0', 'C', true);
        $this->pdf->Cell(27, 7, 'Harga Beli', 1, '0', 'C', true);
        $this->pdf->Ln();

        //isi data cash
        //Membuat kolom isi tabel
        $this->pdf->SetFont('Arial', '', '8');
        $this->pdf->SetFillColor(224, 235, 255);
        $this->pdf->SetDrawColor(0, 0, 0);
        $this->pdf->SetTextColor(0);
        $no = 1;
        foreach ($query_cash as $row) {
            $this->pdf->Cell(8, 7, $no++, 1, '0', 'C', true);
            $this->pdf->Cell(32, 7, $row->nama, 1, '0', 'C', true);
            $this->pdf->Cell(40, 7, $row->no_polisi, 1, '0', 'C', true);
            $this->pdf->Cell(29, 7, $row->merek, 1, '0', 'C', true);
            $this->pdf->Cell(29, 7, $row->type, 1, '0', 'C', true);
            $this->pdf->Cell(27, 7, tanggal_hari($row->tanggal_beli), 1, '0', 'C', true);
            $this->pdf->Cell(27, 7, rupiah($row->harga_beli), 1, '0', 'C', true);
            $this->pdf->Ln();
        }
        // Simpan file PDF ke server
        $this->pdf->Output('Laporan Pembelian (' . tanggal_hari($minggu_awal) . ' - ' . tanggal_hari($minggu_akhir) . ').pdf', 'I');
        exit;
    }

    public function cetak_month_buy(Request $request)
    {
        $bulan_awal =  Carbon::now()->startOfMonth()->toDateString();
        $bulan_akhir =  Carbon::now()->endOfMonth()->toDateString();
        $query_cash = Buy::data_bulan_ini();

        $this->pdf->AddPage('P', 'A4');

        $this->pdf->SetFont('Arial', 'B', '16');
        $this->pdf->Cell(0, 16, 'LAPORAN PEMBELIAN', '0', 1, 'C');

        //periode laporan

        $this->pdf->SetFont('Arial', '', '12');
        $this->pdf->Cell(0, 12, 'Periode Laporan: ' . tanggal_hari($bulan_awal) . ' - ' . tanggal_hari($bulan_akhir), '0', 1, 'L');

        //Membuat kolom judul tabel
        $this->pdf->SetFont('Arial', '', '8');
        $this->pdf->SetFillColor(9, 132, 227);
        $this->pdf->SetTextColor(255);
        $this->pdf->SetDrawColor(0, 0, 0);
        $this->pdf->Cell(8, 7, 'No', 1, '0', 'C', true);
        $this->pdf->Cell(32, 7, 'Penjual', 1, '0', 'C', true);
        $this->pdf->Cell(40, 7, 'No Polisi', 1, '0', 'C', true);
        $this->pdf->Cell(29, 7, 'Merk', 1, '0', 'C', true);
        $this->pdf->Cell(29, 7, 'Type', 1, '0', 'C', true);
        $this->pdf->Cell(27, 7, 'Tanggal Beli', 1, '0', 'C', true);
        $this->pdf->Cell(27, 7, 'Harga Beli', 1, '0', 'C', true);
        $this->pdf->Ln();

        //isi data cash
        //Membuat kolom isi tabel
        $this->pdf->SetFont('Arial', '', '8');
        $this->pdf->SetFillColor(224, 235, 255);
        $this->pdf->SetDrawColor(0, 0, 0);
        $this->pdf->SetTextColor(0);
        $no = 1;
        foreach ($query_cash as $row) {
            $this->pdf->Cell(8, 7, $no++, 1, '0', 'C', true);
            $this->pdf->Cell(32, 7, $row->nama, 1, '0', 'C', true);
            $this->pdf->Cell(40, 7, $row->no_polisi, 1, '0', 'C', true);
            $this->pdf->Cell(29, 7, $row->merek, 1, '0', 'C', true);
            $this->pdf->Cell(29, 7, $row->type, 1, '0', 'C', true);
            $this->pdf->Cell(27, 7, tanggal_hari($row->tanggal_beli), 1, '0', 'C', true);
            $this->pdf->Cell(27, 7, rupiah($row->harga_beli), 1, '0', 'C', true);
            $this->pdf->Ln();
        }
        // Simpan file PDF ke server
        $this->pdf->Output('Laporan Pembelian (' . tanggal_hari($bulan_awal) . ' - ' . tanggal_hari($bulan_akhir) . ').pdf', 'I');
        exit;
    }

    public function cetak_select_month_buy(Request $request)
    {
        if ($request->bulan == '02') {
            if (Carbon::now()->year % 4 == 0) {
                $tanggal_akhir = '29';
            } else {
                $tanggal_akhir = '28';
            }
        } else if ($request->bulan == '01' || $request->bulan == '03' || $request->bulan == '05' || $request->bulan == '07' || $request->bulan == '08' || $request->bulan == '10' || $request->bulan == '12') {
            $tanggal_akhir = '31';
        } else {
            $tanggal_akhir = '30';
        }
        $bulan_awal = Carbon::now()->year . '-' . $request->bulan . '-01';
        $bulan_akhir = Carbon::now()->year . '-' . $request->bulan . '-' . $tanggal_akhir;

        $query_cash = Buy::data_bulan_ini_select($bulan_awal, $bulan_akhir);

        $this->pdf->AddPage('P', 'A4');

        $this->pdf->SetFont('Arial', 'B', '16');
        $this->pdf->Cell(0, 16, 'LAPORAN PEMBELIAN', '0', 1, 'C');

        //periode laporan

        $this->pdf->SetFont('Arial', '', '12');
        $this->pdf->Cell(0, 12, 'Periode Laporan: ' . tanggal_hari($bulan_awal) . ' - ' . tanggal_hari($bulan_akhir), '0', 1, 'L');

        //Membuat kolom judul tabel
        $this->pdf->SetFont('Arial', '', '8');
        $this->pdf->SetFillColor(9, 132, 227);
        $this->pdf->SetTextColor(255);
        $this->pdf->SetDrawColor(0, 0, 0);
        $this->pdf->Cell(8, 7, 'No', 1, '0', 'C', true);
        $this->pdf->Cell(32, 7, 'Penjual', 1, '0', 'C', true);
        $this->pdf->Cell(40, 7, 'No Polisi', 1, '0', 'C', true);
        $this->pdf->Cell(29, 7, 'Merk', 1, '0', 'C', true);
        $this->pdf->Cell(29, 7, 'Type', 1, '0', 'C', true);
        $this->pdf->Cell(27, 7, 'Tanggal Beli', 1, '0', 'C', true);
        $this->pdf->Cell(27, 7, 'Harga Beli', 1, '0', 'C', true);
        $this->pdf->Ln();

        //isi data cash
        //Membuat kolom isi tabel
        $this->pdf->SetFont('Arial', '', '8');
        $this->pdf->SetFillColor(224, 235, 255);
        $this->pdf->SetDrawColor(0, 0, 0);
        $this->pdf->SetTextColor(0);
        $no = 1;
        foreach ($query_cash as $row) {
            $this->pdf->Cell(8, 7, $no++, 1, '0', 'C', true);
            $this->pdf->Cell(32, 7, $row->nama, 1, '0', 'C', true);
            $this->pdf->Cell(40, 7, $row->no_polisi, 1, '0', 'C', true);
            $this->pdf->Cell(29, 7, $row->merek, 1, '0', 'C', true);
            $this->pdf->Cell(29, 7, $row->type, 1, '0', 'C', true);
            $this->pdf->Cell(27, 7, tanggal_hari($row->tanggal_beli), 1, '0', 'C', true);
            $this->pdf->Cell(27, 7, rupiah($row->harga_beli), 1, '0', 'C', true);
            $this->pdf->Ln();
        }
        // Simpan file PDF ke server
        $this->pdf->Output('Laporan Pembelian (' . tanggal_hari($bulan_awal) . ' - ' . tanggal_hari($bulan_akhir) . ').pdf', 'I');
        exit;
    }
}
