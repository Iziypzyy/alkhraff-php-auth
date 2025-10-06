<?php
// ... kode PHP lainnya jika ada, pastikan session_start() sudah dipanggil jika Anda memerlukannya

// Contoh mengambil parameter 'halaman' dari URL: index.php?halaman=home
$halaman_aktif = $_GET['halaman'] ?? 'home'; 

echo "<h1>Ini adalah halaman " . htmlspecialchars($halaman_aktif) . "</h1>";

if ($halaman_aktif === 'home') {
    // Tampilkan konten halaman depan
} elseif ($halaman_aktif === 'kontak') {
    // Tampilkan konten kontak
}

// ... sisa kode HTML
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <!-- ... meta tags dan title yang sudah ada ... -->
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alkhraff - Online Shop Fashion & Lifestyle</title>
    <meta name="description" content="Temukan koleksi fashion dan lifestyle terbaru dengan kualitas terbaik dan harga terjangkau.">
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
            </ul>
        </nav>
    </header>

    <main>
        <section id="home">
            <h2>Style Your Life with Alkhraff</h2>
            <p> Where Class Meets Character</p>
            <a href="#products" class="btn btn-primary btn-large">Jelajahi Koleksi</a>
        </section>

        <section id="products">
            <h2>New Arrivals</h2>
                <article class="card card-featured">
                <figure>
                    <img src="img/long sleeve.jpeg" alt="baju" width="250" height="250">
                </figure>
                <h3>Long Sleeve Lucy Black – Distressed Thanksinsomnia</h3>
                <p>Long sleeve regular fit ini menawarkan tampilan bold dengan aksen lubang kecil yang tersebar di bagian depan dan belakang, menciptakan kesan grunge dan street style yang kuat. Dilengkapi dengan desain print menggunakan tinta plastisol yang tahan lama dan tajam, kaos lengan panjang ini dibuat dari bahan Cotton 16s yang tebal dan nyaman untuk penggunaan harian.</p>
                <p>Rp 200.000</p>
            </article>
                <article class="card">
                <figure><img src="img/work jacket.jpeg" alt="work jacket" width="250" height="250"></figure>
                <h3>Memphisorigins - Work Jacket Archipelago Terbaru  (Limited Edition) Jacket Work Memphis - S</h3>
                <p>Work Jacket Archipelago dari Memphisorigins adalah jaket kerja limited edition dengan desain unisex yang bold dan artistic. Terinspirasi dari gerakan desain Memphis Group, jaket ini menampilkan pola geometris yang vibrant dan warna-warna berani khas era 80-an, membuatnya menjadi statement piece yang perfect untuk gaya streetwear baik pria maupun wanita. Dibuat dengan material berkualitas untuk kenyamanan dan daya tahan, jaket ini adalah pilihan ideal untuk menambahkan sentuhan ekspresif dan avant-garde pada koleksi fashion Anda..</p>
                <p>Rp 1.500.000</p>
            </article>
                <article class="card">
                <figure><img src="img/sepatu asics.png" alt="sepatu asics" width="200" height="100"></figure>
                <h3>Asics Unisex Gel Kayano 14</h3>
                <p>Sepatu lari Asics Gel-Kayano 14 pertama kali diluncurkan pada tahun 2008. Siluet berpanelnya menampilkan panel jala dan sol karet tebal untuk sirkulasi udara dan kenyamanan. Varian ini hadir dalam warna abadi 'Black Pure Silver'.</p>
                <p>Rp 2.399.000</p>
            </article>
                <article class="card">
                <figure><img src="img/celana katun.jpg" alt="celana katun" width="250" height="250"></figure>
                
                <h3>Celana panjang Katun Slim Fit</h3>
                <p>Celana panjang 7/8 dari bahan tenunan katun lembut dengan ritsleting dan kancing, saku samping diagonal, saku belakang dengan kancing dan lipatan di bagian depan dan belakang. Slim fit yang mengikuti kontur tubuh dan menciptakan siluet yang pas.</p>
                <p>Rp 399.000</p>
            </article>
        </section>

        <section id="categories">
            <h2>Kategori Produk</h2>
            <ul>
                <li>Pakaian Pria</li>
                <li>Aksesoris</li>
                <li>Sepatu</li>
            </ul>
        </section>

        <section id="about">
            <h2>Tentang Alkhraff</h2>
            <p>Alkhraff adalah destinasi fashion dan lifestyle terpercaya bagi para pria modern yang mencari gaya autentik dan berkelas. Kami menghadirkan koleksi pakaian dan aksesori berkualitas tinggi yang dirancang untuk menonjolkan karakter dan kepercayaan diri dalam setiap kesempatan.

Dari kemeja formal yang elegan hingga outfit kasual yang stylish, setiap produk di Alkhraff dipilih dengan cermat untuk memastikan Anda tampil maksimal dan penuh integritas. Kami bukan sekadar menjual pakaian, tetapi juga gaya hidup yang penuh dengan nilai-nilai kejantanan, ketangguhan, dan keanggunan.

Temukan identitas gaya Anda dan tingkatkan penampilan sehari-hari bersama kami. Alkhraff — Where Style Meets Integrity.</p>
        </section>

        <section id="newsletter">
            <h2>Berlangganan Newsletter</h2>
            <p>Dapatkan update produk terbaru dan penawaran spesial</p>
            <form>
                <input type="email" placeholder="Masukkan email Anda">
                <button type="submit">Berlangganan</button>
            </form>
        </section>
    </main>

    <footer>
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
        
        <p>&copy; 2025 Alkhraff. All rights reserved.</p>
    </footer>
    <script src="script.js"></script>
</body>
</html>
