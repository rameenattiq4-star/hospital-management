<?php

namespace App\Http\Controllers;

use App\Models\Doctors;
use Illuminate\Http\Request;

class DoctorsController extends Controller
{

public function index()
{
    return Doctors::all();
}

public function add()
{
    $item = new Doctors();
    $item->name = 'Test Name';
    $item->save();

    return 'Added Successfully';
}

public function show($id)
{
    $item = Doctors::findOrFail($id);

    return $item;
}

public function update($id)
{
    $item = Doctors::findOrFail($id);
    $item->name = 'Updated Teacher';
    $item->update();

    return 'updated Successfully';
}

public function delete($id)
{
    $item = Doctors::findOrFail($id);
    $item->delete();

    return 'Deleted Successfully';
}
}
