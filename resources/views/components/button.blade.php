@props(['type' => 'primary'])
@php
$classes = match($type) {
    'primary' => "bg-cyan-500 text-white text-sm px-3 py-1 rounded",
    'secondary' => "bg-blue-500 text-white text-sm px-3 py-1 rounded",
    'danger' => "bg-red-500 text-white"
};
@endphp
<a {{ $attributes->merge(['class' => "$classes text-sm px-3 py-1 rounded"]) }}>
    {{ $slot }}
</a>