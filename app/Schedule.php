<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
  public $table = "schedule";
  protected $fillable = [
    'tgl_id', 'jam_tersedia', 'tersedia',
  ];
}
