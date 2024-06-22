<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;
use App\Models\Room;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BookingController extends Controller
{
  public function findRoom(Request $request)
  {
    $data = $request->all();
    $rooms = Room::where([
      'quantity_adult' => $data['quantity_adult'],
      'quantity_child' => $data['quantity_child'],
    ])->where('quantity', '!=', 0)->get();
    return view('client.booking.find_room', compact('rooms'));
  }
  public function booking($id)
  {
    $room = Room::findOrFail($id);
    return view('client.room.details', compact('room'));
  }
  public function store(Request $request)
  {
    $data = $request->all();
    $rules = [
      'check_in_date' => 'required|date|after:today',
      'check_out_date' => 'required|date|after:check_in_date',
    ];
    $customMsg = [
      'check_in_date.required' => 'Vui lòng chọn ngày nhận phòng',
      'check_in_date.after' => 'Vui lòng đặt trước 1 ngày',
      'check_out_date.required' => 'Vui lòng chọn ngày trả phòng',
      'check_out_date.after' => 'Vui lòng chọn ngày trả phòng sau ngày nhận phòng',
    ];
    $request->validate($rules, $customMsg);
    $checkInDate = Carbon::parse($data['check_in_date']);
    $checkOutDate = Carbon::parse($data['check_out_date']);
    $totalDay = $checkInDate->diffInDays($checkOutDate);
    $room = Room::findOrFail($data['room_id']);
    $priceRoomPerDay = (float) $room->price;
    $quantity = (int) $data['quantity'];
    $totalPrice = $totalDay * $quantity * $priceRoomPerDay;
    // $numberOfAvailableRooms= $room->quantity- $quantity; khi đã thanh toán, số phòng hiện có sẽ giảm đi
    if ($request->isMethod('POST')) {
      $booking = new Booking;
      $booking->user_id = $data['user_id'];
      $booking->room_id = $data['room_id'];
      $booking->check_in_date = $checkInDate;
      $booking->check_out_date = $checkOutDate;
      $booking->quantity_rooms_booking = $data['quantity'];
      $booking->total_price = $totalPrice;
      $booking->status = 0;
      $booking->save();
    }
    $user = User::findOrFail($data['user_id']);
    $bookings = $user->bookings()->get();
    return redirect()->to('/info/' . $data['user_id'])
      ->with(['bookings', 'msg' => 'Đã đặt phòng! Vui lòng chọn phương thức thanh toán.']);
  }
  public function info($id)
  {
    $user = User::findOrFail($id);
    $bookings = $user->bookings()->orderByDesc('id')->get();
    return view('client.info', compact('user', 'bookings'));
  }

  public function payment(Request $request)
  {
    $data = $request->all();
    $rules = [
      'payment_method' => 'required',
    ];
    $customMsg = [
      'payment_method.required' => 'Vui lòng chọn phương thức thanh toán',
    ];
    $request->validate($rules, $customMsg);
    if ($data['payment_method'] == 'direct_payment') {
      //Cập nhật lại số phòng
      $booking = Booking::findOrFail($data['booking_id']);
      $bookingRoomQuantity = $booking->quantity_rooms_booking; //số lượng phòng sẽ đặt
      $quantityOfRoomsAvailable = $booking->room->quantity; //số phòng đang có
      $quantity = $quantityOfRoomsAvailable - $bookingRoomQuantity; //số phòng còn lại
      $room = Room::findOrFail($booking->room_id);
      $room->update(['quantity' => $quantity]);

      $payment = new Payment;
      $payment->booking_id = $data['booking_id'];
      $payment->payment_date = Carbon::now();
      $payment->payment_method = $data['payment_method'];
      $payment->save();

      $msg = 'Quý khách vui lòng có mặt ở lễ tân trong thời gian ở tại khách sạn để thanh toán!';
      return back()->with(['msg' => $msg]);
    }
    if ($data['payment_method'] == 'online_payment') {
      $payment = new Payment;
      //Cập nhật tình trạng đặt phòng
      $booking = Booking::findOrFail($data['booking_id']);
      $booking->update(['status' => 1]); //đã thanh toán
      //Cập nhật lại số phòng
      $bookingRoomQuantity = $booking->quantity_rooms_booking; //số lượng phòng sẽ đặt
      $quantityOfRoomsAvailable = $booking->room->quantity; //số phòng đang có
      $quantity = $quantityOfRoomsAvailable - $bookingRoomQuantity; //số phòng còn lại

      $room = Room::findOrFail($booking->room_id);
      $room->update(['quantity' => $quantity]);

      $payment->booking_id = $data['booking_id'];
      $payment->payment_date = Carbon::now();
      $payment->payment_method = $data['payment_method'];

      //Lưu vô DB
      $payment->save();

      $msg = 'Thanh toán thành công! Chúc quý khách có những trải nghiệm tuyệt vời tại NightStar.';
      return back()->with(['msg' => $msg]);
    }
    return redirect()->back();
  }

  public function bookingCancel($id)
  {
    $booking = Booking::findOrFail($id);
    //Cập nhật lại số phòng
    $bookingRoomQuantity = $booking->quantity_rooms_booking; //số lượng phòng sẽ hủy
    $room = Room::findOrFail($booking->room_id);
    $room->quantity += $bookingRoomQuantity;
    $room->save();
    $booking->delete();

    return response()->json(['status' => 'Đã hủy đặt phòng!']);
  }
}
