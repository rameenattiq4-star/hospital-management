<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hospital;
use Illuminate\Support\Facades\DB;

class HospitalController extends Controller
{
    // Soft delete wale record ko restore karo
    public function restoreData()
    {
        $item = Hospital::withTrashed()->find(1);

        if ($item) {
            $item->restore();
            return 'Hospital with ID 1 restored successfully';
        }

        return 'Hospital with ID 1 not found';
    }


    // Record ko permanently delete karo
    public function forceDelete()
    {
        $item = Hospital::withTrashed()->find(1);

        if ($item) {
            $item->forceDelete();
            return 'Hospital permanently deleted';
        }

        return 'Hospital not found or already permanently deleted';
    }


    // Hospital Dashboard
    public function app()
    {
        $hospitals = Hospital::paginate(10);

        return view('hospital.app', compact('hospitals'));
    }


    // Data Add Karo (4 records)
    public function addData()
    {
        $data = [
            [
                'name' => 'Rameen Hospital',
                'email' => 'rameen@gmail.com',
                'age' => 22,
                'date_of_birth' => '2002-01-01',
                'gender' => 'f',
                'score' => 85
            ],
            [
                'name' => 'Rameen Medical Center',
                'email' => 'rameen.medical@gmail.com',
                'age' => 23,
                'date_of_birth' => '2001-01-01',
                'gender' => 'f',
                'score' => 90
            ],
            [
                'name' => 'Rameen Care Hospital',
                'email' => 'rameen.care@gmail.com',
                'age' => 21,
                'date_of_birth' => '2003-01-01',
                'gender' => 'f',
                'score' => 88
            ],
            [
                'name' => 'Rameen Health Center',
                'email' => 'rameen.health@gmail.com',
                'age' => 24,
                'date_of_birth' => '2000-01-01',
                'gender' => 'f',
                'score' => 95
            ],
        ];

        foreach ($data as $item) {
            Hospital::create($item);
        }

        return '4 Hospital records added successfully!';
    }


    // Add Form Dikhane Ke Liye
    public function add()
    {
        return view('hospital.add');
    }


    // CRUD Create — Form Submit Hone Par Data Save Karo
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:hospitals,email',
            'age' => 'required|integer',
            'date_of_birth' => 'required|date',
            'gender' => 'required',
            'score' => 'required|integer',
        ]);

        Hospital::create([
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'score' => $request->score,
        ]);

        return redirect('hospital')->with('success', 'Hospital added successfully!');
    }


    // ✅ CRUD Update — Edit Form Dikhane Ke Liye
    public function edit($id)
    {
        $hospital = Hospital::findOrFail($id);
        return view('hospital.edit', compact('hospital'));
    }


    // ✅ CRUD Update — Data Save Karne Ke Liye
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:hospitals,email,' . $id,
            'age' => 'required|integer',
            'date_of_birth' => 'required|date',
            'gender' => 'required',
            'score' => 'required|integer',
        ]);

        $hospital = Hospital::findOrFail($id);

        $hospital->update([
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
        ]);

        return redirect('hospital')->with('success', 'Hospital updated successfully!');
    }
  
public function delete($id)
{
    $hospital = Hospital::findOrFail($id);
    $hospital->delete();

    return redirect('hospital')->with('success', 'Hospital deleted successfully!');
}
}