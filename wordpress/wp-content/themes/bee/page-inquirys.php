<?php get_header(); ?>

<main class="inquirys">

<div class="lower-mv">
  <figure class="lower-mv-image">
    <img src="<?php bloginfo('template_directory');?>/assets/image/form/mv.jpg" alt="">
  </figure>
</div>

<div class="bg-yellow txt-white space-3l-bottom">
  <ul class="pan">
    <li class="txt-en-s"><a href="<?php echo esc_url(home_url('/')); ?>">TOP</a></li>
    <li class="txt-en-s">-</li>
    <li class="txt-jp-s">お問い合わせ</li>
  </ul>
  <div class="wrap-m">
  <h2 class="ttl-jp-4l  txt-bold txt-center mb-half space-3s">お問い合わせ</h2>
  <p class="middle txt-medium ">スーパー・コートへのご入居に関するお問い合わせ受け付けております。<br class="sp-none">ご質問などございましたら、下記項目をご入力の上、ご送信ください。</p>
  </div>
</div>


<div id="form" class="wrap-m space-3s space-m-bottom bg-white form-wrap">
  <?php echo do_shortcode('[contact-form-7 id="e6f4eea" title="新共通お問い合わせ"]'); ?>
</div>

</main>

<?php get_footer(); ?>