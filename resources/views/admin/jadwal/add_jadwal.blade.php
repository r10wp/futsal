@extends('layouts.adminLayout.back_design')

@section('content')
  <section class="content-header">
    <h1>
      Formulir Buat Jadwal Lapangan
    </h1>
  </section>

  <form class="" action="/addJadwal" method="post">
    @csrf

    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Buat Jadwal</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="form-horizontal">
              <div class="box-body">

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Lapangan</label>
                  <div class="col-sm-6">
                    <select class="form-control" name="lapangan" required>
                      <option value="">- Pilih Lapangan -</option>
                      @foreach ($fields as $field)
                        <option value="{{ $field->id }}">{{ $field->nama_lapangan }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Tanggal</label>
                  <div class="col-sm-4">
                    <input type="date" name="tgl" min="<?= date('Y-m-d')?>" class="form-control" required>
                  </div>
                </div>
                <div class="box-footer">
                  <button type="submit" class="btn btn-info pull-right">Buat Jadwal</button>
                </div>
              </div>
            </div>
          </div>
        </div>


        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
  </form>
@endsection
