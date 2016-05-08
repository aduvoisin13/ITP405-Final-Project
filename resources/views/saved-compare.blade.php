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
                <h4 style="text-decoration:underline">Comparison #{{$comparison->id}}</h4>
                @foreach ($comparison->characters as $character)
                    <a href="/wow/character/<?=$character->realm?>/<?=$character->name?>">{{$character->name}}-{{$character->realm}}</a>
                    <br>
                @endforeach
                <form action="/compare" method="post">
                    {{csrf_field()}}
                        @foreach ($comparison->characters as $character)
                            <input type="hidden" name="character_ids[]" id="{{$character->id}}" value="{{$character->id}}">
                        @endforeach
                    <button type="submit" class="btn btn-default">View Comparison</button>
                </form>
                <br>
            @endforeach
        @endif
    </div>
@endsection
