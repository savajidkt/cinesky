<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Queue\SerializesModels;

class ForgotPasswordEvent
{
    use  SerializesModels;

    /**
     * User Model
     *
     * @var \App\Models\User
     */
    public $user;

    /**
     * Create a new event instance.
     *
     * @param \App\Models\User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }
}
