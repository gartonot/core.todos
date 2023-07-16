<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'title', 'isCompleted', 'created_at'];

    protected $hidden = ['updated_at', 'deleted_at'];

    protected $casts = [
        'isCompleted' => 'boolean'
    ];
}
