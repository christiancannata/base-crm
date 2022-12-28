<?php

namespace Modules\Calendar\Entities;

use App\Models\User;
use Givebutter\LaravelCustomFields\Traits\HasCustomFieldResponses;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Contract\Entities\ContractCategory;
use Modules\Contract\Entities\ContractStatus;
use Modules\Customer\Entities\Customer;

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

}
