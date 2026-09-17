<?php get_header(); ?>

<main>

<div class="lower-mv">
  <figure class="lower-mv-image">
    <img src="<?php bloginfo('template_directory');?>/assets/image/form/mv.jpg" alt="">
  </figure>
</div>

<div class="bg-yellow txt-white space-3l-bottom">
  <ul class="pan">
    <li class="txt-en-s"><a href="<?php echo esc_url(home_url('/')); ?>">TOP</a></li>
    <li class="txt-en-s">-</li>
    <li class="txt-jp-s">スーパー・コート現地施設のご見学希望受付フォーム</li>
  </ul>
  <div class="wrap-m">
  <h2 class="ttl-jp-4l  txt-bold txt-center mb1 space-3s">スーパー・コート現地施設<br>ご見学希望受付フォーム</h2>
  <p class="middle txt-medium ">スーパー・コートの各施設では、現地でのご見学希望を受け付けております。<br>下記項目をご入力の上、ご送信ください。</p>
  <p class="middle txt-medium "><a href="<?php echo esc_url(home_url('/kengakureport/')); ?>">現地施設見学の様子をご確認されたい方はこちらから</a></p>
  </div>
</div>



<div id="form" class="wrap-m space-3s space-m-bottom bg-white form-wrap">
  <?php echo do_shortcode('[contact-form-7 id="adc9899" title="新共通見学希望"]'); ?>
</div>

</main>

<?php get_footer(); ?>