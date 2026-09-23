<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Cache;    // ✅ CACHE IMPORT
use App\Models\Hospital;

class HospitalController extends Controller
{
    // ================= DASHBOARD (With Search + Cache) =================
    public function app(Request $request)
    {
        // ✅ SESSION: Clear Search
        if ($request->has('clear')) {
            session()->forget('hospital_search');
            return redirect('hospital');
        }

        // ✅ SESSION: Save Search
        if ($request->has('search')) {
            session()->put('hospital_search', $request->search);
        }

        // ✅ SESSION: Read Search
        $search = session('hospital_search', '');

        // ============================================================
        // ✅ CACHED STATS — 10 minutes ke liye (600 seconds)
        // ============================================================

        $totalHospitals = Cache::remember('total_hospitals', 600, function () {
            return Hospital::count();
        });

        $totalDoctors = Cache::remember('total_doctors', 600, function () {
            return \App\Models\Doctor::count();
        });

        $totalScore = Cache::remember('total_score', 600, function () {
            return Hospital::sum('score');
        });

        $avgScore = Cache::remember('avg_score', 600, function () {
            return round(Hospital::avg('score'), 1);
        });

        $maxScore = Cache::remember('max_score', 600, function () {
            return Hospital::max('score');
        });

        $minScore = Cache::remember('min_score', 600, function () {
            return Hospital::min('score');
        });

        $totalDoctorScore = Cache::remember('total_doctor_score', 600, function () {
            return \App\Models\Doctor::sum('score');
        });

        $avgDoctorScore = Cache::remember('avg_doctor_score', 600, function () {
            return round(\App\Models\Doctor::avg('score'), 1);
        });

        $maxDoctorScore = Cache::remember('max_doctor_score', 600, function () {
            return \App\Models\Doctor::max('score');
        });

        $minDoctorScore = Cache::remember('min_doctor_score', 600, function () {
            return \App\Models\Doctor::min('score');
        });

        // ============================================================
        // ✅ HOSPITALS LIST — NO CACHE (search ke saath change hoti hai)
        // ============================================================

        $hospitals = Hospital::with('doctors')
                             ->when($search, function ($query) use ($search) {
                                 return $query->where('name', 'like', "%{$search}%")
                                              ->orWhere('email', 'like', "%{$search}%");
                             })
                             ->withCount('doctors')
                             ->withSum('doctors', 'score')
                             ->withAvg('doctors', 'score')
                             ->withMax('doctors', 'score')
                             ->withMin('doctors', 'score')
                             ->paginate(10);

        return view('hospital.app', compact(
            'hospitals',
            'search',
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

    // ================= INDEX =================
    public function index()
    {
        $hospitals = Hospital::with('doctors')
                             ->withCount('doctors')
                             ->withSum('doctors', 'score')
                             ->withAvg('doctors', 'score')
                             ->withMax('doctors', 'score')
                             ->withMin('doctors', 'score')
                             ->paginate(20);

        return view('hospital.app', compact('hospitals'));
    }

    // ================= ADD FORM =================
    public function add()
    {
        return view('hospital.add');
    }

    // ================= STORE =================
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
            'user_id' => auth()->id(),
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'score' => $request->score,
            'image' => $imagePath,
        ]);

        // ✅ CACHE CLEAR (kyunki naya data aaya)
        $this->clearHospitalCache();

        return redirect('hospital')->with('success', 'Hospital added successfully!');
    }

    // ================= EDIT =================
    public function edit($id)
    {
        $hospital = Hospital::findOrFail($id);

        // ✅ POLICY CHECK
        Gate::authorize('update', $hospital);

        // ✅ SESSION: Last Visited Save
        session()->put('last_visited_hospital', [
            'name' => $hospital->name,
            'time' => now()->format('d M Y, H:i'),
        ]);

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

        // ✅ POLICY CHECK
        Gate::authorize('update', $hospital);

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

        // ✅ CACHE CLEAR (kyunki data change hua)
        $this->clearHospitalCache();

        return redirect('hospital')->with('success', 'Hospital updated successfully!');
    }

    // ================= DELETE =================
    public function delete($id)
    {
        $hospital = Hospital::findOrFail($id);

        // ✅ POLICY CHECK
        Gate::authorize('delete', $hospital);

        if ($hospital->image) {
            Storage::disk('public')->delete($hospital->image);
        }

        $hospital->delete();

        // ✅ CACHE CLEAR (kyunki data delete hua)
        $this->clearHospitalCache();

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

    // ================= ADD 4 RECORDS =================
    public function addData()
    {
        $data = [
            ['name' => 'Rameen Hospital', 'email' => 'rameen@gmail.com', 'age' => 22, 'date_of_birth' => '2002-01-01', 'gender' => 'f', 'score' => 85],
            ['name' => 'Rameen Medical Center', 'email' => 'rameen.medical@gmail.com', 'age' => 23, 'date_of_birth' => '2001-01-01', 'gender' => 'f', 'score' => 90],
            ['name' => 'Rameen Care Hospital', 'email' => 'rameen.care@gmail.com', 'age' => 21, 'date_of_birth' => '2003-01-01', 'gender' => 'f', 'score' => 88],
            ['name' => 'Rameen Health Center', 'email' => 'rameen.health@gmail.com', 'age' => 24, 'date_of_birth' => '2000-01-01', 'gender' => 'f', 'score' => 95],
        ];

        foreach ($data as $item) {
            Hospital::create($item);
        }

        // ✅ CACHE CLEAR
        $this->clearHospitalCache();

        return '4 Hospital records added successfully!';
    }

    // ================= RESTORE =================
    public function restoreData()
    {
        $item = Hospital::withTrashed()->find(1);
        if ($item) {
            $item->restore();
            $this->clearHospitalCache();
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
            $this->clearHospitalCache();
            return 'Hospital permanently deleted';
        }
        return 'Hospital not found or already permanently deleted';
    }

    // ============================================================
    // ✅ CACHE CLEAR KARNE WALA PRIVATE METHOD
    // ============================================================
    private function clearHospitalCache()
    {
        Cache::forget('total_hospitals');
        Cache::forget('total_doctors');
        Cache::forget('total_score');
        Cache::forget('avg_score');
        Cache::forget('max_score');
        Cache::forget('min_score');
        Cache::forget('total_doctor_score');
        Cache::forget('avg_doctor_score');
        Cache::forget('max_doctor_score');
        Cache::forget('min_doctor_score');
    }
}