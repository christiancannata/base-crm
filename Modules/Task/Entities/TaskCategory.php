<?php

namespace Modules\Task\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TaskCategory extends Model
{
    use HasFactory;

    protected $table = 'task_categories';

    protected $fillable = [];

    protected static function newFactory()
    {
        return \Modules\Task\Database\factories\TaskCategoryFactory::new();
    }
}
