<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Amenity;
use App\Models\Room;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AmenityController extends Controller
{
  public function index()
  {
    Session::put('page', 'amenity');
    $amenities = Amenity::orderByDesc('id')->get();
    return view('admin.amenity.index', compact('amenities'));
  }
  public function addEdit(Request $request, $id=null)
  {
      if($id=='') {
        $amenity = new Amenity;
        $title = 'Thêm tiện nghi';
        $msg = 'Đã thêm tiện nghi';
      }else {
        $amenity = Amenity::findOrFail($id);
        $title = 'Sửa tiện nghi';
        $msg = 'Đã sửa tiện nghi';
      }

      if ($request->isMethod('POST')) {
        $data = $request->all();
        $rules = [
          'icon'=> 'required|mimes: jpg,png,jpeg,gif|max: 20000',
          'name' => 'required|max: 255',
          'description' => 'required| max:500',
          'price' => 'required',
        ];
        $customMsg = [
          'icon.required' => 'Vui lòng chọn icon',
          'icon.mimes'=> 'Ảnh chỉ có mở rộng: png, jpg, jpeg, gif',
          'name.required' => 'Vui lòng chọn dịch vụ',
          'name.max'=> 'Tên dịch vụ tối đa 255 kí tự',
          'description.required'=> 'Vui lòng nhập mô tả',
          'description.max'=> 'Tên dịch vụ tối đa 500 kí tự',
          'price.required' => 'Vui lòng nhập giá tiền',
        ];
        $request->validate($rules, $customMsg);

        $amenity->name = $data['name'];
        $amenity->price = $data['price'];
        $amenity->description = $data['description'];
        //Upload Image
        if($request->hasFile('icon')) {
          $icon= $request->file('icon')->store('admin/amenity', 'public');
          $amenity->icon = $icon;
        }
        $amenity->save();
        return redirect()->to('admin/amenity')->with(['success_msg' => $msg]);
      }
      return view('admin.amenity.add_edit', compact('title', 'amenity'));
  }
  public function destroy($id) {
    $amenity = Amenity::findOrFail($id);
    Storage::disk('public')->delete($amenity->icon);
    $amenity->delete();
    return response()->json(['status'=> 'Đã xóa bản ghi!']);
  }
}
