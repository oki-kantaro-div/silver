<?php
require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/data.php';

$current_cat = isset($_GET['cat']) ? $_GET['cat'] : null;
if (!array_key_exists($current_cat, $categories)) {
    $current_cat = null;
}

$filtered = products_by_category($products, $current_cat);
$category_label = $current_cat ? $categories[$current_cat] : 'ALL ITEMS';
$category_en = $current_cat ? strtoupper($current_cat) : 'ALL ITEMS';
$page_title = $category_label . ' | SILVER';
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
    <section class="items items--category">
        <h2 class="section-heading"><?= h($category_en) ?><span class="section-heading__sub"><?= h($category_label) ?></span></h2>

        <div class="product-grid">
            <?php foreach ($filtered as $product): ?>
                <?php include __DIR__ . '/includes/product-card.php'; ?>
            <?php endforeach; ?>
        </div>

        <?php if (empty($filtered)): ?>
            <p class="empty-message">商品が見つかりませんでした。</p>
        <?php endif; ?>
    </section>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>

</body>
</html>
