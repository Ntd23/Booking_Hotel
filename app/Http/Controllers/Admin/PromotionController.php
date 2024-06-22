<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PromotionController extends Controller
{
  public function index()
  {
    Session::put('page', 'promotion');
    $promotions = Promotion::all();
    // dd($promotions);die;
    return view('admin.promotion.index', compact('promotions'));
  }
  public function addEdit(Request $request, $id = null)
  {
    if ($id == '') {
      $title = 'Thêm khuyến mãi';
      $promotion = new Promotion;
      $msg = 'Đã thêm khuyến mãi!';
    } else {
      $title = 'Sửa khuyến mãi';
      $promotion = Promotion::findOrFail($id);
      $msg = 'Đã sửa khuyến mãi!';
    }
    if ($request->isMethod('POST')) {
      $data = $request->all();
      $rules = [
        'name' => 'required|max:255',
        'title' => 'required|max:255',
        'discount' => 'required',
        'code' => 'required',
        'description' => 'required|max:500',
        'start_date' => 'required|date|after_or_equal:today',
        'end_date' => 'required|date|after_or_equal:start_date'
      ];
      $customMsg= [
        'name.required'=> 'Tên khuyến mãi là bắt buộc',
        'title.required'=> 'Tiêu đề là bắt buộc',
        'discount.required'=> 'Mức giảm giá là bắt buộc',
        'code.required'=> 'Mã giảm giá là bắt buộc',
        'description.required'=> 'Mô tả là bắt buộc',
        'start_date.required'=> 'Ngày bắt đầu là bắt buộc',
        'start_date.date'=> 'Ngày bắt đầu không đúng định dạng',
        'start_date.after_or_equal'=> 'Ngày bắt đầu sau hôm nay',
        'end_date.required'=> 'Ngày kết thúc là bắt buộc',
        'end_date.date'=> 'Ngày kết thúc không đúng định dạng',
        'end_date.after_or_equal'=> 'Ngày kết thúc tính từ ngày bắt đầu trở đi',
      ];
      $request->validate($rules, $customMsg);
      $promotion->name = $data['name'];
      $promotion->title = $data['title'];
      $promotion->discount = $data['discount'];
      $promotion->code = $data['code'];
      $promotion->description = $data['description'];
      $promotion->start_date = $data['start_date'];
      $promotion->end_date = $data['end_date'];

      $promotion->save();
      return redirect('admin/promotion')->with('success_msg', $msg);
    }
    return view('admin.promotion.add_edit', compact('promotion', 'title'));
  }
  public function details($id) {
    $promotion= Promotion::findOrFail($id);
    $title= 'Chi tiết khuyến mãi';
    return view('admin.promotion.details', compact('title','promotion'));
  }
  public function destroy($id) {
    Promotion::findOrFail($id)->delete();
    return response()->json(['status'=> 'Đã xóa bản ghi!']);
  }
}
