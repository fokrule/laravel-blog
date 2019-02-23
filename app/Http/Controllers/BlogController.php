<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
class BlogController extends Controller
{
    public function getIndex(){
        $posts = Post::paginate(5);
        return view('blog.index')->withPosts($posts);
    }

    public function getSingle($slug)
    {
        //fetch from db based od slug
        $post = Post::where('slug' ,'=', $slug)->first();
        //here 'slug' means db coumn and $slug means parameater that are coming through getSingle method. and first means fetch only one result, we can use get. but first is faster than get for fetching single post.
        //return the post & post in the post object

        return view('blog.single')->withPost($post);
    }
}
