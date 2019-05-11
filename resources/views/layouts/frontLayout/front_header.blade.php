<div class="top-bar">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-sm-6"></div>
			<div class="col-md-6 col-sm-6">
				<div class="left-top">
					<div class="email-box">
						<a href="#"><i class="fa fa-envelope" aria-hidden="true"></i> futsalarung@gmail.com </a>
					</div>
					<div class="phone-box">
						<a href="tel:1234567890"><i class="fa fa-phone" aria-hidden="true"></i> +1 234 567 890</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<header class="header header_style_01">
  <nav class="megamenu navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <div class="navbar-header">


					<?php if (\Session::get('role') == 'user') { ?>
						<a class="navbar-brand" href="#"><img src="{{ asset('img/member/'.\Session::get('foto'))}}" alt="image" style="height:85px;weight:65px"></a>
					<?php }	?>

          <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse" id="navbar">
          <ul class="navbar-nav ml-auto">
            <li><a href="{{ ('/') }}">Home</a></li>
						<li><a href="{{ ('/about') }}">Tentang Kami</a></li>
						<?php if (\Session::get('role') != 'user') { ?>
							<li><a href="#" data-toggle="modal" data-target="#exampleModal">Login</a></li>
							<li><a href="{{ url('page-login') }}">Daftar Baru</a></li>
						<?php	}elseif (\Session::get('role') == 'user') { ?>
							<li><a href="{{ ('/fields') }}">Pesan Lapangan</a></li>
							<li><a href="{{ url('/blogs') }}">Event</a></li>
							@php $check_temp = \DB::table('pemesanan_temp')->where(['user_id' => \Session::get('user_id')])->count() @endphp
							<li><a href="{{ url('checkout')}}">Checkout
								@if ($check_temp > 0)

									<font color="red">!</font></a></li>


								@endif
							<li><a href="{{ url('listBayar')}}">List Bayar</a></li>
							<li><a class="btn11" href="{{ url('dataUser')}}">{{ \Session::get('nama') }}</a>  </li>
							<li><a href="{{ url('logout')}}"> <i class=" fa fa-power-off"></i> </a></li>
						<?php }	?>

          </ul>
        </div>
    </div>
  </nav>
</header>

@if ($message = Session::get('pesanSukses'))
	<div class="alert alert-info alert-block">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong>{{ $message }}</strong>
	</div>
@endif

@if ($message = Session::get('pesanError'))
	<div class="alert alert-danger alert-block">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong>{{ $message }}</strong>
	</div>
@endif


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Silahkan Login Disini</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="" action="/post-login" method="post">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <b>Email</b>
            <input type="text" name="email" class="form-control">
          </div>
          <div class="form-group">
            <b>Password</b>
            <input type="password" name="password" class="form-control">
          </div>
        </div>
        <div class="modal-footer">
					<a href="{{ url('page-login') }}" class="btn btn-primary">Buat Akun Baru</a>
          <a href="{{ url('lupa-password') }}" class="btn btn-warning"> <font color="black"> Lupa Password? </font></a>
					<button type="submit" class="btn btn-info">Login</button>
				</div>
      </form>
    </div>
  </div>
</div>
