<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class HistoryStudent extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    private $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject('Relatório Estudante');
        $this->to('lizandrosantos@live.com',  'Lizandro Kenedy');
        $this->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));

        return $this->view('tenants.students.mail-history', ['data' => $this->data])->attachFromStorage('/avaliacao.pdf');
    }
}
