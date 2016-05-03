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
        <form method="post">
            {{csrf_field()}}
            Admin Email: <input type="email" name="email">
            <br>
            Admin Password: <input type="password" name="password">
            <br>
            <input type="submit" value="Log In">
        </form>
    </div>
@endsection
