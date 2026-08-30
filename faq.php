<?php
require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/data.php';

$current_cat = null;
$page_title = 'よくあるご質問 | SILVER';

$faqs = [
    [
        'q' => 'サイズはどのように選べばよいですか？',
        'a' => '各商品ページの詳細欄にサイズ表記を記載しております。リングはサイズ直しにも対応していますので、ご不安な場合は「お問い合わせ」よりご相談ください。',
    ],
    [
        'q' => 'シルバーアクセサリーのお手入れ方法を教えてください。',
        'a' => 'ご使用後は柔らかい布で優しく拭き取り、密閉できる袋や箱で保管してください。変色してしまった場合はシルバー専用のクロスでのお手入れをおすすめします。',
    ],
    [
        'q' => 'ラッピングは可能ですか？',
        'a' => 'ご購入手続きの際にラッピングをご希望の旨をご記入いただければ、無料でシンプルなラッピングを施してお届けします。',
    ],
    [
        'q' => '商品の到着まで何日くらいかかりますか？',
        'a' => 'ご注文確定後、通常2〜4営業日以内に発送し、発送から1〜3日程度でお届けいたします。地域や天候により前後する場合がございます。',
    ],
    [
        'q' => 'キャンセル・返品はできますか？',
        'a' => '発送前であればキャンセルを承ります。商品到着後7日以内、未使用の状態であれば返品・交換も可能です。詳しくは「ご利用ガイド」をご確認ください。',
    ],
    [
        'q' => '支払い方法にはどのようなものがありますか？',
        'a' => 'クレジットカード、代金引換、コンビニ支払いに対応しております。詳細は「ご利用ガイド」をご覧ください。',
    ],
];

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
        <h1 class="section-heading">FAQ<span class="section-heading__sub">よくあるご質問</span></h1>

        <div class="faq-list">
            <?php foreach ($faqs as $item): ?>
                <div class="faq-item">
                    <button type="button" class="faq-item__question">
                        <span>Q. <?= h($item['q']) ?></span>
                        <span class="faq-item__toggle">+</span>
                    </button>
                    <div class="faq-item__answer">
                        <p>A. <?= h($item['a']) ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>

</body>
</html>
