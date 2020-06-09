<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class FeedbackUser extends Model
{
    protected $table = 'feedback_user';

    public function feedbackUser($data)
    {
        DB::table('feedback_user')->insert($data);
        $id = DB::getPdo()->lastInsertId();
        return $id;
    }

    //Admin
    public function getDataFeedback($keyword)
    {
        $data = DB::table('feedback_user')
                    ->select('*');
                    if($keyword!= null){
                        $data = $data->orWhere('name', 'like', '%'.$keyword.'%');
                    }
                    $data = $data->paginate(15);
        return $data;
    }

    public function deleteFeedbackById($id)
    {
        $delete = DB::table('feedback_user');
                        if(is_numeric($id)){
                            $delete = $delete->where('id', $id);
                        }else{
                            $delete = $delete->wherein('id', $id);
                        }
                        $delete = $delete->delete();
        return $delete;
    }

    public function updateFeedback($id, $content){
        $update = DB::table('feedback_user')
                    ->where('id',$id)
                    ->update(['reply' => $content]);
        return $update;
    }
}
