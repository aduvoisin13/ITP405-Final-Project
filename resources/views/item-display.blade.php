@if (!empty($character->items->head))
    @include('item', array('slot' => 'Head', 'id' => $character->items->head->id, 'name' => $character->items->head->name))
@else
    @include('item', array('slot' => 'Head'))
@endif

@if (!empty($character->items->neck))
    @include('item', array('slot' => 'Neck', 'id' => $character->items->neck->id, 'name' => $character->items->neck->name))
@else
    @include('item', array('slot' => 'Neck'))
@endif

@if (!empty($character->items->shoulder))
    @include('item', array('slot' => 'Shoulder', 'id' => $character->items->shoulder->id, 'name' => $character->items->shoulder->name))
@else
    @include('item', array('slot' => 'Shoulder'))
@endif

@if (!empty($character->items->back))
    @include('item', array('slot' => 'Back', 'id' => $character->items->back->id, 'name' => $character->items->back->name))
@else
    @include('item', array('slot' => 'Back'))
@endif

@if (!empty($character->items->chest))
    @include('item', array('slot' => 'Chest', 'id' => $character->items->chest->id, 'name' => $character->items->chest->name))
@else
    @include('item', array('slot' => 'Chest'))
@endif

@if (!empty($character->items->shirt))
    @include('item', array('slot' => 'Shirt', 'id' => $character->items->shirt->id, 'name' => $character->items->shirt->name))
@else
    @include('item', array('slot' => 'Shirt'))
@endif

@if (!empty($character->items->tabard))
    @include('item', array('slot' => 'Tabard', 'id' => $character->items->tabard->id, 'name' => $character->items->tabard->name))
@else
    @include('item', array('slot' => 'Tabard'))
@endif

@if (!empty($character->items->wrist))
    @include('item', array('slot' => 'Wrists', 'id' => $character->items->wrist->id, 'name' => $character->items->wrist->name))
@else
    @include('item', array('slot' => 'Wrists'))
@endif

@if (!empty($character->items->hands))
    @include('item', array('slot' => 'Hands', 'id' => $character->items->hands->id, 'name' => $character->items->hands->name))
@else
    @include('item', array('slot' => 'Hands'))
@endif

@if (!empty($character->items->waist))
    @include('item', array('slot' => 'Waist', 'id' => $character->items->waist->id, 'name' => $character->items->waist->name))
@else
    @include('item', array('slot' => 'Waist'))
@endif

@if (!empty($character->items->legs))
    @include('item', array('slot' => 'Legs', 'id' => $character->items->legs->id, 'name' => $character->items->legs->name))
@else
    @include('item', array('slot' => 'Legs'))
@endif

@if (!empty($character->items->feet))
    @include('item', array('slot' => 'Feet', 'id' => $character->items->feet->id, 'name' => $character->items->feet->name))
@else
    @include('item', array('slot' => 'Feet'))
@endif

@if (!empty($character->items->finger1))
    @include('item', array('slot' => 'Finger', 'id' => $character->items->finger1->id, 'name' => $character->items->finger1->name))
@else
    @include('item', array('slot' => 'Finger'))
@endif

@if (!empty($character->items->finger2))
    @include('item', array('slot' => 'Finger', 'id' => $character->items->finger2->id, 'name' => $character->items->finger2->name))
@else
    @include('item', array('slot' => 'Finger'))
@endif

@if (!empty($character->items->trinket1))
    @include('item', array('slot' => 'Trinket', 'id' => $character->items->trinket1->id, 'name' => $character->items->trinket1->name))
@else
    @include('item', array('slot' => 'Trinket'))
@endif

@if (!empty($character->items->trinket2))
    @include('item', array('slot' => 'Trinket', 'id' => $character->items->trinket2->id, 'name' => $character->items->trinket2->name))
@else
    @include('item', array('slot' => 'Trinket'))
@endif

@if (!empty($character->items->mainHand))
    @include('item', array('slot' => 'Main Hand', 'id' => $character->items->mainHand->id, 'name' => $character->items->mainHand->name))
@else
    @include('item', array('slot' => 'Main Hand'))
@endif

@if (!empty($character->items->offHand))
    @include('item', array('slot' => 'Off Hand', 'id' => $character->items->offHand->id, 'name' => $character->items->offHand->name))
@else
    @include('item', array('slot' => 'Off Hand'))
@endif