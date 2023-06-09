<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class List_regorder extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'unique';
    }

    public static function dataTables($unique = '')
    {
        $query = DB::table('list_regorders')
            ->where('unique', $unique);
        return $query->get();
    }
}
