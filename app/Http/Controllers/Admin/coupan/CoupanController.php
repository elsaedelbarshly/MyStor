<?php

namespace App\Http\Controllers\Admin\coupan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\coupan\Coupan;
use DB;

class CoupanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function coupan()
    {
        $coupan = Coupan::all();
        return view('admin.coupans.coupan',compact('coupan'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            "coupan"=>"required|max:255",
            "discount"=>"required|max:255"
        ]);

        $coupan=Coupan::create([
            'coupan'=>$request->coupan,
            'discount'=>$request->discount
        ]);

        $notificatio=array(
            'messege' =>'Coupan Create Successfuly',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notificatio);

    }

    public function edit($id)
    {
        $coupan = Coupan::find($id);
        return view('admin.coupans.edit-coupan')->with('coupan',$coupan);

        // $coupan = DB::table('coupans')->where('id',$id)->first();
        // return view('admin.coupans.edit-coupan',compact('coupan'));

    }

    public function update(Request $request,$id)
    {
        $this->validate($request,[
            "coupan"=>"required|max:255",
            "discount"=>"required|max:255"
        ]);

        $coupan = Coupan::where('id',$id)->update([
            'coupan'=>$request->coupan,
            'discount'=>$request->discount
        ]);

        $notificatio=array(
            'messege' =>'Coupan Updated Successfuly',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.coupan')->with($notificatio);

    }

    public function destroy($id)
    {
        $coupan = Coupan::find($id);
        $coupan -> delete();

        $notificatio=array(
            'messege' =>'Coupan Deleted Successfuly',
            'alert-type' => 'warning',
        );
        return redirect()->back()->with($notificatio);
    }


    //################ New laters #######################

    public function newlater()
    {
        $subscribe = DB::table('newslaters')->get();
        return view('admin.coupans.newlater',compact('subscribe'));
    }

    public function destory($id)
    {
        DB::table('newslaters')->where('id',$id)->delete();
        $notificatio=array(
            'messege' =>'Email Deleted Successfuly',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notificatio);
    }

}
