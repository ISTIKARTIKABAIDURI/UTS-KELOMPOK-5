<?php
    // Create a multidimensional array as specified
    $multiArray = [
        ["Produk", "Stok", "Harga"],
        ["Buavita", 30, 10890],
        ["Bango", 21, 21890],
        ["Sariwangi", 10, 9980],
        ["Shampo Baby", 20, 21890],
        ["Bedak", 15, 14990],
        ["Baju Bayi", 25, 35990],
        ["Jumper", 25, 49999]
    ];

    // Display the multidimensional array in a table format
    echo "<h3>Array Multidimensional Produk</h3>";
    echo "<table border='1'>";
    foreach ($multiArray as $row) {
        echo "<tr>";
        foreach ($row as $col) {
            echo "<td>" . (is_numeric($col) ? number_format($col, 0, ',', '.') : $col) . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

?>


