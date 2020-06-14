<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Type;
use App\Models\Place;
use App\Models\RestingPlace;
use App\Models\Rooms;
use App\Models\TypeBed;
use App\Models\Payment;
use Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

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

    //Resting place
    public function myHotel(Request $request, $id, RestingPlace $rp)
    {
        $keyword = $request->keyword;
        $keyword = \strip_tags($keyword);
        $data['keyword'] = $keyword;

        $inforRP = $rp->getInforRPByIdOwner($id, $keyword);

        $data['paginate'] = $inforRP;
        $inforRP = json_decode(json_encode($inforRP),true);

        $data['inforRP'] = $inforRP['data'] ?? [];

        $count = count($data['inforRP']);
        $data['count'] = $count;

        return view('owner/my-hotel', $data);
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

    public function handleCreateHotel(Request $request, RestingPlace $rp)
    {
        $name = $request->nameHotel;
        $type = $request->input('typeHotel');
        $place = $request->input('placeHotel');
        $address = $request->addressHotel;
        $email = $request->emailHotel;
        $phone = $request->phoneHotel;
        $rate = $request->rateHotel;
        $wifi = $request->wifiHotel;
        $pool = $request->poolHotel;
        $parking = $request->parkingHotel;
        $smoke = $request->smokeHotel;
        $animal = $request->animalHotel;
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

        $payment = Payment::where('id_owner', Session::get('idSession'))->pluck('status')->first();

        if($payment != null){
            if($payment == 1){
                $status = 2;
            }else{
                $status = 1;
            }
        }

        $viewFile = '';

        if($image != null && count($image) > 0){
            $uploads = $_FILES['imageHotel'];
            if(isset($uploads)){
                foreach ($uploads['error'] as $index => $item) {
                    if($item == 0){
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
                                            dd("Error");
                        }else{
                            $nameFile = $uploads['name'][$index];
                            $tmp_name = $uploads['tmp_name'][$index];

                            $flagUpload= move_uploaded_file($tmp_name,public_path() . '/user/uploads/resting_place/'.$nameFile);
						    $viewFile .=($viewFile == '')? $nameFile: ';'.$nameFile;
                        }
                    }
                }
            }
        }

        $dataHotel = [
            'id_acc' => Session::get('idSession'),
            'name' => $name,
            'type' => $type,
            'place' => $place,
            'address' => $address,
            'email' => $email,
            'phone' => $phone,
            'image' => $viewFile,
            'rate' => $rate,
            'wifi' => $wifi,
            'pool' => $pool,
            'parking' => $parking,
            'smoke' => $smoke,
            'animal' => $animal,
            'age' => $newAge,
            'checkin' => $checkin,
            'checkout' => $checkout,
            'description' => $description,
            'status' =>  $status,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' =>null
        ];

        $create = $rp->createHotel($dataHotel);

        if($create){
            return redirect()->route('owner.myHotel',['id' => Session::get('idSession')]);
        }else{
            return redirect()->route('owner.createHotel');
        }
    }

    public function updateHotel(Request $request, $id, RestingPlace $rp)
    {
        $inforRP = RestingPlace::where('id', $id)->first();
        $inforRP = \json_decode(\json_encode($inforRP),true);

        $type = Type::select('id','name')->get();
        $type = \json_decode(\json_encode($type),true);

        $place = Place::select('id','name')->get();
        $place = \json_decode(\json_encode($place),true);

        $count = count($inforRP);
        $data['type'] = $type;
        $data['place'] = $place;
        $data['inforRP'] = $inforRP;
        $data['count'] = $count;

        return view('owner/update-hotel', $data);
    }

    public function handleUpdateHotel(Request $request, $id, RestingPlace $rp)
    {
        $id = $request->id;
        $name = $request->nameHotel;
        $type = $request->input('typeHotel');
        $place = $request->input('placeHotel');
        $address = $request->addressHotel;
        $email = $request->emailHotel;
        $phone = $request->phoneHotel;
        $rate = $request->rateHotel;
        $wifi = $request->wifiHotel;
        $pool = $request->poolHotel;
        $parking = $request->parkingHotel;
        $smoke = $request->smokeHotel;
        $animal = $request->animalHotel;
        $age = $request->ageHotel;
        $checkin = $request->checkinHotel;
        $checkout = $request->checkoutHotel;
        $description = $request->descHotel;
        $image = $request->imageHotel;

        $oldImage = RestingPlace::where('id', $id)->pluck('image')->first();
        $oldImage = json_decode(json_encode($oldImage), true);

        $viewFile = '';

        if($image != null && count($image) > 0){
            $uploads = $_FILES['imageHotel'];
            if(isset($uploads)){
                foreach ($uploads['error'] as $index => $item) {
                    if($item == 0){
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
                                            dd("Error");
                        }else{
                            $nameFile = $uploads['name'][$index];
                            $tmp_name = $uploads['tmp_name'][$index];

                            $flagUpload= move_uploaded_file($tmp_name,public_path() . '/user/uploads/resting_place/'.$nameFile);
						    $viewFile .=($viewFile == '')? $nameFile: ';'.$nameFile;
                        }
                    }
                }
            }
        }

        if($image == null){
            $viewFile = $oldImage;
        }

        $dataHotel = [
            'id_acc' => Session::get('idSession'),
            'name' => $name,
            'type' => $type,
            'place' => $place,
            'address' => $address,
            'email' => $email,
            'phone' => $phone,
            'image' => $viewFile,
            'rate' => $rate,
            'wifi' => $wifi,
            'pool' => $pool,
            'parking' => $parking,
            'smoke' => $smoke,
            'animal' => $animal,
            'age' => $age,
            'checkin' => $checkin,
            'checkout' => $checkout,
            'description' => $description,
            'status' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' =>null
        ];

        $update = $rp->updateHotel($dataHotel, $id);

        if($update){
            return redirect()->route('owner.myHotel',['id' => Session::get('idSession')]);
        }else{
            return redirect()->route('owner.createHotel');
        }
    }

    public function deleteHotel(Request $request, Restingplace $rp, Rooms $room)
    {
        $id = $request->id;

        if($id > 0){
            $delete = $rp->deleteHotelById($id);
            if($delete){
                $deleteRoom = $room->deleteRoomByIdHotel($id);
                if($deleteRoom){
                    echo "Delete success";
                }else{
                    echo "Delete room fail";
                }
            }else{
                echo "Delete hotel fail";
            }
        } else {
            echo "Hotel not found";
        }
    }

    //Room

    public function roomHotel(Request $request, $id, Rooms $room)
    {
        $id = $request->id;

        $keyword = $request->keyword;
        $keyword = \strip_tags($keyword);
        $data['keyword'] = $keyword;

        $inforRoom = $room->getInforRoomById($id, $keyword);

        $data['paginate'] = $inforRoom;
        $inforRoom = json_decode(json_encode($inforRoom),true);

        $data['inforRoom'] = $inforRoom['data'] ?? [];

        $name = RestingPlace::where('id',$id)->pluck('name')->first();
        $name = \json_decode(\json_encode($name),true);

        $data['count'] = count($data['inforRoom']);
        $data['id'] = $id;
        $data['name'] = $name;

        return view('owner.room-hotel', $data);
    }

    public function createRoom(Request $request, $id)
    {
        $id = $request->id;

        $name = RestingPlace::where('id',$id)->pluck('name')->first();
        $name = \json_decode(\json_encode($name),true);

        $type = TypeBed::select('id','name')->get();
        $type = \json_decode(\json_encode($type),true);

        $data['id'] = $id;
        $data['type'] = $type;
        $data['name'] = $name;

        return view('owner.create-room', $data);
    }

    public function handleCreateRoom(Request $request, RestingPlace $rp, Rooms $room)
    {
        $id = $request->idHotel;
        $name = $request->nameRoom;
        $price = $request->priceRoom;
        $discount = $request->discountRoom;
        $bed = $request->bedRoom;
        $qtyBed = $request->qtyBedHotel;
        $descBed = $request->descBedRoom;
        $adult = $request->adultRoom;
        $child = $request->childRoom;
        $wifi = $request->wifiRoom;
        $phone = $request->phoneRoom;
        $smoke = $request->smokeRoom;
        $televison = $request->tiviRoom;
        $air = $request->airRoom;
        $acreage = $request->acreageRoom;
        $description = $request->descRoom;
        $image = $request->imageRoom;

        $viewFile = '';

        if($image != null && count($image) > 0){
            $uploads = $_FILES['imageRoom'];
            if(isset($uploads)){
                foreach ($uploads['error'] as $index => $item) {
                    if($item == 0){
                        $validatorAvatar = Validator::make(
                            ['imageRoom' => $request->file('imageRoom')],
                            ['imageRoom' => 'required'],
                            [
                                'required' => 'Vui lòng chọn ảnh'
                            ]
                        );

                        if($validatorAvatar->fails()){
                            return redirect()->route('owner.createRoom',['id' => $id])
                                            ->withErrors($validatorAvatar)
                                            ->withInput();
                                            dd("Error");
                        }else{
                            $nameFile = $uploads['name'][$index];
                            $tmp_name = $uploads['tmp_name'][$index];

                            $flagUpload= move_uploaded_file($tmp_name,public_path() . '/user/uploads/room/'.$nameFile);
						    $viewFile .=($viewFile == '')? $nameFile: ';'.$nameFile;
                        }
                    }
                }
            }
        }

        $dataRoom = [
            'id_rp' => $id,
            'name' => $name,
            'image' => $viewFile,
            'price' => $price,
            'discount' => $discount,
            'adult' => $adult,
            'child' => $child,
            'type_bed' => $bed,
            'quantity_bed' => $qtyBed,
            'description_bed' => $descBed,
            'wifi' => $wifi,
            'smoke' => $smoke,
            'phone' => $phone,
            'television' => $televison,
            'air_conditioning' => $air,
            'acreage' => $acreage,
            'description' => $description,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' =>null
        ];

        $create = $room->createRoom($dataRoom);

        if($create){
            return redirect()->route('owner.createRoom',['id' => $id]);
        }else{
            return redirect()->route('owner.createRoom',['id' => $id]);
        }
    }

    public function updateRoom(Request $request, $id)
    {
        $id = $request->id;
        $name = Rooms::where('id',$id)->first();
        $name = \json_decode(\json_encode($name),true);

        $id_rp = Rooms::where('id',$id)->pluck('id_rp')->first();
        $id_rp = \json_decode(\json_encode($id_rp),true);

        $name_rp = RestingPlace::where('id',$id_rp)->pluck('name')->first();
        $name_rp = \json_decode(\json_encode($name_rp),true);

        $type = TypeBed::select('id','name')->get();
        $type = \json_decode(\json_encode($type),true);

        $data['name'] = $name;
        $data['name_rp'] = $name_rp;
        $data['type'] = $type;

        return view('owner.update-room', $data);
    }

    public function handleUpdateRoom(Request $request, $id, RestingPlace $rp, Rooms $room)
    {
        $id = $request->id;
        $name = $request->nameRoom;
        $price = $request->priceRoom;
        $discount = $request->discountRoom;
        $bed = $request->bedRoom;
        $qtyBed = $request->qtyBedHotel;
        $descBed = $request->descBedRoom;
        $adult = $request->adultRoom;
        $child = $request->childRoom;
        $wifi = $request->wifiRoom;
        $phone = $request->phoneRoom;
        $smoke = $request->smokeRoom;
        $televison = $request->tiviRoom;
        $air = $request->airRoom;
        $acreage = $request->acreageRoom;
        $description = $request->descRoom;
        $image = $request->imageRoom;

        $oldImage = Rooms::where('id', $id)->pluck('image')->first();
        $oldImage = json_decode(json_encode($oldImage), true);

        $id_rp = Rooms::where('id',$id)->pluck('id_rp')->first();
        $id_rp = \json_decode(\json_encode($id_rp),true);

        $viewFile = '';

        if($image != null && count($image) > 0){
            $uploads = $_FILES['imageHotel'];
            if(isset($uploads)){
                foreach ($uploads['error'] as $index => $item) {
                    if($item == 0){
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
                                            dd("Error");
                        }else{
                            $nameFile = $uploads['name'][$index];
                            $tmp_name = $uploads['tmp_name'][$index];

                            $flagUpload= move_uploaded_file($tmp_name,public_path() . '/user/uploads/resting_place/'.$nameFile);
						    $viewFile .=($viewFile == '')? $nameFile: ';'.$nameFile;
                        }
                    }
                }
            }
        }

        if($image == null){
            $viewFile = $oldImage;
        }

        $dataRoom = [
            'id_rp' => $id_rp,
            'name' => $name,
            'image' => $viewFile,
            'price' => $price,
            'discount' => $discount,
            'adult' => $adult,
            'child' => $child,
            'type_bed' => $bed,
            'quantity_bed' => $qtyBed,
            'description_bed' => $descBed,
            'wifi' => $wifi,
            'smoke' => $smoke,
            'phone' => $phone,
            'television' => $televison,
            'air_conditioning' => $air,
            'acreage' => $acreage,
            'description' => $description,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' =>null
        ];

        $update = $room->updateRoom($dataRoom, $id);

        if($update){
            return redirect()->route('owner.roomHotel',['id' => $id_rp]);
        }else{
            return redirect()->route('owner.updateRoom',['id' => $id]);
        }
    }

    public function deleteRoom(Request $request, Rooms $room)
    {
        $id = $request->id;

        if($id > 0){
            $delete = $room->deleteRoomById($id);
            if($delete){
                echo "Delete success";
            }else{
                echo "Delete fail";
            }
        } else {
            echo "Hotel not found";
        }
    }

    // Pricing plan
    public function pricingPlan(Request $request, $id)
    {
        $id = $request->id;

        $status = RestingPlace::where('id_acc',$id)->pluck('status')->first();
        $payment = Payment::where('id_owner', Session::get('idSession'))->pluck('status')->first();

        $data['status'] = $status;
        $data['payment'] = $payment;

        // dd($data);
        return view('owner.pricing-plan', $data);
    }

    public function paymentPlan(Request $request)
    {
        $payment = Payment::where('id_owner', Session::get('idSession'))->pluck('status')->first();
        $status = RestingPlace::where('id_acc', Session::get('idSession'))->pluck('status')->first();

        $data['payment'] = $payment;
        $data['status'] = $status;

        return view('owner.payment-plan', $data);
    }

    public function handlePaymentPlan(Request $request, Payment $pm)
    {
        $id = $request->idOwner;
        $name = $request->nameOwner;
        $payment = $request->selectPayment;
        $bank = $request->selectBank;

        $data = [
            'id_owner' => $id,
            'name_owner' => $name,
            'payment' => $payment,
            'bank' => $bank,
            'status' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' =>null
        ];

        $payment = $pm->createPayment($data);

        if($payment){
            return redirect()->route('owner.pricingPlan',['id' => Session::get('idSession')]);
        }else{
            return redirect()->route('owner.paymentPlan');
        }

    }
}
