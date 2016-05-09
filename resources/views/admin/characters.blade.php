@extends('layout')

@section('title')
    Manage Characters
@endsection

@section('content')
    <div align="center">
        <h3 style="text-decoration:underline">Characters</h3>
        <table class="table table-striped table-hover" style="width:80%" align="center">
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">User ID</th>
                <th class="text-center">Name</th>
                <th class="text-center">Realm</th>
                <th class="text-center">Class</th>
                <th class="text-center">Specialization</th>
            </tr>
            @foreach ($characters as $character)
                <tr>
                    <td class="text-center" style="vertical-align:middle;">
                        {{$character->id}}
                    </td>
                    <td class="text-center" style="vertical-align:middle;">
                        {{$character->user_id}}
                    </td>
                    <td class="text-center" style="vertical-align:middle;">
                        {{$character->name}}
                    </td>
                    <td class="text-center" style="vertical-align:middle;">
                        {{$character->realm}}
                    </td>
                    <td class="text-center" style="vertical-align:middle;">
                        {{$character->class}}
                    </td>
                    <td class="text-center" style="vertical-align:middle;">
                        {{$character->specialization}}
                    </td>
                </tr>
            @endforeach
        </table>
        
        @foreach ($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
        
        <h4 style="text-decoration:underline">Add Character</h4>
        <form action="/admin/characters/add" method="post" class="form-inline">
            {{csrf_field()}}
            User:
            <select class="form-control" name="user_id">
                @foreach ($users as $user)
                    @if (old('user_id') == $user->id)
                        <option value="{{$user->id}}" selected>{{$user->email}}</option>
                    @else
                        <option value="{{$user->id}}">{{$user->email}}</option>
                    @endif
                @endforeach
            </select>
            <br>
            Name: <input type="text" class="form-control" name="name" value="{{old('name')}}">
            <br>
            Realm: <input type="text" class="form-control" name="realm" value="{{old('realm')}}">
            <br>
            Class: <input type="text" class="form-control" name="class" value="{{old('class')}}">
            <br>
            Specialization: <input type="text" class="form-control" name="specialization" value="{{old('specialization')}}">
            <br>
            <input type="submit" class="btn btn-default" value="Add Character">
        </form>
        
        <br>
        
        <h4 style="text-decoration:underline">Delete Character</h4>
        <form action="/admin/characters/delete" method="post" class="form-inline">
            {{csrf_field()}}
            Character ID:
            <select class="form-control" name="delete_character_id">
                @foreach ($characters as $character)
                    @if (old('delete_character_id') == $character->id)
                        <option value="{{$character->id}}" selected>{{$character->id}}</option>
                    @else
                        <option value="{{$character->id}}">{{$character->id}}</option>
                    @endif
                @endforeach
            </select>
            <br>
            <input type="submit" class="btn btn-default" value="Delete Character">
        </form>
        
        <br>
        
        <h4 style="text-decoration:underline">Edit Character</h4>
        <form action="/admin/characters/edit" method="post" class="form-inline">
            {{csrf_field()}}
            Character ID:
            <select class="form-control" name="edit_character_id">
                @foreach ($characters as $character)
                    @if (old('edit_character_id') == $character->id)
                        <option value="{{$character->id}}" selected>{{$character->id}}</option>
                    @else
                        <option value="{{$character->id}}">{{$character->id}}</option>
                    @endif
                @endforeach
            </select>
            <br>
            New User:
            <select class="form-control" name="edit_user_id">
                <option selected></option>
                @foreach ($users as $user)
                    @if (old('edit_user_id') == $user->id)
                        <option value="{{$user->id}}" selected>{{$user->email}}</option>
                    @else
                        <option value="{{$user->id}}">{{$user->email}}</option>
                    @endif
                @endforeach
            </select>
            <br>
            New Name: <input type="text" class="form-control" name="edit_name" value="{{old('edit_name')}}">
            <br>
            New Realm: <input type="text" class="form-control" name="edit_realm" value="{{old('edit_realm')}}">
            <br>
            New Class: <input type="text" class="form-control" name="edit_class" value="{{old('edit_class')}}">
            <br>
            New Specialization: <input type="text" class="form-control" name="edit_specialization" value="{{old('edit_specialization')}}">
            <br>
            <input type="submit" class="btn btn-default" value="Edit Character">
        </form>
        
        <br>
    </div>
@endsection
