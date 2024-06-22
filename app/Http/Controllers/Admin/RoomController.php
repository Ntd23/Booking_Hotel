<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Gumlet\ImageResize;
class RoomController extends Controller
{
    public function index() {
      Session::put('page', 'room');
      $rooms= Room::orderByDesc('id')->get();
      return view('admin.room.index', compact('rooms'));
    }
    public function addEdit(Request $request, $id=null) {
      $enumQuantityChild = Room::getQuantityChild();
      $enumQuantityAdult = Room::getQuantityAdult();
      if($id=='') {
        $title= 'Thêm mới phòng';
        $room= new Room;
        $msg= 'Đã thêm phòng!';
      }else {
        $title= 'Sửa phòng';
        $room= Room::findOrFail($id);
        $msg= 'Đã sửa phòng!';
      }
      if($request->isMethod('POST')) {
        $data= $request->all();
        if($id=='') {
          $rules= [
            'name'=> 'required|max:255',
            'price'=> 'required|numeric',
            'quantity'=> 'required|numeric',
            'image'=> 'required|mimes: jpg,jpeg,png,gif',
            'video' => 'required|mimes:mp4|max:20000',
            'quantity_adult'=> 'required',
            'quantity_child'=> 'required',
          ];
          $customMsg= [
            'name.required'=> 'Vui lòng nhập tên phòng',
            'name.max'=> 'Tối đa 255 kí tự',
            'price.required'=> 'Vui lòng nhập giá tiền',
            'price.numeric'=> 'Số tiền phải là chữ số',
            'quantity.required'=> 'Vui lòng nhập số lượng',
            'image.required'=> 'Vui lòng chọn hình ảnh',
            'image.mimes'=> 'Chỉ nhận hình ảnh có mở rộng: jpg, jpeg, png, gif',
            'video.required'=> 'Vui lòng chọn video',
            'video.mimes'=> 'Video chỉ nhận mở rộng mp4',
            'video.max'=> 'Video tối đa 20MB',
            'quantity_adult.required'=> 'Vui lòng chọn số lượng người lớn',
            'quantity_child.required'=> 'Vui lòng chọn số lượng trẻ em',
          ];
        }else {
          $rules= [
            'name'=> 'max:255',
            'price'=> 'numeric',
            'quantity'=> 'numeric',
            'image'=> 'mimes: jpg,jpeg,png,gif',
            'video' => 'mimes:mp4|max:20000'
          ];
          $customMsg= [
            'name.max'=> 'Tối đa 255 kí tự',
            'price.numeric'=> 'Số tiền phải là chữ số',
            'image.mimes'=> 'Chỉ nhận hình ảnh có mở rộng: jpg, jpeg, png, gif',
            'video.mimes'=> 'Video chỉ nhận mở rộng mp4',
            'video.max'=> 'Video tối đa 20MB'
          ];
        }
        $request->validate($rules, $customMsg);
        $room->name= $data['name'];
        $room->quantity= $data['quantity'];
        $room->status = (int)$data['quantity']== 0 ? 'unavailable' : 'available';
        $room->quantity_adult= $data['quantity_adult'];
        $room->quantity_child= $data['quantity_child'];
        $room->price= $data['price'];
        //Upload Image
        if($request->hasFile('image')) {
          $image= $request->file('image')->store('admin/room', 'public');
          $room->image= $image;
        }
        //Upload Video
        if($request->hasFile('video')) {
          $video= $request->file('video')->store('admin/room', 'public');
          $room->video= $video;
        }
        $room->save();
        return redirect('admin/room')->with('success_msg',$msg);
      }
      return view('admin.room.add_edit', compact('title', 'room', 'enumQuantityChild', 'enumQuantityAdult'));
    }
    public function details($id) {
      $room= Room::findOrFail($id);
      $enumQuantityChild = Room::getQuantityChild();
      $enumQuantityAdult = Room::getQuantityAdult();
      $title= 'Chi tiết phòng';
      return view('admin.room.details', compact('room', 'title', 'enumQuantityChild', 'enumQuantityAdult'));
    }
    public function destroy($id) {
      $room= Room::findOrFail($id);
      Storage::disk('public')->delete($room->image);
      Storage::disk('public')->delete($room->video);
      $room->delete();
      return response()->json(['status'=> 'Đã xóa bản ghi!']);
    }
}
