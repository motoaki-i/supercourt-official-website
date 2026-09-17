<?php get_header(); ?>

<main id="recruit">

<div class="lower-mv">
  <figure class="lower-mv-image">
    <img src="<?php bloginfo('template_directory');?>/assets/image/recruit/mv.jpg" alt="">
  </figure>
  <div class="ttl-lower-wrap">
    <p class="ttl-lower-up ttl-en-2l txt-white txt-black">Recruit</p>
    <h1 class="ttl-lower txt-white bg-black"><?php the_title()?></h1>
  </div>
</div>

<ul class="pan">
    <li class="txt-en-s"><a href="<?php echo esc_url(home_url('/')); ?>">TOP</a></li>
    <li class="txt-en-s">-</li>
    <li class="txt-jp-s"><?php the_title()?></li>
</ul>

<div class="space-2s space-2s-bottom wrap-m">

<p class="ttl-jp-2l mb1">日本一、「ありがとう」が<br class="pc-only">溢れる場所になろう。</p>

<p>地域の方々に「スーパー・コートがあるから老後が安心」と思っていただくために。<br>株式会社スーパー・コートでは、新たな仲間を募集しています。</p>

</div>

<div class="relative  space-s-bottom">
    <div class="maw-880">
    <h2 class="ttl-jp-3l txt-medium mb1">新卒採用</h2>
    <figure>
        <a href="https://recruit.supercourt.co.jp/" target="_blank"><img src="<?php bloginfo('template_directory');?>/assets/image/recruit/graduate.jpg" alt="新卒"></a>
    </figure>
    <p class="space-s-bottom">新卒の方に向けた求人情報です。介護スペシャリスト、運営マネジメントそれぞれにキャリアアップが望めます。インターンシップの情報もこちらからご覧いただけます。</p>  

    <h2 class="ttl-jp-3l txt-medium mb1">キャリア採用</h2>
    <figure>
        <a href="https://career.supercourt.co.jp/" target="_blank"><img src="<?php bloginfo('template_directory');?>/assets/image/recruit/career.jpg" alt="キャリア採用"></a>
    </figure>
    <p class="space-2s-bottom">現在募集中の正職員およびパート・アルバイト職員の求人情報です。<br>介護職員、介護士、看護師、ケアマネージャー、リハビリ職、管理候補者など様々な職種があります。</p>
    </div>

    <div class="l-band-l bg-beige"></div>
    <div class="r-band-s bg-yellow sp-none"></div>
</div>


</main>

<?php get_footer(); ?>