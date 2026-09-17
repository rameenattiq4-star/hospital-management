@extends('layouts.app')

@section('content')

<style>
    * { box-sizing: border-box; }

    body {
        margin: 0;
        font-family: 'Segoe UI', Arial, sans-serif;
        background: #f1f5f9;
        color: #1e293b;
    }

    /* ================= HEADER ================= */
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

    /* ================= NAVBAR ================= */
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

    /* ================= MAIN ================= */
    .main-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 30px 25px;
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

    /* ================= STATS CARDS ================= */
    .stats-grid-5 {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 16px;
    }

    .stats-grid-4 {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 16px;
    }

    .stat-card {
        border-radius: 16px;
        padding: 22px;
        position: relative;
        overflow: hidden;
        transition: transform 0.3s, box-shadow 0.3s;
        cursor: pointer;
        min-height: 120px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-left: 5px solid #0284c7;
        box-shadow: 0 2px 8px rgba(0,0,0,0.04);
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 30px rgba(2, 132, 199, 0.15);
    }

    .card-blue   { border-left-color: #0284c7; }
    .card-green  { border-left-color: #059669; }
    .card-pink   { border-left-color: #db2777; }
    .card-orange { border-left-color: #ea580c; }
    .card-purple { border-left-color: #7c3aed; }
    .card-teal   { border-left-color: #0d9488; }
    .card-red    { border-left-color: #dc2626; }
    .card-indigo { border-left-color: #4f46e5; }

    .stat-card h2 {
        margin: 0;
        font-size: 34px;
        font-weight: 800;
        color: #0f172a;
        position: relative;
        z-index: 2;
    }

    .stat-card p {
        margin: 6px 0 0;
        font-size: 11px;
        color: #64748b;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: 700;
        position: relative;
        z-index: 2;
    }

    .stat-icon {
        position: absolute;
        right: 18px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 56px;
        opacity: 0.08;
        z-index: 1;
    }

    .card-blue   h2 { color: #0284c7; }
    .card-green  h2 { color: #059669; }
    .card-pink   h2 { color: #db2777; }
    .card-orange h2 { color: #ea580c; }
    .card-purple h2 { color: #7c3aed; }
    .card-teal   h2 { color: #0d9488; }
    .card-red    h2 { color: #dc2626; }
    .card-indigo h2 { color: #4f46e5; }

    /* ================= TABLE CARD ================= */
    .records-card {
        background: #ffffff;
        border-radius: 16px;
        padding: 25px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.06);
        margin-bottom: 25px;
        border: 1px solid #e2e8f0;
    }

    .records-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-bottom: 18px;
        border-bottom: 2px solid #f1f5f9;
        margin-bottom: 20px;
    }

    .records-header h2 {
        margin: 0;
        font-size: 17px;
        color: #0f172a;
        font-weight: 800;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .add-btn {
        background: linear-gradient(135deg, #0284c7, #0369a1);
        color: white;
        padding: 11px 24px;
        border-radius: 10px;
        text-decoration: none;
        font-size: 12px;
        font-weight: 700;
        transition: all 0.3s;
        box-shadow: 0 4px 12px rgba(2, 132, 199, 0.3);
    }

    .add-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(2, 132, 199, 0.4);
    }

    /* ================= TABLE ================= */
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

    /* ✅ Dark Circular Badge */
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

    /* ✅ Score Badges */
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
    .badge-red    { background: #fee2e2; color: #991b1b; }

    .text-center { text-align: center; }
    .text-right  { text-align: right; }

    .student-name {
        font-weight: 700;
        color: #0284c7;
    }

    @media (max-width: 1100px) {
        .stats-grid-5 { grid-template-columns: repeat(3, 1fr); }
        .stats-grid-4 { grid-template-columns: repeat(2, 1fr); }
        .data-table { font-size: 11px; }
        .data-table th, .data-table td { padding: 10px 6px; }
    }

    @media (max-width: 700px) {
        .stats-grid-5 { grid-template-columns: repeat(2, 1fr); }
        .stats-grid-4 { grid-template-columns: 1fr; }
        .main-container { padding: 15px; }
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

    <!-- =====================================================
         TOP STATS CARDS (Overview)
    ====================================================== -->
    <h3 class="section-title">📊 Hospital Overview</h3>

    <div class="stats-grid-5">
        <div class="stat-card card-blue">
            <h2>{{ $hospitals->total() ?? 0 }}</h2>
            <p>Total Hospitals</p>
            <div class="stat-icon">🏥</div>
        </div>

        <div class="stat-card card-green">
            <h2>{{ $hospitals->sum('doctors_count') ?? 0 }}</h2>
            <p>Total Doctors</p>
            <div class="stat-icon">👨‍⚕️</div>
        </div>

        <div class="stat-card card-pink">
            <h2>{{ $hospitals->sum('doctors_sum_score') ?? 0 }}</h2>
            <p>Doctor Score Sum</p>
            <div class="stat-icon">📈</div>
        </div>

        <div class="stat-card card-orange">
            <h2>{{ round($hospitals->avg('doctors_avg_score') ?? 0, 1) }}</h2>
            <p>Avg Doctor Score</p>
            <div class="stat-icon">📊</div>
        </div>

        <div class="stat-card card-purple">
            <h2>{{ $hospitals->max('doctors_max_score') ?? 0 }}</h2>
            <p>Max Doctor Score</p>
            <div class="stat-icon">⬆️</div>
        </div>
    </div>


    <!-- =====================================================
         TABLE 1: Hospitals with Doctors Count
    ====================================================== -->
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


    <!-- =====================================================
         TABLE 2: Hospitals with Departments Count
    ====================================================== -->
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


    <!-- =====================================================
         TABLE 3: Hospitals with Doctor Score Statistics
    ====================================================== -->
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
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center" style="padding:30px; color:#94a3b8;">
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