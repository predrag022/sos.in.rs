<?php

namespace App\Http\Controllers\Frontend;

use App\Block;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $title = Block::where('code', 'contact_page')->first();
        $mainText = Block::where('code', 'homepage_text')->first();
        $bottomText = Block::where('code', 'homepage_footer')->first();
        return view('frontend', compact('mainText', 'bottomText', 'title'));
    }
}
