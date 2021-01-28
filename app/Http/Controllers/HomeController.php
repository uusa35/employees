<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $elements = User::with('position', 'title', 'social_status', 'certificate', 'children', 'salaries.employee_intervention', 'transportation')->paginate(50);
        $user = User::whereId(auth()->id())->with('position', 'title', 'social_status', 'certificate', 'children', 'salaries.employee_intervention', 'transportation')->first();
        return view('home', compact('elements','user'));
    }
}
