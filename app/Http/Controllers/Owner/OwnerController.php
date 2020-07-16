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
use App\Models\Booking;
use App\Models\DetailBooking;
use Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\RequestCreateHotel;

class OwnerController extends Controller
{
    //dashboard
    public function dashboard(Request $request, $id, DetailBooking $dt, Booking $book)
    {
        $id = $request->id;
        $id = is_numeric($id) ? $id : 0;
        $hotel = $request->hotel;

        if($hotel === 'all' | $hotel === null){
            $idRP = RestingPlace::where('id_acc', $id)->pluck('id')->toArray();
        }else{
            $idRP = ['1'];
        }
        $rp = RestingPlace::where('id_acc', $id)->get();
        $rp = json_decode(json_encode($rp), true);

        $query = DetailBooking::query();
        if($hotel == 'all' | $hotel === null){
            $query = $query->wherein('id_rp',$idRP);
        }else{
            $query = $query->where('id_rp', $hotel);
        }
        $idBooking = $query->pluck('id_book')->toArray();
        $idBooking = \array_unique($idBooking);

        $query1 = Rooms::query();
        if($hotel == 'all' | $hotel === null){
            $query1 = $query1->wherein('id_rp',$idRP);
        }else{
            $query1 = $query1->where('id_rp', $hotel);
        }
        $idRoom = $query1->pluck('id')->toArray();
        $idRoom = \array_unique($idRoom);

        $priceBook = Booking::wherein('id',$idBooking)->pluck('total')->toArray();

        $total = 0;
        foreach ($priceBook as $value) {
            $total += $value;
        }

        $priceT1 = 0;
        $priceT2 = 0;
        $priceT3 = 0;
        $priceT4 = 0;
        $priceT5 = 0;
        $priceT6 = 0;
        $priceT7 = 0;
        $priceT8 = 0;
        $priceT9 = 0;
        $priceT10 = 0;
        $priceT11 = 0;
        $priceT12 = 0;

        $detailBooking = $dt->getDashboardDetailAll($idRP,$hotel);
        $detailBooking = json_decode(\json_encode($detailBooking),true);
        // dd($detailBooking);
        foreach ($detailBooking as $key => $value) {
            if(strtotime(date($value['checkout'])) >= strtotime(date('2020-01-01')) && strtotime(date($value['checkout'])) <= strtotime(date('2020-01-30'))){
                $priceT1 += $value['price'] - ($value['price']*$value['discount']/100) + (($value['price'] - ($value['price']*$value['discount']/100))*10/100);
            }

            if(strtotime(date($value['checkout'])) >= strtotime(date('2020-02-01')) && strtotime(date($value['checkout'])) <= strtotime(date('2020-02-28'))){
                $priceT2 += $value['price'] - ($value['price']*$value['discount']/100) + (($value['price'] - ($value['price']*$value['discount']/100))*10/100);
            }

            if(strtotime(date($value['checkout'])) >= strtotime(date('2020-03-01')) && strtotime(date($value['checkout'])) <= strtotime(date('2020-03-31'))){
                $priceT3 += $value['price'] - ($value['price']*$value['discount']/100) + (($value['price'] - ($value['price']*$value['discount']/100))*10/100);
            }

            if(strtotime(date($value['checkout'])) >= strtotime(date('2020-04-01')) && strtotime(date($value['checkout'])) <= strtotime(date('2020-04-30'))){
                $priceT4 += $value['price'] - ($value['price']*$value['discount']/100) + (($value['price'] - ($value['price']*$value['discount']/100))*10/100);
            }

            if(strtotime(date($value['checkout'])) >= strtotime(date('2020-05-01')) && strtotime(date($value['checkout'])) <= strtotime(date('2020-05-31'))){
                $priceT5 +=$value['price'] - ($value['price']*$value['discount']/100) + (($value['price'] - ($value['price']*$value['discount']/100))*10/100);
            }

            if(strtotime(date($value['checkout'])) >= strtotime(date('2020-06-01')) && strtotime(date($value['checkout'])) <= strtotime(date('2020-06-30'))){
                $priceT6 += $value['price'] - ($value['price']*$value['discount']/100) + (($value['price'] - ($value['price']*$value['discount']/100))*10/100);
            }

            if(strtotime(date($value['checkout'])) >= strtotime(date('2020-07-01')) && strtotime(date($value['checkout'])) <= strtotime(date('2020-07-31'))){
                $priceT7 += $value['price'] - ($value['price']*$value['discount']/100) + (($value['price'] - ($value['price']*$value['discount']/100))*10/100);
            }

            if(strtotime(date($value['checkout'])) >= strtotime(date('2020-08-01')) && strtotime(date($value['checkout'])) <= strtotime(date('2020-08-31'))){
                $priceT8 += $value['price'] - ($value['price']*$value['discount']/100) + (($value['price'] - ($value['price']*$value['discount']/100))*10/100);
            }

            if(strtotime(date($value['checkout'])) >= strtotime(date('2020-09-01')) && strtotime(date($value['checkout'])) <= strtotime(date('2020-09-30'))){
                $priceT9 += $value['price'] - ($value['price']*$value['discount']/100) + (($value['price'] - ($value['price']*$value['discount']/100))*10/100);
            }

            if(strtotime(date($value['checkout'])) >= strtotime(date('2020-10-01')) && strtotime(date($value['checkout'])) <= strtotime(date('2020-10-31'))){
                $priceT10 += $value['price'] - ($value['price']*$value['discount']/100) + (($value['price'] - ($value['price']*$value['discount']/100))*10/100);
            }

            if(strtotime(date($value['checkout'])) >= strtotime(date('2020-11-01')) && strtotime(date($value['checkout'])) <= strtotime(date('2020-11-30'))){
                $priceT11 += $value['price'] - ($value['price']*$value['discount']/100) + (($value['price'] - ($value['price']*$value['discount']/100))*10/100);
            }

            if(strtotime(date($value['checkout'])) >= strtotime(date('2020-12-01')) && strtotime(date($value['checkout'])) <= strtotime(date('2020-12-31'))){
                $priceT12 += $value['price'] - ($value['price']*$value['discount']/100) + (($value['price'] - ($value['price']*$value['discount']/100))*10/100);
            }
        }


        // foreach ($detailBooking as $key => $value) {
        //     if(strtotime(date($value['checkout'])) >= strtotime(date('2020-01-01')) && strtotime(date($value['checkout'])) <= strtotime(date('2020-01-30'))){
        //         $priceT1 += $value['total'];
        //     }
        // }
        // foreach ($detailBooking as $key => $value) {
        //     if(strtotime(date($value['checkout'])) >= strtotime(date('2020-02-01')) && strtotime(date($value['checkout'])) <= strtotime(date('2020-02-28'))){
        //         $priceT2 += $value['total'];
        //     }
        // }

        // foreach ($detailBooking as $key => $value) {
        //     if(strtotime(date($value['checkout'])) >= strtotime(date('2020-03-01')) && strtotime(date($value['checkout'])) <= strtotime(date('2020-03-31'))){
        //         $priceT3 += $value['total'];
        //     }
        // }

        // foreach ($detailBooking as $key => $value) {
        //     if(strtotime(date($value['checkout'])) >= strtotime(date('2020-04-01')) && strtotime(date($value['checkout'])) <= strtotime(date('2020-04-30'))){
        //         $priceT4 += $value['total'];
        //     }
        // }

        // foreach ($detailBooking as $key => $value) {
        //     if(strtotime(date($value['checkout'])) >= strtotime(date('2020-05-01')) && strtotime(date($value['checkout'])) <= strtotime(date('2020-05-31'))){
        //         $priceT5 += $value['total'];
        //     }
        // }

        // foreach ($detailBooking as $key => $value) {
        //     if(strtotime(date($value['checkout'])) >= strtotime(date('2020-06-01')) && strtotime(date($value['checkout'])) <= strtotime(date('2020-06-30'))){
        //         $priceT6 += $value['total'];
        //     }
        // }

        // foreach ($detailBooking as $key => $value) {
        //     if(strtotime(date($value['checkout'])) >= strtotime(date('2020-07-01')) && strtotime(date($value['checkout'])) <= strtotime(date('2020-07-31'))){
        //         $priceT7 += $value['total'];
        //     }
        // }

        // foreach ($detailBooking as $key => $value) {
        //     if(strtotime(date($value['checkout'])) >= strtotime(date('2020-08-01')) && strtotime(date($value['checkout'])) <= strtotime(date('2020-08-31'))){
        //         $priceT8 += $value['total'];
        //     }
        // }
        // dd($priceT8, $priceT7);

        // foreach ($detailBooking as $key => $value) {
        //     if(strtotime(date($value['checkout'])) >= strtotime(date('2020-09-01')) && strtotime(date($value['checkout'])) <= strtotime(date('2020-09-30'))){
        //         $priceT9 += $value['total'];
        //     }
        // }

        // foreach ($detailBooking as $key => $value) {
        //     if(strtotime(date($value['checkout'])) >= strtotime(date('2020-10-01')) && strtotime(date($value['checkout'])) <= strtotime(date('2020-10-31'))){
        //         $priceT10 += $value['total'];
        //     }
        // }

        // foreach ($detailBooking as $key => $value) {
        //     if(strtotime(date($value['checkout'])) >= strtotime(date('2020-11-01')) && strtotime(date($value['checkout'])) <= strtotime(date('2020-11-30'))){
        //         $priceT11 += $value['total'];
        //     }
        // }

        // foreach ($detailBooking as $key => $value) {
        //     if(strtotime(date($value['checkout'])) >= strtotime(date('2020-12-01')) && strtotime(date($value['checkout'])) <= strtotime(date('2020-12-31'))){
        //         $priceT12 += $value['total'];
        //     }
        // }

        // $totalT1 = $dt->getDashboardDetail($idRP, '2020-01-01','2020-01-30',$hotel);
        // $totalT1 = json_decode(json_encode($totalT1), true);
        // $priceT1 = 0;
        // foreach ($totalT1 as $value) {
        //     $priceT1 += $value['total'];
        // }

        // $totalT2 = $dt->getDashboardDetail($idRP, '2020-02-01','2020-02-28',$hotel);
        // $totalT2 = json_decode(json_encode($totalT2), true);
        // $priceT2 = 0;
        // foreach ($totalT2 as $value) {
        //     $priceT2 += $value['total'];
        // }

        // $totalT3 = $dt->getDashboardDetail($idRP, '2020-03-01','2020-03-31',$hotel);
        // $totalT3 = json_decode(json_encode($totalT3), true);
        // $priceT3 = 0;
        // foreach ($totalT3 as $value) {
        //     $priceT3 += $value['total'];
        // }

        // $totalT4 = $dt->getDashboardDetail($idRP, '2020-04-01','2020-04-30',$hotel);
        // $totalT4 = json_decode(json_encode($totalT4), true);
        // $priceT4 = 0;
        // foreach ($totalT4 as $value) {
        //     $priceT4 += $value['total'];
        // }

        // $totalT5 = $dt->getDashboardDetail($idRP, '2020-05-01','2020-05-31',$hotel);
        // $totalT5 = json_decode(json_encode($totalT5), true);
        // $priceT5 = 0;
        // foreach ($totalT5 as $value) {
        //     $priceT5 += $value['total'];
        // }
        // // strtotime(date('2020-06-01')),strtotime(date('2020-06-30')
        // $totalT6 = $dt->getDashboardDetail($idRP, '2020-06-01','2020-06-30',$hotel);
        // dd($totalT6);
        // $totalT6 = json_decode(json_encode($totalT6), true);
        // $priceT6 = 0;
        // foreach ($totalT6 as $value) {
        //     $priceT6 += $value['total'];
        // }

        // $totalT7 = $dt->getDashboardDetail($idRP, '2020-07-01','2020-07-31',$hotel);
        // $totalT7 = json_decode(json_encode($totalT7), true);
        // $priceT7 = 0;
        // foreach ($totalT7 as $value) {
        //     $priceT7 += $value['total'];
        // }

        // $totalT8 = $dt->getDashboardDetail($idRP, '2020-08-01','2020-08-31',$hotel);
        // $totalT8 = json_decode(json_encode($totalT8), true);
        // $priceT8 = 0;
        // foreach ($totalT8 as $value) {
        //     $priceT8 += $value['total'];
        // }

        // $totalT9 = $dt->getDashboardDetail($idRP, '2020-09-01','2020-09-30',$hotel);
        // $totalT9 = json_decode(json_encode($totalT9), true);
        // $priceT9 = 0;
        // foreach ($totalT9 as $value) {
        //     $priceT9 += $value['total'];
        // }

        // $totalT10 = $dt->getDashboardDetail($idRP, '2020-10-01','2020-10-31',$hotel);
        // $totalT10 = json_decode(json_encode($totalT10), true);
        // $priceT10 = 0;
        // foreach ($totalT10 as $value) {
        //     $priceT10 += $value['total'];
        // }

        // $totalT11 = $dt->getDashboardDetail($idRP, '2020-11-01','2020-11-30',$hotel);
        // $totalT11 = json_decode(json_encode($totalT11), true);
        // $priceT11 = 0;
        // foreach ($totalT11 as $value) {
        //     $priceT11 += $value['total'];
        // }

        // $totalT12 = $dt->getDashboardDetail($idRP, '2020-12-01','2020-12-31',$hotel);
        // $totalT12 = json_decode(json_encode($totalT12), true);
        // $priceT12 = 0;
        // foreach ($totalT12 as $value) {
        //     $priceT12 += $value['total'];
        // }

        $totalMonth = [$priceT1,$priceT2,$priceT3,$priceT4,$priceT5,$priceT6,$priceT7,$priceT8,$priceT9,$priceT10,$priceT11,$priceT12];

        $data['countBook'] = count($idBooking);
        $data['countRP'] = count($idRP);
        $data['total'] = $total;
        $data['countRoom'] = count($idRoom);
        $data['totalMonth'] = $totalMonth;
        $data['rp'] = $rp;
        $data['hotel'] = $hotel;

        // dd($data);

        return view('owner/dashboard', $data);
    }

    public function listBooking(Request $request, DetailBooking $dt)
    {
        $keyword = $request->keyword;
        $keyword = \strip_tags($keyword);
        $hotel = $request->hotel;

        if( $hotel == null){
            $id_rp = Restingplace::where('id_acc',Session::get('idSession'))->pluck('id')->toArray();
        }else{
            $id_rp = intval($hotel);
        }

        $booking = $dt->getListBookingByOwner($id_rp, $keyword);
        $data['paginate'] = $booking;
        $booking = json_decode(json_encode($booking),true);

        $rp = RestingPlace::where('id_acc',Session::get('idSession'))->get();
        $rp = json_decode(json_encode($rp), true);

        $data['booking'] = $booking['data'] ?? [];
        $data['rp'] = $rp;
        $data['keyword'] = $keyword;
        $data['hotel'] = $hotel;

        return view('owner.list-booking', $data);
    }

    //account
    public function information(Request $request, $id, Account $acc)
    {
        $id = $request->id;
        $id = \is_numeric($id) ? $id : 0;

        $inforAcc = $acc->getDataInforAccountById($id);
        $inforAcc = \json_decode(\json_encode($inforAcc), true);

        $data['inforAcc'] = $inforAcc;

        $data['errorAvatar'] = $request->session()->get('errorAvatar');
        $data['updateSuccess'] = $request->session()->get('updateSuccess');
        $data['updateError'] = $request->session()->get('updateError');

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
                            'required' => 'Please choose an image'
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
                            $request->session()->flash('errorAvatar', 'Error uploading image to server');
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
            $request->session()->flash('updateSuccess', 'Update information success');
            return redirect()->route('owner.information',['id' => $id]);
        }else{
            $request->session()->flash('updateError', 'An error occurred. Please try again');
            return redirect()->route('owner.information',['id' => $id]);
        }
    }

    //Resting place
    public function myHotel(Request $request, $id, RestingPlace $rp)
    {
        $keyword = $request->keyword;
        $keyword = \strip_tags($keyword);

        $inforRP = $rp->getInforRPByIdOwner($id, $keyword);

        $data['paginate'] = $inforRP;
        $inforRP = json_decode(json_encode($inforRP),true);

        $data['inforRP'] = $inforRP['data'] ?? [];

        $count = count($data['inforRP']);
        $data['count'] = $count;
        $data['keyword'] = $keyword;

        $data['createSuccess'] = $request->session()->get('createSuccess');
        $data['updateSuccess'] = $request->session()->get('updateSuccess');

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

        $data['createError'] = $request->session()->get('createError');

        return view('owner/create-hotel', $data);
    }

    public function handleCreateHotel(Request $request, RestingPlace $rp)
    {
        $name = $request->name;
        $type = $request->type;
        $place = $request->place;
        $address = $request->address;
        $email = $request->email;
        $phone = $request->phone;
        $rate = $request->rate;
        $wifi = $request->wifi;
        $pool = $request->pool;
        $parking = $request->parking;
        $smoke = $request->smoke;
        $animal = $request->animal;
        $age = $request->age;
        $ageLimit = $request->ageLimit;
        $checkin = $request->checkin;
        $checkout = $request->checkout;
        $description = $request->desc;
        $image = $request->image;

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'type' => 'required|not_in:0',
            'place' => 'required|not_in:0',
            'address' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric|min:10',
            'rate' => 'required|numeric',
            'image' => 'required',
            'wifi' => 'required|not_in:2',
            'pool' => 'required|not_in:2',
            'parking' => 'required|not_in:2',
            'smoke' => 'required|not_in:2',
            'animal' => 'required|not_in:2',
            'age' => 'required|not_in:2',
            'checkin' => 'required',
            'checkout' => 'required',
         ]);

        if ($validator->fails()) {
            return redirect(route('owner.createHotel'))
                        ->withErrors($validator)
                        ->withInput();
        }

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
        }else{
            $status = 1;
        }

        $viewFile = '';

        if($image != null && count($image) > 0){
            $uploads = $_FILES['image'];
            if(isset($uploads)){
                foreach ($uploads['error'] as $index => $item) {
                    if($item == 0){
                        $validatorAvatar = Validator::make(
                            ['imageHotel' => $request->file('image')],
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
            $request->session()->flash('createSuccess', 'Create hotel success');
            return redirect()->route('owner.myHotel',['id' => Session::get('idSession')]);
        }else{
            $request->session()->flash('createError', 'An error occurred. Please try again');
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

        $data['updateError'] = $request->session()->get('updateError');

        return view('owner/update-hotel', $data);
    }

    public function handleUpdateHotel(Request $request, $id, RestingPlace $rp)
    {
        $id = $request->id;
        $name = $request->name;
        $type = $request->type;
        $place = $request->place;
        $address = $request->address;
        $email = $request->email;
        $phone = $request->phone;
        $rate = $request->rate;
        $wifi = $request->wifi;
        $pool = $request->pool;
        $parking = $request->parking;
        $smoke = $request->smoke;
        $animal = $request->animal;
        $age = $request->age;
        $ageLimit = $request->ageLimit;
        $checkin = $request->checkin;
        $checkout = $request->checkout;
        $description = $request->desc;
        $image = $request->image;

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'type' => 'required|not_in:0',
            'place' => 'required|not_in:0',
            'address' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric|min:10',
            'rate' => 'required|numeric',
            'wifi' => 'required|not_in:2',
            'pool' => 'required|not_in:2',
            'parking' => 'required|not_in:2',
            'smoke' => 'required|not_in:2',
            'animal' => 'required|not_in:2',
            'age' => 'required|not_in:2',
            'checkin' => 'required',
            'checkout' => 'required',
         ]);

        if ($validator->fails()) {
            return redirect(route('owner.updateHotel',['id' => $id]))
                        ->withErrors($validator)
                        ->withInput();
        }

        $oldImage = RestingPlace::where('id', $id)->pluck('image')->first();
        $oldImage = json_decode(json_encode($oldImage), true);

        $viewFile = '';

        if($image != null && count($image) > 0){
            $uploads = $_FILES['image'];
            if(isset($uploads)){
                foreach ($uploads['error'] as $index => $item) {
                    if($item == 0){
                        $validatorAvatar = Validator::make(
                            ['imageHotel' => $request->file('image')],
                            ['imageHotel' => 'required'],
                            [
                                'required' => 'Vui lòng chọn ảnh'
                            ]
                        );

                        if($validatorAvatar->fails()){
                            return redirect()->route('owner.updateHotel',['id' => $id])
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
            $request->session()->flash('updateSuccess', 'Update hotel success');
            return redirect()->route('owner.myHotel',['id' => Session::get('idSession')]);
        }else{
            $request->session()->flash('updateSuccess', 'An error occurred. Please try again');
            return redirect()->route('owner.createHotel');
        }
    }

    public function publishHotel(Request $request, RestingPlace $rp)
    {
        $id = $request->id;
        $id = is_numeric($id) ? $id : 0;
        $id = intval($id);

        $publish = RestingPlace::where('id',$id)->pluck('publish')->first();

        if($id > 0){
            $updateHotel = $rp->updateHotelByAdmin($id, $publish);
            if($updateHotel){
                echo "Update success";
            }else{
                echo "Update fail";
            }
        }
    }

    public function deleteHotel(Request $request, Restingplace $rp, Rooms $room)
    {
        $id = $request->id;

        if($id > 0){
            $idRoom = Rooms::where('id_rp',$id)->get();
            $idRoom = json_decode(json_encode($idRoom),true);
            if(count($idRoom) > 0){
                $deleteRoom = $room->deleteRoomByIdHotel($id);
                if($deleteRoom){
                    $delete = $rp->deleteHotelById($id);
                    if($delete){
                        echo "Delete success";
                    }else{
                        echo "Delete hotel fail";
                    }
                }else{
                    echo "Delete room fail";
                }
            }else{
                $delete = $rp->deleteHotelById($id);
                if($delete){
                    echo "Delete success";
                }else{
                    echo "Delete hotel fail";
                }
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
        $data['keyword'] = $keyword;

        $data['updateSuccess'] = $request->session()->get('updateSuccess');

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

        $data['createError'] = $request->session()->get('createError');
        $data['createSuccess'] = $request->session()->get('createError');

        return view('owner.create-room', $data);
    }

    public function handleCreateRoom(Request $request, RestingPlace $rp, Rooms $room)
    {
        $id = $request->id;
        $name = $request->name;
        $price = $request->price;
        $discount = $request->discount;
        $bed = $request->bed;
        $qtyBed = $request->quantity;
        $descBed = $request->desc;
        $adult = $request->adult;
        $child = $request->child;
        $wifi = $request->wifi;
        $phone = $request->phone;
        $smoke = $request->smoke;
        $televison = $request->television;
        $air = $request->aircondition;
        $acreage = $request->acreage;
        $description = $request->description;
        $image = $request->image;

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required|numeric',
            'discount' => 'required|numeric',
            'bed' => 'required|not_in:0',
            'quantity' => 'required|numeric',
            'adult' => 'required|numeric',
            'child' => 'required|numeric',
            'image' => 'required',
            'wifi' => 'required|not_in:2',
            'phone' => 'required|not_in:2',
            'smoke' => 'required|not_in:2',
            'television' => 'required|not_in:2',
            'aircondition' => 'required|not_in:2',
            'acreage' => 'required|numeric',
         ]);

        if ($validator->fails()) {
            return redirect(route('owner.createRoom',['id' => $id]))
                        ->withErrors($validator)
                        ->withInput();
        }

        $viewFile = '';

        if($image != null && count($image) > 0){
            $uploads = $_FILES['image'];
            if(isset($uploads)){
                foreach ($uploads['error'] as $index => $item) {
                    if($item == 0){
                        $validatorAvatar = Validator::make(
                            ['imageRoom' => $request->file('image')],
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
            $request->session()->flash('createSuccess', 'Create room success');
            return redirect()->route('owner.createRoom',['id' => $id]);
        }else{
            $request->session()->flash('createError', 'An error occurred. Please try again');
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

        $data['updateError'] = $request->session()->get('updateError');

        return view('owner.update-room', $data);
    }

    public function handleUpdateRoom(Request $request, $id, RestingPlace $rp, Rooms $room)
    {
        $id = $request->id;
        $name = $request->name;
        $price = $request->price;
        $discount = $request->discount;
        $bed = $request->bed;
        $qtyBed = $request->quantity;
        $descBed = $request->desc;
        $adult = $request->adult;
        $child = $request->child;
        $wifi = $request->wifi;
        $phone = $request->phone;
        $smoke = $request->smoke;
        $televison = $request->television;
        $air = $request->aircondition;
        $acreage = $request->acreage;
        $description = $request->description;
        $image = $request->image;

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required|numeric',
            'discount' => 'required|numeric',
            'bed' => 'required|not_in:0',
            'quantity' => 'required|numeric',
            'adult' => 'required|numeric',
            'child' => 'required|numeric',
            'wifi' => 'required|not_in:2',
            'phone' => 'required|not_in:2',
            'smoke' => 'required|not_in:2',
            'television' => 'required|not_in:2',
            'aircondition' => 'required|not_in:2',
            'acreage' => 'required|numeric',
         ]);

        if ($validator->fails()) {
            return redirect(route('owner.updateRoom',['id' => $id]))
                        ->withErrors($validator)
                        ->withInput();
        }

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
            $request->session()->flash('updateSuccess', 'Update room success');
            return redirect()->route('owner.roomHotel',['id' => $id_rp]);
        }else{
            $request->session()->flash('updateError', 'An error occurred. Please try again');
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

        $data['paidSuccess'] = $request->session()->get('paidSuccess');

        return view('owner.pricing-plan', $data);
    }

    public function paymentPlan(Request $request)
    {
        $payment = Payment::where('id_owner', Session::get('idSession'))->pluck('status')->first();
        $status = RestingPlace::where('id_acc', Session::get('idSession'))->pluck('status')->first();

        $data['payment'] = $payment;
        $data['status'] = $status;

        $data['paidError'] = $request->session()->get('paidError');

        return view('owner.payment-plan', $data);
    }

    public function handlePaymentPlan(Request $request, Payment $pm)
    {
        $id = $request->idOwner;
        $name = $request->name;
        $payment = $request->payment;
        $bank = $request->bank;

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'payment' => 'required',
            'bank' => 'required',
         ]);

        if ($validator->fails()) {
            return redirect(route('owner.paymentPlan'))
                        ->withErrors($validator)
                        ->withInput();
        }

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
            $request->session()->flash('paidSuccess', 'Paid success');
            return redirect()->route('owner.pricingPlan',['id' => Session::get('idSession')]);
        }else{
            $request->session()->flash('paidError', 'An error occurred. Please try again');
            return redirect()->route('owner.paymentPlan');
        }

    }

    public function requestBooking(Request $request, $id, Booking $book)
    {
        $keyword = $request->keyword;
        $keyword = \strip_tags($keyword);
        $status = $request->status;

        $rp = RestingPlace::where('id_acc',$id)->pluck('id')->toArray();

        $inforId = $book->getDataId($rp);
        $inforId = json_decode(json_encode($inforId),true);

        $arr_id = [];
        foreach ($inforId as $key => $value) {
            array_push($arr_id, $value['id']);
        }
        $arr_id = \array_unique($arr_id);

        $inforRequest = $book->getDataRequest($arr_id, $keyword, $status);
        $data['paginate'] = $inforRequest;
        $inforRequest = json_decode(json_encode($inforRequest),true);

        $data['inforRequest'] = $inforRequest['data'] ?? [];

        $bookingDetail = DetailBooking::wherein('id_rp', $rp)->get();
        $bookingDetail = \json_decode(json_encode($bookingDetail), true);

        $data['bookingDetail'] = $bookingDetail;

        $data['keyword'] = $keyword;
        $data['status'] = $status;

        return view('owner.request-booking', $data);
    }

    public function approvalBooking(Request $request, Booking $book)
    {
        $id = $request->id;

        $status = Booking::where('id',$id)->pluck('status')->first();

        $updateBooking = $book->updateBooking($id, $status);

        if($updateBooking){
            echo "Approval success";
        }else{
            echo "Approval fail";
        }
    }
}
