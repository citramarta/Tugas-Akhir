<?php
// Class Order untuk menangani data pemesanan
class Order {
    private $product;
    private $price;

    public function __construct($product, $price) {
        $this->product = $product;
        $this->price = $price;
    }

    public function getProduct() {
        return $this->product;
    }

    public function getPrice() {
        return $this->price;
    }
}

if (isset($_GET['product']) && isset($_GET['price'])) {
    $order = new Order($_GET['product'], $_GET['price']);
} else {
    header("Location: index.php");
    exit;
}

// Jika jumlah dikirim melalui POST, gunakan untuk menghitung total
$quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;
$total_price = $quantity * $order->getPrice();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Kue dan Roti</title>
    <link rel="stylesheet" href="style.css">

    <script>
        // Fungsi untuk memperbarui total harga
        function updateTotal() {
            // Ambil harga per unit dan jumlah dari form
            var price = <?php echo $order->getPrice(); ?>;
            var quantity = document.getElementById("quantity").value;

            // Hitung total harga
            var total = price * quantity;

            // Update elemen total harga di halaman
            document.getElementById("total").value = "Rp " + total.toLocaleString();
        }

        // Fungsi untuk memeriksa jumlah uang yang dimasukkan
        function checkPayment() {
            var total = <?php echo $order->getPrice(); ?> * document.getElementById("quantity").value;
            var payment = document.getElementById("payment");
            var paymentValue = payment.value;

            // Validasi uang harus cukup
            if (paymentValue && paymentValue < total) {
                payment.setCustomValidity("Maaf, uang Anda kurang. Silakan tambahkan jumlah uang.");
            } else {
                payment.setCustomValidity(""); // Reset pesan error jika valid
            }
        }

        // Event listener untuk perubahan jumlah
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("quantity").addEventListener("input", updateTotal);
            // Panggil updateTotal saat pertama kali dimuat untuk memastikan total harga sudah benar
            updateTotal();
        });
    </script>

</head>
<body>

<section class="order">
    <h2>🧁 Menu yang Dipilih: <?php echo $order->getProduct(); ?></h2>
    <h3>💵 Harga Satuan: Rp <?php echo number_format($order->getPrice(), 0, ',', '.'); ?></h3>
    
    <!-- Formulir untuk input data pemesanan -->
    <form method="POST" action="process_order.php?product=<?php echo urlencode($order->getProduct()); ?>&price=<?php echo $order->getPrice(); ?>">
        <label for="name">👤 Nama:</label>
        <input type="text" name="name" required><br>

        <label for="quantity">🔢 Jumlah:</label>
        <input type="number" name="quantity" id="quantity" value="1" required><br>

        <label for="total">📊 Total Harga:</label>
        <input type="text" id="total" value="Rp <?php echo number_format($total_price, 0, ',', '.'); ?>" readonly><br>

        <label for="payment">💰 Jumlah Uang:</label>
        <input 
            type="number" 
            name="payment" 
            id="payment" 
            required 
            min="1" 
            step="1" 
            oninput="checkPayment()"
            placeholder="Masukkan jumlah uang Anda"
        ><br>

        <input type="submit" value="🍰 Pesan Sekarang">
    </form>

    <!-- Tombol untuk kembali ke beranda -->
    <form action="index.php" method="GET">
        <input type="submit" value="🏠 Kembali ke Beranda">
    </form>
</section>

</body>
</html>
