<!DOCTYPE HTML>
<html lang="ja">
<head>
	<?php $url = $_SERVER['REQUEST_URI']; ?>
<?php if ( strstr($url,'pre_nara_gakuenmae')==true ): ?>
<meta name="robots" content="noindex">
<?php else: ?>
<meta name="robots" content="index,follow" />
<?php endif; ?>
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php if ( is_singular( 'facility_field' ) ) : ?>
<title><?php echo get_field('seo_title'); ?></title>
<meta name="description" content="<?php echo get_field('seo_description'); ?>" />
<?php else : ?>
        <title>株式会社スーパー・コート</title>
<?php endif; ?>
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

<script type="text/javascript" src="/common/js/modernizr.js"></script>
<script type="text/javascript" src="/common/js/rollover.js"></script>
<!-- <script type="text/javascript" src="/common/js/smoothScroll.js"></script> -->
<script type="text/javascript" src="/common/js/base.js"></script>
	
	<link rel="stylesheet" href="https://www.supercourt.jp/css/facility-field.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css?2">

	
<?php if ( is_page(10167) ||is_page(10179)||is_page(10176)) : ?> 

<script type="text/javascript">
(function(s,m,n,l,o,g,i,c,a,d){c=(s[o]||(s[o]={}))[g]||(s[o][g]={});if(c[i])return;c[i]=function(){(c[i+"_queue"]||(c[i+"_queue"]=[])).push(arguments)};a=m.createElement(n);a.charset="utf-8";a.async=true;a.src=l;d=m.getElementsByTagName(n)[0];d.parentNode.insertBefore(a,d)})(window,document,"script","https://cd.ladsp.com/script/conv2.js","Smn","Logicad","conv");
Smn.Logicad.conv({
"smnAdvertiserId":"00011388"
});
</script>

<?php endif; ?>
<?php wp_head(); ?>

<link rel="stylesheet" href="/common/css/jquery-ui.css" />
<script src="/common/js/jquery.ui.datepicker-ja.js"></script>
<script src="/common/js/jquery-ui.js"></script>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5Q4FCV8');</script>
<!-- End Google Tag Manager -->
</head>
<body data-current="default" id="PAGETOP">

	
<?php include(dirname(__FILE__).'../../../../../_header.php'); ?>
	


