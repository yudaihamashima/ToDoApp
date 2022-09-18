<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{ asset('css/create.css') }}">
        <title></title>
    </head>
    <body>

        <div class="main">
            <a class="btn return_list" href="{{ url('/list') }}">一覧に戻る</a>

            <form action="/edit/{{ $id }}" method="get">
                <p>タスク名</p>
                @if($errors->any())
                    <p class="error-message">{{ $errors->first('task_name') }}</p>
                @endif
                <input name="task_name" class="taskname" type="text" value="{{ $task_name }}">
                <p>期日</p>
                @if($errors->any())
                    <p class="error-message">{{ $errors->first('deadline') }}</p>
                @endif
                <input name="deadline" type="date" value="{{ $deadline }}">
                <p>備考</p>
                @if($errors->any())
                    <p class="error-message">{{ $errors->first('remarks') }}</p>
                @endif
                <textarea name="remarks" class="tasktxt" cols="50" rows="25">{{ $remarks }}</textarea>
                <input type="submit" class="btn return_list" value="更新">
            </form>
        </div>

    </body>
</html>
