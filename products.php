<?php 
include "Cortez_Charles_header.php"; 
include "candies.php";
?>

<div class="content">
<h1>Products</h1>

<div class="card-container">

<?php foreach ($filipinoCandies as $name => $candy): ?>

    <div class="card">

        <img src="img/<?= $candy['img']; ?>" alt="<?= $name; ?>" class="candy-img">

        <h3><?= $name; ?></h3>
        <p>Price: ₱<?= number_format($candy["price"], 2); ?></p>

        <button class="buy-btn">Add to Cart</button>
    </div>

<?php endforeach; ?>

</div>
</div>

<?php include "Cortez_Charles_footer.php"; ?>
