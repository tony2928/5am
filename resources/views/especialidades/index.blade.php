<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Specialties') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="mb-4">

                        <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-8"
                           href="{{ route("especialidades.add") }}">
                            {{ __("Add")}}</a>
                    </div>


                    <table class="w-full border border-collapse">
                        <thead>
                        <tr>
                            <th class="w-1/12">ID</th>
                            <th class="w-8/12">{{ __("Specialties")}}</th>
                            <th class="w-3/12">{{ __("Options")}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($especialidades as $especialidad)
                            <tr>
                                <td class="p-2 border text-center">{{$especialidad->id}}</td>
                                <td class="p-2 border">{{$especialidad->name}}</td>
                                <td class="p-2 border flex flex-row justify-center">

                                    <div class="m-2 "><a
                                            class="inline-flex items-center px-4 py-2 bg-indigo-500 hover:bg-indigo-600 text-white text-sm font-medium rounded-md"
                                            href="{{ route("especialidades.edit",["id"=>$especialidad->id]) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                 stroke-linecap="round" stroke-linejoin="round"
                                                 class="feather feather-edit-2">
                                                <path
                                                    d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                            </svg>
                                            {{ __("Edit")  }}</a>
                                    </div>


                                    <div class="m-2">
                                        <form class="h-full" action="{{ route("especialidades.delete",["id"=>$especialidad->id]) }}"
                                              method="POST">
                                            @csrf
                                            @method("delete")
                                            <button type="submit"
                                                    class="h-full inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-md"
                                                    onclick="return confirm(' {{ __('Are you sure you want to delete this item?') }} ')" >
                                            <svg xmlns=" http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                                 viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                            {{ __("Delete")  }}
                                            </button>
                                        </form>
                                    </div>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>