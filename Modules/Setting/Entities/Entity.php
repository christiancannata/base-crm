<?php

namespace Modules\Setting\Entities;

use Givebutter\LaravelCustomFields\Traits\HasCustomFields;
use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    use HasCustomFields;

    public $timestamps = false;

}
