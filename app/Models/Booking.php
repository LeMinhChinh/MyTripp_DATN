<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Booking extends Model
{
    protected $table = 'booking';

    // Owner
    public function getDataRequest($id)
    {
        $data = DB::table('booking as b')
                    ->select('b.*')
                    ->join('detail_booking as dt','dt.id_book','=','b.id')
                    ->wherein('dt.id_rp',$id)
                    ->paginate(10);
        return $data;
    }

    public function updateBooking($id, $status)
    {
        $update = DB::table('booking')
                    ->where('id',$id);
                    if($status == 0){
                        $update = $update->update(['status' => 1]);
                    }
                    if($status == 1){
                        $update = $update->update(['status' => 0]);
                    }
        return $update;
    }
}
