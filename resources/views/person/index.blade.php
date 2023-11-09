<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('People') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if(session()->has('success'))
                        <div class="flex items-center dark:bg-gray-900 p-4 mb-4 text-sm text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800" role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                            </svg>
                            <span class="sr-only">Info</span>
                            <div>
                                <span class="font-medium">{{session('success')}}</span>
                            </div>
                        </div>

                    @endif
                    <div class="flex items-center justify-end">
                        <a href="{{route('person.create')}}"
                           class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900
                       focus:outline-none bg-white rounded-lg border border-gray-200
                       hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4
                       focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800
                       dark:text-gray-400 dark:border-gray-600 dark:hover:text-white
                       dark:hover:bg-gray-700">Add New Person</a>
                    </div>

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Phone
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Business Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($person as $per)
                                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                        <th scope="row" class="px-4 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <a href="{{route('person.show',$per->id)}}">{{$per->first_name}} {{$per->last_name}}</a>
                                        </th>
                                        <td class="px-6 py-4">
                                            {{$per->email}}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{$per->phone}}
                                        </td>
                                        <td class="px-6 py-4 lin {{($per->business?->deleted_at)  ? 'italic line-through font-bold' : 'non-italic'}}">
                                            {{$per->business?->business_name}}
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="{{route('person.edit',$per->id)}}" class="font-medium m-2 text-blue-600 dark:text-blue-500 hover:underline">
                                                <svg class="w-6 h-6 text-gray-800 dark:text-white inline" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 18">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 1v11m0 0 4-4m-4 4L4 8m11 4v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-3"/>
                                                </svg>
                                            </a>
                                            <form action="{{route('person.destroy',$per->id)}}" method="post" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline focus:outline-none">
                                                    <svg class="w-6 h-6 text-gray-800 dark:text-white inline" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3"/>
                                                    </svg>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
