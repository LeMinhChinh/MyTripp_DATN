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
}
