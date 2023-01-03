<?php

namespace Modules\Workplace\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Contract\Entities\Contract;
use Modules\Customer\Entities\Customer;

class Workplace extends Model
{

    public $table = 'workplaces';

    protected $guarded = [
        'id',
    ];

}
