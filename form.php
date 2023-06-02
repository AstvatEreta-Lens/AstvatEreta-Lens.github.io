<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $subjek = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING);
    $deskripsi = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

    if ($nama && $email && $subjek && $deskripsi) {
        $to = 'ashabuljannah201@gmail.com'; // Ganti dengan alamat email tujuan
        $subject = 'Feedback dari ' . $nama;
        $message = 'Nama: ' . $nama . "\r\n";
        $message .= 'Email: ' . $email . "\r\n";
        $message .= 'Subjek: ' . $subjek . "\r\n";
        $message .= 'Deskripsi: ' . $deskripsi . "\r\n";

        // Mengatur pengaturan SMTP secara dinamis
        ini_set('SMTP', 'ashabuljannah201@gmail.com');
        ini_set('smtp_port', 25);

        $headers = 'From: ' . $email . "\r\n" .
            'Reply-To: ' . $email . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        if (mail($to, $subject, $message, $headers)) {
            echo 'Pesan berhasil dikirim.';
        } else {
            echo 'Terjadi kesalahan saat mengirim pesan.';
        }
    } else {
        echo 'Data tidak valid. Mohon isi formulir dengan benar.';
    }
}
?>

