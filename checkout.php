<?php
require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/data.php';

$current_cat = null;

$cart = build_cart($products, $mock_cart_lines);
$cart_items = $cart['items'];

if (empty($cart_items)) {
    header('Location: /silver/cart.php');
    exit;
}

$subtotal = $cart['subtotal'];
$shipping_fee = $cart['shipping_fee'];
$free_shipping_threshold = $cart['free_shipping_threshold'];
$total = $cart['total'];

$page_title = 'レジに進む | SILVER';
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
        <h1 class="section-heading">CHECKOUT<span class="section-heading__sub">レジに進む</span></h1>

        <form class="checkout-layout" id="checkoutForm">
            <div class="checkout-main">

                <div class="content-block">
                    <h2 class="content-block__heading">お届け先情報</h2>

                    <div class="account-form">
                        <label class="account-form__field">
                            <span>お名前</span>
                            <input type="text" name="name" required placeholder="山田 花子">
                        </label>

                        <label class="account-form__field">
                            <span>郵便番号</span>
                            <input type="text" name="zip" required placeholder="000-0000">
                        </label>

                        <label class="account-form__field">
                            <span>ご住所</span>
                            <input type="text" name="address" required placeholder="東京都◯◯区◯◯ 0-0-0">
                        </label>

                        <label class="account-form__field">
                            <span>電話番号</span>
                            <input type="tel" name="tel" required placeholder="000-0000-0000">
                        </label>

                        <label class="account-form__field">
                            <span>メールアドレス</span>
                            <input type="email" name="email" required placeholder="example@mail.com">
                        </label>
                    </div>
                </div>

                <div class="content-block">
                    <h2 class="content-block__heading">お支払い方法</h2>

                    <div class="radio-list">
                        <label class="radio-list__item">
                            <input type="radio" name="payment" value="card" checked>
                            <span>クレジットカード</span>
                        </label>
                        <label class="radio-list__item">
                            <input type="radio" name="payment" value="cod">
                            <span>代金引換</span>
                        </label>
                        <label class="radio-list__item">
                            <input type="radio" name="payment" value="conveni">
                            <span>コンビニ支払い</span>
                        </label>
                    </div>

                    <div class="account-form" id="cardFields">
                        <label class="account-form__field">
                            <span>カード番号</span>
                            <input type="text" name="card_number" placeholder="0000 0000 0000 0000">
                        </label>

                        <label class="account-form__field">
                            <span>有効期限</span>
                            <input type="text" name="card_expiry" placeholder="MM / YY">
                        </label>
                    </div>
                </div>

            </div>

            <div class="checkout-summary">
                <h2 class="checkout-summary__heading">ご注文内容</h2>

                <div class="checkout-summary__list">
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

                <div class="cart-summary__row">
                    <span>小計</span>
                    <span><?= h(format_price($subtotal)) ?></span>
                </div>
                <div class="cart-summary__row">
                    <span>送料</span>
                    <span><?= $shipping_fee === 0 ? '無料' : h(format_price($shipping_fee)) ?></span>
                </div>
                <div class="cart-summary__row cart-summary__row--total">
                    <span>合計</span>
                    <span><?= h(format_price($total)) ?></span>
                </div>

                <button type="submit" class="btn-cart">この内容で注文を確定する</button>
                <a href="/silver/cart.php" class="cart-summary__continue">カートに戻る</a>
            </div>
        </form>
    </section>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>

</body>
</html>
