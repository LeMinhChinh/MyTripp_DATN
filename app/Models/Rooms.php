<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Rooms extends Model
{
    protected $table = 'rooms';

    public function getInforRoomByIdRP($id)
    {
        $data = DB::table('rooms as r')
                    ->select('r.*','tb.name as name_bed')
                    ->join('type_bed as tb','tb.id','=','r.type_bed')
                    ->where('r.id_rp',$id)
                    ->get();
        return $data;
    }

    // public function getDataRoom()
    // {
    //     $data = DB::table('rooms as r')
    //                 ->select('r.price','')
    // }
}
