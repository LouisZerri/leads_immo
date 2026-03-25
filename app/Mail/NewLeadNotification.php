<?php

namespace App\Mail;

use App\Models\Lead;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewLeadNotification extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public Lead $lead,
    ) {}

    public function envelope(): Envelope
    {
        $pageLabels = [
            'P1' => 'État des lieux',
            'P2' => 'Litige EDL',
            'P3' => 'Investissement',
            'P4' => 'Défiscalisation',
        ];

        $label = $pageLabels[$this->lead->page_source] ?? $this->lead->page_source;

        return new Envelope(
            subject: "Nouveau lead {$label} — {$this->lead->prenom}",
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.new-lead',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
