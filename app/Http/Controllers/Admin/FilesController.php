<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class FilesController extends Controller
{
    public function files()
    {
        return view('files');
    }
}
