<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Account;
use App\Models\RestingPlace;
use App\Models\Type;
use App\Models\Place;
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

    public function restingplace(Request $request){
        return view('user/restingplace');
    }

    public function searchrestingplace(Request $request){
        return view('user/search-restingplace');
    }

    public function listRestingPlace(Request $request, $id, RestingPlace $rp)
    {
        $id = $request->id;
        $id = is_numeric($id) ? $id : 0;

        $inforRP = $rp->getInforRPById($id);
        $inforRP = \json_decode(\json_encode($inforRP),true);

        $place = Place::select('name')->where('id',$id)->first();

        // dd($inforRP);
        if($inforRP){
            $data['inforRP'] = $inforRP;
            $data['place'] = $place;
            return view('user.list-restingplace',$data);
        }
    }

    // Personal

    public function personal(Request $request){
        return view('user/personal');
    }
}
