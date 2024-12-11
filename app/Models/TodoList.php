<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TodoList extends Model
{
    //
    protected $fillable = ['user_id', 'title', 'completed'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}