@extends('layouts.app')

@section('content')

<style>
    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
        background: #f1f5f9;
        color: #1e293b;
    }

    /* ================= HEADER ================= */

    .top-header {
        background: #17203d;
        color: white;
        height: 68px;
        padding: 0 40px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .header-title h1 {
        margin: 0;
        font-size: 21px;
        font-weight: 700;
    }

    .header-title p {
        margin: 3px 0 0;
        font-size: 10px;
        color: #cbd5e1;
    }

    .header-icon {
        font-size: 32px;
        opacity: 0.35;
    }


    /* ================= NAVBAR ================= */

    .navbar {
        height: 42px;
        background: #17203d;
        padding-left: 40px;
        display: flex;
        align-items: center;
        gap: 8px;
        border-bottom: 2px solid #facc15;
    }

    .navbar a {
        color: white;
        text-decoration: none;
        font-size: 10px;
        font-weight: 600;
        padding: 8px 12px;
        border-radius: 3px;
    }

    .navbar a:hover {
        background: #293555;
    }

    .navbar a.active {
        background: #facc15;
        color: #17203d;
    }


    /* ================= MAIN ================= */

    .main-container {
        max-width: 1250px;
        margin: 0 auto;
        padding: 15px 25px 40px;
    }


    /* ================= STATS ================= */

    .stats-container {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 14px;
        margin-bottom: 24px;
    }

    .stat-card {
        height: 76px;
        background: white;
        border-radius: 9px;
        padding: 14px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 3px 12px rgba(0,0,0,0.08);
        border-left: 3px solid #667eea;
    }

    .stat-card.active {
        border-left-color: #10b981;
    }

    .stat-card.pending {
        border-left-color: #fbbf24;
    }

    .stat-card.inactive {
        border-left-color: #ef4444;
    }

    .stat-card h2 {
        margin: 0 0 4px;
        font-size: 18px;
        color: #111827;
    }

    .stat-card p {
        margin: 0;
        font-size: 9px;
        color: #64748b;
    }

    .stat-icon {
        font-size: 25px;
        color: #cbd5e1;
    }


    /* ================= RECORDS ================= */

    .records-card {
        background: white;
        border-radius: 9px;
        padding: 14px;
        box-shadow: 0 3px 12px rgba(0,0,0,0.08);
    }

    .records-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 2px 0 12px;
        border-bottom: 1px solid #e5e7eb;
    }

    .records-header h2 {
        margin: 0;
        font-size: 14px;
        color: #17203d;
    }

    .records-count {
        background: #17203d;
        color: white;
        padding: 5px 11px;
        border-radius: 15px;
        font-size: 9px;
    }


    /* ================= FILTERS ================= */

    .filter-box {
        background: #f8fafc;
        border: 1px solid #e5e7eb;
        border-radius: 6px;
        margin-top: 10px;
        padding: 10px;
    }

    .filter-row {
        display: grid;
        grid-template-columns: 1.2fr 1.2fr 1fr 1fr;
        gap: 8px;
    }

    .filter-row input,
    .filter-row select {
        width: 100%;
        height: 30px;
        padding: 5px 8px;
        border: 1px solid #dbe2ea;
        border-radius: 4px;
        background: white;
        font-size: 9px;
        color: #334155;
        outline: none;
    }

    .filter-row input:focus,
    .filter-row select:focus {
        border-color: #667eea;
    }

    .filter-row input::placeholder {
        color: #64748b;
    }

    .filter-buttons {
        display: flex;
        justify-content: flex-end;
        gap: 6px;
        margin-top: 8px;
    }

    .filter-btn {
        background: #17203d;
        color: white;
        border: none;
        border-radius: 4px;
        padding: 8px 16px;
        font-size: 9px;
        font-weight: 600;
        cursor: pointer;
    }

    .reset-btn {
        background: #ef4444;
        color: white;
        border: none;
        border-radius: 4px;
        padding: 8px 16px;
        font-size: 9px;
        font-weight: 600;
        cursor: pointer;
    }

    .filter-btn:hover {
        background: #293555;
    }

    .reset-btn:hover {
        background: #dc2626;
    }


    /* ================= TABLE ================= */

    .table-wrapper {
        overflow-x: auto;
        margin-top: 10px;
    }

    .data-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 750px;
    }

    .data-table th {
        background: #f8fafc;
        color: #475569;
        font-size: 9px;
        font-weight: 700;
        text-align: left;
        padding: 10px 8px;
        border-bottom: 1px solid #e2e8f0;
    }

    .data-table td {
        padding: 9px 8px;
        font-size: 9px;
        color: #334155;
        border-bottom: 1px solid #e5e7eb;
    }

    .data-table tbody tr:hover {
        background: #f8fafc;
    }


    /* ================= BADGES ================= */

    .badge {
        display: inline-block;
        padding: 4px 9px;
        border-radius: 12px;
        font-size: 8px;
        font-weight: 600;
    }

    .badge-female {
        background: #fce7f3;
        color: #db2777;
    }

    .badge-male {
        background: #dbeafe;
        color: #2563eb;
    }

    .badge-active {
        background: #dcfce7;
        color: #16a34a;
    }


    /* ================= SCORE ================= */

    .score {
        color: #10b981;
        font-weight: 700;
    }


    /* ================= ACTIONS ================= */

    .actions {
        display: flex;
        gap: 8px;
        align-items: center;
    }

    .actions a {
        text-decoration: none;
        font-size: 16px;
        padding: 4px 6px;
    }

    .view {
        color: #6366f1;
    }

    .edit {
        color: #f59e0b;
    }

    .delete {
        color: #ef4444;
    }

    .actions a:hover {
        opacity: 0.7;
    }


    /* ================= PAGINATION ================= */

    .paginationDiv {
        margin-top: 20px;
        text-align: center;
    }


    /* ================= RESPONSIVE ================= */

    @media (max-width: 800px) {

        .stats-container {
            grid-template-columns: repeat(2, 1fr);
        }

        .filter-row {
            grid-template-columns: 1fr 1fr;
        }

        .top-header {
            padding: 0 20px;
        }

        .navbar {
            padding-left: 20px;
        }

        .main-container {
            padding: 15px;
        }
    }

    @media (max-width: 500px) {

        .stats-container {
            grid-template-columns: 1fr;
        }

        .filter-row {
            grid-template-columns: 1fr;
        }

        .navbar {
            padding-left: 10px;
            gap: 2px;
        }

        .navbar a {
            padding: 7px;
            font-size: 8px;
        }
    }
</style>


<!-- ================= HEADER ================= -->

<div class="top-header">

    <div class="header-title">
        <h1>Hospital Management System</h1>
        <p>Manage your hospitals efficiently with ease</p>
    </div>

    <div class="header-icon">
        🏥
    </div>

</div>


<!-- ================= NAVIGATION ================= -->

<div class="navbar">

    <a href="{{ url('hospital') }}" class="active">
        🏠 Dashboard
    </a>

    <a href="#">
        👨‍⚕️ Doctors
    </a>

    <a href="#">
        🏥 Hospitals
    </a>

    <a href="#">
        ⚙ Settings
    </a>

</div>


<!-- ================= MAIN CONTENT ================= -->

<div class="main-container">


    <!-- ================= STAT CARDS ================= -->

    <div class="stats-container">

        <div class="stat-card">
            <div>
                <h2>{{ $hospitals->total() }}</h2>
                <p>Total Hospitals</p>
            </div>
            <div class="stat-icon">🏥</div>
        </div>

        <div class="stat-card active">
            <div>
                <h2>{{ $hospitals->count() }}</h2>
                <p>Active Hospitals</p>
            </div>
            <div class="stat-icon">👤✓</div>
        </div>

        <div class="stat-card pending">
            <div>
                <h2>0</h2>
                <p>Pending Hospitals</p>
            </div>
            <div class="stat-icon">👤◷</div>
        </div>

        <div class="stat-card inactive">
            <div>
                <h2>0</h2>
                <p>Inactive Hospitals</p>
            </div>
            <div class="stat-icon">👤×</div>
        </div>

    </div>


    <!-- ================= RECORDS ================= -->

    <div class="records-card">

        <!-- Header -->
        <div class="records-header">
            <h2>☷ Hospital Records</h2>
            <span class="records-count">
                {{ $hospitals->total() }} Hospitals
            </span>
        </div>


        <!-- ✅ ADD HOSPITAL BUTTON -->
        <div style="margin-top: 12px; text-align: right;">
            <a class="addHospitalButton"
               href="{{ URL('hospital/add') }}"
               style="background: #2563eb; color: white; padding: 8px 18px; border-radius: 5px; text-decoration: none; font-size: 11px; font-weight: 600;">
                ➕ Add Hospital
            </a>
        </div>


        <!-- ================= FILTERS ================= -->

        <div class="filter-box">

            <div class="filter-row">

                <input type="text" id="search" name="search" placeholder="Name">
                <input type="text" name="email" placeholder="Email">

                <select name="gender">
                    <option value="">All Genders</option>
                    <option value="m">Male</option>
                    <option value="f">Female</option>
                </select>

                <select name="status">
                    <option value="">All Status</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>

            </div>

            <div class="filter-buttons">
                <button type="button" class="filter-btn">🔍 Filter</button>
                <button type="button" class="reset-btn">↻ Reset</button>
            </div>

        </div>


        <!-- ================= TABLE ================= -->

        <div class="table-wrapper">

            <table class="data-table">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name ↕</th>
                        <th>Email ↕</th>
                        <th>Age ↕</th>
                        <th>Gender</th>
                        <th>Score ↕</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($hospitals as $hospital)

                    <tr>

                        <td>#{{ $hospital->id }}</td>

                        <!-- ✅ Image Column -->
                        <td>
                            @if($hospital->image)
                                <img src="{{ asset('storage/' . $hospital->image) }}"
                                     alt="Hospital"
                                     style="width: 40px; height: 40px; object-fit: cover; border-radius: 50%;">
                            @else
                                <span style="color: #94a3b8; font-size: 11px;">No Image</span>
                            @endif
                        </td>

                        <td><strong>{{ $hospital->name }}</strong></td>
                        <td>{{ $hospital->email }}</td>
                        <td>{{ $hospital->age }}</td>

                        <td>
                            @if($hospital->gender == 'f')
                                <span class="badge badge-female">♀ Female</span>
                            @else
                                <span class="badge badge-male">♂ Male</span>
                            @endif
                        </td>

                        <td>
                            <span class="score">{{ $hospital->score }}%</span>
                        </td>

                        <td>
                            <span class="badge badge-active">Active</span>
                        </td>

                        <!-- ✅ ACTIONS COLUMN -->
                        <td>
                            <div class="actions">
                                <a href="#" class="view" title="View">👁</a>
                                <a href="{{ url('hospital/edit/' . $hospital->id) }}" class="edit" title="Edit">✏</a>
                                <a href="{{ url('hospital/delete/' . $hospital->id) }}"
                                   class="delete"
                                   title="Delete"
                                   onclick="return confirm('Kya aap waqai is hospital ko delete karna chahti hain?')">🗑</a>
                            </div>
                        </td>

                    </tr>

                    @empty

                    <tr>
                        <td colspan="9" style="text-align:center; padding:30px;">
                            No hospitals found!
                        </td>
                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        <!-- ✅ PAGINATION -->
        <div class="paginationDiv">
            {{ $hospitals->links() }}
        </div>

    </div>

</div>

@endsection