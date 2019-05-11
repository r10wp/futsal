<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tgl extends Model
{
  public $table = "tgl_lapangan";
  protected $fillable = [
      'tgl_tersedia', 'field_id',
  ];

  public function schedules()
  {
    return $this->hasMany('App\Schedule', 'tgl_id');
  }
  
}
