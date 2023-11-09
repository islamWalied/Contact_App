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
                            <span>Tasks</span>
                            @foreach($business->tasks as $task)
                                <h4 class="font-semibold">{{$task->title}}</h4>
                                <p>{{$task->description}}</p>
                                <p>Status: {{$task->status}}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
