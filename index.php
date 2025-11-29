<?php include "Cortez_Charles_header.php"; ?>

<div class="content">
    

<?php
/*---------------------------------------------------------
   FILIPINO CANDY PRODUCT LIST 
---------------------------------------------------------*/

$products = [
    
    [
        "name" => "Mik-Mik Powder",
        "price" => 5,
        "stock" => 80,
        "category" => "Powder Candy",
        "img" => "mik-mik.jpg "
    ],
    [
        "name" => "Haw Haw Milk Candy",
        "price" => 2,
        "stock" => 200,
        "category" => "Milk Candy",
        "img" => "hawhaw.jpg"
    ],
    [
        "name" => "Potchi Strawberry",
        "price" => 10,
        "stock" => 35,
        "category" => "Gummy",
        "img" => "potchi.jpg"
    ],
    [
        "name" => "Yema Classic",
        "price" => 12,
        "stock" => 15,
        "category" => "Local Sweets",
        "img" => "yema.jpg"
    ],
    [
        "name" => "XO Coffee Candy",
        "price" => 3,
        "stock" => 0,
        "category" => "Hard Candy",
        "img" => "xo.jpg"
    ]
];

/*---------------------------------------------------------
   CART SYSTEM 
---------------------------------------------------------*/
$cart = [];

if(isset($_POST["product"], $_POST["qty"])){

    $productBought = $_POST["product"];
    $qtyBought = (int)$_POST["qty"];

    // Add to cart
    $cart[$productBought] = $qtyBought;

    echo "<div class='alert'>You added <strong>$qtyBought x $productBought</strong> to your cart!</div>";
}

/*---------------------------------------------------------
   SHIPPING BASED ON LOCATION
---------------------------------------------------------*/
$location = "Pampanga";

$shipping = match(true){
    str_contains($location, "Luzon") => 60,
    str_contains($location, "Visayas") => 80,
    str_contains($location, "Mindanao") => 100,
    default => 120
};

/*---------------------------------------------------------
   PROMO BASED ON DAY (switch)
---------------------------------------------------------*/
$day = date("l");

switch($day){
    case "Saturday":
        $dayMessage = "Weekend treat! ₱5 off for every ₱100 purchase!";
        break;
    case "Wednesday":
        $dayMessage = "Midweek Promo! Buy 3 Potchi, get 1 free!";
        break;
    default:
        $dayMessage = "Welcome to our Filipino Candy Shop!";
}

echo "<h1>The Filipino C Shop</h1>";
echo "<h3>$dayMessage</h3>";
?>

<!-- PRODUCT DISPLAY -->
<h2>Available Filipino Candies</h2>
<div class="product-list">

<?php
foreach($products as $p){

    // Stock message
    if($p["stock"] > 50){
        $stockMsg = "Available";
    } elseif($p["stock"] > 0){
        $stockMsg = "Almost Sold Out!";
    } else {
        $stockMsg = "Out of Stock";
    }

    echo "
        <div class='product-card'>
            <img src='{$p['img']}' alt='{$p['name']}' class='product-img'>
            <h3>{$p['name']}</h3>
            <p>Category: {$p['category']}</p>
            <p>Price: ₱{$p['price']}</p>
            <p>Status: <strong>$stockMsg</strong></p>
    ";

    // Buy only if in stock
    if($p["stock"] > 0){
        echo "
            <form method='POST'>
                <input type='hidden' name='product' value='{$p['name']}'>
                <input type='number' name='qty' min='1' max='{$p['stock']}' value='1'>
                <button type='submit'>Add to Cart</button>
            </form>
        ";
    } else {
        echo "<p class='soldout'>Cannot purchase — Out of stock</p>";
    }

    echo "</div>";
}
?>
</div>

<hr>




<hr>

<!-- CART SUMMARY -->
<h2>Your Cart Summary</h2>

<?php
if(empty($cart)){
    echo "<p>No items yet.</p>";
} else {

    $subtotal = 0;

    foreach($cart as $productName => $qty){

        foreach($products as $p){
            if($p["name"] === $productName){

                $lineTotal = $p["price"] * $qty;
                $subtotal += $lineTotal;

                echo "<p>$productName (x$qty) — ₱$lineTotal</p>";
            }
        }
    }

    $tax = $subtotal * 0.12;
    $total = $subtotal + $tax + $shipping;

    echo "<p>Subtotal: <strong>₱$subtotal</strong></p>";
    echo "<p>Tax (12%): <strong>₱$tax</strong></p>";
    echo "<p>Shipping Fee ($location): <strong>₱$shipping</strong></p>";
    echo "<p>Total Amount: <strong>₱$total</strong></p>";
}
?>

</div>

<?php include "Cortez_Charles_footer.php"; ?>
