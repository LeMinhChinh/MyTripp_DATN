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
                    ->where('rp.id', $id)
                    ->where('rp.publish',1)
                    ->first();
        return $data;
    }

    public function getInforListRPByIdPlace($idp, $idt, $rate)
    {
        $data = DB::table('resting_places as rp')
                    ->select('rp.*', 'p.name as pname', 'trp.name as tname')
                    ->join('type_rp as trp', 'trp.id','=','rp.type')
                    ->join('place as p','p.id','=','rp.place')
                    ->where('rp.publish',1);
                    if($idt == 0){
                        $data = $data->where('rp.place',$idp);
                    }
                    if($idp == 0){
                        $data = $data->where('rp.type', $idt);
                    }
                    if($rate !== null){
                        $data = $data->wherein('rp.rate',$rate);
                    }
                    $data = $data->paginate(10);
        return $data;
    }

    public function filterRPByType($idp, $idt,$rate, $fb)
    {
        $data = DB::table('resting_places as rp')
                    ->select('rp.*', 'p.name as pname', 'trp.name as tname')
                    ->join('type_rp as trp', 'trp.id','=','rp.type')
                    ->join('place as p','p.id','=','rp.place')
                    ->where('rp.publish',1);
                    if($idt == 0){
                        $data = $data->where('rp.place',$idp);
                    }
                    if($idp == 0){
                        $data = $data->where('rp.type', $idt);
                    }
                    if($rate){
                        $data = $data->wherein('rp.rate',$rate);
                    }
                    $data = $data->get();
        return $data;
    }

    // public function countFBListRP($idp, $idt)
    public function countFBListRP()
    {
        $data = DB::table('resting_places as rp')
                    ->leftjoin('feedback_rp as fb','rp.id','=','fb.id_rp')
                    ->select(DB::raw('count(fb.id) as count_id, rp.id, sum(fb.emotion) as sum_emotion'))
                    ->groupby('rp.id')
                    ->where('rp.publish',1)
                    ->get();
        return $data;
    }

    public function getMaxCountEmotion()
    {
        $data = DB::table('resting_places as rp')
                    ->leftjoin('feedback_rp as fb','rp.id','=','fb.id_rp')
                    ->select(DB::raw('count(fb.id) as count_id, rp.id, sum(fb.emotion) as sum_emotion'))
                    ->where('rp.publish',1)
                    ->groupby('rp.id')
                    ->orderBy('sum_emotion','DESC')
                    ->take(4)
                    ->get();
        return $data;
    }

    public function getInforListRP($id)
    {
        $data = DB::table('resting_places as rp')
                    ->select('rp.*','trp.name as type_name')
                    ->join('type_rp as trp', 'trp.id','=','rp.type')
                    ->whereIn('rp.id',$id)
                    ->where('rp.publish',1)
                    ->get();
        return $data;
    }

    public function getDataRPByRoom($id)
    {
        $data = DB::table('resting_places as rp')
                    ->select('rp.name','p.name as name_place','trp.name as name_type','rp.id','p.id as id_place','trp.id as id_type')
                    ->join('place as p','p.id','=','rp.place')
                    ->join('type_rp as trp','trp.id','=','rp.type')
                    ->where('rp.id',$id)
                    ->where('rp.publish',1)
                    ->first();
        return $data;
    }

    public function getRPSearch($keyword, $rate)
    {
        $data = DB::table('resting_places as rp')
                    ->select('rp.*','p.name as pname', 'trp.name as tname')
                    ->join('place as p','p.id','=','rp.place')
                    ->join('type_rp as trp', 'trp.id','=','rp.type')
                    ->where('rp.publish',1);
                    if($keyword != null){
                        $data = $data->where('rp.name','like', '%'.$keyword.'%')
                                    ->orwhere('p.name','like', '%'.$keyword.'%');
                    }
                    if($rate !== null){
                        $data = $data->wherein('rp.rate',$rate);
                    }
                    $data = $data->paginate(10);
        return $data;
    }

    public function filterDataSearch($keyword, $rate)
    {
        $data = DB::table('resting_places as rp')
                    ->select('rp.*','p.name as pname', 'trp.name as tname')
                    ->join('place as p','p.id','=','rp.place')
                    ->join('type_rp as trp', 'trp.id','=','rp.type')
                    ->where('rp.publish',1);
                    if($keyword != null){
                        $data = $data->where('rp.name','like', '%'.$keyword.'%')
                                    ->orwhere('p.name','like', '%'.$keyword.'%');
                    }
                    if($rate != null){
                        $data = $data->wherein('rp.rate',$rate);
                    }
                    $data = $data->paginate(10);
        return $data;
    }

    public function countFBListRPSearch($keyword)
    {
        $data = DB::table('resting_places as rp')
                    ->leftjoin('feedback_rp as fb','rp.id','=','fb.id_rp')
                    ->join('place as p','p.id','=','rp.place')
                    ->select(DB::raw('count(fb.id) as count_id, rp.id, sum(fb.emotion) as sum_emotion'))
                    ->where('rp.publish',1)
                    ->groupby('rp.id');
                    if($keyword != null){
                        $data = $data->where('rp.name','like', '%'.$keyword.'%')
                                    ->orwhere('p.name','like', '%'.$keyword.'%');
                    }
                    $data = $data->get();
        return $data;
    }

    public function countFBFilterDataSearch($keyword, $rate)
    {
        $data = DB::table('resting_places as rp')
                    ->leftjoin('feedback_rp as fb','rp.id','=','fb.id_rp')
                    ->join('place as p','p.id','=','rp.place')
                    ->select(DB::raw('count(fb.id) as count_id, rp.id, sum(fb.emotion) as sum_emotion'))
                    ->groupby('rp.id')
                    ->where('rp.publish',1);
                    if($keyword != null){
                        $data = $data->where('rp.name','like', '%'.$keyword.'%')
                                    ->orwhere('p.name','like', '%'.$keyword.'%');
                    }
                    if($rate != null){
                        $data = $data->wherein('rp.rate',$rate);
                    }
                    $data = $data->get();
        return $data;
    }

    public function getDataRPBooking($id, $rate)
    {
        $data = DB::table('resting_places as rp')
                    ->select('rp.*', 'p.name as pname', 'trp.name as tname')
                    ->join('type_rp as trp', 'trp.id','=','rp.type')
                    ->join('place as p','p.id','=','rp.place')
                    ->where('rp.publish',1)
                    ->wherein('rp.id',$id);
                    if($rate !== null){
                        $data = $data->wherein('rp.rate',$rate);
                    }
                    $data = $data->paginate(10);
        return $data;
    }

    // Owner
    public function createHotel($data)
    {
        DB::table('resting_places')->insert($data);
        $id = DB::getPdo()->lastInsertId();
        return $id;
    }

    public function getInforRPByIdOwner($id, $keyword)
    {
        $data = DB::table('resting_places as rp')
                    ->select('rp.*', 'p.name as pname', 'trp.name as tname')
                    ->join('type_rp as trp', 'trp.id','=','rp.type')
                    ->join('place as p','p.id','=','rp.place');
                    if($keyword!= null){
                        $data = $data->where('rp.name', 'like', '%'.$keyword.'%');
                    }
                    $data = $data->where('rp.id_acc', $id)
                                    ->paginate(15);
        return $data;
    }

    public function deleteHotelById($id)
    {
        $delete = DB::table('resting_places');
                        if(is_numeric($id)){
                            $delete = $delete->where('id', $id);
                        }else{
                            $delete = $delete->wherein('id', $id);
                        }
                        $delete = $delete->delete();
        return $delete;
    }

    public function updateHotel($data, $id)
    {
        $update = DB::table('resting_places')
                    ->where('id',$id)
                    ->update($data);
        return $update;
    }

    public function updateHotelByPayment($data, $id)
    {
        $update = DB::table('resting_places')
                    ->where('id_acc',$id)
                    ->update($data);
        return $update;
    }

    // Admin
    public function getDataRestingPlaceByAdmin($keyword)
    {
        $data = DB::table('resting_places as rp')
                    ->select('rp.id','rp.name','rp.address','rp.email','rp.phone','rp.publish','acc.surname','acc.name as name_owner')
                    ->join('account as acc','acc.id','=','rp.id_acc');
                    if($keyword!= null){
                        $data = $data->where('rp.name', 'like', '%'.$keyword.'%')
                                    ->orwhere('acc.name', 'like', '%'.$keyword.'%')
                                    ->orwhere('acc.surname', 'like', '%'.$keyword.'%');
                    }
                    $data = $data->paginate(15);
        return $data;
    }

    public function updateHotelByAdmin($id, $publish)
    {
        $update = DB::table('resting_places')
                    ->where('id',$id);
                    if($publish == 0){
                        $update = $update->update(['publish' => 1]);
                    }
                    if($publish == 1){
                        $update = $update->update(['publish' => 0]);
                    }
        return $update;
    }

    public function updateDataHotelByAdmin($id, $data)
    {
        $update = DB::table('resting_places')
                    ->wherein('id',$id)
                    ->update($data);
        return $update;
    }
}
