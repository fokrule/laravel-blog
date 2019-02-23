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
                    <form method="POST" action="/password/email">
                {!! csrf_field() !!}

                @if (Session('status'))
                <div class="alert alert-success">
                    {{ Session('status') }}
                </div>
                
                @endif

                <div>
                    Email
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                </div>

                <div>
                <br>
                    <button type="submit" class="btn btn-primary">
                        Reset Password
                    </button>
                </div>
            </form>

                </div>
                
            </div>
<!-- resources/views/auth/password.blade.php -->

            
    </div>
        </div>
@endsection