@extends('layouts.frontLayout.front_design')

@section('content')

  @if (\Session::get('user_id')): {
    <script>window.location = "/";</script>
  @endif
  <div id="contact" class="section wb">
    <div class="container">
      <div class="col-md-12">
        <div class="contact_form">
          <div id="message"></div>
          <form class="row" action="/lupa-password" method="post" enctype="multipart/form-data">
            @csrf
            <input type="text" name="email" class="form-control" placeholder="Ketikkan Alamat Email" style="width: 110%" required>

            <div class="text-center cont-btn">
              <button type="submit" class="btn11"><span>Permintaan Reset Password</span></button>
            </div>
          </form>
        </div>
      </div><!-- end col -->

      <hr>
      {{-- <div class="col-md-8 offset-md-2 mt-5">
        <h1>Lupa Password?</h1>
          <div class="contact_form">
              <div id="message"></div>
              <form id="contactform" class="row" action="/postLogin" method="post">

                <div class="col-lg-6 col-md-6 col-sm-6">
                  <input type="text" name="email" class="form-control" placeholder="Masukkan Email">
                </div>
                <div class="col-lg-8"></div>
                <div class="text-center cont-btn">
                  <button type="submit" value="SEND" id="submit" class="btn11"><span>Kirim Konfirmasi</span></button>
                </div>

              </form>
          </div>
      </div><!-- end col --> --}}





      </div><!-- end container -->
  </div><!-- end section -->
@endsection
