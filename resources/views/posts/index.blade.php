@extends('main')
@section('title','|Home Page')
@section('content')

	<div class="row">
		<div class="col-md-10">
			<h1>
				All Post
			</h1>
		</div>
		<div class="col-md-2">
			{{-- {!! Html::LinkRoute('posts.create','',array($posts->id)) !!} --}}
			{!! Html::LinkRoute('posts.create','Create New Post',array(),array('class' =>'btn btn-lg btn-block btn-primary btn-h1-spacing')) !!}
		</div>
		<div class="col-md-12">
			<hr>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<th>#</th>
					<th>Title</th>
					<th>Body</th>
					<th>Created at</th>
					<th></th>
				</thead>
				<tbody>
					@foreach($posts as $post)
						<tr>
							<th>{{ $post->id }}</th>
							<td>{{ $post->title }}</td>
							<td>{{ substr(strip_tags($post->body),0,250) }}
							{{ strlen(strip_tags($post->body)) > 250 ? "..." : "" }}</td>
							<td>{{ date('M j,Y',strtotime($post->created_at)) }}</td>
							<td>
								{!! Html::LinkRoute('posts.show','View',array($post->id),array('class'=>'btn btn-default')) !!}

								{!! Html::LinkRoute('posts.edit','Edit',array($post->id),array('class'=>'btn btn-default')) !!}

							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			<div class="text-center">
				{{-- {!! $posts->render() !!}
				// pagination can done with this.
				 --}}
				{!! $posts->fragment('page')->render() !!}{{--paginaton can done by this too --}}	
				
			</div>
			  
		</div>
	</div>

@endsection