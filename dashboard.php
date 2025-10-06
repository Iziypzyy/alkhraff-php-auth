<?php
// Mulai session
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    // Jika belum, redirect ke halaman login
    header('Location: login.php');
    exit;
}

// Ambil username dari session dan beri kapital pada huruf pertama
$username = htmlspecialchars(ucfirst($_SESSION['username']));

// Tentukan menu yang aktif dari query string, defaultnya 'beranda'
$menu = $_GET['menu'] ?? 'beranda';

// Fungsi untuk mengecek apakah sebuah menu sedang aktif
function is_active($current_menu, $menu_name) {
    return $current_menu === $menu_name ? 'active' : '';
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Alkhraff</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Penyesuaian khusus untuk halaman dashboard */
        :root {
            --sidebar-width: 250px;
            --header-height: 70px;
        }

        body {
            background-color: #f4f6fa; /* Warna latar belakang dashboard yang lebih cerah */
            display: flex;
            height: 100vh;
            overflow: hidden;
        }
        
        body.dark-mode {
            background-color: #181c23;
        }

        .sidebar {
            width: var(--sidebar-width);
            background: #ffffff;
            padding: var(--spacing-md);
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            flex-direction: column;
            border-right: 1px solid #e9ecef;
            transition: var(--transition);
        }
        
        body.dark-mode .sidebar {
            background: #23272f;
            border-right: 1px solid #3a414b;
        }

        .sidebar .logo {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: var(--spacing-lg);
            text-align: center;
            color: var(--primary-color);
        }
        
        .sidebar-nav {
            list-style: none;
            padding: 0;
            margin: 0;
            flex-grow: 1;
        }

        .sidebar-nav a {
            display: block;
            padding: 1rem 1.2rem;
            color: #555;
            text-decoration: none;
            border-radius: var(--border-radius);
            margin-bottom: var(--spacing-xs);
            font-weight: 500;
            transition: var(--transition);
        }
        
        body.dark-mode .sidebar-nav a {
            color: #c5c8d0;
        }

        .sidebar-nav a:hover,
        .sidebar-nav a.active {
            background-color: var(--primary-color-light);
            color: var(--primary-color);
            transform: translateX(5px);
        }
        
        body.dark-mode .sidebar-nav a:hover,
        body.dark-mode .sidebar-nav a.active {
            background-color: #3498db20;
            color: #3498db;
        }
        
        .sidebar .logout-link {
            margin-top: auto;
        }

        .main-content {
            margin-left: var(--sidebar-width);
            width: calc(100% - var(--sidebar-width));
            height: 100vh;
            overflow-y: auto;
            padding: var(--spacing-lg);
        }

        .dashboard-header {
            margin-bottom: var(--spacing-lg);
        }

        .dashboard-header h1 {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }
        
        .dashboard-header p {
            color: #777;
            font-size: 1.1rem;
        }
        
        body.dark-mode .dashboard-header p {
            color: #a0a8b4;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            :root { --sidebar-width: 0; }
            .main-content { margin-left: 0; width: 100%; }
            .sidebar { transform: translateX(-100%); /* Sembunyikan sidebar di mobile */ }
            /* Anda bisa menambahkan tombol untuk toggle sidebar di sini jika perlu */
        }

    </style>
</head>
<body>

    <aside class="sidebar">
        <div class="logo">Alkhraff</div>
        <nav>
            <ul class="sidebar-nav">
                <li><a href="dashboard.php?menu=beranda" class="<?= is_active($menu, 'beranda'); ?>">Beranda</a></li>
                <li><a href="dashboard.php?menu=profil" class="<?= is_active($menu, 'profil'); ?>">Profil Saya</a></li>
                <li><a href="dashboard.php?menu=pesanan" class="<?= is_active($menu, 'pesanan'); ?>">Pesanan</a></li>
                <li><a href="dashboard.php?menu=pengaturan" class="<?= is_active($menu, 'pengaturan'); ?>">Pengaturan</a></li>
                <li><a href="index.php">Kembali ke Situs</a></li>
            </ul>
        </nav>
        <div class="logout-link">
             <a href="logout.php" class="btn btn-primary" style="width: 100%;">Logout</a>
        </div>
    </aside>

    <main class="main-content">
        <header class="dashboard-header">
            <h1>Selamat Datang Kembali, <?= $username ?>!</h1>
            <p>Ini adalah pusat kendali untuk akun Anda.</p>
        </header>

        <div class="content-area">
            <?php
            // Menampilkan konten berdasarkan menu yang dipilih
            switch ($menu) {
                case 'profil':
                    echo '
                    <div class="card">
                        <h2>Profil Saya</h2>
                        <p>Di sini Anda dapat melihat dan mengelola informasi profil Anda.</p>
                        <ul>
                            <li><strong>Nama Pengguna:</strong> ' . $username . '</li>
                            <li><strong>Email:</strong> user@example.com (contoh)</li>
                            <li><strong>Tanggal Bergabung:</strong> 06 Oktober 2025 (contoh)</li>
                        </ul>
                    </div>';
                    break;
                
                case 'pesanan':
                     echo '
                    <div class="card">
                        <h2>Riwayat Pesanan</h2>
                        <p>Belum ada riwayat pesanan yang tersedia.</p>
                        <a href="index.php#products" class="btn">Mulai Belanja</a>
                    </div>';
                    break;

                case 'pengaturan':
                    echo '
                    <div class="card">
                        <h2>Pengaturan Akun</h2>
                        <p>Kelola preferensi akun Anda di halaman ini.</p>
                        <p>Opsi untuk mengganti kata sandi atau mengatur notifikasi bisa ditambahkan di sini.</p>
                    </div>';
                    break;

                case 'beranda':
                default:
                    echo '
                    <div class="card">
                        <h2>Ringkasan Akun</h2>
                        <p>Ini adalah halaman utama dashboard Anda. Gunakan navigasi di samping untuk menjelajahi fitur lainnya.</p>
                    </div>
                    <div class="card">
                        <h3>Tips Penggunaan</h3>
                        <p>Anda dapat kembali ke halaman utama toko kapan saja dengan mengklik "Kembali ke Situs" pada menu navigasi.</p>
                    </div>';
                    break;
            }
            ?>
        </div>
    </main>

    <script src="script.js"></script>
</body>
</html>