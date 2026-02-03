<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Party;
use Illuminate\Validation\Rule;

class PartyController extends Controller
{
    public function index()
    {
        $parties = Party::orderBy('id','asc')->get();

        return view('admin.parties.index', compact('parties'));
    }

    public function create()
    {
        return view('admin.parties.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:50|unique:parties,name',
            'status'=>'required|boolean',
        ]);

        Party::create([
            'name' => $request->name,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.parties.index')
            ->with('success','Party created successfully');
    }


    public function edit(Party $party)
    {

        return view('admin.parties.update', compact('party'));
    }

    public function update(Party $party, Request $request){
        $request->validate([
           'name' => [
            'required',
            'string',
            'max:50',
            Rule::unique('parties')->ignore($party->id),
        ],
            'status'=>'required|boolean',
        ]);

        $party->update([
            'name' => $request->name,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.parties.index')
            ->with('success','Party updated successfully');
    }

    public function destroy(Party $party)
    {
        $party->delete();

        return redirect()
            ->route('admin.parties.index')
            ->with('success','Party deleted successfully');

    }
}
