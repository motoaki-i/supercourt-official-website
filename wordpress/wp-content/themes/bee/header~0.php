<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php if ( is_post_type_archive( 'topics' ) ) : ?>
        <title>新着情報 | 株式会社スーパー・コート</title>
<?php elseif ( is_singular( 'topics' ) ) : ?>
        <title><?php the_title(); ?> | 株式会社スーパー・コート</title>
<?php else : ?>
        <title>スーパー・コートからのお知らせ | 株式会社スーパー・コート</title>
<?php endif; ?>
<meta name="keywords" content="有料,老人ホーム,大阪,介護付,兵庫,京都,奈良,入居" />
<meta name="description" content="有料老人ホームのスーパー・コートの催し物や施設情報などをお送りします。" />
<link href="/common/css/import.css" rel="stylesheet" type="text/css">
<link href="/common/css/slidebars.css" rel="stylesheet" type="text/css">
<link href="/common/css/blog.css" rel="stylesheet" type="text/css">
<?php if ( is_home() || is_archive() || is_search() || is_single() ) : ?> 
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
        <link rel="stylesheet" media="(min-width: 640px)" href="<?php echo get_theme_file_uri( 'css/topics_pc.css' ); ?>?v=20220920">
        <link rel="stylesheet" media="(max-width: 639px)" href="<?php echo get_theme_file_uri( 'css/topics_sp.css' ); ?>?v=20220920">
<?php endif; ?>
<link rel="stylesheet" media="(min-width: 640px)" href="/common/css/pc.css">
<link rel="stylesheet" media="(max-width: 639px)" href="/common/css/sp.css">
<!--[if lte IE 8]>
<link href="/common/css/pc.css" rel="stylesheet" type="text/css">
<![endif]-->
<script type="text/javascript" src="/common/js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="/common/js/modernizr.js"></script>
<script type="text/javascript" src="/common/js/rollover.js"></script>
<!-- <script type="text/javascript" src="/common/js/smoothScroll.js"></script> -->
<script type="text/javascript" src="/common/js/base.js"></script>
</head>
<body data-current="default" id="PAGETOP">
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5Q4FCV8');</script>
<!-- End Google Tag Manager -->
<?php include(dirname(__FILE__).'../../../../../_header.php'); ?>
<div id="sb-site">
<?php if ( !is_home() && !is_archive() && !is_search() && !is_single() ) : ?>
        <div class="process">
        <div class="container">
        <div class="pt" style="margin-bottom:40px;">
                <h1>スーパー・コートからのお知らせ</h1>
        </div>
        <div class="content">
<?php endif; ?>