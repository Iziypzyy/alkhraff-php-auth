<?php
// Mulai session
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        /* Penyesuaian khusus untuk halaman dashboard */
        :root {
            --sidebar-width: 260px;
        }
        body {
            background-color: #f4f6fa;
            display: flex;
            height: 100vh;
            overflow: hidden;
        }
        body.dark-mode {
            background-color: #181c23;
        }

        /* Sidebar */
        .sidebar {
            width: var(--sidebar-width);
            background: #ffffff;
            height: 100vh;
            position: fixed;
            display: flex;
            flex-direction: column;
            border-right: 1px solid #e9ecef;
            transition: var(--transition);
        }
        body.dark-mode .sidebar {
            background: #23272f;
            border-right-color: #3a414b;
        }
        .sidebar-header {
            padding: 1.5rem;
            text-align: center;
            border-bottom: 1px solid #e9ecef;
        }
        body.dark-mode .sidebar-header { border-bottom-color: #3a414b; }
        .sidebar-header .logo {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary-color);
        }
        .sidebar-nav {
            padding: 1rem;
            flex-grow: 1;
            list-style: none; margin: 0;
        }
        .sidebar-nav a {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 0.8rem 1rem;
            color: #555;
            text-decoration: none;
            border-radius: var(--border-radius);
            margin-bottom: 0.5rem;
            font-weight: 500;
            transition: var(--transition);
        }
        body.dark-mode .sidebar-nav a { color: #c5c8d0; }
        .sidebar-nav a:hover,
        .sidebar-nav a.active {
            background-color: var(--primary-color-light);
            color: var(--primary-color);
        }
        body.dark-mode .sidebar-nav a:hover,
        body.dark-mode .sidebar-nav a.active {
            background-color: #3498db20;
        }
        .sidebar-nav a i { font-size: 1.1rem; width: 20px; text-align: center; }
        .sidebar-footer {
            padding: 1rem;
            border-top: 1px solid #e9ecef;
        }
        body.dark-mode .sidebar-footer { border-top-color: #3a414b; }

        /* Main Content */
        .main-content {
            margin-left: var(--sidebar-width);
            width: calc(100% - var(--sidebar-width));
            height: 100vh;
            overflow-y: auto;
            padding: 2rem;
        }
        .dashboard-header {
            margin-bottom: 2rem;
        }
        .dashboard-header h1 {
            font-size: 2rem; margin: 0;
        }

        /* Widgets/Summary Cards */
        .widgets-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }
        .widget {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            padding: 1.5rem;
        }
        .widget-icon {
            font-size: 2.5rem;
            padding: 1.2rem;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .widget-info h3 { margin: 0 0 0.5rem 0; font-size: 1rem; color: #777; }
        body.dark-mode .widget-info h3 { color: #a0a8b4; }
        .widget-info p { margin: 0; font-size: 1.8rem; font-weight: 700; }
        
        .icon-pesanan { background-color: #e0f7fa; color: #00838f; }
        .icon-pembayaran { background-color: #fff3e0; color: #ff8f00; }
        .icon-poin { background-color: #e8f5e9; color: #2e7d32; }

        /* Order Table */
        .order-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }
        .order-table th, .order-table td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #e9ecef;
        }
        body.dark-mode .order-table th, body.dark-mode .order-table td { border-bottom-color: #3a414b; }
        .order-table th { font-weight: 600; }
        .status {
            padding: 0.25rem 0.75rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.8rem;
        }
        .status-success { background-color: #e8f5e9; color: #2e7d32; }
        .status-pending { background-color: #fff3e0; color: #ff8f00; }
        .status-cancelled { background-color: #ffebee; color: #c62828; }
    </style>
</head>
<body>

    <aside class="sidebar">
        <div class="sidebar-header">
            <div class="logo">Alkhraff</div>
        </div>
        <ul class="sidebar-nav">
            <li><a href="dashboard.php?menu=beranda" class="<?= is_active($menu, 'beranda'); ?>"><i class="fas fa-home"></i> Beranda</a></li>
            <li><a href="dashboard.php?menu=pesanan" class="<?= is_active($menu, 'pesanan'); ?>"><i class="fas fa-box"></i> Riwayat Pesanan</a></li>
            <li><a href="dashboard.php?menu=alamat" class="<?= is_active($menu, 'alamat'); ?>"><i class="fas fa-map-marker-alt"></i> Alamat Saya</a></li>
            <li><a href="dashboard.php?menu=profil" class="<?= is_active($menu, 'profil'); ?>"><i class="fas fa-user"></i> Profil Saya</a></li>
            <li><a href="dashboard.php?menu=pengaturan" class="<?= is_active($menu, 'pengaturan'); ?>"><i class="fas fa-cog"></i> Pengaturan</a></li>
        </ul>
        <div class="sidebar-footer">
            <a href="index.php" class="btn" style="width: 100%; margin-bottom: 0.5rem;">Kembali ke Toko</a>
            <a href="logout.php" class="btn btn-primary" style="width: 100%;">Logout</a>
        </div>
    </aside>

    <main class="main-content">
        <header class="dashboard-header">
            <h1>Halo, <?= $username ?>!</h1>
        </header>

        <div class="content-area">
            <?php
            // Menampilkan konten berdasarkan menu yang dipilih
            switch ($menu) {
                case 'pesanan':
                    echo '
                    <div class="card">
                        <h2>Riwayat Pesanan</h2>
                        <p>Berikut adalah daftar semua pesanan Anda.</p>
                        <table class="order-table">
                            <thead>
                                <tr>
                                    <th>ID Pesanan</th>
                                    <th>Tanggal</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#ALK12345</td>
                                    <td>5 Okt 2025</td>
                                    <td>Rp 400.000</td>
                                    <td><span class="status status-success">Selesai</span></td>
                                    <td><a href="#" class="btn">Detail</a></td>
                                </tr>
                                <tr>
                                    <td>#ALK12333</td>
                                    <td>28 Sep 2025</td>
                                    <td>Rp 180.000</td>
                                    <td><span class="status status-success">Selesai</span></td>
                                    <td><a href="#" class="btn">Detail</a></td>
                                </tr>
                                <tr>
                                    <td>#ALK12310</td>
                                    <td>15 Sep 2025</td>
                                    <td>Rp 250.000</td>
                                    <td><span class="status status-cancelled">Dibatalkan</span></td>
                                    <td><a href="#" class="btn">Detail</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>';
                    break;
                
                case 'alamat':
                    echo '
                    <div class="card">
                        <h2>Alamat Saya</h2>
                        <p>Kelola alamat pengiriman untuk kemudahan berbelanja.</p>
                        <div class="card" style="margin-top: 1rem; border: 2px solid var(--primary-color);">
                           <strong>Rumah</strong><br>
                           ' . $username . '<br>
                           Jl. Kebenaran No. 1, Samarinda, Kalimantan Timur, 75117<br>
                           (0812) 3456-7890
                           <hr style="margin: 1rem 0;">
                           <a href="#" class="btn">Ubah Alamat</a>
                        </div>
                        <button class="btn btn-primary" style="margin-top: 1.5rem;"><i class="fas fa-plus"></i> Tambah Alamat Baru</button>
                    </div>';
                    break;
                
                case 'profil':
                    echo '
                    <div class="card">
                        <h2>Profil Saya</h2>
                        <p>Perbarui informasi akun Anda di sini.</p>
                        <form style="margin-top: 1.5rem;">
                           <div class="form-group"><label>Nama Pengguna:</label><input type="text" value="' . $username . '" disabled></div>
                           <div class="form-group"><label>Email:</label><input type="email" value="user@example.com" disabled></div>
                           <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </form>
                    </div>';
                    break;
                
                case 'pengaturan':
                    echo '
                    <div class="card">
                        <h2>Pengaturan Akun</h2>
                        <p>Kelola pengaturan keamanan dan notifikasi Anda.</p>
                         <a href="#" class="btn">Ubah Password</a>
                    </div>';
                    break;

                case 'beranda':
                default:
                    echo '
                    <div class="widgets-grid">
                        <div class="card widget">
                            <div class="widget-icon icon-pesanan"><i class="fas fa-box"></i></div>
                            <div class="widget-info">
                                <h3>Total Pesanan</h3>
                                <p>3</p>
                            </div>
                        </div>
                        <div class="card widget">
                            <div class="widget-icon icon-pembayaran"><i class="fas fa-hourglass-half"></i></div>
                            <div class="widget-info">
                                <h3>Menunggu Pembayaran</h3>
                                <p>0</p>
                            </div>
                        </div>
                        <div class="card widget">
                            <div class="widget-icon icon-poin"><i class="fas fa-star"></i></div>
                            <div class="widget-info">
                                <h3>Poin Saya</h3>
                                <p>1,250</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <h2>Pesanan Terbaru</h2>
                        <p>Belum ada pesanan baru. <a href="index.php#products">Ayo mulai belanja!</a></p>
                    </div>';
                    break;
            }
            ?>
        </div>
    </main>
    
    <script src="script.js"></script>
</body>
</html>
