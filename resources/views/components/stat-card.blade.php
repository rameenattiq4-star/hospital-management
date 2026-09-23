@props([
    'value' => 0,
    'label' => 'Label',
    'icon' => '📊',
    'color' => 'blue',
])

@php
    $colorMap = [
        'blue'   => '#0284c7',
        'green'  => '#059669',
        'pink'   => '#db2777',
        'orange' => '#ea580c',
        'purple' => '#7c3aed',
        'teal'   => '#0d9488',
        'red'    => '#dc2626',
        'indigo' => '#4f46e5',
    ];
    $accentColor = $colorMap[$color] ?? $colorMap['blue'];
@endphp

<div class="stat-card" style="border-left-color: {{ $accentColor }};">
    <h2 style="color: {{ $accentColor }};">{{ $value }}</h2>
    <p>{{ $label }}</p>
    <div class="stat-icon">{{ $icon }}</div>
</div>