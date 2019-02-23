@extends('main')
@section('title',"| $post->title")
@section('stylesheets')
    {!! Html::style('css/singlestyle.css') !!}
@endsection
@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">

			<h1>
				{{ $post->title}}
			</h1>
			<img src="{{asset('images/'.$post->image)}}" alt="" height="200" width="200">
			<p>
				{!!$post->body!!}
			</p>
			<h4>
			Posted In:{{ $post->category->name }}
		
			</h4>
			<hr>
		</div>

	</div>
	
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h3 class="comments-title"><span class="glyphicon glyphicon-comment"></span>  {{ $post->comments()->count() }} Comments</h3>
			@foreach($post->comments as $comment)
				<div class="comment">
					<div class="author-info">

						<img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?s=50&d=monsterid" }}" class="author-image">
						<div class="author-name">
							<h4>{{ $comment->name }}</h4>
							<p class="author-time">{{ date('F dS, Y - g:iA' ,strtotime($comment->created_at)) }}</p>
						</div>

					</div>

					<div class="comment-content">
						{{ $comment->comment }}
					</div>

				</div>
			@endforeach
		</div>
	</div>

	@if (Auth::check()) 
	<div class="row">
		<div id="comment-form" class="col-md-8 col-md-offset-2">
			{!! Form::open(['route'=>['comments.store',$post->id],'method'=>'POST'])!!}
			<div class="col-md-12">
				{!! Form::label('comment',"Comment:") !!}
				{!! Form::textarea('comment',null,['class'=>'form-control']) !!}
				{!! Form::submit('comment',['class'=>'btn btn-success']) !!}
			</div>

			{!! Form::close()!!}
		</div>
	</div>
	@endif
@endsection