@extends('layout')

@section('title')
    Saved Characters
@endsection

@section('content')
    <div align="center">
        @if ($characters->isEmpty())
            <h3 style="font-weight:bold">No Saved Characters</h3>
        @else
            <h3 style="text-decoration:underline">Saved Characters</h3>
            <table class="table table-striped table-hover" style="width:80%" align="center">
                <tr>
                    <th class="text-center">Name</th>
                    <th class="text-center">Class</th>
                    <th class="text-center">Specialization</th>
                    <th class="text-center"></th>
                </tr>
                @foreach ($characters as $character)
                    <tr>
                        <td class="text-center" style="vertical-align:middle;">
                            <a href="/wow/character/<?=$character->realm?>/<?=$character->name?>">{{$character->name}}-{{$character->realm}}</a>
                        </td>
                        <td class="text-center" style="vertical-align:middle;">
                            {{$character->class}}
                        </td>
                        <td class="text-center" style="vertical-align:middle;">
                            {{$character->specialization}}
                        </td>
                        <td class="text-center" style="vertical-align:middle;">
                            <form action="/remove" method="post">
                                {{csrf_field()}}
                                <input type="hidden" name="character_id" value="{{$character->id}}">
                                <button type="submit" class="btn btn-default">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        @endif
    </div>
@endsection
