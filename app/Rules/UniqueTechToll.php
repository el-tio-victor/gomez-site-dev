<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class UniqueTechToll implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public $val;
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $this->val = $value;
        $table = $attribute === 'technology_name' ? 'technologies' : 'tools';
        $result = DB::table( $table)->whereRaw("$attribute COLLATE UTF8_GENERAL_CI  like ? ;",[$value])->get();
        
        return count($result)>0 ? false : true;
    
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        $field = ':attribute'=== 'technology name' ? 'tecnología' :'herramienta';
        return "La $field $this->val ya existe";
    }
}
