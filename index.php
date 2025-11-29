<?php include "Cortez_Charles_header.php"; ?>

<div class="content">

<?php
$products = [
    ["name"=>"Mik-Mik Powder","price"=>5,"stock"=>80],
    ["name"=>"Haw Haw Milk Candy","price"=>2,"stock"=>0],
    ["name"=>"Potchi Strawberry","price"=>10,"stock"=>35]
];

foreach($products as $p){
    if($p['stock'] > 50){
        $status = "Available";
    } elseif($p['stock'] > 0){
        $status = "Almost Sold Out!";
    } else {
        $status = "Out of Stock";
    }

    echo "<p>{$p['name']} — ₱{$p['price']} — Status: $status</p>";
}

echo "<h1>The Filipino C Shop</h1>";
echo "<h2>Available Filipino Candies</h2>";

foreach($products as $p){
    echo "<p>{$p['name']} — ₱{$p['price']}</p>";
}
$products[0]['img'] = "mik-mik.jpg";
$products[1]['img'] = "hawhaw.jpg";
$products[2]['img'] = "potchi.jpg";

foreach($products as $p){
    echo "<div class='product-card'>";
    echo "<img src='{$p['img']}' alt='{$p['name']}' class='product-img'>";
    echo "<p>{$p['name']} — ₱{$p['price']}</p>";

    if($p['stock'] > 0){
        echo "
        <form method='POST'>
            <input type='hidden' name='product' value='{$p['name']}'>
            <input type='number' name='qty' min='1' max='{$p['stock']}' value='1'>
            <button type='submit'>Add to Cart</button>
        </form>";
    } else {
        echo "<p>Out of Stock</p>";
    }

    echo "</div>";
}

}
?>

</div>




<?php include "Cortez_Charles_footer.php"; ?>



