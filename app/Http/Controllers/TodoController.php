<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
        return Todo::all();
    }

    public function store(TodoRequest $request)
    {
        return Todo::create($request->validated());
    }

    public function update(TodoRequest $request, $todo_id)
    {
        $todo = Todo::find($todo_id);

        if(!$todo) {
            return response()->json([
                'error' => 'Todo id was not found'
            ], 404);
        }

        $todo->fill($request->except(['id']));
        $todo->save();
        return response()->json($todo);
    }

    public function destroy($todo_id)
    {
        $todo = Todo::find($todo_id);

        if(!$todo) {
            return response()->json([
                'error' => 'Todo id was not found'
            ], 404);
        }

        if($todo->delete()) {
            return response(null, 204);
        }
    }
}
