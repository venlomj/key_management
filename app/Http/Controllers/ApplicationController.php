<?php

namespace App\Http\Controllers;

abstract class ApplicationController
{
    public function __invoke()
    {
        return view('home');

    }
}
