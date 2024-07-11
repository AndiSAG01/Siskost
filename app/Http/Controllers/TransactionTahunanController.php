<?php

namespace App\Http\Controllers;

use App\Models\kost;
use App\Models\SewaTahunan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TransactionTahunanController extends Controller
{
    public function pages()
    {
        // Mendapatkan pengguna yang sedang login
        $user = Auth::user();

        $sewa = SewaTahunan::where('user_id', $user->id)->get();

        foreach ($sewa as $item) {
            $startDate = Carbon::parse($item->star_date);
            $endDate = Carbon::parse($item->end_date);
            $item->TotalJumlahSewa = $startDate->diffInYears($endDate);
        }
        return view('user.sewaPertahun.transaction', compact('user','sewa'));
    }

    public function payment($id)
    {
        $user = Auth::user();
        $sewa = SewaTahunan::find($id);
        return view('user.sewaPertahun.pembayaran', compact('user','sewa'));
    }

    public function storePayment(Request $request,$id)
    {
       $request->validate([
        'image' => 'required|mimes: jpeg,jpg,png',
       ]);

       if($request->Hasfile('image')){
        $path = $request->file('image')->store('assets/BuktiPembayaran','public');
       }

       SewaTahunan::whereId($id)->update([
        'image' => $path,
        'status' => 'Menunggu Konfirmasi'
       ]);

       toast('Berhasil Melakukan Pembayaran','success');

       return redirect('/transaksi-tahunan');
    }

    public function History()
    {
        $user = Auth::user();
        $sewa = SewaTahunan::where('user_id', $user->id)->get();

        return view('user.history', compact('user', 'sewa'));
    }

    public function destroy($id)
    {
        $sewa = SewaTahunan::find($id);

        if ($sewa) {
            Storage::delete('assets/BuktiPembayaran/' . $sewa->image); // Pastikan ada garis miring sebelum nama file
            $sewa->delete();
            toast('Berhasil Menghapus Sewa', 'success');
        } else {
            toast('Data Sewa tidak ditemukan', 'error');
        }

        return redirect('/transaksi-tahunan');
    }

    public function End($id)
    {
        // Temukan entri SewaTahunan berdasarkan ID
        $sewa = SewaTahunan::find($id);
    
        if ($sewa) {
            // Perbarui status SewaTahunan menjadi "Selesai"
            $sewa->status = 'Selesai';
            $sewa->save();
    
            // Temukan entri Kost yang terkait
            $kost = kost::find($sewa->kost_id);
    
            if ($kost) {
                // Perbarui status Kost menjadi "Ada"
                $kost->status = 'Ada';
                $kost->save();
            }
    
            toast('Berhasil Menyelesaikan Sewa Tahunan', 'success');
        } else {
            toast('SewaTahunan tidak ditemukan', 'error');
        }
    
        return redirect()->back();
    }
}
