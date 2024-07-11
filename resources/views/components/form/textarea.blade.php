@php
    $invalid = $errors->has($name) ? 'is-invalid' : '';
@endphp

<textarea {!! $attributes->merge(['class'=> 'form-control'.$invalid]) !!}{!! $attributes !!}></textarea>
