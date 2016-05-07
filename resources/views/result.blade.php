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
            <table class="table table-striped table-hover" style="width:80%" align="center">
                <tr>
                    <th class="text-center">Slot</th>
                    <th class="text-center">Item</th>
                    <th class="text-center">Count</th>
                </tr>
                @include('compare-item-display')
            </table>
        @endif
    </div>
@endsection
