<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DetailBooking extends Model
{
    protected $table = 'detail_booking';

    public function getDashboardDetail($id, $dateFrom, $dateTo, $hotel)
    {
        $data = DB::table('detail_booking as dt')
                    ->join('booking as b','b.id','=','dt.id_book')
                    ->select('b.total');
                    if($hotel === "all" | $hotel === null){
                        $data = $data->wherein('dt.id_rp', $id);
                    }else{
                        $data = $data->where('dt.id_rp', $hotel);
                    }
                    $data = $data->where('dt.checkout','>=',$dateFrom)
                    ->where('dt.checkout','<=',$dateTo)
                    ->where('b.status', 1)
                    ->get();
        return $data;
    }
}
