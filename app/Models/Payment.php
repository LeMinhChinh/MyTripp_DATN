<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Payment extends Model
{
    protected $table = 'payments';

    // Admin
    public function getDataPayment($keyword)
    {
        $data = DB::table('payments')
                    ->select('*');
                    if($keyword!= null){
                        $data = $data->where('name_owner', 'like', '%'.$keyword.'%');
                    }
                    $data = $data->paginate(15);
        return $data;
    }

    public function deletePaymentById($id)
    {
        $delete = DB::table('payments');
                        if(is_numeric($id)){
                            $delete = $delete->where('id', $id);
                        }else{
                            $delete = $delete->wherein('id', $id);
                        }
                        $delete = $delete->delete();
        return $delete;
    }

    // Owner
    public function createPayment($data)
    {
        DB::table('payments')->insert($data);
        $id = DB::getPdo()->lastInsertId();
        return $id;
    }

    public function updatePayment($id, $status)
    {
        $update = DB::table('payments')
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
