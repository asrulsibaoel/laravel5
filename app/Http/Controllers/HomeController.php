<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Log;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        $roles = \App\Roles::all();
        $user = \App\User::all();
        return view('home')
        ->with([
            'roles' => $roles,
            'user' => $user
        ]);
    }
}
