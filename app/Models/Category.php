<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;
    //
    protected $table = "categories";
    protected $fillable = ['name'];


    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }

    public function sluggable(): array
    {
        return [
            'category_slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function scopeSearchCategory($query, $name)
    {
        return $query->where('title', 'LIKE', "%$name%");
    }
}
