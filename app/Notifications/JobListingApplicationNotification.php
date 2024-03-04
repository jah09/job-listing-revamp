<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class JobListingApplicationNotification extends Notification
{
    use Queueable;
    protected $applicantMail;
    protected $jobListing;

    /**
     * Create a new notification instance.
     */
    public function __construct($applicantMail,$jobListing)
    {
        //
        $this->applicantMail = $applicantMail;
          $this->jobListing = $jobListing;
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
        ->subject('Job Listing Applications')
        ->greeting('Hello ' . $this->jobListing->user->email . '.')
        ->line($this->applicantMail . ' has sent an application to your job listing ' . $this->jobListing->job_title . '.');

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
