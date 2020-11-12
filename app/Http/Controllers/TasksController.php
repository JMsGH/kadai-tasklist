<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;  // 追加

class TasksController extends Controller
{
    // getでtasks/にアクセスされた場合の一覧表示処理
    public function index()
    {
        if (\Auth::check()){
         // 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
            // ユーザのタスクの一覧を作成日の昇順で取得
            $tasks = $user->tasks()->orderBy('created_at', 'asc')->paginate(10);
        
        // タスク一覧ビューでそれを表示
            return view('tasks.index', [
                'tasks' => $tasks
            ]);
        } else {
            return view('welcome');
        }
    
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
            $task = new Task;
        
            // タスク作成ビューを表示
            return view('tasks.create', [
            'task' => $task,    
            ]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    // postでtasks/にアクセスされた場合の新規登録処理
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'description' => 'required | max:255',
            'status' => 'required | max:10',
        ]);
        
        // 認証済みユーザ（閲覧者）のタスクとして作成（リクエストされた値をもとに作成）
        $request->user()->tasks()->create([
            
            'description' => $request->description,
            'status' => $request->status
        ]);
        
       // トップページ（index）へリダイレクト
            return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::find($id);
        
        if ((Task::find($id) == null) || 
            (\Auth::user()->id) != ($task->user_id)
            ) 
            { // 該当するタスクidが存在しない場合と他ユーザのタスクを表示しようとした場合
            
            // トップページ（index）へリダイレクト
            return redirect('/');
        }
        else 
        {
            // タスクを詳細ビューで表示
            return view('tasks.show', [
            'task' => $task,
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);
        
        if ((Task::find($id) == null) || 
            (\Auth::user()->id) != ($task->user_id)
            )
        {
            // トップページ（index）へリダイレクト
            return redirect('/');
        }
        
        else
        {
            // タスクを編集ビューで表示
            return view('tasks.edit', [
            'task' => $task,
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // バリデーション
        $request->validate([
            'description' => 'required | max:255',
            'status' => 'required | max:10',
        ]);
        
        // idの値でタスクを検索して取得
        $task = Task::findOrFail($id);
        
        // タスクを更新
        $task->description = $request->description;
        $task->status = $request->status;
        $task->save();
        
        // トップページ（index）へリダイレクト
            return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        
        if ((Task::find($id) == null) || 
            (\Auth::user()->id) != ($task->user_id)
            )
        {
            // トップページ（index）へリダイレクト
            return redirect('/');
        }
        
        else
        {
            //タスクを削除
            $task->delete();
        
            // トップページ（index）へリダイレクト
            return redirect('/');
        }
    }
}
