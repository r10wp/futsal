@extends('layouts.adminLayout.back_design')

@section('content')
  <section class="content-header">
    <h1>
      Daftar Member
    </h1>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <!-- /.box-header -->
          <div class="box-body">
            <table id="table-original" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Nama Member</th>
                <th>Nama Lengkap</th>
                <th>Email</th>
                <th>No Tlp</th>
                <th>Status</th>
                <th>Detail</th>
                <th>Suspend</th>
              </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)
                  <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->fullname }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->no_tlp }}</td>
                    <td>{{ $user->status_user }}</td>
                    <td>
                      <a href="{{ url('detailMember/'.$user->id) }}" class="btn btn-info btn-sm">Detail</a>
                    </td>
                    <td>
                    @if ($user->status_user == "AKTIF")
                      <a href="{{ url('suspendMember/'.$user->id) }}" class="btn btn-danger btn-sm">Suspend Member</a>
                    @else
                      <a href="{{ url('unsuspendMember/'.$user->id) }}" class="btn btn-warning btn-sm">Buka Suspend</a>
                    @endif

                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>



@endsection
