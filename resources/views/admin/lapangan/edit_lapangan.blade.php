@extends('layouts.adminLayout.back_design')

@section('content')
  <section class="content-header">
    <h1>
      Formulir Edit Lapangan
    </h1>

  </section>
  @foreach ($fields as $field)


  <form class="" action="/editLapangan/{{ $field->id }}" method="post"  enctype="multipart/form-data">
    @csrf
    <section class="content">

      <div class="row">

        <!-- left column -->
        <div class="col-md-7">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Data Lapangan</h3>
            </div>

            <div class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Nama Lapangan (*)</label>
                  <div class="col-sm-9">
                    <input type="text" name="name" class="form-control" value="{{ $field->nama_lapangan }}">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Harga (*)</label>
                  <div class="col-sm-4">
                    <input type="text" name="harga" class="form-control" value="{{ $field->harga_lapangan }}" pattern="[0-9]+">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label"></label>
                  <div class="col-sm-8">
                    <span>Harga hanya untuk tampilan bukan harga sebenarnya. </span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Alamat (*)</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" name="alamat" value="Alamat">{{ $field->alamat_lapangan }}</textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Deskripsi (*)</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" name="deskripsi" rows="5">{{ $field->deskripsi_lapangan }}</textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-5">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Foto Lapangan</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Utama (*)</label>
                  <div class="col-sm-8">
                    <input type="file" class="form-control" name="foto_utama">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Detail 1</label>
                  <div class="col-sm-8">
                    <input type="file" class="form-control" name="foto_1">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Detail 2</label>
                  <div class="col-sm-8">
                    <input type="file" class="form-control" name="foto_2">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Detail 3</label>
                  <div class="col-sm-8">
                    <input type="file" class="form-control" name="foto_3">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Detail 4</label>
                  <div class="col-sm-8">
                    <input type="file" class="form-control" name="foto_4">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->

              <!-- /.box-footer -->
            </div>
            <div class="box-footer">
              <div class="col-sm-1"></div>
              <div class="col-sm-4">
                <input type="radio" name="status" value="BUKA" {{ ($field->status_lapangan == 'BUKA') ? 'checked' : '' }}>Tampilkan
              </div>
              <div class="col-sm-4">
                <input type="radio" name="status" value="TUTUP" {{ ($field->status_lapangan == 'TUTUP') ? 'checked' : '' }} >Sembunyikan
              </div>
              <button type="submit" class="btn btn-info pull-right">Simpan Data</button>
            </div>
          </div>

          <!-- /.box -->
          <!-- general form elements disabled -->

          <!-- /.box -->
        </div>
        <div class="col-md-12">
          <div class="timeline-item">
            <div class="timeline-body">
              @if ($field->foto_lapangan_utama != null)
                <img src="{{ asset('img/lapangan/'.$field->foto_lapangan_utama) }}" alt="..." class="margin" style="height:100px;width:150px">
              @endif
              @if ($field->foto_lapangan_1 != null)
                <img src="{{ asset('img/lapangan/'.$field->foto_lapangan_1) }}" alt="..." class="margin" style="height:100px;width:150px">
              @else
                  <img src="http://placehold.it/150x100" alt="..." class="margin" style="height:100px;width:150px">
              @endif
              @if ($field->foto_lapangan_2 != null)
                <img src="{{ asset('img/lapangan/'.$field->foto_lapangan_2) }}" alt="..." class="margin" style="height:100px;width:150px">
              @else
                  <img src="http://placehold.it/150x100" alt="..." class="margin" style="height:100px;width:150px">
              @endif
              @if ($field->foto_lapangan_3 != null)
                <img src="{{ asset('img/lapangan/'.$field->foto_lapangan_3) }}" alt="..." class="margin" style="height:100px;width:150px">
              @else
                  <img src="http://placehold.it/150x100" alt="..." class="margin" style="height:100px;width:150px">
              @endif
              @if ($field->foto_lapangan_4 != null)
                <img src="{{ asset('img/lapangan/'.$field->foto_lapangan_4) }}" alt="..." class="margin" style="height:100px;width:150px">
              @else
                <img src="http://placehold.it/150x100" alt="..." class="margin" style="height:100px;width:150px">
              @endif
            </div>
          </div>
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
  </form>
  @endforeach
@endsection
