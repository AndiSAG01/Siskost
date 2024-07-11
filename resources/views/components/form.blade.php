@props(['method' => 'POST'])

<form {{ $attributes }} x-data="{ loading: false }" method="{{ $method }}" @submit="loading = !loading">
    {{ $slot }}
</form>