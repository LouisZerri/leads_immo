<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class LeadMagnetMail extends Mailable
{
    use Queueable, SerializesModels;

    private const MAGNETS = [
        'P1' => [
            'subject' => 'Votre guide : 7 erreurs qui font perdre votre caution',
            'file' => 'lead-magnets/guide-7-erreurs-caution.pdf',
            'filename' => '7-erreurs-caution-GESTIMMO.pdf',
        ],
        'P2' => [
            'subject' => 'Votre modèle de lettre de mise en demeure',
            'file' => 'lead-magnets/modele-mise-en-demeure.docx',
            'filename' => 'Mise-en-demeure-proprietaire-GESTIMMO.docx',
        ],
    ];

    public function __construct(
        public string $pageSource,
    ) {}

    public function envelope(): Envelope
    {
        $magnet = self::MAGNETS[$this->pageSource] ?? null;

        return new Envelope(
            subject: $magnet['subject'] ?? 'Votre document GEST\'IMMO',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.lead-magnet',
        );
    }

    public function attachments(): array
    {
        $magnet = self::MAGNETS[$this->pageSource] ?? null;
        if (!$magnet) return [];

        $filePath = storage_path('app/public/' . $magnet['file']);

        if (!file_exists($filePath)) return [];

        return [
            Attachment::fromPath($filePath)->as($magnet['filename']),
        ];
    }
}
