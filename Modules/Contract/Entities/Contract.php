<?php

namespace Modules\Contract\Entities;

use App\Models\User;
use Givebutter\LaravelCustomFields\Traits\HasCustomFieldResponses;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Customer\Entities\Customer;

class Contract extends Model
{
    use HasCustomFieldResponses;

    protected $guarded = [
        'id',
    ];

    public $dates = [
        'created_at',
        'updated_at',
        'start_date'
    ];


    public function status()
    {
        return $this->belongsTo(ContractStatus::class);
    }


    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }


    public function referent()
    {
        return $this->belongsTo(User::class, 'referent_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(ContractCategory::class);
    }
}
