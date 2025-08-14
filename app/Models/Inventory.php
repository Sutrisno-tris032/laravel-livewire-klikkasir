<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    //

    protected $table = "inventories";

    protected $guarded = [];

    protected $primaryKey = "id";

    public function product()
    {
        return $this->belongsTo(Product::class, "product_uid", "product_uid");
    }
}
