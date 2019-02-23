@extends('main')
@section('title','|Log In')

@section('content')
    
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            {!! Form::open() !!}

                {!! Form::label('email','Email:') !!}
                {!! Form::email('email',null,['class'=>'form-control']) !!}

                {!! Form::label('password',"Password:") !!}
                {!! Form::password('password',['class'=>'form-control']) !!}

                {!! Form::checkbox('remember') !!}
                {!! Form::label('remember',"Remember Me") !!}
                
                <br>
                <a href="{{ url('password/email') }}">Forget password??</a>
                <br>
                <br>
                {!! Form::submit('Login',['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>

@endsection