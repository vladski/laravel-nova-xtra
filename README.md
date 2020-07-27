# Laravel Nova Xtra
Simple extra helpers for Nova admin:
- modal window loading content from and submitting to any custom route 
- tooltips 
- custom links in navigation
- custom pages
- reloading current page asynchronously

## Quick start

This is an early stage of the package development I am using and testing inside a real project.

### Install

```
composer require v ladski/laravel-nova-xtra
```

### Usage

Register in NovaServiceProvider

```php
public function tools()
    {
        return [

            (new \Vladski\NovaXtra\NovaXtra)
            
                ->addNavigationIntroPage() // remove or set $canSee param to limit only to e.g. developer

                ->addNavigationGroup('JS Link')
                ->addNavigationLink('Refresh Page', 'javascript: Nxtra.reloadCurrent();')
                ->addNavigationLink('JS Alert', "javascript: alert('You clicked JS Alert link');")

                ->addNavigationGroup('Pages')
                ->addNavigationPage('Example Page', 'example', 'App\Http\Controllers\ExamplePageController@index')

                ->addNavigationGroup('Routes')
                // you can find route for current page from console running: Nova.app.$route;
                ->addNavigationRoute('Dashboard', 'dashboard.custom', $routeParams = ['name' => 'main'])
                ->addNavigationRoute('Users', 'index', $routeParams = ['resourceName' => 'users'])
            ,
            
            // ....
        ];
    }
```

#### Navigation

```php
addNavigationGroup($name, $icon = '', $canSee = null);
addNavigationPage($name, $slug, $controller, $canSee = null);
addNavigationLink($name, $path, $canSee = null);
addNavigationRoute($name, $routeName, $routeParams = [], $canSee = null);
```
