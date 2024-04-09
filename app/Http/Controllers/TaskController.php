<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;


class TaskController extends Controller
{   

    public function create(TaskRequest $request){
        $task = new Task();
        $task->task = $request->input('task');
        $task->user_id = Auth::user()->id;

        $task->save();
        
        return redirect()->route('home');
    }

    public function delete($id){
        $task = Task::where('id',$id)->delete();
        
        return redirect()->route('home');
    }

    public function show(){
        $task = new Task();
        $user_id = Auth::user()->id;
        return view('home', ['task' => $task->WHERE('user_id', $user_id)->get()]);
    }
}
