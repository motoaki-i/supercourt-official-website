<?php get_header(); ?>

<main>

<div class="lower-mv">
  <figure class="lower-mv-image">
    <img src="<?php bloginfo('template_directory');?>/assets/image/certificate/mv.jpg" alt="">
  </figure>
</div>

  <div class="">
    <ul class="pan">
      <li class="txt-en-s"><a href="<?php echo esc_url(home_url('/')); ?>">TOP</a></li>
      <li class="txt-en-s">-</li>
      <li class="txt-jp-s"><?php the_title(); ?></li>
    </ul>
  </div>

<style>

article.dmlpcontainer {
  width: 90%;
  max-width: 900px;
  margin: 60px auto 40px;
}

article.dmlpcontainer h1 {
  font-size: 24px;
  letter-spacing: 2px;
  color: #9f8039;
  font-weight: bold;
  border-bottom: 2px solid #9f8039;
  margin: 0 0 30px 0;
}



.spdisp {
  display: none;
}

.lplinks {
  margin: 0 0 40px 0;
}

ul.lplinkslist {
  margin: 0 0 30px 0;
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap;
}
ul.lplinkslist li {
  width: 100%;
  margin: 0;
  padding: 0;
}
ul.lplinkslist li a {
  display: block;
  width: 100%;
  position: relative;
  margin: 0 0 0 0;
  border-bottom: 1px dotted #39c;
  padding: 20px 0 20px 0;
  line-height: 1.4;
}
ul.lplinkslist li a span.snsicon {
  display: block;
  width: 30px;
  position: absolute;
  right: 0;
  top: 50%;
  transform: translateY(-50%);
}



@media (max-width: 640px) {

.spdisp {
  display: initial;
}

article.dmlpcontainer {
  margin: 70px auto 40px;
}

article.dmlpcontainer h1 {
  font-size: 18px;
  line-height: 1.6;
  margin: 0 0 10px 0;
  padding-bottom: 5px;
}



}




</style>

<body class="dmlppage" id="PAGETOP">




<article class="dmlpcontainer space-3l-bottom">
<div class=""><h1>スーパー・コート<br class="spdisp">堺神石&nbsp;リンク集</h1></div>
<section class="lplinks">
<ul class="lplinkslist">
<li><a href="<?php echo get_permalink(10139); ?>#form" target="blank">資料請求・見学申込・お問合せフォーム<span class="snsicon"><img alt="お問い合わせ" src="https://www.supercourt.jp/images/snsicon-supercourt.webp"></span></a></li>
<li><a href="<?php echo get_permalink(10139); ?>" target="blank">施設公式ホームページ<span class="snsicon"><img alt="スーパー・コート公式" src="https://www.supercourt.jp/images/snsicon-supercourt.webp"></span></a></li>
<li><a href="https://www.supercourt.jp/blog/kamiishi/" target="blank">施設公式ブログ<span class="snsicon"><img alt="スーパー・コート公式" src="https://www.supercourt.jp/images/snsicon-supercourt.webp"></span></a></li>
<li><a href="https://search.google.com/local/reviews?placeid=ChIJr4tmjkTbAGARIeMfIz2Be8Q" target="blank">Googleクチコミ<span class="snsicon"><img alt="Googleクチコミ" src="https://www.supercourt.jp/images/snsicon-googlereview.webp"></span></a></li>
<li><a href="https://www.google.com/maps/search/?api=1&query=Google&query_place_id=ChIJr4tmjkTbAGARIeMfIz2Be8Q" target="blank">Googleマップ<span class="snsicon"><img alt="Googleマップ" src="https://www.supercourt.jp/images/snsicon-googlemap.webp"></span></a></li>
<li><a href="tel:0120-532-029">お電話でのお問合せ<span class="snsicon"><img alt="フリーコール" src="https://www.supercourt.jp/images/snsicon-freecall.webp"></span></a></li>
</ul>

<ul class="lplinkslist">
<li><a href="https://www.tiktok.com/@super.court" target="blank">スーパー・コート公式&nbsp;TikTok<span class="snsicon"><img alt="TikTok" src="https://www.supercourt.jp/images/snsicon-tiktok.webp"></span></a></li>
<li><a href="https://www.instagram.com/super.court/" target="blank">スーパー・コート公式&nbsp;Instagram<br class="spdisp">「介護の教科書」<span class="snsicon"><img alt="Instagram" src="https://www.supercourt.jp/images/snsicon-instagram.webp"></span></a></li>
<li><a href="https://www.youtube.com/@user-ph6ei7ru1k" target="blank">スーパー・コート公式&nbsp;YouTube<br class="spdisp">「おもてなしの介護」<span class="snsicon"><img alt="YouTube" src="https://www.supercourt.jp/images/snsicon-youtube.webp"></span></a></li>
<li><a href="https://www.supercourt.co.jp/recruit/" target="blank">採用情報<span class="snsicon"><img alt="スーパー・コート公式" src="https://www.supercourt.jp/images/snsicon-supercourt.webp"></span></a></li>
</ul>

</section>

</article>


</main>

<?php get_footer(); ?>