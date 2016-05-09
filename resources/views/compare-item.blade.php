<tr>
    <td class="text-center" style="vertical-align:middle;">
        @if (isset($id) && isset($name))
            <a href="http://us.battle.net/wow/en/item/<?=$id?>">
                {{$name}}
            </a>
        @else
            N/A
        @endif
    </td>
    <td class="text-center" style="vertical-align:middle;">
        @if (isset($count))
            {{$count}}
        @else
            N/A
        @endif
    </td>
    <td class="text-center" style="vertical-align:middle;">
        @if (isset($characterNames))
            @for ($i = 0; $i < count($characterNames); $i++)
                @if ($i > 0)
                    <br>
                @endif
                {{$characterNames[$i]}}
            @endfor
        @else
            N/A
        @endif
    </td>
</tr>