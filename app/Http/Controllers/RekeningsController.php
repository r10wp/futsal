<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Rekening;

class RekeningsController extends Controller
{
  public function index(Request $request)
  {
    $reks = Rekening::paginate(5);
    if ($request->isMethod('post')) {
      $rekenings = new Rekening;
      $rekenings->no_rekening = $request->rek;
      $rekenings->bank =  $request->bank;
      $rekenings->pemilik =  $request->pemilik;
      $rekenings->save();

      return back()->with(['success' => 'Berhasil tambah rekening pemabayaran']);
    }
    return view('admin.rekening.list')->with(compact('reks'));
  }



  public function editRekening(Request $request, $id)
  {
    if ($request->isMethod('post')) {
      $rekenings = Rekening::findOrFail($id);
      $rekenings->no_rekening = $request->rek;
      $rekenings->bank =  $request->bank;
      $rekenings->pemilik =  $request->pemilik;
      $rekenings->save();
      return back()->with(['success'=>'Berhasil edit rekening']);
    }
    $reks = Rekening::paginate(5);
    $details = Rekening::where('id' , $id)->get();
    return view('admin.rekening.edit_rekening')->with(compact('reks','details'));
  }

  public function deleteRekening($id)
  {
    $rekenings = Rekening::findOrFail($id);
    $rekenings->delete();
    return redirect('rekening')->with(['success'=>'Berhasil hapus rekening']);
  }
}
