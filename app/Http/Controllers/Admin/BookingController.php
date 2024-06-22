<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BookingController extends Controller
{
    public function index() {
      Session::put('page', 'booking');
      $bookings= Booking::with('user', 'room')->get();
      return view('admin.booking.index', compact('bookings'));
    }
    public function details($id) {
      $booking= Booking::findOrFail($id);
      $title= 'Chi tiết phòng đặt';
      return view('admin.booking.details', compact('title', 'booking'));
    }
    public function print($id) {
      $booking= Booking::with('user', 'room', 'payment')->findOrFail($id);
      view()->share('booking', $booking);
      $pdf= PDF::loadView('admin.booking.print', compact('booking'));
      return $pdf->download('NSH_'.$booking->id.'.pdf');
    }
}
