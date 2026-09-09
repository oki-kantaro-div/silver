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
| `product.php` | 商品詳細。クエリ `?id={id}` で `find_product()` により該当商品を取得。存在しないIDは `index.php` へリダイレクト。ギャラリー（物撮り／着用／反転）、関連商品（同カテゴリ）を表示する。`category === 'ring'`のときサイズ選択（11号〜21号）、`engravable === true`のとき刻印オプション（+¥6,000、選択でJSが価格表示を再計算）を表示。 |
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
| `$categories` | カテゴリの key => 表示名 の連想配列（`ring`=リング／`pendant`=ペンダント／`bangle`=バングル／`dogtag`=ドッグタグ／`bracelet`=ブレスレット／`earring`=ピアス の6種）。ここに追加すればナビ・カテゴリアイコン・ランキングタブに自動反映される。 |
| `$img_base` | 画像パスのプレフィックス（`/assets/img/`）。 |
| `$products` | 商品データ本体（42件）。各要素のキーは下表の通り。 |
| `$mock_cart_lines` | カートの中身のサンプル（`cart.php` `checkout.php` `order-complete.php`で共通利用）。 |
| `$mock_orders` | マイページの注文履歴サンプル（`account.php`で使用）。各要素は `number` `date` `status` `lines`（`build_cart`に渡す形式）を持つ。 |
| `$mock_member` | マイページの会員情報・お届け先住所サンプル（`account.php`で使用）。 |

#### `$products` の各要素（商品1件あたり）のキー

| キー | 型 | 内容 |
|---|---|---|
| `id` | int | 商品ID。連番で一意に管理。`product.php?id=`での商品指定、カート／注文履歴（`$mock_cart_lines` `$mock_orders`の`lines`）での商品参照に使う。 |
| `name` | string | 商品名。商品カード・商品詳細・関連商品・検索結果などにそのまま表示される。 |
| `category` | string | カテゴリの内部キー。**`$categories`のキーと必ず一致させる**（`ring` `pendant` `bangle` `dogtag` `bracelet` `earring`のいずれか）。カテゴリ絞り込み（`products_by_category()`）・ランキング（`ranking_by_category()`）・カテゴリページの表示判定に使う。 |
| `price` | int | 税込価格（円、カンマや¥記号なしの数値のみ）。`format_price()`で`¥12,800`形式に整形されて表示される。刻印オプションON時は`product.php`側のJSで表示価格に+6,000円が上乗せされる（このキー自体は変化しない）。 |
| `image` | string | メイン商品画像（物撮り）のパス。`$img_base . 'ファイル名'`の形で指定。商品カード・商品詳細のメイン画像・関連商品などで使用。 |
| `worn_image` | string | 着用写真のパス。商品詳細ページのギャラリー2枚目、トップページPICK UPスライダーの奇数番目のカードで使用。 |
| `pickup` | bool | `true`の場合、トップページ「PICK UP」の横スクロール枠に表示される（`pickup_products()`）。 |
| `new` | bool | `true`の場合、トップページ「NEW ARRIVAL」枠に載り、商品カードに「NEW」バッジが付く（`new_products()`）。 |
| `engravable` | bool | `true`の場合、商品詳細ページに「刻印オプション（+¥6,000）」のチェックボックスが表示される。**現状はこのハードコード配列のフラグで管理しており、将来的にはDBのフラグに置き換える想定。** |
| `description` | string | 商品説明文。商品詳細ページに表示。文中に`\n`を入れると`nl2br()`で改行される。検索（`search_products()`）は商品名とこの説明文を対象に部分一致する。 |
| `material` | string | 素材表記。商品詳細ページの「MATERIAL」欄にそのまま表示。 |

※リングのサイズ選択（11号〜21号）は`$products`のキーではなく、`product.php`側で`category === 'ring'`のときだけ自動表示される固定の作り。商品ごとにON/OFFはできない点に注意。

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

## 画像仕様（推奨設定）

実写真に差し替える際の目安。いずれもJPGまたはWebP推奨（透過が必要な場合のみPNG）。

| 用途 | 使用箇所 | 比率 | 推奨サイズ | 備考 |
|---|---|---|---|---|
| スライダー画像（ヒーローバナー） | `index.php`の`$hero_slides`の`image`。表示は`assets/css/style.css`の`.hero-slider`（横幅いっぱい、最大高さ620px） | 2:1（横長） | 1920×960px以上（高解像度ディスプレイ向けは2400×1200px程度） | 文字（見出し・ボタン）が常に画面**左側**に重なる仕様のため、被写体は中央〜右寄りに配置すると文字と喧嘩しない。暗幕グラデーションを常時オーバーレイしているので、写真の明暗を問わず白文字は読める。1枚あたり300〜400KB程度に圧縮。 |
| 商品メイン画像（物撮り） | `$products`の`image`。商品カード・商品詳細メイン画像・関連商品・カート/レジ/マイページのサムネイル等、サイト全体で使い回される | 1:1（正方形） | 1200×1200px以上 | 背景は白またはグレー推奨、コントラスト強めでシルバーを際立たせる。商品詳細のメイン画像は最大560px角程度で表示されるため、1200px角あれば retina でも十分な解像度。 |
| 商品着用画像 | `$products`の`worn_image`。商品詳細ギャラリー2枚目、トップPICK UPスライダー | 1:1（正方形） | 1200×1200px以上 | 手・首・耳など着用部位のみを写した写真。物撮りと同じ比率・解像度で統一。 |
| カテゴリアイコン | `assets/img/{カテゴリキー}.svg`（例：`ring.svg` `pendant.svg`）。`index.php`のカテゴリアイコン行で円形にクロップして表示 | 1:1（正方形） | 400×400px以上 | 表示は円形（PCで84px、スマホで68px程度）なので、被写体は中央に寄せる。商品写真ではなくカテゴリの象徴的なカット1枚でよい。 |
| ロゴ | `assets/img/main-logo-3.png`。`includes/header.php`で高さ38px（極小スマホは30px）に自動縮小して表示 | 横長（現状1728×910px） | 現状のサイズで十分。差し替える場合も高さ100px前後・幅は比率に応じたPNG推奨（背景透過なしの現行踏襲でも可） | - |

新しいカテゴリを追加する場合は、上記「カテゴリアイコン」の仕様で `assets/img/{新しいキー}.svg`（または`.jpg`/`.png`）を用意すること（ファイルが無いと画像が404になる。実際に`pendant`カテゴリ追加時に一度この抜けが発生している）。

---

## 既知の制約・保守上の注意点

- **フロントのみ**：カート・お気に入り・ログイン・注文・お問い合わせ等、すべての「送信」「保存」はJSによる見た目上の処理のみ。ページ再読み込みで状態はリセットされる。実装時はセッション/DB/API連携への置き換えが必要。
- **仮データの差し替えが必要な箇所**：`company.php`の`$company_info`、`legal-notice.php`の`$legal_info`、`account.php`が参照する`$mock_member`／`$mock_orders`（`data.php`内）。
- **法的文書は雛形**：`privacy-policy.php` `terms.php` `refund-policy.php` `legal-notice.php` は一般的なEC向けサンプル文言であり、公開前に内容の確認・専門家への相談が必要。
- **SNSリンク未設定**：`footer.php`内のInstagram/X/LINE/Facebook/TikTokは全て`href="#"`。
- **キャッシュバスティング**：CSSは`head-assets.php`、JSは`footer.php`でそれぞれ`filemtime()`によるクエリ文字列を付与済み。新しく`<link>`や`<script>`を追加する場合も同様の対応を推奨。
