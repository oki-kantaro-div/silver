<?php
require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/data.php';

$current_cat = null;
$page_title = 'マイページ | SILVER';
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
        <h1 class="section-heading">MY PAGE<span class="section-heading__sub">マイページ</span></h1>
        <p class="page-lead">ようこそ、<?= h($mock_member['name']) ?> 様</p>

        <div class="account-dashboard">
            <nav class="account-dashboard__nav">
                <button type="button" class="account-dashboard__nav-item is-active" data-panel="panel-orders">注文履歴</button>
                <button type="button" class="account-dashboard__nav-item" data-panel="panel-address">お届け先住所</button>
                <button type="button" class="account-dashboard__nav-item" data-panel="panel-profile">会員情報</button>
                <a href="/silver/favorites.php" class="account-dashboard__nav-item">お気に入り</a>
                <a href="/silver/mypage.php" class="account-dashboard__nav-item account-dashboard__nav-item--logout">ログアウト</a>
            </nav>

            <div class="account-dashboard__content">

                <div class="account-dashboard__panel is-active" id="panel-orders">
                    <?php foreach ($mock_orders as $order): ?>
                        <?php $order_cart = build_cart($products, $order['lines']); ?>
                        <div class="order-card">
                            <div class="order-card__head">
                                <span class="order-card__number">注文番号：<?= h($order['number']) ?></span>
                                <span><?= h($order['date']) ?></span>
                                <span class="order-card__status"><?= h($order['status']) ?></span>
                            </div>

                            <div class="checkout-summary__list">
                                <?php foreach ($order_cart['items'] as $item): ?>
                                    <div class="checkout-summary__item">
                                        <span class="checkout-summary__item-image">
                                            <img src="<?= h($item['image']) ?>" alt="<?= h($item['name']) ?>">
                                        </span>
                                        <span class="checkout-summary__item-body">
                                            <span class="checkout-summary__item-name"><?= h($item['name']) ?></span>
                                            <span class="checkout-summary__item-qty">数量：<?= (int) $item['qty'] ?></span>
                                        </span>
                                        <span class="checkout-summary__item-price"><?= h(format_price($item['line_total'])) ?></span>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                            <div class="cart-summary__row cart-summary__row--total">
                                <span>合計</span>
                                <span><?= h(format_price($order_cart['total'])) ?></span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="account-dashboard__panel" id="panel-address">
                    <div class="address-card">
                        <p class="address-card__name"><?= h($mock_member['name']) ?> 様</p>
                        <p>〒<?= h($mock_member['zip']) ?></p>
                        <p><?= h($mock_member['address']) ?></p>
                        <p>TEL：<?= h($mock_member['tel']) ?></p>
                    </div>
                </div>

                <div class="account-dashboard__panel" id="panel-profile">
                    <dl class="info-list">
                        <div>
                            <dt>お名前</dt>
                            <dd><?= h($mock_member['name']) ?></dd>
                        </div>
                        <div>
                            <dt>メールアドレス</dt>
                            <dd><?= h($mock_member['email']) ?></dd>
                        </div>
                    </dl>
                </div>

            </div>
        </div>
    </section>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>

</body>
</html>
