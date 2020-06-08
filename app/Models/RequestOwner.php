<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RequestOwner extends Model
{
    protected $table = 'request_owner';

    public function requestOwner($data)
    {
        DB::table('request_owner')->insert($data);
        $id = DB::getPdo()->lastInsertId();
        return $id;
    }

    // Admin
    public function getDataRequest($keyword, $status)
    {
        $data = RequestOwner::select('*');
                        if($keyword!= null){
                            $data = $data->where('name_acc', 'like', '%'.$keyword.'%');
                        }
                        if($status != null){
                            $data = $data->where('status',$status);
                        }
                        $data = $data->paginate(15);
        return $data;
    }

    public function deleteRequestById($id)
    {
        $delete = DB::table('request_owner');
                        if(is_numeric($id)){
                            $delete = $delete->where('id', $id);
                        }else{
                            $delete = $delete->wherein('id', $id);
                        }
                        $delete = $delete->delete();
        return $delete;
    }

    public function updateRequest($id, $status)
    {
        $update = DB::table('request_owner')
                    ->where('id',$id);
                    if($status == 0){
                        $update = $update->update(['status' => 1]);
                    }
                    if($status == 1){
                        $update = $update->update(['status' => 0]);
                    }
        return $update;
    }
}
