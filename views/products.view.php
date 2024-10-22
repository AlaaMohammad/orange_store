
<?php require 'partials/header.php'; ?>
<main class="container mt-4">
    <h1>Products</h1>
    <p>Our products are the best!</p>
    <ul>
        <?php foreach ($products as $product) : ?>
            <?php if ($product['name'] == 'Apple iPhone 14 Pro Max') {?>
                <li><?= $product['name'] ?></li>
            <?php } ?>
        <?php endforeach; ?>
    </ul>

</main>
<?php require 'partials/footer.php'; ?>