
@foreach($works as $work)
       
            @component('site.portfolio.partials.work')
                @slot('title',$work->title)
                @slot('services', $work->services)
                @slot('detail',$work->detail)
                @slot('url', $work->url )
                @slot('images', $work->images()->where('image_main',1)->get() )
                @slot('tt', $work->technologyTool)
                @slot('work_slug', $work->slug )
                @slot('work_category', $work->categoryWork->categoryWork_name )
		@slot('index',$loop->index)
            @endComponent
        
@endforeach





