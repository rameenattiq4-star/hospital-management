<!DOCTYPE html>
<html>
<head>
    <title>Component Test</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body style="background: #f1f5f9; padding: 40px; font-family: sans-serif;">

    <h1 style="color: #0284c7;">🎯 Component Test Page</h1>

    <!-- ✅ STAT CARDS TEST -->
    <h3 style="color: #334155; margin-top: 30px;">📊 Stat Cards</h3>

    <div style="display: grid; grid-template-columns: repeat(5, 1fr); gap: 16px; margin-bottom: 40px;">
        <x-stat-card :value="100" label="Total Hospitals" icon="🏥" color="blue" />
        <x-stat-card :value="250" label="Total Doctors" icon="👨‍⚕️" color="green" />
        <x-stat-card :value="8500" label="Score Sum" icon="📈" color="pink" />
        <x-stat-card :value="92.5" label="Avg Score" icon="📊" color="orange" />
        <x-stat-card :value="100" label="Max Score" icon="⬆️" color="purple" />
    </div>

    <!-- ✅ BADGES TEST -->
    <h3 style="color: #334155;">🏷️ Badges</h3>

    <div style="display: flex; gap: 10px; margin-bottom: 40px;">
        <x-badge color="blue">Active</x-badge>
        <x-badge color="green">Approved</x-badge>
        <x-badge color="yellow">Pending</x-badge>
        <x-badge color="red">Rejected</x-badge>
        <x-badge color="purple">Premium</x-badge>
    </div>

    <!-- ✅ ALERTS TEST -->
    <h3 style="color: #334155;">💬 Alerts</h3>

    <x-alert type="success" message="Hospital added successfully!" />
    <x-alert type="error" message="Something went wrong!" />
    <x-alert type="warning" message="Please check your input!" />
    <x-alert type="info" message="This is an info message." />

</body>
</html>