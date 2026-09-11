<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HospitalController extends Controller
{
    public function addData()
    {
        DB::table('hospitals')->insert([
            'name' => 'tester',
            'email' => 'tester@gmail.com',
            'age' => 15,
            'date_of_birth' => '2010-01-01',
            'gender' => 'm'
        ]);

        return 'added successfully';
    }

    public function getData()
{
    $items = DB::table('hospitals')->get();

    return $items;
}

public function updateData()
{
    DB::table('hospitals')->where('id', 104)->update([  
        'name' => 'Updated Name',
    ]);

    return 'Updated Successfully';
}

public function deleteData()
{
    DB::table('hospitals')->where('id', 104)->delete();  // ✅ id = 104

    return 'Deleted Successfully';
}
}