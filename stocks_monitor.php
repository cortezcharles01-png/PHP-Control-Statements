<?php
declare(strict_types=1);

include "Cortez_Charles_header.php";
include "candies.php";
?>

<style>
table {
    width: 90%;
    margin: 20px auto;
    border-collapse: collapse;
    background: white;
}

th, td {
    padding: 12px;
    border: 1px solid #ddd;
    text-align: center;
}

th {
    background: #ff6f91;
    color: white;
}

tr:nth-child(even) {
    background: #ffe5ee;
}

.low {
    background: #ffb3b3 !important;
}
</style>

<div class="content">
<h1> Stock Monitor</h1>

<?php
$taxRate = 12;

function get_reorder_message(int $stock): string {
    return $stock < 10 ? "Yes" : "No";
}

function get_total_value(float $price, int $qty): float {
    return $price * $qty;
}

function get_tax_due(float $price, int $qty, int $taxRate = 0): float {
    return ($price * $qty) * ($taxRate / 100);
}
?>

<table>
    <tr>
        <th>Product</th>
        <th>Stock</th>
        <th>Reorder?</th>
        <th>Total Value</th>
        <th>Tax Due</th>
    </tr>

<?php foreach ($filipinoCandies as $name => $candy): ?>

    <tr class="<?= $candy['stock'] < 10 ? 'low' : '' ?>">
        <td><?= $name; ?></td>
        <td><?= $candy['stock']; ?></td>
        <td><?= get_reorder_message($candy['stock']); ?></td>
        <td>₱<?= number_format(get_total_value($candy['price'], $candy['stock']), 2); ?></td>
        <td>₱<?= number_format(get_tax_due($candy['price'], $candy['stock'], $taxRate), 2); ?></td>
    </tr>

<?php endforeach; ?>

</table>

</div>

<?php include "Cortez_Charles_footer.php"; ?>
