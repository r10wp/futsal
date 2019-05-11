@extends('layouts.frontLayout.front_design')

@section('content')
  @foreach ($users as $user)
    <div id="contact" class="section wb">
      <div class="container">
        <div class="col-md-12">
          <div class="contact_form">
            <div id="message"></div>
            <form class="row" action="/dataUser" method="post" enctype="multipart/form-data">
              @csrf
              <div class="col-lg-2 col-md-6 col-sm-6">
                <input type="text" name="nama" class="form-control" value="{{ $user->name }}" style="width: 110%" maxlength="12" required>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-6">
                <input type="text" name="nama_panjang" class="form-control" value="{{ $user->fullname }}" minlength="6" maxlength="32" required>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6">
                <input type="email" name="email" class="form-control" value="{{ $user->email }}" minlength="8" required>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6">
                <textarea type="text" name="alamat" class="form-control" minlength="20" required>{{ $user->alamat }}</textarea>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6">
                <input type="text" name="no_tlp" class="form-control" value="{{ $user->no_tlp }}" minlength="9" pattern="[0-9]+" required>
                <span>Foto Akun Baru</span>
                <input type="file" name="foto" class="form-control"></input>
              </div>
              <div class="col-lg-8"></div>
              <div class="text-center cont-btn">
                <button type="submit" class="btn11"><span>Edit Akun</span></button>
              </div>
            </form>
          </div>
        </div><!-- end col -->

        <hr>

        <div class="col-md-6">
          <div class="contact_form">
            <div id="message"></div>
            <form class="row" action="/updatePassword" method="post" enctype="multipart/form-data">
              @csrf
              <div class="col-lg-12 col-md-6 col-sm-6">
                <input type="password" name="old_pass" class="form-control"  placeholder="Password Lama" required>
              </div>
              <div class="col-lg-12 col-md-6 col-sm-6">
                <input type="password" name="pass1" class="form-control" placeholder="Password Baru" minlength="6" required>
              </div>
              <div class="col-lg-12 col-md-6 col-sm-6">
                <input type="password" name="pass2" class="form-control" placeholder="Password Baru Konfirmasi" minlength="6" required>
              </div>

              <div class="col-lg-8"></div>
              <div class="text-center cont-btn">
                <button type="submit" class="btn11"><span>Ubah Password</span></button>
              </div>
            </form>
          </div>
        </div><!-- end col -->
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


  @endforeach
@endsection
