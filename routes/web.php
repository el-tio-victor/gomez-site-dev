<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\Work\WorksController;
use App\Http\Controllers\Work\TechnologiesController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [
    function () {
        return view('site.home.home');
    }
])->name('home');


Auth::routes();

Route::get('/dashboard', [function () {
    return view('dashboard.dashboard');
}])
    ->middleware('auth');
    
Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {
    Route::resource('users', 'UsersController');
    Route::get('users/{id}/destroy', [
        'uses' => 'UsersController@destroy',
        'as' => 'dashboard.users.destroy'
    ]);

    Route::resource('categories', CategoriesController::class);
    Route::get(
        'categories/{id}/destroy',
        [
            'uses' => 'CategoriesController@destroy',
            'as' => 'dashboard.categories.destroy'
        ]
    );

    Route::resource('tags', TagsController::class);
    Route::get(
        'tags/{id}/destroy',
        [
            'uses' => 'TagsController@destroy',
            'as' => 'dashboard.tags.destroy'
        ]
    );
    Route::resource('articles', ArticlesController::class);
    Route::get(
        'articles/{id}/destroy',
        [
            ArticlesController::class,
            'destroy'
        ]
    )->name('dashboard.articles.destroy');

    //Route::resource('images', ImagesController::class);
    Route::get(
        'images',
        [
            ImagesController::class,
            'index'
        ]
    )->name('images.index');
    Route::post('images', [
        ImagesController::class,
        'store'
    ])->name('images.store');
    Route::get('images/generals', /*[
        'uses' =>*/[ImagesController::class,'indexGenerals']/*,
        'as' => 'images.indexGenerals'
    ]*/)->name('images.indexGenerals');

    //Ruta categoriesWork
    Route::Resource('categoriesWork', 'Work\CategoriesWorkController::class');
    Route::get(
        'categoriesWork/{id}/destroy',
        [
            'uses' => 'Work\CategoriesWorkController@destroy',
            'as' => 'categoriesWork.destroy'
        ]
    );

    Route::Resource('works', WorksController::class);
    Route::get(
        'works/{id}/destroy',
        [
            'uses' => 'Work\WorksController@destroy',
            'as' => 'works.destroy'
        ]
    );



    Route::put('tools/{id}', [
        'uses' => 'Work\TechnologiesController@updateTool',
        'as' => 'tools.update'
    ]);

    Route::Resource('techs', TechnologiesController::class);
    Route::get(
        'techs/{id}/index',
        [
            'uses' => 'Work\TechnologiesController@index',
            'as' => 'techs.search.index'
        ]
    );
    Route::get(
        'techs/{id}/destroy',
        [
            'uses' => 'Work\TechnologiesController@destroy',
            'as' => 'techs.destroy'
        ]
    );
    Route::post(
        'techs/storeTool',
        [
            'uses' => 'App\Http\Controllers\Work\TechnologiesController@storeTool',
            'as' => 'techs.storeTool'
        ]
    );
    Route::get(
        'tools/{id}/destroy',
        [
            'uses' => 'Work\TechnologiesController@destroyTool',
            'as' => 'tools.destroy'
        ]
    );

    Route::get('techtool/list', [
        'uses' => 'Work\TechToolController@list',
        'as' => 'techtool.list'
    ]);
});

Route::get('/portafolio', [WorksController::class, 'show'])->name('portfolio');
Route::get('portafolio/{slug}', [
    WorksController::class,
    'viewWork'
])->name('portfolio.work');

Route::get('/blog', [
    HomeController::class,
    "index",
])->name('blog');

Route::get("/blog/categories/searchCategory/{slug}/", [
    HomeController::class,
    "searchCategory",
])->name("blog.search.category");

Route::get("/blog/tags/searchTag/{slug}/", [
    HomeController::class,
    "searchTag"
])->name("blog.search.tag");


Route::get('/blog/{slug}', [
    ArticlesController::class,
    "viewArticle",
])->name("blog.article");

Route::post('/send', [
    "uses" => "HomeController@msg",
    "as" => "index.send"
]);

/*Route::get('/logout', [
    'uses' => 'Auth\LoginController@logout', 'as' => 'dashboard.logout'])->name('logout');*/

Route::get('/logout', [
    LoginController::class, 
    'logout'
])->name('logout');

Route::get("/portafolio/categories/{slug}/", [
    WorksController::class,
    'searchWorks'
])->name("portafolio.search.work");

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
