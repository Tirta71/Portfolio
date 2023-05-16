<?php
// konfigurasi database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tabel_email";

// membuat koneksi ke database
$conn = mysqli_connect($servername, $username, $password, $dbname);

// memeriksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// memeriksa apakah form telah disubmit
if (isset($_POST['submit'])) {
    $nama = $_POST['name'];
    $email = $_POST['email'];
    $subjek = $_POST['subject'];
    $pesan = $_POST['msg'];

    // menyimpan data ke dalam tabel
    $sql = "INSERT INTO `email_table`(`Nama`, `Email`, `Subject`, `Message`) VALUES ('$nama','$email','$subjek','$pesan')";

    if (mysqli_query($conn, $sql)) {
        echo "Pesan berhasil dikirim!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// menutup koneksi
mysqli_close($conn);
?>
