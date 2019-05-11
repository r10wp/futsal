@extends('layouts.adminLayout.back_design')

@section('content')
  <section class="content-header">
    <h1>
      Formulir Verifikasi Pesanan
    </h1>

  </section>
  @foreach ($bayars as $bayar)
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->

          <div class="row">
            <div class="col-md-6">
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Detail Pesanan</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div class="form-horizontal">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Nama Pemesan</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" value="{{ $bayar->name }}" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Total Harga</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" value="{{ $bayar->harga_bayar_asli }}" readonly>
                      </div>
                    </div>
                    @if ($bayar->tgl_bayar != null)
                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label"> Tgl Bayar </label>
                        <div class="col-sm-5">
                          <input type="text" value="{{ date('d F Y | H:i:s', strtotime($bayar->tgl_bayar)) }}" class="form-control" readonly>
                        </div>
                      </div>
                    @else
                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label"> Tgl Bayar </label>
                        <div class="col-sm-5">
                          <font color="red">Belum Melakukan Upload Bukti Bayar</font>
                        </div>
                      </div>
                    @endif


                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Tgl Jatuh Tempo</label>
                      <div class="col-sm-5">
                        <input type="text" value="{{ date('d F Y | H:i:s', strtotime($bayar->tgl_jatuh_tempo_bayar)) }}" class="form-control" readonly>
                      </div>
                    </div>

                  </div>
                </div>

              </div>
            </div>

            <div class="col-md-6">
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Detail Pesanan</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="" action="/accBayar/{{ $bayar->id_bayar }}" method="post" >
                  @csrf
                  <input type="hidden" name="mail" value="{{ $bayar->email }}">
                  <input type="hidden" name="nama_pemesan" value="{{ $bayar->name }}">
                  <div class="form-horizontal">
                    <div class="box-body">
                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Nomor Pesanan</label>
                        <div class="col-sm-4">
                          <input type="text" name="kode_pembayaran" class="form-control" value="{{ $bayar->kode_bayar }}" {{ ($bayar->status_bayar == 'LUNAS' || $bayar->status_bayar == 'BATAL') ? 'readonly' : '' }} >
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Bukti Bayar</label>
                        <div class="col-sm-4">
                          <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                            Lihat Bukti Bayar
                          </button>
                        </div>
                      </div>
                      @if ($bayar->status_bayar != "LUNAS")
                        @if ($bayar->status_bayar != "BATAL")
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-3 control-label">Verfikasi</label>
                          <br>
                          <div class="col-sm-2">
                            <input type="radio" name="verifikasi" value="LUNAS" required> Terima
                          </div>

                          <div class="col-sm-3">
                            <input type="radio" name="verifikasi" value="BATAL" required> Batalkan
                          </div>
                        </div>
                        @endif
                      @endif
                      @if ($bayar->status_bayar == "LUNAS")
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-3 control-label">Status</label>
                          <div class="col-sm-4">
                            <font color="blue"> Pembayaran Lunas</font>
                          </div>
                        </div>
                      @elseif ($bayar->status_bayar == "BATAL")
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-3 control-label">Status</label>
                          <div class="col-sm-5">
                            <font color="red"> Pemesanan Ditolak</font>
                          </div>
                        </div>
                      @endif
                    </div>
                  </div>
                  @if ($bayar->status_bayar != "LUNAS")
                    @if ($bayar->status_bayar != "BATAL")
                      <div class="box-footer">
                        @if ($bayar->tgl_jatuh_tempo_bayar < date('Y-m-d H:i:s'))
                          @if ($bayar->tgl_jatuh_tempo_bayar < $bayar->tgl_bayar)

                            <span class="label label-danger" style="font-size:14px">  sudah lewat dari tanggal jatuh tempo </span>
                          @endif
                        @endif
                        <button type="submit" class="btn btn-info pull-right">Verfikasi Pembayaran</button>
                      </div>
                    @endif
                  @endif
                </div>
              </div>
            </div>
          </form>

          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Daftar Lapangan Yang Dipesan</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box">

            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
                  <th>#</th>
                  <th>Nama Lapangan</th>
                  <th>Harga (Rp)</th>
                  <th>Jam yang di pesan</th>
                  <th>Hari</th>
                  <th>Tgl</th>
                </tr>
                @php
                  $no = 1;
                @endphp
                @foreach ($list_pesans as $pesan)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $pesan->nama_lapangan }}</td>
                    <td>{{ number_format($pesan->harga_sewa_lapangan,0,'','.') }}</td>
                    <td>{{ $pesan->jam_tersedia }}</td>
                    <td>{{ hari_ini(date('D',strtotime($pesan->tgl_tersedia))) }}</td>
                    <td>{{ date('d F Y',strtotime($pesan->tgl_tersedia)) }}</td>
                  </tr>
                @endforeach

              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>

          </div>

        </div>


        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>

    <div class="modal fade" id="modal-default" style="display: none;">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span></button>
            <h4 class="modal-title">Bukti Upload Pembayaran</h4>
          </div>
          <div class="modal-body">
            @if ($bayar->foto_bukti_bayar == null)
              <font color="orange">Pengguna Belum Upload Bukti Bayar</font>
            @else
              <img src="{{ asset('img/bukti/'.$bayar->foto_bukti_bayar) }}" alt="">
            @endif
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
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
