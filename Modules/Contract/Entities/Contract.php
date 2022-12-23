<?php

namespace Modules\Contract\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Task\Entities\TaskCategory;
use Modules\Task\Entities\TaskStatus;

class Contract extends Model
{
    use HasFactory;

    protected $fillable = [];

    protected static function newFactory()
    {
        return \Modules\Task\Database\factories\TaskFactory::new();
    }

    public function category()
    {
        return $this->belongsTo(TaskCategory::class, 'category_id');
    }

    public function status()
    {
        return $this->belongsTo(TaskStatus::class, 'status_id');
    }

}
