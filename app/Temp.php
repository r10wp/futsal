<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Temp extends Model
{
  public $table = "pemesanan_temp";
  protected $fillable = [
      'schedule_id', 'user_id', 'harga_utama',
  ];
}
