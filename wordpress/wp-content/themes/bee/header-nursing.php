<!DOCTYPE HTML>
<html <?php language_attributes(); ?>> 
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>"> 
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta property="og:image" content="<?php bloginfo('template_directory');?>/assets/image/common/ogp.jpg">

<!-- Logicad cv tag -->
<script type="text/javascript">
(function(s,m,n,l,o,g,i,c,a,d){c=(s[o]||(s[o]={}))[g]||(s[o][g]={});if(c[i])return;c[i]=function(){(c[i+"_queue"]||(c[i+"_queue"]=[])).push(arguments)};a=m.createElement(n);a.charset="utf-8";a.async=true;a.src=l;d=m.getElementsByTagName(n)[0];d.parentNode.insertBefore(a,d)})(window,document,"script","https://cd.ladsp.com/script/conv2.js","Smn","Logicad","conv");
</script>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5Q4FCV8');</script>
<!-- End Google Tag Manager -->

<!-- TETORI tag www.supercourt.jp -->
<script>
(function (w, d, s, u) {
  // TAG VERSION 1.00
  if (w._wsq_init_flg) {
    return false;
  }
  w._wsq_init_flg = true;
  _wsq = w._wsq || (_wsq = []);
  _wsq.push(['init', u, 3119]);
  _wsq.push(['domain', 'www.supercourt.jp']);
  var a = d.createElement(s); a.async = 1; a.charset='UTF-8'; a.src = 'https://cdn.' + u + '/share/js/tracking.js';
  var b = d.getElementsByTagName(s)[0]; b.parentNode.insertBefore(a, b);
})(window, document, 'script', 'tetori.link');
</script>


<!-- google fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&family=Roboto:wght@400;500;700&family=EB+Garamond:ital,wght@0,400..800;1,400..800&family=Shippori+Mincho:wght@400;500;600;700&display=swap" rel="stylesheet">
<link href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css">

<?php
/**
 * パーキンソン病専門ページ専用 構造化マークアップ（直接記述版）
 */
$graph = [];

// 1. Organization (組織情報)
$graph[] = [
    "@type" => "Organization",
    "@id" => "https://www.supercourt.jp/#organization",
    "name" => "株式会社スーパー・コート",
    "url" => "https://www.supercourt.jp/",
    "logo" => "https://www.supercourt.jp/wordpress/wp-content/themes/bee/assets/image/common/logo_type.svg"
];

// 2. WebPage (ページ概要)
$graph[] = [
    "@type" => "WebPage",
    "@id" => home_url('/service/nursing/') . "#webpage",
    "url" => home_url('/service/nursing/'),
    "name" => "パーキンソン病専門の老人ホーム・介護施設【スーパー・コート】大阪・兵庫・京都・奈良・滋賀",
    "description" => "大阪・兵庫・京都・奈良・滋賀でパーキンソン病・神経難病に特化したリハビリ専門老人ホーム。免荷装置を用いた最新の歩行訓練、24時間看護体制、専門医との連携で安心の暮らしを提供します。",
    "isPartOf" => ["@id" => "https://www.supercourt.jp/#organization"]
];

// 3. BreadcrumbList (パンくずリスト)
$graph[] = [
    "@type" => "BreadcrumbList",
    "itemListElement" => [
        [
            "@type" => "ListItem",
            "position" => 1,
            "name" => "TOP",
            "item" => home_url('/')
        ],
        [
            "@type" => "ListItem",
            "position" => 2,
            "name" => "サービス",
            "item" => home_url('/service/')
        ],
        [
            "@type" => "ListItem",
            "position" => 3,
            "name" => "パーキンソン病専門の老人ホーム・介護施設",
            "item" => home_url('/service/nursing/')
        ]
    ]
];

// 4. FAQPage (よくある質問：ページ内のテキストを直接記述)
$graph[] = [
    "@type" => "FAQPage",
    "mainEntity" => [
        [
            "@type" => "Question",
            "name" => "「リハビリ特化型ナーシングホーム」の入居対象はどんな人ですか？",
            "acceptedAnswer" => [
                "@type" => "Answer",
                "text" => "スーパー・コートが直営するパーキンソン病などの難病の専門介護施設「リハビリ特化型ナーシングホーム」では、パーキンソン病（ヤール3以上）、進行性核上性麻痺、多系統萎縮症、脊髄小脳変性症、がん末期、ALS、人工呼吸器使用状態など、厚生労働大臣が定める特定の疾患・状態の方を入居対象としています。"
            ]
        ],
        [
            "@type" => "Question",
            "name" => "入居にかかる料金はいくらぐらいですか？",
            "acceptedAnswer" => [
                "@type" => "Answer",
                "text" => "入居金は0円です。月額利用料は98,000円〜ですが、施設により異なりますので、詳しくはお問い合わせください。"
            ]
        ],
        [
            "@type" => "Question",
            "name" => "リハビリの頻度はどれぐらいですか？",
            "acceptedAnswer" => [
                "@type" => "Answer",
                "text" => "リハビリの実施は週5回行える体制を整えています。医師の指示のもとお一人おひとりに適切な回数で、1回あたり30分程度で実施しております。"
            ]
        ],
        [
            "@type" => "Question",
            "name" => "家族の面会は可能ですか？",
            "acceptedAnswer" => [
                "@type" => "Answer",
                "text" => "9:00～18:00の間で可能です。それ以外の時間でも事前にご連絡いただければ柔軟に対応させていただきます。"
            ]
        ],
        [
            "@type" => "Question",
            "name" => "食事は施設内で作っていますか？",
            "acceptedAnswer" => [
                "@type" => "Answer",
                "text" => "はい、施設内の厨房で調理を行っております。出来立ての温かく安全なお食事をご提供いたします。"
            ]
        ]
    ]
];

// 出力
echo '<script type="application/ld+json">' . json_encode([
    "@context" => "https://schema.org",
    "@graph" => $graph
], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . '</script>';
?>

<?php wp_head(); ?>
</head>
<body id="body" data-tmpdir="<?php echo esc_url(get_template_directory_uri()); ?>/">

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5Q4FCV8"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

<div class="site-wrap">

<header id="header" <?php if(is_front_page()):?>class="header top-header"<?php else: ?>class="header"<?php endif;?>>
    <div class="header-wrap">
      <?php if(is_front_page()):?>
      <h1 class="header-logo mv-logo">
        <a href="/">
          <img src="<?php bloginfo('template_directory');?>/assets/image/common/logo_type.svg" alt="老人ホーム・介護施設のスーパー・コート">
        </a>
      </h1>
      <?php else: ?>
      <div class="header-logo mv-logo">
        <a href="/">
          <img src="<?php bloginfo('template_directory');?>/assets/image/common/logo_type.svg" alt="老人ホーム・介護施設のスーパー・コート">
        </a>
      </div>
      <?php endif;?>
      <nav class="header-nav txt-bold">
        <ul>

          <li>
            <div class="header-nav__txt">
              <p>スーパー・コートについて</p>
              <span class="header-nav__arrow"></span>
              <ul class="header-nav__child">
                <li>
                  <a href="/company">スーパー・コートとは</a>
                </li>
                <li>
                  <a href="/service">スーパー・コートのサービス</a>
                </li>
                <li>
                  <a href="/service/nursing">パーキンソン病専門施設とは</a>
                </li>
              </ul>
            </div>
          </li>

          <li>
            <div class="header-nav__txt">
              <a href="/feature">特徴</a>
              <span class="header-nav__arrow"></span>
              <ul class="header-nav__child">
                <li>
                  <a href="/feature/hospitality">ホスピタリティ</a>
                </li>
                <li>
                  <a href="/feature/medical">安心の医療体制</a>
                </li>
                <li>
                  <a href="/feature/dementia">認知症ケア</a>
                </li>
                <li>
                  <a href="/feature/training">リハビリ・トレーニング</a>
                </li>
                <li>
                  <a href="/feature/bath">天然温泉</a>
                </li>
                <li>
                  <a href="/feature/meal">おいしい食事・水・空気</a>
                </li>
                <li>
                  <a href="/feature/event">イベント・アクティビティ</a>
                </li>
                <li>
                  <a href="/feature/social">社会からの評価</a>
                </li>
              </ul>
            </div>
          </li>

          <li>
            <div class="header-nav__txt">
              <a href="/facility-list">老人ホーム・介護施設一覧</a>
              <span class="header-nav__arrow"></span>
              <ul class="header-nav__child">
                <li>
                  <a href="/facility-list/premium">プレミアムシリーズ</a>
                </li>
                <li>
                  <a href="/facility-list/prime">プライムシリーズ</a>
                </li>
                <li>
                  <a href="/facility-list/olive">オリーブシリーズ</a>
                </li>
                <li>
                  <a href="/facility-list/parkinson">パーキンソン病専門施設</a>
                </li>
                <li>
                  <a href="/facility-list/osaka#osaka-shi">大阪市内の老人ホーム・介護施設</a>
                </li>
                <li>
                  <a href="/facility-list/osaka#osaka-fu">大阪市外の老人ホーム・介護施設</a>
                </li>
                <li>
                  <a href="/facility-list/kyoto">京都の老人ホーム・介護施設</a>
                </li>
                <li>
                  <a href="/facility-list/hyougo">兵庫の老人ホーム・介護施設</a>
                </li>
                <li>
                  <a href="/facility-list/nara">奈良の老人ホーム・介護施設</a>
                </li>
                <li>
                  <a href="/facility-list/shiga">滋賀の老人ホーム・介護施設</a>
                </li>
              </ul>
            </div>
          </li>

          <li>
            <div class="header-nav__txt">
              <p>入居をお考えの方へ</p>
              <span class="header-nav__arrow"></span>
              <ul class="header-nav__child">
                <li>
                  <a href="/process">入居の流れ</a>
                </li>
                <li>
                  <a href="/voice">お客様の声</a>
                </li>
                <li>
                  <a href="/kengakureport">見学レポート</a>
                </li>
                <li>
                  <a href="/faq">よくある質問</a>
                </li>
                <li>
                  <a href="https://life-b.com/support/" target="blank">不動産・相続のサポート<br>（外部サービス）</a>
                </li>
              </ul>
            </div>
          </li>

          <li>
            <div class="header-nav__txt">
              <a href="/topics">コラム</a>
            </div>
          </li>

        </ul>
      </nav>
      <div class="header-right">
        <a class="header-recruit txt-bold en-upper txt-white bg-black" href="/recruit">recruit</a>
        <a class="header-tel bg-white" href="tel:0120-532-029">
          <p class="header-tel__txt txt-bold txt-white bg-orange-gradiate-reverse">無料お問い合せダイヤル</p>
          <div class="header-tel__cont">
            <span class="header-tel__icon">
              <img src="<?php bloginfo('template_directory');?>/assets/image/common/freedial_green_rblack.svg" alt="">
            </span>
            <span class="header-tel__num txt-bold">0120-532-029</span>
          </div>
        </a>
        <button class="drawer-btn drawer-toggle" type="button">
          <span class="drawer-btn__bar block"></span>
          <span class="drawer-btn__bar block"></span>
        </button>
      </div>
    </div>
    <ul class="header-cta">
      <li>
        <a class="header-cta__visit bg-white" href="#form">
          <div class="header-cta__image">
            <img src="<?php bloginfo('template_directory');?>/assets/image/common/cta_visit.png" alt="">
          </div>
          <p class="header-cta__txt txt-bold">見学申込</p>
        </a>
      </li>
      <li>
        <a class="header-cta__document bg-white" href="#form">
          <div class="header-cta__image">
            <img src="<?php bloginfo('template_directory');?>/assets/image/common/cta_document.png" alt="">
          </div>
          <p class="header-cta__txt txt-bold">資料請求</p>
        </a>
      </li>
      <li>
        <a class="header-cta__contact bg-white" href="#form">
          <div class="header-cta__image">
            <img src="<?php bloginfo('template_directory');?>/assets/image/common/cta_contact.png" alt="">
          </div>
          <p class="header-cta__txt txt-bold">お問合せ</p>
        </a>
      </li>
    </ul>





    <div class="drawer-menu">
      <div class="drawer-menu__inner">
        <div class="drawer-menu__left">
          <ul class="drawer-menu__list">
            <li>
              <div class="drawer-menu__list-inner">
                <a class="drawer-menu__list-head block txt-bold" href="">
                  <span class="drawer-menu__list-head-en txt-orange block">TOP</span>
                  <span class="drawer-menu__list-head-jp block">トップページ</span>
                </a>
              </div>
            </li>
            <li>
              <div class="drawer-menu__list-inner">
                <div class="drawer-menu__list-head txt-bold">
                  <span class="drawer-menu__list-head-en txt-orange block">ABOUT SUPER COURT</span>
                  <span class="drawer-menu__list-head-jp block">スーパー・コートについて</span>
                </div>
                <ul class="drawer-menu__list-child txt-medium">
                  <li>
                    <a href="/company">スーパー・コートとは</a>
                  </li>
                  <li>
                    <a href="/service">スーパーコートのサービス</a>
                  </li>
                  <li>
                    <a href="/service/nursing">パーキンソン病専門施設とは</a>
                  </li>
                </ul>
              </div>
            </li>
            <li>
              <div class="drawer-menu__list-inner">
                <a class="drawer-menu__list-head txt-bold" href="/feature">
                  <span class="drawer-menu__list-head-en txt-orange block">FEATURE</span>
                  <span class="drawer-menu__list-head-jp block">スーパー・コートの特徴</span>
                </a>
                <ul class="drawer-menu__list-child txt-medium">
                  <li>
                    <a href="/feature/hospitality">ホスピタリティ</a>
                  </li>
                  <li>
                    <a href="/feature/medical">安心の医療体制</a>
                  </li>
                  <li>
                    <a href="/feature/dementia">認知症ケア</a>
                  </li>
                  <li>
                    <a href="/feature/training">リハビリ・トレーニング</a>
                  </li>
                  <li>
                    <a href="/feature/bath">天然温泉</a>
                  </li>
                  <li>
                    <a href="/feature/meal">おいしい食事・水・空気</a>
                  </li>
                  <li>
                    <a href="/feature/event">イベント・アクティビティ</a>
                  </li>
                  <li>
                    <a href="/feature/social">社会からの評価</a>
                  </li>
                </ul>
              </div>
            </li>
            <li>
              <div class="drawer-menu__list-inner">
                <a class="drawer-menu__list-head txt-bold" href="/facility-list">
                  <span class="drawer-menu__list-head-en txt-orange block">FACILITY</span>
                  <span class="drawer-menu__list-head-jp block">老人ホーム・介護施設一覧</span>
                </a>
                <ul class="drawer-menu__list-child txt-medium">
                  <li>
                  <a href="/facility-list/premium">プレミアムシリーズ</a>
                </li>
                <li>
                  <a href="/facility-list/prime">プライムシリーズ</a>
                </li>
                <li>
                  <a href="/facility-list/olive">オリーブシリーズ</a>
                </li>
                <li>
                  <a href="/facility-list/parkinson">パーキンソン病専門施設</a>
                </li>
                  <li>
                    <a href="/facility-list/osaka#osaka-shi">大阪市内の老人ホーム・介護施設</a>
                  </li>
                  <li>
                    <a href="/facility-list/osaka#osaka-fu">大阪市外の老人ホーム・介護施設</a>
                  </li>
                  <li>
                    <a href="/facility-list/kyoto">京都の老人ホーム・介護施設</a>
                  </li>
                  <li>
                    <a href="/facility-list/hyougo">兵庫の老人ホーム・介護施設</a>
                  </li>
                  <li>
                    <a href="/facility-list/nara">奈良の老人ホーム・介護施設</a>
                  </li>
                  <li>
                    <a href="/facility-list/shiga">滋賀の老人ホーム・介護施設</a>
                  </li>
                </ul>
              </div>
            </li>
            <li>
              <div class="drawer-menu__list-inner">
                <div class="drawer-menu__list-head txt-bold">
                  <span class="drawer-menu__list-head-en txt-orange block">MOVE IN</span>
                  <span class="drawer-menu__list-head-jp block">入居をお考えの方へ</span>
                </div>
                <ul class="drawer-menu__list-child txt-medium">
                  <li>
                    <a href="/process">入居の流れ</a>
                  </li>
                  <li>
                    <a href="/voice">お客様の声</a>
                  </li>
                  <li>
                    <a href="/kengakureport">見学レポート</a>
                  </li>
                  <li>
                    <a href="/faq">よくある質問</a>
                  </li>
                  <li>
                    <a href="/kengakureport">不動産・相続のサポート（外部サービス）</a>
                  </li>
                </ul>
              </div>
            </li>
            <li>
              <div class="drawer-menu__list-inner">
                <a href="/recruit" class="drawer-menu__list-head txt-bold">
                  <span class="drawer-menu__list-head-en txt-orange block">RECRUIT</span>
                  <span class="drawer-menu__list-head-jp block">採用情報</span>
                </a>
                <ul class="drawer-menu__list-child txt-medium">
                  <li>
                    <a href="https://recruit.supercourt.co.jp/?_gl=1*128ij1w*_gcl_au*MTg5NTU0NzYyNi4xNzI4MjgyNTU2" target="_blank">新卒採用</a>
                  </li>
                  <li>
                    <a href="https://career.supercourt.co.jp/?_gl=1*18a2qqg*_gcl_au*MTg5NTU0NzYyNi4xNzI4MjgyNTU2" target="_blank">キャリア採用</a>
                  </li>
                </ul>
              </div>
            </li>
            <li>
              <div class="drawer-menu__list-inner">
                <div class="drawer-menu__list-head txt-bold">
                  <span class="drawer-menu__list-head-en txt-orange block">NEWS</span>
                  <span class="drawer-menu__list-head-jp block">お知らせ</span>
                </div>
                <ul class="drawer-menu__list-child txt-medium">
                  <li>
                    <a href="/news">新着情報</a>
                  </li>
                  <li>
                    <a href="/topics">コラム</a>
                  </li>
                  <li>
                    <a href="/facilityblog-list/">施設ブログ</a>
                  </li>
                </ul>
              </div>
            </li>
            <li>
              <div class="drawer-menu__list-inner">
                <div class="drawer-menu__list-head txt-bold">
                  <span class="drawer-menu__list-head-en txt-orange block">INFORMATION</span>
                  <span class="drawer-menu__list-head-jp block">公開情報</span>
                </div>
                <ul class="drawer-menu__list-child txt-medium">
                  <li>
                    <a href="/candidate">建築候補地募集のお知らせ</a>
                  </li>
                  <li>
                    <a href="/certificate">実務経験証明書発行の<br>手続きについて</a>
                  </li>
                  <li>
                    <a href="/document">重要事項説明書・<br>情報開示事項一覧</a>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
        </div>
        <div class="drawer-menu__right">
          <ul class="drawer-menu__form">
            <li>
              <a href="/inspection">
                <span class="drawer-menu__form-icon block">
                  <img src="<?php bloginfo('template_directory');?>/assets/image/common/menu-visit-icon.svg" alt="">
                </span>
                <span class="drawer-menu__form-txt block txt-white txt-bold">見学申込</span>
              </a>
            </li>
            <li>
              <a href="/data_request">
                <span class="drawer-menu__form-icon block">
                  <img src="<?php bloginfo('template_directory');?>/assets/image/common/menu-materials-icon.svg" alt="">
                </span>
                <span class="drawer-menu__form-txt block txt-white txt-bold">資料請求</span>
              </a>
            </li>
            <li>
              <a href="/inquirys">
                <span class="drawer-menu__form-icon block">
                  <img src="<?php bloginfo('template_directory');?>/assets/image/common/menu-contact-icon.svg" alt="">
                </span>
                <span class="drawer-menu__form-txt block txt-white txt-bold">お問合せ</span>
              </a>
            </li>
          </ul>
          <div class="drawer-menu__info txt-jp-s txt-center">
            <div class="drawer-menu__info-logo">
              <img src="<?php bloginfo('template_directory');?>/assets/image/common/logo_type.svg" alt="">
            </div>
            <div class="drawer-menu__info-address">〒550-0005<br>大阪市西区西本町1-7-7<br>CE西本町ビル</div>
            <div class="drawer-menu__info-tel">
              <span class="block">無料お問い合せダイヤル</span>
              <a class="txt-jp-m txt-medium block" href="tel:0120-532-029"><i class="fas fa-phone-alt fa"></i><span>0120-532-029</span></a>
            </div>
            <a class="drawer-menu__info-privacy block txt-medium" href="/privacy">プライバシーポリシー</a>
          </div>
        </div>
      </div>
      <span class="drawer-menu__right-bg block"></span>
    </div>
    <span class="drawer-bg block bg-black drawer-toggle"></span>
  </header>
