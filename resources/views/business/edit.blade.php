<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Business') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{route('business.update',$business->id)}}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <div>
                                <label for="business_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Business Name</label>
                                <input type="text" name="business_name" value="{{$business->business_name}}" id="business_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('business_name') is-invalid @enderror" placeholder="Business Name" required>
                                @error('business_name')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div>
                                <label for="contact_email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contact Email</label>
                                <input type="text" name="contact_email" value="{{$business->contact_email}}" id="contact_email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('contact_email') is-invalid @enderror"  placeholder="Contact Email" required>
                                @error('contact_email')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="flex items-center justify-end">
                            <a href="{{route('business.index')}}"
                               class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900
                       focus:outline-none bg-white rounded-lg border border-gray-200
                       hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4
                       focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800
                       dark:text-gray-400 dark:border-gray-600 dark:hover:text-white
                       dark:hover:bg-gray-700">Cancel</a>
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
