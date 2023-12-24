<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class ForgotPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * User Model.
     *
     * @var User
     */
    protected $user;

    /** @var $title */
    protected $title;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user     = $user;
        $this->title    = 'Reset Password Notification - Bandelli Survey';
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $token = DB::table('password_resets')->where('email', $this->user->email)->orderBy('created_at', 'desc')->first();

        return $this
            ->to($this->user->email)
            ->subject($this->title)
            ->view('emails.forgot-password', [
                'url'     => route('password.reset', $token->token)
            ]);
    }
}
