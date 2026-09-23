@props(['color' => 'blue', 'text' => ''])

@php
    $colorMap = [
        'blue'   => 'background:#dbeafe; color:#1e40af;',
        'green'  => 'background:#d1fae5; color:#065f46;',
        'yellow' => 'background:#fef3c7; color:#92400e;',
        'red'    => 'background:#fee2e2; color:#991b1b;',
        'purple' => 'background:#ede9fe; color:#6d28d9;',
    ];
    $style = $colorMap[$color] ?? $colorMap['blue'];
@endphp

<span style="
    {{ $style }}
    display: inline-block;
    padding: 5px 12px;
    border-radius: 20px;
    font-size: 10px;
    font-weight: 700;
">
    {{ $text ?: $slot }}
</span>