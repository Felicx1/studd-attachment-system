<?php

namespace App\Console\Commands;

use App\Mail\AssessmentScheduled;
use App\Mail\SupervisorAssessmentScheduled;
use App\Models\Internship;
use App\Models\Supervisor;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendAssessmentEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-assessment-email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
       $internships = Internship::all();
    
       foreach ($internships as $internship) {
           $assessmentDate = $internship->created_at->addWeeks($internship->duration);
    
           if ($assessmentDate->isToday()) {
    
               //Fetch the supervisor details
               $supervisor = Supervisor::find($internship->supervisor_id);
    
               //Fetch the students that the supervisor is going to assess
               $students = Internship::where('supervisor_id', $internship->supervisor_id)->get();
    
               //Send the email to the supervisor
               Mail::to($supervisor->email)->send(new SupervisorAssessmentScheduled($assessmentDate, $supervisor->name, $students));
    
               //Send the email to the student
               Mail::to($internship->user->email)->send(new AssessmentScheduled($assessmentDate, $supervisor->name, $internship->user->username ));
           }
       }
    }
    
}
