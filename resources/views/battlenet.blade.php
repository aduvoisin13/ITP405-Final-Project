@extends('layout')

@section('title')
    Battle.net Leaderboards
@endsection

@section('content')
    <div align="center">
        @if (empty($leaderboard))
            <h3 style="font-weight:bold">No Bracket Found</h3>
        @else
            <h3 style="text-decoration:underline">WoW Leaderboard: {{$bracket}}</h3>
            <table class="table table-striped table-hover" style="width:80%" align="center">
                <tr>
                    <th class="text-center">Ranking</th>
                    <th class="text-center">Rating</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Wins</th>
                    <th class="text-center">Losses</th>
                </tr>
                @foreach($leaderboard->rows as $player)
                    <tr>
                        <td class="text-center" style="vertical-align:middle;">
                            {{$player->ranking}}
                        </td>
                        <td class="text-center" style="vertical-align:middle;">
                            {{$player->rating}}
                        </td>
                        <td class="text-center" style="vertical-align:middle;">
                            <a href="/wow/character/<?=$player->realmSlug?>/<?=$player->name?>">
                                {{$player->name}}
                            </a>
                        </td>
                        <td class="text-center" style="vertical-align:middle;">
                            {{$player->seasonWins}}
                        </td>
                        <td class="text-center" style="vertical-align:middle;">
                            {{$player->seasonLosses}}
                        </td>
                    </tr>
                @endforeach
            </table>
        @endif
    </div>
@endsection
