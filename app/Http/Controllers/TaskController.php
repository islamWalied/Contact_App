<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Person;
use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index',compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required','string'],
            'description' => ['required','string'],
        ]);
        $target_model = match($request->target_model){
            'business' => Business::find($request->taskable_id),
            'person' => Person::find($request->taskable_id)
        };

        $target_model->tasks()->create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }
    public function complete(Task $task)
    {
        $task->markAsCompleted();
        return redirect()->back();
    }

}
