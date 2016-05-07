@if (!empty($comparison->head))
    <?php $counts = array_count_values($comparison->head); ?>
    <?php $comparison->head = array_unique($comparison->head); ?>
    @foreach ($comparison->head as $head)
        @include('compare-item', array('slot' => 'Head', 'id' => $head, 'name' => $names[$head], 'count' => $counts[$head]))
    @endforeach
@else
    @include('compare-item', array('slot' => 'Head'))
@endif

@if (!empty($comparison->neck))
    <?php $counts = array_count_values($comparison->neck); ?>
    <?php $comparison->neck = array_unique($comparison->neck); ?>
    @foreach ($comparison->neck as $neck)
        @include('compare-item', array('slot' => 'Neck', 'id' => $neck, 'name' => $names[$neck], 'count' => $counts[$neck]))
    @endforeach
@else
    @include('compare-item', array('slot' => 'Neck'))
@endif

@if (!empty($comparison->shoulder))
    <?php $counts = array_count_values($comparison->shoulder); ?>
    <?php $comparison->shoulder = array_unique($comparison->shoulder); ?>
    @foreach ($comparison->shoulder as $shoulder)
        @include('compare-item', array('slot' => 'Shoulder', 'id' => $shoulder, 'name' => $names[$shoulder], 'count' => $counts[$shoulder]))
    @endforeach
@else
    @include('compare-item', array('slot' => 'Shoulder'))
@endif

@if (!empty($comparison->back))
    <?php $counts = array_count_values($comparison->back); ?>
    <?php $comparison->back = array_unique($comparison->back); ?>
    @foreach ($comparison->back as $back)
        @include('compare-item', array('slot' => 'Back', 'id' => $back, 'name' => $names[$back], 'count' => $counts[$back]))
    @endforeach
@else
    @include('compare-item', array('slot' => 'Back'))
@endif

@if (!empty($comparison->chest))
    <?php $counts = array_count_values($comparison->chest); ?>
    <?php $comparison->chest = array_unique($comparison->chest); ?>
    @foreach ($comparison->chest as $chest)
        @include('compare-item', array('slot' => 'Chest', 'id' => $chest, 'name' => $names[$chest], 'count' => $counts[$chest]))
    @endforeach
@else
    @include('compare-item', array('slot' => 'Chest'))
@endif

@if (!empty($comparison->shirt))
    <?php $counts = array_count_values($comparison->shirt); ?>
    <?php $comparison->shirt = array_unique($comparison->shirt); ?>
    @foreach ($comparison->shirt as $shirt)
        @include('compare-item', array('slot' => 'Shirt', 'id' => $shirt, 'name' => $names[$shirt], 'count' => $counts[$shirt]))
    @endforeach
@else
    @include('compare-item', array('slot' => 'Shirt'))
@endif

@if (!empty($comparison->tabard))
    <?php $counts = array_count_values($comparison->tabard); ?>
    <?php $comparison->tabard = array_unique($comparison->tabard); ?>
    @foreach ($comparison->tabard as $tabard)
        @include('compare-item', array('slot' => 'Tabard', 'id' => $tabard, 'name' => $names[$tabard], 'count' => $counts[$tabard]))
    @endforeach
@else
    @include('compare-item', array('slot' => 'Tabard'))
@endif

@if (!empty($comparison->wrist))
    <?php $counts = array_count_values($comparison->wrist); ?>
    <?php $comparison->wrist = array_unique($comparison->wrist); ?>
    @foreach ($comparison->wrist as $wrist)
        @include('compare-item', array('slot' => 'Wrists', 'id' => $wrist, 'name' => $names[$wrist], 'count' => $counts[$wrist]))
    @endforeach
@else
    @include('compare-item', array('slot' => 'Wrists'))
@endif

@if (!empty($comparison->hands))
    <?php $counts = array_count_values($comparison->hands); ?>
    <?php $comparison->hands = array_unique($comparison->hands); ?>
    @foreach ($comparison->hands as $hands)
        @include('compare-item', array('slot' => 'Hands', 'id' => $hands, 'name' => $names[$hands], 'count' => $counts[$hands]))
    @endforeach
@else
    @include('compare-item', array('slot' => 'Hands'))
@endif

@if (!empty($comparison->waist))
    <?php $counts = array_count_values($comparison->waist); ?>
    <?php $comparison->waist = array_unique($comparison->waist); ?>
    @foreach ($comparison->waist as $waist)
        @include('compare-item', array('slot' => 'Waist', 'id' => $waist, 'name' => $names[$waist], 'count' => $counts[$waist]))
    @endforeach
@else
    @include('compare-item', array('slot' => 'Waist'))
@endif

@if (!empty($comparison->legs))
    <?php $counts = array_count_values($comparison->legs); ?>
    <?php $comparison->legs = array_unique($comparison->legs); ?>
    @foreach ($comparison->legs as $legs)
        @include('compare-item', array('slot' => 'Legs', 'id' => $legs, 'name' => $names[$legs], 'count' => $counts[$legs]))
    @endforeach
@else
    @include('compare-item', array('slot' => 'Legs'))
@endif

@if (!empty($comparison->feet))
    <?php $counts = array_count_values($comparison->feet); ?>
    <?php $comparison->feet = array_unique($comparison->feet); ?>
    @foreach ($comparison->feet as $feet)
        @include('compare-item', array('slot' => 'Feet', 'id' => $feet, 'name' => $names[$feet], 'count' => $counts[$feet]))
    @endforeach
@else
    @include('compare-item', array('slot' => 'Feet'))
@endif

@if (!empty($comparison->finger))
    <?php $counts = array_count_values($comparison->finger); ?>
    <?php $comparison->finger = array_unique($comparison->finger); ?>
    @foreach ($comparison->finger as $finger)
        @include('compare-item', array('slot' => 'Finger', 'id' => $finger, 'name' => $names[$finger], 'count' => $counts[$finger]))
    @endforeach
@else
    @include('compare-item', array('slot' => 'Finger'))
@endif

@if (!empty($comparison->trinket))
    <?php $counts = array_count_values($comparison->trinket); ?>
    <?php $comparison->trinket = array_unique($comparison->trinket); ?>
    @foreach ($comparison->trinket as $trinket)
        @include('compare-item', array('slot' => 'Trinket', 'id' => $trinket, 'name' => $names[$trinket], 'count' => $counts[$trinket]))
    @endforeach
@else
    @include('compare-item', array('slot' => 'Trinket'))
@endif

@if (!empty($comparison->mainHand))
    <?php $counts = array_count_values($comparison->mainHand); ?>
    <?php $comparison->mainHand = array_unique($comparison->mainHand); ?>
    @foreach ($comparison->mainHand as $mainHand)
        @include('compare-item', array('slot' => 'Main Hand', 'id' => $mainHand, 'name' => $names[$mainHand], 'count' => $counts[$mainHand]))
    @endforeach
@else
    @include('compare-item', array('slot' => 'Main Hand'))
@endif

@if (!empty($comparison->offHand))
    <?php $counts = array_count_values($comparison->offHand); ?>
    <?php $comparison->offHand = array_unique($comparison->offHand); ?>
    @foreach ($comparison->offHand as $offHand)
        @include('compare-item', array('slot' => 'Off Hand', 'id' => $offHand, 'name' => $names[$offHand], 'count' => $counts[$offHand]))
    @endforeach
@else
    @include('compare-item', array('slot' => 'Off Hand'))
@endif