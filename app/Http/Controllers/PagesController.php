<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use Mail;
use Session;
class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        /*$posts=Post::orderBy('created_at','desc')->limit(4)->get();
        return view('pages.welcome')->withPosts($posts);*/
        $posts=Post::orderBy('id','desc')->limit(4)->get();
        return view('pages.welcome')->with('Posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAbout()
    {
        return view('pages.about');
    }
    public function getContact()
    {
            return view('pages.contact');
    }
    public function postContact(Request $request)
    {
           $this->validate($request,
            ['email' => 'required|email',
             'subject'=>'required|min:5',
             'message'=>'required|min:15'
            ]);
    $data = array(
        'email'=>$request->email,
        'subject'=>$request->subject,
        'bodymessage'=>$request->message//here we cant use message instead of bodymessage. because we cant send message variable to the view because message variable is already used by the laravel default.
        );
        Mail::send('emails.contact',$data,function($message) use ($data)//emails.contact is view here
        {
            $message->from($data['email']);
            $message->to('forhad095@gmail.com');
            $message->subject($data['subject']);
        });
        Session::flash('success','Done! Your message has been sent');
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
