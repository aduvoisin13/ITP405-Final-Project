@extends('layout')

@section('title')
    @if (empty($character))
        No Character Found
    @else
        {{$character->name}}-{{$character->realm}}
    @endif
@endsection

@section('content')
    <div align="center">
        @if (empty($character))
            <h3 style="font-weight:bold">No Character Found</h3>
        @else
            {{dd($character)}}
        @endif
    </div>
@endsection
