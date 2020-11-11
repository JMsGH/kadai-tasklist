@extends('layouts.app')

@section('content')
  @if (Auth::check())
    <div class="container">
      <div class="row">
        <div class="col-md-4 offset-md-4 mt-5 mb-5">
          {{-- タスク作成ページへのリンク --}}
          {!! link_to_route('tasks.create', '新規タスクを作成', [], ['class' => 'btn btn-success btn-block']) !!}
        </div>
         <div class="col-md-4 offset-md-4">
          {{-- タスク一覧ページへのリンク --}}
          {!! link_to_route('tasks.get', 'タスク一覧ページを表示', [], ['class' => 'btn btn-primary btn-block']) !!}
        </div>
      </div>
    </div>
    
    
    
  @else 
    <div class="center jumbotron text-center">
        <h1 class="mb-4">Task List</h1>
        <p>登録していただくと簡単なタスク管理が行えます</p>
    </div>
    <div class="text-center">
        {{-- ユーザ登録ページへのリンク --}}
        {!! link_to_route('signup.get', '登録する', [], ['class' => 'btn btn-lg btn-primary']) !!}
        <p></p>
        {!! link_to_route('login', 'ログイン', [], ['class' => 'btn btn-lg btn-success']) !!}
      </div>
  @endif
@endsection