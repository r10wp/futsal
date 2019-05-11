@extends('layouts.adminLayout.back_design')

@section('content')

  <section class="content-header">
    <h1>
      Formulir Atur Waktu Penyewaan
    </h1>
  </section>  <section class="content">
  <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="row">
                <div class="col-md-5">

                </div>
                {{ $tgls->links() }}
              </div>
              <!-- /.box-header -->
              <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                  <tbody>
                    <tr>
                      <th align="left">Hari Main</th>
                      <th>Tgl</th>
                      <th>Lapangan</th>
                      <th>Jumlah Jadwal</th>
                      <th>Action</th>
                    </tr>
                    @php
                      $data = [];
                    @endphp
                    @foreach( $tgls as $tgl)
                      <tr>
                        @if (in_array($tgl->tgl_tersedia, $data))
                          <td></td>
                          <td></td>
                          <td>{{ $tgl->nama_lapangan }}</td>
                          <td>{{ $hitung_jadwal = \DB::table('schedule')->where(['tgl_id' => $tgl->joing_tgl_id])
                            ->join('tgl_lapangan','tgl_lapangan.id','=','schedule.tgl_id')
                            ->join('field','field.id','=','tgl_lapangan.field_id')
                            ->count() }}</td>
                          <td>
                            {{-- <a href="#my_modal" data-toggle="modal" data-book-id="my_id_value">Open Modal</a> --}}
                            {{-- <a href="#" class="btn btn-primary btn-sm">Tambah Jadwal</a> --}}
                            {{-- <a href="#" class="btn btn-success btn-sm">Edit</a> --}}
                            <a href="{{ url('detailJadwalLapangan/'.$tgl->joing_tgl_id) }}" class="btn btn-info btn-sm">Lihat Detail</a>
                            @if ($hitung_jadwal == 0)

                              <a href="#" onclick="return delJadwal({{ $tgl->joing_tgl_id }})" class="btn btn-danger btn-sm">Hapus</a>
                            @endif
                          </td>
                        @else
                          <td>{{ hari_ini(date('D',strtotime($tgl->tgl_tersedia))) }}</td>
                          <td>{{ date('d F Y',strtotime($tgl->tgl_tersedia)) }}</td>
                          <td>{{ $tgl->nama_lapangan }}</td>
                          <td>{{ $hitung_jadwal = \DB::table('schedule')->where(['tgl_id' => $tgl->joing_tgl_id])
                            ->join('tgl_lapangan','tgl_lapangan.id','=','schedule.tgl_id')
                            ->join('field','field.id','=','tgl_lapangan.field_id')
                            ->count() }}</td>
                          <td>
                            {{-- <a href="#my_modal" data-toggle="modal" data-book-id="my_id_value">Open Modal</a> --}}
                            {{-- <a href="#" class="btn btn-primary btn-sm">Tambah Jadwal</a> --}}
                            {{-- <a href="#" class="btn btn-success btn-sm">Edit</a> --}}
                            <a href="{{ url('detailJadwalLapangan/'.$tgl->joing_tgl_id) }}" class="btn btn-info btn-sm">Lihat Detail</a>
                            @if ($hitung_jadwal == 0)

                              <a href="#" onclick="return delJadwal({{ $tgl->joing_tgl_id }})" class="btn btn-danger btn-sm">Hapus</a>
                            @endif
                          </td>

                          @php
                            array_push($data,$tgl->tgl_tersedia);
                          @endphp
                        @endif
                      </tr>
                    @endforeach
                </tbody>
              </table>

              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
        </div>
      </section>



<div class="modal" id="my_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title">Modal header</h4>
      </div>
      <div class="modal-body">
        <p>some content</p>
        <input type="text" name="bookId" value=""/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
