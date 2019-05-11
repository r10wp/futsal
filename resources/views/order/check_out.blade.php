@extends('layouts.frontLayout.front_design')

@section('content')

  <div id="services" class="parallax section">
    <div class="container">
      <div class="section-title text-center">
        <h3>Keranjang Checkout</h3>
      </div><!-- end title -->
      <form class="" action="/proses_checkout" method="post">
        @csrf
        @php $check_temp = \DB::table('pemesanan_temp')->where(['user_id' => \Session::get('user_id')])->count() @endphp
        @php $mails = \DB::table('users')->where(['id' => \Session::get('user_id')])->get() @endphp

        @foreach ($mails as $mail)
          <input type="hidden" name="mail" value="{{ $mail->email}}">
        @endforeach

        @if ($check_temp > 0)


        <?php
          $kode = null;
          $bayar_asli=0; $no = 1; $id = null;
          foreach ($bayars as $bayar) {
            $kode =  $bayar->kode_bayar;
            $id = $bayar->id;
          }
          if ($kode == null) {
            $kode = 0 ;
            if ($id != null) {
              // echo "string";
              $id = $bayar->id;
            }

          }
        ?>
        <input type="hidden" name="kode_unik" value="{{ $kode+1 }}" readonly>
        <input type="hidden" name="kode_page_bayar" value="{{ $id+1 }}" readonly>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>#</th>
              <th>Nama Lapangan</th>
              <th>Hari & Tanggal Booking</th>
              <th>Jam Booking</th>
              <th>Hapus</th>
              <th>Harga</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($orders_temps as $order_temp)
              <input type="hidden" name="set[]" value="{{ $order_temp->schedule_id}}">
              <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $order_temp->nama_lapangan }}</td>
                <td>
                  {{ hari_ini(date('D',strtotime($order_temp->tgl_tersedia))) }},
                  {{ date('d F Y',strtotime($order_temp->tgl_tersedia)) }}
                </td>
                <td>{{ $order_temp->jam_tersedia }}</td>
                <td>
                  <a href="#" onclick="return theFunction({{ $order_temp->id }});" data-id=""> <i class="fa fa-trash" style="color: red;"> Hapus</i></a>
                </td>
                <td>Rp {{ number_format($order_temp->harga_sewa_lapangan,0,'','.') }}</td>
              </tr>
              <?php
                $bayar_asli = $order_temp->harga_sewa_lapangan + $bayar_asli;
               ?>
            @endforeach
            <tr>
             <td colspan="5"><b>Total Harga Pemesanan</b></td>
             <td><b> Rp {{ number_format($bayar_asli,0,'','.') }} </b></td>

            </tr>
          </tbody>
        </table>
        <input type="hidden" name="bayar_asli" value="{{ $bayar_asli}}">

        @if ($bayar_asli == null OR $bayar_asli == 0)
          <a class="btn btn-success btn-lg" href="{{ url('/fields') }}">
            <font color="white">
            <i class="fa fa-chalkboard-teacher"></i>
              Lihat Lapangan </font>
          </a>
        @else
          <button type="submit" name="button" class="btn btn-info btn-lg">
            <i class="fa fa-shopping-cart"></i> checkout
          </button>
        @endif

        @else
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Nama Lapangan</th>
                <th>Hari & Tanggal Booking</th>
                <th>Jam Booking</th>
                <th>Hapus</th>
                <th>Harga</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td colspan="6"><b>Belum Ada Order</b></td>
              </tr>
              <tr>
                <td colspan="5"><b>Total Harga Pemesanan</b></td>
                <td>Rp 0, 00</td>


              </tr>

            </tbody>
          </table>
        @endif
      </form>
    </div>
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
