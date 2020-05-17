<?php

namespace App\Http\Ussd\Airtime;

use Sparors\Ussd\State;

class Confirmation extends State
{
    protected function beforeRendering(): void
    {
        # get recipient number
        $recipient_number = $this->record->get('recipient_number');
        # get amount
        $amount = $this->record->get('amount');

        $this->menu->text('Airtime Topup Confirmation')
                   ->lineBreak(1)
                   ->text('Recipient Phone: ' . $recipient_number)
                   ->lineBreak(1)
                   ->text('Amount: GHS' . $amount)
                   ->lineBreak(2)
                   ->listing(['Yes', 'No']);
    }

    protected function afterRendering(string $argument): void
    {
        $this->decision->equal('1', Prompt::class)
                       ->equal('2', Cancel::class)
                       ->any(Confirmation::class);
    }
}