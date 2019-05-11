<?php

namespace App;


use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Admin extends Authenticatable
{
  use Notifiable;

  protected $table = "admin";
  protected $primaryKey = "id";

  protected $fillable = [
      'name', 'email', 'password',
  ];

  protected $hidden = [
    'password', 'remember_token',
  ];
}
