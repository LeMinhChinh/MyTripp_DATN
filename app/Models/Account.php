<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Account extends Model
{
    protected $table = 'account';

    public function checkAccountLogin($user, $password)
    {
        $data = [];
        $info = Account::select('*')
                        ->where([
                            'email' => $user,
                            'password' => md5($password),
                            'status' => 1
                        ])
                        ->first();
        if($info){
            $data = $info->toArray();
        }
        return $data;
    }

    public function registerAccount($data)
    {
        DB::table('account')->insert($data);
        $id = DB::getPdo()->lastInsertId();
        return $id;
    }

    public function getDataInforAccountById($id)
    {
        $data = Account::select('*')
                        ->where('id',$id)
                        ->first();
        return $data;
    }

    public function updateInforPerson($data, $id)
    {
        $update = DB::table('account')
                        ->where('id',$id)
                        ->update($data);
        return $update;
    }

    // Admin
    public function getDataAccount($keyword, $role)
    {
        $data = Account::select('*');
                        if($keyword!= null){
                            $data = $data->where('username', 'like', '%'.$keyword.'%')
                                        ->orWhere('name', 'like', '%'.$keyword.'%')
                                        ->orWhere('surname', 'like', '%'.$keyword.'%');
                        }
                        if($role != null){
                            $data = $data->where('role',$role);
                        }
                        $data = $data->paginate(15);
        return $data;
    }

    public function deleteAccountById($id)
    {
        $delete = DB::table('account');
                    if(is_numeric($id)){
                        $delete = $delete->where('id', $id);
                    }else{
                        $delete = $delete->wherein('id', $id);
                    }
                    $delete = $delete->delete();
        return $delete;
    }
}
