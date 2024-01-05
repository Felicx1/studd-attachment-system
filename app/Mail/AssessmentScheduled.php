<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AssessmentScheduled extends Mailable
{
    use Queueable, SerializesModels;

    protected $assessmentDate;
    protected $supervisorName;
    protected $studentName;




    /**
     * Create a new message instance.
     */
    public function __construct($assessmentDate, $supervisorName, $studentName)
    {
        $this->assessmentDate = $assessmentDate;
        $this->supervisorName = $supervisorName;
        $this->studentName = $studentName;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Assessment Scheduled',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.assessment_scheduled',
            data: ['assessmentDate' => $this->assessmentDate, 'supervisorName' => $this->supervisorName, 'studentName' => $this->studentName],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
