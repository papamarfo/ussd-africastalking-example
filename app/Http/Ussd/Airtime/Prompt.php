<?php

namespace App\Http\Ussd\Airtime;

use Sparors\Ussd\State;

class Prompt extends State
{
	protected $action = self::PROMPT; # show prompt and terminate process

    protected function beforeRendering(): void
    {
        $this->menu->text('Transaction is been processed. Please wait for prompt to authorize your transaction.');
    }

    protected function afterRendering(string $argument): void
    {
        //
    }
}