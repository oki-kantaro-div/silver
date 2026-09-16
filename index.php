<?php
require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/data.php';

$current_cat = null;
$new_items = new_products($products, 8);
$pickups = pickup_products($products);
$ranking = ranking_by_category($products, 5);

$hero_slides = [
    ['image' => '/assets/img/234563.jpg'],
    ['image' => '/assets/img/ブランドティザ.png'],
    ['image' => '/assets/img/234563.jpg'],
];

$page_title = 'Lost Paradaice | Silver925';
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

    <section class="hero-slider" id="heroSlider">
        <div class="hero-slider__track">
            <?php foreach ($hero_slides as $i => $slide): ?>
                <div class="hero-slider__slide <?= $i === 0 ? 'is-active' : '' ?>"
                     style="background-image:url('<?= h($slide['image']) ?>')"></div>
            <?php endforeach; ?>
        </div>

        <button type="button" class="hero-slider__arrow hero-slider__arrow--prev" aria-label="前のスライド">&#8249;</button>
        <button type="button" class="hero-slider__arrow hero-slider__arrow--next" aria-label="次のスライド">&#8250;</button>

        <div class="hero-slider__dots">
            <?php foreach ($hero_slides as $i => $slide): ?>
                <button type="button" class="<?= $i === 0 ? 'is-active' : '' ?>" data-index="<?= $i ?>" aria-label="スライド<?= $i + 1 ?>"></button>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="cat-icons">
        <ul>
            <!-- カテゴリはハードコード（data.phpでは管理しない）。並び順はスマホ版のグリッド配置（列優先）と対応しているため変更しないこと -->
            <li>
                <a href="/category.php?cat=ring">
                    <span class="cat-icons__image">
                        <img src="/assets/img/ring.svg" alt="リング">
                    </span>
                    <span class="cat-icons__label">ring</span>
                </a>
            </li>
            <li>
                <a href="/category.php?cat=bangle">
                    <span class="cat-icons__image">
                        <img src="/assets/img/bangle.svg" alt="バングル">
                    </span>
                    <span class="cat-icons__label">bangle</span>
                </a>
            </li>
            <li>
                <a href="/category.php?cat=bracelet">
                    <span class="cat-icons__image">
                        <img src="/assets/img/bracelet.svg" alt="ブレスレット">
                    </span>
                    <span class="cat-icons__label">bracelet</span>
                </a>
            </li>
            <li>
                <a href="/category.php?cat=pendant">
                    <span class="cat-icons__image">
                        <img src="/assets/img/pendant.svg" alt="ペンダント">
                    </span>
                    <span class="cat-icons__label">pendant</span>
                </a>
            </li>
            <li>
                <a href="/category.php?cat=dogtag">
                    <span class="cat-icons__image">
                        <img src="/assets/img/dogtag.svg" alt="ドッグタグ">
                    </span>
                    <span class="cat-icons__label">dogtag</span>
                </a>
            </li>
            <li>
                <a href="/category.php?cat=earring">
                    <span class="cat-icons__image">
                        <img src="/assets/img/earring.svg" alt="ピアス">
                    </span>
                    <span class="cat-icons__label">earring</span>
                </a>
            </li>
        </ul>
    </section>

    <section class="h-scroll-section">
        <div class="h-scroll-section__head">
            <h2 class="section-heading">NEW ARRIVAL<span class="section-heading__sub">新着アイテム</span></h2>
            <div class="h-scroll-nav">
                <button type="button" class="h-scroll-btn" data-target="newArrivalTrack" data-dir="-1" aria-label="前へ">&#8249;</button>
                <button type="button" class="h-scroll-btn" data-target="newArrivalTrack" data-dir="1" aria-label="次へ">&#8250;</button>
            </div>
        </div>
        <div class="h-scroll-track" id="newArrivalTrack">
            <?php foreach ($new_items as $product): ?>
                <div class="h-scroll-item"><?php include __DIR__ . '/includes/product-card.php'; ?></div>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="h-scroll-section">
        <div class="h-scroll-section__head">
            <h2 class="section-heading">PICK UP<span class="section-heading__sub">おすすめアイテム</span></h2>
            <div class="h-scroll-nav">
                <button type="button" class="h-scroll-btn" data-target="pickupTrack" data-dir="-1" aria-label="前へ">&#8249;</button>
                <button type="button" class="h-scroll-btn" data-target="pickupTrack" data-dir="1" aria-label="次へ">&#8250;</button>
            </div>
        </div>
        <div class="h-scroll-track" id="pickupTrack">
            <?php foreach ($pickups as $product): ?>
                <div class="h-scroll-item"><?php include __DIR__ . '/includes/product-card.php'; ?></div>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="ranking">
        <h2 class="section-heading">RANKING<span class="section-heading__sub">ランキング</span></h2>

        <!-- カテゴリはハードコード（data.phpでは管理しない） -->
        <div class="ranking-tabs" role="tablist">
            <button type="button" class="ranking-tab is-active" data-panel="ranking-ring" role="tab">リング</button>
            <button type="button" class="ranking-tab" data-panel="ranking-pendant" role="tab">ペンダント</button>
            <button type="button" class="ranking-tab" data-panel="ranking-bangle" role="tab">バングル</button>
            <button type="button" class="ranking-tab" data-panel="ranking-dogtag" role="tab">ドッグタグ</button>
            <button type="button" class="ranking-tab" data-panel="ranking-bracelet" role="tab">ブレスレット</button>
            <button type="button" class="ranking-tab" data-panel="ranking-earring" role="tab">ピアス</button>
        </div>

        <div class="ranking-panel is-active" id="ranking-ring" role="tabpanel">
            <div class="ranking-list">
                <?php foreach ($ranking['ring'] as $i => $product): $card_rank = $i + 1; ?>
                    <div class="ranking-list__item"><?php include __DIR__ . '/includes/product-card.php'; ?></div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="ranking-panel" id="ranking-pendant" role="tabpanel">
            <div class="ranking-list">
                <?php foreach ($ranking['pendant'] as $i => $product): $card_rank = $i + 1; ?>
                    <div class="ranking-list__item"><?php include __DIR__ . '/includes/product-card.php'; ?></div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="ranking-panel" id="ranking-bangle" role="tabpanel">
            <div class="ranking-list">
                <?php foreach ($ranking['bangle'] as $i => $product): $card_rank = $i + 1; ?>
                    <div class="ranking-list__item"><?php include __DIR__ . '/includes/product-card.php'; ?></div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="ranking-panel" id="ranking-dogtag" role="tabpanel">
            <div class="ranking-list">
                <?php foreach ($ranking['dogtag'] as $i => $product): $card_rank = $i + 1; ?>
                    <div class="ranking-list__item"><?php include __DIR__ . '/includes/product-card.php'; ?></div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="ranking-panel" id="ranking-bracelet" role="tabpanel">
            <div class="ranking-list">
                <?php foreach ($ranking['bracelet'] as $i => $product): $card_rank = $i + 1; ?>
                    <div class="ranking-list__item"><?php include __DIR__ . '/includes/product-card.php'; ?></div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="ranking-panel" id="ranking-earring" role="tabpanel">
            <div class="ranking-list">
                <?php foreach ($ranking['earring'] as $i => $product): $card_rank = $i + 1; ?>
                    <div class="ranking-list__item"><?php include __DIR__ . '/includes/product-card.php'; ?></div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

</main>

<?php include __DIR__ . '/includes/footer.php'; ?>

</body>
</html>
