<?php

namespace Thekavish\Todolist;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['name','complete'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'complete' => 'boolean',
    ];
}
