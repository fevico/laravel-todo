<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Your Todos') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-6">
        <div class="mb-4">
            <a href="{{ route('todos.create') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Create New Todo
            </a>
        </div>

        @if(session('success'))
        <div class="alert alert-success mb-4">
            {{ session('success') }}
        </div>
        @endif

        <ul class="">
            @forelse ($todos as $todo)
            <li class="flex items-center justify-between list-group-item space-y-5">
                {{ $todo->title }}
                <div class="grid grid-cols-2 gap-2 p-4">
                    <a href="{{ route('todos.edit', $todo->id) }}"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 space-y-5 rounded">Edit</a>
                    <form action="{{ route('todos.destroy', $todo->id) }}" method="POST" class="">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="bg-red-500 hover:bg-red-700 text-white font-bold rounded py-2 px-4">Delete</button>
                    </form>
                </div>
            </li>
            @empty
            <li class="text-center text-xl text-red-500">No todos yet.</li>
            @endforelse
        </ul>
    </div>
</x-app-layout>