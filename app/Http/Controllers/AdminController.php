<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Order;
use Session;
use App\User;
use App\Admin;
use App\Schedule;
use Mail;

class AdminController extends Controller
{
  public function login(Request $request)
  {
    if ($request->isMethod('post')) {

      // $this->validate($request, [
      //   'email' => 'required|email',
      //   'password' => 'required'
      // ]);
      //
      if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
        $datas =  DB::table('admin')
        ->where('email', '=', $request->email)
        ->get();

        foreach ($datas as $data) {
          Session::put('admin_id', $data->id);
          Session::put('nama', $data->name);
          Session::put('role', 'admin');
          Session::put('foto', $data->photo);
        }
        \Session::save();
        return redirect('dashboard');
      }else {
        return back()->with(['pesanError' => 'Email atau password salah']);
      }
    }
    return view('admin-login');
  }

  public function dashboard()
  {
    $wait_order = DB::table('pembayaran')->where('status_bayar', 'MENUNGGU VERIFIKASI')->orWhere('status_bayar', 'BELUM UPLOAD BUKTI')->count();
    $sukses_order = DB::table('pembayaran')->where('status_bayar', 'LUNAS')->count();
    $j_field = DB::table('field')->count();
    $j_member = DB::table('users')->count();

    $jadwals = DB::table('schedule')
    ->select('*')
    ->join('tgl_lapangan', 'tgl_lapangan.id', '=','schedule.tgl_id')
    ->join('field', 'field.id', '=', 'tgl_lapangan.field_id')
    ->where('tgl_tersedia', date('Y-m-d'))
    ->paginate(7);
    return view('admin.dashboard')->with(compact('wait_order','sukses_order','j_field','j_member','jadwals'));
  }

  public function listPemesanan()
  {
    $orders = DB::table('pembayaran')
    ->select('*', 'pembayaran.id as id_bayar' , 'users.id as id_user', 'pembayaran.created_at as created_at')
    ->join('users', 'users.id', '=','pembayaran.user_id')
    ->get();
    return view('admin.pemesanan.list_pemesanan')->with(compact('orders'));
  }
  public function listPemesananWait()
  {
    $orders = DB::table('pembayaran')
    ->select('*', 'pembayaran.id as id_bayar' , 'users.id as id_user', 'pembayaran.created_at as created_at')
    ->join('users', 'users.id', '=','pembayaran.user_id')
    ->where('status_bayar','=','BELUM UPLOAD BUKTI')
    ->orWhere('status_bayar','=','MENUNGGU VERIFIKASI')
    ->get();
    return view('admin.pemesanan.list_pemesanan')->with(compact('orders'));
  }
  public function listPemesananDone()
  {
    $orders = DB::table('pembayaran')
    ->select('*', 'pembayaran.id as id_bayar' , 'users.id as id_user', 'pembayaran.created_at as created_at')
    ->join('users', 'users.id', '=','pembayaran.user_id')
    ->where('status_bayar','=','LUNAS')
    ->get();
    return view('admin.pemesanan.list_pemesanan')->with(compact('orders'));
  }
  public function listPemesananCancel()
  {
    $orders = DB::table('pembayaran')
    ->select('*', 'pembayaran.id as id_bayar' , 'users.id as id_user', 'pembayaran.created_at as created_at')
    ->join('users', 'users.id', '=','pembayaran.user_id')
    ->where('status_bayar','=','BATAL')
    ->get();
    return view('admin.pemesanan.list_pemesanan')->with(compact('orders'));
  }

  public function accBayar(Request $request, $id )
  {
    if ($request->isMethod('post')) {
      if ($request->verifikasi == "BATAL") {
        $data2 = DB::table('checkout')->where('pembayaran_id',$id)->get();
        foreach ($data2 as $key) {
          $update = Schedule::find($key->schedule_id);
          $update->tersedia = "YA";
          $update->save();
        }
      }
      $data = Order::find($id);
      $data->status_bayar = $request->verifikasi;
      $data->kode_bayar = $request->kode_pembayaran;
      $data->save();

      $to_name = 'Futsal Gawang';
      $to_email = $request->mail;
      $data_email = array('name'=>$request->nama_pemesan, "body" => "Pesanan anda telah di konfirmasi oleh admin. silahkan check di website untuk detailnya");
      Mail::send('emails.member_baru', $data_email, function($message) use ($to_name, $to_email) {
          $message->to($to_email, $to_name)
                  ->subject('Pesanan Lapangan Masuk');
          $message->from('futsalarung@gmail.com', 'Respon Pesanan Gawang');
      });
      return redirect()->back()->with(['pesanSukses' => 'Verifikasi berhasil']);
    }
    $bayars = DB::table('pembayaran')
    ->select('*', 'pembayaran.id as id_bayar' , 'users.id as id_user', 'pembayaran.created_at as created_at')
    ->join('users', 'users.id', '=','pembayaran.user_id')
    ->where('pembayaran.id', $id)
    ->get();

    foreach ($bayars as $bayar) {
      $prim_kode = $bayar->kode_bayar;
    }

    $list_pesans = DB::table('pembayaran')
    ->select('*','pembayaran.id as id')
    ->join('checkout','checkout.pembayaran_id', '=', 'pembayaran.kode_bayar' )
    ->join('schedule', 'schedule.id', '=', 'checkout.schedule_id')
    ->join('tgl_lapangan','tgl_lapangan.id','=','schedule.tgl_id')
    ->join('field', 'field.id', '=', 'tgl_lapangan.field_id')
    ->where('checkout.pembayaran_id', '=', $prim_kode)
    ->get();

    return view('admin.pemesanan.verifikasi_pemesanan')->with(compact('bayars','list_pesans'));
  }

  public function listUser()
  {
    $users = User::all();
    return view('admin.user.list_user')->with(compact('users'));
  }

  public function suspendMember(Request $request, $id)
  {
    $user = User::findOrFail($id);
    $mail = User::findOrFail($id)->get();
    foreach ($mail as $key) {
      $email =  $key->email;
      $name =  $key->name;
    }

    $to_name = 'Futsal Gawang';
    $to_email = $email;
    $data_email = array('name'=>$name, "body" => "Akun anda telah di suspend oleh Admin. Hubungi pihak admin untuk informasi lebih lanjut");
    Mail::send('emails.member_baru', $data_email, function($message) use ($to_name, $to_email) {
        $message->to($to_email, $to_name)
                ->subject('Pemberitahuan Suspend');
        $message->from('futsalarung@gmail.com', 'Suspend Akun');
    });

    $user->status_user = "NONAKTIF";
    $user->save();


    return back()->with(['success'=>'Member berhasil di susped']);
  }

  public function unsuspendMember(Request $request, $id)
  {
    $user = User::findOrFail($id);

    $mail = User::findOrFail($id)->get();
    foreach ($mail as $key) {
      $email =  $key->email;
      $name =  $key->name;
    }

    $to_name = 'Futsal Gawang';
    $to_email = $email;
    $data_email = array('name'=>$name, "body" => "Selamat akun anda sudah aktif kembali dan dapat digunakan secara normal");
    Mail::send('emails.member_baru', $data_email, function($message) use ($to_name, $to_email) {
        $message->to($to_email, $to_name)
                ->subject('Pemberitahuan UnSuspend');
        $message->from('futsalarung@gmail.com', 'UnSuspend Akun');
    });

    $user->status_user = "AKTIF";
    $user->save();
    return back()->with(['success'=>'Member berhasil di buka kembali']);
  }

  public function detailMember($id)
  {
    $users = DB::table('users')->where('id',$id )->get();
    $total_transaksi = DB::table('pembayaran')->where('user_id',$id )->count();
    return view('admin.user.detail')->with(compact('users','total_transaksi'));
  }

  public function listAdmin()
  {
    $admins = Admin::paginate(10);
    return view('admin.admin.list_admin')->with(compact('admins'));
  }

  public function addAdmin(Request $request)
  {
    if ($request->isMethod('post')) {
      $data = new Admin;
      $data->name = $request->name;
      $data->email = $request->email;
      $data->tlp = $request->tlp;
      $data->password = bcrypt($request->password);

      $image = $request->file('foto');
      $images = rand() . time() . '.' . $image->getClientOriginalExtension();
      \Image::make($image)->save(storage_path('../public/img/admin/' . $images));
      $data->photo = $images;

      $data->save();
      return redirect('listAdmin')->with(['success'=>'Data admin Berhasil di Update']);
    }
    return view('admin.admin.add_admin');
  }

  public function editAdmin(Request $request, $id )
  {
    if ($request->isMethod('post')) {
      $data = Admin::findOrFail($id);
      $data->name = $request->name;
      $data->email = $request->email;
      $data->tlp = $request->tlp;

      if ($request->password != null) {
        $data->password = bcrypt($request->password);
      }
      
      if ($request->hasFile('foto')) {
        $image = $request->file('foto');
        $images = rand() . time() . '.' . $image->getClientOriginalExtension();
        \Image::make($image)->save(storage_path('../public/img/admin/' . $images));
        $data->photo = $images;
      }

      $data->save();
      return back()->with(['success'=>'Data admin Berhasil di Update']);
    }
    $admins = DB::table('admin')->where('id',$id )->get();
    return view('admin.admin.edit_admin')->with(compact('admins'));
  }

  public function deleteAdmin($id)
  {
    $admin = Admin::findOrFail($id);
    $admin->delete();
    return back();
  }

  public function adminProfile(Request $request)
  {
    if ($request->isMethod('post')) {
      $data = Admin::findOrFail(\Session::get('admin_id'));
      $data->name = $request->name;
      $data->email = $request->email;
      $data->tlp = $request->tlp;

      if ($request->password != null) {
        $data->password = bcrypt($request->password);
      }

      if ($request->hasFile('foto')) {
        $image = $request->file('foto');
        $images = rand() . time() . '.' . $image->getClientOriginalExtension();
        \Image::make($image)->save(storage_path('../public/img/admin/' . $images));
        $data->photo = $images;
      }

      $data->save();
      return back()->with(['success'=>'Data admin Berhasil di Update']);
    }
    $admins = DB::table('admin')->where('id', \Session::get('admin_id') )->get();
    return view('admin.admin.profile_admin')->with(compact('admins'));
  }

}
