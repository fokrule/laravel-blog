<!DOCTYPE html>
<html>
<head>
	<title>Add Course</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	{!! Form::open(array('route' =>'course.store')) !!}

   {!!  Form::label('Course_title', 'Course Title',array('class'=>'form-group')) !!}
  <div class="form-group">
    <label for="exampleInputEmail1">Course Title</label>
    {!! Form::text('course_title', $value = null, $attributes = array('class'=>'form-control','id'=>'Course_title','placeholder'=>'enter your course Title')); !!}
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Course Code</label>
    {!! Form::text('course_code', $value = null, $attributes = array('class'=>'form-control','id'=>'Course_code','placeholder'=>'enter your course code')); !!}
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Course Creadit</label>
    {!! Form::text('course_credit', $value = null, $attributes = array('class'=>'form-control','id'=>'course_credit','placeholder'=>'enter your course Creadit')); !!}
  </div>
  	{!! Form::submit('submit',$attributes = array('class'=>'btn btn-success')); !!}
	{!! Form::close() !!}
</div>
</body>
</html>