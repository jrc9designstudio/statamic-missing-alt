<?php

namespace Statamic\Addons\MissingAlt;

use Statamic\Extend\Controller;

class MissingAltController extends Controller
{
	// Initialize the missing alt class
	protected function init()
    {
        $this->missingalt = new MissingAlt;
    }
    
    /**
     * Maps to your route definition in routes.yaml
     *
     * @return Illuminate\Http\Response
     */
    public function index()
    {
    	$assets = $this->missingalt->getImagesMissingAlt();
    	$missing_alt_count = $this->missingalt->getMissingAltCount($assets);
    	$noun = ($missing_alt_count == 1 ? 'image' : 'images');
    	
        return $this->view('index', [
        	'missing_alt_count' => $missing_alt_count,
        	'noun' => $noun,
        	'assets' => $assets
        ]);
    }
}
