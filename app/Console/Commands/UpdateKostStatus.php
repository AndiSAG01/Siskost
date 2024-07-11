<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\Sewa;
use App\Models\Kost;

class UpdateKostStatus extends Command
{
    protected $signature = 'update:kost-status';
    protected $description = 'Update Kost status to "Ada" if the rental period has ended';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $now = Carbon::now();

        // Fetch all rentals that have ended
        $endedRentals = Sewa::where('end_date', '<', $now)
                            ->where('status', 'Konfirmasi')
                            ->get();

        foreach ($endedRentals as $rental) {
            // Update the status of the associated Kost to "Ada"
            $kost = Kost::find($rental->kost_id);
            if ($kost) {
                $kost->update(['status' => 'Ada']);
            }
        }

        $this->info('Kost status updated successfully.');
    }
}

