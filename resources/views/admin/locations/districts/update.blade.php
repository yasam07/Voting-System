@extends('layouts.admin')

@section('content')
{{--Page Header--}}
    <div class=" flex justify-between border-b" >
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Location Management  / District  / Update</h2>
            <p class="text-sm text-gray-600">
                Update Existing District
            </p>
        </div>
        <div class="">
            <x-partials.button href="{{ route('admin.locations.districts.index') }}" variant="primary">Back</x-partials.button>
        </div>
    </div>

    <div class="mt-5 shadow-lg ps-6 py-4">
        <form action="{{ route('admin.locations.districts.update', $district) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div class="w-2/3">
                    <x-partials.dropdown 
                        name="province"
                        placeholder="Select Province"  
                        label="Province"
                        :selected=" old('province', $district->province_id) "
                        :options="$provinces"
                        class="w-full"
                    />
                    @error('province')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="" >District Name:</label><br/>
                    <input type="text" 
                        name="name" 
                        id="name" 
                        value="{{ old('name', $district->name) }}"
                        placeholder="District Name"
                        class="border my-2  px-2 py-2 w-2/3 rounded"
                    >
                    @error('province')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">Status :</label>
                    <div class="flex items-center space-x-6">
                        <label class="flex items-center space-x-2">
                            <input type="radio" name="status" value="1" {{ old('status', $district->status ?? 1) == 1 ? 'checked' : '' }} class="form-radio text-green-600">
                            <span>Active</span>
                        </label>

                        <label class="flex items-center space-x-2">
                            <input type="radio" name="status" value="0" {{ old('status', $district->status ?? 1) == '0' ? 'checked' : '' }} class="form-radio text-red-600">
                            <span>Inactive</span>
                        </label>
                    </div>
                    @error('status') 
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p> 
                    @enderror
                </div>
            </div>
            <x-partials.button type="submit" variant="primary">Update District</x-partials.button>
        </form>
    </div>



@endsection