<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hospital;
use Illuminate\Support\Facades\Storage;

class HospitalController extends Controller
{
    // ================= SOFT DELETE RESTORE =================
    public function restoreData()
    {
        $item = Hospital::withTrashed()->find(1);

        if ($item) {
            $item->restore();
            return 'Hospital with ID 1 restored successfully';
        }

        return 'Hospital with ID 1 not found';
    }


    // ================= FORCE DELETE =================
    public function forceDelete()
    {
        $item = Hospital::withTrashed()->find(1);

        if ($item) {
            $item->forceDelete();
            return 'Hospital permanently deleted';
        }

        return 'Hospital not found or already permanently deleted';
    }


    // ================= ✅ DASHBOARD (SIRF EK app() METHOD) =================
  public function app()
{
    // ✅ FULL AGGREGATES — withCount, withSum, withAvg, withMax, withMin
    $hospitals = Hospital::with('doctors')
                         ->withCount('doctors')
                         ->withSum('doctors', 'score')
                         ->withAvg('doctors', 'score')
                         ->withMax('doctors', 'score')
                         ->withMin('doctors', 'score')
                         ->paginate(10);

    // ✅ Overall Stats
    $totalHospitals = Hospital::count();
    $totalDoctors   = \App\Models\Doctor::count();

    // ✅ Hospital ke score aggregates
    $totalScore = Hospital::sum('score');
    $avgScore   = round(Hospital::avg('score'), 1);
    $maxScore   = Hospital::max('score');
    $minScore   = Hospital::min('score');

    // ✅ Doctor score aggregates (poori table ka)
    $totalDoctorScore = \App\Models\Doctor::sum('score');
    $avgDoctorScore   = round(\App\Models\Doctor::avg('score'), 1);
    $maxDoctorScore   = \App\Models\Doctor::max('score');
    $minDoctorScore   = \App\Models\Doctor::min('score');

    return view('hospital.app', compact(
        'hospitals',
        'totalHospitals',
        'totalDoctors',
        'totalScore',
        'avgScore',
        'maxScore',
        'minScore',
        'totalDoctorScore',
        'avgDoctorScore',
        'maxDoctorScore',
        'minDoctorScore'
    ));
    
}

    // ================= ADD DATA (4 RECORDS) =================
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


    // ================= ADD FORM =================
    public function add()
    {
        return view('hospital.add');
    }


    // ================= STORE (CREATE) =================
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


    // ================= EDIT FORM =================
    public function edit($id)
    {
        $hospital = Hospital::with(['address', 'doctors', 'departments'])
                            ->findOrFail($id);

        return view('hospital.edit', compact('hospital'));
    }


    // ================= UPDATE =================
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

        if ($request->hasFile('image')) {
            if ($hospital->image) {
                Storage::disk('public')->delete($hospital->image);
            }
            $data['image'] = $request->file('image')->store('hospitals', 'public');
        }

        $hospital->update($data);

        return redirect('hospital')->with('success', 'Hospital updated successfully!');
    }


    // ================= DELETE =================
    public function delete($id)
    {
        $hospital = Hospital::findOrFail($id);

        if ($hospital->image) {
            Storage::disk('public')->delete($hospital->image);
        }

        $hospital->delete();

        return redirect('hospital')->with('success', 'Hospital deleted successfully!');
    }


    // ================= HAS ONE THROUGH =================
    public function hasOneThrough()
    {
        $hospitals = Hospital::with(['address', 'departments', 'firstDoctor'])
                             ->paginate(10);

        return view('hospital.has-one-through', compact('hospitals'));
    }


    // ================= HAS MANY THROUGH =================
    public function hasManyThrough()
    {
        $hospitals = Hospital::with(['address', 'departments', 'allDoctors'])
                             ->paginate(10);

        return view('hospital.has-many-through', compact('hospitals'));
    }
}