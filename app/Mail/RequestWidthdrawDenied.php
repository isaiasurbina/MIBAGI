<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RequestWidthdrawDenied extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $store;
    public $amount;
    public function __construct($store,$amount)
    {
        //
        $this->store = $store;
        $this->amount = $amount;
    }
    public function build()
    {
        return $this->subject('Solicitud de retiro denegada.')->markdown('emails.store.withdraw_request_denied');
    }
}
