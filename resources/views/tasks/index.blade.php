<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tasks') }}
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
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg ">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 text-center">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Task Title
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    For
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($tasks as $task)
                                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                        <th scope="row" class="px-4 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <a href="{{route('tasks.show',$task->id)}}">{{$task->title}}</a>
                                        </th>
                                        <td class="px-6 py-4">
                                            @if($task->taskable_type == "App\Models\Business")
                                                Business:
                                                {{$task->taskable->business_name}}
                                            @endif
                                            @if($task->taskable_type == "App\Models\Person")
                                                Person:
                                                {{$task->taskable->first_name . " " . $task->taskable->last_name}}
                                            @endif
                                        </td>
                                        <td class="px-6 py-4">
                                            {{$task->status}}
                                        </td>
                                        <td class="px-6 py-4">
                                            @if($task->status == 'open')
                                                <form action="{{route('tasks.complete',$task->id)}}" method="post">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Complete Task</button>
                                                </form>
                                            @endif
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
