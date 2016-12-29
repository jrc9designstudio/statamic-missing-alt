<?php

namespace Statamic\Addons\MissingAlt;

use Statamic\API\Nav;
use Statamic\Extend\Listener;

class MissingAltListener extends Listener
{
    public $events = [
        'cp.nav.created' => 'addNavItems'
    ];

    public function addNavItems($nav)
    {
        $store = Nav::item('Alt Tag Audit')->route('missingalt')->icon('eye-with-line');
        $nav->addTo('content', $store);
    }
}
