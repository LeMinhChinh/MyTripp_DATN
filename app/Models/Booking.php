<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Booking extends Model
{
    protected $table = 'booking';

    // Owner
    public function getDataId($id)
    {
        $data = DB::table('booking as b')
                    ->select('b.id')
                    ->join('detail_booking as dt','dt.id_book','=','b.id')
                    ->wherein('dt.id_rp',$id)
                    ->get();
        return $data;
    }

    public function getDataRequest($id, $keyword, $status)
    {
        $data = DB::table('booking as b')
                    ->select('b.*')
                    ->wherein('b.id',$id);
                    if($keyword!= null){
                        $data = $data->where('b.name', 'like', '%'.$keyword.'%');
                    }
                    if($status != null){
                        $data = $data->where('b.status',$status);
                    }
                    $data = $data->paginate(10);
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
