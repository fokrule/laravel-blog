@extends('main')
@section('title','|Show added post ')

@section('content')
	
	<div class="row">
	<div class="col-md-8">
	<h1>
    {!! $post->title !!}<br />
	</h1>

	<p>
		{!! $post->body !!}<br />
	</p>
	<hr>
	<div class="tags">
		@foreach($post->tags as $tag)
		<span class="label label-default" style="margin-right: 3px">
			{{ $tag->name }}
		</span>
		
		@endforeach
	</div>

	<div id="backend-comments" style="margin-top: 50px;">
				<h3>Comments <small>{{ $post->comments()->count() }} total</small></h3>

				<table class="table">
					<thead>
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Comment</th>
							<th width="70px"></th>
						</tr>
					</thead>

					<tbody>
						@foreach ($post->comments as $comment)
						<tr>
							
							<td>{{ $comment->name }}</td>
							<td>{{ $comment->email }}</td>
							<td>{{ $comment->comment }}</td>
							<td>
							
							<?php $u_id=Auth::user()->id;
							 $c_id=$comment->user_id; ?>
							@if($u_id==$c_id) 
								<a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
								<a href="{{ route('comments.delete', $comment->id) }}" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
							@endif
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
	</div>
	<div class="col-md-4">
		<div class="well">
			<dl class="dl-horizontal">
				<lebel>
					URL:
				</lebel>
				<p>
					<a href="{{ url('blog/'.$post->slug) }}">{{ url('blog/'.$post->slug) }}
				</a></p>
			</dl>
			<dl class="dl-horizontal">
				<lebel>
					Category:
				</lebel>
				<h4>
					{{ $post->category->name }}
				</h4>
			</dl>
			<dl class="dl-horizontal">
				<lebel>
					Created at:
				</lebel>
				<p>
					{{ date('M j, Y h4:s',strtotime($post->created_at)) }}
				</p>
			</dl>
			<dl class="dl-horizontal">
				<lebel>
					updated at:
				</lebel>
				<p>
					{{ date('M j, Y h4:s',strtotime($post->updated_at)) }}
				</p>
			</dl>
			<hr>
			<div class="row">
			<div class="col-md-6">
				{!! Html::LinkRoute('posts.edit','Edit',array($post->id),array('class' =>'btn btn-primary btn-block')) !!}
				{{-- <a href="posts.edit" class="btn btn-primary btn-block">Edit</a> --}}
				{{-- output for Both are same in html and blade code --}}
			</div>
			<div class="col-md-6">
				{!! Form::open(['route' => ['posts.destroy',$post->id],'method'=>'DELETE'] ) !!}
				{!! Form::submit('Delete',['class'=>'btn btn-primary btn-block']) !!}
				
				{!! Form::close() !!}
			</div>
			<div class="col-md-12">
				{!! Html::LinkRoute('posts.index','<< Show all Post',array(),array('class' =>'btn btn-default btn-block btn-h1-spacing')) !!}
			</div>
			</div>
		</div>
	</div>
    


@endsection