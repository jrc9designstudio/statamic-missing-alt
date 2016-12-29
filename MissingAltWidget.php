<?php

namespace Statamic\Addons\MissingAlt;

use Statamic\Extend\Widget;

class MissingAltWidget extends Widget
{
	// Initialize the missing alt class
	protected function init()
    {
        $this->missingalt = new MissingAlt;
    }
	
    /**
     * The HTML that should be shown in the widget
     *
     * @return string
     */
    public function html()
    {
    	if ($this->cache->exists('missing_alt_count'))
    	{
    		$missing_alt_count = $this->cache->get('missing_alt_count');
    	}
    	else
    	{
    		$assets = $this->missingalt->getImagesMissingAlt();
	    	$missing_alt_count = $this->missingalt->getMissingAltCount($assets);
	    	$this->cache->put('missing_alt_count', $missing_alt_count);
	    }

	    $noun = ($missing_alt_count == 1 ? 'image' : 'images');
    	
        return $this->view('widget', compact('missing_alt_count', 'noun'))->render();
    }
}
