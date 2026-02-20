<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use \App\Models\Work;

class IndexWorksComposer
{

    protected $works;
    protected $totales_proyectos;

    public function  __construct()
    {
        $this->works = Work::orderBy('id', 'Desc')->take(2)->get();
        $this->totales_proyectos = Arr::first(DB::select('call totales_proyectos()'))->total_proy;
    }

    public function compose(View $view)
    {

        $view->with(['works' => $this->works, 'totales_proyectos' => $this->totales_proyectos]);
    }
}
