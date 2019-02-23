<!-- resources/views/auth/reset.blade.php -->
@extends('main')
@section('title','|Log In')

@section('content')
    
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                Reset Password
                </div>
                <div class="panel-body">
            <form method="POST" action="/password/reset">
                {!! csrf_field() !!}
                <input type="hidden" name="token" value="{{ $token }}">

                @if (count($errors) > 0)
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

                <div>
                    Email
                    <input type="email" name="email" class="form-control"  value="{{ old('email') }}">
                </div>

                <div>
                    Password
                    <input type="password" name="password" class="form-control" >
                </div>

                <div>
                    Confirm Password
                    <input type="password" name="password_confirmation" class="form-control" >
                </div>

                <div>
                    <button type="submit" class="btn btn-primary">
                        Reset Password
                    </button>
                </div>
            </form>

@endsection