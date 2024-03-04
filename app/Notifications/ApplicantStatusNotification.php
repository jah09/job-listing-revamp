<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ApplicantStatusNotification extends Notification
{
    use Queueable;
     protected $applicantMail;
    // protected $jobListing;
    protected $jobtitle;
    protected $company;
    protected $aplicantStatus;


    /**
     * Create a new notification instance.
     */
    public function __construct($applicantMail, $aplicantStatus,$jobtitle,$company)
    {
        //
        $this->applicantMail = $applicantMail;
        $this->jobtitle = $jobtitle;
        $this->company = $company;
        $this->aplicantStatus = $aplicantStatus;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Application Status')
            ->greeting('Hello ' . $this->applicantMail . '.')
            ->line(
                'Your application status to your job application on ' . $this->company .
                    '. with a job title of ' . $this->jobtitle .
                    'has been updated to ' . $this->aplicantStatus . '.'
            );
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
