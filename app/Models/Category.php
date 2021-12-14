<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image_url', 'slug', 'parent_id'];
    protected $hidden = ['created_at', 'updated_at'];
    protected $visible = ['id', 'name', 'image_url', 'slug', 'parent_id', 'products'];
    protected $with = ['products'];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = rand(1, 1000) . '_' . Str::slug($value);
    }
}
