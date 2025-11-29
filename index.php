<?php include "Cortez_Charles_header.php"; ?>

<div class="content">

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
?>

</div>




<?php include "Cortez_Charles_footer.php"; ?>




