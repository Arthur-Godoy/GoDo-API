<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
class TaskController extends Controller
{
    public function index(){
        return Task::all();
    }

    public function show($id){
        return Task::findOrFail($id);
    }

    public function delete($id){
        $task = Task::findOrFail($id);
        $task->delete();

        return response()->json($task, 201);
    }

    public function update(Request $request, $id){
        $task = Task::findOrFail($id);
        $task->name = $request->name;
        $task->finishDate = $request->date;
        $task->description = $request->description;
        $task->concluded = $request->concluded;

        $task->save();
        return response()->json($task, 200);
    }

    public function store(Request $request){
        $task = new Task;
        $task->name = $request->name;
        $task->finishDate = $request->date;
        $task->description = $request->description;
        $task->concluded = $request->concluded;

        $task->save();
        return response()->json($task, 200);
    }
}
