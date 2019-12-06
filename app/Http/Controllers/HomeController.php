<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Joboffer;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if (Auth::check()) {

            $role_id = Auth::user()->role_id;
            echo $role_id;
        }
        echo 'role ' . $request->user()['role_id'];

        return view('home');
    }

    public function mainpage(Request $request)
    {
        $role_id = -1;
        if (Auth::check()) {
            $role_id = Auth::user()->role_id;
            $jobs = Joboffer::orderBy('updated_at', 'desc')->get();
            return view('mainpage', ['role_id' => $role_id, 'jobs' => $jobs, 'auth' => true]);
        }


        return view('mainpage', ['auth' => false]);
    }


}
