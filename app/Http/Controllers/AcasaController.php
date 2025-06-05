<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Models\Proiect;

class AcasaController extends Controller
{
    public function acasa()
    {
        // Define date ranges
        $startOfThisMonth = Carbon::now()->startOfMonth();
        $startOfLastMonth = Carbon::now()->subMonth()->startOfMonth();
        $endOfLastMonth   = Carbon::now()->subMonth()->endOfMonth();

        // 1. Count projects by data_contract
        $allProiecteCount   = Proiect::count();
        $proiecteThisMonth  = Proiect::whereDate('data_contract', '>=', $startOfThisMonth)->count();
        $proiecteLastMonth  = Proiect::whereBetween('data_contract', [$startOfLastMonth, $endOfLastMonth])->count();

        // 2. Retrieve projects grouped by their status along with the counts
        $proiecteByStareContract = Proiect::orderBy('stare_contract')
            ->get()
            ->groupBy('stare_contract');

        return view('acasa', compact(
            'allProiecteCount',
            'proiecteThisMonth',
            'proiecteLastMonth',
            'proiecteByStareContract'
        ));
    }
}
