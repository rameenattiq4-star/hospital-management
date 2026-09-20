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

    .main-container {
        max-width: 1300px;
        margin: 0 auto;
        padding: 30px 25px;
    }

    .records-card {
        background: #ffffff;
        border-radius: 16px;
        padding: 25px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.06);
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
        font-size: 20px;
        color: #059669;
        font-weight: 800;
    }

    .add-btn {
        background: linear-gradient(135deg, #059669, #047857);
        color: white;
        padding: 11px 24px;
        border-radius: 10px;
        text-decoration: none;
        font-size: 13px;
        font-weight: 700;
        transition: all 0.3s;
        box-shadow: 0 4px 12px rgba(5, 150, 105, 0.3);
    }

    .add-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(5, 150, 105, 0.4);
    }

    .data-table {
        width: 100%;
        border-collapse: collapse;
    }

    .data-table th {
        background: #f8fafc;
        color: #475569;
        font-size: 11px;
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
        background: #f0fdf4;
    }

    .badge {
        display: inline-block;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 700;
    }

    .badge-hospital {
        background: #dbeafe;
        color: #1e40af;
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

    .success-msg {
        background: #d1fae5;
        color: #065f46;
        padding: 12px 18px;
        border-radius: 10px;
        margin-bottom: 20px;
        font-weight: 600;
        font-size: 13px;
    }

    .paginationDiv {
        margin-top: 25px;
        text-align: center;
    }
</style>

<div class="main-container">

    @if(session('success'))
        <div class="success-msg">✅ {{ session('success') }}</div>
    @endif

    <div class="records-card">
        <div class="records-header">
            <h2>👨‍⚕️ All Doctors</h2>
            <a href="{{ url('doctor/add') }}" class="add-btn">➕ Add Doctor</a>
        </div>

        <table class="data-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Doctor Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Hospital</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($doctors as $doctor)
                <tr>
                    <td>#{{ $doctor->id }}</td>
                    <td><strong style="color: #059669;">{{ $doctor->name }}</strong></td>
                    <td>{{ $doctor->email }}</td>
                    <td>{{ $doctor->phone ?? 'N/A' }}</td>
                    <td>
                        <span class="badge badge-hospital">
                            🏥 {{ $doctor->hospital->name ?? 'N/A' }}
                        </span>
                    </td>
                    <td class="actions">
                        <a href="{{ url('doctor/edit/' . $doctor->id) }}" title="Edit">✏️</a>
                        <a href="{{ url('doctor/delete/' . $doctor->id) }}"
                           title="Delete"
                           onclick="return confirm('Delete this doctor?')">🗑️</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align:center; padding:40px; color:#94a3b8;">
                        🏥 No doctors found! Click "Add Doctor" to add one.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <div class="paginationDiv">
            {{ $doctors->links() }}
        </div>
    </div>

</div>

@endsection