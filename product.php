<?php
require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/data.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$product = find_product($products, $id);

if (!$product) {
    header('Location: /silver/index.php');
    exit;
}

$current_cat = $product['category'];

$gallery = [
    ['src' => $product['image'], 'mirror' => false],
    ['src' => $product['worn_image'], 'mirror' => false],
    ['src' => $product['image'], 'mirror' => true],
];

$related = array_values(array_filter($products, function ($p) use ($product) {
    return $p['category'] === $product['category'] && $p['id'] !== $product['id'];
}));
$related = array_slice($related, 0, 3);

$page_title = $product['name'] . ' | SILVER';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= h($page_title) ?></title>
<?php include __DIR__ . '/includes/head-assets.php'; ?>
</head>
<body>

<?php include __DIR__ . '/includes/header.php'; ?>

<main>
    <section class="product-detail">

        <div class="product-gallery">
            <div class="product-gallery__main">
                <img src="<?= h($gallery[0]['src']) ?>" alt="<?= h($product['name']) ?>" id="mainImage">
            </div>
            <div class="product-gallery__thumbs">
                <?php foreach ($gallery as $i => $g): ?>
                    <button type="button"
                            class="product-gallery__thumb <?= $i === 0 ? 'is-active' : '' ?>"
                            data-src="<?= h($g['src']) ?>"
                            data-mirror="<?= $g['mirror'] ? '1' : '0' ?>">
                        <img src="<?= h($g['src']) ?>" alt="" class="<?= $g['mirror'] ? 'is-mirrored' : '' ?>">
                    </button>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="product-info">
            <p class="product-info__category"><?= h($categories[$product['category']]) ?></p>
            <h1 class="product-info__name"><?= h($product['name']) ?></h1>
            <p class="product-info__price"><?= h(format_price($product['price'])) ?></p>

            <p class="product-info__description"><?= nl2br(h($product['description'])) ?></p>

            <dl class="product-info__spec">
                <div>
                    <dt>MATERIAL</dt>
                    <dd><?= h($product['material']) ?></dd>
                </div>
            </dl>

            <button type="button" class="btn-cart">CART へ入れる</button>
        </div>

    </section>

    <?php if (!empty($related)): ?>
        <section class="items">
            <h2 class="section-heading">RELATED ITEMS</h2>
            <div class="product-grid">
                <?php foreach ($related as $product): ?>
                    <?php include __DIR__ . '/includes/product-card.php'; ?>
                <?php endforeach; ?>
            </div>
        </section>
    <?php endif; ?>

</main>

<?php include __DIR__ . '/includes/footer.php'; ?>

</body>
</html>
