<?php

use App\Task;
use Illuminate\Http\Request;

/**
 * Show Task Dashboard
 */
Route::get('/', function () {
    $tasks = Task::all();
   
    return view('tasks', [
        'tasks' => $tasks,
    ]);
});

/**
 * Add New Task
 */
Route::post('/task', function (Request $request) {
    $validator = Validator::make($request->all(), [
            'nama' => 'required|max:255',
            'kelas' => 'required|max:255',
    ]);

    if($validator->fails()) {
        return redirect('/')
                ->withInput()
                ->withErrors($validator);
    }

    //fungsi untuk menambahkan data ke database
    $task       = new Task;
    $task->nama = $request->nama;
    $task->kelas = $request->kelas;
    $task->save();

    return redirect('/');
});

/**
 * Delete Task
 */
Route::delete('/task/{task}', function (Task $task){
    $task->delete();

    return redirect('/');
});