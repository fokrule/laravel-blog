<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\course;
class coursecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $alldata = course::orderby('course_title');
        $course_title = $request->input('course_title');
        if (!empty($course_title)) {
            $alldata->where('course_title','LIKE','%'.$course_title.'%');
            
        }
    $alldata=$alldata->paginate(5);
        return view('index',compact('alldata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
    return view('course.create');
    }
    return redirect('auth/login');    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*For individual output*/
       /* $course_title = $request->input('course_title');
        return $course_title;*/
        /*for all output*/
        $input = $request->all();
        course::create($input);
        return redirect('course');
        
    }

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
        if (Auth::check()) {
    $course = course::findorFail($id);
        return view('course.edit',compact('course'));
}
        return redirect('auth/login');    
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
        if (Auth::check()) {
    $input = $request->all();
         $data = course::findorFail($id);
         $data->update($input);
         return redirect('course');
}
         return redirect('auth/login');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::check()) {
    $data = course::findorFail($id);
         $data->delete();
         return redirect('course');
}
         
         return redirect('auth/login');    
    }
}
