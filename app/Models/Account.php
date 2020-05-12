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
}
