<?php

namespace IsEazy\Domain\Product\Model;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Model;
use IsEazy\Domain\Shop\Model\Shop;

class Product extends Model
{
    use Timestamp;

    protected $guarded = [];
    protected $hidden = ['pivot'];

    public function shops()
    {
        return $this->belongsToMany(Shop::class);
    }


    public static function findByName(string $name)
    {
        return self::where('name', $name)->first();
    }



}
