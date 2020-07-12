<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProfilChart extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'item_id', 'user_id'
    ];

    protected $hidden = [

    ];//

    public function users() {
        return $this->hasOne(User::class, 'user_id', 'id');
    }

    public function SellCahrtInfo() {
        return $this->hasOne(User::class, 'item_id', 'id');
    }


}
