<?php

namespace App\Http\Ussd\Airtime;

use Sparors\Ussd\State;

class GetRecipientNumber extends State
{
    protected function beforeRendering(): void
    {
        $this->menu->text('Airtime Topup')
                   ->lineBreak(1)
                   ->text('Enter recipient number');
    }

    protected function afterRendering(string $argument): void
    {
        # save recipient number
        $this->record->set('recipient_number', $argument);

        # check if input is a phone number and continue
        $this->decision->phoneNumber(GetAmount::class)
                       ->any(GetRecipientNumber::class);
    }
}