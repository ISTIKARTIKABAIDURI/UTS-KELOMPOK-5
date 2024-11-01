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

// Menghitung diskon berdasarkan total transaksi dan menentukan persentase diskon
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

// Menampilkan struk belanja dalam format yang diminta
echo "<h3>Struk Belanja</h3>";
echo "<p>Tanggal Transaksi: " . date("d M Y") . "</p>";
echo "<table cellpadding='5' cellspacing='0' style='border: 1px solid black; border-collapse: collapse; width: 300px;'>";

// Menampilkan setiap item dalam transaksi
foreach ($receipt_items as $item) {
    echo "<tr>
            <td>{$item['name']} ({$item['quantity']}x)</td>
            <td>:</td>
            <td align='right'>Rp " . number_format($item['total_price'], 0, ',', '.') . "</td>
          </tr>";
}

// Menampilkan total transaksi, diskon, dan persentase diskon
echo "<tr><td colspan='3'><hr style='border: 0.5px dashed #000;'></td></tr>";
echo "<tr><td>Total</td><td>:</td><td align='right'>Rp " . number_format($transaction_total, 0, ',', '.') . "</td></tr>";
echo "<tr><td>Diskon ({$discount_percentage}%)</td><td>:</td><td align='right'>Rp " . number_format($discount, 0, ',', '.') . "</td></tr>";
echo "<tr><td colspan='3'><hr style='border: 0.5px dashed #000;'></td></tr>";
echo "<tr><td><strong>Total Pembayaran</strong></td><td>:</td><td align='right'><strong>Rp " . number_format($final_total, 0, ',', '.') . "</strong></td></tr>";

echo "</table>";

?>
