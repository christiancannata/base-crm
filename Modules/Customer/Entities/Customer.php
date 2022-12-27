<?php

namespace Modules\Customer\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Contract\Entities\Contract;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'zip_code',
        'vat_code'
    ];

    public $appends = ['full_name'];

    protected static function newFactory()
    {
        return \Modules\Task\Database\factories\TaskFactory::new();
    }

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }

    public function getFullNameAttribute()
    {
        if ($this->company_name) {
            return $this->company_name;
        }
        return $this->first_name . " " . $this->last_name;
    }
}
