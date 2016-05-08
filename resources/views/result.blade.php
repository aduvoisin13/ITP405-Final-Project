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
            @include('compare-item-display')
            <form action="/saved-compare" method="post">
                {{csrf_field()}}
                @foreach ($characters as $character)
                    <input type="hidden" name="character_ids[]" value="{{$character->id}}">
                @endforeach
                <button type="submit" class="btn btn-default">Save Comparison</button>
            </form>
        @endif
    </div>
@endsection
