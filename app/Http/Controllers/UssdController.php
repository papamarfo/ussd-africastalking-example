<?php

namespace App\Http\Controllers;

use Sparors\Ussd\Facades\Ussd;
use App\Http\Ussd\Welcome;

class UssdController extends Controller
{
    public function index()
    {
    	$ussd = Ussd::machine()->setFromRequest([
		    'phone_number',
		    'network' => 'serviceCode',
		    'session_id' => 'sessionId',
		])
		->setInput(substr(request('text'), strrpos(request('text'), '*') + 1))
	    ->setInitialState(Welcome::class)
	    ->setResponse(function(string $message, string $action) {
	    	switch ($action) {
	    		case 'prompt':
	    			return "END $message";
	    			break;
	    		
	    		default:
	    			return "CON $message";
	    			break;
	    	}
		});

	    return $ussd->run();
    }
}