@extends('layout')

@section('title')
    Saved Comparisons
@endsection

@section('content')
    <div align="center">
        @if ($comparisons->isEmpty())
            <h3 style="font-weight:bold">No Saved Comparisons</h3>
        @else
            <h3 style="text-decoration:underline">Saved Comparisons</h3>
            @foreach ($comparisons as $comparison)
                <h4 style="text-decoration:underline">Comparison ID: {{$comparison->id}}</h4>
                <table class="table table-striped table-hover" style="width:80%" align="center">
                    <tr>
                        <th class="text-center">Name</th>
                        <th class="text-center">Class</th>
                        <th class="text-center">Specialization</th>
                    </tr>
                    @foreach ($comparison->characters as $character)
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
                <form action="/compare" method="post">
                    {{csrf_field()}}
                        @foreach ($comparison->characters as $character)
                            <input type="hidden" name="character_ids[]" id="{{$character->id}}" value="{{$character->id}}">
                        @endforeach
                    <button type="submit" class="btn btn-default">View Comparison</button>
                </form>
                <form action="/compare/delete" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="comparison_id" value="{{$comparison->id}}">
                    <button type="submit" class="btn btn-default">Delete Comparison</button>
                </form>
                <br>
            @endforeach
        @endif
    </div>
@endsection
