<?php

namespace Modules\Task\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Calendar\Entities\Event;

class Task extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

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

    public function assignedTo()
    {
        return $this->belongsTo(User::class);
    }


    public function parent()
    {
        return $this->belongsTo(Task::class, 'parent_id');
    }

    public function events()
    {
        return $this->morphMany(Event::class, 'model');
    }
}
