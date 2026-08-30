<?php
require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/data.php';

$current_cat = null;
$page_title = '返品ポリシー | SILVER';
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
        <h1 class="section-heading">RETURNS<span class="section-heading__sub">返品ポリシー</span></h1>

        <div class="content-block">
            <h2 class="content-block__heading">返品・交換の条件</h2>
            <p class="content-block__text">
                商品到着後7日以内、未使用・未着用の状態に限り、返品・交換を承ります。以下に該当する場合は返品・交換をお受けできませんので、あらかじめご了承ください。
            </p>
            <ul class="plain-list">
                <li>お客様のご都合による開封・ご使用後の商品</li>
                <li>刻印・サイズ直しなど加工を施した商品</li>
                <li>商品到着後8日以上経過した商品</li>
                <li>タグ・付属品が欠けている商品</li>
            </ul>
        </div>

        <div class="content-block">
            <h2 class="content-block__heading">返品送料</h2>
            <p class="content-block__text">
                お客様都合による返品の場合、返送料はお客様のご負担となります。商品の不良・誤配送など当店に起因する場合は、当店にて返送料を負担いたします。
            </p>
        </div>

        <div class="content-block">
            <h2 class="content-block__heading">返金方法</h2>
            <p class="content-block__text">
                返品商品の到着・確認後、7営業日程度でご利用のお支払い方法に応じて返金いたします。クレジットカードでお支払いの場合はカード会社を通じてのご返金、代金引換・コンビニ支払いの場合はご指定の口座へお振込みいたします。
            </p>
        </div>

        <div class="content-block">
            <h2 class="content-block__heading">交換について</h2>
            <p class="content-block__text">
                サイズ違い等での交換をご希望の場合も、返品と同様に商品到着後7日以内にご連絡ください。在庫状況により、ご希望の商品にお交換できない場合がございます。
            </p>
        </div>

        <div class="content-block">
            <h2 class="content-block__heading">不良品の場合</h2>
            <p class="content-block__text">
                万が一、不良品・注文と異なる商品が届いた場合は、お手数ですが「お問い合わせ」より商品到着後7日以内にご連絡ください。当店負担にて良品と交換、または返金にて対応いたします。
            </p>
            <p class="content-block__text">
                <a href="/silver/contact.php" class="account-form__link">お問い合わせフォームはこちら</a>
            </p>
        </div>
    </section>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>

</body>
</html>
