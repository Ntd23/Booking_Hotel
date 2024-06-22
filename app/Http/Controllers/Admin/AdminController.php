<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Payment;
use App\Models\Revenue;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
  // public function index() {
  //   Session::put('page', 'revenue');
  //   return view('admin.revenue.index');
  // }
  public function getRevenueData(Request $request)
  {
    $from = Carbon::parse($request->input('from'));
    $to = Carbon::parse($request->input('to'));
    $revenueData = Payment
      ::join('bookings', 'payments.booking_id', '=', 'bookings.id')
      ->select(
        DB::raw('DATE(payment_date) as date'),
        DB::raw('SUM(bookings.total_price) as total_price')
      )
      ->whereBetween('payment_date', [$from, $to])
      ->groupBy('date')
      ->get();
    // $labels = [];
    // $data = [];
    // foreach ($revenueData as $value) {
    //   $labels[] = $value['date'];
    //   $data[] = $value['total_price'];
    // }
    $labels = $revenueData->pluck('date');
    $data = $revenueData->pluck('total_price');
    return response()->json([
      'labels' => $labels,
      'data' => $data
    ]);
  }
}
