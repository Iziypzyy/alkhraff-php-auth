<?php
// Session tetap dimulai untuk fungsionalitas lain di masa depan
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alkhraff - Online Shop Fashion & Lifestyle</title>
    <meta name="description" content="Temukan koleksi fashion dan lifestyle terbaru dengan kualitas terbaik dan harga terjangkau.">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Alkhraff</h1>
        <nav>
            <ul>
                <li><a href="#home">Beranda</a></li>
                <li><a href="#products">Produk</a></li>
                <li><a href="#categories">Kategori</a></li>
                <li><a href="#about">Tentang Kami</a></li>
                <li><a href="#contact">Kontak</a></li>

                <li>
                    <a href="login.php" class="btn btn-primary">Masuk</a>
                </li>
                </ul>
        </nav>
    </header>

    <main>
        <section id="home" class="hero">
            <h2>Kualitas Terbaik, Harga Terjangkau</h2>
            <p>Koleksi fashion dan lifestyle yang membuatmu tampil percaya diri setiap hari.</p>
            <a href="#products" class="btn btn-large">Lihat Koleksi</a>
        </section>

        <section id="products" class="card">
            <h2>Produk Unggulan</h2>
            <article>
                <h3>Kaos Grafis "Senja"</h3>
                <p>Kaos katun premium dengan desain eksklusif yang nyaman dipakai sepanjang hari.</p>
                <span>Rp 150.000</span>
            </article>
            <article>
                <h3>Celana Chino "Nusantara"</h3>
                <p>Celana chino modern dengan potongan slim-fit, cocok untuk acara kasual maupun semi-formal.</p>
                <span>Rp 250.000</span>
            </article>
            <article>
                <h3>Tas Selempang "Urban"</h3>
                <p>Tas multifungsi dengan bahan tahan air, ideal untuk aktivitas harianmu.</p>
                <span>Rp 180.000</span>
            </article>
        </section>

        <section id="categories" class="card">
            <h2>Kategori Populer</h2>
            <ul>
                <li>Pakaian Pria</li>
                <li>Pakaian Wanita</li>
                <li>Aksesoris</li>
                <li>Tas & Dompet</li>
            </ul>
        </section>
        
        <section id="about" class="card">
            <h2>Tentang Alkhraff</h2>
            <p>Alkhraff lahir dari semangat untuk menyediakan produk fashion berkualitas tinggi yang dapat diakses oleh semua kalangan. Kami percaya bahwa gaya adalah cara untuk mengekspresikan diri, dan kami hadir untuk mendukung setiap ekspresi unik Anda.</p>
        </section>
        
        <section id="newsletter" class="card">
            <h2>Langganan Newsletter</h2>
            <p>Dapatkan info terbaru tentang produk, promo eksklusif, dan penawaran spesial langsung di email Anda.</p>
            <form id="newsletter-form">
                <input type="email" placeholder="Masukkan alamat email Anda" required>
                <button type="submit" class="btn">Langganan</button>
            </form>
        </section>
    </main>

    <footer>
        <div class="footer-content">
            <section>
                <h3>Alkhraff</h3>
                <p>Online shop fashion & lifestyle terpercaya</p>
            </section>
            
            <section>
                <h4>Link Terkait</h4>
                <ul>
                    <li><a href="#terms">Syarat & Ketentuan</a></li>
                    <li><a href="#privacy">Kebijakan Privasi</a></li>
                    <li><a href="#return">Kebijakan Pengembalian</a></li>
                </ul>
            </section>
            
            <section id="contact">
                <h4>Kontak</h4>
                <address>
                    Email: partnership@alkhraff.com<br>
                    Telepon: (0541) 2409 106<br>
                    Alamat: Jl. Kebenaran No. 1, Samarinda
                </address>
            </section>
            
            <section>
                <h4>Referensi Desain</h4>
                <p>Inspirasi desain dari website berikut:</p>
                <ul>
                    <li><a href="https://asics.co.id/" target="_blank">Asics</a></li>
                    <li><a href="https://id.hm.com/" target="_blank">H&M</a></li>
                    <li><a href="https://thanksinsomniastore.com/" target="_blank">Thanksinsomnia</a></li>
                    <li><a href="https://www.poloindonesia.id/" target="_blank">Polo Indonesia</a></li>
                    <li><a href="https://3second.co.id/" target="_blank">3second</a></li>
                </ul>
            </section>
        </div>
        <p class="copyright">&copy; 2025 Alkhraff. Semua Hak Cipta Dilindungi.</p>
    </footer>
    
    <script src="script.js"></script>
</body>
</html>