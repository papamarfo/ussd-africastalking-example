<?php

namespace App\Http\Controllers;

use Sparors\Ussd\Facades\Ussd;
use App\Http\Ussd\Welcome;

class UssdController extends Controller
{
    public function index()
    {
    	$ussd = Ussd::machine()->set([
		    'phone_number' => request('phoneNumber'),
		    'network' => request('serviceCode'),
		    'session_id' => request('sessionId'),
		    'input' => request('text')
		])
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