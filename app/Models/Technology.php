<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Technology extends Model
{
    protected $table = 'technologies';
    protected $fillable = ['technology_name'];

    public $timestamps = false;

    public function technologyTool(): HasMany
    {
        return $this->hasMany(TechnologyTool::class, 'id_technology');
    }

    /*public function works(){
        return $this->belongsToMany('App\Technology');
    }*/
}
