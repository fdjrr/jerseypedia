@props([
'name' => '',
'value' => '',
'required' => false,
'readonly' => false,
'disabled' => false,
])

<label class="form-check">
    <input type="checkbox" name="{{ $name }}" class="form-check-input" @required($required) @readonly($readonly) @disabled($disabled) />
    <span class="form-check-label">{{ $slot }}</span>
</label>