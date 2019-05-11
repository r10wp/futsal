@extends('layouts.adminLayout.back_design')

@section('content')
  <section class="content-header">
    <h1>
      Formulir Tambah Postingan Blog
    </h1>

  </section>
  <form class="" action="/addBlog" method="post"  enctype="multipart/form-data">
    @csrf
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Data Blog</h3>
            </div>

            <div class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Judul Postingan</label>
                  <div class="col-sm-8">
                    <input type="text" name="judul" class="form-control" placeholder="..." required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Poster Blog</label>
                  <div class="col-sm-4">
                    <input type="file" class="form-control" name="foto_blog" required>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>

      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Isi Blog</h3>
          </div>
          <div class="form-horizontal">
            <div class="box-body">
              <textarea name="editor1"></textarea>

              <br><br>
              <div class="box-footer">
                <div class="col-md-9"></div>
                <a href="{{ url('listBlog') }}" class="btn btn-default">Kembali</a>
                <button type="submit" class="btn btn-info">Posting Blog</button>
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
