<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasOne;

class CategoryWork extends Model
{
    //
    protected $table = 'categoriesWork';
    protected $fillable = ['categoryWork_name'];

    public $timestamps = false;

    public function work(): HasOne
    {
        return $this->hasOne(Work::class, 'id_categoryWork', 'id');
    }
}
