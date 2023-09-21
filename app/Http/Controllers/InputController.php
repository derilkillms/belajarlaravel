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

   public function arrayInput(Request $request) : string {
      $names = $request->input("products.*.name");
      return json_encode($names);
   }

   public function inputType(Request $request) : string {
      $name = $request->input('name');
      $married = $request->boolean('married');
      $birthDate = $request->date('birth_date','Y-m-d');

      return json_encode([
          'name'=> $name,
          'married'=> $married,
          'birth_date' => $birthDate->format('Y-m-d')
      ]);
      
  }
}
