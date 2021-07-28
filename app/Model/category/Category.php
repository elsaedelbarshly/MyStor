<?php

namespace App\Model\category;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Notifiable;

    protected $table = 'categories';

    protected $fillable = [
        'category_name'
    ];
}
