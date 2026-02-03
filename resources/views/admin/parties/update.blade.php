@extends('layouts.admin')

@section('content')
{{--Page Header--}}
    <div class=" flex justify-between border-b" >
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Political Party Management / Update</h2>
            <p class="text-sm text-gray-600">
                Update existing Party
            </p>
        </div>
        <div>
            <x-partials.button href="{{ route('admin.parties.index') }}" variant="primary">Back</x-partials.button>
        </div>
    </div>

    <div class="mt-5 shadow-lg ps-6 py-4">
        <form action="{{ route('admin.parties.update', $party->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="" >Political Party Name:</label><br/>
                    <input type="text" 
                        name="name" 
                        id="name" 
                        value="{{ old('name')?? $party->name }}"
                        class="border my-3  px-2 py-1 w-2/3 rounded"
                    >
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">Status :</label>
                    <div class="flex items-center space-x-6">
                        <label class="flex items-center space-x-2">
                            <input type="radio" name="status" value="1" {{ old('status', $party->status ?? 1) == 1 ? 'checked' : '' }} class="form-radio text-green-600">
                            <span>Active</span>
                        </label>

                        <label class="flex items-center space-x-2">
                            <input type="radio" name="status" value="0" {{ old('status', $party->status ?? 1) == '0' ? 'checked' : '' }} class="form-radio text-red-600">
                            <span>Inactive</span>
                        </label>
                    </div>
                    @error('Status') 
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p> 
                    @enderror
                </div>
            </div>
            <x-partials.button type="submit" variant="primary">Update Party</x-partials.button>
        </form>
    </div>



@endsection