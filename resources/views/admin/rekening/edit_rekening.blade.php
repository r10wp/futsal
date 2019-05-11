@extends('layouts.adminLayout.back_design')

@section('content')
  @foreach ($details as $detail)
  <section class="content-header">
    <h1>
      Data Rekening GAWANG
    </h1>
  </section>
  <form class="" action="/editRekening/{{ $detail->id }}" method="post"  enctype="multipart/form-data">
    @csrf
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Daftar Rekening</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tbody>
                  <tr>
                  <th>#</th>
                  <th>Nomor Rekening</th>
                  <th>Nama Bank</th>
                  <th>Atas Nama</th>
                  <th>Select</th>
                </tr>
                @php
                  $no = 1;
                @endphp
                @foreach ($reks as $rek)
                  @if ($rek->id == $detail->id)
                    <tr>
                      <td>{{ $no++ }}</td>
                      <td>{{ $rek->no_rekening }}</td>
                      <td>{{ $rek->bank }}</td>
                      <td>{{ $rek->pemilik }}</td>
                      <td><span class="label label-success">Selected</span> </td>
                    </tr>
                  @else
                    <tr>
                      <td>{{ $no++ }}</td>
                      <td>{{ $rek->no_rekening }}</td>
                      <td>{{ $rek->bank }}</td>
                      <td>{{ $rek->pemilik }}</td>
                      <td><a href="{{ url('editRekening/'.$rek->id) }}" class="btn btn-info btn-sm"> Pilih</a> </td>
                    </tr>
                  @endif

                @endforeach

              </tbody>
            </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                {{ $reks->links() }}
              </ul>
            </div>
          </div>
          <!-- /.box -->


          <!-- /.box -->
        </div>
        <!-- left column -->
        <div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Rekening</h3>
            </div>

            <div class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Nomor Rekening</label>
                  <div class="col-sm-8">
                    <input type="text" name="rek" class="form-control" value="{{ $detail->no_rekening }}" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Nama Bank</label>
                  <div class="col-sm-8">
                    <input type="text" name="bank" class="form-control" value="{{ $detail->bank }}" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Atas Nama</label>
                  <div class="col-sm-8">
                    <input type="text" name="pemilik" class="form-control" value="{{ $detail->pemilik }}" required>
                  </div>
                </div>

              </div>
              <div class="box-footer">
                <a href="{{ url('deleteRekening/'.$detail->id) }}" class="btn btn-danger"> Hapus Rekening </a>
                <button type="submit" class="btn btn-info pull-right">Simpan Perubahan </button>
              </div>
            </div>
          </div>
        </div>


    </div>
      <!-- /.row -->
    </section>
  </form>
  @endforeach
@endsection
