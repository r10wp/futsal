@extends('layouts.adminLayout.back_design')

@section('content')
  <section class="content-header">
    <h1>
      Daftar Admin Gawang
    </h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <a href="{{ url('addAdmin')}}" class="btn btn-primary pull-right" name="button">Add Admin</a>
        <hr>
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
                <th>ID</th>
                <th>Nama</th>
                <th>Foto Postingan</th>
                <th>Tgl Buat</th>
                <th>Email</th>
                <th>Action</th>
              </tr>
              <?php $no = 1 ?>
                @foreach ($admins as $admin)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $admin->name }}</td>
                    <td><img src="{{ asset('img/admin/'.$admin->photo) }}" alt="" style="height:100px"></td>
                    <td>{{ date('d F Y, H:i:s ',strtotime($admin->created_at)) }}</td>
                    <td><span class="label label-success">{{ $admin->email }}</span></td>
                    <td>
                      <a href="{{ url('editAdmin/'.$admin->id) }}" class="btn btn-primary btn-sm"> Edit </a>
                      @if ($no != 2)
                        <a href="#" onclick="return delAdmin({{ $admin->id }})" class="btn btn-danger btn-sm"> Hapus </a>
                      @endif
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        {{ $admins->links() }}
        <!-- /.box -->
      </div>
    </div>
  </section>
@endsection
