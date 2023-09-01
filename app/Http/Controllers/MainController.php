<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomUser;

class MainController extends Controller
{
    public function home()
    {
        $users = new CustomUser();
        return view('home', ['users' => $users->all()->take(30)]);
    }
}
