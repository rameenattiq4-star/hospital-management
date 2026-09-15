<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hospital;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;   // ✅ Import add kiya

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


    // ✅ CRUD Create — Form Submit Hone Par Data Save Karo
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:hospitals,email',
            'age' => 'required|integer|min:1|max:100',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:m,f',
            'score' => 'required|integer|min:0|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // ✅ Image Upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('hospitals', 'public');
        }

        Hospital::create([
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'score' => $request->score,
            'image' => $imagePath,
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:hospitals,email,' . $id,
            'age' => 'required|integer|min:1|max:100',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:m,f',
            'score' => 'required|integer|min:0|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $hospital = Hospital::findOrFail($id);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'score' => $request->score,
        ];

        // ✅ Image Upload (agar nayi image aayi ho)
        if ($request->hasFile('image')) {

            // ✅ Pehle purani image delete karo
            if ($hospital->image) {
                Storage::disk('public')->delete($hospital->image);
            }

            $data['image'] = $request->file('image')->store('hospitals', 'public');
        }

        $hospital->update($data);

        return redirect('hospital')->with('success', 'Hospital updated successfully!');
    }


    // ✅ CRUD Delete — Record + Image Delete Karo
    public function delete($id)
    {
        $hospital = Hospital::findOrFail($id);

        // ✅ Image delete karo storage se
        if ($hospital->image) {
            Storage::disk('public')->delete($hospital->image);
        }

        // ✅ Database se record delete karo
        $hospital->delete();

        return redirect('hospital')->with('success', 'Hospital deleted successfully!');
    }
}