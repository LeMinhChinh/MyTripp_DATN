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
                    ->where('rp.status',2)
                    ->first();
        return $data;
    }

    public function getInforListRPByIdPlace($idp, $idt)
    {
        $data = DB::table('resting_places as rp')
                    ->select('rp.*', 'p.name as pname', 'trp.name as tname')
                    ->join('type_rp as trp', 'trp.id','=','rp.type')
                    ->join('place as p','p.id','=','rp.place')
                    ->where('rp.status',2);
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
                    ->where('rp.status',2)
                    ->groupby('rp.id')
                    ->get();
        return $data;
    }

    public function getMaxCountEmotion()
    {
        $data = DB::table('resting_places as rp')
                    ->leftjoin('feedback_rp as fb','rp.id','=','fb.id_rp')
                    ->select(DB::raw('count(fb.id) as count_id, rp.id, sum(fb.emotion) as sum_emotion'))
                    ->where('rp.status',2)
                    ->groupby('rp.id')
                    ->orderBy('sum_emotion','DESC')
                    ->take(4)
                    ->get();
        return $data;
    }

    public function getInforListRP()
    {
        $data = DB::table('resting_places as rp')
                    ->select('rp.*','trp.name as type_name')
                    ->join('type_rp as trp', 'trp.id','=','rp.type')
                    ->where('rp.status',2)
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
                    ->where('rp.status',2)
                    ->first();
        return $data;
    }
}
