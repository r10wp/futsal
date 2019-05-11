@extends('layouts.frontLayout.front_design')

@section('content')
  <div class="parallax section lb" style="padding-bottom:0px;padding-top:50px">
    <div class="section-title text-center" >
      <h3>Daftar <font color="green"> LAPANGAN </font> yang bisa dipesan</h3>
    </div><!-- end title -->
  </div><!-- end section -->
  <div id="about" class="section wb">
        <div class="container">
          @foreach ($fields as $key)
            <div class="row">
                <div class="col-md-6">
                    <div class="message-box">
                        <h2>{{ $key->nama_lapangan }}</h2>
                        <h4>Harga : <u>+</u> Rp {{ number_format($key->harga_lapangan,0,'','.') }}</h4>
                        <p class="lead">{{ $key->alamat_lapangan }}</p>

                        <p>
                          @if (strlen($key->deskripsi_lapangan) > 160)
                            {{ strstr(wordwrap($key->deskripsi_lapangan, 160), "\n", "true")." .... " }}
                          @else
                            {{ $key->deskripsi_lapangan }}
                          @endif

                        </p>

                        <a class="btn11" href="{{ url('field/'.$key->id) }}"><span>Lihat Jadwal</span><div class="transition"></div></a>
                    </div><!-- end messagebox -->
                </div><!-- end col -->

                <div class="col-md-6">
                    <div class="post-media wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
                        <img src="{{ asset('img/lapangan/'.$key->foto_lapangan_utama)}}" alt="" class="img-fluid img-rounded">

                    </div><!-- end media -->
                </div><!-- end col -->
            </div><!-- end row -->

            <hr class="hr1">

          @endforeach

        </div><!-- end container -->
    </div>



@endsection
