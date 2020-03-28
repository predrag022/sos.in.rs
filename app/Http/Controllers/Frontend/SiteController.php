<?php

namespace App\Http\Controllers\Frontend;

use App\Block;
use App\FaqCategory;
use App\FaqQuestion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
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
    public function kontakt()
    {
        $title = 'Kontakt';
        $page = Block::where('code', 'contact_page')->first();
        return view('frontend.page', compact('title', 'page'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function uputstvo()
    {
        $title = 'Uputstvo';
        $page = Block::where('code', 'uputstvo')->first();
        return view('frontend.page', compact('title', 'page'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function faq()
    {
        $title = 'Najčešće postavljana pitanja';
        $faqs = FaqQuestion::all();

        return view('frontend.faq', compact('title', 'faqs'));
    }
}
