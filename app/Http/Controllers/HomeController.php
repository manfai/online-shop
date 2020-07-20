<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserAddress;
use App\Http\Requests\UserAddressRequest;
use Auth;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Auth::user()->deposit(100);
        return view('home',[
            'orders'=> Auth::user()->orders,
            'addresses'=>UserAddress::all(),
            'products'=>Product::all()->random(4),
        ]);

    }
 
    public function faqs()
    {
        // Auth::user()->deposit(100);
        return view('faqs');
    }

    public function blog()
    {
        return view('blog');
    }

    public function contact()
    {
        return view('contact');
    }
}
