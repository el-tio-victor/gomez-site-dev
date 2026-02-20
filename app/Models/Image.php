<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Image extends Model
{
    protected $table = 'images';
    protected $fillable = ['name'];

    public function articles(): BelongsToMany
    {
        return $this->belongsToMany(Article::class)->withPivot('article_id', 'image_id');
    }

    public function works(): BelongsToMany
    {
        return $this->belongsToMany(Work::class, 'work_image')->withPivot('article_id', 'image_id');
    }
}
