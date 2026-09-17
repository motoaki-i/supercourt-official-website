<?php get_header(); ?>

<main id="event">

<div class="lower-mv">
  <figure class="lower-mv-image">
    <img src="<?php bloginfo('template_directory');?>/assets/image/feature/mv7.jpg" alt="">
  </figure>
  <div class="ttl-lower-wrap">
    <h1 class="ttl-lower txt-white bg-black"><?php the_title()?></h1>
  </div>
</div>

<ul class="pan">
    <li class="txt-en-s"><a href="<?php echo esc_url(home_url('/')); ?>">TOP</a></li>
    <li class="txt-en-s">-</li>
    <li class="txt-jp-s"><a href="<?php echo esc_url(home_url('/feature/')); ?>">スーパー・コートの特徴</a></li>
    <li class="txt-en-s">-</li>
    <li class="txt-jp-s"><?php the_title()?></li>
</ul>

<section class="space-2s space-3l-bottom">

  <div class="wrap-m">
    <h2 class="ttl-jp-4l txt-bold txt-center mb2">みんなで楽しめるイベントも、<br class="pc-only"><span class="txt-orange">一人ひとりに合わせた</span>趣味の場も。</h2>
    <p class="middle space-2s-bottom">ご入居者の皆様にイキイキとした生活を送っていただくために、施設ごとに年間を通してさまざまなレクリエーションを企画・開催しています。 プレミアム施設や「オリーブ」シリーズの施設では、コンシェルジュがイベントの企画・運営を手がけ、少人数グループや個別の趣味の場などもご用意しています。</p>
  </div>

  <div class="bg-beige space-s space-s-bottom">
    <div class="wrap-m">
      <h2 class="ttl-jp-4l txt-bold txt-center space-3s-bottom">レクリエーション</h2>
      <div class="recreation-item bg-white space-3s space-3s-bottom">
        <h3 class="ttl-dots-l-orange ttl-jp-l txt-medium mb1">施設ごとに趣向をこらしたレクリエーションを開催</h3>
        <hr>
        <p class="mb2">もちつき大会や夏祭りなど四季折々の行事から、書道や園芸などの頭や体を使うレクリエーション、その他にもボランティアの方をお招きしての和太鼓やダンス、演奏会など、楽しいレクリエーションがたくさん行われています。</p>
        <p class="space-3s-bottom">※レクリエーションの内容は施設によって異なります。</p>
        <div class="grid3 gg1">
          <figure>
              <img src="<?php bloginfo('template_directory');?>/assets/image/feature/recreation01.jpg" alt="レクリエーション">
          </figure>
          <figure>
              <img src="<?php bloginfo('template_directory');?>/assets/image/feature/recreation02.jpg" alt="レクリエーション">
          </figure>
          <figure>
              <img src="<?php bloginfo('template_directory');?>/assets/image/feature/recreation03.jpg" alt="レクリエーション">
          </figure>
          <figure>
              <img src="<?php bloginfo('template_directory');?>/assets/image/feature/recreation04.jpg" alt="レクリエーション">
          </figure>
          <figure>
              <img src="<?php bloginfo('template_directory');?>/assets/image/feature/recreation05.jpg" alt="レクリエーション">
          </figure>
          <figure>
              <img src="<?php bloginfo('template_directory');?>/assets/image/feature/recreation06.jpg" alt="レクリエーション">
          </figure>
        </div>
      </div>
    </div>
  </div>

  <div class="wrap-m space-s">
    <h2 class="ttl-jp-4l txt-bold txt-center mb1"><span class="txt-orange">オーダーメイドでつくる</span>趣味の場、交流の場</h2>
    <hr>
    <p>スーパー・コートのプレミアム施設や「オリーブ」シリーズの施設では、常勤のコンシェルジュたちがイベントの企画・運営も手がけています。ご入居者お一人おひとりの、これまで歩まれてきた人生や趣味嗜好、ご要望などを聴き、同じの趣味を持つ方との少人数グループの趣味の場や、演奏会・お茶会などの交流の場などを企画しています。</p>
  </div>

</section>

</main>

<?php get_footer(); ?>