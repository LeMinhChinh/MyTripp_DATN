<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\FeedbackRP;
use App\Models\RequestOwner;
use App\Models\FeedbackUser;

class AdminController extends Controller
{
    //dashboard
    public function dashboard(Request $request)
    {
        return view('admin/dashboard');
    }

    //account
    public function account(Request $request, Account $acc)
    {
        $keyword = $request->keyword;
        $keyword = \strip_tags($keyword);
        $data['keyword'] = $keyword;
        $role = $request->role;

        $dataAcc = $acc->getDataAccount($keyword, $role);

        $data['paginate'] = $dataAcc;
        $dataAcc = json_decode(json_encode($dataAcc),true);

        $data['dataAcc'] = $dataAcc['data'] ?? [];

        return view('admin/account', $data);
    }

    public function deleteAccount(Request $request, Account $account, FeedbackRP $feedback)
    {
        $id = $request->id;
        // $id = is_numeric($id) ? $id : 0;

        if($id > 0){
            $deleteAccount = $account->deleteAccountById($id);
            if($deleteAccount){
                $acc_fb = $feedback->getDataFBById($id);
                $acc_fb = \json_decode(\json_encode($acc_fb),true);
                $count = count($acc_fb);
                if($count){
                    $deleteFeedback = $feedback->deleteFeedbackById($id);
                    if($deleteFeedback){
                        echo "Delete success";
                    }else{
                        echo "Delete feedback error";
                    }
                }else{
                    echo "Delete success";
                }
            }else{
                echo "Delete user error";
            }
        } else {
            echo "User not found";
        }
    }

    //request
    public function request(Request $request, RequestOwner $rq)
    {
        $keyword = $request->keyword;
        $keyword = \strip_tags($keyword);
        $data['keyword'] = $keyword;
        $status = $request->status;

        $dataRequest = $rq->getDataRequest($keyword, $status);

        $data['paginate'] = $dataRequest;
        $dataRequest = json_decode(json_encode($dataRequest),true);

        $data['dataRequest'] = $dataRequest['data'] ?? [];

        return view('admin/request', $data);
    }

    public function deleteRequest(Request $request, RequestOwner $rq)
    {
        $id = $request->id;

        if($id > 0){
            $delete = $rq->deleteRequestById($id);
            if($delete){
                echo "Delete success";
            }else{
                echo "Delete fail";
            }
        } else {
            echo "Request not found";
        }
    }

    public function updateRequest(Request $request, RequestOwner $rq, Account $account)
    {
        $id = $request->id;
        $id = is_numeric($id) ? $id : 0;
        $id = intval($id);

        $status = RequestOwner::where('id',$id)->pluck('status')->first();
        $idAcc = RequestOwner::where('id', $id)->pluck('id_acc')->first();

        // dd(\gettype($id),$id, $status, $idAcc);

        if($id > 0){
            $updateRequest = $rq->updateRequest($id, $status);
            if($updateRequest){
                if($status == 0){
                    $dataAccount = [
                        'role' => 1
                    ];

                    $updateAccount = $account->updateAccount($dataAccount, $idAcc);
                    if($updateAccount){
                        echo "Update success";
                    }else{
                        echo "Update account fail";
                    }
                }
                if($status == 1){
                    $dataAccount = [
                        'role' => 0
                    ];

                    $updateAccount = $account->updateAccount($dataAccount, $idAcc);
                    dd($updateAccount);
                    if($updateAccount){
                        echo "Update success";
                    }else{
                        echo "Update account fail";
                    }
                }
            }else{
                echo "Update request fail";
            }
        }
    }

    //feedback
    public function feedback(Request $request, FeedbackUser $fb)
    {
        $keyword = $request->keyword;
        $keyword = \strip_tags($keyword);
        $data['keyword'] = $keyword;

        $feedback = $fb->getDataFeedback($keyword);
        $data['paginate'] = $feedback;
        $feedback = json_decode(json_encode($feedback),true);

        $data['feedback'] = $feedback['data'] ?? [];
// dd($data);
        return view('admin/feedback', $data);
    }
}
