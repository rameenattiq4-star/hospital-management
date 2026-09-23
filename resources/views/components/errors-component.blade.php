@props(['errors' => null])

@if($errors && $errors->any())
    <div style="
        background: #fee2e2;
        color: #991b1b;
        border-left: 4px solid #dc2626;
        padding: 15px 20px;
        border-radius: 10px;
        margin-bottom: 20px;
        font-size: 14px;
    ">
        <div style="
            font-weight: 800;
            margin-bottom: 8px;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 8px;
        ">
            <span style="font-size: 18px;">⚠️</span>
            <span>Please fix the following errors:</span>
        </div>

        <ul style="
            margin: 0;
            padding-left: 22px;
            font-weight: 500;
            line-height: 1.8;
        ">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif