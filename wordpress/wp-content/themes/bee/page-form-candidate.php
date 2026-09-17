<?php get_header(); ?>

<main>

<div class="lower-mv">
  <figure class="lower-mv-image">
    <img src="<?php bloginfo('template_directory');?>/assets/image/form/mv2.jpg" alt="">
  </figure>
</div>

<div class="bg-yellow txt-white space-3l-bottom">
  <ul class="pan">
    <li class="txt-en-s"><a href="<?php echo esc_url(home_url('/')); ?>">TOP</a></li>
    <li class="txt-en-s">-</li>
    <li class="txt-jp-s">建設候補地についてのお問い合わせ</li>
  </ul>
  <div class="wrap-m">
  <h2 class="ttl-jp-4l  txt-bold txt-center mb-half space-3s">建設候補地についてのお問い合わせ</h2>
  <p class="middle txt-medium ">下記項目をご入力の上、ご送信ください。<br>申込受理しましたら、折り返しご連絡致します。</p>
  </div>
</div>


<div id="form" class="wrap-m space-3s space-m-bottom bg-white form-wrap">
  <?php echo do_shortcode('[contact-form-7 id="10672" title="建設候補地についてのお問合せ"]'); ?>
</div>

</main>

<?php get_footer(); ?>




