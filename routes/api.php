<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Nova\Nova;
use Vladski\NovaXtra\NovaXtra;

/*
|--------------------------------------------------------------------------
| Tool API Routes
|--------------------------------------------------------------------------
|
| Here is where you may register API routes for your tool. These routes
| are loaded by the ServiceProvider of your tool. They are protected
| by your tool's "Authorize" middleware by default. Now, go build!
|
*/
// prefixed by '/nova-vendor/nova-xtra/' in ToolServiceProvider
/*Route::get('{slug}', function ($slug) {
    return "<h1>Page for slug: {$slug}</h1>";
});*/
Route::get ('page/{slug}', function ($slug) {

    // find this tool instance in Nova::registeredTools
    $tool = collect(Nova::registeredTools())->first(function ($tool) {
        return $tool instanceof NovaXtra;
    });

    // find registered controller to serve this page
    $page = collect($tool->navigation)
        ->where('type','page')
        ->where('slug', request()->route('slug'))
        ->first();

    if (!$page) abort(404);

    try {
        return app()->call($page['controller'] ?? null, ['slug' => $slug]);
    }
    catch (\Exception $e) {
        return view('nova-xtra::page_error',['exception' => $e]);
    }
});
