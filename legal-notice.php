<?php
require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/data.php';

$current_cat = null;
$page_title = '特定商取引法に基づく表記 | SILVER';

/**
 * フロントのみのデザインモックのため、内容はすべて仮の記載。
 * 公開前に正式な情報へ差し替え、特定商取引法の要件を満たしているか確認すること。
 */
$legal_info = [
    '販売業者' => '株式会社サンプル',
    '運営統括責任者' => '〇〇 〇〇',
    '所在地' => '〒000-0000　東京都◯◯区◯◯ 0-0-0',
    '電話番号' => '00-0000-0000（受付時間 10:00〜18:00　土日祝除く）',
    'メールアドレス' => 'info@example.com',
    '販売価格' => '各商品ページに表示する価格（税込）',
    '商品代金以外の必要料金' => '送料（&yen;8,800未満のご注文につき一律&yen;660）、代金引換手数料',
    'お支払い方法' => 'クレジットカード／代金引換／コンビニ支払い',
    'お支払い時期' => 'クレジットカード：ご注文確定時／代金引換・コンビニ支払い：商品お受け取り時・お支払い期限内',
    '引渡時期' => 'ご注文確定後、通常2〜4営業日以内に発送',
    '返品・キャンセルについて' => '商品到着後7日以内、未使用の状態に限り返品・交換を承ります。詳細は返品ポリシーをご確認ください。',
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
        <h1 class="section-heading">LEGAL NOTICE<span class="section-heading__sub">特定商取引法に基づく表記</span></h1>
        <p class="page-lead">
            このページの内容はすべて仮の記載です。公開前に正式な情報へ差し替えてください。
        </p>

        <dl class="info-list">
            <?php foreach ($legal_info as $label => $value): ?>
                <div>
                    <dt><?= h($label) ?></dt>
                    <dd><?= h($value) ?></dd>
                </div>
            <?php endforeach; ?>
        </dl>
    </section>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>

</body>
</html>
