<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomUser;
use Illuminate\Support\Facades\DB;

class StatsController extends Controller
{
    public function home()
    {
        $users = new CustomUser();

        return view('stats', [
            'count' => $users->count(), 
            'averageAge' => number_format($users->avg('age'),1),
            'users' => $users
                        ->all()
                        ->take(30)
        ]);
    }

    public function getUsersByName(Request $request)
    {
        $users = new CustomUser();
        $result = $users
                    ->where('first_name', $request->get('name'))
                    ->get();

        return view('stats', [
            'count' => $result->count(), 
            'averageAge' => number_format($result->avg('age'),1),
            'users' => $result
        ]);
    }

    public function getUsersByAgeRange(Request $request)
    {
        $users = new CustomUser();
        $result = $users
                    ->whereBetween('age',[$request->get('min'), $request->get('max')])
                    ->get();

        return view('stats', [
            'count' => $result->count(), 
            'averageAge' => number_format($result->avg('age'),1),
            'users' => $result
        ]);
    }

    public function getPopularNames()
    {
        $users = new CustomUser();
        $result = $users
                    ->select('first_name', DB::raw('count(*) as count'))
                    ->groupBy('first_name')
                    ->orderBy('count', 'desc')
                    ->take(30)
                    ->get();
            ;

        return view('popularNames', [
            'count' => 30, 
            'averageAge' => number_format($result->avg('age'),1),
            'users' => $result
        ]);
    }
}
