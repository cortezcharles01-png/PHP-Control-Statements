<?php include "Cortez_Charles_header.php"; ?>

<div class="content">

<?php
$products = [
    ["name" => "Mik-Mik Powder", "price" => 5],
    ["name" => "Haw Haw Milk Candy", "price" => 2],
    ["name" => "Potchi Strawberry", "price" => 10]
];

echo "<h1>The Filipino C Shop</h1>";
echo "<h2>Available Filipino Candies</h2>";

foreach($products as $p){
    echo "<p>{$p['name']} — ₱{$p['price']}</p>";
}
?>

</div>

<?php include "Cortez_Charles_footer.php"; ?>
