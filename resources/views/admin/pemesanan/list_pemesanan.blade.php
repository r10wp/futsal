@extends('layouts.adminLayout.back_design')

@section('content')
  <section class="content-header">
    <h1>
      Daftar Pemesanan
    </h1>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <!-- /.box-header -->
          <div class="box-body">
            <table id="table-search" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Kode Bayar</th>
                <th>Tgl Pesan</th>
                <th>Nama Pemesan</th>
                <th>Harga Bayar</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
                @foreach ($orders as $order)

                  <tr>
                    <td>{{ $order->kode_bayar }}</td>
                    <td>{{ date('d F Y',strtotime($order->created_at)) }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->harga_bayar_asli }}</td>
                    <td>
                      @if ($order->status_bayar == "BELUM UPLOAD BUKTI" )
                        @if (date('Y-m-d H:i:s') > $order->tgl_jatuh_tempo_bayar)
                          <a href="{{ url('accBayar/'.$order->id_bayar) }}" class="btn btn-danger btn-sm">Kadaluarsa</a>
                        @else
                          <a href="{{ url('accBayar/'.$order->id_bayar) }}" class="btn btn-default btn-sm">Belum Upload Bukti</a>
                        @endif
                      @elseif ($order->status_bayar == "MENUNGGU VERIFIKASI")
                        @if (date('Y-m-d H:i:s') > $order->tgl_jatuh_tempo_bayar)
                          <a href="{{ url('accBayar/'.$order->id_bayar) }}" class="btn btn-danger btn-sm">Segera Verifikasi</a>
                        @else
                          <a href="{{ url('accBayar/'.$order->id_bayar) }}" class="btn btn-warning btn-sm">Segera Verifikasi</a>
                        @endif
                      @elseif ($order->status_bayar == "BATAL")
                        {{-- <a href="{{ url('accBayar/'.$order->id_bayar) }}" class="btn btn-warning btn-sm">Verfikasi Ulang</a> --}}
                        <a href="{{ url('accBayar/'.$order->id_bayar) }}" class="btn btn-danger btn-sm">Batalkan</a>
                      @elseif ($order->status_bayar == "LUNAS")
                        <a href="{{ url('accBayar/'.$order->id_bayar) }}" class="btn btn-info btn-sm">Lunas</a>
                      @endif
                    </td>
                  </tr>
                @endforeach

              </tbody>

            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
@endsection
