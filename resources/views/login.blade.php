@extends('layout')

@section('title')
    Log In
@endsection

@section('content')
    <div align="center">
        <br>
        @if (session('failedAttempt'))
            <p>Invalid credentials.</p>
        @endif
        <form method="post" class="form-inline">
            {{csrf_field()}}
            Email: <input type="email" class="form-control" name="email" value="{{old('email')}}">
            <br>
            Password: <input type="password" class="form-control" name="password">
            <br>
            <input type="submit" class="btn btn-default" value="Log In">
        </form>
        <br>
        Not a member? <a href="/signup">Sign Up!</a>
    </div>
@endsection
