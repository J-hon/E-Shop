<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function getContact()
    {
        return view('pages.contact');
    }

    public function getAbout()
    {
        return view('pages.about');
    }
}
