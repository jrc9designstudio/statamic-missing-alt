<?php

namespace Statamic\Addons\MissingAlt;

use Statamic\API\Asset;
use Statamic\Extend\Addon;

class MissingAlt extends Addon
{    
	public function getImagesMissingAlt()
	{
		$assets = Asset::all()->toArray();
    		
    	foreach ($assets as $key => $asset) {
            if($asset['is_image'] && !empty($asset['alt'])) {
                unset($assets[$key]);
		    }
		}
		
		return $assets;
	}
	
    public function getMissingAltCount($assets)
    {	
    	return sizeof($assets);
    }
}