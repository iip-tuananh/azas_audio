<?php

namespace App\Mail;


use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewContact extends Mailable
{

    protected $data;
    protected $config;

    /**
     * @param $data
     * @param $config
     */
    public function __construct($data, $config)
    {
        $this->data = $data;
        $this->config = $config;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $title = 'Có liên hệ mới - KiemToanKTV #';

        return $this->subject($title)->view('site.mails.new-contact', ['data' => $this->data, 'config' => $this->config]);
    }
}
