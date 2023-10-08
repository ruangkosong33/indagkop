<?php

namespace App\Http\Controllers\AboutUs;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class TaskController extends Controller
{
    public function index()
    {
        $task=Task::all();

        return view('admin.pages.task.index-task', ['task'=>$task]);
    }

    public function create()
    {
        return view('admin.pages.task.create-task');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title_task'=>'required',
            'description'=>'required',
        ]);

        $task=Task::create([
            'title_task'=>$request->title_task,
            'description'=>$request->description,
        ]);

        Alert::success('Berhasil', 'Data Berhasil Di Simpan');

        return redirect()->route('task.index');
    }

    public function edit(Task $task)
    {
        return view('admin.pages.task.edit-task', ['task'=>$task]);
    }

    public function update(Request $request, Task $task)
    {
        $this->validate($request, [
            'title_task'=>'required',
            'description'=>'required',
        ]);

        $task->update([
            'title_task'=>$request->title_task,
            'description'=>$request->description,
        ]);

        Alert::success('Berhasil', 'Data Berhasil Di Update');

        return redirect()->route('task.index');
    }

    public function destroy(Task $task)
    {
        $task=Task::where('id', $task->id)->delete();

        Alert::success('Berhasil', 'Data Berhasil Di Hapus');

        return redirect()->route('task.index');
    }
}
