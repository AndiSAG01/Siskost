<?php

namespace App\Http\Controllers;

use App\Http\Requests\CostumerRequest;
use App\Models\Costumer;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;

class CostumerController extends Controller
{
    public function index()
    {
        $costumers = User::where('isAdmin', 0)->paginate(10);
        return view('admin.costumer.index', compact('costumers'));
    }

    public function show($id)
    {
        $costumer = User::find($id);
        return view('admin.costumer.preview', compact('costumer'));
    }

    public function delete(User $user)
    {
        $user->delete();
        toast('Berhasil Menghapus Data Costumer', 'error');
        return redirect()->route('admin.costumer.index');
    }

    public function laporan()
    {
        $costumers = User::where('isAdmin', 0)->paginate(10); // Menggunakan paginasi dengan 10 item per halaman
        return view('admin.costumer.laporan', compact('costumers'));
    }

    public function print()
    {
        $costumers = User::where('isAdmin',0)->get();
        return view('admin.costumer.print',compact('costumers'));
    }

  
}
