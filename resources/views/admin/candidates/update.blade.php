@extends('layouts.admin')

@section('content')

{{-- Page Header --}}
<div class="flex justify-between border-b mb-5">
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Candidate Management / Update</h2>
        <p class="text-sm text-gray-600">
            Update Candidates by location and posts
        </p>
    </div>

    <div class="my-2">
        <a href="{{ route('admin.candidates.index') }}" class="ml-2 px-4 py-2 cursor:pointer bg-slate-700 text-white rounded hover:bg-slate-900">Back</a>
    </div>
</div>

<!-- Form -->
<div class="shadow-md p-6 bg-white rounded">
    <form action="{{ route('admin.candidates.update', $candidate->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">

            {{-- Name --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold">Name :</label>
                <input type="text" 
                    name="name" 
                    value="{{ old('name', $candidate->name) }}" 
                    class="w-full px-4 mt-2 py-2 border border-gray-300 rounded">
                @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- Citizenship --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold">Citizenship No. :</label>
                <input 
                    type="text"
                    name="citizenship" 
                    value="{{ old('citizenship', $candidate->citizenship) }}"  
                    class="w-full px-4 mt-2 py-2 border border-gray-300 rounded">
                @error('citizenship') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- Province --}}
            <div>
                <x-partials.dropdown 
                    label="Province"
                    name="province_id"
                    id="province_id"
                    :options="$provinces"
                    :selected="old('province_id', $candidate->province_id)"
                />
                @error('province_id') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- District --}}
            <div>
                <x-partials.dropdown 
                    label="District"
                    name="district_id"
                    id="district_id"
                    :options="$districts"
                    :selected="old('district_id', $candidate->district_id)"
                />
                @error('district_id') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- Municipality --}}
            <div>
                <x-partials.dropdown 
                    label="Municipality"
                    name="municipality_id"
                    id="municipality_id"
                    :options="$municipalities"
                    :selected="old('municipality_id', $candidate->municipality_id)"
                />
                @error('municipality_id') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- Ward --}}
            <div>
                <x-partials.dropdown 
                    label="Ward No."
                    name="ward_id"
                    id="ward_id"
                    :options="$wards"
                    :selected="old('ward_id', $candidate->ward_id)"
                />
                @error('ward_id') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- Post --}}
            <div>
                <x-partials.dropdown 
                    label="Post"
                    name="post_id"
                    :options="$posts"
                    :selected="old('post_id', $candidate->post_id)"
                />
                @error('post_id') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- Party --}}
            <div>
                <x-partials.dropdown 
                    label="Party"
                    name="party_id"
                    :options="$party"
                    :selected="old('party_id', $candidate->party_id)"
                />
                @error('party_id') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- Gender --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-4">Gender :</label>
                <div class="flex items-center space-x-6">
                    @foreach(['male','female','other'] as $gender)
                        <label class="flex items-center space-x-2">
                            <input type="radio" 
                                name="gender" 
                                value="{{ $gender }}" 
                                {{ old('gender' , $candidate->gender) == $gender ? 'checked' : '' }} 
                                class="form-radio text-blue-600">
                            <span>{{ ucfirst($gender) }}</span>
                        </label>
                    @endforeach
                </div>
                @error('gender') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            {{--Is_active--}}
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Status :</label>
                <div class="flex items-center space-x-6">
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="is_active" value="1" {{ old('is_active', $candidate->is_active ?? 1) == 1 ? 'checked' : '' }} class="form-radio text-green-600">
                        <span>Active</span>
                    </label>

                    <label class="flex items-center space-x-2">
                        <input type="radio" name="is_active" value="0" {{ old('is_active', $candidate->is_active ?? 1) == '0' ? 'checked' : '' }} class="form-radio text-red-600">
                        <span>Inactive</span>
                    </label>
                </div>
                @error('is_active') 
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p> 
                @enderror
            </div>
        </div>

        <div class="mb-4 col-span-2 ">
            <button type="submit" class="w-50 flex justify-center cursor-pointer px-4 py-2 bg-slate-700 text-white rounded hover:bg-slate-900">Create Candidate</button>
        </div>
    </form>
</div>

@endsection

@section('scripts')
<script>
    window.ADMIN_BASE_URL = "{{ url('/admin') }}";
</script>
@endsection


