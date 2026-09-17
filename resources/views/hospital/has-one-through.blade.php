@extends('layouts.app')

@section('content')

<div style="max-width: 1200px; margin: 40px auto; padding: 20px;">

    <h2 style="margin-bottom: 20px;">🏥 Hospital → First Doctor (HasOneThrough)</h2>

    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr style="background: #17203d; color: white;">
                <th style="padding: 10px;">ID</th>
                <th style="padding: 10px;">Hospital Name</th>
                <th style="padding: 10px;">📍 Address</th>
                <th style="padding: 10px;">👨‍⚕️ First Doctor</th>
                <th style="padding: 10px;">Specialization</th>
                <th style="padding: 10px;">Phone</th>
            </tr>
        </thead>
        <tbody>
            @forelse($hospitals as $hospital)
                <tr style="border-bottom: 1px solid #eee;">
                    <td style="padding: 10px;">#{{ $hospital->id }}</td>
                    <td style="padding: 10px;">{{ $hospital->name }}</td>
                    <td style="padding: 10px;">
                        {{ $hospital->address->city ?? 'N/A' }}
                    </td>
                    <td style="padding: 10px;">
                        {{ $hospital->firstDoctor->name ?? 'No Doctor' }}
                    </td>
                    <td style="padding: 10px;">
                        {{ $hospital->firstDoctor->specialization ?? 'N/A' }}
                    </td>
                    <td style="padding: 10px;">
                        {{ $hospital->firstDoctor->phone ?? 'N/A' }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align:center; padding:30px;">
                        No hospitals found!
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top: 20px; text-align: center;">
        {{ $hospitals->links() }}
    </div>

</div>

@endsection