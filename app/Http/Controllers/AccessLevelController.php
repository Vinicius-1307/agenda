<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AccessLevelController extends Controller
{
    public function index(): View
    {
        return view('access-level.access-level');
    }
}
