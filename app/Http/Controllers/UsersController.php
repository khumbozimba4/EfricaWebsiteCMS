<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller; 


class UsersController extends Controller
{

    public static function GetUsers()
{
    // Define the API endpoint URL
    $baseurl = 'https://efricaapi.malawinasheeds.com/api/v1/user/getAllUsers';

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
            $users = [];
            foreach ($data['data'] as $user) {
                $users[] = [
                    'name' => $user['name'],
                    'email' => $user['email'],
                ];
            }

            return view("getUsers", compact('users'));
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

