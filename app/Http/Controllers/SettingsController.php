<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller; 

class SettingsController extends Controller
{
    //hander users requets from the dashboard
    public static function manageSettings(){

        return redirect()->route("Settings");
     }

     public static function ViewmanageSettings(){

        return view("Settings");
     }
    
     // handle edit settings requests
     public static function getEditsettings()
     {
        return redirect()->route("editSettings"); 
     }

     public static function VieweditSettings(){

        return view("editSettings");
     }

    
    // handle view user settings from the sidebar
    public static function getSettings()
{
    $baseurl = 'https://efricaapi.malawinasheeds.com/api/v1/setting/getAllSettings';

    try {
        // Make the HTTP request to the API
        $response = Http::withHeaders([
            'Accept' => 'application/json',
        ])->timeout(60)->get($baseurl);

        // Check if the request was successful (status code 200)
        if ($response->status() === 200) {
            // Parse the JSON response
            $data = $response->json();

            // Extract and return the names and emails
            $settings = [];
            foreach ($data['data'] as $setting) {
                $settings[] = [
                    'key' => $setting['key'],
                    'value' => $setting['value'],
                ];
            }

            return view("getSettings", compact('settings'));
        } else if($response->status() === 401){
            // Handle other HTTP response status codes here
            return ["Unathorized Access"];
        }
        else if($response->status() === 403){
            // Handle other HTTP response status codes here
            return ["Forbidden Access"];
        }
        else {
            // Handle other HTTP response status codes here
            return ["Error Not Defined"];
        }
    } catch (\Exception $e) {
        // Capture and handle the specific error message
        return [$e->getMessage()];
    }
}

}
