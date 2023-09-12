<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller; 

class ArticlesController extends Controller
{
    
    //handle manage articles request from the dashboard
    public static function manageArticles(){

        return redirect()->route("Articles");
     }

     public static function ViewmanageArticles(){

        return view("Articles");
     }

     // handle edit article requests.
     public static function getEditarticle()
     {
        return redirect()->route("editArticle"); 
     }

     public static function VieweditArticle(){

        return view("editArticle");
     }

    

     //handle articles requests from the sidebar
    public static function getArticles()
{
    
    $baseurl = 'https://efricaapi.malawinasheeds.com/api/v1/article/getAllArticles';

    try {
        
        $response = Http::withHeaders([
            'Accept' => 'application/json',
        ])->timeout(60)->get($baseurl);

        
        if ($response->status() === 200) {
           
            $data = $response->json();

          
            $articles = [];
            foreach ($data['data'] as $article) {
                $articles[] = [
                    'title' => $article['title'],
                    'content' => $article['content'],
                   
                ];
            }

            return view("getArticles", compact('articles'));
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
        
        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation rules as needed
        ]);
 
        
        $imagePath = $request->file('image')->store('article_images', 'public');
        $photo_url = '/storage/' . $imagePath; // Adjust the URL format as needed

        
        $data = [
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'photo_url' => $photo_url,
        ];
       
        
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            // You may need to add other headers if required by the API
        ])->timeout(60)->post($baseurl, $data);

        
        if ($response->status() === 200) {
            dd(3);
            // Parse the JSON response if needed
            $result = $response->json();

            
            if ($result['success']) {
                
                return redirect()->route('getArticles')->with('success', 'Article added successfully');
            } else {
        
                return redirect()->back()->with('error', 'Failed to add article: ' . $result['message']);
            }
        } else if ($response->status() === 401) {
            
            return redirect()->back()->with('error', 'Unauthorized Access');
        } else if ($response->status() === 403) {
            
            return redirect()->back()->with('error', 'Forbidden Access');
        } else {
            
            return redirect()->back()->with('error', 'Error Not Defined');
        }
    } catch (\Exception $e) {
        
        return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
    }
}


}
