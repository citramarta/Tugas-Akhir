<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cimyww Bakery</title>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;700&family=Comic+Neue:wght@300;400;700&family=Pacifico&family=Quicksand:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body> 
    <!-- Bagian Header -->
    <header>
        <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="#menu">Menu</a> <!-- Scroll otomatis ke menu -->
            <a href="review.php">Review</a>
            <a href="https://wa.me/62895383330084" target="_blank">Kontak</a>
            <a href="lokasi.php">Lokasi</a>
        </nav>
    </header>

    <!-- Bagian Hero -->
    <div class="hero">
    <h1>Welcome to Cimyww Bakery</h1>
    </div>

    <!-- Bagian Menu -->
    <section id="menu" class="menu">
        <h2>Menu Cimyww Bakery</h2>
        <div class="menu-container">
            <?php
                function displayProduct($produk) {
                    foreach ($produk as $item) {
                        echo '<div class="menu-item">';
                        echo '<img src="' . $item['image'] . '" alt="' . $item['name'] . '">';
                        echo '<h3>' . $item['name'] . '</h3>';
                        echo '<p>Harga: Rp. ' . number_format($item['price'], 0, ',', '.') . '</p>';
                        echo '<a href="order.php?product=' . urlencode($item['name']) . '&price=' . $item['price'] . '" class="button">Pesan</a>';
                        echo '</div>';
                    }
                }

                // Data produk pakai array
                $produk = [
                    ["name" => "Tartt", "image" => "images/kueultah.jpg", "price" => 100000],
                    ["name" => "Brownies", "image" => "images/browniess.jpg", "price" => 75000],
                    ["name" => "Donat", "image" => "images/donat.jpg", "price" => 65000],
                    ["name" => "CupCake", "image" => "images/cupcake.jpg", "price" => 65000],
                    ["name" => "Cromboloni", "image" => "images/cromboloni.jpg", "price" => 85000],
                    ["name" => "CrepeCake", "image" => "images/crepecake.jpg", "price" => 75000],
                    ["name" => "Coffee Buns", "image" => "images/coffee buns.jpg", "price" => 80000],
                    ["name" => "RotiManiz", "image" => "images/roti maniz.jpg", "price" => 50000],
                    ["name" => "Puding", "image" => "images/puding.jpg", "price" => 65000],
                    ["name" => "Pie Fruits", "image" => "images/pie_fruits.jpg", "price" => 70000],
                    ["name" => "Cookies", "image" => "images/cookies.jpg", "price" => 60000],
                    ["name" => "Banana Bread Roll", "image" => "images/banana.jpg", "price" => 80000]
                ];

                // fungsi untuk menampilkan produk
                displayProduct($produk);
            ?>
        </div>
    </section>
    <style>
    html {
        scroll-behavior: smooth;
    }
    </style>

    <!-- supaya bisa otomatis langsung scroll ke bawah bagian menu -->
    <script>
        document.querySelector('a[href="#menu"]').addEventListener('click', function(event) {
            event.preventDefault(); // Mencegah perilaku default
            document.querySelector('#menu').scrollIntoView({
                behavior: 'smooth' // Scroll dengan animasi
            });
        });
    </script>


    <!-- Bagian Footer -->
    <footer class="footer">
        <div class="footer-container">
            <!-- Bagian Kiri: Informasi Toko -->
            <div class="footer-section">
                <h3>Our Stores – Cimyww Bakery</h3>
                <p>📍 Cimyww Bakery Tembalang</p>
                <p>📍 Cimyww Bakery Banyumanik</p>
                <p>📍 Cimyww Bakery Simpang Lima Semarang</p>
                
                <h3>Operational Hours</h3>
                <p>Tembalang: 07.00 - 21.00 (GMT+7)</p>
                <p>Banyumanik: 07.00 - 21.00 (GMT+7)</p>
                <p>Kota Lama: 07.00 - 21.00 (GMT+7)</p>
            </div>

            <!-- Bagian Tengah: Kontak & Subscribe -->
            <div class="footer-section">
                <h4>Contact Us</h4>
                <p>WhatsApp: <a href="https://wa.me/62895383330084">+62 895 3833 30084</a></p>
                <p>Instagram: <a href="https://www.instagram.com/citramrtta_">@citramrtta_</a></p>
                <p>Email: <a href="mailto:info@cimywwbakery.com">info@cimywwbakery.com</a></p>

                <h4>Subscribe to our newsletter</h4>
                <form>
                    <input type="email" placeholder="your email..." class="newsletter-input">
                    <button type="submit" class="newsletter-btn">Subscribe</button>
                </form>
            </div>
        </div>

        <!-- Copyright -->
        <div class="footer-bottom">
            <p>© 2024 Cimyww Bakery. All Rights Reserved.</p>
        </div>
    </footer>


</body>
</html>
