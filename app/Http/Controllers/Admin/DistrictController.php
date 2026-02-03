<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\District;
use App\Models\Province;
use Illuminate\Validation\Rule;


class DistrictController extends Controller
{
    public function create(){

        $provinces = Province::where('status', 1)
            ->orderBy('name','asc')
            ->pluck('name','id');

        return view('admin.locations.districts.create', compact('provinces'));
    }

    public function index(){
        
        $districts = District::with('province:id,name')
            ->orderBy('province_id')
            ->orderBy('name')
            ->get();

        return view('admin.locations.districts.index', compact('districts'));
    }

    public function store(Request $request){
        $request->validate([
            'province'=>'required|exists:provinces,id',
            'name'=>'required|string|max:50|unique:districts,name',
            'status'=>'required|boolean',
        ]);

        District::create([
            'name'=>$request->input('name'),
            'province_id'=>$request->input('province'),
            'status'=>$request->boolean('status'),
        ]);

        return redirect()
            ->route('admin.locations.districts.index')
            ->with('success','Districts Created Successfully');
    }

    public function edit(District $district){

         $provinces = Province::where('status', 1)
            ->orderBy('name','asc')
            ->pluck('name','id');

        return view('admin.locations.districts.update', compact('district', 'provinces'));
    }

    public function update(District $district, Request $request){
        $request->validate([
            'province'=>'required|exists:provinces,id',
            'name' => [
                'required',
                'string',
                'max:50',
                Rule::unique('districts')
                ->ignore($district->id)
                ->where('province_id', $request->province),
            ],
            'status'=>'required|boolean',
        ]);

        $district->update([
            'name'=>$request->input('name'),
            'province'=>$request->input('province'),
            'status'=>$request->boolean('status'),
        ]);

        return redirect()
            ->route('admin.locations.districts.index')
            ->with('success','Districts updated Successfully');
    }

    public function destroy(District $district){
        $district->delete();

         return redirect()
            ->route('admin.locations.districts.index')
            ->with('success','Districts deleted Successfully');
    }
}
