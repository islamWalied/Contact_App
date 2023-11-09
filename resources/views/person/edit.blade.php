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
                    <form action="{{route('person.update',$person->id)}}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <div>
                                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First name</label>
                                <input type="text" name="first_name" value="{{$person->first_name}}" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('first_name') is-invalid @enderror" placeholder="First Name" required>
                                @error('first_name')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div>
                                <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last name</label>
                                <input type="text" name="last_name" value="{{$person->last_name}}" id="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('last_name') is-invalid @enderror" placeholder="Last Name" required>
                                @error('last_name')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div>
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                <input type="email" name="email" value="{{$person->email}}" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('email') is-invalid @enderror" placeholder="Email" required>
                                @error('email')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div>
                                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone number</label>
                                <input type="tel" name="phone" value="{{$person->phone}}" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('phone') is-invalid @enderror" placeholder="Phone Number" required>
                                @error('phone')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div>
                                <label for="business" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Business</label>
                                <select id="business" name="business_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="" selected>(No Business)</option>
                                    @foreach($business as $bus)
                                        <option value="{{$bus->id}}" @selected($bus->id == $person->business_id)>{{$bus->business_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <h4 class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">Tags</h4>
                                    @foreach($tags as $tag)
                                        <div class="flex items-center mb-4">
                                            <input id="default-checkbox{{$tag->id}}" type="checkbox" value="{{$tag->id}}" name="tags[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" @checked(in_array($tag->name , $person->tags->pluck('name')->toArray()))>
                                            <label for="default-checkbox{{$tag->id}}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{$tag->name}}</label>
                                        </div>
                                    @endforeach
                            </div>
                        </div>

                        <div class="flex items-center justify-end">
                            <a href="{{route('person.index')}}"
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
