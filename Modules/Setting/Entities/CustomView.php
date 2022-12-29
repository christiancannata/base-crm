<?php

namespace Modules\Setting\Entities;

use Illuminate\Database\Eloquent\Model;

class CustomView extends Model
{

    public $table = 'customviews';

    protected $guarded = [
        'id'
    ];

}
