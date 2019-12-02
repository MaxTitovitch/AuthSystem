<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application;
use App\Editing;

class EditingController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index($id) {
        $editings = Application::find($id)->editings;
        return view('editing')->with(['editings' => $editings]);
    }
}
