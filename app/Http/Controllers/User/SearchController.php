<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\User\UserController;
use App\Models\RestingPlace;

class SearchController extends UserController
{
    public function search(Request $request, RestingPlace $rp)
    {
        $keyword = $request->keyword;
        $keyword = trim($keyword);

        $inforListRP = $rp->getRPSearch($keyword);
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

        $count = $rp->countFBListRPSearch($keyword);
        $count = \json_decode(\json_encode($count),true);


        $data['inforListRP'] = $inforListRP;
        $data['keyword'] = $keyword;
        $data['images'] = $images;
        $data['count'] = $count;

        return view('user.search',$data);
    }
}
