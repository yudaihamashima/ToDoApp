<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class CreateController extends Controller
{

    public function create_task(Request $request)
    {

        $validated = $request->validate([
            'task_name' => ['required','max:20'],
            'deadline' => ['required'],
            'remarks' => ['max:200']
        ],
            [
                'task_name.required' => 'タスク名が未入力です',
                'task_name.max' => 'タスク名は20文字以内です',
                'deadline.required' => '期日が未入力です',
                'remarks.max' => '備考は200文字以内です'
            ]);

        DB::table('tasks')->insert([
            'task_name' => $request->input('task_name'),
            'deadline' => $request->input('deadline'),
            'remarks' => $request->input('remarks'),
            'registration_date' => now()->format('Y-m-d')
        ]);

        $tasks = DB::table('tasks')->get();

        return view('tasklist', [
            'tasks' => $tasks
        ]);
    }


}
