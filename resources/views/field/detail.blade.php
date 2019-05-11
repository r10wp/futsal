@extends('layouts.frontLayout.front_design')

@section('content')
  @foreach($lapangans as $lapangan)
    @if ($lapangan->status_lapangan == 'TUTUP'): {
      <script>window.location = "/fields";</script>
    @endif
      <div id="about" class="section wb">
        <div class="container">
          <div class="row">
            <div class="col-md-4">
                <div class="post-media wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
                    <img src="{{ asset('img/lapangan/'.$lapangan->foto_lapangan_utama)}}" alt="" class="img-fluid img-rounded">

                </div><!-- end media -->
            </div><!-- end col -->
            <div class="col-md-8">
              <div class="message-box">
                <h2>{{ $lapangan->nama_lapangan }}</h2>
                <h4>Harga : <u>+</u> Rp {{ number_format($lapangan->harga_lapangan,0,'','.') }}</h4>
                <p class="lead">{{ $lapangan->alamat_lapangan }}</p>
                <p>{{ $lapangan->deskripsi_lapangan }}</p>
              </div><!-- end messagebox -->
            </div><!-- end col -->
            <div class="col-md-8">
              <br>
              @if (count($dates) == null)
                <div class="section-title text-center" style="border-style: dotted;">
                  <h2><font color="red"> Mohon Maaf, Jadwal Tidak Tersedia / Telah Habis </font></h2>
                  <p>Silahkan pilih lapangan yang masih memiliki Jadwal</p>
                </div><!-- end title -->
              @else
              <div class="section-title text-center">
                <h2> Jadwal Tersedia </h2>
              </div><!-- end title -->
              <table id="table-original" class="stripe" style="width:110%">
                <thead>
                <tr>
                  <th>ID </th>
                  <th>Hari</th>
                  <th>Tgl</th>
                  <th>Jam</th>
                  <th>Harga Sewa</th>
                  <th>Status Lapangan</th>
                </tr>
                </thead>
                <tbody>


                  <?php
                    $ditemukan = null;
                    $check = [];
                    foreach ($check_order as $key) {
                      array_push($check,$key->jadwal_id);
                    }
                  ?>
                  @foreach($dates as $key)
                    <?php
                      if (array_search($key->id, $check) !== false) {
                        $ditemukan = "FOUND";
                      } else {
                        $ditemukan = "NOTFOUND";
                      }
                    ?>
                      <tr>
                        <td>{{ $key->id  }}</td>
                        <td>{{ hari_ini(date('D',strtotime($key->tgl_tersedia))) }}</td>
                        <td>{{ date('d F Y',strtotime($key->tgl_tersedia)) }}</td>
                        <td>{{ $key->jam_tersedia }}</td>
                        <td>Rp {{ number_format($key->harga_sewa_lapangan,0,'','.') }}</td>
                        <td>
                          @if($key->tersedia == "YA" AND $ditemukan == "NOTFOUND" )
                              <form class="" id="myform" action="/pesan_sementara" method="post">
                                @csrf
                            @if($key->tersedia == "YA" AND $ditemukan == "NOTFOUND" )
                              <input type="hidden" name="set" value="{{ $key->id }}-{{ $key->harga_sewa_lapangan }}"></input>
                            @elseif($key->tersedia == "TIDAK" OR $ditemukan == "FOUND")
                              {{-- <input type="radio" disabled value=""></input> --}}
                            @endif
                            <button type="submit" name="button" class="btn btn-success btn-sm">Pesan</button>
                            <font color="blue"> </font>
                                  </form>

                          @elseif($ditemukan == "FOUND")
                            <font color="green">dalam proses pemesanan</font>
                          @elseif($key->tersedia == "BOOKED")
                            <font color="red"> lapangan telah ditempati </font>
                          @endif
                        </td>
                      </tr>

                    @endforeach

                </tbody>

              </table>
              @endif
            </div><!-- end col -->

            <div class="col-md-4">
              <br>
              <div class="section-title">
                <h2> Foto Tambahan : </h2>
              </div><!-- end title -->
              <div class="col-md-10">
                <div class="service-widget">
                  <div class="post-media wow fadeIn">
                    <a href="{{ asset('img/lapangan/'.$lapangan->foto_lapangan_1)}}" data-rel="prettyPhoto[gal]" class="hoverbutton global-radius"><i class="flaticon-unlink"></i></a>
                    <img src="{{ asset('img/lapangan/'.$lapangan->foto_lapangan_1)}}" alt="" class="img-fluid img-rounded">
                  </div>
                </div>
                <hr>
                <div class="service-widget">
                  <div class="post-media wow fadeIn">
                    <a href="{{ asset('img/lapangan/'.$lapangan->foto_lapangan_2)}}" data-rel="prettyPhoto[gal]" class="hoverbutton global-radius"><i class="flaticon-unlink"></i></a>
                    <img src="{{ asset('img/lapangan/'.$lapangan->foto_lapangan_2)}}" alt="" class="img-fluid img-rounded">
                  </div>
                </div>
              </div>
              <hr>

              <div class="col-md-10">
                <div class="service-widget">
                  <div class="post-media wow fadeIn">
                    <a href="{{ asset('img/lapangan/'.$lapangan->foto_lapangan_3)}}" data-rel="prettyPhoto[gal]" class="hoverbutton global-radius"><i class="flaticon-unlink"></i></a>
                    <img src="{{ asset('img/lapangan/'.$lapangan->foto_lapangan_3)}}" alt="" class="img-fluid img-rounded">
                  </div>
                </div>
                <hr>
                <div class="service-widget">
                  <div class="post-media wow fadeIn">
                    <a href="{{ asset('img/lapangan/'.$lapangan->foto_lapangan_4)}}" data-rel="prettyPhoto[gal]" class="hoverbutton global-radius"><i class="flaticon-unlink"></i></a>
                    <img src="{{ asset('img/lapangan/'.$lapangan->foto_lapangan_4)}}" alt="" class="img-fluid img-rounded">
                  </div>
                </div>
              </div>
        </div>



          </div><!-- end row -->
        </div><!-- end container -->
      </div><!-- end section -->





  @endforeach


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
