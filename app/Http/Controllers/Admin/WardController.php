<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Municipality;
use App\Models\Ward;

class WardController extends Controller
{
    public function create(){
        
        $municipalities = Municipality::where('status', 1)
            ->orderBy('name', 'asc')
            ->pluck('name', 'id');

        return view('admin.locations.wards.create', compact('municipalities'));

    }

    public function index(){

        $wards = Ward::with('municipality:id,name')
            ->orderBy('municipality_id')
            ->orderBy('ward_no')
            ->get();

        return view('admin.locations.wards.index', compact('wards'));
    }

    public function store(Request $request){
        $request->validate([
            'municipality'=> 'required|exists:municipalities,id',
            'ward_no'=> 'required|string|max:50',
            'status'=> 'required|boolean',
        ]);

        Ward::create([
            'municipality_id'=> $request->input('municipality'),
            'ward_no'=> $request->input('ward_no'),
            'status'=> $request->boolean('status'),
        ]);

        return redirect()
            ->route('admin.locations.wards.index')
            ->with('Success','Ward created successfully');
    }

    public function edit(Ward $ward){

        $municipalities = Municipality::where('status', 1)
            ->orderBy('name', 'asc')
            ->pluck('name', 'id');

        return view('admin.locations.wards.update', compact('ward', 'municipalities'));
    }

    public function update(Ward $ward, Request $request){
        $request->validate([
            'municipality'=> 'required|exists:municipalities,id',
            'ward_no'=> [
                'required',
                'string',
                'max:50',
            ],
            'status'=> 'required|boolean',
        ]);

        $ward->update([
            'municipality'=> $request->input('municipality'),
            'ward_no'=> $request->input('ward_no'),
            'status'=> $request->boolean('status'),
        ]);

        return redirect()
            ->route('admin.locations.wards.index')
            ->with('Success','Ward updated successfully');
    }

    public function destroy(Ward $ward){
        $ward->delete();

        return redirect()
            ->route('admin.locations.wards.index')
            ->with('Success','Ward deleted successfully');
    }
}
