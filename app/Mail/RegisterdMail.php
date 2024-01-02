<?php

namespace App\Mail;

use App\Models\Director;
use App\Models\Users;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class RegisterdMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Director Model.
     *
     * @var Director
     */
    protected $director;

    /** @var $title */
    protected $title;
    protected $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($password,Director $director)
    {
        $this->director         = $director;
        $this->password     = $password;
        $this->title        = 'Your Login Credentials - Cinesky';
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        return $this
            ->to($this->director->email)
            ->subject($this->title)
            ->view('emails.login-credential', [
                'password'     => $this->password,
                'director'         => $this->director,
                'url'=>route('login')
            ]);
    }
}
