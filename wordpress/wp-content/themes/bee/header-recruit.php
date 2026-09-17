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


<!-- google fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&family=Roboto:wght@400;500;700&family=EB+Garamond:ital,wght@0,400..800;1,400..800&family=Shippori+Mincho:wght@400;500;600;700&display=swap" rel="stylesheet">
<link href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css">

<link rel="stylesheet" type="text/css" href="https://www.supercourt.jp/wordpress/wp-content/themes/bee/assets/css/recruit.css"/>
<script src="https://www.supercourt.jp/wordpress/wp-content/themes/bee/assets/js/imgsliderooper.js" defer="defer"></script>
<script src="https://www.supercourt.jp/wordpress/wp-content/themes/bee/assets/js/scroll-fadein.js" defer="defer"></script>
<script src="https://www.supercourt.jp/wordpress/wp-content/themes/bee/assets/js/list-slider.js" defer="defer"></script>

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
              <a href="/recruit">採用情報トップページ</a>
            </div>
          </li>

          <li>
            <div class="header-nav__txt">
              <a href="/recruit/philosophy">私たちの考え方</a>
            </div>
          </li>

          <li>
            <div class="header-nav__txt">
              <a href="/recruit/interview">スタッフ紹介</a>
            </div>
          </li>

          <li>
            <div class="header-nav__txt">
              職種紹介
              <span class="header-nav__arrow"></span>
              <ul class="header-nav__child">
                <li>
                  <a href="/recruit/job-kaigo">介護職</a>
                </li>
                <li>
                  <a href="/recruit/job-nurse">看護職</a>
                </li>
                <li>
                  <a href="/recruit/job-pos">セラピスト</a>
                </li>
                <li>
                  <a href="/recruit/job-caremanager">ケアマネジャー</a>
                </li>
                <li>
                  <a href="/recruit/job-fukushiyogu">福祉用具専門相談員</a>
                </li>
                <li>
                  <a href="/recruit/job-concierge">コンシェルジュ</a>
                </li>
                <li>
                  <a href="/recruit/job-clean">クリーン・サービス</a>
                </li>
                <li>
                  <a href="/recruit/job-jimu">事務</a>
                </li>
              </ul>
            </div>
          </li>

          <li>
            <div class="header-nav__txt">
              <a href="/recruit/recruit_training">教育制度</a>
            </div>
          </li>

          <li>
            <div class="header-nav__txt">
              <a href="/recruit/recruit_company">会社情報</a>
            </div>
          </li>

        </ul>
      </nav>
      <div class="header-right">
        <a class="header-recruit txt-bold txt-white bg-black" href="https://docs.google.com/forms/d/e/1FAIpQLSfS9uHdBLA8sCbg-e7W_sBbZJj1WyeDUD0JxAyNzzkl9A8YJg/viewform?usp=pp_url&entry.1420726390=homepage" target="_blank" style="border-right: 1px solid #fff;">キャリア採用<br>エントリー</a>
        <a class="header-recruit txt-bold txt-white bg-black" href="/recruit/recruit_newgraduateinfo">新卒採用<br>エントリー</a>
        <button class="drawer-btn drawer-toggle" type="button">
          <span class="drawer-btn__bar block"></span>
          <span class="drawer-btn__bar block"></span>
        </button>
      </div>
    </div>
    





    <div class="drawer-menu">
      <div class="drawer-menu__inner">
        <div class="drawer-menu__left">
          <ul class="drawer-menu__list">
            <li>
              <div class="drawer-menu__list-inner">
                <a class="drawer-menu__list-head block txt-bold" href="/recruit/">
                  <span class="drawer-menu__list-head-en txt-orange block">TOP</span>
                  <span class="drawer-menu__list-head-jp block">採用トップページ</span>
                </a>
              </div>
            </li>
            <li>
              <div class="drawer-menu__list-inner">
                <a href="/recruit2025" class="drawer-menu__list-head txt-bold">
                  <span class="drawer-menu__list-head-en txt-orange block">RECRUIT</span>
                  <span class="drawer-menu__list-head-jp block">採用情報</span>
                </a>
                <ul class="drawer-menu__list-child txt-medium">
                  <li>
                    <a href="/recruit/philosophy">私たちの考え方</a>
                  </li>
                  <li>
                    <a href="/recruit/interview">スタッフ紹介</a>
                  </li>
                  <li>
                    <a href="/recruit/recruit_training">教育制度</a>
                  </li>
                  <li>
                    <a href="/recruit/recruit_company">会社情報</a>
                  </li>
                </ul>
              </div>
            </li>
            <li>
              <div class="drawer-menu__list-inner">
                  <span class="drawer-menu__list-head-en txt-orange block txt-bold">DETAILS</span>
                  <span class="drawer-menu__list-head-jp block txt-bold">職種紹介</span>
                <ul class="drawer-menu__list-child txt-medium">
                  <li>
                  <a href="/recruit/job-kaigo">介護職</a>
                </li>
                <li>
                  <a href="/recruit/job-nurse">看護職</a>
                </li>
                <li>
                  <a href="/recruit/job-pos">セラピスト</a>
                </li>
                <li>
                  <a href="/recruit/job-caremanager">ケアマネジャー</a>
                </li>
                <li>
                  <a href="/recruit/job-fukushiyogu">福祉用具専門相談員</a>
                </li>
                <li>
                  <a href="/recruit/job-concierge">コンシェルジュ</a>
                </li>
                <li>
                  <a href="/recruit/job-clean">クリーン・サービス</a>
                </li>
                <li>
                  <a href="/recruit/job-jimu">事務</a>
                </li>
                </ul>
              </div>
            </li>
          </ul>
        </div>
        <div class="drawer-menu__right">
          <ul class="drawer-menu__form">
            <li>
              <a href="https://forms.gle/wSGeTA46agEmdJxbA" target="_blank">
                <!--<span class="drawer-menu__form-icon block">
                  <img src="<?php bloginfo('template_directory');?>/assets/image/common/menu-contact-icon.svg" alt="">
                </span>-->
                <span class="drawer-menu__form-txt block txt-white txt-bold">キャリア採用<br>エントリー</span>
              </a>
            </li>
            <li>
              <a href="./recruit_newgraduateinfo">
                <!--<span class="drawer-menu__form-icon block">
                  <img src="<?php bloginfo('template_directory');?>/assets/image/common/menu-contact-icon.svg" alt="">
                </span>-->
                <span class="drawer-menu__form-txt block txt-white txt-bold">新卒採用<br>エントリー</span>
              </a>
            </li>
            <li>
              <a href="https://docs.google.com/forms/d/e/1FAIpQLSeZBE1kL4J6RLy00Zjt0E8WDNVXLeZAp1wvkLrx1aC8WpyTgw/viewform?usp=dialog" target="_blank">
                <!--<span class="drawer-menu__form-icon block">
                  <img src="<?php bloginfo('template_directory');?>/assets/image/common/menu-contact-icon.svg" alt="">
                </span>-->
                <span class="drawer-menu__form-txt block txt-white txt-bold">紹介会社様からの<br>エントリーはこちら</span>
              </a>
            </li>
          </ul>
          <div class="drawer-menu__info txt-jp-s txt-center">
            <div class="drawer-menu__info-logo">
              <img src="<?php bloginfo('template_directory');?>/assets/image/common/logo_type.svg" alt="">
            </div>
            <div class="drawer-menu__info-address">〒550-0005<br>大阪市西区西本町1-7-7<br>CE西本町ビル</div>
            <a class="drawer-menu__info-privacy block txt-medium" href="/privacy">プライバシーポリシー</a>
          </div>
        </div>
      </div>
      <span class="drawer-menu__right-bg block"></span>
    </div>
    <span class="drawer-bg block bg-black drawer-toggle"></span>
  </header>
