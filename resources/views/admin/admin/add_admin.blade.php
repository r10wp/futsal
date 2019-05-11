@extends('layouts.adminLayout.back_design')

@section('content')
  <section class="content-header">
    <h1>
      Formulir Tambah Admin GAWANG
    </h1>

  </section>
  <form class="" action="/addAdmin" method="post"  enctype="multipart/form-data">
    @csrf
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Data admin</h3>
            </div>

            <div class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama Admin</label>
                  <div class="col-sm-8">
                    <input type="text" name="name" class="form-control"  required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Email Admin</label>
                  <div class="col-sm-8">
                    <input type="email" name="email" class="form-control"  required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">No Telephone</label>
                  <div class="col-sm-8">
                    <input type="text" name="tlp" class="form-control" pattern="[0-9]+"  required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-8">
                    <input type="password" name="password" class="form-control" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Foto admin</label>
                  <div class="col-sm-4">
                    <input type="file" class="form-control" name="foto" required>
                  </div>
                </div>


                <div class="box-footer">
                  <button type="submit" class="btn btn-primary pull-right" name="button">Save Data</button>
                </div>

              </div>
            </div>
          </div>
        </div>


    </div>
      <!-- /.row -->
    </section>
  </form>
@endsection
