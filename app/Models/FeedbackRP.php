<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\RestingPlace;

class FeedbackRP extends Model
{
    protected $table = 'feedback_rp';

    public function getDataFeedback($id)
    {
        $data = DB::table('feedback_rp as fb')
                    ->select('fb.*','a.surname','a.name','a.avatar','a.gender','a.username')
                    ->join('account as a','a.id','=','fb.id_acc')
                    ->where('fb.id',$id)
                    ->get();
        return $data;
    }
}
