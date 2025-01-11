<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HistoryController extends Controller
{
    public function index()
    {
        $borrows = Borrow::all();

        foreach ($borrows as $borrow) {
            $borrow->status = 'Belum Kembali'; // Default status

            if ($borrow->return) {

                $dueDate = Carbon::parse($borrow->created_at)->addDays(7); 
                $returnDate = Carbon::parse($borrow->updated_at); 

                if ($returnDate->gt($dueDate)) {

                    $borrow->status = 'Telat';
                } else {

                    $borrow->status = 'On Time';
                }
            } elseif ($borrow->created_at->lt(Carbon::now()->subDays(7))) {
                // Jika buku belum dikembalikan dan sudah lebih dari 7 hari
                $borrow->status = 'Telat';
            }

            // Set warna status
            $borrow->status_color = $borrow->status == 'Telat' ? 'red' : ($borrow->status == 'On Time' ? 'green' : 'yellow');
        }

        return view('history', compact('borrows'));
    }
}
