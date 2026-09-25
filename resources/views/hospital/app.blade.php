@extends('layouts.app')

@section('content')
@extends('layouts.app')

@section('content')

{{-- ✅ REAL-TIME NOTIFICATION AREA --}}
<div id="notification-area" style="
    position: fixed;
    top: 20px;
    right: 20px;
    z-index: 9999;
    display: flex;
    flex-direction: column;
    gap: 12px;
"></div>

<script type="module">
    // ✅ Laravel Echo setup (Reverb)
    import Echo from 'laravel-echo';
    import Pusher from 'pusher-js';

    window.Pusher = Pusher;

    window.Echo = new Echo({
        broadcaster: 'reverb',
        key: import.meta.env.VITE_REVERB_APP_KEY,
        wsHost: import.meta.env.VITE_REVERB_HOST,
        wsPort: import.meta.env.VITE_REVERB_PORT ?? 80,
        wssPort: import.meta.env.VITE_REVERB_PORT ?? 443,
        forceTLS: (import.meta.env.VITE_REVERB_SCHEME ?? 'https') === 'https',
        enabledTransports: ['ws', 'wss'],
    });

    // ✅ Channel sunna
    Echo.channel('hospitals')
        .listen('.hospital.added', (data) => {
            console.log('🏥 New Hospital Added:', data);
            showNotification(data);
        });

    function showNotification(data) {
        const notification = document.createElement('div');
        notification.style.cssText = `
            background: linear-gradient(135deg, #0284c7, #0369a1);
            color: white;
            padding: 18px 24px;
            border-radius: 14px;
            box-shadow: 0 10px 30px rgba(2, 132, 199, 0.4);
            font-family: 'Segoe UI', Arial, sans-serif;
            min-width: 340px;
            display: flex;
            align-items: center;
            gap: 14px;
            animation: slideIn 0.4s ease-out;
            border-left: 6px solid #10b981;
        `;

        notification.innerHTML = `
            <span style="font-size: 32px;">🏥</span>
            <div style="flex: 1;">
                <div style="font-weight: 800; font-size: 14px; margin-bottom: 4px;">New Hospital Added!</div>
                <div style="font-size: 13px; opacity: 0.95; font-weight: 600;">${data.name}</div>
                <div style="font-size: 11px; opacity: 0.75; margin-top: 4px;">Score: ${data.score}% · ${data.time}</div>
            </div>
        `;

        document.getElementById('notification-area').appendChild(notification);

        setTimeout(() => {
            notification.style.animation = 'slideOut 0.3s ease-in';
            setTimeout(() => notification.remove(), 300);
        }, 5000);
    }
</script>

<style>
    @keyframes slideIn {
        from { transform: translateX(450px); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
    }
    @keyframes slideOut {
        from { transform: translateX(0); opacity: 1; }
        to { transform: translateX(450px); opacity: 0; }
    }
</style>

{{-- Baaki content same rahega — Cache box, Search, Stats, Tables --}}

<style>
    * { box-sizing: border-box; }

    body {
        margin: 0;
        font-family: 'Segoe UI', Arial, sans-serif;
        background: #f1f5f9;
        color: #1e293b;
    }

    .top-header {
        background: linear-gradient(135deg, #ffffff, #f8fafc);
        color: #1e293b;
        padding: 22px 40px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 3px solid #0284c7;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }

    .header-title h1 {
        margin: 0;
        font-size: 24px;
        font-weight: 800;
        background: linear-gradient(90deg, #0284c7, #059669);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .header-title p {
        margin: 5px 0 0;
        font-size: 12px;
        color: #64748b;
        font-weight: 500;
    }

    .header-icon {
        font-size: 32px;
        background: linear-gradient(135deg, #0284c7, #059669);
        padding: 12px 18px;
        border-radius: 14px;
        color: white;
        box-shadow: 0 8px 20px rgba(2, 132, 199, 0.25);
    }

    .navbar {
        background: #ffffff;
        padding: 0 40px;
        display: flex;
        gap: 5px;
        border-bottom: 1px solid #e2e8f0;
        box-shadow: 0 1px 3px rgba(0,0,0,0.03);
    }

    .navbar a {
        color: #64748b;
        text-decoration: none;
        font-size: 13px;
        font-weight: 600;
        padding: 16px 22px;
        border-bottom: 3px solid transparent;
        transition: all 0.3s;
    }

    .navbar a:hover { color: #0284c7; background: #f0f9ff; }
    .navbar a.active {
        color: #0284c7;
        border-bottom-color: #0284c7;
        background: #f0f9ff;
    }

    .main-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 30px 25px;
    }

    /* ✅ CACHE INFO BOX */
    .cache-info {
        background: linear-gradient(135deg, #fef3c7, #fde68a);
        border: 2px solid #f59e0b;
        border-radius: 14px;
        padding: 18px 24px;
        margin-bottom: 25px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 15px;
        box-shadow: 0 4px 15px rgba(245, 158, 11, 0.2);
    }

    .cache-info-left {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .cache-info-icon {
        font-size: 32px;
    }

    .cache-info-title {
        font-size: 15px;
        font-weight: 800;
        color: #92400e;
        margin: 0;
    }

    .cache-info-sub {
        font-size: 12px;
        color: #a16207;
        margin: 3px 0 0 0;
        font-weight: 500;
    }

    .cache-badge {
        background: #92400e;
        color: white;
        padding: 8px 16px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 800;
        letter-spacing: 0.5px;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .cache-timer {
        background: #059669;
        color: white;
        padding: 8px 16px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 800;
        letter-spacing: 0.5px;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .section-title {
        font-size: 13px;
        font-weight: 800;
        color: #0284c7;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        margin: 25px 0 15px 0;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .section-title::before {
        content: '';
        width: 4px;
        height: 18px;
        background: linear-gradient(180deg, #0284c7, #059669);
        border-radius: 3px;
    }

    .stats-grid-5 {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 16px;
    }

    .stat-card {
        border-radius: 16px;
        padding: 22px;
        position: relative;
        overflow: hidden;
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-left: 5px solid #0284c7;
        box-shadow: 0 2px 8px rgba(0,0,0,0.04);
    }

    .stat-card h2 {
        margin: 0;
        font-size: 34px;
        font-weight: 800;
        color: #0f172a;
    }

    .stat-card p {
        margin: 6px 0 0;
        font-size: 11px;
        color: #64748b;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: 700;
    }

    .stat-icon {
        position: absolute;
        right: 18px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 56px;
        opacity: 0.08;
    }

    .card-blue   { border-left-color: #0284c7; }
    .card-green  { border-left-color: #059669; }
    .card-pink   { border-left-color: #db2777; }
    .card-orange { border-left-color: #ea580c; }
    .card-purple { border-left-color: #7c3aed; }

    .card-blue   h2 { color: #0284c7; }
    .card-green  h2 { color: #059669; }
    .card-pink   h2 { color: #db2777; }
    .card-orange h2 { color: #ea580c; }
    .card-purple h2 { color: #7c3aed; }

    .records-card {
        background: #ffffff;
        border-radius: 16px;
        padding: 25px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.06);
        margin-bottom: 25px;
        border: 1px solid #e2e8f0;
    }

    .data-table {
        width: 100%;
        border-collapse: collapse;
    }

    .data-table th {
        background: #f8fafc;
        color: #475569;
        font-size: 10px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1px;
        text-align: left;
        padding: 14px 12px;
        border-bottom: 2px solid #e2e8f0;
    }

    .data-table td {
        padding: 14px 12px;
        font-size: 13px;
        color: #334155;
        border-bottom: 1px solid #f1f5f9;
        font-weight: 500;
    }

    .data-table tbody tr {
        transition: background 0.2s;
    }

    .data-table tbody tr:hover {
        background: #f0f9ff;
    }

    .circle-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 32px;
        height: 32px;
        padding: 0 10px;
        background: #1e293b;
        color: white;
        border-radius: 50%;
        font-size: 12px;
        font-weight: 800;
        box-shadow: 0 4px 12px rgba(30, 41, 59, 0.25);
    }

    .badge {
        display: inline-block;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 10px;
        font-weight: 700;
    }

    .badge-blue   { background: #dbeafe; color: #1e40af; }
    .badge-green  { background: #d1fae5; color: #065f46; }
    .badge-yellow { background: #fef3c7; color: #92400e; }

    .text-center { text-align: center; }
    .text-right  { text-align: right; }

    .student-name {
        font-weight: 700;
        color: #0284c7;
    }

    .actions a {
        text-decoration: none;
        font-size: 16px;
        padding: 6px 10px;
        display: inline-block;
        border-radius: 8px;
        transition: all 0.2s;
    }

    .actions a:hover {
        background: #f1f5f9;
        transform: scale(1.1);
    }
</style>


<!-- ================= HEADER ================= -->
<div class="top-header">
    <div class="header-title">
        <h1>🏥 Hospital Management System</h1>
        <p>Dashboard — All Hospitals Records With Doctor Aggregates</p>
    </div>
    <div class="header-icon">📊</div>
</div>


<!-- ================= NAVBAR ================= -->
<div class="navbar">
    <a href="{{ url('hospital') }}" class="active">🏠 Dashboard</a>
    <a href="{{ url('hospital/add') }}">➕ Add Hospital</a>
    <a href="{{ url('has-one-through') }}">📍 Has One Through</a>
    <a href="{{ url('has-many-through') }}">👨‍⚕️ Has Many Through</a>
</div>


<!-- ================= MAIN CONTENT ================= -->
<div class="main-container">

    {{-- ✅ CACHE STATUS BOX — Ye proof hai ke cache chal raha hai --}}
    <div class="cache-info">
        <div class="cache-info-left">
            <span class="cache-info-icon">⚡</span>
            <div>
                <p class="cache-info-title">Cache System Active</p>
                <p class="cache-info-sub">Statistics 10 minutes ke liye cache mein save hain — page fast load hota hai</p>
            </div>
        </div>
        <div style="display: flex; gap: 10px; align-items: center; flex-wrap: wrap;">
            <span class="cache-badge">
                <span>🎯</span> Cache: <strong>ENABLED</strong>
            </span>
            <span class="cache-timer">
                <span>⏱</span> Duration: <strong>10 min</strong>
            </span>
        </div>
    </div>

    {{-- ✅ SESSION: Success Message (Flash) --}}
    @if(session('success'))
        <div style="
            background: #d1fae5;
            color: #065f46;
            border-left: 5px solid #10b981;
            padding: 15px 22px;
            border-radius: 12px;
            margin-bottom: 20px;
            font-weight: 700;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.15);
        ">
            <span style="font-size: 20px;">✅</span>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    {{-- ✅ SESSION: Error Message (Flash) --}}
    @if(session('error'))
        <div style="
            background: #fee2e2;
            color: #991b1b;
            border-left: 5px solid #dc2626;
            padding: 15px 22px;
            border-radius: 12px;
            margin-bottom: 20px;
            font-weight: 700;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 4px 12px rgba(220, 38, 38, 0.15);
        ">
            <span style="font-size: 20px;">❌</span>
            <span>{{ session('error') }}</span>
        </div>
    @endif

    {{-- ✅ SESSION: Last Visited Hospital --}}
    @if(session('last_visited_hospital'))
        <div style="
            background: #eff6ff;
            color: #1e40af;
            border-left: 5px solid #0284c7;
            padding: 12px 20px;
            border-radius: 12px;
            margin-bottom: 20px;
            font-weight: 600;
            font-size: 13px;
            display: flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 4px 12px rgba(2, 132, 199, 0.15);
        ">
            <span style="font-size: 18px;">🕐</span>
            <span>Last Visited: <strong>{{ session('last_visited_hospital.name') }}</strong></span>
            <span style="color: #64748b; font-size: 12px;">({{ session('last_visited_hospital.time') }})</span>
        </div>
    @endif

    {{-- ✅ SEARCH FORM --}}
    <form method="GET" action="{{ url('hospital') }}" style="
        display: flex;
        gap: 10px;
        align-items: center;
        background: white;
        padding: 15px;
        border-radius: 16px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        border: 1px solid #e2e8f0;
        margin-bottom: 20px;
    ">
        <input 
            type="text" 
            name="search" 
            value="{{ $search ?? '' }}" 
            placeholder="🔍 Search hospital by name or email..."
            style="
                flex: 1;
                padding: 12px 18px;
                border: 1px solid #cbd5e1;
                border-radius: 10px;
                font-size: 14px;
                background: #f8fafc;
                outline: none;
            "
        >

        <button type="submit" style="
            background: linear-gradient(135deg, #0284c7, #0369a1);
            color: white;
            padding: 12px 28px;
            border: none;
            border-radius: 10px;
            font-weight: 700;
            font-size: 14px;
            cursor: pointer;
        ">
            🔍 Search
        </button>

        @if($search ?? false)
            <a href="{{ url('hospital') }}?clear=1" style="
                background: #f1f5f9;
                color: #475569;
                padding: 12px 22px;
                border-radius: 10px;
                text-decoration: none;
                font-weight: 700;
                font-size: 14px;
            ">
                ❌ Clear
            </a>
        @endif
    </form>

    @if($search ?? false)
        <p style="margin: 0 0 20px 5px; color: #64748b; font-size: 13px;">
            🔍 Searching for: <strong style="color: #0284c7;">{{ $search }}</strong>
        </p>
    @endif


    <!-- TOP STATS -->
    <h3 class="section-title">📊 Hospital Overview</h3>

    <div class="stats-grid-5">
        <div class="stat-card card-blue">
            <h2>{{ $totalHospitals ?? $hospitals->total() ?? 0 }}</h2>
            <p>Total Hospitals</p>
            <div class="stat-icon">🏥</div>
        </div>

        <div class="stat-card card-green">
            <h2>{{ $totalDoctors ?? 0 }}</h2>
            <p>Total Doctors</p>
            <div class="stat-icon">👨‍⚕️</div>
        </div>

        <div class="stat-card card-pink">
            <h2>{{ $totalDoctorScore ?? 0 }}</h2>
            <p>Doctor Score Sum</p>
            <div class="stat-icon">📈</div>
        </div>

        <div class="stat-card card-orange">
            <h2>{{ $avgDoctorScore ?? 0 }}</h2>
            <p>Avg Doctor Score</p>
            <div class="stat-icon">📊</div>
        </div>

        <div class="stat-card card-purple">
            <h2>{{ $maxDoctorScore ?? 0 }}</h2>
            <p>Max Doctor Score</p>
            <div class="stat-icon">⬆️</div>
        </div>
    </div>


    <!-- TABLE 1 -->
    <h3 class="section-title">🏥 Hospitals with Doctors Count</h3>

    <div class="records-card">
        <table class="data-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Hospital Name</th>
                    <th class="text-right">Total Doctors</th>
                </tr>
            </thead>
            <tbody>
                @forelse($hospitals as $hospital)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="student-name">{{ $hospital->name }}</td>
                    <td class="text-right">
                        <span class="circle-badge">{{ $hospital->doctors_count ?? 0 }}</span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center" style="padding:30px; color:#94a3b8;">
                        No hospitals found!
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>


    <!-- TABLE 2 -->
    <h3 class="section-title">🏢 Hospitals with Departments Count</h3>

    <div class="records-card">
        <table class="data-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Hospital Name</th>
                    <th class="text-right">Total Departments</th>
                </tr>
            </thead>
            <tbody>
                @forelse($hospitals as $hospital)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="student-name">{{ $hospital->name }}</td>
                    <td class="text-right">
                        <span class="circle-badge">{{ $hospital->departments_count ?? 0 }}</span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center" style="padding:30px; color:#94a3b8;">
                        No data found!
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>


    <!-- TABLE 3 WITH POLICY -->
    <h3 class="section-title">📊 Hospitals with Doctor Score Statistics</h3>

    <div class="records-card">
        <table class="data-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Hospital Name</th>
                    <th class="text-center">Count</th>
                    <th class="text-center">Sum</th>
                    <th class="text-center">Avg</th>
                    <th class="text-center">Max</th>
                    <th class="text-center">Min</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($hospitals as $hospital)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="student-name">{{ $hospital->name }}</td>
                    <td class="text-center">
                        <span class="circle-badge">{{ $hospital->doctors_count ?? 0 }}</span>
                    </td>
                    <td class="text-center">
                        <strong>{{ $hospital->doctors_sum_score ?? 0 }}</strong>
                    </td>
                    <td class="text-center">
                        <span class="badge badge-blue">{{ round($hospital->doctors_avg_score ?? 0, 1) }}</span>
                    </td>
                    <td class="text-center">
                        <span class="badge badge-green">{{ $hospital->doctors_max_score ?? 0 }}</span>
                    </td>
                    <td class="text-center">
                        <span class="badge badge-yellow">{{ $hospital->doctors_min_score ?? 0 }}</span>
                    </td>
                    <td class="text-center actions">
                        @can('update', $hospital)
                            <a href="{{ url('hospital/edit/' . $hospital->id) }}" title="Edit">✏️</a>
                        @endcan

                        @can('delete', $hospital)
                            <a href="{{ url('hospital/delete/' . $hospital->id) }}"
                               title="Delete"
                               onclick="return confirm('Delete this hospital?')">🗑️</a>
                        @endcan

                        @cannot('update', $hospital)
                            <span style="color:#cbd5e1; font-size:12px;">🔒</span>
                        @endcannot
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center" style="padding:30px; color:#94a3b8;">
                        No data found!
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <div style="margin-top:20px; text-align:center;">
            {{ $hospitals->links() }}
        </div>
    </div>

</div>

@endsection