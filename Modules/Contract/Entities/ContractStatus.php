<?php

namespace Modules\Contract\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Contract\Entities\Contract;
use Modules\Task\Entities\TaskCategory;
use Modules\Task\Entities\TaskStatus;

class ContractStatus extends Model
{
    use HasFactory;

    public $table = 'contract_statuses';

    protected $fillable = [
        'name',
    ];

    protected static function newFactory()
    {
        return \Modules\Task\Database\factories\TaskFactory::new();
    }

}
