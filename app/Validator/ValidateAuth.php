<?php

namespace App\Validator;

use Validator;

class ValidateAuth
{
	public function validateUserData($arguments) {
        return Validator::make($arguments, [
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);
	}
	
	public function validateApplicationData($arguments) {
        return Validator::make($arguments, [
            'username' => 'required|string|max:255',
            'email' => 'required|string|min:5|email|max:255',
            'phone' => 'required|string|min:5|max:255',
            'text' => 'required|string|min:15|max:2550',
        ]);
	}
}