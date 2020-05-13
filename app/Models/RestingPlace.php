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
                    ->where('rp.place',$id)
                    ->get();
        return $data;
    }
}
