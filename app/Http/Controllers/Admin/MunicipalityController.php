<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Municipality;
use App\Models\District;
use Illuminate\Validation\Rule;

class MunicipalityController extends Controller
{
    public function create(){
        
        $districts = District::where('status', 1)
            ->orderBy('name', 'asc')
            ->pluck('name', 'id');

        return view('admin.locations.municipalities.create', compact('districts'));

    }

    public function index(){

        $municipalities = Municipality::with('district:id,name')
            ->orderBy('district_id')
            ->orderBy('name')
            ->get();

        return view('admin.locations.municipalities.index', compact('municipalities'));
    }

    public function store(Request $request){
        $request->validate([
            'district'=> 'required|exists:districts,id',
            'name'=> 'required|string|max:50|unique:municipalities,name',
            'status'=> 'required|boolean',
        ]);

        Municipality::create([
            'district_id'=> $request->input('district'),
            'name'=> $request->input('name'),
            'status'=> $request->boolean('status'),
        ]);

        return redirect()
            ->route('admin.locations.municipalities.index')
            ->with('Success','Municipality created successfully');
    }

    public function edit(Municipality $municipality){

        $districts = District::where('status', 1)
            ->orderBy('name', 'asc')
            ->pluck('name', 'id');

        return view('admin.locations.municipalities.update', compact('municipality', 'districts'));
    }

    public function update(Municipality $municipality, Request $request){
        $request->validate([
            'district'=> 'required|exists:districts,id',
            'name'=> [
                'required',
                'string',
                'max:50',
                Rule::unique('municipalities')
                ->ignore($municipality->id)
                ->where('district_id', $request->district),
            ],
            'status'=> 'required|boolean',
        ]);

        $municipality->update([
            'district'=> $request->input('district'),
            'name'=> $request->input('name'),
            'status'=> $request->boolean('status'),
        ]);

        return redirect()
            ->route('admin.locations.municipalities.index')
            ->with('Success','Municipality updated successfully');
    }

    public function destroy(Municipality $municipality){
        $municipality->delete();

        return redirect()
            ->route('admin.locations.municipalities.index')
            ->with('Success','Municipality deleted successfully');
    }
}
