<?php

namespace Modules\Calendar\Entities;

use App\Models\User;
use Givebutter\LaravelCustomFields\Traits\HasCustomFieldResponses;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasCustomFieldResponses;

    public $table = 'unavailabilities';

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


}
