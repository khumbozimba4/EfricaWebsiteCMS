<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller; 

class ArticlesController extends Controller
{
    //
    public static function getArticles()
{
    // Define the API endpoint URL
    $baseurl = 'https://efricaapi.malawinasheeds.com/api/v1/article/getAllArticles';

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
            $articles = [];
            foreach ($data['data'] as $article) {
                $articles[] = [
                    'title' => $article['title'],
                    'content' => $article['content'],
                   
                ];
            }

            return view("getArticles", compact('articles'));
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

//add articles to the database

public function addArticle(Request $request)
{
    return redirect()->route("addArticle");
}

public static function saveArticle(Request $request)
{
    // Define the API endpoint URL for adding articles
    $baseurl = 'https://efricaapi.malawinasheeds.com/api/v1/article/addArticle';

    try {
        // Validate the form data, including the image upload
        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation rules as needed
        ]);
 
        // Handle the image upload
        $imagePath = $request->file('image')->store('article_images', 'public');
        $photo_url = '/storage/' . $imagePath; // Adjust the URL format as needed

        // Define the data to be sent in the request, including the image URL
        $data = [
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'photo_url' => $photo_url,
        ];
       
        // Make the HTTP POST request to the API
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            // You may need to add other headers if required by the API
        ])->timeout(60)->post($baseurl, $data);

        // Check if the request was successful (status code 200)
        if ($response->status() === 200) {
            dd(3);
            // Parse the JSON response if needed
            $result = $response->json();

            // Handle the response as needed
            if ($result['success']) {
                // Article was added successfully
                return redirect()->route('getArticles')->with('success', 'Article added successfully');
            } else {
                // Handle the case where the API reports an error
                return redirect()->back()->with('error', 'Failed to add article: ' . $result['message']);
            }
        } else if ($response->status() === 401) {
            // Handle other HTTP response status codes here
            return redirect()->back()->with('error', 'Unauthorized Access');
        } else if ($response->status() === 403) {
            // Handle other HTTP response status codes here
            return redirect()->back()->with('error', 'Forbidden Access');
        } else {
            // Handle other HTTP response status codes here
            return redirect()->back()->with('error', 'Error Not Defined');
        }
    } catch (\Exception $e) {
        // Capture and handle the specific error message
        return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
    }
}


}
