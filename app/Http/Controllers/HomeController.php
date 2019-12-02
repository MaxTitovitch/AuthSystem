<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application;
use App\Editing;
use Auth;
use Validator;
use ValidateAuth;

class HomeController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $applications = Application::all();
        return view('home')->with(['applications' => $applications]);
    }

    public function overview($id) {
        $this->updateEditing(Application::find($id));
        return redirect()->route('home');
    }

    public function delete($id) {
        Application::find($id)->delete();
        return redirect()->route('home');
    }

    public function edit($id) {        
        $application = Application::find($id);
        session()->flash('username', $application->username);
        session()->flash('email', $application->email);
        session()->flash('phone', $application->phone);
        session()->flash('text', $application->text);
        return view('welcome')->with(["redirectTo" => route('update', [$id])]);
    }

    public function update(Request $request, $id) {
        ValidateAuth::validateApplicationData($request->all())->validate();
        $this->updateApplication($request->all(), $id);
        return redirect()->route('home');
    }

    private function updateEditing($application, $isReviewed = false) {
        $application->overview = $application->overview == "Not reviewed" || $isReviewed ? "Reviewed" : "Not reviewed";
        $application->save();
        $this->createEditing($application->id);
    }

    private function createEditing($id){
        Editing::create([
            'user_id' => Auth::id(),
            'application_id' => $id
        ]);
    }

    private function updateApplication ($arguments, $id) {        
        $application = $this->updateApplicationModel($arguments, $id)
        $this->updateEditing($application, true);
        $this->createEditing($application->id);
    }

    private function updateApplicationModel ($arguments, $id) {        
        $application = Application::find($id);
        $application->username = $arguments['username'];
        $application->email = $arguments['email'];
        $application->phone = $arguments['phone'];
        $application->text = $arguments['text'];
        $application->save();
        return $applications;
    }

}
