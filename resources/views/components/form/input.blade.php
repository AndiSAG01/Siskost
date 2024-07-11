@php
    $invalid = $errors->has($name) ? 'is-invalid' :'';
@endphp

<input {!! $attributes->merge(['class' => 'form-control'. $invalid]) !!}{!! $attributes !!}>