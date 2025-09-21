@props(['title', 'description', 'route', 'color' => 'gray'])

<div class="bg-white shadow-lg rounded-lg p-6">
    <h3 class="text-lg font-bold mb-2">{{ $title }}</h3>
    <p class="text-gray-600 mb-4">{{ $description }}</p>
    <a href="{{ route($route) }}" class="bg-{{ $color }}-500 hover:bg-{{ $color }}-600 text-white px-4 py-2 rounded">
        Ir a {{ $title }}
    </a>
</div>
