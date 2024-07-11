<button {{ $attributes->merge(['type' => 'submit','class'=>'btn mb-4 mx-auto d-block btn-primary', 'style'=>'10%;' ]) }}>
    {{ $slot }}
</button>
