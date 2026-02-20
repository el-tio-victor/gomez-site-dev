<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Work extends Model
{

    use Sluggable;
    use SluggableScopeHelpers;

    protected $table = 'works';
    protected $fillable = ['title', 'detail', 'url', 'id_categoryWork'];

    public function images(): BelongsToMany
    {
        return $this->belongsToMany(Image::class, 'work_image');
    }

    public function technologyTool(): BelongsToMany
    {
        return $this->belongsToMany(TechnologyTool::class, 'work_technology', 'id_work', 'id_technology_tool');
    }

    public function categoryWork()
    {
        return $this->belongsTo(CategoryWork::class, 'id_categoryWork', 'id');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
