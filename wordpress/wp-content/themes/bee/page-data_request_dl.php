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
    <li class="txt-jp-s">資料ダウンロード</li>
  </ul>
  <div class="wrap-m">
  <h2 class="ttl-jp-4l  txt-bold txt-center space-3s">資料ダウンロード</h2>
  </div>
</div>


<div id="form" class="wrap-m">
  <div class="document-select grid">
    <p class=" txt-bold txt-white txt-center"><a class="document-select-btn txt-jp-m txt-bold txt-center bg-orange" href="<?php echo esc_url(home_url('/data_request_dl/')); ?>">資料ダウンロード</a></p>
    <p class="txt-centert"><a class="document-select-btn txt-jp-m txt-bold txt-center" href="<?php echo esc_url(home_url('/data_request/')); ?>" style="background-color: #CCCCCC;">郵送で資料請求</a></p>
  </div>
  <div class="space-3s space-m-bottom bg-white form-wrap">
    <div>
      <p class="ttl-jp-l txt-bold mt1">「送信完了ページ」で資料を<br class="pc-none">ダウンロードいただけます。<br>下記項目をご入力の上、<br class="sp-only">ご送信ください。</p>
      <p class="mt1">ご入居希望施設の設備や食事、費用、介護体制などが<br class="sp-none">詳しく分かる資料をダウンロードいただけます。</p>
    </div>
    <div class="space-2s">
    <?php echo do_shortcode('[contact-form-7 id="23cc8c8" title="新共通資料ダウンロード"]'); ?>
    </div>
  </div>
  
</div>

</main>

<script src="https://ajaxzip3.github.io/ajaxzip3.js"></script>
<script>
$(function(){
    $('input[name="zipcode1"]').keyup(function(){
        AjaxZip3.zip2addr(this, '', 'address1', 'address2');
    });
});
</script>

<?php get_footer(); ?>