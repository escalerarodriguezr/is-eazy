<?php

namespace IsEazy\Domain\Shop\Model;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Model;
use IsEazy\Domain\Product\Model\Product;

class Shop extends Model
{

    use Timestamp;

    protected $guarded = [];
    protected $hidden = ['pivot'];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function scopeWithProducts($query)
    {
        return $query->with('products');
    }


}
