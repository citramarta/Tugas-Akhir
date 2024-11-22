<?php
// Fungsi untuk menghitung total harga
function hitungTotal($price, $quantity) {
    return $price * $quantity;
}

// Fungsi untuk format uang dalam format Rupiah
function formatRupiah($angka) {
    return "Rp. " . number_format($angka, 0, ',', '.');
}

// Cek apakah data dikirim melalui POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $product = isset($_GET['product']) ? htmlspecialchars($_GET['product']) : '';
    $price = isset($_GET['price']) ? (int)$_GET['price'] : 0;
    $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;
    $payment = isset($_POST['payment']) ? (int)$_POST['payment'] : 0;
    $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
    
    // Hitung total harga
    $total_price = hitungTotal($price, $quantity);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesanan</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif, sans-serif;
            background-color: #fff5e6;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background-color: #fffbf5;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 20px;
            padding: 40px 30px;
            max-width: 600px;
            text-align: center;
        }

        h2 {
            color: #0a0a0a;
            font-size: 24px;
        }

        p {
            color: #333333;
            margin: 10px 0;
        }

        .success {
            color: #099e2a;
            background-color: #e8f5e9;
            padding: 10px;
            border-radius: 5px;
            margin: 20px 0;
        }

        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .kwitansi {
            text-align: left;
            margin-top: 20px;
            padding: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 10px;
        }

        .kwitansi p {
            margin: 8px 0;
        }

        .kwitansi .total {
            font-weight: bold;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="success">
            <h2>Total Pesanan Cimyww Bakery</h2>
            <p>Terima kasih, <strong><?php echo $name; ?></strong>, telah memesan.</p>
        </div>

        <div class="kwitansi">
            <p><strong>📋 Kwitansi Pembelian</strong></p>
            <p>🛒 Produk: <strong><?php echo $product; ?></strong></p>
            <p>🔢 Jumlah: <strong><?php echo $quantity; ?></strong></p>
            <p>💰 Harga Satuan: <strong><?php echo formatRupiah($price); ?></strong></p>
            <p>💵 Total Harga: <strong><?php echo formatRupiah($total_price); ?></strong></p>
            <p>💵 Pembayaran: <strong><?php echo formatRupiah($payment); ?></strong></p>
            <p class="total">💰 Total Pembelian: <strong><?php echo formatRupiah($total_price); ?></strong></p>
        </div>

        <a href="index.php" class="btn">Kembali ke Beranda</a>
    </div>
</body>
</html>
