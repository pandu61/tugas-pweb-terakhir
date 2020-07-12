<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SellProductInfo extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'seller_id', 'product_name', 'stock','price',
        'location','condition','weight','description', 'category'
    ];

    protected $hidden = [

    ];//

    public function users() {
        return $this->belongsTo(User::class, 'seller_id', 'id');
    }
}
