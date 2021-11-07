<?php

namespace App\Http\Controllers\RenderView;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RenderViewController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function register() {
        return view('auth.register');
    }

    public function welcome(){
        return view('welcomes.partial.contentWelcome');
    }

    public function items() {
        return view('products.items');
    }

    public function category() {
        return view('categories.categories');
    }

    public function brand() {
        return view('brands.brands');
    }

    public function renderModal($modal) {
        return view('Modal.' . $modal);
    }
}
