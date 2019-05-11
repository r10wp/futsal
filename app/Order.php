<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  public $table = "pembayaran";
  protected $fillable = [
    'id', 'kode_bayar', 'user_id','harga_asli', 'tgl_jatuh_tempo_bayar', 'foto_bukti_bayar',
  ];
}
