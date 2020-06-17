<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Account;
use App\Models\RestingPlace;
use App\Models\Type;
use App\Models\Place;
use App\Models\FeedbackRP;
use App\Models\Rooms;
use App\Models\RequestOwner;
use App\Models\FeedbackUser;
use App\Models\DetailBooking;
use App\Models\TypeBed;
use Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    // Homepage

    public function __construct(Request $request)
    {
        $keyword = $request->inforListRP;
        $keyword = trim($keyword);

        $data['keyword'] = $keyword;

        view::share($data);
    }

    public function homepage(Request $request, RestingPlace $rp, Rooms $room){
        $inforFB = $rp->getMaxCountEmotion();
        $inforFB = \json_decode(\json_encode($inforFB),true);

        $arr_id = \array_column($inforFB,'id');

        $inforRP = $rp->getInforListRP($arr_id);
        $inforRP = \json_decode(\json_encode($inforRP),true);

        $images = [];

        foreach ($inforRP as $key => $value) {
            if(!empty($value['image'])){
                $image = \explode(";", $value['image']);
                array_push($images,$image);
            }
        }

        $inforRoom = $room->getRoomByDiscount();
        $inforRoom = \json_decode(\json_encode($inforRoom),true);

        $imageRoom = [];

        foreach ($inforRoom as $k => $v) {
            if(!empty($v['image'])){
                $img = \explode(";", $v['image']);
                array_push($imageRoom,$img);
            }
        }

        // dd($imageRoom, $images);
        // $inforRoom = Rooms::select('price','discount','id_rp')->whereIn('id_rp',$arr_id)->get();
        // $inforRoom = \json_decode(\json_encode($inforRoom), true);

        // $sumPrice = 0;
        // $arrPrice = [];

        // foreach ($inforRP as $key => $value) {
        //     $index = 0;
        //     foreach ($inforRoom as $k => $v) {
        //         if($value['id'] == $v['id_rp'])
        //             $sumPrice += ($v['price'] - ($v['price']*$v['discount']/100)) ;
        //             $index ++;
        //     }
        //     $arrPrice[]= [
        //         $value['id'],
        //         ($sumPrice/$index)*4
        //     ];
        // }

        $data['inforFB'] = $inforFB;

        $data['inforRP'] = $inforRP;
        $data['images'] = $images;

        $data['inforRoom'] = $inforRoom;
        $data['imageRoom'] = $imageRoom;

        return view('user/home',$data);
    }

    // Login

    public function login(Request $request)
    {
        return view('user/login');
    }

    public function handleLogin(Request $request, Account $account)
    {
        $email = $request->lgEmail;
        $password = $request->lgPass;

        $inforAccount = $account->checkAccountLogin($email, $password);

        if($inforAccount){
            $request->session()->put('idSession', $inforAccount['id']);
            $request->session()->put('usernameSession', $inforAccount['username']);
            $request->session()->put('emailSession', $inforAccount['email']);
            $request->session()->put('roleSession', $inforAccount['role']);
            $request->session()->put('fnameSession', $inforAccount['surname']);
            $request->session()->put('lnameSession', $inforAccount['name']);
            $request->session()->put('genderSession', $inforAccount['gender']);
            $request->session()->put('avatarSession', $inforAccount['avatar']);

            if(Session::get('roleSession') === 0){
                return redirect()->route('homepage');
            }

            if(Session::get('roleSession') === 1){
                return redirect()->route('owner.dashboard');
            }

            if(Session::get('roleSession') === 2){
                return redirect()->route('admin.dashboard');
            }


        }else{
            return redirect()->route('login');
        }
    }

    public function reviewHandleLogin(Request $request, Account $account)
    {
        $email = $request->lgEmail;
        $password = $request->lgPass;

        $inforAccount = $account->checkAccountLogin($email, $password);

        if($inforAccount){
            $request->session()->put('idSession', $inforAccount['id']);
            $request->session()->put('usernameSession', $inforAccount['username']);
            $request->session()->put('emailSession', $inforAccount['email']);
            $request->session()->put('roleSession', $inforAccount['role']);
            $request->session()->put('fnameSession', $inforAccount['surname']);
            $request->session()->put('lnameSession', $inforAccount['name']);
            $request->session()->put('genderSession', $inforAccount['gender']);
            $request->session()->put('avatarSession', $inforAccount['avatar']);

            return redirect()->back();

        }else{
            return redirect()->route('login');
        }
    }

    // Register

    public function register(Request $request)
    {
        return view('user/register');
    }

    public function handleRegister(Request $request,Account $account)
    {
        $email = $request->rgtEmail;
        $password = $request->rgtPass;
        $firstname = $request->rgtFname;
        $lastname = $request->rgtLname;

        $dataRgtAccount = [
            'email' => $email,
            'password' => md5($password),
            'username' => null,
            'name' => $lastname,
            'surname' => $firstname,
            'address' => null,
            'age' => null,
            'phone' => null,
            'gender' => null,
            'avatar' => null,
            'role' => 0,
            'status' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' =>null
        ];

        $request->session()->put('emailRgtSession', $email);
        $request->session()->put('passwordRgtSession', $password);

        $rgtAccount = $account->registerAccount($dataRgtAccount);

        if($rgtAccount){
            return redirect()->route('login');
        }else{
            return redirect()->route('register');
        }
    }

    //Logout

    public function handleLogout(Request $request)
    {
        $request->session()->forget('idSession');
        $request->session()->forget('userSession');
        $request->session()->forget('emailSession');
        $request->session()->forget('roleSession');
        $request->session()->forget('fnameSession');
        $request->session()->forget('lnameSession');
        $request->session()->forget('genderSession');
        $request->session()->forget('avatarSession');
        $request->session()->forget('emailRgtSession');
        $request->session()->forget('passwordRgtSession');

        return redirect()->route('login');
    }

    // Room

    public function room(Request $request, $id, Rooms $room, RestingPlace $rp){
        $id = $request->id;
        $id = \is_numeric($id) ? $id : 0;

        $inforRoom = $room->getInforRoomByIdRP($id);
        $inforRoom = \json_decode(json_encode($inforRoom),true);

        $images = [];

        foreach ($inforRoom as $key => $value) {
            if(!empty($value['image'])){
                $image = \explode(";", $value['image']);
                array_push($images,$image);
            }
        }

        $inforRP = $rp->getDataRPByRoom($id);
        $inforRP = \json_decode(json_encode($inforRP),true);

        $data['inforRoom']  = $inforRoom;
        $data['images']  = $images;
        $data['inforRP'] = $inforRP;
        // dd($data);

        return view('user/room', $data);
    }

    // public function searchroom(Request $request){
    //     return view('user/search-room');
    // }


    // Resting place

    public function restingplace(Request $request, $id, RestingPlace $rp, FeedbackRP $fb)
    {
        $id = $request->id;
        $id = \is_numeric($id) ? $id : 0;

        $inforRP = $rp->getInforRPById($id);
        $inforRP = \json_decode(json_encode($inforRP),true);
        $image = \explode(";", $inforRP['image']);

        $feedback = $fb->getDataFeedback($id);
        $feedback = \json_decode(json_encode($feedback),true);
        $count = count($feedback);

        if($inforRP){
            $data['inforRP'] = $inforRP;
            $data['image'] = $image;
            $data['feedback'] = $feedback;
            $data['count'] = $count;
            return view('user/restingplace', $data);
        }
    }

    public function searchrestingplace(Request $request){
        return view('user/search-restingplace');
    }

    public function listRestingPlace(Request $request, $idp, $idt, RestingPlace $rp,FeedbackRP $fb)
    {
        $idp = $request->idp;
        $idt = $request->idt;

        $inforListRP = $rp->getInforListRPByIdPlace($idp, $idt);
        $data['paginate'] = $inforListRP;
        $inforListRP = \json_decode(\json_encode($inforListRP),true);
        $inforListRP = $inforListRP['data'] ?? [];
        $images = [];

        foreach ($inforListRP as $key => $value) {
            if(!empty($value['image'])){
                $image = \explode(";", $value['image']);
                array_push($images,$image);
            }
        }

        $count = $rp->countFBListRP($idp, $idt);
        $count = \json_decode(\json_encode($count),true);

        $place = Place::where('id',$idp)->first();
        $type = Type::where('id', $idt)->first();

        if($inforListRP){
            $data['inforListRP'] = $inforListRP;
            $data['place'] = $place;
            $data['type'] = $type;
            $data['images'] = $images;
            $data['count'] = $count;
            return view('user.list-restingplace',$data);
        }
    }

    public function reviewRestingPlace(Request $request, $idrp, $idacc, FeedbackRP $fb)
    {
        $idrp = $request->idrp;
        $idacc = $request->idacc;
        $content = $request->rvEmotionContent;
        $emotion = $request->rvEmotionicon;

        $dataReview = [
            'id_acc' => $idacc,
            'id_rp' => $idrp,
            'content' => $content,
            'emotion' => $emotion,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' =>null
        ];

        $review = $fb->addReviewToRestingPlace($dataReview);

        if($review){
            return redirect()->back();
        }
    }

    // Personal

    public function personalInformation(Request $request, $id, Account $acc){
        $id = $request->id;
        $id = \is_numeric($id) ? $id : 0;

        $inforAcc = $acc->getDataInforAccountById($id);
        $inforAcc = \json_decode(\json_encode($inforAcc), true);

        $data['inforAcc'] = $inforAcc;

        return view('user/personal-information', $data);
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
                        return redirect()->route('user.personalInformation',['id' => $id])
                                        ->withErrors($validatorAvatar)
                                        ->withInput();
                    }else{
                        $oldAvatar = $_FILES['psAvatar']['name'];
                        $tmpName  = $_FILES['psAvatar']['tmp_name'];
                        $up = move_uploaded_file($tmpName, public_path() . '/user/uploads/avatar/' . $oldAvatar);
                        if(!$up){
                            $request->session()->flash('errorAvatar', 'Lỗi upload ảnh lên server');
                            return redirect()->route('user.personalInformation',['id' => $id]);
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
            return redirect()->route('user.personalInformation',['id' => $id]);
        }else{
            return redirect()->route('user.personalInformation',['id' => $id]);
        }
    }

    public function personalRequest(Request $request, Account $acc, $id)
    {
        $id = $request->id;
        $id = \is_numeric($id) ? $id : 0;

        $inforAcc = $acc->getDataInforAccountById($id);
        $inforAcc = \json_decode(\json_encode($inforAcc), true);

        $countRequest = RequestOwner::where('id_acc',$id)->get();
        $countRequest = \json_decode(\json_encode($countRequest), true);
        $count = count($countRequest);

        $data['inforAcc'] = $inforAcc;
        $data['count'] = $count;

        return view('user/personal-request', $data);
    }

    public function handleRequest(Request $request, RequestOwner $rq)
    {
        // dd($request->all());
        $idOwner = $request->idOwner;
        $nameOwner = $request->nameOwner;
        $emaiOwner = $request->emailOwner;
        $phoneOwner = $request->phoneOwner;
        $nameRP = $request->nameRP;
        $rateRP = $request->rateRP;
        $addressRP = $request->addressRP;
        $descRP = $request->descriptionRP;

        $dataRequest = [
            'id_acc' => $idOwner,
            'name_acc' => $nameOwner,
            'email' => $emaiOwner,
            'phone' => $phoneOwner,
            'name_rp' => $nameRP,
            'rate' => $rateRP,
            'address' => $addressRP,
            'description' => $descRP,
            'status' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' =>null
        ];

        $requestOwner = $rq->requestOwner($dataRequest);

        if($requestOwner){
            return redirect()->route('user.personalRequest', ['id' => $idOwner]);
        }else{
            return redirect()->route('user.personalRequest', ['id' => $idOwner]);
        }
    }

    public function sendFeedBack(Request $request, FeedbackUser $fb)
    {
        $id = $request->id;
        $name = $request->name;
        $content = $request->content;

        $dataFeedback = [
            'id_acc' => $id,
            'name' => $name,
            'content' => $content,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' =>null
        ];

        $feedback = $fb->feedbackUser($dataFeedback);

        if($feedback){
            echo "Feedback success";
        }else{
            echo "Feedback fail";
        }
    }

    public function personalNotify(Request $request, FeedbackUser $fb, $id)
    {
        $id = $request->id;
        $id = \is_numeric($id) ? $id : 0;

        $account = Account::where('id',$id)->select('name','surname')->first();
        $account = \json_decode(json_encode($account),true);

        $feedback = FeedbackUser::where('id_acc',$id)->get();
        $feedback = \json_decode(json_encode($feedback),true);
        $count = count($feedback);

        $data['count'] = $count;
        $data['feedback'] = $feedback;
        $data['account'] = $account;

        return view('user/personal-notify', $data);
    }

    // Filter
    // public function filterRPByType(Request $request, RestingPlace $rp)
    // {
    //     $rate = $request->rate;
    //     $fb = $request->fb;

    //     $inforListRP = $rp->filterRPByType(0,1,$rate,$fb);
    //     dd($inforListRP);
    //     $data['paginate'] = $inforListRP;
    //     $inforListRP = \json_decode(\json_encode($inforListRP),true);
    //     $inforListRP = $inforListRP['data'] ?? [];
    //     $images = [];
    //     dd( $inforListRP['data']);

    //     foreach ($inforListRP as $key => $value) {
    //         if(!empty($value['image'])){
    //             $image = \explode(";", $value['image']);
    //             array_push($images,$image);
    //         }
    //     }

    //     $count = $rp->countFBListRP(0,1,$rate,$fb);
    //     $count = \json_decode(\json_encode($count),true);

    //     $place = Place::where('id', 1)->first();
    //     $type = Type::where('id', 0)->first();
    //     dd( $place, $type);

    //     $data['inforListRP'] = $inforListRP;
    //     $data['place'] = $place;
    //     // $data['type'] = $type;
    //     $data['images'] = $images;
    //     $data['count'] = $count;



    //     return view('user.partials.filter_room', $data);
    // }

    public function searchRoom(Request $request, DetailBooking $dt, Rooms $r)
    {
        $checkin = $request->checkin;
        $checkout = $request->checkout;
        $adult = $request->adult;
        $child = $request->child;

        $query = DetailBooking::query();
        if($checkin){
            $query = $query->where('checkout','<=', $checkin);
        }
        if($checkout){
            $query = $query->orwhere('checkin','>=',$checkout);
        }
        $room = $query->get()->pluck('id');

        $roomNotBook = DB::table('detail_booking')->whereNotIn('id', $room)->get()->pluck('id');

        $dataRoomBooking = $r->getDataRoomBooking($roomNotBook, $child, $adult);

        $data['paginate'] = $dataRoomBooking;
        $dataRoomBooking = json_decode(json_encode($dataRoomBooking),true);

        $data['dataRoomBooking'] = $dataRoomBooking['data'] ?? [];

        $images = [];

        foreach ($data['dataRoomBooking'] as $key => $value) {
            if(!empty($value['image'])){
                $image = \explode(";", $value['image']);
                array_push($images,$image);
            }
        }

        $type = TypeBed::get();
        $type = json_decode(json_encode($type), true);

        $place = Place::get();
        $place = json_decode(json_encode($place), true);

        $data['images']  = $images;
        $data['checkin']  = $checkin;
        $data['checkout']  = $checkout;
        $data['adult']  = $adult;
        $data['child']  = $child;
        $data['type']  = $type;
        $data['place']  = $place;

        return view('user.search-room', $data);
    }
}
