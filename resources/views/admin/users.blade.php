@extends('layout')

@section('title')
    Manage Users
@endsection

@section('content')
    <div align="center">
        <h3 style="text-decoration:underline">Users</h3>
        <table class="table table-striped table-hover" style="width:80%" align="center">
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Email</th>
                <th class="text-center">Password</th>
                <th class="text-center">Type</th>
            </tr>
            @foreach ($users as $user)
                <tr>
                    <td class="text-center" style="vertical-align:middle;">
                        {{$user->id}}
                    </td>
                    <td class="text-center" style="vertical-align:middle;">
                        {{$user->email}}
                    </td>
                    <td class="text-center" style="vertical-align:middle;">
                        {{$user->password}}
                    </td>
                    <td class="text-center" style="vertical-align:middle;">
                        {{$user->type}}
                    </td>
                </tr>
            @endforeach
        </table>
        
        @foreach ($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
        
        <h4 style="text-decoration:underline">Add User</h4>
        <form action="/admin/users/add" method="post" class="form-inline">
            {{csrf_field()}}
            User Email: <input type="email" class="form-control" name="email" value="{{old('email')}}">
            <br>
            User Password: <input type="password" class="form-control" name="password">
            <br>
            Confirm User Password: <input type="password" class="form-control" name="password_confirmation">
            <br>
            User Type: <input type="text" class="form-control" name="type" value="{{old('type')}}">
            <br>
            <input type="submit" class="btn btn-default" value="Add User">
        </form>
        
        <br>
        
        <h4 style="text-decoration:underline">Delete User</h4>
        <form action="/admin/users/delete" method="post" class="form-inline">
            {{csrf_field()}}
            User ID:
            <select class="form-control" name="delete_user_id">
                @foreach ($users as $user)
                    @if (old('delete_user_id') == $user->id)
                        <option value="{{$user->id}}" selected>{{$user->id}}</option>
                    @else
                        <option value="{{$user->id}}">{{$user->id}}</option>
                    @endif
                @endforeach
            </select>
            <br>
            <input type="submit" class="btn btn-default" value="Delete User">
        </form>
        
        <br>
        
        <h4 style="text-decoration:underline">Edit User</h4>
        <form action="/admin/users/edit" method="post" class="form-inline">
            {{csrf_field()}}
            User ID:
            <select class="form-control" name="edit_user_id">
                @foreach ($users as $user)
                    @if (old('edit_user_id') == $user->id)
                        <option value="{{$user->id}}" selected>{{$user->id}}</option>
                    @else
                        <option value="{{$user->id}}">{{$user->id}}</option>
                    @endif
                @endforeach
            </select>
            <br>
            New Email: <input type="email" class="form-control" name="edit_email" value="{{old('edit_email')}}">
            <br>
            New Password: <input type="password" class="form-control" name="password">
            <br>
            Confirm New Password: <input type="password" class="form-control" name="password_confirmation">
            <br>
            New Type: <input type="text" class="form-control" name="edit_type" value="{{old('edit_type')}}">
            <br>
            <input type="submit" class="btn btn-default" value="Edit User">
        </form>
        
        <br>
    </div>
@endsection
