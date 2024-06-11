@props([
'required' => false,
'disabled' => false,
'readonly' => false,
])

<textarea {{ $attributes->merge(['class'=> 'form-control']) }} @required($required) @disabled($disabled) @readonly($readonly)>{{ $slot }}</textarea>
