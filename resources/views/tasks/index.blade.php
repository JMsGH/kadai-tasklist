@extends('layouts.app')

@section('content')

    <h1>タスク一覧</h1>
    
    <div class="mb-4">
    {{-- タスク作成ページへのリンク --}}
    {!! link_to_route('tasks.create', '新規タスクを作成', [], ['class' => 'btn btn-success']) !!}
    </div>

    
    @if (count($tasks) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th></th>
                    <th>タスク</th>
                    <th>ステータス</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                <tr>
                    {{-- タスク詳細へのリンク --}}
                    <td>{!! link_to_route('tasks.show', $task->id, ['task' => $task->id]) !!}</td>
                    <td>
                        {{-- メッセージ削除フォーム --}}
                        {!! Form::model($task, ['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
                        {!! Form::submit('削除', ['class' => 'btn btn-sm btn-outline-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->status }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        <div class="alert alert-secondary" role="alert">
            タスクを編集するにはタスクidをクリックします。
        </div>
        
    @else
        <div class="alert alert-primary" role="alert">
            表示するタスクがありません。
        </div>
    @endif
    

@endsection