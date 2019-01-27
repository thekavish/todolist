<?php

namespace Thekavish\Todolist\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Thekavish\Todolist\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('task.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tasks  = Task::all();
        $submit = 'Add';

        return view('todolist::list', compact('tasks', 'submit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Task::create($request->all());

        return redirect()->route('task.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Task $task
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($task)
    {
        $task   = Task::findOrFail($task);
        $tasks  = Task::all();
        $submit = 'Update';

        return view('todolist::list', compact('tasks', 'task', 'submit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  Task    $task
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $task)
    {
        $task = Task::findOrFail($task);
        $task->update($request->all());

        return redirect()->route('task.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Task $task
     *
     * @return Response
     * @throws \Exception
     */
    public function destroy($task)
    {
        $task = Task::findOrFail($task);
        $task->delete();

        return redirect()->route('task.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function toggleComplete(Request $request)
    {
        $task = Task::findOrFail($request->task)->update(['complete'=>$request->complete?1:0]);

        return redirect()->back();
    }
}
