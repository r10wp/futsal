@extends('layouts.frontLayout.front_design')

@section('content')
<div id="about" class="section wb">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="message-box">
          <h2>Selamat datang di  <font color="#cdd51f">GAWANG.COM</font> </h2>
          <p>
            Gawang merupakan sistem aplikasi pemesanan lapangan futsal sederhana untuk memudahkan customer dalam
            melakukan booking lapangan futsal, anda bisa melihat dan memilih jam booking lapangan yang masih tersedia dalam aplikasi ini.
          </p>
          <p>
            Sebagai Aplikasi kami menyediakan tampilan aplikasi yang sangat <i> simple </i> dan <i> user friendly </i> untuk memudahkan anda dalam melakukan pemesanan tanpa adanya kekeliruan  dan meminimalkan <i> human error </i>.
          </p>
        </div><!-- end messagebox -->
      </div><!-- end col -->

      <div class="col-md-6">
        <div class="post-media wow fadeIn">
          <img src="{{ asset('img/other/about1.jpg') }}" alt="" class="img-fluid img-rounded" style="height:250px">
        </div><!-- end media -->
      </div><!-- end col -->
    </div><!-- end row -->
  </div><!-- end container -->
</div><!-- end section -->

<div id="services" class="parallax section lb">
  <div class="container">
    <div class="section-title text-center">
      <h3>Fasilitas di <font color="#cdd51f">GAWANG.COM</font></h3>
    </div><!-- end title -->

    <div class="owl-services owl-carousel owl-theme owl-loaded owl-drag">
      <div class="owl-stage-outer">
        <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1140px;">
          <div class="owl-item" style="width: 255px; margin-right: 30px;">
            <div class="service-widget">
              <div class="post-media wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
                <a href="{{ asset('img/other/about6.jpg') }}" data-rel="prettyPhoto[gal]" class="hoverbutton global-radius"><i class="flaticon-unlink"></i></a>
                <img src="{{ asset('img/other/about6.jpg') }}" alt="" class="img-fluid img-rounded">
              </div>
              <div class="service-dit">
                <h3>Musholla</h3>
                <p>Bagi anda yang beragama Islam dan hendak menuaikan ibadah sholat sebelum / sesudah bermain kami siapkan musholla</p>
              </div>
            </div>
          </div>

        </div>
      </div>

      <div class="owl-stage-outer">
        <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1140px;">
          <div class="owl-item" style="width: 255px; margin-right: 30px;">
            <div class="service-widget">
              <div class="post-media wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
                <a href="{{ asset('img/other/about7.jpg') }}" data-rel="prettyPhoto[gal]" class="hoverbutton global-radius"><i class="flaticon-unlink"></i></a>
                <img src="{{ asset('img/other/about7.jpg') }}" alt="" class="img-fluid img-rounded">
              </div>
              <div class="service-dit">
                <h3>Shower Kamar Mandi</h3>
                <p>Kami menyiapkan kamar mandi beserta showernya sehingga tidak perlu khawatir tentang kebersihan diri anda</p>
              </div>
            </div>
          </div>

        </div>
      </div>
      <div class="owl-stage-outer">
        <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1140px;">
          <div class="owl-item" style="width: 255px; margin-right: 30px;">
            <div class="service-widget">
              <div class="post-media wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
                <a href="{{ asset('img/other/about8.jpg') }}" data-rel="prettyPhoto[gal]" class="hoverbutton global-radius"><i class="flaticon-unlink"></i></a>
                <img src="{{ asset('img/other/about8.jpg') }}" alt="" class="img-fluid img-rounded">
              </div>
              <div class="service-dit">
                <h3>Ruang Ganti</h3>
                <p>Ruang ganti pemain yang bersih untuk seluruh pemain yang hendak bermain futsal (dilengkapi fasilitas MCK)</p>
              </div>
            </div>
          </div>

        </div>
      </div>
      <div class="owl-stage-outer">
        <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1140px;">
          <div class="owl-item" style="width: 255px; margin-right: 30px;">
            <div class="service-widget">
              <div class="post-media wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
                <a href="{{ asset('img/other/about2.jpg') }}" data-rel="prettyPhoto[gal]" class="hoverbutton global-radius"><i class="flaticon-unlink"></i></a>
                <img src="{{ asset('img/other/about2.jpg') }}" alt="" class="img-fluid img-rounded">
              </div>
        			<div class="service-dit">
        				<h3>Bola</h3>
        				<p>Bola sudah ada dari kami dan tinggal menggunakannya saja. Bola dari Gawang.com, kami pastikan layak untuk dipakai</p>
        			</div>
            </div>
          </div>

        </div>
      </div>
      <div class="owl-stage-outer">
        <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1140px;">
          <div class="owl-item" style="width: 255px; margin-right: 30px;">
            <div class="service-widget">
              <div class="post-media wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
                <a href="{{ asset('img/other/about3.jpg') }}" data-rel="prettyPhoto[gal]" class="hoverbutton global-radius"><i class="flaticon-unlink"></i></a>
                <img src="{{ asset('img/other/about3.jpg') }}" alt="" class="img-fluid img-rounded">
              </div>
              <div class="service-dit">
                <h3>Penerangan Lapangan</h3>
                <p>Penerangan lapangan yang pas (tidak terlalu gelap ataupun terlalu silau ) akan membuat jalannya permainan menjadi baik juga</p>
              </div>
            </div>
          </div>

        </div>
      </div>
      <div class="owl-stage-outer">
        <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1140px;">
          <div class="owl-item" style="width: 255px; margin-right: 30px;">
            <div class="service-widget">
              <div class="post-media wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
                <a href="{{ asset('img/other/about4.jpg') }}" data-rel="prettyPhoto[gal]" class="hoverbutton global-radius"><i class="flaticon-unlink"></i></a>
                <img src="{{ asset('img/other/about4.jpg') }}" alt="" class="img-fluid img-rounded">
              </div>
              <div class="service-dit">
                <h3>Lahan Parkir</h3>
                <p>Tidak perlu kebingungan dalam memarkir kendaraan anda karena lahan parkir pasti cukup untuk kendaraan anda</p>
              </div>
            </div>
          </div>

        </div>
      </div>
      <div class="owl-stage-outer">
        <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1140px;">
          <div class="owl-item" style="width: 255px; margin-right: 30px;">
            <div class="service-widget">
              <div class="post-media wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
                <a href="{{ asset('img/other/about5.jpg') }}" data-rel="prettyPhoto[gal]" class="hoverbutton global-radius"><i class="flaticon-unlink"></i></a>
                <img src="{{ asset('img/other/about5.jpg') }}" alt="" class="img-fluid img-rounded">
              </div>
              <div class="service-dit">
                <h3>Loker Barang</h3>
                <p>Anda dapat meninggalkan barang anda di dalam loker-loker penyimpanan kami tanpa perlu khawatir akan kehilangan</p>
              </div>
            </div>
          </div>

        </div>
      </div>


      <div class="owl-nav disabled">
        <div class="owl-prev disabled"><i class="fa fa-angle-left effect-1"></i></div>
        <div class="owl-next disabled"><i class="fa fa-angle-right effect-1"></i></div>
      </div>
      <div class="owl-dots disabled"></div>
    </div><!-- end row -->

    <hr class="hr1">
  </div><!-- end container -->
</div>
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
