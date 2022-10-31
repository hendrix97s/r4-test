<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, Uuids;
    
    protected $fillable = [
      'category_id',
      'name',
      'image_url',
      'image'
    ];

    protected $appends = [
      'category_name',
      'category_uuid',
    ];

    protected $hidden = [
      'id',
      'category_id',
      'created_at',
      'updated_at',
    ];

    public function category()
    {
      return $this->belongsTo(Category::class);
    }

    public function getCategoryUuidAttribute()
    {
      return $this->category->uuid;
    }

    public function getCategoryNameAttribute()
    {
      return $this->category->name;
    }
}
