<?php
$current_cat = isset($current_cat) ? $current_cat : null;

$icon_fav = '<svg viewBox="0 0 20 20" width="18" height="18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10 17.2C10 17.2 2.3 12.6 2.3 6.9C2.3 4.1 4.4 2 7.1 2C8.7 2 10 2.8 10 4.1C10 2.8 11.3 2 12.9 2C15.6 2 17.7 4.1 17.7 6.9C17.7 12.6 10 17.2 10 17.2Z" stroke="currentColor" stroke-width="1.3" stroke-linejoin="round"/></svg>';

$icon_mypage = '<svg viewBox="0 0 20 20" width="18" height="18" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="10" cy="6.4" r="3.4" stroke="currentColor" stroke-width="1.3"/><path d="M3.2 18C3.2 13.6 6.2 11.1 10 11.1C13.8 11.1 16.8 13.6 16.8 18" stroke="currentColor" stroke-width="1.3" stroke-linecap="round"/></svg>';

$icon_search = '<svg viewBox="0 0 20 20" width="18" height="18" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="8.6" cy="8.6" r="5.8" stroke="currentColor" stroke-width="1.3"/><line x1="13" y1="13" x2="17.8" y2="17.8" stroke="currentColor" stroke-width="1.3" stroke-linecap="round"/></svg>';

$icon_cart = '<svg viewBox="0 0 20 20" width="18" height="18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5.2 7H14.8L14.1 17.2H5.9L5.2 7Z" stroke="currentColor" stroke-width="1.3" stroke-linejoin="round"/><path d="M7.6 7V5.6C7.6 3.8 8.7 2.4 10 2.4C11.3 2.4 12.4 3.8 12.4 5.6V7" stroke="currentColor" stroke-width="1.3"/></svg>';
?>
<div class="announce-bar"></div>

<header class="site-header">

    <!-- PC（1025px以上）専用ヘッダー行：現状のまま -->
    <div class="site-header__row site-header__row--desktop">
        <p class="site-header__greeting">ようこそ ゲスト 様</p>

        <a href="/index.php" class="site-logo">
            <img src="/assets/img/site_logo_touka.png" alt="Lost Paradise" class="site-logo__img site-logo__img--desktop site-logo__img--default">
            <img src="/assets/img/site_logo_Flip.png" alt="Lost Paradise" class="site-logo__img site-logo__img--desktop site-logo__img--flip">
        </a>

        <div class="site-header__utility">
            <a href="/favorites.php" class="utility-link" aria-label="お気に入り">
                <span class="utility-link__icon"><?= $icon_fav ?></span>
                <span class="utility-link__text">お気に入り</span>
            </a>

            <a href="/mypage.php" class="utility-link" aria-label="マイページ">
                <span class="utility-link__icon"><?= $icon_mypage ?></span>
                <span class="utility-link__text">マイページ</span>
            </a>

            <button type="button" class="utility-link" id="searchToggle" aria-label="検索">
                <span class="utility-link__icon"><?= $icon_search ?></span>
                <span class="utility-link__text">検索</span>
            </button>

            <a href="/cart.php" class="utility-link site-cart" aria-label="カート">
                <span class="utility-link__icon"><?= $icon_cart ?></span>
                <span class="utility-link__text">カート (0)</span>
            </a>
        </div>
    </div>

    <!-- スマホ・iPad（1024px以下）専用ヘッダー行：検索/ハンバーガーを左、マイページ/カートを右に -->
    <div class="site-header__row site-header__row--mobile">
        <div class="site-header__left">
            <button type="button" class="utility-link" id="searchToggleMobile" aria-label="検索">
                <span class="utility-link__icon"><?= $icon_search ?></span>
            </button>
            <button type="button" class="site-menu-toggle" id="siteNavToggle" aria-label="メニュー">
                <span></span><span></span><span></span>
            </button>
        </div>

        <a href="/index.php" class="site-logo">
            <img src="/assets/img/site_logo_touka.png" alt="Lost Paradise" class="site-logo__img site-logo__img--mobile site-logo__img--default">
            <img src="/assets/img/site_logo_Flip.png" alt="Lost Paradise" class="site-logo__img site-logo__img--mobile site-logo__img--flip">
        </a>

        <div class="site-header__right">
            <a href="/mypage.php" class="utility-link" aria-label="マイページ">
                <span class="utility-link__icon"><?= $icon_mypage ?></span>
            </a>
            <a href="/cart.php" class="utility-link site-cart" aria-label="カート">
                <span class="utility-link__icon"><?= $icon_cart ?></span>
            </a>
        </div>
    </div>

    <form class="site-search" id="siteSearch" action="/search.php" method="get">
        <input type="search" name="q" placeholder="商品を検索する" aria-label="商品を検索する" value="<?= h($_GET['q'] ?? '') ?>">
        <button type="submit">検索</button>
    </form>

    <!-- カテゴリはハードコード（data.phpでは管理しない） -->
    <nav class="site-nav" id="siteNav">
        <ul>
            <li>
                <a href="/index.php" class="<?= $current_cat === null ? 'is-active' : '' ?>">TOP</a>
            </li>
            <li>
                <a href="/category.php?cat=ring" class="<?= $current_cat === 'ring' ? 'is-active' : '' ?>">ring</a>
            </li>
            <li>
                <a href="/category.php?cat=bangle" class="<?= $current_cat === 'bangle' ? 'is-active' : '' ?>">bangle</a>
            </li>
            <li>
                <a href="/category.php?cat=bracelet" class="<?= $current_cat === 'bracelet' ? 'is-active' : '' ?>">bracelet</a>
            </li>
            <li>
                <a href="/category.php?cat=pendant" class="<?= $current_cat === 'pendant' ? 'is-active' : '' ?>">pendant</a>
            </li>
            <li>
                <a href="/category.php?cat=dogtag" class="<?= $current_cat === 'dogtag' ? 'is-active' : '' ?>">dogtag</a>
            </li>
            <li>
                <a href="/category.php?cat=earring" class="<?= $current_cat === 'earring' ? 'is-active' : '' ?>">earring</a>
            </li>
            <li class="site-nav__fav">
                <a href="/favorites.php">
                    <span class="site-nav__fav-icon"><?= $icon_fav ?></span>
                    お気に入り
                </a>
            </li>
        </ul>
    </nav>

    <!-- スマホ・iPad専用：200pxほどスクロールすると表示されるカテゴリナビ（こちらもハードコード） -->
    <nav class="sticky-cat-nav" id="stickyCatNav">
        <ul>
            <li>
                <a href="/category.php?cat=ring" class="<?= $current_cat === 'ring' ? 'is-active' : '' ?>">リング</a>
            </li>
            <li>
                <a href="/category.php?cat=pendant" class="<?= $current_cat === 'pendant' ? 'is-active' : '' ?>">ペンダント</a>
            </li>
            <li>
                <a href="/category.php?cat=bangle" class="<?= $current_cat === 'bangle' ? 'is-active' : '' ?>">バングル</a>
            </li>
            <li>
                <a href="/category.php?cat=dogtag" class="<?= $current_cat === 'dogtag' ? 'is-active' : '' ?>">ドッグタグ</a>
            </li>
            <li>
                <a href="/category.php?cat=bracelet" class="<?= $current_cat === 'bracelet' ? 'is-active' : '' ?>">ブレスレット</a>
            </li>
            <li>
                <a href="/category.php?cat=earring" class="<?= $current_cat === 'earring' ? 'is-active' : '' ?>">ピアス</a>
            </li>
        </ul>
    </nav>
</header>