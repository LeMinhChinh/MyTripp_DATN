<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DetailBooking extends Model
{
    protected $table = 'detail_booking';

    // public function getIdRoomBooking($checkin, $checkout)
    // {
    //     $data = DB::table("detail_booking");
    //                 if($checkin){
    //                     $data = $data->where('checkout','<=', $checkin);
    //                 }
    //                 if($checkout){
    //                     $data = $data->where('checkout','<=', $checkout);
    //                 }
    //                 $data = $data->pluck('id')->get()->toArray();
    //     return $data;
    // }
}
