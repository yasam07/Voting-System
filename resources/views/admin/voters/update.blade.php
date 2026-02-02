@extends('layouts.admin')

@section('content')


<div class="max-w-7xl mx-auto">

    {{-- Page Header --}}
    <div class="flex justify-between">
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Voter Management  /  edit</h2>
            <p class="text-sm text-gray-600">
                Update the voter information
            </p>
        </div>

        <div class="my-2">
           <a href="{{ route('admin.voters.index') }}" class="ml-2 px-4 py-2 bg-slate-700 text-white rounded hover:bg-slate-900">Back</a>
        </div>
    </div>
    @if ($errors->any())
        <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {{-- Voter creation form--}}
    <div class="bg-white rounded shadow px-4 py-4">
         
        <form action="{{ route('admin.voters.update', $voter->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">

                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold" for="">Name :</label>
                    <input type="text" 
                        placeholder="Name" 
                        name="name" 
                        value="{{ old('name', $voter->name) }}" 
                        class="w-full px-4 mt-2 py-2 border border-gray-300 rounded">
                    @error('name') 
                        <p class="text-red-500 text-sm mt-1">{{ $message}}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold" for="">Email :</label>
                    <input type="email" 
                        placeholder="Email" 
                        name="email" 
                        value="{{ old('email', $voter->email) }}" 
                        class="w-full px-4 mt-2 py-2 border border-gray-300 rounded">
                </div>
            </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div> 
                    <x-partials.dropdown 
                        label="Province "
                        name="province_id" 
                        id="province_id" 
                        :options="$provinces"
                        :selected="old('province_id', $voter->province_id)"
                    />
                    @error('province_id') 
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <x-partials.dropdown 
                        label="District"
                        name="district_id"
                        id="district_id"
                        :options="$districts"
                        :selected="old('district_id', $voter->district_id)"
                        />
                        @error('district_id') 
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <x-partials.dropdown 
                            label="Municipality "
                            name="municipality_id"
                            id="municipality_id"
                            :options="$municipalities"
                            :selected="old('municipality_id', $voter->municipality_id)"
                        />
                        @error('municipality_id') 
                            <p class="text-red-500 text-sm mt-1">{{ $message}}</p>
                        @enderror
                    </div>

                    <div >
                        <x-partials.dropdown 
                            label="Ward No. "
                            name="ward_id"
                            id="ward_id"
                            :options="$wards"
                            :selected="old('ward_id', $voter->ward_id)"
                        />
                        @error('ward_id') 
                            <p class="text-red-500 text-sm mt-1">{{ $message}}</p>
                        @enderror
                    </div>
                </div>
               

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="mb-4 ">
                        <label class="block text-gray-700 font-semibold mb-2">Gender :</label>
                        
                        <div class="flex items-center space-x-6">
                            <label class="flex items-center space-x-2">
                                <input type="radio" name="gender" 
                                    value="male" 
                                    {{ old('gender', $voter->gender) == 'male' ? 'checked' : '' }} 
                                    class="form-radio text-blue-600">
                                <span>Male</span>
                            </label>

                            <label class="flex items-center space-x-2">
                                <input type="radio" name="gender" value="female" {{ old('gender', $voter->gender) == 'female' ? 'checked' : '' }} class="form-radio text-pink-600">
                                <span>Female</span>
                            </label>

                            <label class="flex items-center space-x-2">
                                <input type="radio" name="gender" value="other" {{ old('gender', $voter->gender) == 'other' ? 'checked' : '' }} class="form-radio text-green-600">
                                <span>Other</span>
                            </label>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="" class="block text-gray-700 font-semibold ">Citizenship ID</label>
                        <input type="text" 
                            name="citizenship" 
                            value="{{ old('citizenship', $voter -> citizenship) }}" 
                            placeholder="Citizenship ID" 
                            class="w-full px-4 mt-2 py-2 border border-gray-300 rounded "
                            >
                            @error('citizenship')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                    </div>

                    <div class="mb-4">
                        <label for="" class="block text-gray-700 font-semibold ">Voter ID</label>
                        <input type="text" name="voter_id" value="{{ old('voter_id', $voter -> voter_id) }}" placeholder="Voter ID" class="w-full px-4 mt-2 py-2 border border-gray-300 rounded ">
                    </div>
                </div>
                <div class="mb-4 col-span-2 ">
                        <button type="submit" class="w-50 flex justify-center cursor-pointer px-4 py-2 bg-slate-700 text-white rounded hover:bg-slate-900">Update</button>
                </div>
            </div> 
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    window.ADMIN_BASE_URL = "{{ url('/admin') }}";
</script>
@endsection