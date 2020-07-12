<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProfilPicture extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'image'
    ];

    protected $hidden = [

    ];//

    
}
