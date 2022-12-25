<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RemindUserMail extends Mailable
{
    use Queueable, SerializesModels;

    private $book_names;

    /**
     * Create a new message instance.
     *
     * @param array $book_names
     * @return void
     */
    public function __construct($book_names)
    {
        $this->book_names = $book_names;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Book Return Date Overdue')
            ->view('mails.user-notify-mail')
            ->with('book_names', $this->book_names);
    }
}
