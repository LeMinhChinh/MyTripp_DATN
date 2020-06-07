<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\FeedbackRP;
use App\Models\RequestOwner;

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

    public function updateRequest(Request $request, RequestOwner $rq)
    {
        $id = $request->id;
        $id = is_numeric($id) ? $id : 0;

        $status = RequestOwner::where('id',$id)->pluck('status')->first();

        if($status == 0){
            $dataUpdate = [
                'status' => 1
            ];
        }

        if($status == 1){
            $dataUpdate = [
                'status' => 0
            ];
        }

        $update = $rq->updateRequest($dataUpdate, $id);
        if($update){
            echo "Update success";
        }else{
            echo "Update fail";
        }
    }

    //feedback
    public function feedback(Request $request)
    {
        return view('admin/feedback');
    }
}
