@extends('layouts.adminLayout.back_design')

@section('content')
  <section class="content-header">
    <h1>
      Formulir Atur Waktu Penyewaan
    </h1>
  </section>
  @php
    $tgl_id = null;
  @endphp
  @foreach ($details as $detail)
    <form class="" action="/detailJadwalLapangan/{{ $detail->id }}" method="post">
      @csrf

    {{-- <input type="text" name="" value="{{ $detail->id }}"> --}}
  @endforeach

    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-5">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Detail Lapangan</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="form-horizontal">
              <div class="box-body">
                @foreach ($details as $detail)
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Lapangan</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="" value="{{ $detail->nama_lapangan }}" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Hari</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="" value="{{ $detail->tgl_tersedia }}" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Tanggal</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="" value="{{ $detail->tgl_tersedia }}" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Harga Sewa</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="" value="{{ $detail->harga_lapangan }}" readonly>
                    </div>
                  </div>
                  @php
                    $harga = $detail->harga_lapangan;

                  @endphp
                @endforeach

              </div>
            </div>
          </div>
        </div>

        <div class="col-md-7">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Atur Waktu</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Waktu Sewa</label>
                  <div class="col-sm-3">
                    <select class="form-control" name="waktu_mulai">
                      <option value="">00.00</option>
                      <option value="1">01.00</option>
                      <option value="2">02.00</option>
                      <option value="3">03.00</option>
                      <option value="4">04.00</option>
                      <option value="5">05.00</option>
                      <option value="6">06.00</option>
                      <option value="7">07.00</option>
                      <option value="8">08.00</option>
                      <option value="9">09.00</option>
                      <option value="10">10.00</option>
                      <option value="11">11.00</option>
                      <option value="12">12.00</option>
                      <option value="13">13.00</option>
                      <option value="14">14.00</option>
                      <option value="15">15.00</option>
                      <option value="16">16.00</option>
                      <option value="17">17.00</option>
                      <option value="18">18.00</option>
                      <option value="19">19.00</option>
                      <option value="20">20.00</option>
                      <option value="21">21.00</option>
                      <option value="22">22.00</option>
                      <option value="23">23.00</option>
                    </select>
                    {{-- <input type="time" name="waktu_mulai" value="" class="form-control" required> --}}
                  </div>
                  <label for="inputEmail3" class="col-sm-1 control-label">-</label>
                  <div class="col-sm-3">
                    <select class="form-control" name="waktu_habis">
                      <option value="1">01.00</option>
                      <option value="2">02.00</option>
                      <option value="3">03.00</option>
                      <option value="4">04.00</option>
                      <option value="5">05.00</option>
                      <option value="6">06.00</option>
                      <option value="7">07.00</option>
                      <option value="8">08.00</option>
                      <option value="9">09.00</option>
                      <option value="10">10.00</option>
                      <option value="11">11.00</option>
                      <option value="12">12.00</option>
                      <option value="13">13.00</option>
                      <option value="14">14.00</option>
                      <option value="15">15.00</option>
                      <option value="16">16.00</option>
                      <option value="17">17.00</option>
                      <option value="18">18.00</option>
                      <option value="19">19.00</option>
                      <option value="20">20.00</option>
                      <option value="21">21.00</option>
                      <option value="22">22.00</option>
                      <option value="23">23.00</option>
                      <option value="24">24.00</option>
                    </select>
                    {{-- <input type="time" name="waktu_habis" value="" class="form-control" required> --}}
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label"></label>
                  <div class="col-sm-8">
                    <span> <b> Contoh Format Waktu </b> : 00.00 - 01.00 / 12.30 - 13.30 </span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Harga</label>
                  <div class="col-sm-4">
                    <input type="text" name="harga" value="{{ $harga }}" class="form-control" required>
                  </div>

                </div>
                <div class="box-footer">
                  <div class="col-sm-3"></div>
                  <div class="col-sm-2">
                    <input type="radio" name="set" value="YA" checked required> Tampilkan
                  </div>
                  <div class="col-sm-2">
                    <input type="radio" name="set" value="TIDAK" required> Sembunyikan
                  </div>
                  <button type="submit" class="btn btn-info pull-right">Simpan Jadwal</button>
                </div>

              </div>
            </div>
          </div>
        </div>

        <!--/.col (right) -->
      </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Atur Waktu</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="table-search" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Jam Sewa Mulai</th>
                  <th>Jam Sewa Berhenti</th>
                  <th>Harga</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($jadwals as $jadwal)
                    <tr>
                      <td>{{ substr($jadwal->jam_tersedia,0,5) }}</td>
                      <td>{{ substr($jadwal->jam_tersedia,8,5) }}</td>
                      <td>{{ $jadwal->harga_sewa_lapangan }}</td>
                      <td>{{ $jadwal->tersedia }}</td>
                      <td>
                        @if ($jadwal->tersedia != "BOOKED")
                          <a href="#my_modal" data-toggle="modal"
                          data-set1="{{ $jadwal->id }}"
                          data-set2="{{ substr($jadwal->jam_tersedia,0,2) }}"
                          data-set3="{{ substr($jadwal->jam_tersedia,8,2) }}"
                          data-set4="{{ $jadwal->harga_sewa_lapangan }}"
                          data-set7="{{ $jadwal->harga_sewa_lapangan }}"
                          class="btn btn-primary btn-sm">Edit</a>
                          <a href="#" onclick="return theFunction({{ $jadwal->id }})" class="btn btn-danger btn-sm">Hapus</a>

                        @endif

                      </td>
                    </tr>
                    @php

                      $tgl_id = $jadwal->tgl_id;
                    @endphp
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
  </form>


  <div class="modal fade" id="my_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Ubah Jadwal</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" action="\editJadwalLapangan">
            @csrf
            <input type="hidden" name="jadwal_id" />

            @if ($tgl_id != null)
              <input type="hidden" name="tgl_id" value="{{ $tgl_id }}" />
            @endif
            <div class="form-group">
              <label for="recipient-name" class="col-sm-3 col-form-label">Jadwal Mulai Sewa</label>
              <div class="col-sm-2">
                <input type="number" id="binding" class="form-control" name="waktu_mulai_id" min="0" max="23">
              </div>
              <div class="col-sm-2">
                <input type="text" class="form-control" value="00" readonly>
              </div>
              <div class="col-sm-12"></div>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-sm-3 col-form-label">Jadwal Akhiri Sewa</label>
              <div class="col-sm-2">
                <input type="number" class="binding form-control" name="waktu_habis_id" readonly>
              </div>
              <div class="col-sm-2">
                <input type="text" class="form-control" value="00" readonly>
              </div>
              <label for="message-text" class="col-sm-3 col-form-label">Status Tampil</label>
              <div class="col-sm-12"></div>
            </div>
            <div class="form-group">
              <label for="message-text" class="col-sm-3 col-form-label">Harga (Rp)</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" name="harga_id">
                <input type="hidden" class="form-control" name="oldharga_id">
              </div>
              <div class="col-sm-4">
                <select class="form-control" name="kat">
                  <option value="YA"> TAMPILKAN</option>
                  <option value="TIDAK"> SEMBUNYIKAN</option>
                </select>
              </div>
            </div>




        </div>
        <br><br><br><br><br><br><br>
        <div class="modal-footer">

          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </div>
        </form>
      </div>
    </div>
  </div>


@endsection
