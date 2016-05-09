@extends('layout')

@section('title')
    Manage Comparisons
@endsection

@section('content')
    <div align="center">
        <h3 style="text-decoration:underline">Comparisons</h3>
        <table class="table table-striped table-hover" style="width:80%" align="center">
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">User ID</th>
                <th class="text-center">Character IDs</th>
            </tr>
            @foreach ($comparisons as $comparison)
                <tr>
                    <td class="text-center" style="vertical-align:middle;">
                        {{$comparison->id}}
                    </td>
                    <td class="text-center" style="vertical-align:middle;">
                        {{$comparison->user_id}}
                    </td>
                    <td class="text-center" style="vertical-align:middle;">
                        <?php $comparison->character_ids = json_decode($comparison->character_ids); ?>
                        @foreach ($comparison->character_ids as $id)
                            {{$id}}
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </table>
        
        @foreach ($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
        
        <h4 style="text-decoration:underline">Add Comparison</h4>
        <form action="/admin/comparisons/add" method="post" class="form-inline">
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
            Character IDs (space-delimited): <input type="text" class="form-control" name="character_ids" value="{{old('character_ids')}}">
            <br>
            <input type="submit" class="btn btn-default" value="Add Comparison">
        </form>
        
        <br>
        
        <h4 style="text-decoration:underline">Delete Comparison</h4>
        <form action="/admin/comparisons/delete" method="post" class="form-inline">
            {{csrf_field()}}
            Comparison ID:
            <select class="form-control" name="delete_comparison_id">
                @foreach ($comparisons as $comparison)
                    @if (old('delete_comparison_id') == $comparison->id)
                        <option value="{{$comparison->id}}" selected>{{$comparison->id}}</option>
                    @else
                        <option value="{{$comparison->id}}">{{$comparison->id}}</option>
                    @endif
                @endforeach
            </select>
            <br>
            <input type="submit" class="btn btn-default" value="Delete Comparison">
        </form>
        
        <br>
        
        <h4 style="text-decoration:underline">Edit Comparison</h4>
        <form action="/admin/comparisons/edit" method="post" class="form-inline">
            {{csrf_field()}}
            Comparison ID:
            <select class="form-control" name="edit_comparison_id">
                @foreach ($comparisons as $comparison)
                    @if (old('edit_comparison_id') == $comparison->id)
                        <option value="{{$comparison->id}}" selected>{{$comparison->id}}</option>
                    @else
                        <option value="{{$comparison->id}}">{{$comparison->id}}</option>
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
            New Character IDs (space-delimited): <input type="text" class="form-control" name="edit_character_ids" value="{{old('edit_character_ids')}}">
            <br>
            <input type="submit" class="btn btn-default" value="Edit Comparison">
        </form>
        
        <br>
    </div>
@endsection
