<x-app-layout>
    <form method="POST" action="{{ route('task.create') }}">
        @csrf
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-input-label for="task" />
            <x-text-input id="task" class="block mt-2 w-full" type="text" name="task" />
            <x-primary-button class="ms-3">
                {{ __('Create Task') }}
            </x-primary-button>
            {{-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> --}}
        </div>
    </form>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @foreach ($task as $el)
                    {{-- <div class="p-2 text-gray-900"> --}}
                        <h3>{{ $el->task }}</h3>
                        <form action="{{ route('task.delete', $el->id)}}" method="POST">
                            @csrf
                            <x-primary-button class="ms-3">
                                {{__('Done')}}
                            </x-primary-button>
                        </form>
                    {{-- </div>                       --}}
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
