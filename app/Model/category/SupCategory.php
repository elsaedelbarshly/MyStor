<?php

namespace App\Model\category;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class SupCategory extends Model
{
    use Notifiable;

    protected $table = 'sub_categories';

    protected $fillable = [
        'category_id','subcategory_name'
    ];
}
