<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{

    use Sluggable;
    use SluggableScopeHelpers;

    protected $table = 'tags';
    protected $fillable = ['name'];

    public function articles(): BelongsToMany
    {
        return $this->belongsToMany(Article::class);
    }

    public function sluggable(): array
    {
        return [
            'tag_slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function scopeSearchTag($query, $name)
    {
        return $query->where('name', 'LIKE', "%$name%");
    }
}
