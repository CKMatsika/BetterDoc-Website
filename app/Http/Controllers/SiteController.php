<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class SiteController extends Controller
{
    public function home(): View
    {
        return view('pages.home');
    }

    public function features(): View
    {
        return view('pages.features');
    }

    public function solutionsDefence(): View
    {
        return view('pages.solutions.defence');
    }

    public function solutionsBanking(): View
    {
        return view('pages.solutions.banking');
    }

    public function solutionsCorporate(): View
    {
        return view('pages.solutions.corporate');
    }

    public function security(): View
    {
        return view('pages.security');
    }

    public function deployment(): View
    {
        return view('pages.deployment');
    }

    public function howWeWork(): View
    {
        return view('pages.how-we-work');
    }

    public function faq(): View
    {
        return view('pages.faq');
    }

    public function about(): View
    {
        return view('pages.about');
    }

    public function contact(): View
    {
        return view('pages.contact');
    }

    public function privacy(): View
    {
        return view('pages.privacy');
    }

    public function terms(): View
    {
        return view('pages.terms');
    }

    public function thankYou(): View
    {
        return view('pages.thank-you');
    }
}
