@if($sortField !== $field)
    <i class="fas fa-sort-alt"></i>
@elseif($sortAsc)
    <i class="fas fa-sort-amount-down"></i>
@else
    <i class="fas fa-sort-amount-up"></i>
@endif
