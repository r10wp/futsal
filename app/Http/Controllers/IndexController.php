<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class IndexController extends Controller
{
  public function index()
  {
    return view('index');
  }

  public function about()
  {
    return view('page.about');
  }



}
