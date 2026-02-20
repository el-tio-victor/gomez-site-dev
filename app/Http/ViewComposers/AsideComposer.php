<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;

class AsideComposer
{


    public function compose(View $view)
    {
        $categories = \App\Models\Category::orderBy('name', 'ASC')->get();
        $tags = \App\Models\Tag::orderBy('name', 'ASC')->get();
        $view->with('categories', $categories)
            ->with('tags', $tags);
    }
}
