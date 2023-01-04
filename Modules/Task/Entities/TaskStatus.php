<?php

namespace Modules\Task\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskStatus extends Model
{
    protected $table = 'task_statuses';

    protected $guarded = [
        'id'
    ];

    public function parent()
    {
        return $this->belongsTo(TaskStatus::class);
    }
}
