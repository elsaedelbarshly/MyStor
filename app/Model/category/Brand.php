<?php

namespace App\Model\category;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use Notifiable;

    protected $table = 'brands';

    protected $fillable = [
        'brand_name'
    ];

}
