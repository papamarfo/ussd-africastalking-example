<?php

namespace App\Http\Ussd\Airtime;

use Sparors\Ussd\State;

class Cancel extends State
{
	protected $action = self::PROMPT; # show prompt and terminate process

    protected function beforeRendering(): void
    {
        $this->menu->text('Process cancelled. Thank you for using Laravel Ussd :)');
    }

    protected function afterRendering(string $argument): void
    {
        //
    }
}