<?php

namespace App\Http\Controllers;

use App\Models\kost;
use App\Models\Sewa;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TransactionController extends Controller
{
    public function index()
    {
        // Mendapatkan pengguna yang sedang login
        $user = Auth::user();

        $sewa = Sewa::where('user_id', $user->id)->get();

        foreach ($sewa as $item) {
            $startDate = Carbon::parse($item->star_date);
            $endDate = Carbon::parse($item->end_date);
            $item->TotalJumlahSewa = $startDate->diffInMonths($endDate);
        }
        return view('user.sewaPerbulan.transaksi', compact('user', 'sewa'));
    }

    public function pembayaran($id)
    {
        $user = Auth::user();
        $sewa = Sewa::find($id);

        if (!$sewa) {
            return redirect()->route('user.transaksi')->with('error', 'Sewa yang Anda pilih tidak ditemukan');
        }

        return view('user.SewaPerbulan.pembayaran', compact('user', 'sewa'));
    }

    public function storePembayaran(Request $request, $id)
    {
        $request->validate([
            'image' => 'required|mimes: jpeg,jpg,png',
        ]);

        if ($request->Hasfile('image')) {
            $path = $request->file('image')->store('assets/BuktiPembayaran', 'public');
        }

        Sewa::whereId($id)->update([
            'image' => $path,
            'status' => 'Menunggu Konfirmasi'
        ]);

        toast('Berhasil Melakukan Pembayaran', 'success');

        return redirect('/transaksi-bulanan');
    }

    public function destroy($id)
    {
        $sewa = Sewa::find($id);

        if ($sewa) {
            Storage::delete('assets/BuktiPembayaran/' . $sewa->image); // Pastikan ada garis miring sebelum nama file
            $sewa->delete();
            toast('Berhasil Menghapus Sewa', 'success');
        } else {
            toast('Data Sewa tidak ditemukan', 'error');
        }

        return redirect('/transaksi-bulanan');
    }


    public function end($id)
    {
        // Temukan entri Sewa berdasarkan ID
        $sewa = Sewa::find($id);

        if ($sewa) {
            // Perbarui status Sewa menjadi "Selesai"
            $sewa->status = 'Selesai';
            $sewa->save();

            // Temukan entri Kost yang terkait
            $kost = Kost::find($sewa->kost_id);

            if ($kost) {
                // Perbarui status Kost menjadi "Ada"
                $kost->status = 'Ada';
                $kost->save();
            }

            toast('Berhasil Menyelesaikan Sewa', 'success');
        } else {
            toast('Sewa tidak ditemukan', 'error');
        }

        return redirect()->back();
    }

}
