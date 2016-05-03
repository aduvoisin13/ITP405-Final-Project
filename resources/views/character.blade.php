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
            <h3 style="text-decoration:underline">{{$character->name}}-{{$character->realm}}</h3>
            <table class="table table-striped table-hover" style="width:80%" align="center">
                <tr>
                    <th class="text-center">Slot</th>
                    <th class="text-center">Item</th>
                </tr>
                @include('item-display')
                <form action="/saved" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="name" value="{{$character->name}}">
                    <input type="hidden" name="realm" value="{{$character->realm}}">
                    <button type="submit" class="btn btn-default">Save Character</button>
                </form>
            </table>
        @endif
    </div>
@endsection
