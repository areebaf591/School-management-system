<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserApprovedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $role;

    public function __construct($user, $role)
    {
        $this->user = $user;
        $this->role = $role;
    }

    public function build()
{
    return $this->subject('Your account is approved')
                ->view('emails.user-approved'); // 👈 yahi path reference
}

}
