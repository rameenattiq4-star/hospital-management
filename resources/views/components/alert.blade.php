@props(['type' => 'info', 'message' => ''])

@php
    $colors = [
        'success' => ['bg' => '#d1fae5', 'color' => '#065f46', 'border' => '#10b981', 'icon' => '✅'],
        'error'   => ['bg' => '#fee2e2', 'color' => '#991b1b', 'border' => '#dc2626', 'icon' => '❌'],
        'warning' => ['bg' => '#fef3c7', 'color' => '#92400e', 'border' => '#f59e0b', 'icon' => '⚠️'],
        'info'    => ['bg' => '#dbeafe', 'color' => '#1e40af', 'border' => '#0284c7', 'icon' => 'ℹ️'],
    ];
    $style = $colors[$type] ?? $colors['info'];
@endphp

<div style="
    background: {{ $style['bg'] }};
    color: {{ $style['color'] }};
    border-left: 4px solid {{ $style['border'] }};
    padding: 12px 18px;
    border-radius: 10px;
    margin-bottom: 15px;
    font-weight: 600;
    font-size: 14px;
    display: flex;
    align-items: center;
    gap: 10px;
">
    <span style="font-size: 18px;">{{ $style['icon'] }}</span>
    <span>{{ $message ?: $slot }}</span>
</div>