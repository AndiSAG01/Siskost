<?php

namespace App\Http\Controllers;

use App\Models\kost;
use App\Models\Sewa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SewaController extends Controller
{
    public function sewa($id)
    {
        $kost = kost::findOrFail($id);
        $user = Auth::user();
        return view('user.sewaPerbulan.sewa', compact('kost', 'user'));
    }

    public function sewaPerbulan(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'phone' => 'required|string|max:13',
            'gender' => 'required|string|max:100',
            'star_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:star_date',
            'kost_id' => 'required|exists:kosts,id',
            'user_id' => 'required|exists:users,id',
            'nominal' => 'string',
        ]);
    
        // Fetch the Kost record
        $kost = Kost::findOrFail($validatedData['kost_id']);
        $pricePerMonth = $kost->price_month;
    
        // Calculate the rental duration in months
        $startDate = new Carbon($validatedData['star_date']);
        $endDate = new Carbon($validatedData['end_date']);
        $rentalDuration = $startDate->diffInMonths($endDate);
    
        // Calculate the nominal value
        $nominalValue = $rentalDuration * $pricePerMonth;
    
        // Add the nominal value to the validated data
        $validatedData['nominal'] = $nominalValue;
    
        // Create a new Sewa entry with the calculated nominal value
        $sewa = Sewa::create($validatedData);
    
        // Check if the Kost is rented out and update its status if needed
        $isRentedOut = Sewa::where('kost_id', $validatedData['kost_id'])
            ->where('status', 'Konfirmasi')
            ->exists();
    
        if ($isRentedOut) {
            $kost->update(['status' => 'Tidak ada']);
        }
    
        toast('Berhasil Melakukan Sewa', 'success');
    
        return redirect()->route('transaksi');
    }
    

    public function pageupdatesewa($id)
    {
        $sewa = Sewa::findOrFail($id);
        $user = Auth::user();
        return view('user.sewaPerbulan.updatesewa', compact('sewa', 'user'));
    }

    public function updatesewa(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'phone' => 'required|string|max:13',
            'gender' => 'required|string|max:100',
            'star_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:star_date',
            'kost_id' => 'required|exists:kosts,id',
            'user_id' => 'required|exists:users,id',
            'nominal' => 'numeric',
        ]);

        // Fetch the Sewa record
        $sewa = Sewa::findOrFail($id);

        // Calculate the rental duration in months
        $startDate = new Carbon($validatedData['star_date']);
        $endDate = new Carbon($validatedData['end_date']);
        $rentalDuration = $startDate->diffInMonths($endDate);

        // Calculate the nominal value
        $nominalValue = $rentalDuration * $sewa->kost->price_month;

        $validatedData['nominal'] = $nominalValue;
        $isRentedOut = Sewa::where('kost_id', $validatedData['kost_id'])
            ->where('status', 'Konfirmasi')
            ->exists();

        // If the Kost is rented out, update its status to "Tidak Ada"
        if ($isRentedOut) {
            $sewa->kost->update(['status' => 'Tidak ada']);
        }

        // Update the Sewa entry with the calculated nominal value
        $sewa->update($validatedData);

        // Set the status to "Menunggu Konfirmasi" after updating
        $sewa->update(['status' => 'Menunggu Konfirmasi']);

        toast('Berhasil Mengupdate Sewa', 'success');

        return redirect()->route('transaksi');
    }
}
