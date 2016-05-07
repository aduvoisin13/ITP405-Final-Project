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
            <form action="/compare" method="post">
                {{csrf_field()}}
                <div class="row">
                    @foreach ($characters as $character)
                        <div class="input-group" style="width: 80%; margin-bottom: 10px;">
                            <span class="input-group-addon">
                                <input type="checkbox" name="checkbox[]" id="{{$character->id}}" value="{{$character->id}}">
                            </span>
                            <a class="form-control" href="/wow/character/<?=$character->realm?>/<?=$character->name?>">{{$character->name}}-{{$character->realm}}</a>
                        </div>
                    @endforeach
                </div>
                <button type="submit" class="btn btn-default">Run Comparison</button>
            </form>
        @endif
    </div>
@endsection
