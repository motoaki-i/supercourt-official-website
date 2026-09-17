<?php set_views_count( get_the_ID() ); ?>
<?php get_header(); ?>

<main>

<?php if (have_posts()) : the_post(); ?>

<div class="lower-mv">
  <figure class="lower-mv-image">
    <img src="<?php bloginfo('template_directory');?>/assets/image/certificate/mv.jpg" alt="">
  </figure>
</div>

<ul class="pan">
  <li class="txt-jp-s"><a href="<?php echo esc_url(home_url('/')); ?>">TOP</a></li>
  <li class="txt-jp-s">-</li>
  <li class="txt-jp-s">リンク集</li>
  <li class="txt-jp-s">-</li>
  <li class="txt-jp-s"><?php the_title(); ?></li>
</ul>

<section class="link-list space-m space-3l-bottom">
  <div class="link-list__wrap maw-960">
    <div class="link-list__ttl">
      <h1 class="txt-bold"><?php the_title(); ?> <span class="ib txt-orange">リンク集</span></h1>
    </div>
    <ul class="link-list__cont txt-medium">
      <?php if( get_field('form') ):?>
      <li>
        <a class="flex flex-between align-center" href="<?php the_field('form');?>" target="_blank">
          <span class="link-list__cont-txt">資料請求・見学申込・お問合せフォーム</span>
          <span class="link-list__cont-icon">
            <img src="<?php bloginfo('template_directory');?>/assets/image/link-list/snsicon-supercourt.webp" alt="">
          </span>
        </a>
      </li>
      <?php endif; ?>
      <?php if( get_field('website') ):?>
      <li>
        <a class="flex flex-between align-center" href="<?php the_field('website');?>" target="_blank">
          <span class="link-list__cont-txt">施設公式ホームページ</span>
          <span class="link-list__cont-icon">
            <img src="<?php bloginfo('template_directory');?>/assets/image/link-list/snsicon-supercourt.webp" alt="">
          </span>
        </a>
      </li>
      <?php endif; ?>
      <?php if( get_field('blog') ):?>
      <li>
        <a class="flex flex-between align-center" href="<?php the_field('blog');?>" target="_blank">
          <span class="link-list__cont-txt">施設公式ブログ</span>
          <span class="link-list__cont-icon">
            <img src="<?php bloginfo('template_directory');?>/assets/image/link-list/snsicon-supercourt.webp" alt="">
          </span>
        </a>
      </li>
      <?php endif; ?>
      <?php if( get_field('tiktok') ):?>
      <li>
        <a class="flex flex-between align-center" href="<?php the_field('tiktok');?>" target="_blank">
          <span class="link-list__cont-txt">施設公式 TikTok</span>
          <span class="link-list__cont-icon">
            <img src="<?php bloginfo('template_directory');?>/assets/image/link-list/snsicon-tiktok.webp" alt="">
          </span>
        </a>
      </li>
      <?php endif; ?>
      <?php if( get_field('instagram') ):?>
      <li>
        <a class="flex flex-between align-center" href="<?php the_field('instagram');?>" target="_blank">
          <span class="link-list__cont-txt">施設公式 Instagram</span>
          <span class="link-list__cont-icon">
            <img src="<?php bloginfo('template_directory');?>/assets/image/link-list/snsicon-instagram.webp" alt="">
          </span>
        </a>
      </li>
      <?php endif; ?>
      <?php if( get_field('review') ):?>
      <li>
        <a class="flex flex-between align-center" href="<?php the_field('review');?>" target="_blank">
          <span class="link-list__cont-txt">Googleクチコミ</span>
          <span class="link-list__cont-icon">
            <img src="<?php bloginfo('template_directory');?>/assets/image/link-list/snsicon-googlereview.webp" alt="">
          </span>
        </a>
      </li>
      <?php endif; ?>
      <?php if( get_field('map') ):?>
      <li>
        <a class="flex flex-between align-center" href="<?php the_field('map');?>" target="_blank">
          <span class="link-list__cont-txt">Googleマップ</span>
          <span class="link-list__cont-icon">
            <img src="<?php bloginfo('template_directory');?>/assets/image/link-list/snsicon-googlemap.webp" alt="">
          </span>
        </a>
      </li>
      <?php endif; ?>
      <li>
        <a class="flex flex-between align-center" href="tel:0120-532-029">
          <span class="link-list__cont-txt">お電話でのお問合せ</span>
          <span class="link-list__cont-icon">
            <img src="<?php bloginfo('template_directory');?>/assets/image/link-list/snsicon-freecall.webp" alt="">
          </span>
        </a>
      </li>
    </ul>

    <ul class="link-list__cont txt-medium">
      <li>
        <a class="flex flex-between align-center" href="https://www.tiktok.com/@super.court" target="_blank">
          <span class="link-list__cont-txt">スーパー・コート公式 TikTok</span>
          <span class="link-list__cont-icon">
            <img src="<?php bloginfo('template_directory');?>/assets/image/link-list/snsicon-tiktok.webp" alt="">
          </span>
        </a>
      </li>
      <li>
        <a class="flex flex-between align-center" href="https://www.instagram.com/super.court/" target="_blank">
          <span class="link-list__cont-txt">スーパー・コート公式 Instagram <br class="sp-only">「介護の教科書」</span>
          <span class="link-list__cont-icon">
            <img src="<?php bloginfo('template_directory');?>/assets/image/link-list/snsicon-instagram.webp" alt="">
          </span>
        </a>
      </li>
      <li>
        <a class="flex flex-between align-center" href="https://www.youtube.com/@%E3%81%8A%E3%82%82%E3%81%A6%E3%81%AA%E3%81%97%E3%81%AE%E4%BB%8B%E8%AD%B7%E3%82%B9%E3%83%BC%E3%83%91%E3%83%BC%E3%82%B3%E3%83%BC%E3%83%88" target="_blank">
          <span class="link-list__cont-txt">スーパー・コート公式 YouTube <br class="sp-only">「おもてなしの介護」</span>
          <span class="link-list__cont-icon">
            <img src="<?php bloginfo('template_directory');?>/assets/image/link-list/snsicon-youtube.webp" alt="">
          </span>
        </a>
      </li>
      <li>
        <a class="flex flex-between align-center" href="https://recruit.supercourt.co.jp/?_gl=1*1pgyy1c*_gcl_au*MTY5NTQ1NTIwNy4xNzQxNjcwMDUy" target="_blank">
          <span class="link-list__cont-txt">新卒採用サイト</span>
          <span class="link-list__cont-icon">
            <img src="<?php bloginfo('template_directory');?>/assets/image/link-list/snsicon-supercourt.webp" alt="">
          </span>
        </a>
      </li>
      <li>
        <a class="flex flex-between align-center" href="https://career.supercourt.co.jp/?_gl=1*m7ai42*_gcl_au*MTY5NTQ1NTIwNy4xNzQxNjcwMDUy" target="_blank">
          <span class="link-list__cont-txt">キャリア採用サイト</span>
          <span class="link-list__cont-icon">
            <img src="<?php bloginfo('template_directory');?>/assets/image/link-list/snsicon-supercourt.webp" alt="">
          </span>
        </a>
      </li>
    </ul>

  </div>
</section>


<?php endif; ?>
</main>

<?php get_footer(); ?>