<?php

namespace App\Http\Controllers\Admin\category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\category\Brand;
use App\Http\Requests\BrandRequest;
use DB;
class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $brand=Brand::all();
        return view('admin.categories.brand',compact('brand'));
    }

    public function store(BrandRequest $request)
    {
        $brand = new Brand();
        $brand->brand_name=$request->brand_name; 


        $brand_logo = $request->file('brand_logo');
        $name = $brand_logo->getClientOriginalName();
        $brand_logo->move(public_path().'/images/',$name);
        $brand->brand_logo = $name;
        
        $brand->save();

        $notificatio=array(
            'messege' =>'Brand Created Successfuly',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notificatio);
    }

    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('admin.categories.edit-brand',compact('brand'));
    }

    public function update(BrandRequest $request,$id)
    {

        if($request->hasFile('brand_logo'))
        {
            $brand_logo = $request->file('brand_logo');
            $name = $brand_logo->getClientOriginalName();
            $brand_logo->move(public_path().'/images/',$name);
            $brand->brand_logo = $name;
        }

        $brand = Brand::where('id',$id)->update([
            'brand_name' => $request->brand_name,
            'brand_logo' => $request->name
        ]);


        $notificatio=array(
            'messege' =>'Brand Updated Successfuly',
            'alert-type' => 'success',
        );
        return redirect()->route('brand')->with($notificatio);
    }

    public function destory($id)
    {
        $brand = Brand::find($id);
        $brand->delete();
        $notificatio=array(
            'messege' =>'Brand Deleted Successfuly',
            'alert-type' => 'warning',
        );
        return redirect()->back()->with($notificatio);
    }

}
