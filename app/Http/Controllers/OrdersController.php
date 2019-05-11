<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; use Mail;
use Auth;
use Image;
use Session;
use App\Order;
use App\Schedule;
use App\Pembayaran;

class OrdersController extends Controller
{
  public function checkout()
  {
    $orders_temps = DB::table('pemesanan_temp')
    ->select('*','pemesanan_temp.id as id')
    ->join('schedule', 'schedule.id', '=', 'pemesanan_temp.schedule_id')
    ->join('tgl_lapangan','tgl_lapangan.id','=','schedule.tgl_id')
    ->join('field', 'field.id', '=', 'tgl_lapangan.field_id')
    ->where('pemesanan_temp.user_id', '=', \Session::get('user_id'))
    ->where('tersedia', '!=', 'BOOKED')
    ->orderBy('pemesanan_temp.created_at', 'desc')
    ->paginate(5);

    $bayars = DB::table('pembayaran')
    ->orderBy('created_at', 'desc')
    ->limit(1)->get();

    return view('order/check_out')->with(compact('orders_temps','bayars'));
  }

  public function delItem($id)
  {
    DB::table('pemesanan_temp')->where('id', '=', $id)->delete();
    return redirect('/checkout');
  }

  public function proses_checkout(Request $request)
  {
    if ($request->isMethod('post')) {
      $orders_temps = DB::table('pemesanan_temp')
        ->select('*','pemesanan_temp.id as id')
        ->join('schedule', 'schedule.id', '=', 'pemesanan_temp.schedule_id')
        ->join('tgl_lapangan','tgl_lapangan.id','=','schedule.tgl_id')
        ->join('field', 'field.id', '=', 'tgl_lapangan.field_id')
        ->where('pemesanan_temp.user_id', '=', \Session::get('user_id'))
        ->where('tersedia', '!=', 'BOOKED')
        ->orderBy('pemesanan_temp.created_at', 'desc')
        ->get();

        $a =  "<table class='table table-bordered'>
          <thead>
            <tr>
              <th>#</th>
              <th>Nama Lapangan</th>
              <th>Hari & Tanggal Booking</th>
              <th>Jam Booking</th>
              <th>Harga</th>
            </tr>
          </thead>
          <tbody>";
          $no=1;
          $b = "";$bayar_asli=0;
      $data = "";
      foreach ($orders_temps as $order_temp){
        $b = $b." <tr> ".
         "<td>".$no++."</td>".
         "<td>".$order_temp->nama_lapangan."</td>".
         "<td>". date('D',strtotime($order_temp->tgl_tersedia))."-".date('d F Y',strtotime($order_temp->tgl_tersedia))."</td>".
         "<td>".$order_temp->jam_tersedia ."</td>".
         "<td>".number_format($order_temp->harga_sewa_lapangan,0,'','.')."</td>".
         " </tr> ";
         $bayar_asli = $order_temp->harga_sewa_lapangan + $bayar_asli;
      }
      $c = "            <tr>
                   <td colspan='4'><b>Total Harga Pemesanan</b></td>
                   <td><b> Rp ". $bayar_asli." </b></td>

                  </tr>
                </tbody>
              </table>";
      $k = $a.$b.$c;

      date_default_timezone_set("Asia/Jakarta");
      $jatuh_tempo = date("Y-m-d H:i:s", time() + (24*3600));
      $harga = substr($request->bayar_asli, 0 , -3);
      $kode_harga = rand(100,999);

      $harga_unik = $harga.$kode_harga;

      $statement = "ALTER TABLE pembayaran AUTO_INCREMENT = 1;";
        DB::unprepared($statement);

      DB::table('pembayaran')->insert([
        'kode_bayar' => $request->kode_unik,
        'harga_bayar_asli' => $request->bayar_asli,
        'tgl_jatuh_tempo_bayar' => $jatuh_tempo,
        'user_id' => \Session::get('user_id'),
      ]);

      foreach ($request->input('set') as $update) { //Membuat relasi dengan checkout
        DB::table('checkout')->insert([
          'schedule_id' => $update,
          'user_id' => \Session::get('user_id'),
          'pembayaran_id' => $request->kode_unik,
        ]);
      }

      foreach ($request->input('set') as $update) {
        DB::table('pemesanan_temp')
         ->where('schedule_id', $update)
         ->where('user_id', \Session::get('user_id'))
         ->delete();
      }

      foreach ($request->input('set') as $update) {
        Schedule::where('id', $update)->update(['tersedia' => 'BOOKED']);
      }

      $to_name = 'Futsal Gawang';
      $to_email = 'futsalarung@gmail.com';
      $data_email = array('name'=>"Admin", "body" => "Ada yang pesan lapangan! Silahkan check kode pesanan : "."$request->kode_page_bayar"." oleh : ".\Session::get('nama'), "isi" => $k);
      Mail::send('emails.checkout', $data_email, function($message) use ($to_name, $to_email) {
          $message->to($to_email, $to_name)
                  ->subject('Pesanan Lapangan Masuk');
          $message->from('futsalarung@gmail.com', 'Segera Verfikasi');
      });

      return redirect('/pembayaran/'.$request->kode_page_bayar)->with(['pesanSukses' => 'Silahkan bayar pesanan sesuai prosedur sebelum tanggal '.$jatuh_tempo]);
    }
  }

  public function listBayar()
  {
    $bayars = DB::table('pembayaran')
    ->where('user_id', \Session::get('user_id'))
    ->orderBy('created_at', 'desc')
    ->get();
    return view('order.list_pembayaran')->with(compact('bayars'));
  }

  public function pembayaran(Request $request, $id = null)
  {

    if ($request->isMethod('post')) {
      $data = Order::find($id);
      date_default_timezone_set("Asia/Jakarta");
      $data->tgl_bayar = date('Y-m-d H:i:s');
      $data->status_bayar = "MENUNGGU VERIFIKASI";

      $foto = $request->file('bukti_bayar');
      $fotos = rand() . time() . '.' . $foto->getClientOriginalExtension();
      \Image::make($foto)->save(storage_path('../public/img/bukti/' . $fotos));

      $data->foto_bukti_bayar = $fotos;
      $data->save();

      return redirect()->back()->with(['pesanSukses' => 'Berhasil upload bukti bayar']);
    }

    $bayars = DB::table('pembayaran')
    ->select('*', 'pembayaran.id as id_bayar' , 'users.id as id_user', 'pembayaran.created_at as created_at')
    ->join('users', 'users.id', '=','pembayaran.user_id')
    ->where('pembayaran.user_id', \Session::get('user_id'))
    ->where('pembayaran.id', $id)
    ->get();

    foreach ($bayars as $bayar) {
      $prim_kode = $bayar->kode_bayar;
    }


    $checkouts = DB::table('pembayaran')
    ->select('*','pembayaran.id as id')
    ->join('checkout','checkout.pembayaran_id', '=', 'pembayaran.kode_bayar' )
    ->join('schedule', 'schedule.id', '=', 'checkout.schedule_id')
    ->join('tgl_lapangan','tgl_lapangan.id','=','schedule.tgl_id')
    ->join('field', 'field.id', '=', 'tgl_lapangan.field_id')
    ->where('pembayaran.user_id', '=', \Session::get('user_id'))
    ->where('checkout.pembayaran_id', '=', $prim_kode)
    ->orderBy('pembayaran.created_at', 'desc')
    ->get();

    $rekenings = DB::table('rekening')->get();

    return view('order.check_bayar')->with(compact('bayars','checkouts','rekenings'));
  }

}
