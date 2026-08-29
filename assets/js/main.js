document.addEventListener('DOMContentLoaded', function () {

    // モバイルナビの開閉
    var navToggle = document.getElementById('siteNavToggle');
    var nav = document.getElementById('siteNav');

    if (navToggle && nav) {
        navToggle.addEventListener('click', function () {
            nav.classList.toggle('is-open');
        });
    }

    // 検索欄の開閉（PC用・SP/iPad用の2つのボタンどちらからも開閉できるようにする）
    var searchToggles = [
        document.getElementById('searchToggle'),
        document.getElementById('searchToggleMobile')
    ];
    var search = document.getElementById('siteSearch');

    if (search) {
        searchToggles.forEach(function (btn) {
            if (!btn) return;
            btn.addEventListener('click', function () {
                search.classList.toggle('is-open');
                if (search.classList.contains('is-open')) {
                    var input = search.querySelector('input');
                    if (input) input.focus();
                }
            });
        });
    }

    // ヒーロースライダー
    var heroSlider = document.getElementById('heroSlider');
    if (heroSlider) {
        var slides = Array.prototype.slice.call(heroSlider.querySelectorAll('.hero-slider__slide'));
        var dots = Array.prototype.slice.call(heroSlider.querySelectorAll('.hero-slider__dots button'));
        var prevBtn = heroSlider.querySelector('.hero-slider__arrow--prev');
        var nextBtn = heroSlider.querySelector('.hero-slider__arrow--next');
        var current = 0;
        var timer = null;

        function showSlide(index) {
            current = (index + slides.length) % slides.length;
            slides.forEach(function (slide, i) {
                slide.classList.toggle('is-active', i === current);
            });
            dots.forEach(function (dot, i) {
                dot.classList.toggle('is-active', i === current);
            });
        }

        function next() {
            showSlide(current + 1);
        }

        function startAutoplay() {
            stopAutoplay();
            timer = setInterval(next, 6000);
        }

        function stopAutoplay() {
            if (timer) clearInterval(timer);
        }

        if (prevBtn) {
            prevBtn.addEventListener('click', function () {
                showSlide(current - 1);
                startAutoplay();
            });
        }

        if (nextBtn) {
            nextBtn.addEventListener('click', function () {
                showSlide(current + 1);
                startAutoplay();
            });
        }

        dots.forEach(function (dot, i) {
            dot.addEventListener('click', function () {
                showSlide(i);
                startAutoplay();
            });
        });

        if (slides.length > 1) {
            startAutoplay();
        }
    }

    // 横スクロール（NEW ARRIVAL / PICK UP）の矢印ボタン
    var scrollButtons = document.querySelectorAll('.h-scroll-btn');
    scrollButtons.forEach(function (btn) {
        btn.addEventListener('click', function () {
            var targetId = btn.getAttribute('data-target');
            var dir = parseInt(btn.getAttribute('data-dir'), 10) || 1;
            var track = document.getElementById(targetId);
            if (!track) return;

            var item = track.querySelector('.h-scroll-item');
            var step = item ? item.getBoundingClientRect().width + 28 : 260;
            track.scrollBy({ left: step * dir, behavior: 'smooth' });
        });
    });

    // ランキングのタブ切り替え
    var rankingTabs = document.querySelectorAll('.ranking-tab');
    rankingTabs.forEach(function (tab) {
        tab.addEventListener('click', function () {
            var panelId = tab.getAttribute('data-panel');
            var panel = document.getElementById(panelId);
            if (!panel) return;

            rankingTabs.forEach(function (t) {
                t.classList.remove('is-active');
            });
            document.querySelectorAll('.ranking-panel').forEach(function (p) {
                p.classList.remove('is-active');
            });

            tab.classList.add('is-active');
            panel.classList.add('is-active');
        });
    });

    // 商品詳細ページ：サムネイル切り替え
    var mainImage = document.getElementById('mainImage');
    var thumbs = document.querySelectorAll('.product-gallery__thumb');

    thumbs.forEach(function (thumb) {
        thumb.addEventListener('click', function () {
            if (!mainImage) return;

            var src = thumb.getAttribute('data-src');
            var mirrored = thumb.getAttribute('data-mirror') === '1';

            mainImage.src = src;
            mainImage.classList.toggle('is-mirrored', mirrored);

            thumbs.forEach(function (t) {
                t.classList.remove('is-active');
            });
            thumb.classList.add('is-active');
        });
    });

    // カートページ：数量変更・削除・小計/送料/合計の再計算（フロントのみ、リロードでリセットされる）
    var cartList = document.getElementById('cartList');
    if (cartList) {
        var FREE_SHIPPING_THRESHOLD = 8800;
        var SHIPPING_FEE = 660;

        var formatPrice = function (n) {
            return '¥' + n.toLocaleString('ja-JP');
        };

        var showEmptyCart = function () {
            var page = cartList.closest('.simple-page');
            var summary = document.querySelector('.cart-summary');
            if (!page) return;

            cartList.remove();
            if (summary) summary.remove();

            var empty = document.createElement('div');
            empty.className = 'empty-state';
            empty.innerHTML = '<p>カートに商品がありません。</p><a href="/silver/index.php" class="btn-outline">商品を見る</a>';
            page.appendChild(empty);
        };

        var recalcCart = function () {
            var subtotal = 0;

            cartList.querySelectorAll('.cart-item').forEach(function (item) {
                var price = parseInt(item.getAttribute('data-price'), 10) || 0;
                var valueEl = item.querySelector('.qty-stepper__value');
                var qty = parseInt(valueEl.textContent, 10) || 0;
                var lineTotal = price * qty;

                item.querySelector('.cart-item__subtotal').textContent = formatPrice(lineTotal);
                subtotal += lineTotal;
            });

            var shipping = (subtotal === 0 || subtotal >= FREE_SHIPPING_THRESHOLD) ? 0 : SHIPPING_FEE;

            var subtotalEl = document.getElementById('cartSubtotal');
            var shippingEl = document.getElementById('cartShipping');
            var totalEl = document.getElementById('cartTotal');

            if (subtotalEl) subtotalEl.textContent = formatPrice(subtotal);
            if (shippingEl) shippingEl.textContent = shipping === 0 ? '無料' : formatPrice(shipping);
            if (totalEl) totalEl.textContent = formatPrice(subtotal + shipping);

            if (!cartList.querySelector('.cart-item')) {
                showEmptyCart();
            }
        };

        cartList.addEventListener('click', function (e) {
            var stepBtn = e.target.closest('.qty-stepper__btn');
            if (stepBtn) {
                var item = stepBtn.closest('.cart-item');
                var valueEl = item.querySelector('.qty-stepper__value');
                var qty = parseInt(valueEl.textContent, 10) || 1;
                var step = parseInt(stepBtn.getAttribute('data-step'), 10) || 0;

                qty = Math.max(1, qty + step);
                valueEl.textContent = qty;
                recalcCart();
                return;
            }

            var removeBtn = e.target.closest('.cart-item__remove');
            if (removeBtn) {
                var row = removeBtn.closest('.cart-item');
                if (row) row.remove();
                recalcCart();
            }
        });
    }

    // お気に入りページ：削除（フロントのみ、リロードでリセットされる）
    var favoriteGrid = document.getElementById('favoriteGrid');
    if (favoriteGrid) {
        favoriteGrid.addEventListener('click', function (e) {
            var btn = e.target.closest('.product-card__fav-remove');
            if (!btn) return;

            var wrap = btn.closest('.product-card-wrap');
            if (wrap) wrap.remove();

            if (!favoriteGrid.querySelector('.product-card-wrap')) {
                var page = favoriteGrid.closest('.simple-page');
                if (page) {
                    favoriteGrid.remove();
                    var empty = document.createElement('div');
                    empty.className = 'empty-state';
                    empty.innerHTML = '<p>お気に入りに登録された商品がありません。</p><a href="/silver/index.php" class="btn-outline">商品を見る</a>';
                    page.appendChild(empty);
                }
            }
        });
    }

    // マイページ：デザインモックのため実際には送信しない
    document.querySelectorAll('.js-mock-form').forEach(function (form) {
        form.addEventListener('submit', function (e) {
            e.preventDefault();
        });
    });

    // FAQ：アコーディオン開閉
    var faqItems = document.querySelectorAll('.faq-item');
    faqItems.forEach(function (item) {
        var question = item.querySelector('.faq-item__question');
        if (!question) return;

        question.addEventListener('click', function () {
            item.classList.toggle('is-open');
        });
    });

    // お問い合わせフォーム：デザインモックのため送信せず、サンクス表示に切り替える
    var contactForm = document.getElementById('contactForm');
    var contactThanks = document.getElementById('contactThanks');

    if (contactForm && contactThanks) {
        contactForm.addEventListener('submit', function (e) {
            e.preventDefault();
            contactForm.hidden = true;
            contactThanks.hidden = false;
        });
    }

    // レジ：お支払い方法でクレジットカード欄の表示を切り替え、確定でご注文完了画面へ
    var checkoutForm = document.getElementById('checkoutForm');
    if (checkoutForm) {
        var cardFields = document.getElementById('cardFields');
        var paymentRadios = checkoutForm.querySelectorAll('input[name="payment"]');

        var toggleCardFields = function () {
            var selected = checkoutForm.querySelector('input[name="payment"]:checked');
            if (cardFields) {
                cardFields.hidden = !selected || selected.value !== 'card';
            }
        };

        paymentRadios.forEach(function (radio) {
            radio.addEventListener('change', toggleCardFields);
        });
        toggleCardFields();

        checkoutForm.addEventListener('submit', function (e) {
            e.preventDefault();
            window.location.href = '/silver/order-complete.php';
        });
    }

});
