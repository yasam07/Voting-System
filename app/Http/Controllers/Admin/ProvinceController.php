<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Province;
use Illuminate\Validation\Rule;

class ProvinceController extends Controller
{
    public function index()
    {
        $provinces = Province::orderBy('id','asc')->get();

        return view('admin.locations.provinces.index', compact('provinces'));
    }

    public function create()
    {
        return view('admin.locations.provinces.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:50|unique:provinces,name',
            'status'=>'required|boolean',
        ]);

        Province::create([
            'name' => $request->name,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.locations.provinces.index')
            ->with('success','Province created successfully');
    }


    public function edit(Province $province)
    {

        return view('admin.locations.provinces.update', compact('province'));
    }

    public function update(Province $province, Request $request){
        $request->validate([
           'name' => [
            'required',
            'string',
            'max:50',
            Rule::unique('provinces')->ignore($province->id),
        ],
            'status'=>'required|boolean',
        ]);

        $province->update([
            'name' => $request->name,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.locations.provinces.index')
            ->with('success','Province updated successfully');
    }

    public function destroy(Province $province)
    {
        $province->delete();

        return redirect()
            ->route('admin.locations.provinces.index')
            ->with('success','Province deleted successfully');

    }
}
