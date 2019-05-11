<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Field;
use App\Tgl;
use App\Schedule;
use App\Temp;
use DB;
use Auth;

class FieldsController extends Controller
{

  public function fields()
  {
    $fields = Field::where('status_lapangan', 'BUKA')->get();

    return view('field/listing')->with(compact('fields'));
  }

  public function field($id)
  {
    date_default_timezone_set("Asia/Jakarta");
    $lapangans = Field::where('id',$id)->get();

    $dates = DB::table('schedule')
    ->select('*','schedule.id as id','tgl_lapangan.id as tgl_tersedia_id')
    ->join('tgl_lapangan', 'tgl_lapangan.id', '=', 'schedule.tgl_id')
    ->join('field', 'field.id', '=', 'tgl_lapangan.field_id')
    ->where('tgl_lapangan.field_id', '=', $id)
    ->where('tersedia', '=', 'YA')
    ->where('tgl_tersedia', '>=', date('Y-m-d '))
    ->orderBy('tgl_lapangan.id','asc')
    ->get();

    if (!\Session::get('user_id')) {
      $check_order = null;
    }else {
      $check_order = DB::table('pemesanan_temp')
      ->select('*', 'pemesanan_temp.schedule_id as jadwal_id')
      ->join('schedule', 'schedule.id', '=', 'pemesanan_temp.schedule_id')
      ->join('tgl_lapangan', 'tgl_lapangan.id', '=', 'schedule.tgl_id')
      ->join('field', 'field.id', '=', 'tgl_lapangan.field_id')
      ->where('tgl_lapangan.field_id', '=', $id)
      ->where('tersedia', '=', 'YA')
      ->whereDay('tgl_tersedia', '>=', date('d'))
      ->whereMonth('tgl_tersedia', '=', date('m'))
      ->whereYear('tgl_tersedia', '=', date('Y'))
      ->where('pemesanan_temp.user_id', '=', \Session::get('user_id'))
      ->get();
    }
    return view('field/detail')->with(compact('dates','lapangans','check_order'));
  }

  public function pesan_sementara(Request $request)
  {
    if ($request->isMethod('post')) {
      $data = $request->all();
      $temp = new Temp;

      echo $jadwal_id = substr($request->set, 0, strpos($request->set, "-"));
      $remove=strrchr($request->set,'-');
      echo $harga = str_replace('-','',$remove);

      DB::table('pemesanan_temp')->insert([
        'schedule_id' => $jadwal_id,
        'user_id' => \Session::get('user_id'),
        'harga_utama' => $harga
      ]);

      return redirect()->back()->with(['pesanSukses' => 'Berhasil Pesan Lapangan']);
    }

  }

  ////////////////////////////////////////
  //             BACK - END            //
  ///////////////////////////////////////
  public function addLapangan(Request $request)
  {
    if ($request->isMethod('post')) {
      $data = new Field;
      $data->nama_lapangan = $request->name;
      $data->alamat_lapangan = $request->alamat;
      $data->harga_lapangan = $request->harga;
      $data->deskripsi_lapangan = $request->deskripsi;


      $image1 = $request->file('foto_utama');
      $images1 = rand() . time() . '.' . $image1->getClientOriginalExtension();
      \Image::make($image1)->resize(600, 350)->save(storage_path('../public/img/lapangan/' . $images1));
      $data->foto_lapangan_utama = $images1;

      if ($request->hasFile('foto_1')) {
        $image2 = $request->file('foto_1');
        $images2 = rand() . time() . '.' . $image2->getClientOriginalExtension();
        \Image::make($image2)->resize(600, 350)->save(storage_path('../public/img/lapangan/' . $images2));
        $data->foto_lapangan_1 = $images2;
      }
      if ($request->hasFile('foto_2')) {
        $image3 = $request->file('foto_2');
        $images3 = rand() . time() . '.' . $image3->getClientOriginalExtension();
        \Image::make($image3)->resize(600, 350)->save(storage_path('../public/img/lapangan/' . $images3));
        $data->foto_lapangan_2 = $images3;
      }
      if ($request->hasFile('foto_3')) {
        $image4 = $request->file('foto_3');
        $images4 = rand() . time() . '.' . $image4->getClientOriginalExtension();
        \Image::make($image4)->resize(600, 350)->save(storage_path('../public/img/lapangan/' . $images4));
        $data->foto_lapangan_3 = $images4;
      }
      if ($request->hasFile('foto_4')) {
        $image5 = $request->file('foto_4');
        $images5 = rand() . time() . '.' . $image5->getClientOriginalExtension();
        \Image::make($image5)->resize(600, 350)->save(storage_path('../public/img/lapangan/' . $images5));
        $data->foto_lapangan_4 = $images5;
      }
      $data->save();

      return redirect ('listLapangan');
    }
    return view('admin.lapangan.add_lapangan');
  }

  public function editLapangan(Request $request, $id = null)
  {
    if ($request->isMethod('post')) {
      $data = Field::findOrFail($id);
      $data->nama_lapangan = $request->name;
      $data->alamat_lapangan = $request->alamat;
      $data->harga_lapangan = $request->harga;
      $data->deskripsi_lapangan = $request->deskripsi;
      $data->status_lapangan = $request->status;

      if ($request->hasFile('foto_utama')) {
        $image1 = $request->file('foto_utama');
        $images1 = rand() . time() . '.' . $image1->getClientOriginalExtension();
        \Image::make($image1)->resize(600, 350)->save(storage_path('../public/img/lapangan/' . $images1));
        $data->foto_lapangan_utama = $images1;
      }

      if ($request->hasFile('foto_1')) {
        $image2 = $request->file('foto_1');
        $images2 = rand() . time() . '.' . $image2->getClientOriginalExtension();
        \Image::make($image2)->resize(600, 350)->save(storage_path('../public/img/lapangan/' . $images2));
        $data->foto_lapangan_1 = $images2;
      }
      if ($request->hasFile('foto_2')) {
        $image3 = $request->file('foto_2');
        $images3 = rand() . time() . '.' . $image3->getClientOriginalExtension();
        \Image::make($image3)->resize(600, 350)->save(storage_path('../public/img/lapangan/' . $images3));
        $data->foto_lapangan_2 = $images3;
      }
      if ($request->hasFile('foto_3')) {
        $image4 = $request->file('foto_3');
        $images4 = rand() . time() . '.' . $image4->getClientOriginalExtension();
        \Image::make($image4)->resize(600, 350)->save(storage_path('../public/img/lapangan/' . $images4));
        $data->foto_lapangan_3 = $images4;
      }
      if ($request->hasFile('foto_4')) {
        $image5 = $request->file('foto_4');
        $images5 = rand() . time() . '.' . $image5->getClientOriginalExtension();
        \Image::make($image5)->resize(600, 350)->save(storage_path('../public/img/lapangan/' . $images5));
        $data->foto_lapangan_4 = $images5;
      }
      $data->save();
      return back()->with(['success' => 'Lapangan Berhasil Edit']);
    }

    $fields = Field::where('id',$id)->get();
    return view('admin.lapangan.edit_lapangan')->with(compact('fields'));
  }

  public function listLapangan()
  {
    $fields = Field::paginate(7);
    return view('admin.lapangan.list_lapangan')->with(compact('fields'));
  }

  public function deleteLapangan($id)
  {
    $fields = Field::findOrFail($id);
    $fields->delete();
    return back();
  }


}
