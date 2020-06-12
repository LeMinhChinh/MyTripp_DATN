<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Type;
use App\Models\Place;
use Log;
use Illuminate\Support\Facades\Validator;

class OwnerController extends Controller
{
    //dashboard
    public function dashboard(Request $request)
    {
        return view('owner/dashboard');
    }

    //account
    public function information(Request $request, $id, Account $acc)
    {
        $id = $request->id;
        $id = \is_numeric($id) ? $id : 0;

        $inforAcc = $acc->getDataInforAccountById($id);
        $inforAcc = \json_decode(\json_encode($inforAcc), true);

        $data['inforAcc'] = $inforAcc;

        return view('owner/information', $data);
    }

    public function handleUpdateInfomation(Request $request, $id, Account $acc)
    {
        $id = $request->id;
        $id = \is_numeric($id) ? $id : 0;

        $username = $request->psUsername;
        $email = $request->psEmail;
        $surname = $request->psSurname;
        $name = $request->psName;
        $gender = $request->input('psGender');
        $phone = $request->psPhone;
        $age = $request->psAge;
        $address = $request->psAddress;
        $avatar = $request->psAvatar;

        $oldAvatar = Account::where('id',$id)->pluck('avatar')->first();
        $oldAvatar = json_decode(json_encode($oldAvatar), true);

        if($avatar != null){
            if(isset($_FILES['psAvatar'])){
                if($_FILES['psAvatar']['error'] == 0){
                    $validatorAvatar = Validator::make(
                        ['psAvatar' => $request->file('psAvatar')],
                        ['psAvatar' => 'required'],
                        [
                            'required' => 'Vui lòng chọn ảnh'
                        ]
                    );

                    if($validatorAvatar->fails()){
                        return redirect()->route('owner.general-information',['id' => $id])
                                        ->withErrors($validatorAvatar)
                                        ->withInput();
                    }else{
                        $oldAvatar = $_FILES['psAvatar']['name'];
                        $tmpName  = $_FILES['psAvatar']['tmp_name'];
                        $up = move_uploaded_file($tmpName, public_path() . '/user/uploads/avatar/' . $oldAvatar);
                        if(!$up){
                            $request->session()->flash('errorAvatar', 'Lỗi upload ảnh lên server');
                            return redirect()->route('owner.general-information',['id' => $id]);
                        }
                    }
                }
            }
        }

        $dataUpdate = [
            'username' => $username,
            'email' => $email,
            'surname' => $surname,
            'name' => $name,
            'phone' => $phone,
            'gender' => $gender,
            'age' => $age,
            'address' => $address,
            'avatar' => $oldAvatar,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $update = $acc->updateInforPerson($dataUpdate, $id);

        if($update){
            return redirect()->route('owner.information',['id' => $id]);
        }else{
            return redirect()->route('owner.information',['id' => $id]);
        }
    }

    //feedback
    public function myHotel(Request $request, $id)
    {
        return view('owner/my-hotel');
    }

    public function createHotel(Request $request)
    {
        $type = Type::select('id','name')->get();
        $type = \json_decode(\json_encode($type),true);

        $place = Place::select('id','name')->get();
        $place = \json_decode(\json_encode($place),true);

        $data['type'] = $type;
        $data['place'] = $place;

        return view('owner/create-hotel', $data);
    }

    public function handleCreateHotel(Request $request)
    {
        $name = $request->nameHotel;
        $type = $request->typeHotel;
        $place = $request->placeHote;
        $address = $request->addressHotel;
        $email = $request->emailHotel;
        $phone = $request->phoneHotel;
        $rate = $request->rateHotel;
        $wifi = $request->wifiHotel;
        $pool = $request->poolHotel;
        $parking = $request->parkingHotel;
        $age = $request->ageHotel;
        $ageLimit = $request->ageLimitHotel;
        $checkin = $request->checkinHotel;
        $checkout = $request->checkoutHotel;
        $description = $request->descHotel;
        $image = $request->imageHotel;

        if($ageLimit == null){
            $newAge = $age;
        }else{
            $newAge = $ageLimit;
        }

        $arr_img = [];

        // dd($image)
        if(count($image) > 0){
            foreach ($image as $key => $value) {
                if(isset($_FILES['imageHotel'])){
                    if($_FILES['imageHotel']['error'] == 0){
                        $validatorAvatar = Validator::make(
                            ['imageHotel' => $request->file('imageHotel')],
                            ['imageHotel' => 'required'],
                            [
                                'required' => 'Vui lòng chọn ảnh'
                            ]
                        );

                        if($validatorAvatar->fails()){
                            return redirect()->route('owner.createHotel')
                                            ->withErrors($validatorAvatar)
                                            ->withInput();
                        }else{
                            $img = $_FILES['imageHotel']['name'];
                            $tmpName  = $_FILES['imageHotel']['tmp_name'];

                            $up = move_uploaded_file($tmpName, public_path() . '/user/uploads/avatar/' . $oldAvatar);
                            if(!$up){
                                $request->session()->flash('errorAvatar', 'Lỗi upload ảnh lên server');
                                return redirect()->route('owner.createHotel');
                            }
                        }
                        array_push($arr_img, $img);
                    }
                }

            }
        }

        dd($img);
        dd($arr_img);

        $dataHotel = [
            'id_acc' => Session::get('idSession'),
            'name' => $name,
            'type' => $type,
            'place' => $place,
            'address' => $addeess,
            'email' => $email,
            'phone' => $phone,
            'image' => $arr_img,
            'rate' => $rate,
            'wifi' => $wifi,
            'pool' => $pool,
            'parking' => $parking,
            'age' => $newAge,
            'checkin' => $checkin,
            'checkout' => $checkout,
            'description' => $description,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' =>null
        ];
    }
}
