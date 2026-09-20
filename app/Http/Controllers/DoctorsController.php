<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;   // ✅ Doctor model (singular) use karein
use App\Models\Hospital;

class DoctorsController extends Controller
{
    public function index()
    {
        // ✅ Saare doctors fetch karein (hospital ke saath)
        $doctors = Doctor::with('hospital')->paginate(15);

        return view('doctor.index', compact('doctors'));
    }

    public function add()
    {
        // ✅ Hospitals list for dropdown
        $hospitals = Hospital::all();

        return view('doctor.add', compact('hospitals'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'hospital_id' => 'required|exists:hospitals,id',
        ]);

        Doctor::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'hospital_id' => $request->hospital_id,
        ]);

        return redirect('doctor')->with('success', 'Doctor added successfully!');
    }

    public function edit($id)
    {
        $doctor = Doctor::findOrFail($id);
        $hospitals = Hospital::all();

        return view('doctor.edit', compact('doctor', 'hospitals'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'hospital_id' => 'required|exists:hospitals,id',
        ]);

        $doctor = Doctor::findOrFail($id);
        $doctor->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'hospital_id' => $request->hospital_id,
        ]);

        return redirect('doctor')->with('success', 'Doctor updated successfully!');
    }

    public function delete($id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();

        return redirect('doctor')->with('success', 'Doctor deleted successfully!');
    }
}