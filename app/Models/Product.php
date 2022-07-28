<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\ProductImage;


class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'description',
        'status',
        'price',

    ];

    /**
     * One to many relation method.
     *
     */
    public function productImages()

    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');

    }


}
