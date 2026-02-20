<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tool extends Model
{
    protected $table    = 'tools';
    protected $fillable = ['tool_name'];

    public $timestamps = false;

    public function technologyTool(): HasMany
    {
        return $this->hasMany(TechnologyTool::class, 'id_tool');
    }
}
