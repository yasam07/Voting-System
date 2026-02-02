<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Party;
use App\Models\Post;
use App\Models\Province;
use App\Models\District;
use App\Models\Municipality;
use App\Models\Ward;
use App\Models\Candidate;
use App\Http\Requests\StoreCandidateRequest;

class CandidateController extends Controller
{
    /**
     * Show the candidate creation form.
     */
    public function create() 
    {
        $posts = Post::pluck('name', 'id');    // [id => name] for dropdown
        $party = Party::pluck('name', 'id');   // [id => name] for dropdown

        return view('admin.candidates.create', compact('posts', 'party'));
    }

    /**
     * List all candidates with their relationships.
     */
    public function index()
    {
        $candidates = Candidate::with([
            'post', 
            'party', 
            'province', 
            'district', 
            'municipality', 
            'ward'
        ])->orderBy('id', 'desc')->get();

        return view('admin.candidates.index', compact('candidates'));
    }

    /**
     * Store a new candidate.
     */
    public function store(StoreCandidateRequest $request)
    {
        
        
        // Create candidate
        Candidate::create($request->validated());

        return redirect()
            ->route('admin.candidates.index')
            ->with('success', 'Candidate added successfully.');
    }

    public function edit(Candidate $candidate){
        $posts = Post::pluck('name', 'id');    // [id => name] for dropdown
        $party = Party::pluck('name', 'id');

        $provinces = Province::pluck('name', 'id');

        $districts = District::where('province_id', $candidate->province_id)
            ->pluck('name', 'id');

        $municipalities = Municipality::where('district_id', $candidate->district_id)
            ->pluck('name', 'id');

        $wards = Ward::where('municipality_id', $candidate->municipality_id)
            ->pluck('ward_no', 'id');

        return view('admin.candidates.update', compact(
            'candidate',
            'posts',
            'party',
            'provinces',
            'districts',
            'municipalities',
            'wards'
        ));
    }

    public function update(StoreCandidateRequest $request, Candidate $candidate)
    {
        $candidate->update($request->validated());

        return redirect()
            ->route('admin.candidates.index')
            ->with('success', 'Candidate updated successfully.');

    }

    /**
     * Delete a candidate.
     */
    public function destroy(Candidate $candidate)
    {
        $candidate->delete();

        return redirect()->route('admin.candidates.index')
            ->with('success', 'Candidate deleted successfully.');
    }

    public function filter(Request $request)
    {
        $validated = $request->validate([
            'province_id' => 'required',
            'district_id' => 'required',
            'municipality_id' => 'required',
            'ward_id' => 'required',
            'post_id' => 'required',
        ],
        [
            'province_id.required' => 'Please select a province.',
            'district_id.required' => 'Please select a district.',
            'municipality_id.required' => 'Please select a municipality.',
            'ward_id.required' => 'Please select a ward.',
            'post_id.required' => 'Please select a post.',
            
        ]);
        

        $candidates = Candidate::with([
            'province',
            'district',
            'municipality',
            'ward',
            'post',
            'party',
        ])
            ->where('province_id', $request->province_id)
            ->where('district_id', $request->district_id)
            ->where('municipality_id', $request->municipality_id)
            ->where('ward_id', $request->ward_id)
            ->where('post_id', $request->post_id)
            ->get();


        return view('admin.candidates.index', [
            'candidates' => $candidates,
            'selected'=> $validated,
        ]);
    }


}
