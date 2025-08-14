<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //

    protected $table = "products";

    protected $guarded = [];

    protected $primaryKey = "product_uid";

    public $incrementing = false;
    protected $keyType = 'string';

    public function inventory()
    {
        return $this->hasOne(Inventory::class, "product_uid", "product_uid");
    }

    // public function category() {
    //     return $this->belongsTo(Category::class, "id", "category_id");
    // }
}
