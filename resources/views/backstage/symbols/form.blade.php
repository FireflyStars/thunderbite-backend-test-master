@csrf

@include('backstage.partials.forms.text', [
    'field' => 'name',
    'label' => 'Name',
    'value' => old('name') ?? $symbol->name,
])

@include('backstage.partials.forms.images', [
    'field' => 'image',
    'label' => 'Image',
    'value' => old('image') ?? $symbol->image,
])

@include('backstage.partials.forms.number', [
    'field' => 'points_3_match',
    'label' => 'Points(3 matches)',
    'value' => old('points_3_match') ?? $symbol->points_3_match,
])
@include('backstage.partials.forms.number', [
    'field' => 'points_4_match',
    'label' => 'Points(4 matches)',
    'value' => old('points_4_match') ?? $symbol->points_4_match,
])
@include('backstage.partials.forms.number', [
    'field' => 'points_5_match',
    'label' => 'Points(5 matches)',
    'value' => old('points_5_match') ?? $symbol->points_5_match,
])

@include('backstage.partials.forms.submit')
