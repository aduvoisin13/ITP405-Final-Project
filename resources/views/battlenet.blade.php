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
            <iframe name="redir" style="display: none;"></iframe>
            <table class="table table-striped table-hover" style="width:80%" align="center">
                <tr>
                    <th class="text-center">Ranking</th>
                    <th class="text-center">Rating</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Class</th>
                    <th class="text-center">Specialization</th>
                    <th class="text-center">Wins</th>
                    <th class="text-center">Losses</th>
                    <th class="text-center"></th>
                </tr>
                @foreach ($leaderboard->rows as $player)
                    <tr>
                        <td class="text-center" style="vertical-align:middle;">
                            {{$player->ranking}}
                        </td>
                        <td class="text-center" style="vertical-align:middle;">
                            {{$player->rating}}
                        </td>
                        <td class="text-center" style="vertical-align:middle;">
                            <a href="/wow/character/<?=$player->realmName?>/<?=$player->name?>">
                                {{$player->name}}-{{$player->realmName}}
                            </a>
                        </td>
                        <td class="text-center" style="vertical-align:middle;">
                            <?php $className = "UNKNOWN"; ?>
                            @foreach ($classes->classes as $class)
                                @if ($class->id == $player->classId)
                                    {{$class->name}}
                                    <?php $className = $class->name; break; ?>
                                @endif
                            @endforeach
                        </td>
                        <td class="text-center" style="vertical-align:middle;">
                            {{$specIds[$player->specId]}}
                        </td>
                        <td class="text-center" style="vertical-align:middle;">
                            {{$player->seasonWins}}
                        </td>
                        <td class="text-center" style="vertical-align:middle;">
                            {{$player->seasonLosses}}
                        </td>
                        <td class="text-center" style="vertical-align:middle;">
                            <?php $found = false; ?>
                            @foreach ($saved as $save)
                                @if ($save->name == $player->name && $save->realm == $player->realmName)
                                    <?php $found = true; break; ?>
                                @endif
                            @endforeach
                            <form action="/saved" method="post" target="redir">
                                {{csrf_field()}}
                                <input type="hidden" name="name" value="{{$player->name}}">
                                <input type="hidden" name="realm" value="{{$player->realmName}}">
                                <input type="hidden" name="class" value="{{$className}}">
                                <input type="hidden" name="specialization" value="{{$specIds[$player->specId]}}">
                                @if (!$found)
                                    <button type="submit" class="btn btn-default">Save</button>
                                @else
                                    <button type="submit" class="btn btn-default" disabled>Save</button>
                                @endif
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        @endif
    </div>
@endsection
