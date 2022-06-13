<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home () {
        $sliders = Slider::orderBy('serial', 'asc')->get();
        return view('frontend.index', compact('sliders'));
    }

    public function admin () {
        return view('backend.index');
    }
}
