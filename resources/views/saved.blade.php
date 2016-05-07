@extends('layout')

@section('title')
    Saved Characters
@endsection

@section('content')
    <div align="center">
        @if (empty($characters))
            <h3 style="font-weight:bold">No Saved Characters</h3>
        @else
            <h3 style="text-decoration:underline">Saved Characters</h3>
            @foreach ($characters as $character)
                <a href="/wow/character/<?=$character->realm?>/<?=$character->name?>">{{$character->name}}-{{$character->realm}}</a>
                </br>
            @endforeach
        @endif
    </div>
@endsection
