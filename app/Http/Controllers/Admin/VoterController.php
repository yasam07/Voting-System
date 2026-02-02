<?php

namespace App\Http\Controllers\Admin;

use App\Models\Voter;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Http\Requests\StoreVoterRequest;
use App\Http\Controllers\Controller;


class VoterController extends Controller
{
    public function create()
    {
        return view('admin.voters.create');
    }

   public function store(StoreVoterRequest $request) 
   {

        Voter::create($request->validated()); 

        return redirect() 
            ->route('admin.voters.index') 
            ->with('success', 'Voter created successfully.'); 
    }

    public function index(Request $request)
    {
        $query = Voter::with(['province', 'district', 'municipality', 'ward']);

        // Multi-field search
        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->filled('citizenship')) {
            $query->where('citizenship', 'like', '%' . $request->citizenship . '%');
        }

        if ($request->filled('voter_id')) {
            $query->where('voter_id', 'like', '%' . $request->voter_id . '%');
        }

        // Fetch all voters if no filters
        $voters = $query->orderBy('created_at', 'asc')->get();

        return view('admin.voters.index', compact('voters'));
    }

    public function edit(Voter $voter)
    {

        $provinces = \App\Models\Province::pluck('name', 'id');

        $districts = \App\Models\District::where('province_id', $voter->province_id)
            ->pluck('name', 'id');

        $municipalities = \App\Models\Municipality::where('district_id', $voter->district_id)
            ->pluck('name', 'id');

        $wards = \App\Models\Ward::where('municipality_id', $voter->municipality_id)
            ->pluck('ward_no', 'id');

        return view('admin.voters.update', compact(
            'voter',
            'provinces',
            'districts',
            'municipalities',
            'wards'
        ));
    }


    public function update(StoreVoterRequest $request, Voter $voter)
    {
        $voter->update($request->validated());

        return redirect()
            ->route('admin.voters.index')
            ->with('success', 'Voter updated successfully');

    }

    public function destroy(Voter $voter)
    {
        $voter->delete();

        return redirect()
            ->route('admin.voters.index')
            ->with('success', 'Voter deleted successfully');
    }
}
