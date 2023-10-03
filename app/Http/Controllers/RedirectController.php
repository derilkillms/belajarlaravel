<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function redirectTo() : string {

        return "Redirect To";

    }
    public function redirectFrom() : RedirectResponse {
        return redirect("redirect/to");
    }

    public function redirectHello(string $name) : string {
        return "Hello $name";
    }

    public function redirectName() : redirectResponse {
    return redirect()->route('redirect-hello', ['name' => 'Eko']);
    }

    public function redirectAction() : redirectResponse {
        return redirect()->action([RedirectController::class, 'redirectHello'], ['name' => 'Eko']);
    }

    public function redirectAway() : redirectResponse {
    return redirect()->away("https://www.derillab.com");
    }


}
