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
                    ->where('fb.id_rp',$id)
                    ->orderBy('created_at','DESC')
                    ->get();
        return $data;
    }

    public function addReviewToRestingPlace($data)
    {
        DB::table('feedback_rp')->insert($data);
        $id = DB::getPdo()->lastInsertId();
        return $id;
    }

    // Admin
    public function getDataFBById($id)
    {
        $data = DB::table('feedback_rp');
                        if(is_numeric($id)){
                            $data = $data->where('id_acc', $id);
                        }else{
                            $data = $data->wherein('id_acc', $id);
                        }
                        $data = $data->get();
        return $data;
    }

    public function deleteFeedbackById($id)
    {
        $delete = DB::table('feedback_rp');
                    if(is_numeric($id)){
                        $delete = $delete->where('id_acc', $id);
                    }else{
                        $delete = $delete->wherein('id_acc', $id);
                    }
                    $delete = $delete->delete();
        return $delete;
    }
}

