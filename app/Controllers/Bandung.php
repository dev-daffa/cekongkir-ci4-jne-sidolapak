<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Bandung extends BaseController
{
    public function index()
    {
		return view('bandung');
    }
}
