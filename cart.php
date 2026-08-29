<?php
require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/data.php';

$current_cat = null;

$cart = build_cart($products, $mock_cart_lines);
$cart_items = $cart['items'];
$subtotal = $cart['subtotal'];
$shipping_fee = $cart['shipping_fee'];
$free_shipping_threshold = $cart['free_shipping_threshold'];
$total = $cart['total'];

$page_title = 'カート | SILVER';
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
    <section class="simple-page">
        <h1 class="section-heading">CART<span class="section-heading__sub">カート</span></h1>

        <?php if (empty($cart_items)): ?>
            <div class="empty-state">
                <p>カートに商品がありません。</p>
                <a href="/silver/index.php" class="btn-outline">商品を見る</a>
            </div>
        <?php else: ?>
            <div class="cart-list" id="cartList">
                <?php foreach ($cart_items as $item): ?>
                    <div class="cart-item" data-price="<?= (int) $item['price'] ?>">
                        <a href="/silver/product.php?id=<?= h($item['id']) ?>" class="cart-item__image">
                            <img src="<?= h($item['image']) ?>" alt="<?= h($item['name']) ?>">
                        </a>

                        <div class="cart-item__body">
                            <div class="cart-item__info">
                                <p class="cart-item__category"><?= h($categories[$item['category']]) ?></p>
                                <a href="/silver/product.php?id=<?= h($item['id']) ?>" class="cart-item__name"><?= h($item['name']) ?></a>
                                <p class="cart-item__price"><?= h(format_price($item['price'])) ?></p>
                            </div>

                            <div class="cart-item__controls">
                                <div class="qty-stepper">
                                    <button type="button" class="qty-stepper__btn" data-step="-1" aria-label="数量を減らす">&minus;</button>
                                    <span class="qty-stepper__value"><?= (int) $item['qty'] ?></span>
                                    <button type="button" class="qty-stepper__btn" data-step="1" aria-label="数量を増やす">&#43;</button>
                                </div>

                                <p class="cart-item__subtotal"><?= h(format_price($item['line_total'])) ?></p>

                                <button type="button" class="cart-item__remove" aria-label="削除">&times;</button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="cart-summary">
                <div class="cart-summary__row">
                    <span>小計</span>
                    <span id="cartSubtotal"><?= h(format_price($subtotal)) ?></span>
                </div>
                <div class="cart-summary__row">
                    <span>送料</span>
                    <span id="cartShipping"><?= $shipping_fee === 0 ? '無料' : h(format_price($shipping_fee)) ?></span>
                </div>
                <p class="cart-summary__note">&yen;<?= number_format($free_shipping_threshold) ?>以上のご購入で送料無料</p>
                <div class="cart-summary__row cart-summary__row--total">
                    <span>合計</span>
                    <span id="cartTotal"><?= h(format_price($total)) ?></span>
                </div>

                <a href="/silver/checkout.php" class="btn-cart">レジに進む</a>
                <a href="/silver/index.php" class="cart-summary__continue">お買い物を続ける</a>
            </div>
        <?php endif; ?>
    </section>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>

</body>
</html>
