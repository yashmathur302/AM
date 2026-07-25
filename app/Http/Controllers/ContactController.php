<?php

namespace App\Http\Controllers;

use App\Mail\NewContactLeadNotification;
use App\Models\ContactLead;
use App\Models\Page;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        $seo = Page::seo('contact');

        return view('pages.contact', [
            'seoTitle' => $seo['title'],
            'seoDescription' => $seo['description'],
            'seoKeyword' => $seo['keyword'],
            'seoImage' => $seo['image'],
            'pageClass' => 'page-contact',
        ]);
    }

    public function store(ContactRequest $request)
    {
        $lead = ContactLead::create($request->safe()->only([
            'name', 'email', 'phone', 'company', 'service_interest', 'message',
        ]));

        $lead->forceFill([
            'ip_address' => $request->ip(),
            'user_agent' => substr((string) $request->userAgent(), 0, 255),
        ])->save();

        if ($adminAddress = config('mail.admin_address')) {
            Mail::to($adminAddress)->queue(new NewContactLeadNotification($lead));
        }

        return redirect()->route('contact.thanks');
    }

    public function thanks()
    {
        return view('pages.contact-thanks', [
            'seoTitle' => 'Thank You',
            'seoDescription' => 'Thank you for contacting us. Our team will be in touch shortly.',
            'seoNoindex' => true,
            'pageClass' => 'page-contact-thanks',
        ]);
    }
}
