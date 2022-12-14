<?php

namespace Modules\Calendar\Entities;

use App\Models\User;
use Givebutter\LaravelCustomFields\Traits\HasCustomFieldResponses;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasCustomFieldResponses;

    protected $guarded = [
        'id',
    ];

    public $dates = [
        'created_at',
        'updated_at',
        'start',
        'end'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function model()
    {
        return $this->morphTo();
    }

}
