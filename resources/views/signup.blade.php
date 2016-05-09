@extends('layout')

@section('title')
    Sign Up
@endsection

@section('content')
    <div align="center">
        <br>
        @foreach ($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
        <form method="post" class="form-inline">
            {{csrf_field()}}
            Email: <input type="email" class="form-control" name="email" value="{{old('email')}}">
            <br>
            Password: <input type="password" class="form-control" name="password">
            <br>
            Confirm Password: <input type="password" class="form-control" name="password_confirmation">
            <br>
            <input type="submit" class="btn btn-default" value="Sign Up">
        </form>
        <br>
        Already a member? <a href="/login">Login!</a>
    </div>
@endsection
