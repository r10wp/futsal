@extends('layouts.adminLayout.back_design')

@section('content')
  <section class="content-header">
    <h1>
      Data Rekening GAWANG
    </h1>

  </section>
  <form class="" action="/rekening" method="post"  enctype="multipart/form-data">
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

                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $rek->no_rekening }}</td>
                    <td>{{ $rek->bank }}</td>
                    <td>{{ $rek->pemilik }}</td>
                    <td><a href="{{ url('editRekening/'.$rek->id) }}" class="btn btn-success btn-sm"> Pilih</a> </td>
                  </tr>
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
                    <input type="text" name="rek" class="form-control" placeholder="..." required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Nama Bank</label>
                  <div class="col-sm-8">
                    <input type="text" name="bank" class="form-control" placeholder="..." required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Atas Nama</label>
                  <div class="col-sm-8">
                    <input type="text" name="pemilik" class="form-control" placeholder="..." required>
                  </div>
                </div>

              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Tambah Rekening</button>
              </div>
            </div>
          </div>
        </div>


    </div>
      <!-- /.row -->
    </section>
  </form>
@endsection
