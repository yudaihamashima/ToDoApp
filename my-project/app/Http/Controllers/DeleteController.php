<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class DeleteController extends Controller
{

    public function delete_task($id)
    {
        DB::table('tasks')
            ->where('id', $id)
            ->delete();

        $tasks = DB::table('tasks')->get();

        return view('tasklist', [
            'tasks' => $tasks
        ]);
    }

}
