@extends('layouts.admin')

@section('content')
    {{--Page Header--}}
    <div class="flex justify-between">
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Location Management</h2>
            <p class="text-sm text-gray-600">
                Locations information
            </p>
        </div>

        <div class="">
           <x-partials.button href="{{ route('admin.locations.create') }}" variant="primary">Create new Location</x-partials.button>
        </div>
    </div>

    {{--Location by province--}}
    <h1 class="font-bold mt-6 text-2xl">Province</h1>
    <div class="bg-white shadow rounded-lg overflow-x-auto w-xl  mb-6">
        <table class="w-full border-collapse text-sm">
            <thead class="bg-gray-100 text-gray-700 border-b">
                <tr>
                    <th class="px-4 py-3 w-15 text-center">#</th>
                    <th class="px-4 py-3 w-40 text-center">Name</th>
                    <th class="px-4 py-3 w-40 text-center">Status</th>
                    <th class="px-4 py-3 w-5 text-center">Actions</th>
                </tr>
            </thead>

            <tbody class="border-b">
                <tr>
                    <td class="px-4 py-3 w-15 text-center">1</td>
                    <td class="px-4 py-3 w-40 text-center">Koshi</td>
                    <td class="px-4 py-3 w-40 text-center">Active</td>
                    <td class="px-6 py-2 w-5">
                        <div class="flex justify-between  items-center">
                            <div>
                                <a href="#"><svg stroke="currentColor" class="cursor-pointer" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"></path></svg></a>
                            </div>

                            <div>
                                <form action="#" method="POST" onsubmit="return confirm('Are you sure you want to delete this voter?');" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="text-red-500 cursor-pointer" width="16" height="16" fill="currentColor" className="bi bi-trash3" viewBox="0 0 16 16">
                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                </svg>
                                </button>

                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>

    {{--district--}}
    <h1 class="font-bold text-2xl mt-6">District</h1>
    <div class="bg-white shadow rounded-lg overflow-x-auto w-xl mb-6">
        <table class="w-full border-collapse text-sm">
            <thead class="bg-gray-100 text-gray-700 border-b">
                <tr>
                    <th class="px-4 py-3 w-5 text-center">#</th>
                    <th class="px-4 py-3 w-30 text-center">Name</th>
                    <th class="px-4 py-3 w-30 text-center">Province</th>
                    <th class="px-4 py-3 w-30 text-center">Status</th>
                    <th class="px-4 py-3 w-5 text-center">Actions</th>
                </tr>
            </thead>

            <tbody class="border-b">
                <tr>
                    <td class="px-4 py-3 w-5 text-center">1</td>
                    <td class="px-4 py-3 w-30 text-center">Jhapa</td>
                    <td class="px-4 py-3 w-30 text-center">koshi</td>
                    <td class="px-4 py-3 w-30 text-center">Active</td>
                    <td class="px-6 py-2 w-5">
                        <div class="flex justify-between items-center">
                            <div>
                                <a href="#"><svg stroke="currentColor" class="cursor-pointer" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"></path></svg></a>
                            </div>

                            <div>
                                <form action="#" method="POST" onsubmit="return confirm('Are you sure you want to delete this voter?');" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="text-red-500 cursor-pointer" width="16" height="16" fill="currentColor" className="bi bi-trash3" viewBox="0 0 16 16">
                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                </svg>
                                </button>

                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>

    {{--municipality--}}
    <h1 class="font-bold mt-6 text-2xl">Municipality</h1>
    <div class="bg-white shadow rounded-lg overflow-x-auto w-xl">
        <table class="w-full border-collapse text-sm">
            <thead class="bg-gray-100 text-gray-700 border-b">
                <tr>
                    <th class="px-4 py-3 w-10 text-center">#</th>
                    <th class="px-4 py-3 w-30 text-center">Name</th>
                    <th class="px-4 py-3 w-30 text-center">District</th>
                    <th class="px-4 py-3 w-25 text-center">Status</th>
                    <th class="px-4 py-3 w-5 text-center">Actions</th>
                </tr>
            </thead>

            <tbody class="border-b">
                <tr>
                    <td class="px-4 py-3 w-10 text-center">1</td>
                    <td class="px-4 py-3 w-30 text-center">Barhadashi</td>
                    <td class="px-4 py-3 w-30 text-center">Jhapa</td>
                    <td class="px-4 py-3 w-25 text-center">Active</td>
                    <td class="px-6 py-2 w-5 ">
                        <div class="flex justify-between items-center">
                            <div>
                                <a href="#"><svg stroke="currentColor" class="cursor-pointer" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"></path></svg></a>
                            </div>

                            <div>
                                <form action="#" method="POST" onsubmit="return confirm('Are you sure you want to delete this voter?');" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="text-red-500 cursor-pointer" width="16" height="16" fill="currentColor" className="bi bi-trash3" viewBox="0 0 16 16">
                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                </svg>
                                </button>

                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>

@endsection