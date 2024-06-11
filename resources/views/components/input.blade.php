@props([
'required' => false,
'disabled' => false,
'readonly' => false
])

<input {{ $attributes->merge(['class' => 'form-control']) }} @required($required) @disabled($disabled) @readonly($readonly)>
@if ($required)
<div class="invalid-feedback">{{ $attributes['placeholder'] ?? 'Kolom ini' }} tidak boleh kosong!</div>
@endif
