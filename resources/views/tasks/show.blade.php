@extends('layouts.app')

@section('content')

    <h1>id = {{ $task->id }} のタスク詳細</h1>
    
    <table class="table table-bordered">
            <tr>
                <th>id</th>
                <td>{{ $task->id }}</td>
            </tr>
            <tr>
                <td>タスク</td>
                <td>{{ $task->description }}</td>
            </tr>
            <tr>
                <td>ステータス</td>
                <td>{{ $task->status }}</td>
            </tr>
    </table>
    
    {{-- メッセージ編集ページへのリンク --}}
    {!! link_to_route('tasks.edit', 'このタスクを編集', ['task' => $task->id], ['class' => 'btn btn-outline-primary']) !!}
    
    {{-- メッセージ削除フォーム --}}
    {!! Form::model($task, ['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
        {!! Form::submit('このタスクを削除', ['class' => 'btn btn-outline-danger']) !!}
    {!! Form::close() !!}


@endsection