<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class RegistrationController extends Controller
{
    //

    public function create(){
         
         return view('session.create');
    	
    }

    public function store(){
         
         //validate the form
         $this->validate(request(), [
             
             'name' => 'required',
             'email' => 'required'
         ]);

    	//create and save the user
        
        $user = User::create(request([
            
            'name',

            'email',

            'password'


        ]));

        //log user in

        auth()->login($user);

    	//redirect

    	return redirect()->home();
    }
}
