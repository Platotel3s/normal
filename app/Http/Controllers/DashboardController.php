<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function statistik()
    {
        $userId = auth()->id();
        
        $genres = DB::table('genres')
            ->select('genres.namaGenre', DB::raw('count(bukus.id) as total'))
            ->leftJoin('bukus', function($join) use ($userId) {
                $join->on('genres.id', '=', 'bukus.genre_id')
                    ->where('bukus.user_id', '=', $userId);
            })
            ->groupBy('genres.namaGenre')
            ->orderBy('genres.namaGenre')
            ->get();

        return view('dashboard.statistik', compact('genres'));
    }
}