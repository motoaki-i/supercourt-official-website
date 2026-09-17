<?php /*
Template Name: topics
*/ ?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<link href="//fonts.googleapis.com/earlyaccess/notosansjapanese.css" rel="stylesheet">
<title>
<?php bloginfo('name'); ?>
<?php if ( is_single() ) { ?>
&raquo; Blog Archive
<?php } ?>
<?php wp_title(); ?>
</title>

<!-- metadata -->

<!-- stylesheet -->
<style type="text/css">
body {
  margin: 0;
}
#feed {
  font-family: Noto Sans Japanese, メイリオ, Meiryo, 游ゴシック体, 'Yu Gothic', YuGothic, 'ヒラギノ角ゴシック Pro', 'Hiragino Kaku Gothic Pro', Osaka, 'ＭＳ Ｐゴシック', 'MS PGothic', sans-serif;
  padding: 0;
}

.feedInner div {
  padding: 0;
  border: none;
}
.feedInner div {
	/*padding: 10px 0;*/
	/*border-bottom: 1px solid  #45736b;*/
}
.feedInner div a {
	color: #333;
	text-decoration: none;
}
.feedInner div a .date {
    font-size: 13px;
    color: rgb(159, 128, 57);
    margin: 0 0 2px;
}
.feedInner div a .facility {
	margin-bottom: 20px;
	font-size: 12px;
	color: #09483e;
}
.feedInner div a .title {
    font-size: 12px;
    font-weight: 500;
    padding: 0px;
    margin: 0 0 8px
}


</style></head>

<body <?php body_class(); ?>>
<div id="feed">
<?php
foreach((get_the_category()) as $cat) {
$catid = $cat->cat_ID ;
break ;
}
$get_posts_parm = "'numberposts=10&category=" . $catid . "'";
?>
  <?php $posts = get_posts($get_posts_parm); ?>
  <?php foreach($posts as $post): ?>
  
  <div class="feedInner">
  <div>
  <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" target="_top">
    <p class="date"><?php the_time('Y.m.d'); ?></p>
    <p class="title"><?php the_title(); ?></p>
    </a></div>  </div>

  <?php endforeach; ?>
</div>
</body>
</html>
