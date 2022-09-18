<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{ asset('css/list.css') }}">
        <title></title>
    </head>
    <body>

        <div class="main">
            <div class="task-box">

                <h1>以下のタスクを削除します</h1>

                <a href="/delete{{ $task->id }}">削除する</a>
                <a href="/list">一覧に戻る</a>

                <div class="task-contents">
                    <p>タスク名</p>
                    <p class="task-name">{{ $task->task_name }}</p>
                    <p>期日</p>
                    <p class="task-name">{{ $task->deadline }}</p>
                    <p>備考</p>
                    <p class="task-name">{{ $task->remarks }}</p>
                </div>

            </div>
        </div>

    </body>

</html>
