<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller; 

class ServicesController extends Controller
{
    //handle mage services request from the dashboard
    public static function manageServices(){

        return redirect()->route("Services");
     }

     public static function ViewmanageServices(){

        return view("Services");
     }
   
     //handle edit services requests
     public static function getEditservice()
     {
        return redirect()->route("editService"); 
     }

     public static function VieweditService(){

        return view("editService");
     }


     //handle services requests from the sidebar or from services 
    public static function getServices()
{
    
    $baseurl = 'https://efricaapi.malawinasheeds.com/api/v1/service/getAllServices';

    try {
       
        $response = Http::withHeaders([
            'Accept' => 'application/json',
        ])->timeout(60)->get($baseurl);

        
        if ($response->status() === 200) {
            
            $data = $response->json();

          
            $services = [];
            foreach ($data['data'] as $service) {
                $services[] = [
                    'title' => $service['title'],
                    'description' => $service['description'],
                ];
            }

            return view("getServices", compact('services'));
        } else if($response->status() === 401){
            
            return ["Unathorized Access"];
        }
        else if($response->status() === 403){
           
            return ["Forbidden Access"];
        }
        else {
            
            return ["Error Not Defined"];
        }
    } catch (\Exception $e) {
       
        return [$e->getMessage()];
    }
}

}
