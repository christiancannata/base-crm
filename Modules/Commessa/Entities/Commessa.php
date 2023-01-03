<?php

namespace Modules\Commessa\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Modules\Customer\Entities\Customer;
use Modules\Workplace\Entities\Workplace;

class Commessa extends Model
{

    public $table = 'commesse';

    protected $guarded = [
        'id',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function workplace()
    {
        return $this->belongsTo(Workplace::class);
    }


    public function referent()
    {
        return $this->belongsTo(User::class);
    }

    public function userInvoice()
    {
        return $this->belongsTo(User::class);
    }

}
