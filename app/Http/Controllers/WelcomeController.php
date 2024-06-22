<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Amenity;
use App\Models\Contact;
use App\Models\Promotion;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class WelcomeController extends Controller
{
  public function welcome() {
    Session::put('page', 'home');
    $rooms= Room::latest()->where('quantity','>',0)->get();
    $amenities= Amenity::all();
    return view('welcome', compact('rooms','amenities'));
  }
  public function index() {
    $rooms= Room::where('quantity','>',0)->get();
    return view('client.room.index', compact('rooms'));
  }
  public function details($id) {
    Session::put('page', 'room');
    $room= Room::findOrFail($id);
    $title= 'Chi tiết phòng';
    return view('client.room.details', compact('room', 'title'));
  }
  public function contact($id=null) {
    if($id=='') {
      $user= array();
    }else {
      $user= User::findOrFail($id);
    }
    return view('client.contact', compact('user'));
  }
  public function contactSend(Request $request) {
    $data= $request->all();
    $rules= [
      'name'=> 'required',
      'email'=> 'required|email',
      'content'=> 'required'
    ];
    $customMsg= [
      'name.required'=> 'Vui lòng điền tên của bạn',
      'email.required'=> 'Vui lòng điền email của bạn',
      'email.email'=> 'Vui lòng nhập email đúng định dạng',
      'content.required'=> 'Vui lòng điền nội dung cần hỗ trợ',
    ];
    $request->validate($rules, $customMsg);
    $contact= new Contact;
    if(Auth::check()) {
      $contact->user_id= Auth::id();
    }

    $contact->content= $data['content'];
    $contact->status= '1';
    $contact->save();
    Session::flash('success', 'Cảm ơn bạn đã liên hệ với chúng tôi. Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất.');
    return redirect()->route('contact');
  }
  public function about() {
    $abouts= About::all();
    return view('client.about', compact('abouts'));
  }
  public function promotion() {
    $promotions= Promotion::all();
    return view('client.promotion', compact('promotions'));
  }
}
