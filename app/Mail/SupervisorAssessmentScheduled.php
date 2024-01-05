<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SupervisorAssessmentScheduled extends Mailable
{
   use Queueable, SerializesModels;

   protected $assessmentDate;
   protected $supervisorName;
   protected $students;

   /**
    * Create a new message instance.
    */
   public function __construct($assessmentDate, $supervisorName, $students)
   {
       $this->assessmentDate = $assessmentDate;
       $this->supervisorName = $supervisorName;
       $this->students = $students;
   }

   /**
    * Get the message envelope.
    */
   public function envelope(): Envelope
   {
       return new Envelope(
           subject: 'Supervisor Assessment Scheduled',
       );
   }

   /**
    * Get the message content definition.
    */
   public function content(): Content
   {
       return new Content(
           view: 'emails.supervisor_assessment_scheduled',
           data: ['assessmentDate' => $this->assessmentDate, 'supervisorName' => $this->supervisorName, 'students' => $this->students],
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
