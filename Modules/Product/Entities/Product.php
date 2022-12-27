<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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


    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function setPriceAttribute($value)
    {
        $value = str_replace("€", "", $value);
        $value = preg_replace('/[\x00-\x1F\x7F-\xFF]/', '', $value);
        $value = str_replace(".", "", $value);
        $value = str_replace(",", ".", $value);

        $this->attributes['price'] = floatval($value);
    }

    public function getPriceAttribute()
    {
        return number_format($this->attributes['price'], 2, ',', '.') . "€";
    }
}
