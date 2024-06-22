<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
  use HasFactory;
  public const STATUS_AVAILABLE = 'available';
  public const STATUS_UNAVAILABLE = 'unavailable';
  protected $fillable = ['quantity', 'quantity_child', 'quantity_adult'];
  protected $table = 'rooms';
  protected $casts = [
    'status' => 'string',
  ];
  public static function getQuantityChild()
  {
    return [0, 1, 2, 3];
  }
  public static function getQuantityAdult()
  {
    return [0, 1, 2, 3];
  }
  public function amenities()
  {
    return $this->belongsToMany(Amenity::class, 'room_amenities', 'room_id', 'amenity_id');
  }
  public function bookings() {
    return $this->hasMany(Booking::class);
  }
}
