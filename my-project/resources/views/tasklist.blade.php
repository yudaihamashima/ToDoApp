<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{ asset('css/list.css') }}">
        <title></title>
    </head>
    <body>

        <div class="create-sort">
            <a class="btn create-new" href="{{ url('/create_form') }}">新規作成</a>
            <div class="sort-section">
                @isset ($shown_tasks_deadline)
                    <a class="btn sort-by-deadline" href="/sort_by_deadline/{{ $shown_tasks_deadline }}">期日順に並べる</a>
                @else
                    <a class="btn sort-by-deadline" href="/sort_by_deadline">期日順に並べる</a>
                @endisset
                <form action="/show_until" class="show-until" method="get">
                    <input name="deadline" class="btn show-until-date" type="date">
                    <input class="btn show-until-show" type="submit" value="までのタスクを表示">
                </form>
                @if($errors->any())
                    <p class="error-message">{{ $errors->first('deadline') }}</p>
                @endif
                @isset ($shown_tasks_deadline)
                    <a class="btn show_all_tasks" href="/list">全タスク表示</a>
                @endisset
            </div>
        </div>

        <div class="main">
            @isset ($shown_tasks_deadline)
                <h2 class="show-task-deadline">{{ $shown_tasks_deadline }}までのタスク一覧</h2>
            @endisset
            @isset ($flag)
                @if($flag === 1)
                    <h2 class="sort-deadline-order">＜期日順＞</h2>
                @endif
            @endisset
            <div class="task-boxes">
                @foreach ($tasks as $task)
                <div class="task-box">
                        <div class="update">
                            <a class="btn edit" href="/edit_form/{{ $task->id }}">Edit</a>
                            <a class="btn delete" href="/delete/{{ $task->id }}">Delete</a>
                        </div>
                        <div class="task-contents">
                            <p>タスク名</p>
                            <p class="task-name">{{ $task->task_name }}</p>
                            <p>期日</p>
                            <p class="task-name">{{ $task->deadline }}</p>
                            <p>備考</p>
                            <p class="task-name">{{ $task->remarks }}</p>
                        </div>
                </div>
                @endforeach
            </div>
        </div>

    </body>
</html>
