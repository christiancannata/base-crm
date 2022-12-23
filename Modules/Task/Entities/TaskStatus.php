<?php

namespace Modules\Task\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TaskStatus extends Model
{
    use HasFactory;

    protected $table = 'task_statuses';

    protected $fillable = [];

    protected static function newFactory()
    {
        return \Modules\Task\Database\factories\TaskStatusFactory::new();
    }
}
