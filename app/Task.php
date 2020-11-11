<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['description', 'status'];
    
    /**
     * このタスクを所有するユーザ（ユーザモデルとの関係を定義）
     */
     public function user() 
     {
       return $this->belongsTo(User::class);
     }
}
