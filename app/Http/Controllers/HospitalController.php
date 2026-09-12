<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hospital;  // ✅ Yeh import hona chahiye
use Illuminate\Support\Facades\DB;  // ✅ Yeh bhi

class HospitalController extends Controller
{
    public function index()
    {
        return 'Hello from the Hospital Controller';
    }

    public function addData()
    {
        $item = new Hospital();
        $item->name = 'tester';
        $item->email = 'tester@gmail.com';
        $item->age = 25;
        $item->date_of_birth = '2010-01-01';
        $item->gender = 'f';
        $item->save();

        return 'added successfully';
    }

    public function updateData()
    {
        $item = Hospital::find(1);

        if ($item) {
            $item->name = 'updated student';
            $item->save();
            return 'Updated Successfully';
        }

        return 'Updated Successfully';
    }

    public function deleteData()
    {
        DB::table('hospitals')->where('id', 3)->delete();

        return 'Deleted Successfully';
    }
}