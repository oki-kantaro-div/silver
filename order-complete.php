<?php
require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/data.php';

$current_cat = null;

$cart = build_cart($products, $mock_cart_lines);
$cart_items = $cart['items'];
$total = $cart['total'];

$order_number = 'SV-' . date('Ymd') . '-' . str_pad((string) random_int(0, 9999), 4, '0', STR_PAD_LEFT);

$page_title = 'ご注文完了 | SILVER';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= h($page_title) ?></title>
<link rel="stylesheet" href="/silver/assets/css/style.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;1,400&family=Noto+Sans+JP:wght@300;400;500&display=swap" rel="stylesheet">
</head>
<body>

<?php include __DIR__ . '/includes/header.php'; ?>

<main>
    <section class="simple-page simple-page--narrow">
        <div class="order-complete">
            <p class="order-complete__eyebrow">THANK YOU</p>
            <h1 class="order-complete__title">ご注文ありがとうございます</h1>
            <p class="order-complete__text">
                ご入力いただいたメールアドレス宛にご注文確認メールをお送りしました。<br>
                商品の発送準備が整い次第、発送のご連絡をいたします。
            </p>

            <div class="order-complete__number">
                <span>注文番号</span>
                <span><?= h($order_number) ?></span>
            </div>

            <div class="checkout-summary__list order-complete__list">
                <?php foreach ($cart_items as $item): ?>
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

            <div class="cart-summary__row cart-summary__row--total order-complete__total">
                <span>合計</span>
                <span><?= h(format_price($total)) ?></span>
            </div>

            <div class="order-complete__actions">
                <a href="/silver/index.php" class="btn-outline">TOPへ戻る</a>
                <a href="/silver/mypage.php" class="order-complete__link">ご注文履歴を確認する</a>
            </div>
        </div>
    </section>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>

</body>
</html>
