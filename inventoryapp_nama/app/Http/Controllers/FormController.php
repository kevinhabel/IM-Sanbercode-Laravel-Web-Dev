<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function registerutama(){
        return view('Register');
    }

    public function welcomeuser(Request $request){
          $firstname = $request->input('fname');
          $lastname = $request->input('lname');

          return view( 'Welcome', ['firstname' => $firstname, 'lastname' => $lastname]); 
    }
}

