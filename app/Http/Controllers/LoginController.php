<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Routing\Controller as BaseController;

class LoginController extends Controller
{
    //
     public function login(Request $request)
    {
        return redirect()->route("dashboard");
    }

   public function dashboard()  {
       return view('dashboard'); 
    }
}
