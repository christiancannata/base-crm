<?php

namespace Modules\Task\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskStatus extends Model
{
    use HasFactory;

    protected $table = 'task_statuses';

    protected $fillable = [
        'name'
    ];

    protected static function newFactory()
    {
        return \Modules\Task\Database\factories\TaskStatusFactory::new();
    }
}
