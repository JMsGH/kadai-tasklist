@extends('layouts.app')

@section('content')
  @if (Auth::check())
    {{ Auth::user()->name}}
  @else 
    <div class="center jumbotron text-center">
        <h1 class="mb-4">Task List</h1>
        <p>登録していただくと簡単なタスク管理が行えます</p>
    </div>
    <div class="text-center">
        {{-- ユーザ登録ページへのリンク --}}
        {!! link_to_route('signup.get', '登録する', [], ['class' => 'btn btn-lg btn-primary']) !!}
      </div>
  @endif
@endsection