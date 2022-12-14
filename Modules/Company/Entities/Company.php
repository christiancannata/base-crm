<?php

namespace Modules\Company\Entities;

use Givebutter\LaravelCustomFields\Traits\HasCustomFields;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    use HasCustomFields;

    protected $fillable = [];

    protected static function newFactory()
    {
        return \Modules\Company\Database\factories\CompanyFactory::new();
    }
}
