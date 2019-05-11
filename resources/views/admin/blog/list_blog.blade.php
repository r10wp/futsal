@extends('layouts.adminLayout.back_design')

@section('content')
  <section class="content-header">
    <h1>
      Daftar Event / Blog Yang Ada
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
                <th>Judul</th>
                <th>Foto Postingan</th>
                <th>Tgl Buat</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
              <?php $no = 1 ?>
                @foreach ($blogs as $blog)
                  <tr>
                    {{-- <td>{{ $no++ }}</td> --}}
                    <td>{{ $blog->judul }}</td>
                    <td><img src="{{ asset('img/blog/'.$blog->blog_photo) }}" alt="" style="height:60px"></td>
                    <td>{{ date('d F Y, H:i:s ',strtotime($blog->created_at)) }}</td>
                    <td>
                      @if ($blog->status_posting == "SHOW")
                        <span class="label label-success">Tampil</span>
                      @else
                        <span class="label label-warning">Tidak Tampil</span>
                      @endif
                    </td>
                    <td>
                      <a href="{{ url('editBlog/'.$blog->id) }}" class="btn btn-primary btn-sm"> Edit </a>
                      <a href="#" onclick="return delBlog({{ $blog->id }})" class="btn btn-danger btn-sm"> Hapus </a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        {{ $blogs->links() }}
        <!-- /.box -->
      </div>
    </div>
  </section>
@endsection
