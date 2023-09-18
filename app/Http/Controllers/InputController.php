<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InputController extends Controller
{
   public function hello(Request $request)
   {
    $name = $request->input('name');
    return "Hello $name";
   }

   public function helloFirstName(Request $request)
   {
    $firstname = $request->input('name.first');
    return "Hello $firstname";
   }

  public function helloInput(Request $request) : string {
   $input = $request->input();
   return json_encode($input);
      
   }
}
