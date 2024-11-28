<?php
include '../config/koneksi.php';

// Ambil data dari form
$username = $mysqli->real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['username'], ENT_QUOTES))));
$password = $mysqli->real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['password'], ENT_QUOTES))));
$confirm_password = $mysqli->real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['confirm_password'], ENT_QUOTES))));

// Validasi data
if (empty($username) || empty($password) || empty($confirm_password)) {
    header('location:register_form.php?error=1'); // Redirect jika data tidak valid
    exit();
}

if ($password !== $confirm_password) {
    header('location:register_form.php?error=2'); // Redirect jika password tidak sama
    exit();
}

// Cek apakah username sudah terdaftar
$check_user = $mysqli->query("SELECT * FROM admin WHERE username='$username'");
if ($check_user->num_rows > 0) {
    header('location:register_form.php?error=3'); // Redirect jika username sudah ada
    exit();
}

// Hash password
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

try {
    // Simpan data ke database
    $insert = $mysqli->query("INSERT INTO admin (username, password, level) VALUES ('$username', '$hashed_password', 'user')");

    if ($insert) {
        header('location:index.php?success=1'); // Redirect ke login jika berhasil
    } else {
        header('location:register_form.php?error=4'); // Redirect jika gagal menyimpan
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage(); // Debugging jika ada error
}
?>
