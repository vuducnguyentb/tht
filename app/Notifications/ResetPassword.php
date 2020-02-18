<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Http\Requests\ContactFormRequest;

class ResetPassword extends Notification
{
//    use Queueable;
    public $token;

    /**
     * Username for user.
     *
     * @var string
     */

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
//    public function toMail($notifiable)
//    {
//        return (new MailMessage)
//                    ->line('The introduction to the notification.')
//                    ->action('Notification Action', url('/'))
//                    ->line('Thank you for using our application!');
//    }

    public function toMail($notifiable)
    {
//        return (new MailMessage)
//            ->line('You are receiving this email because we received a password reset request for your account.')
//            ->action('Reset Password', url('password/reset', $this->token))
//            ->line('If you did not request a password reset, no further action is required.');
        return (new MailMessage)

            ->greeting("Chào Bạn.")
            ->salutation(" -- Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi -THT --  ")
            ->from('son.tran@tht-vietnam.com.vn', 'THT')
            ->subject(trans('Cập nhập mật khẩu mới!'))
            ->line(trans('Bạn đang nhận được email này vì chúng tôi đã nhận được yêu cầu đặt lại mật khẩu cho tài khoản của bạn.'))
            ->action(trans('Cập nhập mật khẩu mới!'), url('password/reset', $this->token))
            ->line(trans('Nếu bạn không yêu cầu đặt lại mật khẩu, không cần thực hiện thêm hành động nào.
'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
