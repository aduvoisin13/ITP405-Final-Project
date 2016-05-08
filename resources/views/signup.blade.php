@extends('layout')

@section('title')
    Sign Up
@endsection

@section('content')
    @foreach ($errors->all() as $error)
        <p>{{$error}}</p>
    @endforeach
    
    <div align="center">
        <br>
        <form method="post">
            {{csrf_field()}}
            Email: <input type="email" name="email" value="{{old('email')}}">
            <br>
            Password: <input type="password" name="password">
            <br>
            Confirm Password: <input type="password" name="password_confirmation">
            <br>
            <input type="submit" value="Sign Up">
        </form>
        <br>
        Already a member? <a href="/login">Login!</a>
    </div>
@endsection
