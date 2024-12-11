<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Todo') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-6">
        <h1 class="text-2xl font-bold mb-4">Create New Todo</h1>
        <form action="{{ route('todos.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="text-xl font-bold">Todo Title</label>
                <input type="text" name="title" id="title" class="max-w-96px p-2 border border-gray-300 rounded"
                    value="{{ old('title') }}" required>
            </div>
            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Add
                Todo</button>
        </form>
    </div>
</x-app-layout>