<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function create() {
        return view('form');
    }

    public function process(Request $request) {
        return view('halo', [
            'data' => $request->all()
        ]);
    }
}
