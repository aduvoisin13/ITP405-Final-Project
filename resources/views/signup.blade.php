@extends('layout')

@section('title')
    Sign Up
@endsection

@section('content')
    @foreach ($errors->all() as $error)
        <p>{{$error}}</p>
    @endforeach
    
    <div align="center">
        <form method="post">
            {{csrf_field()}}
            Name: <input type="text" name="name" value="{{old('name')}}">
            <br>
            Email: <input type="email" name="email" value="{{old('email')}}">
            <br>
            Password: <input type="password" name="password">
            <br>
            Confirm Password: <input type="password" name="password_confirmation">
            <br>
            <input type="submit" value="Sign Up">
        </form>
    </div>
@endsection
