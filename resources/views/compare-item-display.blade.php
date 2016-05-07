@if (!empty($comparison->head))
    @include('compare-item-generic', array('slot' => 'Head', 'items' => $comparison->head))
@else
    @include('compare-item-generic', array('slot' => 'Head'))
@endif

@if (!empty($comparison->neck))
    @include('compare-item-generic', array('slot' => 'Neck', 'items' => $comparison->neck))
@else
    @include('compare-item-generic', array('slot' => 'Neck'))
@endif

@if (!empty($comparison->shoulder))
    @include('compare-item-generic', array('slot' => 'Shoulder', 'items' => $comparison->shoulder))
@else
    @include('compare-item-generic', array('slot' => 'Shoulder'))
@endif

@if (!empty($comparison->back))
    @include('compare-item-generic', array('slot' => 'Back', 'items' => $comparison->back))
@else
    @include('compare-item-generic', array('slot' => 'Back'))
@endif

@if (!empty($comparison->chest))
    @include('compare-item-generic', array('slot' => 'Chest', 'items' => $comparison->chest))
@else
    @include('compare-item-generic', array('slot' => 'Chest'))
@endif

@if (!empty($comparison->shirt))
    @include('compare-item-generic', array('slot' => 'Shirt', 'items' => $comparison->shirt))
@else
    @include('compare-item-generic', array('slot' => 'Shirt'))
@endif

@if (!empty($comparison->tabard))
    @include('compare-item-generic', array('slot' => 'Tabard', 'items' => $comparison->tabard))
@else
    @include('compare-item-generic', array('slot' => 'Tabard'))
@endif

@if (!empty($comparison->wrist))
    @include('compare-item-generic', array('slot' => 'Wrists', 'items' => $comparison->wrist))
@else
    @include('compare-item-generic', array('slot' => 'Wrists'))
@endif

@if (!empty($comparison->hands))
    @include('compare-item-generic', array('slot' => 'Hands', 'items' => $comparison->hands))
@else
    @include('compare-item-generic', array('slot' => 'Hands'))
@endif

@if (!empty($comparison->waist))
    @include('compare-item-generic', array('slot' => 'Waist', 'items' => $comparison->waist))
@else
    @include('compare-item-generic', array('slot' => 'Waist'))
@endif

@if (!empty($comparison->legs))
    @include('compare-item-generic', array('slot' => 'Legs', 'items' => $comparison->legs))
@else
    @include('compare-item-generic', array('slot' => 'Legs'))
@endif

@if (!empty($comparison->feet))
    @include('compare-item-generic', array('slot' => 'Feet', 'items' => $comparison->feet))
@else
    @include('compare-item-generic', array('slot' => 'Feet'))
@endif

@if (!empty($comparison->finger))
    @include('compare-item-generic', array('slot' => 'Finger', 'items' => $comparison->finger))
@else
    @include('compare-item-generic', array('slot' => 'Finger'))
@endif

@if (!empty($comparison->trinket))
    @include('compare-item-generic', array('slot' => 'Trinket', 'items' => $comparison->trinket))
@else
    @include('compare-item-generic', array('slot' => 'Trinket'))
@endif

@if (!empty($comparison->mainHand))
    @include('compare-item-generic', array('slot' => 'Main Hand', 'items' => $comparison->mainHand))
@else
    @include('compare-item-generic', array('slot' => 'Main Hand'))
@endif

@if (!empty($comparison->offHand))
    @include('compare-item-generic', array('slot' => 'Off Hand', 'items' => $comparison->offHand))
@else
    @include('compare-item-generic', array('slot' => 'Off Hand'))
@endif