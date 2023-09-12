<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function users(Request $request)
    {
        return redirect()->route("adduser");
    }

   public function adduser ()  {
       return view('createuser'); 
    }

    public function articles(Request $request)
    {
        return redirect()->route("addarticle");
    }

   public function addarticle ()  {
       return view('createarticle'); 
    }

    public function services(Request $request)
    {
        return redirect()->route("addservice");
    }

   public function addservice ()  {
       return view('createservice'); 
    }

    public function sertings(Request $request)
    {
        return redirect()->route("addsetting");
    }

   public function addsetting ()  {
       return view('createsetting'); 
    }
}
