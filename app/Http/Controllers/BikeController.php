<?php

namespace App\Http\Controllers;

use App\Models\Bike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class BikeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'Data Motor | SMAC',
            'judul' => 'Data Motor',
            'breadcumb1' => 'Master',
            'breadcumb2' => 'Data Motor',
        ];
        return view('motor.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(Bike $bike)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bike $bike)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bike $bike)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bike $bike)
    {
        //
    }

    public function dataTables(Request $request)
    {
        if ($request->ajax()) {
            $query = Bike::all();

            return DataTables::of($query)->addColumn('action', function ($row) {
                $actionBtn =
                    '<button class="btn btn-rounded btn-sm btn-primary info-motor-button" data-id="' . $row->id . '"><i class="flaticon-381-view-2"></i>
                Detail Motor</button>';
                return $actionBtn;
            })
                ->make(true);
        }
    }

    public function get_motor(Request $request)
    {
        $motor = DB::table('bikes')
            ->join('buys', 'bikes.id', '=', 'buys.bike_id')->first();
        $motor->berlaku_sampai = tanggal_hari($motor->berlaku_sampai);
        return response()->json(['success' => $motor]);
    }
}
