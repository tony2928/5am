<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Student') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form method="POST" action="{{ route('students.update') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{$student->id}}">
                        <!-- Nombre del Alumno -->
                        <div class="grid grid-cols-3 gap-4">
                            <div>
                                <x-input-label for="name" value="Nombre"/>
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                              :value="old('name') ?? $student->name" autofocus/>
                                <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                            </div>
                            <div>
                                <x-input-label for="lastname" value="Apellidos"/>
                                <x-text-input id="lastname" class="block mt-1 w-full" type="text" name="lastname"
                                              :value="old('lastname') ?? $student->lastname" autofocus/>
                                <x-input-error :messages="$errors->get('lastname')" class="mt-2"/>
                            </div>
                            <div>
                                <x-input-label for="no_control" value="No. Control"/>
                                <x-text-input id="no_control" class="block mt-1 w-full" type="text" name="no_control"
                                              :value="old('no_control') ?? $student->no_control" autofocus/>
                                <x-input-error :messages="$errors->get('no_control')" class="mt-2"/>
                            </div>
                        </div>
                        <div class="grid grid-cols-3 gap-4 mt-4">
                            <div>
                                <x-input-label for="group" value="Grupo"/>
                                <x-text-input id="group" class="block mt-1 w-full" type="text" name="group"
                                              :value="old('group') ?? $student->group" autofocus/>
                                <x-input-error :messages="$errors->get('group')" class="mt-2"/>
                            </div>
                            <div>
                                <x-input-label for="specialty_id" value="Especialidad"/>

                                <select id="specialty_id"
                                        class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                                        name="specialty_id">
                                    @foreach($especialidades as $esp)
                                        @if(old('specialty_id'))
                                            <option
                                                value="{{$esp->id}}" {{ old('specialty_id') == $esp->id ? 'selected' : '' }} >{{$esp->name}}
                                            </option>

                                        @else
                                            <option
                                                value="{{$esp->id}}" {{ $student->specialty_id == $esp->id ? 'selected' : '' }} >{{$esp->name}}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="flex items-center justify-end mt-4">

                            <button class="ml-3">
                                <a href="{{ route("students") }}">{{ __("Cancel") }}</a></button>

                            <x-primary-button class="btn ml-3">
                                {{ __("Save") }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>