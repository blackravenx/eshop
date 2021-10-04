<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'img_url', 'slug', 'description', 'price', 'category_id'];
    protected $hidden = ['created_at', 'updated_at'];
    protected $visible = ['name', 'img_url', 'slug', 'description', 'price', 'category_id','category'];
    protected $with = ['category'];
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class)->without('products');
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = rand(1, 1000) . '_' . Str::slug($value);
    }
}
