@extends('layouts.admin')

@section('content')
{{--Page Header--}}
    <div class="flex justify-between">
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Location Management  /  Create</h2>
            <p class="text-sm text-gray-600">
                Create Locations 
            </p>
        </div>

        <div class="">
           <x-partials.button href="{{ route('admin.locations.index') }}" variant="primary">Back</x-partials.button>
        </div>
    </div>

    <form action="{{ route('admin.candidates.filter') }}" method="POST">
        @csrf
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
                    label="Municipality"
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

        <x-partials.button name="" value="" type="submit" variant="primary">Create Location</x-partials.button>

    </form>


@endsection


@section('scripts')
<script>
    window.ADMIN_BASE_URL = "{{ url('/admin') }}";

    
</script>
@endsection
