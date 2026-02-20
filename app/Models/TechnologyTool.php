<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class TechnologyTool extends Model
{
    //
    protected $table    = 'technology_tool';
    protected $fillable = ['id_technology', 'id_tool'];

    public $timestamps  = false;

    public function technology(): BelongsTo
    {
        return $this->belongsTo(Technology::class, 'id_technology');
    }

    public function tool(): BelongsTo
    {
        return $this->belongsTo(Tool::class, 'id_tool');
    }

    public function works(): BelongsToMany
    {
        return $this->belongsToMany(Work::class, 'work_technology', 'id_work', 'id_technology_tool');
    }
}
