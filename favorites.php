<?php
require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/data.php';

$current_cat = null;

/**
 * フロントのみのデザインモックのため、お気に入りは固定のサンプルデータ。
 * 実装時はセッションやDBのお気に入り情報に置き換える想定。
 */
$favorite_ids = [1, 3, 8, 14, 19];
$favorite_items = array_values(array_filter($products, function ($p) use ($favorite_ids) {
    return in_array($p['id'], $favorite_ids, true);
}));

$page_title = 'お気に入り | SILVER';
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
    <section class="simple-page">
        <h1 class="section-heading">FAVORITE<span class="section-heading__sub">お気に入り</span></h1>

        <?php if (empty($favorite_items)): ?>
            <div class="empty-state">
                <p>お気に入りに登録された商品がありません。</p>
                <a href="/silver/index.php" class="btn-outline">商品を見る</a>
            </div>
        <?php else: ?>
            <div class="product-grid" id="favoriteGrid">
                <?php foreach ($favorite_items as $product): ?>
                    <div class="product-card-wrap" data-id="<?= h($product['id']) ?>">
                        <button type="button" class="product-card__fav-remove" aria-label="お気に入りから削除">&times;</button>
                        <?php include __DIR__ . '/includes/product-card.php'; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </section>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>

</body>
</html>
