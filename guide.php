<?php
require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/data.php';

$current_cat = null;
$page_title = 'ご利用ガイド | SILVER';
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
    <section class="simple-page simple-page--narrow">
        <h1 class="section-heading">GUIDE<span class="section-heading__sub">ご利用ガイド</span></h1>

        <div class="content-block">
            <h2 class="content-block__heading">ご注文の流れ</h2>
            <ol class="steps-list">
                <li>
                    <span class="steps-list__num">01</span>
                    <div>
                        <p class="steps-list__title">商品をお選びください</p>
                        <p class="steps-list__text">気になる商品ページから、カラーやサイズをご確認のうえカートに入れてください。</p>
                    </div>
                </li>
                <li>
                    <span class="steps-list__num">02</span>
                    <div>
                        <p class="steps-list__title">カートのご確認</p>
                        <p class="steps-list__text">カート内容と数量をご確認いただき、レジにお進みください。</p>
                    </div>
                </li>
                <li>
                    <span class="steps-list__num">03</span>
                    <div>
                        <p class="steps-list__title">お支払い情報のご入力</p>
                        <p class="steps-list__text">お届け先とお支払い方法をご入力ください。</p>
                    </div>
                </li>
                <li>
                    <span class="steps-list__num">04</span>
                    <div>
                        <p class="steps-list__title">ご注文確定・発送</p>
                        <p class="steps-list__text">ご注文確認メールをお送りします。商品到着まで今しばらくお待ちください。</p>
                    </div>
                </li>
            </ol>
        </div>

        <div class="content-block" id="payment">
            <h2 class="content-block__heading">お支払い方法</h2>
            <ul class="plain-list">
                <li>クレジットカード（VISA / Mastercard / JCB / American Express）</li>
                <li>代金引換</li>
                <li>コンビニ支払い</li>
            </ul>
        </div>

        <div class="content-block">
            <h2 class="content-block__heading">配送について</h2>
            <p class="content-block__text">
                &yen;8,800以上のご購入で送料無料です。&yen;8,800未満のご注文には一律送料がかかります。<br>
                ご注文確定後、通常2〜4営業日以内に発送いたします。
            </p>
            <ul class="plain-list">
                <li>配送業者：宅配便</li>
                <li>お届け日時のご指定が可能です</li>
                <li>離島・一部地域は追加送料が発生する場合がございます</li>
            </ul>
        </div>

        <div class="content-block">
            <h2 class="content-block__heading">返品・交換について</h2>
            <p class="content-block__text">
                商品到着後7日以内、未使用の状態に限り返品・交換を承ります。<br>
                お手数ですが「お問い合わせ」よりご連絡ください。詳細な手順をご案内いたします。
            </p>
        </div>
    </section>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>

</body>
</html>
