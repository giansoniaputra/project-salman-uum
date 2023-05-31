<?php

namespace App\Http\Controllers;

use App\Models\Buy;
use App\Models\Sele;
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

    public function cetak_penjualan_cash_date(Request $request)
    {
        $t_awal = explode('/', $request->tanggal_awal);
        $t_akhir = explode('/', $request->tanggal_akhir);
        $tanggal_awal = implode('-', $t_awal);
        $tanggal_akhir = implode('-', $t_akhir);
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
        $this->pdf->Cell(32, 7, 'Penjual', 1, '0', 'C', true);
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
        // Simpan file PDF ke server
        $this->pdf->Output('i', 'Laporan Penjualan Cash (' . tanggal_hari($tanggal_awal) . ' - ' . tanggal_hari($tanggal_akhir) . ').pdf', 'false');
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
        $this->pdf->Cell(32, 7, 'Penjual', 1, '0', 'C', true);
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
        // Simpan file PDF ke server
        $this->pdf->Output('i', 'Laporan Penjualan Cash Hari Ini (' . tanggal_hari(Carbon::now()) . ').pdf', 'false');
    }

    public function cetak_week(Request $request)
    {
        $now = Carbon::now();
        $now->setWeekStartsAt(Carbon::MONDAY); // Mengatur minggu dimulai pada hari Minggu
        $now->setWeekEndsAt(Carbon::SUNDAY); // Mengatur minggu berakhir pada hari Sabtu
        $startOfWeek = $now->startOfWeek(); // Tanggal awal minggu ini (minggu dimulai pada hari Minggu)
        $endOfWeek = $now->endOfWeek(); // Tanggal akhir minggu ini (minggu berakhir pada hari Sabtu)
        return $endOfWeek;
        $minggu_awal =  date('Y-m-d', strtotime($startOfWeek));
        $minggu_akhir =  date('Y-m-d', strtotime($endOfWeek));
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
        $this->pdf->Cell(32, 7, 'Penjual', 1, '0', 'C', true);
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
        // Simpan file PDF ke server
        $this->pdf->Output('i', 'Laporan Penjualan Cash (' . tanggal_hari($minggu_awal) . ' - ' . tanggal_hari($minggu_akhir) . ').pdf', 'false');
    }
}
