<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class settingsController extends Controller
{
    public function managePayment()
    {
        return view('adminPanel.settings.generalserrings.view');
    }
}
