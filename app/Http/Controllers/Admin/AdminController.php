<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\FeedbackRP;
use App\Models\RequestOwner;
use App\Models\FeedbackUser;
use App\Models\Payment;
use App\Models\RestingPlace;

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

        return view('admin/feedback', $data);
    }

    public function deleteFeedback(Request $request, FeedbackUser $fb)
    {
        $id = $request->id;

        if($id > 0){
            $delete = $fb->deleteFeedbackById($id);
            if($delete){
                echo "Delete success";
            }else{
                echo "Delete fail";
            }
        } else {
            echo "Feedback not found";
        }
    }

    public function replyFeedback(Request $request, FeedbackUser $fb)
    {
        $id = $request->id;
        $content = $request->content;

        if($id > 0){
            $updateFeedback = $fb->updateFeedback($id, $content);
            if($updateFeedback){
                echo "Reply success";
            }else{
                echo "Reply fail";
            }
        }
    }

    // Pricing
    public function pricing(Request $request, Payment $pm)
    {
        $keyword = $request->keyword;
        $keyword = \strip_tags($keyword);
        $data['keyword'] = $keyword;

        $payment = $pm->getDataPayment($keyword);

        $data['paginate'] = $payment;
        $payment = json_decode(json_encode($payment),true);

        $data['payment'] = $payment['data'] ?? [];

        return view('admin.payment', $data);
    }

    public function deletePayment(Request $request, Payment $pm)
    {
        $id = $request->id;

        if($id > 0){
            $delete = $pm->deletePaymentById($id);
            if($delete){
                echo "Delete success";
            }else{
                echo "Delete fail";
            }
        } else {
            echo "Payment not found";
        }
    }

    public function updatePayment(Request $request, Payment $pm, RestingPlace $rp)
    {
        $id = $request->id;
        $id = is_numeric($id) ? $id : 0;
        $id = intval($id);

        $status = Payment::where('id',$id)->pluck('status')->first();
        $id_owner = Payment::where('id',$id)->pluck('id_owner')->first();

        $updatePayment = $pm->updatePayment($id, $status);
        if($updatePayment){
            if($status == 0){
                $dataRP = [
                    'status' => 2
                ];

                $updateRP = $rp->updateHotelByPayment($dataRP, $id_owner);
                if($updateRP){
                    echo "Update success";
                }else{
                    echo "Update hotel fail";
                }
            }
            if($status == 1){
                $dataRP = [
                    'status' => 1
                ];

                $updateRP = $rp->updateHotelByPayment($dataRP, $id_owner);
                if($updateRP){
                    echo "Update success";
                }else{
                    echo "Update hotel fail";
                }
            }
        }else{
            echo "Update payment fail";
        }

    }

}
