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

    public function getListBookingByOwner($id, $keyword)
    {
        $data = DB::table('detail_booking as dt')
                    ->select('dt.name_rp','dt.name_room','dt.checkin','dt.checkout','dt.id');
                    if($keyword!= null){
                        $data = $data->where('name_room', 'like', '%'.$keyword.'%');
                    }
                    if(is_numeric($id)){
                        $data = $data->where('id_rp', $id);
                    }else{
                        $data = $data->wherein('id_rp', $id);
                    }
        return $data->paginate(15);
    }

    public function getIdIsBook($checkin, $checkout, $id)
    {
        $data = DB::table('detail_booking as dt')
                    ->select('dt.id');
                    if($id > 0){
                        $data = $data->where('id_rp',$id);
                    }
                    if($checkin){
                        $data = $data->where('checkout','<=', $checkin);
                    }
                    if($checkout){
                        $data = $data->orwhere('checkin','>=',$checkout);
                    }
        return $data->get();
    }
}
