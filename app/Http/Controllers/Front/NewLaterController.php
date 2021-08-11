<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class NewLaterController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request,[
            "email"=>"required|unique:newslaters|max:255"
        ]);

        $subscrib = array();
        $subscrib['email']=$request->email;
        DB::table('newslaters')->insert($subscrib);

        $notificatio=array(
            'messege' =>'Thanks To Subscribe',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notificatio);
    }
}
