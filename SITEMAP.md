# SILVER サイト構成（保守用ドキュメント）

フロントエンドのみのデザインモック。バックエンド・DB・セッションは無く、`includes/data.php` にハードコードしたサンプルデータをPHPで表示しているだけの状態。すべてのフォーム送信・カート操作・ログインはJS側での見た目上の処理のみで、ページを再読み込みすると状態はリセットされる。

## ディレクトリ構成

```
silver/
├─ *.php                 … 各ページ（ルート直下）
├─ includes/             … 共通パーツ・データ・関数
├─ assets/
│   ├─ css/style.css     … 全ページ共通スタイル
│   ├─ js/main.js        … 全ページ共通スクリプト
│   └─ img/              … 商品画像・線画プレースホルダー・ロゴ
└─ SITEMAP.md            … 本ファイル
```

---

## ページ一覧（ルート直下の`*.php`）

各ページは共通して `includes/functions.php` と `includes/data.php` を読み込み、`includes/head-assets.php` → `includes/header.php` → 本文 → `includes/footer.php` の順で構成される。

### トップ・商品閲覧

| ファイル | 役割・責務 |
|---|---|
| `index.php` | トップページ。ヒーロースライダー／カテゴリアイコン／NEW ARRIVAL・PICK UPの横スクロール／ランキング（カテゴリタブ）を表示する。`new_products()` `pickup_products()` `ranking_by_category()` を使って `$products` から表示用データを組み立てる。 |
| `category.php` | カテゴリ別の商品一覧。クエリ `?cat={key}` で `$categories` のキーを受け取り、`products_by_category()` で絞り込んで `product-card.php` を並べる。不正な`cat`値は「全件表示」扱いにフォールバックする。 |
| `product.php` | 商品詳細。クエリ `?id={id}` で `find_product()` により該当商品を取得。存在しないIDは `index.php` へリダイレクト。ギャラリー（物撮り／着用／反転）、関連商品（同カテゴリ）を表示する。 |
| `search.php` | 検索結果。クエリ `?q={keyword}` を `search_products()` に渡し、商品名・説明文の部分一致でヒットしたものを一覧表示。ヘッダーの検索フォーム（`header.php`内）から遷移してくる。 |

### 購入フロー

| ファイル | 役割・責務 |
|---|---|
| `cart.php` | カート画面。`$mock_cart_lines`（固定サンプル）を `build_cart()` で商品情報・小計・送料・合計に変換して表示。数量増減・削除・再計算は `main.js` 側のJSのみで完結し、サーバーには反映されない。「レジに進む」→`checkout.php`。 |
| `checkout.php` | レジ（お届け先入力・支払い方法選択）。`$mock_cart_lines` が空の場合は `cart.php` へリダイレクト。支払い方法でクレジットカード欄の表示切替をJSで行う。送信（`#checkoutForm`）は実送信されず、JSが `order-complete.php` へ遷移させるだけ。 |
| `order-complete.php` | 注文完了画面。アクセスの都度 `random_int()` で注文番号を生成して表示するだけで、実際の注文確定処理は無い。 |

### 会員関連

| ファイル | 役割・責務 |
|---|---|
| `mypage.php` | 未ログイン状態の入口。ログインフォーム（`#loginForm`）と、新規登録への案内（`register.php`へのリンク）を並べる。ログインフォーム送信は実認証せず、JSが `account.php` へ遷移させるだけ。 |
| `register.php` | 新規会員登録フォーム（`#registerForm`）。送信は実登録処理をせず、JSが `account.php` へ遷移させるだけ。 |
| `account.php` | ログイン後想定のマイページ本体。`$mock_orders`（注文履歴）・`$mock_member`（会員情報・住所）を表示。左ナビ（注文履歴／お届け先住所／会員情報）はJSによるタブ切り替え（同一DOM内での表示・非表示）。「ログアウト」は `mypage.php` へのリンク。 |
| `favorites.php` | お気に入り一覧。固定のお気に入り商品ID配列から `product-card.php` を並べる。カードごとの削除ボタンはJSでその場から要素を消すのみ（再読み込みで復活）。 |

### 情報・規約ページ

| ファイル | 役割・責務 |
|---|---|
| `guide.php` | ご利用ガイド。ご注文の流れ／お支払い方法（`#payment`アンカーあり）／配送について／返品・交換についてを掲載。 |
| `faq.php` | よくあるご質問。`$faqs` 配列（ファイル内にハードコード）をアコーディオン表示。開閉はJS（`.faq-item`の`is-open`クラス切替）。 |
| `contact.php` | お問い合わせフォーム。送信（`#contactForm`）は実送信されず、JSがフォームを隠してサンクスメッセージ（`#contactThanks`）に差し替えるだけ。 |
| `company.php` | 会社情報。`$company_info` 連想配列（**全て仮の値**）を `dl` で表示。公開前に要差し替え。 |
| `privacy-policy.php` | プライバシーポリシー。一般的なEC向けの雛形文章（法的な正式文書ではない旨をページ内に明記）。 |
| `terms.php` | ご利用規約。第1条〜第9条の雛形文章。 |
| `refund-policy.php` | 返品ポリシー。`guide.php` の簡易記載を独立ページとして詳細化したもの。 |
| `legal-notice.php` | 特定商取引法に基づく表記。`$legal_info` 連想配列（**全て仮の値**）を `dl` で表示。公開前に要差し替え。 |

### フッターのみ・未作成

以下はフッターの「SNSリンク」に存在するが、リンク先は `#` のプレースホルダーのまま（実際のSNSアカウントURLが決まり次第、`includes/footer.php` 内の該当`href`を差し替える）。

- Instagram / X / LINE / Facebook / TikTok

---

## 共通モジュール（`includes/`）

| ファイル | 役割・責務 |
|---|---|
| `head-assets.php` | `<head>`内のCSS（`style.css`）・Google Fonts（Cormorant Garamond / Noto Sans JP）読み込みを担当。CSSは `filemtime()` を使ったクエリ文字列でキャッシュバスティングしており、`style.css`編集後にブラウザキャッシュで反映されない事態を防いでいる。全ページがこの1ファイルをincludeする（重複防止）。 |
| `header.php` | サイト共通ヘッダー。**PC（1025px以上）用**と**SP・iPad（1024px以下）用**で別々のマークアップ（`.site-header__row--desktop` / `--mobile`）を出力し、CSS側のメディアクエリで出し分ける。検索フォーム（`#siteSearch`、`search.php`へGET送信）、カテゴリナビ（`$categories`から動的生成）、モバイル用ドロワー（`#siteNav`、お気に入りリンクを内包）を含む。アイコンSVGはPHP変数（`$icon_fav`等）として定義し使い回している。 |
| `footer.php` | サイト共通フッター。SHOP（カテゴリ一覧）／GUIDE／ABOUTの3カラムと、SNSアイコン5種（オリジナルの線画SVG、`$sns_icon_*`変数）を表示。 |
| `functions.php` | 共通ヘルパー関数群（詳細は下表）。 |
| `data.php` | 全ページ共通のダミーデータ定義（詳細は下表）。 |
| `product-card.php` | 商品カード1枚分のパーツ。呼び出し側で `$product` 変数をセットしてincludeする。`$card_rank` をセットするとランキング順位バッジ、`$product['new']`が真ならNEWバッジを表示。`index.php`・`category.php`・`search.php`・`product.php`（関連商品）・`favorites.php`から共通利用。 |

### `functions.php` の関数一覧

| 関数 | 役割 |
|---|---|
| `h($value)` | `htmlspecialchars()`のラッパー。XSS対策のため出力時は必ずこれを通す。 |
| `format_price($price)` | 数値を `¥12,800` 形式の文字列に整形。 |
| `find_product($products, $id)` | IDから商品1件を検索。 |
| `pickup_products($products)` | `pickup=true`の商品のみ抽出（トップページPICK UP用）。 |
| `products_by_category($products, $category)` | カテゴリで絞り込み。`$category`がnullなら全件。 |
| `new_products($products, $limit=8)` | `new=true`の商品を先頭から`$limit`件（トップページNEW ARRIVAL用）。 |
| `ranking_by_category($products, $categories, $limit=5)` | カテゴリごとに先頭`$limit`件を抽出した連想配列を返す（ランキング用）。 |
| `build_cart($products, $lines, $free_shipping_threshold=8800, $shipping_fee=660)` | `[['id'=>..,'qty'=>..], ...]`形式の行データから、商品情報付与・小計・送料判定・合計を計算した連想配列を返す。`cart.php` `checkout.php` `order-complete.php` `account.php`（注文履歴）で共通利用。 |
| `search_products($products, $keyword)` | キーワードで商品名・説明文を部分一致検索（`mb_stripos`）。 |

### `data.php` の変数一覧

| 変数 | 内容 |
|---|---|
| `$categories` | カテゴリの key => 表示名 の連想配列（`ring` `necklace` `bracelet` `earring` `dogtag` `bangle` の6種）。ここに追加すればナビ・カテゴリアイコン・ランキングタブに自動反映される。 |
| `$img_base` | 画像パスのプレフィックス（`/silver/assets/img/`）。 |
| `$products` | 商品データ本体（25件）。各要素は `id` `name` `category` `price` `image` `worn_image` `pickup` `new` `description` `material` を持つ。 |
| `$mock_cart_lines` | カートの中身のサンプル（`cart.php` `checkout.php` `order-complete.php`で共通利用）。 |
| `$mock_orders` | マイページの注文履歴サンプル（`account.php`で使用）。各要素は `number` `date` `status` `lines`（`build_cart`に渡す形式）を持つ。 |
| `$mock_member` | マイページの会員情報・お届け先住所サンプル（`account.php`で使用）。 |

---

## アセット（`assets/`）

| パス | 内容 |
|---|---|
| `assets/css/style.css` | 全ページ共通スタイル。1ファイルにセクションコメント区切りで全コンポーネントを記述（ヘッダー／ヒーロー／商品カード／カート／レジ／マイページダッシュボード／フッター等）。レスポンシブは主に `768px` `1024px` `1025px`（PC/SP・iPad境界）`360px`（極小スマホ）を基準にしたメディアクエリ。 |
| `assets/js/main.js` | 全ページ共通スクリプト。`DOMContentLoaded`内に機能ごとブロックで実装（ナビ開閉／検索欄開閉／ヒーロースライダー／横スクロール矢印／ランキングタブ／商品ギャラリー／カート再計算／お気に入り削除／各種モックフォームのsubmit制御／FAQアコーディオン／マイページダッシュボードのタブ切替）。IDが存在しない場合は各処理が早期returnするため、ページごとに必要な部分だけが動作する。 |
| `assets/img/*.svg` | オリジナルの線画プレースホルダー（商品カテゴリごとの物撮り風・着用風、ヒーローバナー用の抽象柄）。実写真が無いカテゴリ・商品はこれらが表示される。 |
| `assets/img/test_*.jpg` | 差し替え済みの実商品写真（一部商品のみ）。 |
| `assets/img/main-logo-3.png` | ヘッダーのロゴ画像（"Lost Paradise"のワードマーク）。 |

---

## 既知の制約・保守上の注意点

- **フロントのみ**：カート・お気に入り・ログイン・注文・お問い合わせ等、すべての「送信」「保存」はJSによる見た目上の処理のみ。ページ再読み込みで状態はリセットされる。実装時はセッション/DB/API連携への置き換えが必要。
- **仮データの差し替えが必要な箇所**：`company.php`の`$company_info`、`legal-notice.php`の`$legal_info`、`account.php`が参照する`$mock_member`／`$mock_orders`（`data.php`内）。
- **法的文書は雛形**：`privacy-policy.php` `terms.php` `refund-policy.php` `legal-notice.php` は一般的なEC向けサンプル文言であり、公開前に内容の確認・専門家への相談が必要。
- **SNSリンク未設定**：`footer.php`内のInstagram/X/LINE/Facebook/TikTokは全て`href="#"`。
- **キャッシュバスティング**：CSSは`head-assets.php`、JSは`footer.php`でそれぞれ`filemtime()`によるクエリ文字列を付与済み。新しく`<link>`や`<script>`を追加する場合も同様の対応を推奨。
