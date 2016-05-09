@extends('layout')

@section('title')
    Comparison Results
@endsection

@section('content')
    <div align="center">
        @if (empty($comparison) || empty($names))
            <h3 style="font-weight:bold">Comparison Error</h3>
        @else
            <h3 style="text-decoration:underline">Comparison Results</h3>
            <h3>Characters</h3>
            <table class="table table-striped table-hover" style="width:80%" align="center">
                <tr>
                    <th class="text-center">Name</th>
                    <th class="text-center">Class</th>
                    <th class="text-center">Specialization</th>
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
                    </tr>
                @endforeach
            </table>
            <br>
            @include('compare-item-display')
            <form action="/saved-compare" method="post">
                {{csrf_field()}}
                @foreach ($characters as $character)
                    <input type="hidden" name="character_ids[]" value="{{$character->id}}">
                @endforeach
                <button type="submit" class="btn btn-default">Save Comparison</button>
            </form>
            <br>
        @endif
    </div>
@endsection
