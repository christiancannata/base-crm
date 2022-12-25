<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Contract\Entities\Contract;
use Modules\Task\Entities\TaskCategory;
use Modules\Task\Entities\TaskStatus;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id'
    ];

    protected static function newFactory()
    {
        return \Modules\Task\Database\factories\TaskFactory::new();
    }

}
