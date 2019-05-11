@extends('layouts.adminLayout.back_design')

@section('content')
  <section class="content-header">
    <h1>
      Formulir Edit Lapangan
    </h1>

  </section>
  @foreach ($blogs as $blog)
    <form class="" action="/editBlog/{{ $blog->id }}" method="post"  enctype="multipart/form-data">
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
                      <input type="text" name="judul" class="form-control" value="{{ $blog->judul }}" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Poster Blog</label>
                    <div class="col-sm-4">
                      <input type="file" class="form-control" name="foto_blog">
                    </div>
                    <div class="col-sm-4">
                      <img src="{{ asset('img/blog/'.$blog->blog_photo) }}" alt="" style="height:100px;weight:150px">
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
                <textarea name="editor1">{{ $blog->isi }}</textarea>

                <br><br>
                <div class="box-footer">
                  <div class="col-md-9">
                    <select class="form-control" name="">
                      <option value="SHOW">TAMPILKAN</option>
                      <option value="HIDDEN">SEMBUNYIKAN</option>
                    </select>
                  </div>
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
  @endforeach
@endsection
