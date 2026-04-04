<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CategoryWork extends Model
{
    //
    use Sluggable;
    use SluggableScopeHelpers;

    protected $table = 'categoriesWork';
    protected $fillable = ['categoryWork_name'];

    public $timestamps = false;

    public function work(): HasOne
    {
        return $this->hasOne(Work::class, 'id_categoryWork', 'id');
    }

    public function sluggable(): array
    {
        return [
            'categoryWork_slug' => [
                'source' => 'categoryWork_name'
            ]
        ];
    }

    public function scopeSearchCategory($query, $name)
    {
        return $query->where('title', 'LIKE', "%$name%");
    }
}
