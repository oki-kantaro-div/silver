<?php
require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/data.php';

$current_cat = null;
$keyword = isset($_GET['q']) ? trim($_GET['q']) : '';
$results = search_products($products, $keyword);

$page_title = ($keyword !== '' ? '「' . $keyword . '」の検索結果' : '検索') . ' | SILVER';
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
    <section class="items">
        <h2 class="section-heading">SEARCH<span class="section-heading__sub">検索結果</span></h2>

        <?php if ($keyword === ''): ?>
            <p class="empty-message">キーワードを入力して検索してください。</p>
        <?php elseif (empty($results)): ?>
            <p class="search-summary">「<?= h($keyword) ?>」に一致する商品は見つかりませんでした。</p>
            <p class="empty-message">
                <a href="/silver/index.php" class="btn-outline">TOPへ戻る</a>
            </p>
        <?php else: ?>
            <p class="search-summary">「<?= h($keyword) ?>」の検索結果　<?= count($results) ?>件</p>
            <div class="product-grid">
                <?php foreach ($results as $product): ?>
                    <?php include __DIR__ . '/includes/product-card.php'; ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </section>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>

</body>
</html>
