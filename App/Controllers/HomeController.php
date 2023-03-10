<?php
declare(strict_types=1);

namespace App\Controllers;

class HomeController
{
    public function index(): string
    {
        return view('home')->render();
    }

    public function test(): string
    {
        return view('test')->render();
    }
}