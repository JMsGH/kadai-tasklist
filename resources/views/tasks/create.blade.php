@extends('layouts.app')

@section('content')

    <h1>新規タスク作成ページ</h1>
    
    <div class="row">
        <div class="col-6">
            {!! Form::model($task, ['route' => 'tasks.store']) !!}
        
                <div class="form-group">
                    {!! Form::label('description', 'タスク:') !!}
                    {!! Form::text('description', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('status', 'ステータス:') !!}
                    {!! Form::text('status', null, ['class' => 'form-control']) !!}
                </div>
            
                {!! Form::submit('登録', ['class' => 'btn btn-success']) !!}
            
            {!! Form::close() !!}
        </div>
    </div>


@endsection