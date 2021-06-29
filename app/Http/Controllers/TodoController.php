<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController
{
    public function index()
    {
        return response()->json(['todos' => Todo::all()]);
    }

    public function store(Request $request)
    {
        return Todo::create(json_decode($request->getContent(), 1));
    }

    public function update(Request $request, Todo $todo)
    {
        $todo->fill(json_decode($request->getContent(), 1));
        $todo->save();
        return response()->json();
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();

        return response()->json();
    }
}
