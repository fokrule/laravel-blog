@extends('main')
@section('title', '|Create New Post' )
@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/select2.min.css') !!}
    <script src="//cdn.tinymce.com/4/tinymce.min.js">
    </script>
    <script>
        tinymce.init({
            selector:'textarea',
            plugins:'link'
        });
    </script>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1> Create New Post </h1>
            <hr>
                {!! Form::open(array('route' => 'posts.store','data-parsley-validate'=>'','files'=>true)) !!}
                   <?php echo Form::label('title', 'Title:');
                        echo "<br>";
                         echo Form::text('title',null,array('class'=>'form-control','required'=>'','maxlength'=>'255')); ?>
                         {!! Form::label('slug','slug') !!}
                         {!! Form::text('slug',null,array('class'=>'form-control','required'=>'','minlength'=>'5','maxlength'=>'255')) !!}
                        
                        {!! Form::label('category_id','Category:') !!}
                            <select name="category_id" class="form-control">
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name}}</option>
                                @endforeach
                            </select>
                             {!! Form::label('tags','Tag:') !!}
                             <br>
                            <select class="form-control select-multi" name="tags[]" multiple="multiple">
                                @foreach($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name}}</option>
                                @endforeach
                            </select>
                            <br>
                            {!! Form::label('feature_image','Upload Image:') !!}
                            {!! Form::file('feature_image') !!}
                            <br>
                        <?php
                         echo Form::label('body', 'Post Body:');
                        echo "<br>";
                         echo Form::textarea('body',null,array('class'=>'form-control'));
                   
                        echo Form::submit('Create Post',array('class'=>'btn btn-success btn-lg btn-block', 'style'=>'margin-top:20px')) 
                    ?>
                {!! Form::close() !!}
            
        </div>
    </div>
@endsection
@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('js/select2.min.js') !!}

  
    <script type="text/javascript">
    $(".select-multi").select2();
</script>
@endsection