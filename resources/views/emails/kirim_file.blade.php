<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dokumen Pengajuan</title>
</head>
<body>
    <div style="font-family: Arial, sans-serif; line-height:1.6; color:#333;">
        <h2>Halo {{ $pengajuan->data['nama'] ?? 'Pemohon' }},</h2>

        <p>Dokumen untuk pengajuan layanan <strong>{{ $pengajuan->layanan->nama }}</strong> Anda telah siap.</p>

        <p>Silakan unduh dokumen terlampir.</p>

        <p>Terima kasih telah menggunakan layanan kami.</p>

        <br>
        <p>Salam,<br>Tim Operator PTSP</p>
    </div>
</body>
</html>
