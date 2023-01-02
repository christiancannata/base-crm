<?php

namespace Modules\Lead\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Contract\Entities\Contract;

class Lead extends Model
{

    protected $guarded = [
        'id',
    ];

    public $appends = ['full_name'];

    public function getFullNameAttribute()
    {
        if ($this->company_name) {
            return $this->company_name;
        }
        return $this->first_name . " " . $this->last_name;
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
