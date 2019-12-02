<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application;
use Validator;
use ValidateAuth;

class WelcomeController extends Controller
{
    public function index () {
	    return view('welcome')->with(["redirectTo" => route('welcome')]);
	}

    public function save (Request $request) {
    	ValidateAuth::validateApplicationData($request->all())->validate();
    	$this->create($request->all());

    	session()->flash('messageServer', 'Обращение отправлено!');
    	return redirect()->route('welcome');
	}

    private function create ($arguments) {        
    	Application::create([
            'username' => $arguments['username'],
            'email' => $arguments['email'],
            'phone' => $arguments['phone'],
            'text' => $arguments['text'],
        ]);
	}
}
