@extends('main')
@section('title','| Edit Post ')
@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/select2.min.css') !!}
     <!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
@endsection
@section('content')
	
	<div class="row">
	{!! Form::model($post,['route'=>['posts.update',$post->id], 'method'=>'PUT','files'=>true]) !!}
	<div class="col-md-8">
	
	{!! Form::label('title','Title:') !!}
	{!! Form::text('title',null,["class"=>'form-control input-lg']) !!}
	{!! Form::label('slug','Slug:',['class'=>'form-spacing-top']) !!}
	{!! Form::text('slug',null,["class"=>'form-control input-lg']) !!}
	
	{!! Form::label('category_id','Category:') !!}
	{!! Form::select('category_id',$categories,null,['class'=>'form-control']) !!}
	
	{!! Form::label('tags','Tags:',['class'=>'form-spacing-top']) !!}
	{!! Form::select('tags[]',$tags,null,['class'=>'form-spacing-top form-control select-multi','multiple'=>'multiple']) !!}
	<br>
	
	{!! Form::label('feature_image','Upload Image:') !!}
    {!! Form::file('feature_image') !!}

	{!! Form::label('body','Body:',['class'=>'form-spacing-top']) !!}
	<?php 
	    echo Form::textarea('body',null,['class' => 'form-control', 'id' => 'editor']);
	?>
 
 

	</div>
	<div class="col-md-4">
		<div class="well">
			<dl class="dl-horizontal">
				<dt>
					Created at:
				</dt>
				<dd>
					{{ date('M j, Y h:s',strtotime($post->created_at)) }}
				</dd>
			</dl>
			<dl class="dl-horizontal">
				<dt>
					updated at:
				</dt>
				<dd>
					{{ date('M j, Y h:s',strtotime($post->updated_at)) }}
				</dd>
			</dl>
			<hr>
			<div class="row">
			<div class="col-md-6">
				{!! Html::LinkRoute('posts.show','Cancel',array($post->id),array('class' =>'btn btn-danger btn-block')) !!}
				{{-- <a href="posts.edit" class="btn btn-primary btn-block">Edit</a> --}}
				{{-- output for Both are same in html and blade code --}}
			</div>
			<div class="col-md-6">
				{!! Form::submit('Save Changes', array('class'=>'btn btn-success btn-block'))!!}
				
			</div>
			</div>
		</div>
	</div>
	{!! Form::close() !!}
	</div>
    


@endsection
@section('scripts')
    {!! Html::script('js/select2.min.js') !!}

  
    <script type="text/javascript">
    $(".select-multi").select2();
    $(".select-multi").select2().val({!! json_encode($post->tags()->getRelatedIds()) !!}).trigger('change');
</script>
<script>
//   const quill = new Quill('#editor', {
//     theme: 'snow'
//   });

$(document).ready(function() {
        $('#editor').summernote();
    });
</script>
@endsection