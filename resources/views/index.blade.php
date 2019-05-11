
@extends('layouts.frontLayout.front_design')

@section('content')

	<div class="slider-area">
		<div class="slider-wrapper owl-carousel">
			<div class="slider-item text-center home-one-slider-otem slider-item-four slider-bg-one">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="slider-content-area">
								<div class="slide-text">
									<h1 class="homepage-three-title">Selamat datang di  <span>Gawang</span></h1>
									<h2>Penyewaan Lapangan Futsal terbaik dan berkualitas</h2>
									<div class="slider-content-btn">
										<a class="btn11" href="{{ url('about') }}">Tentang Kami<div class="transition"></div></a>
										@if (\Session::get('role') != 'user')
											<a class="btn11" href="3" data-toggle="modal" data-target="#exampleModal">Pesan Lapangan<div class="transition"></div></a>
										@elseif (\Session::get('role') == 'user')
											<a class="btn11" href="{{ url('fields') }}">Pesan Lapangan<div class="transition"></div></a>
										@endif
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="slider-item text-center home-one-slider-otem slider-item-four slider-bg-two">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="slider-content-area">
								<div class="slide-text">
									<h1 class="homepage-three-title">Setiap saat <span>Kami</span> siap melayani</h1>
									<h2>Urusan lapangan serahkan pada kami, <br> Bermain dan jadilah yang terbaik. </h2>
									<div class="slider-content-btn">
										<a class="btn11" href="{{ url('about') }}">Tentang Kami<div class="transition"></div></a>
										@if (\Session::get('role') != 'user')
											<a class="btn11" href="3" data-toggle="modal" data-target="#exampleModal">Pesan Lapangan<div class="transition"></div></a>
										@elseif (\Session::get('role') == 'user')
											<a class="btn11" href="{{ url('fields') }}">Pesan Lapangan<div class="transition"></div></a>
										@endif
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="slider-item text-center home-one-slider-otem slider-item-four slider-bg-three">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="slider-content-area">
								<div class="slide-text">
									<h1 class="homepage-three-title">Jangan ragu untuk bermain di <span>Lapangan</span> Kami </h1>
									<h2>Memberi dukungan sepenuh hati, <br> dengan fasilitas terbaik.</h2>
									<div class="slider-content-btn">
										<a class="btn11" href="{{ url('about') }}">Tentang Kami<div class="transition"></div></a>
										@if (\Session::get('role') != 'user')
											<a class="btn11" href="3" data-toggle="modal" data-target="#exampleModal">Pesan Lapangan<div class="transition"></div></a>
										@elseif (\Session::get('role') == 'user')
											<a class="btn11" href="{{ url('fields') }}">Pesan Lapangan<div class="transition"></div></a>
										@endif
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="features" class="section lb">
			<div class="container">
					<div class="section-title text-center">
							<h3>Kelebihan dan Keunggulan</h3>
							<p class="lead">Berikut alasan anda harus menyewa di futsal field</p>
					</div><!-- end title -->

					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-12">
							<ul class="features-left">
								<li class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
									<i class="fa fa-running"></i>
									<div class="fl-inner">
											<h4>Lapangan berkualitas</h4>
											<p>Dengan banyak pilihan sesuai dengan selera </p>
									</div>
								</li>
								<li class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.4s">
									<i class="fa fa-futbol"></i>
									<div class="fl-inner">
											<h4>Bola Berkualitas</h4>
											<p>Bola merk ternama seperti : Adidas, Mitre, Mikasa, dll</p>
									</div>
								</li>
								<li class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s">
									<i class="fa fa-tags"></i>
									<div class="fl-inner">
											<h4>Murah dan Mudah</h4>
											<p>Pemesanan dan pembayaran dilakukan secara online</p>
									</div>
								</li>
								<li class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
									<i class="fa fa-briefcase-medical"></i>
									<div class="fl-inner">
											<h4>Fasilitas Kesehatan</h4>
											<p>Terdapat ruang perawatan + P3K apabila terjadi cidera</p>
									</div>
								</li>
							</ul>
						</div>
						<div class="col-md-4 hidden-xs hidden-sm">
							<img src="{{ asset('icon/lapangan_logo.png')}}" class="img-center img-fluid" alt="" style="height:270px">
							<br><br>
							<img src="{{ asset('icon/lapangan_logo_2.png')}}" class="img-center img-fluid" alt="" >
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12">
								<ul class="features-right">
										<li class="wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s">
												<i class="fa fa-person-booth"></i>
												<div class="fr-inner">
														<h4>Ruang Ganti</h4>
														<p>Tersedia kamar mandi dan ruang ganti pemain</p>
												</div>
										</li>
										<li class="wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s">
											<i class="fa fa-utensils"></i>
											<div class="fr-inner">
												<h4>Food Court</h4>
												<p>Terdapat foodcourt dan cafe kekinian</p>
											</div>
										</li>
										<li class="wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.4s">
												<i class="fa fa-users"></i>
												<div class="fr-inner">
													<h4>Tribun Penonton</h4>
													<p>Lapangan dilengkapi tribun untuk para supporter</p>
												</div>
										</li>
										<li class="wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
												<i class="fa fa-percent"></i>
												<div class="fr-inner">
														<h4>Banyak Diskon</h4>
														<p>Dapatkan berbagai diskon menarik di setiap transaksi</p>
												</div>
										</li>
								</ul>
						</div><!-- end col -->
					</div><!-- end row -->
			</div><!-- end container -->
	</div><!-- end section -->


	<div id="features" class="section lb">
			<div class="container">
					<div class="section-title text-center">
							<h3>Lokasi Kami</h3>
					</div><!-- end title -->

					<div class="row">
							<div class="col-lg-8 col-md-12 col-sm-12">
								<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1978.5858911861599!2d112.7838901!3d-7.3345963!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fac7d21cce03%3A0x5bf627de7b215534!2sArung+Futsal!5e0!3m2!1sid!2sid!4v1556768795310!5m2!1sid!2sid" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
							</div>
							<div class="col-lg-4 col-md-12 col-sm-12">
								<h2>Jalan Gunung Anyar Lor II, Gunung Anyar, Surabaya </h2>
								<p>(Masuk perumahan IKIP sebelah Purimas)</p>
								<img src="{{ asset('img/other/ikip.jpg') }}" alt="" style="width:400px">
								<hr>
								<p>(Arung Futsal)</p>
								<img src="{{ asset('img/other/footer_lapangan.jpg') }}" alt="" style="width:400px">
							</div>
					</div><!-- end row -->
			</div><!-- end container -->
	</div><!-- end section -->




@endsection

<!-- @if (Route::has('login'))
    <div class="top-right links">
        @auth
            <a href="{{ url('/home') }}">Home</a>
        @else
            <a href="{{ route('login') }}">Login</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}">Register</a>
            @endif
        @endauth
    </div>
@endif -->



    <!-- END LOADER -->
