<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
  public $table = "pembayaran";
  protected $fillable = [
      'id','kode_bayar', 'harga_bayar_asli',
  ];
}
