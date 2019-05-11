<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rekening extends Model
{
  public $table = "rekening";
  public $timestamps = false;
  
  protected $fillable = [
    'no_rekening', 'bank', 'pemilik',
  ];
}
