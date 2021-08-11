<?php

namespace App\Http\Controllers\Admin\category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\category\Category;
use App\Model\category\SubCategory;
use DB;

class SubCategoryController extends Controller
{

    
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function subCategory()
    {
        return view('admin.categories.subcategory')->with('subcategories',SubCategory::all())->with('categories',Category::all());
        // $subcategories = SubCategory::whereCategoryId($category)->get();
        // return view('admin.categories.subcategory', compact('subcategories','category'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            "subcategory_name"=>"required",
            "category_id" => "required",
        ]);

        $subcategory = SubCategory::create([
            'subcategory_name'=>$request->subcategory_name,
            'category_id'=>$request->category_id
        ]);

        // $subcategory = new SubCategory();
        // $subcategory->subcategory_name = $request->subcategory_name;
        // $subcategory->category_id = $request->category_id;
        // $subcategory->save();

        $notificatio=array(
            'messege' =>'Sub Category Create Successfuly',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notificatio);

    }

    public function edit($id)
    {
        $subcategory = DB::table('subcategories')->where('id',$id)->first();
        $category = DB::table('categories')->get();
        return view('admin.categories.edit-subcategory',compact('subcategory','category'));
    }

    public function update(Request $request,$id)
    {
        $this->validate($request,[
            "subcategory_name"=>"required",
            "category_id" => "required",
        ]);

        $subcategory = SubCategory::where('id',$id)->update([
            'category_id'=>$request->category_id,
            'subcategory_name'=>$request->subcategory_name,
            
        ]);

        $notificatio=array(
            'messege' =>'Sub Category Updated Successfuly',
            'alert-type' => 'success',
        );
        return redirect()->route('subCategory')->with($notificatio);

    }

    public function destroy($id)
    {
        
        $subcategory = subCategory::find($id);
        $subcategory->delete();
        $notificatio=array(
            'messege' =>'Sub Category Deleted Successfuly',
            'alert-type' => 'warning',
        );
        return redirect()->back()->with($notificatio);
    }
}
