<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IntegrationController extends Controller
{
    public function settings()
    {
        return view('integration.settings');
    }
}
