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

    public function getInforListRP()
    {
        $data = DB::table('resting_places as rp')
                    ->select('rp.*','trp.name as type_name')
                    ->join('type_rp as trp', 'trp.id','=','rp.type')
                    ->get();
        return $data;
    }
}
