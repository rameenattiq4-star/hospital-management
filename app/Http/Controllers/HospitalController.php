<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hospital;
use Illuminate\Support\Facades\DB;

class HospitalController extends Controller
{
    // ✅ Soft delete wale record ko restore karo
    public function restoreData()
    {
        $item = Hospital::withTrashed()->find(1);   

        if ($item) {
            $item->restore();                     
            return 'Hospital with ID 1 restored successfully';
        }

        return 'Hospital with ID 1 not found';     
    }

    // ✅ Record ko permanently delete karo
    public function forceDelete()
    {
        $item = Hospital::withTrashed()->find(1);   

        if ($item) {
            $item->forceDelete();                 
            return 'Hospital permanently deleted';
        }

        return 'Hospital not found or already permanently deleted';  
    }

    public function app()
{
    $hospitals = Hospital::limit(10)->get();   
    return view('hospital.app', compact('hospitals'));   
}
}