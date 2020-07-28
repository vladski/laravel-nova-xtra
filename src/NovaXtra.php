<?php

namespace Vladski\NovaXtra;

use Laravel\Nova\Nova;
use Laravel\Nova\Tool;

class NovaXtra extends Tool
{
    public $navigation = [];
    private static $version = '1.0.1';

    /**
     * Perform any tasks that need to happen when the tool is booted.
     *
     * @return void
     */
    public function boot()
    {
        Nova::script('nova-xtra', __DIR__.'/../dist/js/tool.js');
        Nova::style('nova-xtra', __DIR__.'/../dist/css/tool.css');
    }

    /**
     * Build the view that renders the navigation links for the tool.
     *
     * @return \Illuminate\View\View
     */
    public function renderNavigation()
    {
        return view('nova-xtra::navigation',[
            'items' => $this->navigation,
        ]);
        //return null;
    }

    public static function version() {
        return self::$version;
    }

    public function addNavigationGroup($name, $icon = '', $canSee = null) {
        if (!$this->canSeeInNavigation($canSee)) return $this;
        $this->navigation[] = [
            'type' => 'group',
            'name' => $name ?? 'Group',
            'icon' => $icon ?? null,
        ];
        return $this;
    }

    public function addNavigationPage($name, $slug, $controllerAction, $canSee = null) {
        if (!$this->canSeeInNavigation($canSee)) return $this;
        $this->navigation[] = [
            'type' => 'page',
            'name' => $name ?? 'Page',
            'slug' => $slug ?? '',
            'controller' => $controllerAction ?? '',
        ];
        return $this;
    }

    public function addNavigationIntroPage($name = 'Xtra Intro', $slug = 'xtraintro', $canSee = null) {
        return $this->addNavigationPage($name, $slug, 'Vladski\NovaXtra\Http\Controllers\IntroPageController@index', $canSee);
    }

    public function addNavigationLink($name, $href, $canSee = null) {
        if (!$this->canSeeInNavigation($canSee)) return $this;
        $this->navigation[] = [
            'type' => 'link',
            'name' => $name ?? 'Link',
            'href' => $href ?? '#',
        ];
        return $this;
    }

    public function addNavigationRoute($name, $routeName, $routeParams = [], $canSee = null) {
        if (!$this->canSeeInNavigation($canSee)) return $this;
        $this->navigation[] = [
            'type' => 'route',
            'name' => $name ?? 'Route',
            'routeName' => $routeName ?? '',
            'routeParams' => $routeParams ?? [],
        ];
        return $this;
    }

    private function canSeeInNavigation($canSee) {
        if (isset($canSee)) {
            if (is_bool($canSee)) return $canSee;
            elseif (is_callable($canSee)) return call_user_func($canSee);
            else return request()->user()->can($canSee);
        }
        return true;
    }
}
