@extends('layout')

@section('title')
    Admin - Log In
@endsection

@section('content')
    <div align="center">
        <br>
        @if (session('failedAttempt'))
            <p>Invalid credentials.</p>
        @endif
        <form method="post" class="form-inline">
            {{csrf_field()}}
            Admin Username: <input type="text" class="form-control" name="username" value="{{old('username')}}">
            <br>
            Admin Password: <input type="password" class="form-control" name="password">
            <br>
            <input type="submit" class="btn btn-default" value="Log In">
        </form>
    </div>
@endsection
