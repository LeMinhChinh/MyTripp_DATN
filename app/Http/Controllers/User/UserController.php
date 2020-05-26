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
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    // Homepage

    public function homepage(RestingPlace $rp){
        $inforFB = $rp->getMaxCountEmotion();
        $inforFB = \json_decode(\json_encode($inforFB),true);

        $inforRP = $rp->getInforListRP();
        $inforRP = \json_decode(\json_encode($inforRP),true);

        $images = [];

        foreach ($inforRP as $key => $value) {
            if(!empty($value['image'])){
                $image = \explode(";", $value['image']);
                array_push($images,$image);
            }
        }

        $data['inforRP'] = $inforRP;
        $data['inforFB'] = $inforFB;
        $data['images'] = $images;

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
        $gender = $request->psGender;
        $phone = $request->psPhone;
        $age = $request->psAge;
        $address = $request->psAddress;

        $oldAvatar = Account::where('id',$id)->select('avatar')->first();
        $oldAvatar = json_decode(json_encode($oldAvatar), true);
        // dd($oldAvatar);

        // $oldAvatar = $infoAcc['avatar'];
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

        $dataUpdate = [
            'username' => $username,
            'email' => $email,
            'surname' => $surname,
            'name' => $name,
            'phone' => $phone,
            'gender' => 1,
            'age' => $age,
            'address' => $address,
            'avatar' => $oldAvatar,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $update = $acc->updateInforPerson($dataUpdate, $id);

        if($update){
            // $request->session()->flash('updateInfoSuccess', 'Cập nhật thông tin cá nhân thành công');
            return redirect()->route('user.personalInformation',['id' => $id]);
        }else{
            // $request->session()->flash('updateInfoError', 'Cập nhật thông tin thất bại.Vui lòng kiểm tra lại');
            return redirect()->route('admin.personalInformation',['id' => $id]);
        }
    }

    public function personalRequest(Request $request)
    {
        return view('user/personal-request');
    }
}
