<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){

        return view('index')->with([
            //
        ]);

    }

    public function about(Request $request){

        return view('about')->with([
            'title' => 'About us'
        ]);

    }

    public function knetmart(Request $request){

        return view('knetmart')->with([
            'title' => 'Knet Mart'
        ]);

    }

    public function faq(Request $request){

        return view('faq')->with([
            'title' => 'FAQ'
        ]);

    }

    public function bookhuts(Request $request){

        return view('bookhut')->with([
            'title' => 'BookHuts'
        ]);

    }

    public function contacts(Request $request){

        return view('contact')->with([
            'title' => 'Contact Us'
        ]);

    }

    public function privacy(Request $request){

        return view('privacy')->with([
            'title' => 'Privacy Policy'
        ]);

    }

    public function terms(Request $request){

        return view('terms')->with([
            'title' => 'Terms & Condition'
        ]);

    }
}
