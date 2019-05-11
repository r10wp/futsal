@extends('layouts.adminLayout.back_design')

@section('content')
    <!-- Content Wrapper. Contains page content -->

      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Dashboard
          <small>Gawang</small>
        </h1>
      </section>

      <!-- Main content -->
      <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h3>{{ $wait_order }}</h3>
                <p>Pesanan Masuk</p>
              </div>
              <div class="icon">
                <i class="fa fa-info-circle"></i>
              </div>
              <a href="{{ url('listPemesananWait') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <h3>{{ $sukses_order }}</h3>
                <p>Pesanan Sukses</p>
              </div>
              <div class="icon">
                <i class="fa fa-check-square-o"></i>
              </div>
              <a href="{{ url('listPemesananDone') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
                <h3>{{ $j_field }}</h3>
                <p>Jumlah Lapangan</p>
              </div>
              <div class="icon">
                <i class="fa fa-soccer-ball-o"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3>{{ $j_member }}</h3>

                <p>Jumlah Member</p>
              </div>
              <div class="icon">
                <i class="fa fa-group"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">

          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
            <div class="box box-primary">
              <div class="box-header">
                <i class="ion ion-clipboard"></i>

                <h3 class="box-title">Jadwal Lapangan Hari Ini {{ date('d F Y ') }}</h3>

                <div class="box-tools pull-right">
                  <ul class="pagination pagination-sm inline">
                    <li>{{ $jadwals->links() }}</li>

                  </ul>
                </div>
              </div>
              <br>
              <!-- /.box-header -->
              <div class="box-body">
                <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
                <ul class="todo-list">
                  @foreach ($jadwals as $jadwal)

                    <li>
                      <!-- drag handle -->
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                      <!-- todo text -->
                      <span class="text">{{ $jadwal->nama_lapangan}}</span> -
                      <span class="text">{{ $jadwal->jam_tersedia}}</span>
                      <!-- Emphasis label -->
                      @if ($jadwal->tersedia == "BOOKED")
                        <small class="label label-success"><i class="fa fa-clock-o"></i> Booked</small>
                      @elseif($jadwal->tersedia == "YA")
                        <small class="label label-info"><i class="fa fa-clock-o"></i> Tersedia </small>
                      @elseif($jadwal->tersedia == "TIDAK")
                        <small class="label label-danger"><i class="fa fa-clock-o"></i> Disembunyaikan</small>
                      @else
                        <small class="label label-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
                      @endif
                      <!-- General tools such as edit or delete-->
                      <div class="tools">
                        <a href="{{ url('detailJadwalLapangan/'.$jadwal->tgl_id) }}">

                          <i class="fa fa-edit"></i>
                        </a>
                      </div>
                    </li>
                  @endforeach

                </ul>
              </div>
            </div>
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">

            <!-- Map box -->

            <!-- /.box -->

            <!-- Calendar -->
            <div class="box box-solid bg-green-gradient">
              <div class="box-header">
                <i class="fa fa-calendar"></i>

                <h3 class="box-title">Calendar</h3>
                <!-- tools box -->
                <div class="pull-right box-tools">
                  <!-- button with a dropdown -->
                  <div class="btn-group">
                    <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                      <i class="fa fa-bars"></i></button>
                    <ul class="dropdown-menu pull-right" role="menu">
                      <li><a href="#">Add new event</a></li>
                      <li><a href="#">Clear events</a></li>
                      <li class="divider"></li>
                      <li><a href="#">View calendar</a></li>
                    </ul>
                  </div>
                  <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                  </button>
                </div>
                <!-- /. tools -->
              </div>
              <!-- /.box-header -->
              <div class="box-body no-padding">
                <!--The calendar -->
                <div id="calendar" style="width: 100%"></div>
              </div>
              <!-- /.box-body -->

            </div>
            <!-- /.box -->

          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->

      </section>
      <!-- /.content -->

    <!-- /.content-wrapper -->


@endsection
