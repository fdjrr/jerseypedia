@props([
'required' => false
])

@php
$classes = 'form-label' . ($required ? ' required' : '');
@endphp

<label {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</label>