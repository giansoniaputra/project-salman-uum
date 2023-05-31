<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sele extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public function buy()
    {
        return $this->belongsTo(Buy::class);
    }

    public function getRouteKeyName()
    {
        return 'unique';
    }

    public static function data_pertanggal($awal, $akhir)
    {
        $query = DB::table('seles as a')
            ->join('buyers as b', 'a.buyer_id', '=', 'b.id')
            ->join('bikes as c', 'a.bike_id', '=', 'c.id')
            ->where('a.tanggal_jual', '>=', $awal)
            ->where('a.tanggal_jual', '<=', $akhir)
            ->orderBy('a.tanggal_jual', 'DESC');
        return $query->get();
    }

    public static function data_hari_ini($tanggal)
    {
        $query = DB::table('seles as a')
            ->join('buyers as b', 'a.buyer_id', '=', 'b.id')
            ->join('bikes as c', 'a.bike_id', '=', 'c.id')
            ->where('a.tanggal_jual', '=', $tanggal)
            ->orderBy('a.tanggal_jual', 'DESC');
        return $query->get();
    }

    public static function data_minggu_ini()
    {
        $now = Carbon::now();
        $now->setWeekStartsAt(Carbon::MONDAY); // Mengatur minggu dimulai pada hari Minggu
        $now->setWeekEndsAt(Carbon::SUNDAY); // Mengatur minggu berakhir pada hari Sabtu
        $startOfWeek = $now->startOfWeek(); // Tanggal awal minggu ini (minggu dimulai pada hari Minggu)
        $endOfWeek = $now->endOfWeek(); // Tanggal akhir minggu ini (minggu berakhir pada hari Sabtu)
        $query = DB::table('seles as a')
            ->join('buyers as b', 'a.buyer_id', '=', 'b.id')
            ->join('bikes as c', 'a.bike_id', '=', 'c.id')
            ->whereBetween('tanggal_jual', [$startOfWeek, $endOfWeek])
            ->orderBy('a.tanggal_jual', 'DESC');
        return $query->get();
    }
}
