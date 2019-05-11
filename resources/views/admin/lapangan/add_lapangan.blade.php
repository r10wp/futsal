@extends('layouts.adminLayout.back_design')

@section('content')
  <section class="content-header">
    <h1>
      Formulir Tambah Lapangan
    </h1>

  </section>
  <form class="" action="/addLapangan" method="post"  enctype="multipart/form-data">
    @csrf
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-7">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Data Lapangan</h3>
            </div>

            <div class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama Lapangan</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" placeholder="...">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Harga</label>
                  <div class="col-sm-4">
                    <input type="text" name="harga" class="form-control" placeholder="Rupiah" pattern="[0-9]+">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label"></label>
                  <div class="col-sm-8">
                    <span>Harga hanya untuk tampilan bukan harga sebenarnya. </span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" name="alamat" placeholder="Alamat"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Deskripsi</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" name="deskripsi" placeholder="Ketikkan deskripsi lapangan ..." rows="5"></textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-5">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Foto Lapangan</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Utama</label>
                  <div class="col-sm-8">
                    <input type="file" class="form-control" name="foto_utama" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Detail 1</label>
                  <div class="col-sm-8">
                    <input type="file" class="form-control" name="foto_1">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Detail 2</label>
                  <div class="col-sm-8">
                    <input type="file" class="form-control" name="foto_2">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Detail 3</label>
                  <div class="col-sm-8">
                    <input type="file" class="form-control" name="foto_3">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Detail 4</label>
                  <div class="col-sm-8">
                    <input type="file" class="form-control" name="foto_4">
                  </div>
                </div>

              </div>
              <!-- /.box-body -->

              <!-- /.box-footer -->
            </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-info pull-right">Simpan Data</button>
            </div>
          </div>

          <!-- /.box -->
          <!-- general form elements disabled -->

          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
  </form>
@endsection
