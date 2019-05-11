@extends('layouts.adminLayout.back_design')

@section('content')
  <section class="content-header">
    <h1>
      Daftar Lapangan Yang Ada
    </h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          {{-- <div class="box-header">
            <h3 class="box-title">Responsive Hover Table</h3>
            <div class="box-tools">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
                <div class="input-group-btn">
                  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </div>
              </div>
            </div>
          </div> --}}
          <!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <tbody><tr>
                {{-- <th>ID</th> --}}
                <th>Nama Lapangan</th>
                <th>Harga Lapangan</th>
                <th>Foto Lapangan</th>
                <th>Tgl Buat</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
              <?php $no = 1 ?>
                @foreach ($fields as $field)
                  <tr>
                    {{-- <td>{{ $no++ }}</td> --}}
                    <td>{{ $field->nama_lapangan }}</td>
                    <td>{{ $field->harga_lapangan }}</td>
                    <td><img src="{{ asset('img/lapangan/'.$field->foto_lapangan_utama) }}" alt="" style="height:60px"></td>
                    <td>{{ date('d F Y, H:i:s ',strtotime($field->created_at)) }}</td>
                    <td>
                      @if ($field->status_lapangan == "BUKA")
                        <span class="label label-success">Tampil</span>
                      @else
                        <span class="label label-warning">Tidak Tampil</span>
                      @endif
                    </td>
                    <td>
                      <a href="{{ url('editLapangan/'.$field->id) }}" class="btn btn-primary btn-sm"> Edit </a>
                      <a href="#" onclick="return delLapangan({{ $field->id }})" class="btn btn-danger btn-sm"> Hapus </a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        {{ $fields->links() }}
        <!-- /.box -->
      </div>
    </div>
  </section>
@endsection
