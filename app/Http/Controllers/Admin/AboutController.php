<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index() {
      Session::put('page', 'about');
      $abouts= About::all();
      return view('admin.about.index', compact('abouts'));
    }
    public function addEdit(Request $request, $id=null) {
      if($id=='') {
        $title= 'Thêm bài giới thiệu';
        $about= new About;
        $msg= 'Đã thêm bài giới thiệu';
      }else {
        $title= 'Sửa bài giới thiệu';
        $about= About::findOrFail($id);
        $msg= 'Đã sửa bài giới thiệu';
      }
      if($request->isMethod('POST')) {
        $data= $request->all();
        if($id=='') {
          $rules= [
            'title' =>'required',
            'description' =>'required|string|max:10000',
            'image'=> 'required|mimes:jpg,jpeg,png,gif|max: 10000',
          ];
          $customMsg= [
            'title.required'=> 'Vui lòng nhập tiêu đề',
            'description.required'=> 'Vui lòng nhập mô tả',
            'description.max'=> 'Mô tả tối đa 10,000 kí tự',
            'image.required'=> 'Vui lòng chọn ảnh',
            'image.mimes'=> 'Ảnh chỉ có mở rộng: png, jpg, jpeg, gif',
            'image.max'=> 'Ảnh có kích thước tối đa 10MB'
          ];
          $request->validate($rules, $customMsg);
        }
        $about->title= $data['title'];
        $about->description= $data['description'];
        //Upload Image
        if($request->hasFile('image')) {
          $image= $request->file('image')->store('admin/about', 'public');
          $about->image= $image;
        }
        $about->save();
        return redirect()->to('admin/about')->with(['success_msg'=> $msg]);
      }
      return view('admin.about.add_edit', compact('title','about'));
    }
    public function destroy($id) {
      $about= About::findOrFail($id);
      Storage::disk('public')->delete($about->image);
      $about->delete();
      return response()->json(['status'=> 'Đã xóa bản ghi!']);
    }
}
