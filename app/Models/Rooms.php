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

    public function getRoomByDiscount()
    {
        $data = DB::table('rooms as r')
                    ->select('r.*','rp.name as rp','p.name as place','t.name as type', 'tb.name as name_bed')
                    ->join('resting_places as rp','rp.id','=','r.id_rp')
                    ->join('place as p','p.id','=','rp.place')
                    ->join('type_rp as t','t.id','=','rp.type')
                    ->join('type_bed as tb','tb.id','=','r.type_bed')
                    ->orderby('r.discount','DESC')
                    ->take(6)
                    ->get();
        return $data;
    }

    public function getDataRoomBooking($id, $child, $adult)
    {
        $data = DB::table('rooms as r')
                    ->select('r.*','tb.name as name_bed','rp.name as rp','p.name as place','t.name as type', 'address','rp.id as idRp')
                    ->join('resting_places as rp','rp.id','=','r.id_rp')
                    ->join('place as p','p.id','=','rp.place')
                    ->join('type_rp as t','t.id','=','rp.type')
                    ->join('type_bed as tb','tb.id','=','r.type_bed')
                    ->whereNotIn('r.id', $id);
                    if($adult){
                        $data = $data->where('r.adult', $adult);
                    }
                    if($adult){
                        $data = $data->where('r.child', $child);
                    }
                    $data = $data->paginate(10);
        return $data;
    }

    public function getRoomById($id)
    {
        $data =DB::table('rooms as r')
                    ->select('r.*','rp.name as nameHotel','tb.name as namebed','tp.name as type','rate','address','rp.id as idRp')
                    ->join('resting_places as rp','rp.id','=','r.id_rp')
                    ->join('type_rp as tp','tp.id','=','rp.type')
                    ->join('type_bed as tb','tb.id','=','r.type_bed')
                    ->where('r.id',$id)
                    ->first();
        return $data;
    }

    public function getRoomByListId($id)
    {
        $data =DB::table('rooms as r')
                    ->select('r.*','rp.name as nameHotel','tb.name as namebed','tp.name as type','rate','address','rp.id as idRp')
                    ->join('resting_places as rp','rp.id','=','r.id_rp')
                    ->join('type_rp as tp','tp.id','=','rp.type')
                    ->join('type_bed as tb','tb.id','=','r.type_bed')
                    ->whereIn('r.id',$id)
                    ->get();
        return $data;
    }

    // Admin

    public function getInforRoomById($id, $keyword)
    {
        $data =DB::table('rooms as r')
                    ->select('r.*','rp.name as nameHotel','tb.name as namebed')
                    ->join('resting_places as rp','rp.id','=','r.id_rp')
                    ->join('type_bed as tb','tb.id','=','r.type_bed')
                    ->where('r.id_rp',$id)
                    ->orderby('r.id','ASC');
                    if($keyword!= null){
                        $data = $data->where('r.name', 'like', '%'.$keyword.'%');
                    }
                    $data = $data->paginate(15);
        return $data;
    }

    public function createRoom($data)
    {
        DB::table('rooms')->insert($data);
        $id = DB::getPdo()->lastInsertId();
        return $id;
    }

    public function updateRoom($data, $id)
    {
        $update = DB::table('rooms')
                    ->where('id',$id)
                    ->update($data);
        return $update;
    }

    public function deleteRoomById($id)
    {
        $delete = DB::table('rooms');
                        if(is_numeric($id)){
                            $delete = $delete->where('id', $id);
                        }else{
                            $delete = $delete->wherein('id', $id);
                        }
                        $delete = $delete->delete();
        return $delete;
    }

    // Owner
    public function deleteRoomByIdHotel($id)
    {
        $delete = DB::table('rooms');
                        if(is_numeric($id)){
                            $delete = $delete->where('id_rp', $id);
                        }else{
                            $delete = $delete->wherein('id_rp', $id);
                        }
                        $delete = $delete->delete();
        return $delete;
    }
}
