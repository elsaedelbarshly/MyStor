<?php

namespace App\Model\category;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use App\Model\category\category;

class SubCategory extends Model
{
    use Notifiable;

    protected $table = 'subcategories';

    protected $fillable = [
        'category_id','subcategory_name'
    ];

    /**
     * Get the user that owns the SupCategory
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    // public function category(): BelongsTo
    // {
    //     return $this->belongsTo(Category::class, 'category_id', 'id');
    // }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
