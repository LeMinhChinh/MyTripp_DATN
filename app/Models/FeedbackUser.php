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
        $data = DB::table('feedback_user as fb')
                    ->select('fb.*','a.name','a.surname')
                    ->join('account as a','a.id','=','fb.id_acc');
                    if($keyword!= null){
                        $data = $data->orWhere('a.name', 'like', '%'.$keyword.'%')
                                    ->orWhere('a.surname', 'like', '%'.$keyword.'%');
                    }
                    $data = $data->paginate(15);
        return $data;
    }
}
