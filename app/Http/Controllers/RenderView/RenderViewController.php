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

    public function items() {
        return view('products.items');
    }

    public function renderModal($modal) {
        return view('Modal.' . $modal);
    }
}
