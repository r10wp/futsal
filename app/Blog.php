<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
  public $table = "blog";
  protected $fillable = [
      'id','judul', 'isi', 'harga_lapangan', 'blog_photo', 'status_posting',
  ];
}
