[![Latest Stable Version](https://poser.pugx.org/vladski/laravel-nova-xtra/v)](//packagist.org/packages/vladski/laravel-nova-xtra) 
[![Total Downloads](https://poser.pugx.org/vladski/laravel-nova-xtra/downloads)](//packagist.org/packages/vladski/laravel-nova-xtra) 
[![Latest Unstable Version](https://poser.pugx.org/vladski/laravel-nova-xtra/v/unstable)](//packagist.org/packages/vladski/laravel-nova-xtra) 
[![License](https://poser.pugx.org/vladski/laravel-nova-xtra/license)](//packagist.org/packages/vladski/laravel-nova-xtra)

# Laravel Nova Xtra
A Laravel Nova tool for extra features out of the box:
- custom theme
- custom navigation
- custom pages within Nova
- tooltips
- modal window

This is an early stage of the package development. Not ready for production yet.

### Install

```shell script
composer require vladski/laravel-nova-xtra
```
Publish theme_default.css and theme_xtra.css theme css files in /rsources/css/nova-xtra/ directory
```php
php artisan vendor:publish --provider="Vladski\NovaXtra\ToolServiceProvider"
```

### Usage

Register in app/Providers/NovaServiceProvider.php
```php
public function tools()
    {
        return [

            (new \Vladski\NovaXtra\NovaXtra)

                // optionally turn on a theme
                ->theme('xtra')

                // build navigation
                ->addNavigationGroup(
                    'Xtra Menu',
                    '<svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>',
                    true
                )
                ->addNavigationIntroPage('About Xtra', 'intro')
                ->addNavigationLink('Refresh Page', 'javascript: Nxtra.reloadCurrent();', true, [
                    'icon' => '<svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>',
                ])
                ->addNavigationLink('Alert Hello', "javascript: alert('Hello');", true, [
                    'icon' => '<svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>',
                ])
                ->addNavigationPage('Internal Page', 'example', 'App\Http\Controllers\NotExistingPageController@index', true, [
                    'icon' => '<svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>',
                ])

                ->addNavigationGroup(
                    'Nova Routes',
                    '<svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path></svg>',
                    true
                )
                ->addNavigationRoute('Dashboard', 'dashboard.custom', $routeParams = ['name' => 'main'])
                ->addNavigationRoute('Users', 'index', $routeParams = ['resourceName' => 'users'])
            ,
            
            // ....
        ];
    }
```

TODO: 

### Custom Theme

Based on and credits to
https://github.com/gregoriohc/laravel-nova-theme-classify

File **theme_default.css** has no styling just lists all available css selectors you can use to override Nova standard styling.
Use this if you want start from scratch. The **theme_xtra.css** file is a fully working theme.

Make copy of a theme file, name it like theme_mytheme.css and modify it. Switch to it in NovaServiceProvider.php by setting: 
```php
    (new \Vladski\NovaXtra\NovaXtra)
        ->theme('xtra') 
        .....
```

### Custom Navigation

### Custom Internal Pages

### Nxtra JavaScript Object

### Tooltips

Built-in https://atomiks.github.io/tippyjs/

### Modal 

