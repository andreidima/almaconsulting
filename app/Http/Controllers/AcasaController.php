<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
use Illuminate\Support\Str;
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
        $proiecteByStareContract = Proiect::with('proiectTip')
            ->orderBy('stare_contract')
            ->get()
            ->groupBy(function($item) {
                $original = $item->stare_contract; // e.g. " De redactat contract ", "de  redactat contract"

                // 1) Normalize whitespace: trim + convert any run of whitespace into a single space
                $clean = Str::of($original)
                    ->trim()        // removes leading/trailing (including NBSP, tabs, newlines)
                    ->squish()      // replaces any sequence of whitespace (ASCII or NBSP/tabs) with a single regular space

                    // 2) Strip diacritics/accented characters → plain ASCII
                    ->ascii()

                    // 3) Lowercase the whole thing
                    ->lower();

                // → e.g. "de redactat contract"
                return $clean->toString();
            });

        return view('acasa', compact(
            'allProiecteCount',
            'proiecteThisMonth',
            'proiecteLastMonth',
            'proiecteByStareContract'
        ));
    }
}
