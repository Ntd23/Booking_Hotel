<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    public function index(){
      Session::put('page', 'contact');
      $contacts= Contact::with('user')->get();
      return view('admin.contact.index', compact('contacts'));
    }
    public function updateContactStatus(Request $request) {
      if($request->ajax()) {
        $data= $request->all();
        if($data['status']=="Đã gọi") {
          $status= 1;
        }else {
          $status= 0;
        }
        Contact::where('id', $data['contact_id'])->update(['status'=> $status]);
        return response()->json(['status'=> $status, 'contact_id'=> $data['contact_id']]);
      }
    }
    public function destroy($id) {
      Contact::findOrFail($id)->delete();
      return response()->json(['status'=> 'Đã xóa bản ghi!']);
    }
}
