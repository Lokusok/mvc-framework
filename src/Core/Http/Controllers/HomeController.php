<?php

declare(strict_types=1);

namespace App\Core\Http\Controllers;

class HomeController
{
    public function index()
    {
        return view('home');
    }
}