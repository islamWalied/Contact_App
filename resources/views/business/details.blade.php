<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Business
            :)
            {{ $business->business_name}}

        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="grid grid-cols-1 sm:grid-cols-6 gap-x-8 gap-y-6">
                    <div class="sm:col-span-3">
                        <div class="p-6 text-gray-900 dark:text-gray-100 col-4">
                            <a class="block cursor-pointer max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Name: {{$business->business_name}}</h5>
                                <p class="font-normal mb-2 text-gray-700 dark:text-gray-400"> Email: {{$business->contact_email}}</p>
                                <p class="font-normal text-gray-700 dark:text-gray-400"> Related Category:
                                    @foreach($business->categories as $cat)

                                        <br/>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;  {{$cat->category_name}}
                                    @endforeach</p>
                            </a>
                        </div>
                    </div>
                    <div class="sm:col-span-3">
                        <div class="p-6 text-gray-900 dark:text-gray-100 col-4">
                            <span>Create a new task</span>

                            <form action="{{route('tasks.store')}}" method="post">
                                @csrf
                                <input type="hidden" name="taskable_id" value="{{$business->id}}">
                                <input type="hidden" name="target_model" value="business">
                                <div class="mb-6 mt-3">
                                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Task Title</label>
                                    <input type="text" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Task Title" required>
                                </div>
                                <div class="mb-6">
                                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Task Description</label>
                                    <input type="text" name="description" id="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Task Description" required>
                                </div>
                                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add Task</button>
                            </form>

                            <h3 class="font-semibold text-l pb-5 mt-5">Tasks</h3>

                            @foreach($business->tasks as $task)
                            <div class="border-t border-grey-500 py-5">
                                <h4 class="font-semibold">Title:&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;  {{$task->title}}</h4>
                                <p>Task Description: {{$task->description}}</p>
{{--                                <p>Task Status:&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; {{$task->status}}</p>--}}
                                @if($task->status == 'open')
                                    <div class="pt-3">
                                        <form action="{{route('tasks.complete',$task->id)}}" method="post">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Complete Task</button>
                                        </form>
                                    </div>
                                @else
                                    <div class="flex justify-end lin">
                                        <span class="italic ">Completed!</span>
                                    </div>
                                @endif
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
