<?php

namespace App\Http\Controllers;

use App\Models\Sewa;
use App\Models\SewaTahunan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransactionAdminController extends Controller
{
    public function Perbulan()
    {
        $sewa = Sewa::all();
        foreach ($sewa as $item) {
            $startDate = Carbon::parse($item->star_date);
            $endDate = Carbon::parse($item->end_date);
            $item->TotalJumlahSewa = $startDate->diffInMonths($endDate);
        }
        return view('admin.transactions.Perbulan',compact('sewa'));
    }
    public function Pertahun()
    {
        $sewa = SewaTahunan::all();
        foreach ($sewa as $item) {
            $startDate = Carbon::parse($item->star_date);
            $endDate = Carbon::parse($item->end_date);
            $item->TotalJumlahSewa = $startDate->diffInYears($endDate);
        }
        return view('admin.transactions.Pertahun',compact('sewa'));
    }

    public function konfirmasi_bulanan($id)
    {
        Sewa::findOrFail($id);
        
        Sewa::whereId($id)->update([
            'status' => 'Konfirmasi',
        ]);

        toast('Berhasil Melakukan Konfirmasi','success');

        return redirect()->back();

    }
    public function konfirmasi_tahunan($id)
    {
        SewaTahunan::findOrFail($id);
        
        SewaTahunan::whereId($id)->update([
            'status' => 'Konfirmasi',
        ]);

        toast('Berhasil Melakukan Konfirmasi','success');

        return redirect()->back();  

    }

    public function pageslaporanbulanan()
    {
        $sewa = Sewa::paginate(10);
        foreach ($sewa as $item) {
            $startDate = Carbon::parse($item->star_date);
            $endDate = Carbon::parse($item->end_date);
            $item->TotalJumlahSewa = $startDate->diffInMonths($endDate);
        }
        return view('admin.transactions.laporanPerbulan',compact('sewa'));
    }
    public function pageslaporantahunan()
    {
        $sewa = SewaTahunan::paginate(10);
        foreach ($sewa as $item) {
            $startDate = Carbon::parse($item->star_date);
            $endDate = Carbon::parse($item->end_date);
            $item->TotalJumlahSewa = $startDate->diffInYears($endDate);
        }
        return view('admin.transactions.laporanPertahun',compact('sewa'));
    }

    public function PrintLaporanBulanan()
    {
        $sewa = Sewa::where('status','Selesai')->paginate(10);
        foreach ($sewa as $item) {
            $startDate = Carbon::parse($item->star_date);
            $endDate = Carbon::parse($item->end_date);
            $item->TotalJumlahSewa = $startDate->diffInMonths($endDate);
        }
        return view('admin.transactions.printbulanan',compact('sewa'));
    }
    public function PrintLaporanTahunan()
    {
        $sewa = SewaTahunan::where('status','Selesai')->paginate(10);
        foreach ($sewa as $item) {
            $startDate = Carbon::parse($item->star_date);
            $endDate = Carbon::parse($item->end_date);
            $item->TotalJumlahSewa = $startDate->diffInYears($endDate);
        }
        return view('admin.transactions.printtahunan',compact('sewa'));
    }
}
