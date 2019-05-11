@extends('layouts.frontLayout.front_design')

@section('content')
  <div id="services" class="parallax section">
    <div class="container">
      <div class="section-title text-center">
        <h3>Daftar Transaksi</h3>
      </div><!-- end title -->

      <div class="row">
        <div class="col-md-12">
          @if (count($bayars) == null)
            <hr>
            <div class="section-title text-center">
                <h2><font color="orange"> Belum Memiliki Transaksi / Pemesanan </font></h2>
            </div><!-- end title -->
            <br><br><br><br>
          @else
          <table id="table-original" class="cell-border" style="width:105%">
            <thead>
              <tr>
                <th>Kode Transaksi</th>
                <th>Jumlah Tagihan</th>
                <th>Tgl Sewa</th>
                <th>Tgl Jatuh Tempo</th>
                <th>Keterangan</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($bayars as $bayar)
                  <tr>
                      <td>{{ $bayar->kode_bayar }}</td>
                      <td>Rp {{ number_format($bayar->harga_bayar_asli,0,'','.') }}</td>
                      <td>{{ date('d F Y',strtotime($bayar->created_at)) }}</td>
                      <td>{{ date('d F Y | H:i:s',strtotime($bayar->tgl_jatuh_tempo_bayar)) }}</td>
                      <td>
                        @if ($bayar->status_bayar == "BELUM UPLOAD BUKTI")
                         <font color="orange">  {{ $bayar->status_bayar }} BAYAR</font>
                        @elseif ($bayar->status_bayar == "MENUNGGU VERIFIKASI")
                          <font color="orange">  {{ $bayar->status_bayar }}</font>
                        @elseif ($bayar->status_bayar == "BATAL")
                          <font color="red"> PEMBAYARAN TIDAK SAH</font>
                        @elseif ($bayar->status_bayar == "LUNAS")
                          <font color="blue">  {{ $bayar->status_bayar }}</font>
                        @endif
                      </td>
                      <td> <a href="{{ url('pembayaran/'.$bayar->id) }}" class="btn btn-info"> Lihat Detail</a> </td>
                  </tr>
                @endforeach


            </tbody>
            <tfoot>
              <tr>
                <th>Kode Transaksi</th>
                <th>Jumlah Tagihan</th>
                <th>Harga Sewa</th>
                <th>Tanggal Pemesanan</th>
                <th>Keterangan</th>
                <th>Action</th>
              </tr>
            </tfoot>
          </table>
            @endif
        </div>
      </div>
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
