<?php

namespace App\Http\Controllers\Admin\category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\category\Category;
use App\Http\Requests\CategoryRequest;
use DB;
class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $category = Category::all();
        return view('admin.categories.category',compact('category'));
    }

    public function store(CategoryRequest $request)
    {
        try
        {
            $category = Category::create([
                'category_name' => $request->category_name
            ]);

            // $category = array();
            // $category['category_name']=$request->category_name;
            // DB::table('categories')->insert($category);

            // $category = new Category();
            // $category->category_name=$request->category_name;
            // $category->save();

            $notificatio=array(
                'messege' =>'Category Created Successfuly',
                'alert-type' => 'success',
            );
           return redirect()->back()->with($notificatio);

        }catch(Exceptian $ex)
        {
            return $ex;
        } 
    }

    public function edit($id)
    {
        $category = DB::table('categories')->where('id',$id)->first();
        return view('admin.categories.edit',compact('category'));
    }

    public function update(CategoryRequest $request,$id)
    {

        // $category = array();
        // $category['category_name']=$request->category_name;
        // $update = DB::table('categories')->where('id',$id)->update('category');

        $category=Category::where('id',$id)->update([
            'category_name' => $request->category_name
        ]);
        
        if($category){
            $notificatio=array(
                    'messege' =>'Category Update Successfuly',
                    'alert-type' => 'success',
                );
                return redirect()->route('category')->with($notificatio);
            }
            else
            {
                $notificatio=array(
                    'messege' => 'Nothing To Update',
                    'alert-type' => 'warning',
                );
                return redirect()->route('category')->with($notificatio);
            }
    }

    public function destroy($id)
    {
        try
        {

            // DB::table('categories')->where('id',$id)->delete();

            $category=Category::select('id')->find($id);
            if(!$category)
            {
                $notificatio=array(
                    'messege' =>'Category Updated Successfuly',
                    'alert-type' => 'success',
                );
                return redirect()->back()->with($notificatio);

            }
            $category->delete();

            $notificatio=array(
                'messege' =>'Category Deleted Successfuly',
                'alert-type' => 'success',
            );
           return redirect()->back()->with($notificatio);

        }catch(Exception $ex)
        {
            return $ex;
        }
    }
}
