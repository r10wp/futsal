<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tgl;
use App\Schedule;
use App\Field;
use DB;
use Session;

class SchedulesController extends Controller
{
  public function addJadwal(Request $request)
  {
    if ($request->isMethod('post')) {

      $check = DB::table('tgl_lapangan')->where('field_id', $request->lapangan)->where('tgl_tersedia', $request->tgl)->count();

      if ($check == 1) {
        $check = DB::table('tgl_lapangan')->where('field_id', $request->lapangan)->where('tgl_tersedia', $request->tgl)->get();
        foreach ($check as $key) {
          $prim_kode = $key->id;
        }
        return redirect('detailJadwalLapangan/'.$prim_kode);
      }else {
        DB::table('tgl_lapangan')->insert([
          'field_id' => $request->lapangan,
          'tgl_tersedia' => $request->tgl
        ]);
        $check = DB::table('tgl_lapangan')->where('field_id', $request->lapangan)->where('tgl_tersedia', $request->tgl)->get();
        foreach ($check as $key) {
          $prim_kode = $key->id;
        }
        return redirect('detailJadwalLapangan/'.$prim_kode);
      }
    }
    $fields = Field::where('status_lapangan', 'BUKA')->get();
    return view('admin.jadwal.add_jadwal')->with(compact('fields'));
  }

  public function listJadwal()
  {
    $tgls = DB::table('tgl_lapangan')
    ->select('*','tgl_lapangan.id as joing_tgl_id')
    ->join('field','field.id','=','tgl_lapangan.field_id')
    ->orderBy('tgl_tersedia','desc')->paginate(15);
    return view('admin.jadwal.list_jadwal')->with(compact('tgls'));
  }

  public function detailJadwal(Request $request,$id=null)
  {
    if ($request->isMethod('post')) {

    }
  }

  public function detailJadwalLapangan(Request $request , $id = null)
  {
    if ($request->isMethod('post')) {


      if ($request->waktu_mulai >= $request->waktu_habis ){
        return back()->with('error','Error!.. Tanggal Tidak Valid, Silahkan periksa tanggal');
      }

      $loop = $request->waktu_habis-$request->waktu_mulai;
      $test_waktu_mulai = 0;
      $test_waktu_habis = 0;
      for ($i=0; $i < $loop; $i++) {
        $test_waktu_mulai = $request->waktu_mulai+$i;
        $test_waktu_habis = $test_waktu_mulai+1;

        $a = sprintf("%02s",$test_waktu_mulai).":00 - ";
        $b = sprintf("%02s",$test_waktu_habis).":00";
        $time =$a.$b;

        $check = DB::table('schedule')->where('tgl_id', $id)->where('jam_tersedia', $time)->count();

        $warning = 0;

        if ($check != 1) {
          DB::table('schedule')->insert([
            'tgl_id' => $id,
            'jam_tersedia' => $time,
            'harga_sewa_lapangan' => $request->harga,
            'tersedia' => $request->set,
          ]);
          $warning =1;
        };
      }

      if ($warning == 0) {
        return back()->with('warning','Jadwal yang sama tidak bisa dibuat');
      }

      return back()->with('success','Berhasil tambah jadwal');
    }

    $details = DB::table('tgl_lapangan')
    ->select('*','tgl_lapangan.id as id')
    ->join('field', 'field.id', '=', 'tgl_lapangan.field_id')
    ->where('tgl_lapangan.id', '=', $id)
    ->get();

    $jadwals = DB::table('schedule')
    ->select('*')
    // ->join('schedule', 'schedule.id', '=', 'pemesanan_temp.schedule_id')
    // ->join('tgl_lapangan', 'tgl_lapangan.id', '=', 'schedule.tgl_id')
    ->where('schedule.tgl_id', '=', $id)
    ->get();

    return view('admin.jadwal.jadwal_lapangan')->with(compact('details','jadwals'));
  }

  public function deleteJadwalLapangan(Request $request, $id = null)
  {
    $data = Schedule::find($id);
    $data->delete();
    return back();
  }

  public function editJadwalLapangan(Request $request)
  {
    $data = Schedule::findOrFail($request->jadwal_id);

    $check2 = DB::table('schedule')->where('id', $request->jadwal_id)->get();

    foreach ($check2 as $key) {
      $old_jam = $key->jam_tersedia;
      $status = $key->tersedia;
      $harga_asli = $key->harga_sewa_lapangan;
    }




    $a = sprintf("%02s",$request->waktu_mulai_id).":00";
    $b = sprintf("%02s",$request->waktu_habis_id).":00";
    $time = $a.' - '.$b;
    $data->jam_tersedia = $time;

    $data->harga_sewa_lapangan = $request->harga_id;
    $data->tersedia = $request->kat;

    if ($old_jam == $time) {
      if ($status != $request->kat OR $harga_asli != $request->harga_id) {
        $con = "Fine";
      } else {
        $con = "Not";
      }
    } else {
      $con = "Not";
    }

    $check = DB::table('schedule')->where('tgl_id', $request->tgl_id)->where('jam_tersedia', $time)->count();

    if ($check > 0) {
      if ($con == "Not") {
        // code...
        return back()->with('error','Terjadi Error, Jadwal sudah ada periksa kembali inputan');
      }
    };

    $data->save();
    return back()->with('success','Jadwal berhasil dirubah');
  }

  public function deleteTgl(Request $request, $id = null)
  {
    $data = Tgl::find($id);
    $data->delete();
    return back();
  }

}
