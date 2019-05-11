@extends('layouts.frontLayout.front_design')

@section('content')
  @foreach ($bayars as $bayar)

    <div id="services" class="parallax section">
      <div class="container">
        <div class="section-title text-center">
          <h3>Tagihan Nomor : {{ $bayar->kode_bayar }}</h3>

          @if ($bayar->status_bayar == "BELUM UPLOAD BUKTI" )
            <font color="red"> Belum Melunasi Pembayaran. Silahkan Upload Bukti Bayar Untuk Cetak Kwitansi. Segera lunasi pembayaran sebelum tanggal yang telah ditentukan</font>
          @elseif ($bayar->status_bayar == "MENUNGGU VERIFIKASI")
            <font color="orange">MENUNGGU VERIFIKASI PEMBAYARAN</font>
          @elseif ($bayar->status_bayar == "BATAL")
            <font color="red"> Pembayaran dinyatakan tidak SAH. Lakukan pemesanan kembali atau lewat jatuh tempo. Silahkan pesan lapangan kembali.</font>
          @endif

        </div><!-- end title -->
        <div class="row">
          <div class="col-sm-6">
            <h3> Nama Pemesan &nbsp;&nbsp; : <b>{{ $bayar->name }}</b> </h3>
            <h3> Tanggal Pesan &nbsp;&nbsp;&nbsp;&nbsp;  : <b>{{ date('d F Y | H:i:s',strtotime($bayar->created_at)) }}</b> </h3>
          </div>
          <div class="col-sm-6">
            <h3> Total Harga &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

              : <b> Rp {{ number_format($bayar->harga_bayar_asli,0,'','.') }}</b> </h3>
            <h3> Tgl Jatuh Tempo Pembayaran &nbsp;&nbsp  : <b>{{ date('d F Y | H:i:s', strtotime($bayar->tgl_jatuh_tempo_bayar)) }}</b> </h3>
          </div>
        </div>
        <hr>
          <table class="table table-bordered" >
            <thead>
              <tr>
                <th>#</th>
                <th>Nama Lapangan</th>
                <th>Hari & Tanggal Booking</th>
                <th>Jam Booking</th>
                <th>Harga</th>
              </tr>
            </thead>
            <tbody>
              @php
                $no = 1;
              @endphp
              @foreach ($checkouts as $checkout)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $checkout->nama_lapangan }}</td>
                  <td>{{ hari_ini(date('D',strtotime($checkout->tgl_tersedia))) }}, {{ date('d F Y',strtotime($checkout->tgl_tersedia)) }}</td>
                  <td>{{ $checkout->jam_tersedia }}</td>
                  <td>{{ number_format($checkout->harga_sewa_lapangan,0,'','.') }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>

          @if ($bayar->status_bayar == "BELUM UPLOAD BUKTI")
            <form class="" action="/pembayaran/ {{$bayar->id_bayar}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-sm-5">
                  <input type="file" name="bukti_bayar" value="" class="form-control" required>
                </div>
                <div class="col-sm-5">
                  <button type="submit" class="btn btn-warning">Upload Bukti Bayar</button>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                    Daftar Rekening Transfer
                  </button>
                </div>
              </div>
            </form>
          @elseif ($bayar->status_bayar == "MENUNGGU VERIFIKASI")
            <div class="col-sm-5">
              <button type="submit" class="btn btn-info" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter2">
                Lihat Bukti Pembayaran
              </button>
            </div>
          @elseif ($bayar->status_bayar == "LUNAS")
            <button  type="button" onclick="cetak()" class="btn btn-success">Cetak Pembayaran</button>
          @endif

      </div>
    </div>

    <script>
      function cetak() {
        window.print();
      }
    </script>


  <!-- Button trigger modal -->


<!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" id="exampleModalLongTitle">Daftar Rekening Transfer</h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>No Rekening</th>
                <th>Bank</th>
                <th>Pemilik</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($rekenings as $rekening)
                <tr>
                  <td>{{ $rekening->no_rekening }}</td>
                  <td>{{ $rekening->bank }}</td>
                  <td>{{ $rekening->pemilik }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <b>Perhatian : </b>  <font color="orange"> Harap Transfer sampai 3 digit terakhir agar mudah untuk diproses </font> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" id="exampleModalLongTitle">Bukti Pembayaran</h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <img src="{{ asset('img/bukti/'.$bayar->foto_bukti_bayar)}}" alt="">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
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
