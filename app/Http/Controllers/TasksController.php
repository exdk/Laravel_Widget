<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TasksController extends Controller
{
    public function index()
    {
        $tasks = auth()->user()->tasks();
        return view('dashboard', compact('tasks'));
    }
    public function add()
    {
        return view('add');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'region' => 'required',
            'region1' => 'required'
        ]);
        $task = new Task();
        $task->description = $request->region;
        $task->description2 = $request->region1;
        $task->user_id = auth()->user()->id;
        $task->save();
        return redirect('/admin/dashboard');
    }

    public function edit(Task $task)
    {

        if (auth()->user()->id == $task->user_id)
        {
            return view('edit', compact('task'));
        }
        else {
            return redirect('/admin/dashboard');
        }
    }

    public function view(Task $task)
    {

        if (auth()->user()->id == $task->user_id)
        {
            return view('view', compact('task'));
        }
        else {
            return redirect('/admin/dashboard');
        }
    }

    public function update(Request $request, Task $task)
    {
        if(isset($_POST['delete'])) {
            $task->delete();
            return redirect('/admin/dashboard');
        }
        else
        {
            $this->validate($request, [
                'description' => 'required',
                'description2' => 'required'
            ]);
            $task->description = $request->description;
            $task->description2 = $request->description2;
            $task->save();
            return redirect('/admin/dashboard');
        }
    }
}

function distance($lat_1, $lon_1, $lat_2, $lon_2) {
    $radius_earth = 6371; // Радиус Земли
    $lat_1 = deg2rad($lat_1);
    $lon_1 = deg2rad($lon_1);
    $lat_2 = deg2rad($lat_2);
    $lon_2 = deg2rad($lon_2);
    $d = 2 * $radius_earth * asin(sqrt(sin(($lat_2 - $lat_1) / 2) ** 2 + cos($lat_1) * cos($lat_2) * sin(($lon_2 - $lon_1) / 2) ** 2));
    return number_format($d, 2, '.', '').' км.';
}
