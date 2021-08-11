<?php

namespace App\Model\category;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use App\Model\category\SubCategory;

class Category extends Model
{
    use Notifiable;

    protected $table = 'categories';

    protected $fillable = [
        'category_name'
    ];


    /**
     * Get all of the comments for the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    // public function subCategories(): HasMany
    // {
    //     return $this->hasMany(SubCategory::class, 'category_id', 'id');
    // }

    public function subCategories()
    {
         return $this->hasMany(SubCategory::class, 'category_id', 'id');
    }
}
