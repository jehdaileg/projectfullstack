<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //

    public function getMessageClient(){

        return response()->json([

            'message_client'=> "Message rended to the default port --port=8000"


        ]);
    }

    public function getApiResponseDatas() {

       return response()->json([

        'msg' => 'An error occured'

       ], 422);
    }


}
