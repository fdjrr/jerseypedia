@props([
'variant' => 'primary'
])

@php
$classes = 'btn btn-' . $variant;
@endphp

<button {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</button>