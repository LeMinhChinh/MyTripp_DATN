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
use Log;

class UserController extends Controller
{
    // Homepage

    public function homepage(){
        return view('user/home');
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
            // dd(Session::get('avatarSession'));

            if(Session::get('roleSession') == 1){
                return view("Owner");
            }

            if(Session::get('roleSession') == 2){
                return view("Admin");
            }

            if(Session::get('roleSession') == 0){
                return redirect()->route('homepage');
            }
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
        return redirect()->route('login');
    }

    // Room

    public function room(Request $request){
        return view('user/room');
    }

    public function searchroom(Request $request){
        return view('user/search-room');
    }


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

        if($inforRP){
            $data['inforRP'] = $inforRP;
            $data['image'] = $image;
            $data['feedback'] = $feedback;
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
        $ids = [];
        
        foreach ($inforListRP as $key => $value) {
            if(!empty($value['image'])){
                $image = \explode(";", $value['image']);
                array_push($images,$image);
            }
            array_push($ids,$value['id']);
        }
        // dd($ids);
        $fb = FeedbackRP::get();
        $fb = \json_decode(\json_encode($fb),true);

        // dd($ids, $fb);
        $percent = [];
        $percent_emotion = [];
        foreach ($ids as $key => $value) {
            foreach ($fb as $k => $v) {
                if($value == $v['id_rp']){
                    array_push($percent, $v['emotion']);
                }
            }
            dd($percent); 
            array_push($percent_emotion, $percent);
        }
        // dd($percent);
        // dd($percent_emotion);

        $count = $rp->countFBListRP($idp, $idt);
        $count = \json_decode(\json_encode($count),true);
        // dd($count);  

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

    // Personal

    public function personalInformation(Request $request){
        return view('user/personal-information');
    }
}
