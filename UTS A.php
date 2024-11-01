<?php 

// Define the initial product data
$products = [
    ["Buavita", 30, 10890],
    ["Bango", 21, 21890],
    ["Sariwangi", 10, 9980],
    ["Shampo Baby", 20, 21890],
    ["Bedak", 15, 14990],
    ["Baju Bayi", 25, 35990],
    ["Jumper", 25, 49999]
];

// Calculate the total for each product and display the table
echo "<h3>Tabel Harga Barang</h3>";
echo "<table border='1'>";
echo "<tr><th>ID</th><th>Produk</th><th>Stok</th><th>Harga</th><th>Jumlah</th></tr>";
$total_price = 0;

foreach ($products as $index => $product) {
    $jumlah = $product[1] * $product[2];
    $total_price += $jumlah;
    echo "<tr>
            <td>" . ($index + 1) . "</td>
            <td>{$product[0]}</td>
            <td>{$product[1]}</td>
            <td>" . number_format($product[2], 0, ',', '.') . "</td>
            <td>" . number_format($jumlah, 0, ',', '.') . "</td>
        </tr>";
}

// Menambahkan baris total di akhir tabel
echo "<tr style='font-weight: bold;'>
        <td colspan='4' style='text-align: right;'>Total</td>
        <td>" . number_format($total_price, 0, ',', '.') . "</td>
      </tr>";

echo "</table>";

?>
