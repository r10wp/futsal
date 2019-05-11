<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Admin;
use Auth;
use DB;
use Session;
use Image;
use Mail;
use Hash;

class LoginController extends Controller
{

  public function index(Request $request)
  {
    if ($request->isMethod('post')) {
      $data = new User;
      $data->name = $request->nama;
      $data->fullname = $request->nama_panjang;
      $data->email = $request->email;
      $data->password = bcrypt($request->password);
      $data->alamat = $request->alamat;
      $data->no_tlp = $request->no_tlp;

      $image = $request->file('foto');
      $images = rand() . time() . '.' . $image->getClientOriginalExtension();
      \Image::make($image)->save(storage_path('../public/img/member/' . $images));
      $data->photo = $images;

      $data->save();

      $to_name = 'Futsal Gawang';
      $to_email = $request->email;
      $data_email = array(
        "name" => $request->nama,
        "body" => "Selamat bergabung di gawang",
        "url" => "http://localhost:1210");
      Mail::send('emails.member_baru', $data_email, function($message) use ($to_name, $to_email) {
          $message->to($to_email, $to_name)
                  ->subject('Pemberitahuan Sebagai Member');
          $message->from('futsalarung@gmail.com', 'Selamat bergabung di gawang');
      });

      return redirect('page-login')->with(['pesanSukses' => 'Akun Berhasil Dibuat. Silahkan Login']);
    }
    if (\Session::get('user_id')) {
      return view('index');
    }else {
      return view('page-login');
    }
  }

  public function postLogin(Request $request)
  {
    // $this->validate($request, [
    //   'email' => 'required|email',
    //   'password' => 'required'
    // ]);
    $datas =  DB::table('users')
    ->where('email', '=', $request->email)
    ->get();
    foreach ($datas as $key) {
      if ($key->status_user == "NONAKTIF" ) {
        return redirect()->back()->with(['pesanError' => 'Anda tidak bisa login karena akun anda SUSPENDED. Hubungi admin untuk keteranagan lebih lanjut']);
      }
    }
    if (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password])) {
      //
      foreach ($datas as $data) {
        Session::put('user_id', $data->id);
        Session::put('nama', $data->name);
        Session::put('role', 'user');
        Session::put('foto', $data->photo);
      }
      \Session::save();
      return redirect()->back()->with(['pesanSukses' => 'Berhasil Melakukan Login']);
    }else {
      return redirect()->back()->with(['pesanError' => 'Email atau password salah']);
    }
    // echo "string";
  }

  public function editUser(Request $request)
  {
    $users =  DB::table('users')
    ->where('id', '=', \Session::get('user_id'))
    ->get();
    if ($request->isMethod('post')) {
      $data = User::find(\Session::get('user_id'));

      $data->name = $request->nama;
      $data->fullname = $request->nama_panjang;
      $data->email = $request->email;
      $data->alamat = $request->alamat;
      $data->no_tlp = $request->no_tlp;

      if ($request->hasFile('foto')) {
        $image2 = $request->file('foto');
        $images2 = rand() . time() . '.' . $image2->getClientOriginalExtension();
        \Image::make($image2)->save(storage_path('../public/img/member/' . $images2));
        $data->photo = $images2;

        Session::put('foto', $images2);
      }
      Session::put('nama', $request->nama);

      $data->save();

      return redirect()->back()->with(['PesanSukses' => 'Berhasil merubah data diri']);

    }
    return view('edit-user')->with(compact('users'));
  }

  public function updatePassword(Request $request)
  {
    if ($request->isMethod('post')) {
      if ($request->pass1 != $request->pass2) {
        return back()->with(['pesanError' => 'Perubahan password gagal karena password konfirmasi tidak sama']);
      }

      $datas = User::where('id', \Session::get('user_id'))->get();

      foreach ($datas as $data) {
        $user_id =  $data->id;
        $current_password = $data->password;
      }

      if(Hash::check($request->old_pass, $current_password))
      {
        $simpan_data = User::findOrFail($user_id);
        $simpan_data->password = bcrypt($request->pass1);
        $simpan_data->save();
        return back()->with(['pesanSukses' => 'Berhasil mengganti password']);
      }else {
        return back()->with(['pesanError' => 'Perubahan password gagal karena tidak sesuai']);
      }
    }
  }

  public function logout(Request $request)
  {
    session()->forget('user_id');
    session()->forget('admin_id');
    session()->forget('role');
    session()->forget('nama');
    session()->forget('foto');
    session()->flush();
    if (Auth::guard('admin')->check()) {
      Auth::guard('admin')->logout();
    } elseif (Auth::guard('user')->check()) {
      Auth::guard('user')->logout();
    }
    return redirect('/');
  }

  public function lupaPassUser(Request $request)
  {
    if ($request->isMethod('post')) {
      $check_mail = User::where('email' , $request->email)->get();
      $count_mail = DB::table('users')->where('email',$request->email)->count();
      $pass_baru = rand(100000,999999);

      if ($count_mail > 0) {
        User::where('email' , $request->email)->update(['password' => bcrypt($pass_baru)]);

        $to_name = 'Futsal Gawang';
        $to_email = $request->email;
        $data_email = array('name'=>"", "body" => "Silahkan LOGIN dengan password baru berikut : "."$pass_baru");
        Mail::send('emails.reset_pass', $data_email, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                    ->subject('Permintaan Lupa Password');
            $message->from('futsalarung@gmail.com', 'Permintaan Lupa Password');
        });

        return back()->with(['pesanSukses' => 'Silahkan Check Email Untuk Password Baru']);
      }else {
        return back()->with(['pesanError' => 'Email tidak ditemukan']);
      }

    }

    return view('lupa_pass_user');
  }

  public function lupaPassAdmin(Request $request)
  {
    if ($request->isMethod('post')) {
      $check_mail = Admin::where('email' , $request->email)->get();
      $count_mail = DB::table('admin')->where('email',$request->email)->count();
      $pass_baru = rand(100000,999999);

      if ($count_mail > 0) {
        Admin::where('email' , $request->email)->update(['password' => bcrypt($pass_baru)]);

        $to_name = 'Futsal Gawang';
        $to_email = $request->email;
        $data_email = array('name'=>"", "body" => "Silahkan LOGIN dengan password baru berikut : "."$pass_baru");
        Mail::send('emails.reset_pass', $data_email, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                    ->subject('Permintaan Lupa Password');
            $message->from('futsalarung@gmail.com', 'Permintaan Lupa Password');
        });
        return redirect('admin-login')->with(['pesanSukses' => 'Silahkan Check Email Untuk Password Baru']);
      }else {
        return redirect('admin-login')->with(['pesanError' => 'Email tidak ditemukan']);
      }

    }

    return view('lupa_pass_admin');
  }
}
