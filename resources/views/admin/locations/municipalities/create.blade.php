@extends('layouts.admin')

@section('content')
{{--Page Header--}}
    <div class=" flex justify-between border-b" >
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Location Management  / Municipality  / Create</h2>
            <p class="text-sm text-gray-600">
                Create New District
            </p>
        </div>
        <div class="">
            <x-partials.button href="{{ route('admin.locations.municipalities.index') }}" variant="primary">Back</x-partials.button>
        </div>
    </div>

    <div class="mt-5 shadow-lg ps-6 py-4">
        <form action="{{ route('admin.locations.municipalities.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <x-partials.dropdown 
                        name="district"
                        placeholder="Select District"  
                        label="District"
                        :options="$districts"
                    />
                    @error('district')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                
                <div>
                    <label for="" >Municipality Name:</label><br/>
                    <input type="text" 
                        name="name" 
                        id="name" 
                        placeholder="Municipality Name"
                        value="{{ old('name') }}"
                        class="border my-3  px-2 py-1 w-2/3 rounded"
                    >
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">Status :</label>
                    <div class="flex items-center space-x-6">
                        <label class="flex items-center space-x-2">
                            <input type="radio" name="status" value="1" {{ old('status', $municipality->status ?? 1) == 1 ? 'checked' : '' }} class="form-radio text-green-600">
                            <span>Active</span>
                        </label>

                        <label class="flex items-center space-x-2">
                            <input type="radio" name="status" value="0" {{ old('status', $municipality->status ?? 1) == '0' ? 'checked' : '' }} class="form-radio text-red-600">
                            <span>Inactive</span>
                        </label>
                    </div>
                    @error('status') 
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p> 
                    @enderror
                </div>
            </div>
            <x-partials.button type="submit" variant="primary">Add Municipality</x-partials.button>
        </form>
    </div>



@endsection