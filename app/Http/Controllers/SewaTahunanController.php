<?php

namespace App\Http\Controllers;

use App\Models\kost;
use App\Models\SewaTahunan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SewaTahunanController extends Controller
{
    public function sewatahunan($id)
    {
        $kost = kost::findOrFail($id);
        $user = Auth::user();
        return view('user.sewaPertahun.sewa', compact('kost', 'user'));
    }

    public function storepertahun(Request $request)
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
        $pricePerYears = $kost->price_years;

        // Calculate the rental duration in years
        $startDate = Carbon::parse($validatedData['star_date']);
        $endDate = Carbon::parse($validatedData['end_date']);
        $rentalDuration = $startDate->diffInYears($endDate);

        // Calculate the nominal value
        $nominalValue = $rentalDuration * $pricePerYears;

        // Add the nominal value to the validated data
        $validatedData['nominal'] = $nominalValue;

        // Create a new SewaTahunan entry with the calculated nominal value
        $sewa = SewaTahunan::create($validatedData);

        // Check if the Kost is rented out and update its status if needed
        $isRentedOut = SewaTahunan::where('kost_id', $validatedData['kost_id'])
            ->where('status', 'Konfirmasi')
            ->exists();

        if ($isRentedOut) {
            $kost->update(['status' => 'Tidak ada']);
        }

        toast('Berhasil Melakukan Sewa Tahunan', 'success');

        return redirect()->route('transaksi_tahunan');
    }


    public function editpertahun($id)
    {
        $sewa = SewaTahunan::findOrFail($id);
        $user = Auth::user();
        return view('user.sewaPertahun.updatesewa', compact('sewa', 'user'));
    }

    public function updatepertahun(Request $request, $id)
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

        // Fetch the SewaTahunan record
        $sewa = SewaTahunan::findOrFail($id);

        // Calculate the rental duration in months
        $startDate = Carbon::parse($validatedData['star_date']);
        $endDate = Carbon::parse($validatedData['end_date']);
        $rentalDuration = $startDate->diffInYears($endDate);

        // Calculate the nominal value
        $nominalValue = $rentalDuration * $sewa->kost->price_years;

        $validatedData['nominal'] = $nominalValue;
        $isRentedOut = SewaTahunan::where('kost_id', $validatedData['kost_id'])
            ->where('status', 'Konfirmasi')
            ->exists();

        // If the Kost is rented out, update its status to "Tidak Ada"
        if ($isRentedOut) {
            $sewa->kost->update(['status' => 'Tidak ada']);
        }

        // Update the SewaTahunan entry with the calculated nominal value
        $sewa->update($validatedData);

        // Set the status to "Menunggu Konfirmasi" after updating
        $sewa->update(['status' => 'Menunggu Konfirmasi']);

        toast('Berhasil Mengupdate SewaTahunan', 'success');

        return redirect()->route('transaksi_tahunan');
    }
}
