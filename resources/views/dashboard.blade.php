<x-app-layout>
    <x-slot name="header ">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}

                    <div class="mt-4">
                        <a href="{{ route('tasks.index') }}" class="text-blue-500 hover:underline">{{ __('Go to Task List') }}
                        </a>
                    </div>
                    <div>
                        <a href="{{ route('calendar.index') }}" class="btn btn-primary mb-4">
                            Go to Calendar
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
