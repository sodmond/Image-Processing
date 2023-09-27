<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendPasswordChange extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $adminType;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->adminType = (in_array($user->role, [1,2,3])) ? 'Admin Member' : 'Reseller';
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.password_change')
                    ->subject('PASSWORD CHANGE ALERT');
    }
}
