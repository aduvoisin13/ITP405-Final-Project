@extends('layout')

@section('title')
    Compare
@endsection

@section('content')
    <div align="center">
        @if (empty($characters))
            <h3 style="font-weight:bold">No Saved Characters</h3>
        @else
            <h3 style="text-decoration:underline">Compare</h3>
            @foreach ($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
            <form action="/compare" method="post">
                {{csrf_field()}}
                <table class="table table-striped table-hover" style="width:80%" align="center">
                    <tr>
                        <th class="text-center">Compare?</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Class</th>
                        <th class="text-center">Specialization</th>
                    </tr>
                    @foreach ($characters as $character)
                        <tr>
                            <td class="text-center" style="vertical-align:middle;">
                                <input type="checkbox" name="character_ids[]" id="{{$character->id}}" value="{{$character->id}}">
                            </td>
                            <td class="text-center" style="vertical-align:middle;">
                                <a href="/wow/character/<?=$character->realm?>/<?=$character->name?>">{{$character->name}}-{{$character->realm}}</a>
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
                <button type="submit" class="btn btn-default">Run Comparison</button>
            </form>
        @endif
    </div>
@endsection
