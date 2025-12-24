<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Pengajuan;

class KirimFileMail extends Mailable
{
    use Queueable, SerializesModels;

    public $pengajuan;
    public $filePath;

    /**
     * Create a new message instance.
     */
    public function __construct(Pengajuan $pengajuan, string $filePath)
    {
        $this->pengajuan = $pengajuan;
        $this->filePath = $filePath;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Dokumen Pengajuan Anda Telah Siap')
                    ->view('emails.kirim_file')
                    ->attach(storage_path('app/' . $this->filePath));
    }
}
