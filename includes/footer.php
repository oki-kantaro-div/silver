<?php
$sns_icon_instagram = '<svg viewBox="0 0 20 20" width="18" height="18" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="2.5" y="2.5" width="15" height="15" rx="4" stroke="currentColor" stroke-width="1.3"/><circle cx="10" cy="10" r="4" stroke="currentColor" stroke-width="1.3"/><circle cx="14.3" cy="5.7" r="0.9" fill="currentColor"/></svg>';

$sns_icon_x = '<svg viewBox="0 0 20 20" width="18" height="18" fill="none" xmlns="http://www.w3.org/2000/svg"><line x1="4" y1="4" x2="16" y2="16" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/><line x1="16" y1="4" x2="4" y2="16" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/></svg>';

$sns_icon_line = '<svg viewBox="0 0 20 20" width="18" height="18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10 3.5C5.6 3.5 2 6.4 2 10C2 12.9 4.3 15.3 7.5 16.1C7.7 16.2 7.9 16.3 7.9 16.6C7.9 16.8 7.7 17.6 7.6 17.9C7.6 18.2 7.8 18.4 8.1 18.2C8.5 17.9 10.4 16.7 11.4 15.9C11.6 15.7 11.8 15.7 12 15.7C16 15.3 18 12.5 18 10C18 6.4 14.4 3.5 10 3.5Z" stroke="currentColor" stroke-width="1.3" stroke-linejoin="round"/></svg>';

$sns_icon_base = '<svg viewBox="0 0 20 20" width="18" height="18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10 8V3M10 8L7.2 4.8M10 8L12.8 4.8" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/><path d="M10 8L17 17H3L10 8Z" stroke="currentColor" stroke-width="1.3" stroke-linejoin="round"/><path d="M6.3 13L8.3 15.6L10 13.2L11.7 15.6L13.7 13" stroke="currentColor" stroke-width="1.1" stroke-linecap="round" stroke-linejoin="round"/></svg>';

$sns_icon_tiktok = '<svg viewBox="0 0 20 20" width="18" height="18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7.5 8H5.8C4.8 8 4 8.8 4 9.8V15.2C4 16.2 4.8 17 5.8 17H14.2C15.2 17 16 16.2 16 15.2V9.8C16 8.8 15.2 8 14.2 8H12.5" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/><path d="M7.5 8V6.5C7.5 5 8.7 3.8 10 3.8C11.3 3.8 12.5 5 12.5 6.5V8" stroke="currentColor" stroke-width="1.3" stroke-linecap="round"/><circle cx="7.5" cy="8.3" r="0.9" fill="currentColor"/><circle cx="12.5" cy="8.3" r="0.9" fill="currentColor"/><path d="M11.6 10.2V13.6C11.6 14.4 10.9 15.1 10.1 15.1C9.3 15.1 8.6 14.4 8.6 13.6C8.6 12.8 9.3 12.1 10.1 12.1C10.3 12.1 10.5 12.1 10.6 12.2M11.6 10.2C11.6 10.9 12.2 11.5 13 11.5" stroke="currentColor" stroke-width="1.1" stroke-linecap="round" stroke-linejoin="round"/></svg>';
?>
<footer class="site-footer">
    <div class="site-footer__inner">

        <div class="site-footer__top">
            <div class="site-footer__brand">
                <p class="site-footer__logo">Lost Paradaice</p>
                <p class="site-footer__tagline">Silver jewelry, quietly refined.</p>
            </div>

            <div class="site-footer__col">
                <p class="site-footer__heading">SHOP</p>
                <ul>
                    <!-- カテゴリはハードコード（data.phpでは管理しない） -->
                    <li><a href="/index.php">TOP</a></li>
                    <li><a href="/category.php?cat=ring">リング</a></li>
                    <li><a href="/category.php?cat=bangle">バングル</a></li>
                    <li><a href="/category.php?cat=bracelet">ブレスレット</a></li>
                    <li><a href="/category.php?cat=pendant">ペンダント</a></li>
                    <li><a href="/category.php?cat=dogtag">ドッグタグ</a></li>
                    <li><a href="/category.php?cat=earring">ピアス</a></li>
                </ul>
            </div>

            <div class="site-footer__col">
                <p class="site-footer__heading">GUIDE</p>
                <ul>
                    <li><a href="/guide.php">ご利用ガイド</a></li>
                    <li><a href="/guide.php#payment">お支払い・配送について</a></li>
                    <li><a href="/refund-policy.php">返品ポリシー</a></li>
                    <li><a href="/faq.php">よくあるご質問</a></li>
                    <li><a href="/contact.php">お問い合わせ</a></li>
                </ul>
            </div>

            <div class="site-footer__col">
                <p class="site-footer__heading">ABOUT</p>
                <ul>
                    <li><a href="/company.php">代表者紹介</a></li>
                    <li><a href="/privacy-policy.php">プライバシーポリシー</a></li>
                    <li><a href="/terms.php">ご利用規約</a></li>
                    <li><a href="/legal-notice.php">特定商取引法に基づく表記</a></li>
                </ul>
            </div>
        </div>

        <div class="site-footer__bottom">
            <p class="site-footer__copy">&copy; <?= date('Y') ?> Lost Paradaice</p>
            <ul class="site-footer__sns">
                <li><a href="https://www.instagram.com/lostparadise.silver?stkn=MThsMnByaXE1NnY3NA%3D%3D&utm_source=qr" class="sns-link" aria-label="Instagram"><?= $sns_icon_instagram ?></a></li>
                <li><a href="https://x.com/lostparadise925?s=11" class="sns-link" aria-label="X"><?= $sns_icon_x ?></a></li>
                <li><a href="https://lin.ee/TjmbdFw" class="sns-link" aria-label="LINE"><?= $sns_icon_line ?></a></li>
                <li><a href="https://lostpara925.base.shop/" class="sns-link" aria-label="BASE"><?= $sns_icon_base ?></a></li>
                <li><a href="https://vt.tiktok.com/ZSq5c2Fnm/?page=TikTokShop" class="sns-link" aria-label="TikTok Shop"><?= $sns_icon_tiktok ?></a></li>
            </ul>
        </div>

    </div>
</footer>

<script src="/assets/js/main.js?v=<?= filemtime(__DIR__ . '/../assets/js/main.js') ?>"></script>
