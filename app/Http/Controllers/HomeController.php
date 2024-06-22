<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserPostRequest;
use App\Models\Amenity;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $rooms= Room::limit(5);
      $amenities= Amenity::all();
      if(Auth::check()) {
        if(Auth::user()->role=='admin') {
          return redirect()->to('/admin');
        }
        return view('welcome', compact('rooms', 'amenities'));
      }
        return view('welcome', compact('rooms', 'amenities'));
    }
    public function register(Request $request) {
      dd($request->all());
    }
}
