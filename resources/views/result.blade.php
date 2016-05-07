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
        @endif
    </div>
@endsection
