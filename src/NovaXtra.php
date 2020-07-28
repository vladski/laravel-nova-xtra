<?php

namespace Vladski\NovaXtra;

use Laravel\Nova\Nova;
use Laravel\Nova\Tool;

class NovaXtra extends Tool
{
    private static $version = '1.0.1';

    public $navigation = [];
    public $groupItemKeys = [];

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
        // delete empty groups
        foreach ($this->groupItemKeys as $groupKey => $itemKeys) {
            $this->navigation[$groupKey]['count'] = count($itemKeys);
        }
        return view('nova-xtra::navigation',[
            'items' => $this->navigation,
        ]);
        //return null;
    }

    public static function version() {
        return self::$version;
    }

    public function addNavigationGroup($label, $icon = '', $collapsible = false, $collapsed = false) {
        $this->navigation[] = [
            'type' => 'group',
            'label' => $label ?? 'Group',
            'icon' => $icon ?? null,
            'collapsible' => !empty($collapsible),
            'collapsed' => !empty($collapsed),
            'count' => 0, // number of items in group is populated on rendering
        ];
        $this->groupItemKeys[array_key_last($this->navigation)] = []; // start collecting group items keys
        return $this;
    }

    public function addNavigationPage($label, $slug, $controllerAction, $canSee = true, $options = []) {
        if (!$this->canSeeInNavigation($canSee)) return $this;
        $this->navigation[] = [
            'type' => 'page',
            'label' => $label ?? 'Page',
            'slug' => $slug ?? '',
            'controller' => $controllerAction ?? '',
            'icon' => $options['icon'] ?? '',
        ];
        // register link in group
        if ($this->groupItemKeys) $this->groupItemKeys[array_key_last($this->groupItemKeys)][] = array_key_last($this->navigation);
        return $this;
    }

    public function addNavigationIntroPage($label = 'About Nova Xtra', $slug = 'intro', $canSee = true, $options = []) {
        return $this->addNavigationPage($label, $slug, 'Vladski\NovaXtra\Http\Controllers\IntroPageController@index', $canSee, $options);
    }

    public function addNavigationLink($label, $href, $canSee = true, $options = []) {
        if (!$this->canSeeInNavigation($canSee)) return $this;
        $this->navigation[] = [
            'type' => 'link',
            'label' => $label ?? 'Link',
            'href' => $href ?? '#',
            'icon' => $options['icon'] ?? '',
        ];
        // register link in group
        if ($this->groupItemKeys) $this->groupItemKeys[array_key_last($this->groupItemKeys)][] = array_key_last($this->navigation);
        return $this;
    }

    public function addNavigationRoute($label, $routeName, $routeParams = [], $canSee = true, $options = []) {
        if (!$this->canSeeInNavigation($canSee)) return $this;
        $this->navigation[] = [
            'type' => 'route',
            'label' => $label ?? 'Route',
            'routeName' => $routeName ?? '',
            'routeParams' => $routeParams ?? [],
            'icon' => $options['icon'] ?? '',
        ];
        // register link in group
        if ($this->groupItemKeys) $this->groupItemKeys[array_key_last($this->groupItemKeys)][] = array_key_last($this->navigation);
        return $this;
    }

    public function addNavigationResourceGroup($resourceGroup, $label = '', $icon = '', $options = []) {
        $request = request();
        $navigation = Nova::groupedResourcesForNavigation($request);
        if (!$navigation->has($resourceGroup)) return $this;

        if ($label) $this->addNavigationGroup($label, $icon, $options);

        foreach($navigation->get($resourceGroup) as $resource) {
            $this->addNavigationRoute($resource::label(), 'index', $routeParams = ['resourceName' => $resource::uriKey()]);
        }
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
