<?php
// Mulai session
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    // Jika belum, redirect ke halaman login
    header('Location: login.php');
    exit;
}

// Ambil username dari session
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard | Alkhraff</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        header { background-color: #333; color: white; padding: 10px 20px; display: flex; justify-content: space-between; align-items: center; }
        header a { color: #f9f9f9; text-decoration: none; padding: 8px 15px; border-radius: 4px; background-color: #d9534f; }
        header a:hover { background-color: #c9302c; }
        .content { margin-top: 20px; }
        .welcome { font-size: 1.5em; color: #007bff; }
    </style>
</head>
<body>

<header>
    <h1>Dashboard</h1>
    <a href="logout.php">Logout</a>
</header>

<div class="content">
    <p class="welcome">Selamat datang, **<?php echo htmlspecialchars($username); ?>**!</p>
    
    <hr>
    
    <h3>Fitur Dashboard Lainnya</h3>
    <p>Ini adalah halaman utama setelah Anda berhasil login. Di sini Anda bisa menambahkan konten lanjutan dari proyek Alkhraff Anda.</p>
    
    <h4>Contoh Penggunaan Query String ($_GET)</h4>
    <?php
    // Ambil parameter 'menu' dari URL (misalnya: dashboard.php?menu=profil)
    $menu = $_GET['menu'] ?? 'utama'; // Default: utama
    
    echo "<p>Menu yang sedang aktif: <strong>" . htmlspecialchars($menu) . "</strong></p>";
    ?>
    
    <ul>
        <li><a href="dashboard.php?menu=utama">Menu Utama</a></li>
        <li><a href="dashboard.php?menu=profil">Profil Saya</a></li>
        <li><a href="dashboard.php?menu=pengaturan">Pengaturan</a></li>
    </ul>
    
</div>

</body>
</html>