@extends('layouts.frontLayout.front_design')

@section('content')

  <div id="about" class="section wb">
    <div class="container">
      @foreach ($blogs as $blog)
        <div class="row">
          <div class="col-md-6">
            <div class="message-box">
              <h2>{{ $blog->judul }}</h2>
              <h4>{{ hari_ini(date('D',strtotime($blog->created_at))) }}, {{ date('d F Y',strtotime($blog->created_at)) }}</h4>
              <hr>
              <?= $blog->isi ?>

            </div><!-- end messagebox -->
          </div><!-- end col -->
          <div class="col-md-6">
            <div class="post-media wow fadeIn">
              <img src="{{ url('img/blog/'. $blog->blog_photo ) }}" alt="" class="img-fluid img-rounded" style="height:200px">
            </div><!-- end media -->
          </div><!-- end col -->
        </div><!-- end row -->
        <hr class="hr1">
      @endforeach
      {{ $blogs->links() }}



    </div><!-- end container -->
  </div><!-- end section -->

@endsection

<?php
 function hari_ini($param){
   $hari = $param;

   switch($hari){
     case 'Sun':
       $hari_ini = "Minggu";
     break;

     case 'Mon':
       $hari_ini = "Senin";
     break;

     case 'Tue':
       $hari_ini = "Selasa";
     break;

     case 'Wed':
       $hari_ini = "Rabu";
     break;

     case 'Thu':
       $hari_ini = "Kamis";
     break;

     case 'Fri':
       $hari_ini = "Jumat";
     break;

     case 'Sat':
       $hari_ini = "Sabtu";
     break;

     default:
       $hari_ini = "Tidak di ketahui";
     break;
   }

    return $hari_ini;

  }
?>
