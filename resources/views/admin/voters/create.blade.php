@extends('layouts.admin')

@section('content')


<div class="max-w-7xl mx-auto">

    {{-- Page Header --}}
    <div class="flex justify-between">
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Voter Management  /  create</h2>
            <p class="text-sm text-gray-600">
                Create new voter information
            </p>
        </div>

        <div class="my-2">
           <a href="{{ route('admin.voters.index') }}" class="ml-2 px-4 py-2 bg-slate-700 text-white rounded hover:bg-slate-900">Back</a>
        </div>
    </div>

    {{-- Voter creation form--}}
    <div class="bg-white rounded shadow px-4 py-4">

        <form action="{{route('admin.voters.store')}}" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">

                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold" for="">Name :</label>
                    <input type="text" placeholder="Name" name="name" value="{{ old('name') }}" class="w-full px-4 mt-2 py-2 border border-gray-300 rounded">
                    @error('name') 
                        <p class="text-red-500 text-sm mt-1">{{ $message}}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold" for="">Email :</label>
                    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" class="w-full px-4 mt-2 py-2 border border-gray-300 rounded">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div class=" location-select">
                    
                    <x-partials.dropdown 
                        label="Province "
                        name="province_id" 
                        id="province_id" 
                        :options="App\Models\Province::pluck('name', 'id')"
                        :selected="old('province_id')"
                    />
                    @error('province_id') 
                        <p class="text-red-500 text-sm mt-1">{{ $message}}</p>
                    @enderror
                </div>

                <div>
                    
                    <x-partials.dropdown 
                        label="District "
                        name="district_id"
                        :options="[]"
                        :selected="old('district_id')"
                    />
                    @error('district_id') 
                        <p class="text-red-500 text-sm mt-1">{{ $message}}</p>
                    @enderror
                </div>

                <div>
                   
                    <x-partials.dropdown 
                        label="Municipality "
                        name="municipality_id"
                        :options="[]"
                        :selected="old('municipality_id')"
                    />
                    @error('municipality_id') 
                        <p class="text-red-500 text-sm mt-1">{{ $message}}</p>
                    @enderror
                </div>

                <div >
                    <x-partials.dropdown 
                        label="Ward No. "
                        name="ward_id"
                        :options="[]"
                        :selected="old('ward_id')"
                    />
                    @error('ward_id') 
                        <p class="text-red-500 text-sm mt-1">{{ $message}}</p>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="mb-4 ">
                    <label class="block text-gray-700 font-semibold mb-4">Gender :</label>
                    
                    <div class="flex items-center space-x-6">
                        <label class="flex items-center space-x-2">
                            <input type="radio" name="gender" value="male" {{ old('gender') == 'male' ? 'checked': '' }} class="form-radio text-blue-600">
                            <span>Male</span>
                        </label>

                        <label class="flex items-center space-x-2">
                            <input type="radio" name="gender" value="female" {{ old('gender') == 'female' ? 'checked': '' }} class="form-radio text-pink-600">
                            <span>Female</span>
                        </label>

                        <label class="flex items-center space-x-2">
                            <input type="radio" name="gender" value="other" {{ old('gender') == 'other' ? 'checked': '' }} class="form-radio text-green-600">
                            <span>Other</span>
                        </label>
                    </div>
                    @error('gender') 
                        <p class="text-red-500 text-sm mt-1">{{ $message}}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="" class="block text-gray-700 font-semibold ">Citizenship ID</label>
                    <input type="text" 
                        name="citizenship"
                        placeholder="Citizenship ID" 
                        value="{{ old('citizenship') }}" 
                        class="w-full px-4 mt-2 py-2 border
                        border-gray-300 rounded "
                    >
                    @error('citizenship')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="" class="block text-gray-700 font-semibold ">Voter ID</label>
                    <input 
                        type="text" 
                        name="voter_id"
                        placeholder="Voter ID" 
                        value="{{ old('voter_id') }}" 
                        class="w-full px-4 mt-2 py-2 border border-gray-300 rounded "
                    >
                    @error('voter_id') 
                        <p class="text-red-500 text-sm mt-1">{{ $message}}</p>
                    @enderror
                </div>
            </div>

              
            
            <div class="mb-4 col-span-2 ">
                <button type="submit" class="w-50 flex justify-center cursor-pointer px-4 py-2 bg-slate-700 text-white rounded hover:bg-slate-900">Create Voter</button>
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

