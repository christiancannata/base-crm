<?php

namespace Modules\Task\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Calendar\Entities\Event;
use Modules\Customer\Entities\Customer;
use Modules\Lead\Entities\Lead;

class Task extends Model
{
    use HasFactory;

    // this is a recommended way to declare event handlers
    public static function boot()
    {
        parent::boot();

        static::deleting(function ($task) { // before delete() method call this
            $task->events()->delete();
        });
    }


    protected $guarded = [
        'id'
    ];

    public $dates = [
        'event_date'
    ];

    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = nl2br($value);
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

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }

    public function parent()
    {
        return $this->belongsTo(Task::class, 'parent_id');
    }

    public function events()
    {
        return $this->morphMany(Event::class, 'model');
    }

    public function closeReason()
    {
        return $this->belongsTo(TaskStatus::class, 'close_reason_id');
    }

}
