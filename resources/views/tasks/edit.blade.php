@extends('layouts.app')

@section('content')

    <h1>id: {{ $task->id }} のタスクを編集</h1>
    
    <div class="row">
        <div class="col-6">
            {!! Form::model($task, ['route' => ['tasks.update', $task->id], 'method' => 'put']) !!}

                <div class="form-group">
                    {!! Form::label('description', 'タスク:') !!}
                    {!! Form::text('description', null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('更新', ['class' => 'btn btn-outline-primary']) !!}

            {!! Form::close() !!}
        
    </div>

@endsection