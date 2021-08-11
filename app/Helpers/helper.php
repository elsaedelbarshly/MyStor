<?php
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;

// function uploadImage($folder,$image)
// {
//     $image->store('/',$folder);
//     $filename = $image->hasName();
//     $path = 'category/' . $folder . '/' . $filename;
//     return $path;
// }

// function uploadImage($image_name,$filename)
// {
//     $image_name = $request->file('brand_logo');
//     $name = $image_name->getClientOriginalName();
//     $image_name->move(public_path()."/$filename/",$name);
//     return $image_name=$name;
// }

// $image = $request->file('flCourseImage');
// $name = $image->getClientOriginalName();
// $image->move(public_path().'/images/',$name);
// $course->image = $name;
