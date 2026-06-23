<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:40'],
            'company' => ['nullable', 'string', 'max:120'],
            'message' => ['required', 'string', 'max:5000'],
        ]);

        $message = ContactMessage::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone' => $data['phone'] ?? null,
            'company' => $data['company'] ?? null,
            'message' => $data['message'],
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        $recipients = collect(explode(',', cms_setting('contact_recipient_emails', cms_setting('contact_email', 'info@silhamconsulting.co.zm'))))
            ->map(fn (string $email) => trim($email))
            ->filter(fn (string $email) => $email !== '');

        if ($recipients->isNotEmpty()) {
            $subject = 'New contact enquiry from ' . $message->first_name . ' ' . $message->last_name;
            $body = "Name: {$message->first_name} {$message->last_name}\nEmail: {$message->email}\nPhone: {$message->phone}\nCompany: {$message->company}\n\nMessage:\n{$message->message}";

            try {
                Mail::raw($body, function ($mail) use ($subject, $recipients) {
                    $mail->to($recipients->toArray());
                    $mail->subject($subject);
                });
            } catch (\Throwable $exception) {
                report($exception);
            }
        }

        return back()->with('status', 'Thank you for your message. We will get in touch shortly.');
    }
}
