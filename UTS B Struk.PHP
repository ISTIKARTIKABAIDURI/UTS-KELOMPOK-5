<?php   

// Data produk (nama produk, stok, harga satuan)
$products = [
    ["Buavita", 30, 10890],
    ["Bango", 21, 21890],
    ["Sariwangi", 10, 9980],
    ["Shampo Baby", 20, 21890],
    ["Bedak", 15, 14990],
    ["Baju Bayi", 25, 35990],
    ["Jumper", 25, 49999]
];

// Data transaksi: item yang dibeli dan jumlahnya
$transaction = [
    ["Bedak", 15],
    ["Baju Bayi", 15],
    ["Buavita", 15],
    ["Shampo Baby", 10],
    ["Buavita", 3]
];

// Inisialisasi total transaksi
$transaction_total = 0;
$receipt_items = []; // Array untuk menyimpan detail struk

// Menghitung total harga untuk setiap item dalam transaksi
foreach ($transaction as $item) {
    foreach ($products as $product) {
        if ($item[0] === $product[0]) {  // Cek nama produk
            $item_total = $item[1] * $product[2];
            $transaction_total += $item_total;

            // Menyimpan detail item untuk ditampilkan di struk
            $receipt_items[] = [
                "name" => $product[0],
                "quantity" => $item[1],
                "unit_price" => $product[2],
                "total_price" => $item_total
            ];
            break;
        }
    }
}

// Menghitung diskon berdasarkan total transaksi
$discount = 0;
$discount_percentage = 0;
if ($transaction_total >= 400000) {
    $discount = 0.35 * $transaction_total; // Diskon 35%
    $discount_percentage = 35;
} elseif ($transaction_total >= 250000) {
    $discount = 0.20 * $transaction_total; // Diskon 20%
    $discount_percentage = 20;
}

$final_total = $transaction_total - $discount;

// Menampilkan struk belanja dalam format yang rapi
echo "<div style='width: 300px; margin: 0 auto; font-family: Arial, sans-serif;'>";
echo "<h3 style='text-align: center;'>Struk Belanja</h3>";
echo "<p style='text-align: center;'><strong>Tanggal Transaksi:</strong> " . date("d M Y") . "</p>";
echo "<hr style='border: 1px dashed #000;'>";

// Menampilkan setiap item dalam transaksi
foreach ($receipt_items as $item) {
    echo "<p style='margin: 0;'>
            {$item['name']} ({$item['quantity']}x) 
            <span style='float: right;'>Rp " . number_format($item['total_price'], 0, ',', '.') . "</span>
          </p>";
}

// Menampilkan total transaksi, persentase diskon, dan total pembayaran akhir
echo "<hr style='border: 0.5px dashed #000;'>";
echo "<p style='margin: 0;'><strong>Total</strong> 
          <span style='float: right;'>Rp " . number_format($transaction_total, 0, ',', '.') . "</span></p>";
echo "<p style='margin: 0;'><strong>Diskon ({$discount_percentage}%)</strong> 
          <span style='float: right;'>Rp " . number_format($discount, 0, ',', '.') . "</span></p>";
echo "<hr style='border: 0.5px dashed #000;'>";
echo "<p style='margin: 0;'><strong>Total Pembayaran</strong> 
          <span style='float: right;'><strong>Rp " . number_format($final_total, 0, ',', '.') . "</strong></span></p>";

echo "<hr style='border: 1px dashed #000;'>";
echo "<p style='text-align: center; font-size: 10px;'>Terima kasih atas kunjungan Anda!</p>";
echo "</div>";

?>
