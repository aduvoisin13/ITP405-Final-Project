@extends('layout')

@section('title')
    Log In
@endsection

@section('content')
    @if (session('failedAttempt'))
        <p>Invalid credentials.</p>
    @endif

    <div align="center">
        <form method="post">
            {{csrf_field()}}
            Email: <input type="email" name="email">
            <br>
            Password: <input type="password" name="password">
            <br>
            <input type="submit" value="Log In">
        </form>
        <br>
        Not a member? <a href="/signup">Sign Up!</a>
    </div>
@endsection
