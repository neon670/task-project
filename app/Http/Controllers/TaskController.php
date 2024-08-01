<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function __construct(){
        $this->middleware('auth');
    }
    
     public function index(Request $request)
    {
        // $tasks = $request->user()->tasks;
        
        $tasks = DB::table('tasks')->paginate(5);
        return view('tasks.index', compact('tasks'));
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
    public function store(StoreTaskRequest $request)
    {
        // dd($request->name);
        // $task = new Task;
        // $task->name = $request->name;
        // $task->save();
        $tasks = "new task";
        // if($tasks){
        $request->user()->task()->create([
            'name' => "test"
        ]);
// }

        return redirect()->back();


    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {

        $this->authorize('delete');


        $task->delete();

        return redirect()->back();
    }
}
