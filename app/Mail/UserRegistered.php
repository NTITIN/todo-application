<?php

// app/Mail/UserRegistered.php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\User;

class UserRegistered extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function build()
    {
        $url = url('admin/register'.$this->user->email_verification_token);
        return $this->view('emails.user_registered')
                    ->with([
                        'name' => $this->user->name,
                        'url' => $url,
                    ]);
    }
}
