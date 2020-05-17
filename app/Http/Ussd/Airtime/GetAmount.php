<?php

namespace App\Http\Ussd\Airtime;

use Sparors\Ussd\State;

class GetAmount extends State
{
    protected function beforeRendering(): void
    {
        $this->menu->text('Airtime Topup')
                   ->lineBreak(1)
                   ->text('Enter amount');
    }

    protected function afterRendering(string $argument): void
    {
        # save amount
        $this->record->set('amount', number_format($argument, 2));

    	# check if input is a number and continue
        $this->decision->numeric(Confirmation::class)
        			   ->any(GetAmount::class);
    }
}