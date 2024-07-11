@props(['links' => [], 'active'])

<nav aria-label="breadcrumb" class="text-sm" style="font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif">
    <ol class="breadcrumb my-0 ms-2">
        <li class="breadcrumb-item">
            <span>
                <a href="{{ route('dashboard') }}" class="text-decoration-none text-dark">
                    <i class="fas fa-home me-1"></i> Home
                </a>
            </span>
        </li>
        @foreach ($links as $link)
            <li class="breadcrumb-item">
                <span >
                    <a href="{{ $link['url'] }}" class="text-decoration-none text-dark">{{ $link['name'] }}</a>
                </span>
            </li>
        @endforeach
        <li class="breadcrumb-item active">
            <span>{{ $active }}</span>
        </li>
    </ol>
</nav>
