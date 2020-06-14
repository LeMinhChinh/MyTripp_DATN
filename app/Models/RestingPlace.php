<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RestingPlace extends Model
{
    protected $table = 'resting_places';

    public function getInforRPById($id)
    {
        $data = DB::table('resting_places as rp')
                    ->select('rp.*', 'p.name as pname', 'trp.name as tname')
                    ->join('type_rp as trp', 'trp.id','=','rp.type')
                    ->join('place as p','p.id','=','rp.place')
                    ->where('rp.id', $id)
                    ->first();
        return $data;
    }

    public function getInforListRPByIdPlace($idp, $idt)
    {
        $data = DB::table('resting_places as rp')
                    ->select('rp.*', 'p.name as pname', 'trp.name as tname')
                    ->join('type_rp as trp', 'trp.id','=','rp.type')
                    ->join('place as p','p.id','=','rp.place');
                    if($idt == 0){
                        $data = $data->where('rp.place',$idp);
                    }
                    if($idp == 0){
                        $data = $data->where('rp.type', $idt);
                    }
                    $data = $data->paginate(6);
        return $data;
    }

    public function countFBListRP($idp, $idt)
    {
        $data = DB::table('resting_places as rp')
                    ->leftjoin('feedback_rp as fb','rp.id','=','fb.id_rp')
                    ->select(DB::raw('count(fb.id) as count_id, rp.id, sum(fb.emotion) as sum_emotion'))
                    ->groupby('rp.id')
                    ->get();
        return $data;
    }

    public function getMaxCountEmotion()
    {
        $data = DB::table('resting_places as rp')
                    ->leftjoin('feedback_rp as fb','rp.id','=','fb.id_rp')
                    ->select(DB::raw('count(fb.id) as count_id, rp.id, sum(fb.emotion) as sum_emotion'))
                    ->groupby('rp.id')
                    ->orderBy('sum_emotion','DESC')
                    ->take(4)
                    ->get();
        return $data;
    }

    public function getInforListRP($id)
    {
        $data = DB::table('resting_places as rp')
                    ->select('rp.*','trp.name as type_name')
                    ->join('type_rp as trp', 'trp.id','=','rp.type')
                    ->whereIn('rp.id',$id)
                    ->get();
        return $data;
    }

    public function getDataRPByRoom($id)
    {
        $data = DB::table('resting_places as rp')
                    ->select('rp.name','p.name as name_place','trp.name as name_type','rp.id','p.id as id_place','trp.id as id_type')
                    ->join('place as p','p.id','=','rp.place')
                    ->join('type_rp as trp','trp.id','=','rp.type')
                    ->where('rp.id',$id)
                    ->first();
        return $data;
    }

    // Admin
    public function createHotel($data)
    {
        DB::table('resting_places')->insert($data);
        $id = DB::getPdo()->lastInsertId();
        return $id;
    }

    public function getInforRPByIdOwner($id, $keyword)
    {
        $data = DB::table('resting_places as rp')
                    ->select('rp.*', 'p.name as pname', 'trp.name as tname')
                    ->join('type_rp as trp', 'trp.id','=','rp.type')
                    ->join('place as p','p.id','=','rp.place');
                    if($keyword!= null){
                        $data = $data->where('rp.name', 'like', '%'.$keyword.'%');
                    }
                    $data = $data->where('rp.id_acc', $id)
                                    ->paginate(15);
        return $data;
    }

    public function deleteHotelById($id)
    {
        $delete = DB::table('resting_places');
                        if(is_numeric($id)){
                            $delete = $delete->where('id', $id);
                        }else{
                            $delete = $delete->wherein('id', $id);
                        }
                        $delete = $delete->delete();
        return $delete;
    }

    public function updateHotel($data, $id)
    {
        $update = DB::table('resting_places')
                    ->where('id',$id)
                    ->update($data);
        return $update;
    }

    public function updateHotelByPayment($data, $id)
    {
        $update = DB::table('resting_places')
                    ->where('id_acc',$id)
                    ->update($data);
        return $update;
    }
}
