<!DOCTYPE HTML>
<html <?php language_attributes(); ?>> 
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>"> 
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta property="og:image" content="<?php bloginfo('template_directory');?>/assets/image/common/ogp.jpg">
<?php if (is_page('document-list')): ?>
    <meta name="robots" content="noindex,nofollow">
<?php endif; ?>

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

<?php
/**
 * 構造化マークアップ（JSON-LD）統合管理ロジック
 * 都道府県・市区町村・施設詳細（special_page対応）版
 */
global $wp;
$current_url = home_url(add_query_arg([], $wp->request)) . '/'; // 現在のページのURL
$current_post_id = get_the_ID();
$post_name = get_post_field('post_name', $current_post_id);

// --- 判定フラグの準備 ---
$is_pref_page = false;
$is_city_page = false;
$facility_target_id = null;

$pref_configs = [
    'osaka'  => ['name' => '大阪府', 'key' => 'area_osaka',  'region' => '大阪府'],
    'kyoto'  => ['name' => '京都府', 'key' => 'area_kyoto',  'region' => '京都府'],
    'hyougo' => ['name' => '兵庫県', 'key' => 'area_hyogo',  'region' => '兵庫県'],
    'nara'   => ['name' => '奈良県', 'key' => 'area_nara',   'region' => '奈良県'],
    'shiga'  => ['name' => '滋賀県', 'key' => 'area_shiga',  'region' => '滋賀県'],
];

// 1. 本来の施設詳細ページか判定
if ( is_singular('facility-list') ) {
    $facility_target_id = $current_post_id;
} 
// 2. 固定ページの場合、都道府県一覧 or 市区町村一覧 or 「special_page」か判定
elseif ( is_page() ) {
    if ( array_key_exists($post_name, $pref_configs) ) {
        $is_pref_page = true;
    } else {
        $parent_id = wp_get_post_parent_id($current_post_id);
        $parent_slug = $parent_id ? get_post_field('post_name', $parent_id) : '';
        
        if ( array_key_exists($parent_slug, $pref_configs) ) {
            $is_city_page = true;
        } else {
            // 【重要】どの施設一覧にも当てはまらない場合、special_page かどうかを逆引き
            $args_find = [
                'post_type' => 'facility-list',
                'meta_query' => [
                    [
                        'key' => 'special_page',
                        'value' => $post_name, // スラッグが含まれているかチェック
                        'compare' => 'LIKE'
                    ]
                ],
                'posts_per_page' => 1,
                'fields' => 'ids'
            ];
            $found_facility = get_posts($args_find);
            if ( !empty($found_facility) ) {
                $facility_target_id = $found_facility[0];
            }
        }
    }
}

// 画像URL取得補助関数
if ( ! function_exists('sc_ensure_image_url') ) {
    function sc_ensure_image_url($img_data) {
        if (empty($img_data)) return "https://www.supercourt.jp/wordpress/wp-content/themes/bee/assets/image/common/ogp.jpg";
        if (is_array($img_data)) return $img_data['url'] ?? "";
        if (is_numeric($img_data)) {
            $url = wp_get_attachment_image_url($img_data, 'full');
            return $url ?: "";
        }
        return (string)$img_data;
    }
}

$graph = [];

// --- 1. Organization (共通) ---
$graph[] = [
    "@type" => "Organization",
    "@id" => "https://www.supercourt.jp/#organization",
    "name" => "株式会社スーパー・コート",
    "url" => "https://www.supercourt.jp/",
    "logo" => "https://www.supercourt.jp/wordpress/wp-content/themes/bee/assets/image/common/logo_type.svg"
];

// --- 2. 一覧ページの場合（都道府県 または 市区町村） ---
if ( $is_pref_page || $is_city_page ) {
    if ( $is_pref_page ) {
        $conf = $pref_configs[$post_name];
        $page_title = $conf['name'] ;
        $args = [
            'post_type' => 'facility-list',
            'posts_per_page' => 60,
            'tax_query' => [['taxonomy' => 'facilitys_category', 'field' => 'slug', 'terms' => $post_name]],
        ];
    } else {
        $conf = $pref_configs[$parent_slug];
        $page_title = get_the_title() ;
        $args = [
            'post_type' => 'facility-list',
            'posts_per_page' => 100,
            'meta_query' => [['key' => $conf['key'], 'value' => $post_name, 'compare' => 'LIKE']],
        ];
    }
    
    $json_query = new WP_Query($args);
    $list_items = [];
    if ($json_query->have_posts()) {
        foreach ($json_query->posts as $index => $p) {
            $f_data = sc_get_facility_list_data($p->ID);
            $special_page = $f_data['special_page'] ?? [];
            $facility_url = !empty($special_page['url']) ? $special_page['url'] : get_permalink($p->ID);
            
            $move_in = (int)($f_data['price1']['move_in_fee'] ?? 0);
            $monthly = (int)($f_data['price1']['monthly_fee']['monthly_fee_amount'] ?? 0);

            $list_items[] = [
                "@type" => "ListItem",
                "position" => $index + 1,
                "item" => [
                    "@type" => "LocalBusiness",
                    "name" => get_the_title($p->ID),
                    "url" => $facility_url,
                    "image" => sc_ensure_image_url($f_data['img_facility'] ?? $f_data['img_main'] ?? ""),
                    "address" => [
                        "@type" => "PostalAddress",
                        "addressRegion" => $conf['region'],
                        "streetAddress" => $f_data['area'] ?? ""
                    ],
                    "priceRange" => "入居金: " . number_format($move_in) . "円 / 月額: " . number_format($monthly) . "円〜"
                ]
            ];
        }
    }
    wp_reset_postdata();

    $graph[] = [
        "@type" => "WebPage",
        "name" => $page_title . "｜スーパー・コート",
        "url" => get_permalink(),
        "isPartOf" => ["@id" => "https://www.supercourt.jp/#organization"]
    ];
    if (!empty($list_items)) {
        $graph[] = ["@type" => "ItemList", "name" => $page_title, "itemListElement" => $list_items];
    }
}

// --- 3. 施設詳細ページの場合（本来のURL ＆ special_page の両対応） ---
if ( $facility_target_id ) {
    $f_data = sc_get_facility_list_data($facility_target_id);
    $f_fields = get_fields($facility_target_id);
    
    // 表示中のURLが何であれ、構造化データ上のURLは special_page を優先
    $special_page = $f_data['special_page'] ?? [];
    $facility_url = !empty($special_page['url']) ? $special_page['url'] : get_permalink($facility_target_id);

    $move_in = (int)($f_data['price1']['move_in_fee'] ?? 0);
    $monthly = (int)($f_data['price1']['monthly_fee']['monthly_fee_amount'] ?? 0);

    // こだわり条件
    $amenities = [];
    $commitment_field = get_field_object('commitment', $facility_target_id);
    $all_choices = $commitment_field['choices'] ?? [];
    foreach (($f_data['commitment'] ?? []) as $slug) {
        if (isset($all_choices[$slug])) {
            $amenities[] = ["@type" => "LocationFeatureSpecification", "name" => $all_choices[$slug], "value" => "true"];
        }
    }

    $graph[] = [
        "@type" => "LocalBusiness",
        "@id" => $facility_url . "#facility",
        "name" => get_the_title($facility_target_id),
        "url" => $facility_url,
        "image" => sc_ensure_image_url($f_fields['img_main'] ?? ""),
        "address" => [
            "@type" => "PostalAddress",
            "streetAddress" => $f_data['area'] ?? "",
            "addressCountry" => "JP"
        ],
        "priceRange" => "入居金: " . number_format($move_in) . "円 / 月額: " . number_format($monthly) . "円〜",
        "telephone" => "0120-532-029",
        "amenityFeature" => $amenities,
        "parentOrganization" => ["@id" => "https://www.supercourt.jp/#organization"]
    ];

    // FAQ
    $faq_entities = [];
    $faqs = $f_fields['faq_field'] ?? [];
    for ($i = 1; $i <= 8; $i++) {
        $key = sprintf('group%02d', $i);
        if (!empty($faqs[$key]['question']) && !empty($faqs[$key]['answer'])) {
            $faq_entities[] = [
                "@type" => "Question",
                "name" => $faqs[$key]['question'],
                "acceptedAnswer" => ["@type" => "Answer", "text" => strip_tags($faqs[$key]['answer'])]
            ];
        }
    }
    if (!empty($faq_entities)) {
        $graph[] = ["@type" => "FAQPage", "mainEntity" => $faq_entities];
    }
}

// 最終出力
if (!empty($graph)) {
    echo '<script type="application/ld+json">' . json_encode([
        "@context" => "https://schema.org",
        "@graph" => $graph
    ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . '</script>';
}
?>


<!-- google fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&family=Roboto:wght@400;500;700&family=EB+Garamond:ital,wght@0,400..800;1,400..800&family=Shippori+Mincho:wght@400;500;600;700&display=swap" rel="stylesheet">
<link href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css">

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
      <div class="header-logo mv-logo">
        <a href="/">
          <img src="<?php bloginfo('template_directory');?>/assets/image/common/logo_type.svg" alt="大阪、兵庫、京都、奈良、滋賀の老人ホーム・介護施設ならスーパー・コート">
        </a>
      </div>
      <?php else: ?>
      <div class="header-logo mv-logo">
        <a href="/">
          <img src="<?php bloginfo('template_directory');?>/assets/image/common/logo_type.svg" alt="大阪、兵庫、京都、奈良、滋賀の老人ホーム・介護施設ならスーパー・コート">
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
                  <a href="/facility-list/osaka">大阪府の老人ホーム・介護施設</a>
                </li>
                <li>
                  <a href="/facility-list/kyoto">京都府の老人ホーム・介護施設</a>
                </li>
                <li>
                  <a href="/facility-list/hyougo">兵庫県の老人ホーム・介護施設</a>
                </li>
                <li>
                  <a href="/facility-list/nara">奈良県の老人ホーム・介護施設</a>
                </li>
                <li>
                  <a href="/facility-list/shiga">滋賀県の老人ホーム・介護施設</a>
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
          <p class="header-tel__txt txt-bold txt-white bg-orange-gradiate-reverse">資料請求・見学予約(無料)</p>
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
        <a class="header-cta__visit bg-white" href="/inspection">
          <div class="header-cta__image">
            <img src="<?php bloginfo('template_directory');?>/assets/image/common/cta_visit.png" alt="">
          </div>
          <p class="header-cta__txt txt-bold">見学予約</p>
        </a>
      </li>
      <li>
        <a class="header-cta__document bg-white" href="/data_request">
          <div class="header-cta__image">
            <img src="<?php bloginfo('template_directory');?>/assets/image/common/cta_document.png" alt="">
          </div>
          <p class="header-cta__txt txt-bold">資料請求</p>
        </a>
      </li>
      <li>
        <a class="header-cta__contact bg-white" href="/inquirys">
          <div class="header-cta__image">
            <img src="<?php bloginfo('template_directory');?>/assets/image/common/cta_contact.png" alt="">
          </div>
          <p class="header-cta__txt txt-bold">相談<br>空室確認</p>
        </a>
      </li>
    </ul>
    
    <div class="header-spcta">
      <div class="header-spcta__tel">
        <a href="tel:0120-532-029">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/image/common/0120-532-029.svg" alt="">
        </a>
        <span class="header-spcta__tel-txt">0120-532-029</span>
      </div>
      <ul class="header-spcta__nav">
        <li class="header-spcta__nav-visit">
          <a href="/inspection">
            <span class="header-spcta__nav-icon">
              <span class="header-spcta__nav-icon-inner"></span>
            </span>
            <span class="header-spcta__nav-txt">見学申込</span>
          </a>
        </li>
        <li class="header-spcta__nav-paper">
          <a href="/data_request">
            <span class="header-spcta__nav-icon">
              <span class="header-spcta__nav-icon-inner"></span>
            </span>
            <span class="header-spcta__nav-txt">資料請求</span>
          </a>
        </li>
      </ul>
    </div>





    <div class="drawer-menu">
      <div class="drawer-menu__inner">
        <div class="drawer-menu__left">
          <ul class="drawer-menu__list">
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
                    <a href="/facility-list/osaka">大阪府の老人ホーム・介護施設</a>
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
                  <span class="drawer-menu__list-head-jp block">入居検討中の方へ</span>
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
                <div class="drawer-menu__list-head txt-bold">
                  <span class="drawer-menu__list-head-en txt-orange block">ABOUT SUPERCOURT</span>
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
                <div class="drawer-menu__list-head txt-bold">
                  <span class="drawer-menu__list-head-en txt-orange block">NEWS・INFORMATION</span>
                  <span class="drawer-menu__list-head-jp block">お知らせ・公開情報</span>
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
                  <li>
                    <a href="/candidate">建築候補地募集のお知らせ</a>
                  </li>
                  <li>
                    <a href="/certificate">実務経験証明書発行の<br>手続きについて</a>
                  </li>
                  <li>
                    <a href="/document">重要事項説明書・<br>情報開示事項一覧</a>
                  </li>
                  <li>
                    <a href="/privacy">プライバシーポリシー</a>
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
                <a class="drawer-menu__list-head block txt-bold" href="/">
                  <span class="drawer-menu__list-head-en txt-orange block">TOP</span>
                  <span class="drawer-menu__list-head-jp block">トップページ</span>
                </a>
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
                <span class="drawer-menu__form-txt block txt-white txt-bold">見学予約（無料）</span>
              </a>
            </li>
            <li>
              <a href="/data_request">
                <span class="drawer-menu__form-icon block">
                  <img src="<?php bloginfo('template_directory');?>/assets/image/common/menu-materials-icon.svg" alt="">
                </span>
                <span class="drawer-menu__form-txt block txt-white txt-bold">資料請求（無料）</span>
              </a>
            </li>
            <li>
              <a href="/inquirys">
                <span class="drawer-menu__form-icon block">
                  <img src="<?php bloginfo('template_directory');?>/assets/image/common/menu-contact-icon.svg" alt="">
                </span>
                <span class="drawer-menu__form-txt block txt-white txt-bold">相談・空室確認など</span>
              </a>
            </li>
          </ul>
          <div class="drawer-menu__info txt-jp-s txt-center">
            <div class="drawer-menu__info-logo">
              <img src="<?php bloginfo('template_directory');?>/assets/image/common/logo_type.svg" alt="">
            </div>
            <div class="drawer-menu__info-address">〒550-0005<br>大阪市西区西本町1-7-7<br>CE西本町ビル</div>
            <div class="drawer-menu__info-tel">
              <span class="block">電話で無料入居相談</span>
              <a class="txt-jp-m txt-medium block" href="tel:0120-532-029"><i class="fas fa-phone-alt fa"></i><span>0120-532-029</span></a>
            </div>
            <br><br><br><br><br><br>
          </div>
        </div>
      </div>
      <span class="drawer-menu__right-bg block"></span>
    </div>
    <span class="drawer-bg block bg-black drawer-toggle"></span>
  </header>
