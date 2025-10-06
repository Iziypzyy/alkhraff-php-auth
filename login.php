<?php
// Mulai session
session_start();

// Data otentikasi sederhana
$valid_username = 'user';
$valid_password = 'password123';

// Redirect jika user sudah login
if (isset($_SESSION['username'])) {
    header('Location: dashboard.php');
    exit;
}

$error_message = '';

// Proses form jika disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username === $valid_username && $password === $valid_password) {
        $_SESSION['username'] = $username;
        header('Location: dashboard.php');
        exit;
    } else {
        $error_message = 'Username atau password salah!';
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Alkhraff</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Style khusus untuk halaman login agar lebih terpusat */
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f4f6fa;
        }
        .login-wrapper {
            width: 100%;
            max-width: 400px; /* Lebar maksimum form */
            padding: 0 var(--spacing-md);
        }
        .login-card {
            width: 100%;
        }
        .form-group {
            margin-bottom: var(--spacing-sm);
        }
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }
        .form-group input {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid #ddd;
            border-radius: var(--border-radius);
            box-sizing: border-box; /* Pastikan padding tidak menambah lebar */
            transition: var(--transition);
        }
        .form-group input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px var(--primary-color-light);
        }
        .error-message {
            background-color: #f8d7da;
            color: #721c24;
            padding: var(--spacing-sm);
            border-radius: var(--border-radius);
            margin-bottom: var(--spacing-md);
            text-align: center;
        }
        .site-link {
            text-align: center;
            margin-top: var(--spacing-md);
        }
        .site-link a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
        }
    </style>
</head>
<body class="login-page">

    <div class="login-wrapper">
        <h1 style="text-align: center; color: var(--primary-color);">Alkhraff</h1>
        
        <div class="card login-card">
            <h2 style="text-align: center; margin-bottom: var(--spacing-md);">Masuk ke Akun Anda</h2>

            <?php if ($error_message): ?>
                <div class="error-message"><?php echo $error_message; ?></div>
            <?php endif; ?>
            
            <form action="login.php" method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary" style="width: 100%; margin-top: 0.5rem;">Login</button>
            </form>
        </div>

        <div class="site-link">
            <p>Belum punya akun? <a href="#">Daftar</a></p>
            <a href="index.php">← Kembali ke Toko</a>
        </div>
    </div>
    
</body>
</html>