<aside class="main-sidebar" style="padding-top:0px !Important">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ asset('img/admin/'.\Session::get('foto')) }}" class="img-circle" alt="User Image" style="height:60px">
      </div>
      <div class="pull-left info">
        <p>{{ \Session::get('nama')}}</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->

    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li>
        <a href="{{ url('dashboard') }}">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-sign-in"></i>
          <span>Pemesanan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ url('listPemesananWait') }}"><i class="fa fa-circle-o"></i> Menunggu Konfirmasi</a></li>
          <li><a href="{{ url('listPemesananCancel') }}"><i class="fa fa-circle-o"></i> Batal</a></li>
          <li><a href="{{ url('listPemesananDone') }}"><i class="fa fa-circle-o"></i> Selesai</a></li>
          <li><a href="{{ url('listPemesanan') }}"><i class="fa fa-circle-o"></i> Semua Pemesanan</a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-calendar"></i>
          <span>Jadwal Lapangan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ url ('addJadwal') }}"><i class="fa fa-circle-o"></i> Buat Jadwal </a></li>
          <li><a href="{{ url ('listJadwal') }}"><i class="fa fa-circle-o"></i> List Jadwal </a></li>
        </ul>
      </li>

      <li>
        <a href="{{ url ('listUser') }}">
          <i class="fa fa-users"></i>Member
        </a>
      </li>

      <li class="header">MASTER WEBSITE</li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-soccer-ball-o "></i>
          <span>Lapangan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            {{-- <span class="label label-primary pull-right">4</span> --}}
          </span>

        </a>
        <ul class="treeview-menu">
          <li><a href="{{ url ('addLapangan') }}"><i class="fa fa-circle-o"></i> Buat Lapangan Baru</a></li>
          <li><a href="{{ url ('listLapangan') }}"><i class="fa fa-circle-o"></i> List Lapangan</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-edit"></i> <span>Blog</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ url('addBlog') }}"><i class="fa fa-circle-o"></i> Buat Blog </a></li>
          <li><a href="{{ url('listBlog') }}"><i class="fa fa-circle-o"></i> List Blog </a></li>
        </ul>
      </li>
      <li>
        <a href="{{ url ('rekening') }}">
          <i class="fa fa-credit-card"></i>Rekening
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-cogs"></i> <span>Settings</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ url('listAdmin') }}"><i class="fa fa-circle-o"></i> List Admin </a></li>
        </ul>
      </li>
      <li class="header">TAMBAHAN</li>
      {{-- <li><a href="{{ url('adminProfile') }}"><i class="fa fa-user"></i> <span>Admin Profile</span></a></li> --}}
      <li><a href="{{ url('logout') }}"><i class="fa fa-power-off"></i> <span>Log Out</span></a></li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
