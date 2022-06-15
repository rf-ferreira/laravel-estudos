<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function viewAdmin()
    {
        return view('admin.index');
    }

    public function viewModerator()
    {
        return view('moderator.index');
    }
}
