<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    //


    public function create_tag(Request $request){

        //validation backend

        $this->validate($request, [
            'nameTag'=> 'required'
        ]);



        return Tag::create([

            'nameTag'=>$request->nameTag

        ]);
    }


    public function get_tags(){

        return Tag::orderBy('id', 'desc')->get();

    }


   public function edit_tag(Request $request){

    $this->validate($request, [

        'nameTag'=>'required',

        'id'=>'required'

    ]);

    return Tag::where('id', $request->id)->update([

        'nameTag'=>$request->nameTag

    ]);

   }

   public function delete_tag(Request $request){

        $this->validate($request, [

            'id'=>'required'

        ]);

        return Tag::where('id', $request->id)->delete();
   }

}
