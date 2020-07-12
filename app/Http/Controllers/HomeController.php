<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;

class HomeController extends Controller {

    public function index() {
        return view('layouts.Index');
    }

}
