<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Todo') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-6">
        <h1 class="text-2xl font-bold mb-4">Edit Todo</h1>

        <form action=" {{ route('todos.update', $todo->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="text-xl font-bold">Todo Title</label>
                <input type="text" name="title" id="title" class="max-w-md border border-gray-300 p-2 rounded-lg"
                    value="{{ $todo->title }}" required>
            </div>

            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Update
                Todo</button>
        </form>
    </div>
</x-app-layout>