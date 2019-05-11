@extends('layouts.frontLayout.front_design')

@section('content')
  <div id="contact" class="section wb">
    <div class="container">
      <div class="col-md-12">
        <div class="contact_form">
          <div id="message"></div>
          <form class="row" action="/page-login" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-lg-2 col-md-6 col-sm-6">
              <input type="text" name="nama" class="form-control" placeholder="Nama Pendek" style="width: 110%" maxlength="12" required>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
              <input type="text" name="nama_panjang" class="form-control" placeholder="Nama Lengkap" minlength="6" maxlength="32" required>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
              <input type="email" name="email" class="form-control" placeholder="Masukkan Email" minlength="8" required>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
              <textarea type="text" name="alamat" class="form-control" placeholder="Alamat" minlength="20" required></textarea>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
              <input type="text" name="no_tlp" class="form-control" placeholder="Nomor Telephone" minlength="9" pattern="[0-9]+" required>
              <span>Foto Akun</span>
              <input type="file" name="foto" class="form-control" required></input>
            </div>
            <div class="col-lg-12 col-md-6 col-sm-6">
              <input type="password" name="password" class="form-control" placeholder="Password" minlength="8" required>
            </div>
            <div class="col-lg-8"></div>
            <div class="text-center cont-btn">
              <button type="submit" class="btn11"><span>Submit Akun Baru</span></button>
            </div>
          </form>
        </div>
      </div><!-- end col -->
      <hr>
      </div><!-- end container -->
  </div><!-- end section -->
@endsection
