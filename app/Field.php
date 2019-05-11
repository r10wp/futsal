<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
  use Notifiable;
  public $table = "field";
  protected $fillable = [
      'nama_lapangan', 'alamat_lapangan', 'harga_lapangan', 'foto_lapangan_utama', 'deskripsi_lapangan','status_lapangan'
  ];

  public function tgls()
  {
    return $this->hasMany('App\Tgl', 'field_id');
  }



}
