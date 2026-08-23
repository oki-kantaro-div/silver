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

});
