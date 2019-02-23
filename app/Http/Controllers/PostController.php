<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use App\Category;
use Session;
use Image;
use Storage;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
        $posts = Post::all();
        For showing all pages.
        */
        //for showing specifice page with pagination and order.

        $posts=Post::orderBy('id','desc')->paginate(5);
        return view('posts.index')->with('posts',$posts);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate data
        $this->validate($request,array(
                'title'       =>'required|max:255',
                'slug'        =>'required|alphadash|min:5|max:255|unique:posts,slug',
                'category_id' => 'required|integer',
                'feature_image'=>'sometimes|image',
                'body'        =>'required',
            ));
        // store in to data base
        $post = new Post;
        $post->title=$request->title;
        $post->slug=$request->slug;
        $post->category_id=$request->category_id;
        $post->body=$request->body;

        if ($request->hasFile('feature_image')) {
            $image = $request->file('feature_image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/'.$filename);
            Image::make($image)->resize(800,400)->save($location);
            $post->image=$filename;
        }


        $post->save();
        $post->tags()->sync($request->tags,false);
        Session::flash('success','Post is created successfully');
        //redirect to other page
        return redirect()->route('posts.show',$post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        $cats = array();
        foreach ($categories as $category) {
            $cats[$category->id] = $category->name;
        }
        $tags = Tag::all();
        $tags2=array();
        foreach ($tags as $tag) {
            $tag2[$tag->id]=$tag->name;
        }
        return view('posts.edit')->with('post',$post)->withCategories($cats)->withTags($tag2);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       /* validate the data*/
       // check if weather the slug is changed or not. if not then if otherwise else
       // $post = Post::find($id);
      /*  if ($request->input('slug') == $post->slug) {
            $this->validate($request,array(
                'title'=>'required|max:255',
                'categroy_id' =>'required'|'integer',
                'body'=>'required',
            ));
        }
        else
        {
         $this->validate($request,array(
                'title'=>'required|max:255',
                'slug'=>'required|alphadash|min:5|max:255|unique:posts,slug',
                'catgeroy_id' =>'required'|'integer',
                'body'=>'required',
            ));
     }*/
     $this->validate($request,array(
                'title'=>'required|max:255',
                'slug'=>"required|alphadash|min:5|max:255|unique:posts,slug,$id",
                'catgeroy_id' =>'required'|'integer',
                'body'=>'required',
                'feature_image'=>'image'
            ));
     /*validate the data*/
        //Save data into data base or Update data.
        $post = Post::find($id);
        $post->title=$request->input('title');
        $post->slug=$request->input('slug');
        $post->category_id=$request->input('category_id');
        $post->body=$request->input('body');

        if ($request->hasFile('feature_image')) {
            $image = $request->file('feature_image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/'.$filename);
            Image::make($image)->resize(800,400)->save($location);
           
            if (!empty($post->image)) {
                  $oldfilename=$post->image;
                  $post->image=$filename;
                  Storage::delete($oldfilename);
            }
           $post->image=$filename;
            
        }

        $post->save();

        //Set flash messgae 
        if (isset($request->tags)) {
            $post->tags()->sync($request->tags);
        }
        else
        {
            $post->tags()->sync(array());
        }

        Session::flash('success','Updated Sucessfully');

        //redirect to the page
        return redirect()->route('posts.show',$post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //find the post using passed id
        $post = Post::findorfail($id);
        $post->tags()->detach();
        if(!empty($post->image)){
        Storage::delete($post->image);
        }
        $post->delete();
        return redirect()->route('posts.index')->with('denger-success','File is deleted successfully');
    }
}
