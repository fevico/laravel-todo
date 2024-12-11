<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TodoController extends Controller
{

    public function index()
    {
        // Get all todos for the authenticated user
        $todos = TodoList::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();

        return view('todos.index', compact('todos'));
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        TodoList::create([
            'title' => $request->title,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('todos.index')->with('success', 'Todo created successfully!');
    }

    public function edit($id)
    {
        $todo = TodoList::findOrFail($id);

        // Ensure the user owns the todo
        if ($todo->user_id !== Auth::id()) {
            abort(403);
        }

        return view('todos.edit', compact('todo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $todo = TodoList::findOrFail($id);

        if ($todo->user_id !== Auth::id()) {
            abort(403);
        }

        $todo->update(['title' => $request->title]);

        return redirect()->route('todos.index')->with('success', 'Todo updated successfully!');
    }

    public function destroy($id)
    {
        $todo = TodoList::findOrFail($id);

        if ($todo->user_id !== Auth::id()) {
            abort(403);
        }

        $todo->delete();

        return redirect()->route('todos.index')->with('success', 'Todo deleted successfully!');
    }

}