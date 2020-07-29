<?php

namespace Vladski\NovaXtra\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class IntroPageController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index() {
        return view('nova-xtra::page_intro');
    }

}
