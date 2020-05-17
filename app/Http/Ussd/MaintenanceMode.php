<?php

namespace App\Http\Ussd;

use App\Http\Ussd\Welcome;
use Sparors\Ussd\State;

class MaintenanceMode extends State
{
	protected $action = self::PROMPT;

    protected function beforeRendering(): void
    {
        $this->menu->text('Service is unavailable');
    }

    protected function afterRendering(string $argument): void
    {
        //
    }
}