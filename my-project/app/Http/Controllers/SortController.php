<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class SortController extends Controller
{

    public function sort_by_deadline()
    {
        $tasks = DB::table('tasks')
        ->orderByRaw('deadline')
        ->get();

        $flag = 1;

        return view('tasklist', [
            'tasks' => $tasks,
            'flag' => $flag
        ]);
    }

    public function sort_by_deadline_shown_tasks($shown_tasks_deadline)
    {
        $tasks = DB::table('tasks')
        ->where('deadline','<',$shown_tasks_deadline)
        ->orderByRaw('deadline')
        ->get();

        $flag = 1;

        return view('tasklist', [
            'tasks' => $tasks,
            'shown_tasks_deadline' => $shown_tasks_deadline,
            'flag' => $flag
        ]);
    }

    public function show_until(Request $request)
    {
        $validated = $request->validate([
            'deadline' => ['required']
        ],
            [
                'deadline.required' => '期日が未入力です'
            ]);

        $shown_tasks_deadline = $request->input('deadline');

        $tasks = DB::table('tasks')
                ->where('deadline','<=',$shown_tasks_deadline)
                ->get();

        $shown_tasks_num = count($tasks);
        $total_tasks_num = DB::table('tasks')->count();

        return view('tasklist', [
            'tasks' => $tasks,
            'shown_tasks_num' => $shown_tasks_num,
            'total_tasks_num' => $total_tasks_num,
            'shown_tasks_deadline' => $shown_tasks_deadline
        ]);
    }

}
