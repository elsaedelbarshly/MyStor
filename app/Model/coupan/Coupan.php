<?php

namespace App\Model\coupan;

use Illuminate\Database\Eloquent\Model;

class Coupan extends Model
{
    protected $table='coupans';
    protected $fillable = [
        'coupan',
        'discount'
    ];
}
