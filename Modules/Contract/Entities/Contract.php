<?php

namespace Modules\Contract\Entities;

use App\Models\User;
use Givebutter\LaravelCustomFields\Traits\HasCustomFieldResponses;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Customer\Entities\Customer;

class Contract extends Model
{
    use HasFactory;
    use HasCustomFieldResponses;

    protected $fillable = [
        'name',
        'status_id',
        'customer_id',
        'created_by'
    ];

    protected static function newFactory()
    {
        return \Modules\Task\Database\factories\TaskFactory::new();
    }

    public function status()
    {
        return $this->belongsTo(ContractStatus::class);
    }


    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class);
    }

}
