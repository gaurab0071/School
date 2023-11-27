<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

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
    public function index()
    {
        if (auth()->check()) {

            // dd(auth()->user()->roles->pluck('name')[0]);
            // if(auth()->user()->roles->pluck('name')[0]  === 'admin'){
            //                 return redirect("/dashboard");
            // }else if(auth()->user()->roles->pluck('name')[0]  === 'teacher'){

            //     return redirect("/dashboard");

            // }else{

            return redirect("/dashboard");
            // }
        } else {
            return redirect("login");
        }
    }
}
