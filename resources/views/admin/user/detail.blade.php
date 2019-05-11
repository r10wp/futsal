@extends('layouts.adminLayout.back_design')

@section('content')
  <section class="content-header">
    <h1>
      Detail Member
    </h1>
  </section>
  @foreach ($users as $user)

    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{ asset('img/member/'.$user->photo)}}" alt="User profile picture">
              <h3 class="profile-username text-center">{{ $user->name }}</h3>
              <p class="text-muted text-center">Member Gawang</p>

              <ul class="list-group list-group-unbordered">

                <li class="list-group-item">
                  <b>Total Transksi</b> <a class="pull-right">{{ $total_transaksi }}</a>
                </li>
                <li class="list-group-item">
                  <b>Tgl Gabung</b> <a class="pull-right">{{ $user->created_at }}</a>
                </li>
                <li class="list-group-item">
                  <b>Status</b> <a class="pull-right">{{ $user->status_user }}</a>
                </li>
              </ul>
              @if ($user->status_user == "AKTIF")

                <a href="{{ url('suspendMember/'.$user->id)}}" class="btn btn-danger btn-block"><b>Suspend</b></a>
              @else
                <a href="{{ url('unsuspendMember/'.$user->id)}}" class="btn btn-warning btn-block"><b>Buka Suspend</b></a>
              @endif
            </div>

          </div>
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <div class="tab-content">
              <div class="tab-pane active" id="settings">
                <div class="form-horizontal">

                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Nama Lengkap</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="{{ $user->fullname }}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="{{ $user->email }}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">No Telephone</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="{{ $user->no_tlp }}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Alamat</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" >{{ $user->alamat }}</textarea>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->


  </section>
  @endforeach



@endsection
