<tr>
    <td class="text-center" style="vertical-align:middle;">
        {{$slot}}
    </td>
    <td class="text-center" style="vertical-align:middle;">
        @if (isset($id) && isset($name))
            <a href="http://us.battle.net/wow/en/item/<?=$id?>">
                {{$name}}
            </a>
        @else
            N/A
        @endif
    </td>
</tr>