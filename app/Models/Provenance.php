<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Provenance extends Model
{
    use HasFactory;

    protected $fillable = ['creator', 'year', 'item_id'];

    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function image() {
        return $this->morphOne(Image::class, 'imageable');
    }
}
