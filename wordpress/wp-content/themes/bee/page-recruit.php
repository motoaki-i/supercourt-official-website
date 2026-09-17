<?php get_header('recruit'); ?>

<main id="recruit">

<div class="main-visual">
    <div class="main-visual-content">
        <div class="card-container"><img class="mb1 card" src="<?php bloginfo('template_directory');?>/assets/image/recruit/kansai.webp" alt="世界やない、関西やねん。"><br><span class="ttl-en-2l txt-bold txt-center txt-white card">SUPERCOURT RECRUIT</span></div>
    </div>

    <div class="carousel-row row-1">
        <div class="carousel-track">
            <div class="carousel-item"><img src="<?php bloginfo('template_directory');?>/assets/image/recruit/inoue2.jpg" alt=""></div>
            <div class="carousel-item"><img src="<?php bloginfo('template_directory');?>/assets/image/recruit/hanao2.jpg" alt=""></div>
            <div class="carousel-item"><img src="<?php bloginfo('template_directory');?>/assets/image/recruit/ishii2.jpg" alt=""></div>
            <div class="carousel-item"><img src="<?php bloginfo('template_directory');?>/assets/image/recruit/kamoi2.jpg" alt=""></div>
            <div class="carousel-item"><img src="<?php bloginfo('template_directory');?>/assets/image/recruit/kawasaki2.jpg" alt=""></div>
            <div class="carousel-item"><img src="<?php bloginfo('template_directory');?>/assets/image/recruit/masaoka2.jpg" alt=""></div>
        </div>
    </div>

    <div class="carousel-row row-2">
        <div class="carousel-track">
            <div class="carousel-item"><img src="<?php bloginfo('template_directory');?>/assets/image/recruit/mori2.jpg" alt=""></div>
            <div class="carousel-item"><img src="<?php bloginfo('template_directory');?>/assets/image/recruit/morishita2.jpg" alt=""></div>
            <div class="carousel-item"><img src="<?php bloginfo('template_directory');?>/assets/image/recruit/nakano2.jpg" alt=""></div>
            <div class="carousel-item"><img src="<?php bloginfo('template_directory');?>/assets/image/recruit/okura2.jpg" alt=""></div>
            <div class="carousel-item"><img src="<?php bloginfo('template_directory');?>/assets/image/recruit/hudo.jpg" alt=""></div>
            <div class="carousel-item"><img src="<?php bloginfo('template_directory');?>/assets/image/recruit/kawasaki3.jpg" alt=""></div>
        </div>
    </div>

    <div class="carousel-row row-3">
        <div class="carousel-track">
            <div class="carousel-item"><img src="<?php bloginfo('template_directory');?>/assets/image/recruit/tomino2.jpg" alt=""></div>
            <div class="carousel-item"><img src="<?php bloginfo('template_directory');?>/assets/image/recruit/inoue3.jpg" alt=""></div>
            <div class="carousel-item"><img src="<?php bloginfo('template_directory');?>/assets/image/recruit/hanao3.jpg" alt=""></div>
            <div class="carousel-item"><img src="<?php bloginfo('template_directory');?>/assets/image/recruit/ishii3.jpg" alt=""></div>
            <div class="carousel-item"><img src="<?php bloginfo('template_directory');?>/assets/image/recruit/kamoi3.jpg" alt=""></div>
            <div class="carousel-item"><img src="<?php bloginfo('template_directory');?>/assets/image/recruit/okura3.jpg" alt=""></div>
        </div>
    </div>
</div>

<!--
<div class="lower-mv">
  <figure class="lower-mv-image">
    <img src="<?php bloginfo('template_directory');?>/assets/image/recruit/mv.jpg" alt="">
  </figure>
</div>
-->

<!--
<ul class="pan">
    <li class="txt-en-s"><a href="<?php echo esc_url(home_url('/')); ?>">TOP</a></li>
    <li class="txt-en-s">-</li>
    <li class="txt-jp-s"><?php the_title()?></li>
</ul>
-->

<section class="top-news space-2s">
  <div class="wrap-m-right fade-in">
    <div class="top-news__head">
      <div class="top-news__ttl ttl-jp-2l">
        <h4>お知らせ</h4>
        <span class="top-news__ttl-en block">
          <img src="<?php bloginfo('template_directory');?>/assets/image/top/news_ttl_en.svg" alt="News">
        </span>
      </div>
    </div>
    <div class="top-news__cont">
      <div class="top-news__right">
      <?php
      // --- 修正部分: $args に tax_query を追加 ---
      $args = array(
        'post_type'      => 'news',
        'posts_per_page' => 3,
        'order'          => 'DESC',
        'tax_query'      => array(
          array(
            'taxonomy' => 'news_category',
            'field'    => 'slug',
            'terms'    => array('news-recruit'), // 指定のスラッグ
            'operator' => 'IN',
          ),
        ),
      );
      $query = new WP_Query($args);
      ?>
      <?php if ( $query->have_posts() ) : ?>
        <ul class="top-news__list">
        <?php while ( $query->have_posts() ) : $query->the_post();?>
          <li>
            <a href="<?php the_permalink(); ?>">
              <div class="top-news__info">
                <time><?php the_time('Y.m.d'); ?></time>
                <?php 
                $terms = get_the_terms($post->ID, 'news_category');
                if ($terms && !is_wp_error($terms)) {
                  foreach ($terms as $term) {
                    $additional_class = '';
                    // スラッグによる条件分岐（必要に応じて news-open 等に調整してください）
                    if ($term->slug === 'news-open' || $term->slug === 'open') {
                        $additional_class = 'news-cate--open';
                    } elseif ($term->slug === 'news-information' || $term->slug === 'info') {
                        $additional_class = 'news-cate--info';
                    }
                    // タグの出力
                    echo '<span class="top-news__tag txt-bold txt-white bg-orange ' . esc_attr($additional_class) . '">' . esc_html($term->name) . '</span>';
                  }
                }?>
              </div>
              <h3 class="top-news__txt"><?php the_title(); ?></h3>
            </a>
          </li>
          <?php endwhile; ?>
        </ul>
        <?php endif; wp_reset_postdata(); ?>
      </div>
    </div>
  </div>
</section>

<section class="top-leadtext space-2s space-2s-bottom wrap-m">
<h2 class="ttl-jp-2l mb1 txt-center fade-in"><span class="ttl-en-2l txt-bold txt-center txt-orange">MESSAGE</span><br>地域のためにできること</h2>
<p class="txt-center fade-in">介護サービスは、提供する人そのものが商品。<br>
あなたの気づきやモチベーションが、<br>
目の前のお客様の生活を変えることができる、満足をお届けすることができる仕事です。<br>
私たちは、お客様満足への第一歩は、社員が目標を持ってイキイキと働き、<br>
主体的に成長していくことだと考えております。</p>
</section>

<section class="top-interview">
<div class="interview-header card-container">
<h2 class="txt-jp-s mb1 txt-bold card"><span class="txt-en-2l">INTERVIEW</span><br>社員インタビュー</h2>
<p class="card">「自律型感動人間」に共感いただける方、<br>私たちと一緒に成長したい方からのご応募を心よりお待ちしています。 </p>
</div>

<div class="swiper top-interview-swiper not-pc">
<div class="swiper-wrapper">
<div class="swiper-slide">
    <figure><img src="<?php bloginfo('template_directory');?>/assets/image/recruit/tomino.jpg" alt=""></figure>
    <p class="txt-jp-s">介護士/サービス提供責任者</p>
    <div class="interview-name"><div class="interview-name-jp"><span class="ttl-jp-m txt-bold">富野 奈実</span></div><div class="interview-name-en"><span class="txt-en-s txt-bold txt-right">NAMI TOMINO</span></div></div>
</div>
<div class="swiper-slide">
    <figure><img src="<?php bloginfo('template_directory');?>/assets/image/recruit/mori.jpg" alt=""></figure>
    <p class="txt-jp-s">介護士/サービス提供責任者</p>
    <div class="interview-name"><div class="interview-name-jp"><span class="ttl-jp-m txt-bold">森 剛士</span></div><div class="interview-name-en"><span class="txt-en-s txt-bold txt-right">TAKESHI MORI</span></div></div>
</div>
<div class="swiper-slide">
    <figure><img src="<?php bloginfo('template_directory');?>/assets/image/recruit/hanao.jpg" alt=""></figure>
    <p class="txt-jp-s">介護士/サービス提供責任者</p>
    <div class="interview-name"><div class="interview-name-jp"><span class="ttl-jp-m txt-bold">花尾 奏一</span></div><div class="interview-name-en"><span class="txt-en-s txt-bold txt-right">SOICHI HANAO</span></div></div>
</div>
<div class="swiper-slide">
    <figure><img src="<?php bloginfo('template_directory');?>/assets/image/recruit/morishita.jpg" alt=""></figure>
    <p class="txt-jp-s">介護士/サービス提供責任者</p>
    <div class="interview-name"><div class="interview-name-jp"><span class="ttl-jp-m txt-bold">森下 千絵子</span></div><div class="interview-name-en"><span class="txt-en-s txt-bold txt-right">CHIEKO MORISHITA</span></div></div>
</div>
</div>
</div>

<div class="not-sp">
<ul class="interview-wrapper card-container">
<li class="interviews card">
    <figure><img src="<?php bloginfo('template_directory');?>/assets/image/recruit/tomino.jpg" alt=""></figure>
    <p class="txt-jp-s">介護士/サービス提供責任者</p>
    <div class="interview-name"><div class="interview-name-jp"><span class="ttl-jp-m txt-bold">富野 奈実</span></div><div class="interview-name-en"><span class="txt-en-s txt-bold txt-right">TAKESHI MORI</span></div></div>
</li>
<li class="interviews card">
    <figure><img src="<?php bloginfo('template_directory');?>/assets/image/recruit/mori.jpg" alt=""></figure>
    <p class="txt-jp-s">介護士/サービス提供責任者</p>
    <div class="interview-name"><div class="interview-name-jp"><span class="ttl-jp-m txt-bold">森 剛士</span></div><div class="interview-name-en"><span class="txt-en-s txt-bold txt-right">TAKESHI MORI</span></div></div>
</li>
<li class="interviews card">
    <figure><img src="<?php bloginfo('template_directory');?>/assets/image/recruit/hanao.jpg" alt=""></figure>
    <p class="txt-jp-s">介護士/サービス提供責任者</p>
    <div class="interview-name"><div class="interview-name-jp"><span class="ttl-jp-m txt-bold">花尾 奏一</span></div><div class="interview-name-en"><span class="txt-en-s txt-bold txt-right">SOICHI HANAO</span></div></div>
</li>
<li class="interviews card">
    <figure><img src="<?php bloginfo('template_directory');?>/assets/image/recruit/morishita.jpg" alt=""></figure>
    <p class="txt-jp-s">介護士/サービス提供責任者</p>
    <div class="interview-name"><div class="interview-name-jp"><span class="ttl-jp-m txt-bold">森下 千絵子</span></div><div class="interview-name-en"><span class="txt-en-s txt-bold txt-right">CHIEKO MORISHITA</span></div></div>
</li>
</ul>
</div>


<p class="link-button-container fade-in">
<a href="./interview" class="gradient-button">
VIEW MORE
<svg class="arrow-svg" viewBox="0 0 9 14" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M1 1L7 7L1 13" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
</a>
</p>

</section>


<section class="top-intro">
    <div class="top-intro-inner">
    <h2 class="txt-jp-s mb1 txt-bold txt-center txt-white fade-in"><span class="txt-en-2l">INTRODUCTION</span><br>スーパー・コートのご紹介</h2>
    <ul class="card-container">
        <li class="card"><div class="youtube-container"><iframe src="https://www.youtube.com/embed/6jrfFEUpiXY?rel=0&si=EF49ztwjF9fn0DGQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe></div></li>
        <li class="card"><div class="youtube-container"><iframe src="https://www.youtube.com/embed/zLfQUDE2ifM?rel=0&si=cwEJUf7E-nDkiqaK" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe></div></li>
    </ul>
    </div>
</section>




<section class="top-aboutus">
    <div class="aboutus-header card-container">
        <h2 class="txt-jp-s mb1 txt-bold card"><span class="txt-en-2l">ABOUT US</span></h2>
        <p class="card mb1">株式会社スーパー・コートは、関西での賃貸管理事業から始まりました。賃貸事業で培った快適な住環境提供のノウハウと、グループ会社のおもてなし力、介護力を融合させ、独自のサービスを展開します。</p>
        <p class="link-container card">
        <a href="./recruit_company" class="cta-link">
        スーパー・コートについて
        <span class="circle-arrow-wrapper">
        <svg class="circle-svg" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
        <circle cx="14" cy="14" r="12" stroke="#FF5F00" stroke-width="1"/>
        </svg>
        <span class="arrow-icon">→</span>
        </span>
        </a>
        </p>
    </div>
    <figure class="fade-in"><img src="<?php bloginfo('template_directory');?>/assets/image/recruit/f_recruit.jpg" alt=""></figure>
</section>



<section class="top-jobtype">
    <div class="top-jobtype-inner">
    <h2 class="txt-jp-s mb1 txt-bold txt-center txt-white fade-in"><span class="txt-en-2l">JOB INFORMATION</span><br>職種紹介</h2>
    <ul class="">
        <li class="fade-in">
            <a href="./job-kaigo">
            <figure><img src="<?php bloginfo('template_directory');?>/assets/image/recruit/staff-kaigo.webp" alt=""></figure>
            <p>介護職</p>
            </a>
        </li>
        <li class="fade-in">
            <a href="./job-nurse">
            <figure><img src="<?php bloginfo('template_directory');?>/assets/image/recruit/staff-nurs.webp" alt=""></figure>
            <p>看護職</p>
            </a>
        </li>
        <li class="fade-in">
            <a href="./job-pos">
            <figure><img src="<?php bloginfo('template_directory');?>/assets/image/recruit/staff-pos.webp" alt=""></figure>
            <p>セラピスト</p>
            </a>
        </li>
        <li class="fade-in">
            <a href="./job-clean">
            <figure><img src="<?php bloginfo('template_directory');?>/assets/image/recruit/staff-clean.webp" alt=""></figure>
            <p>クリーン・サービス</p>
            </a>
        </li>
        <li class="fade-in">
            <a href="./job-concierge">
            <figure><img src="<?php bloginfo('template_directory');?>/assets/image/recruit/staff-concierge.webp" alt=""></figure>
            <p>コンシェルジュ</p>
            </a>
        </li>
        <li class="fade-in">
            <a href="./job-jimu">
            <figure><img src="<?php bloginfo('template_directory');?>/assets/image/recruit/staff-jimu.webp" alt=""></figure>
            <p>事務</p>
            </a>
        </li>
        <li class="fade-in">
            <a href="./job-fukushiyogu">
            <figure><img src="<?php bloginfo('template_directory');?>/assets/image/recruit/staff-fukushiyogu.webp" alt=""></figure>
            <p>福祉用具専門相談員</p>
            </a>
        </li>
        <li class="fade-in">
            <a href="./job-caremanager">
            <figure><img src="<?php bloginfo('template_directory');?>/assets/image/recruit/staff-caremanager.webp" alt=""></figure>
            <p>ケアマネジャー</p>
            </a>
        </li>
    </ul>
    </div>
</section>



<section class="top-ourmind">
<div class="top-ourmind-inner">
    <div class="ourmind-header card-container">
        <h2 class="txt-jp-s mb1 txt-bold card"><span class="txt-en-2l">OUR MIND</span></h2>
        <p class="card mb1">私たちの使命は、地域の方に「スーパー・コートがあるから老後が安心」だと、思っていただくことです。<br>地域密着で、医療、薬局、看護、介護の包括サービスを提供し、地域の方々への安心の老後をお届けするため、スーパー・コートができることを追求し続けます。</p>
    </div>
<ul class="card-container">
    <li class="card">
        <a href="./philosophy#policy">採用の方針
        <svg class="" viewBox="0 0 9 14" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M1 1L7 7L1 13" stroke="" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg></a>
    </li>
    <li class="card">
        <a href="./philosophy#culture">会社の風土
        <svg class="" viewBox="0 0 9 14" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M1 1L7 7L1 13" stroke="" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg></a>
    </li>
    <li class="card">
        <a href="./philosophy#future">介護の未来
        <svg class="" viewBox="0 0 9 14" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M1 1L7 7L1 13" stroke="" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg></a>
    </li>
    <li class="card">
        <a href="./philosophy#award">総合的な取り組み
        <svg class="" viewBox="0 0 9 14" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M1 1L7 7L1 13" stroke="" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg></a>
    </li>
    <!--<li class="card">
        <a href="./recruit_company#data">数字で見るスーパー・コート
        <svg class="" viewBox="0 0 9 14" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M1 1L7 7L1 13" stroke="" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg></a>
    </li>-->
</ul>
</div>
</section>



<section class="entrybanner-wrapper">
    <div class="entrybanner-simple">
        <a href="https://forms.gle/wSGeTA46agEmdJxbA" target="_blank" class="entry-link">
            <p>持てる力を思う存分発揮したい方からの<br>ご応募を心よりお待ちしています。</p>
            <span class="txt-en-l">キャリア採用ENTRY</span>
            <svg class="circle-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle></svg>
            <svg class="arrow-icon2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
        </a>
    </div>
    <div class="entrybanner-simple newgraduate">
        <a href="./recruit_newgraduateinfo" class="entry-link">
            <p>私たちと一緒に成長したい方からの<br>ご応募を心よりお待ちしています。</p>
            <span class="txt-en-l">新卒採用ENTRY</span>
            <svg class="circle-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle></svg>
            <svg class="arrow-icon2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
        </a>
    </div>
</section>



<!--
<div>
<p class="ttl-en-2l txt-black">Recruit</p>
<h1 class="txt-white bg-black"><?php the_title()?></h1>
</div>

<div class="space-2s space-2s-bottom wrap-m">
<p class="ttl-jp-2l mb1">日本一、「ありがとう」が<br class="pc-only">溢れる場所になろう。</p>
<p>地域の方々に「スーパー・コートがあるから老後が安心」と思っていただくために。<br>株式会社スーパー・コートでは、新たな仲間を募集しています。</p>
</div>
-->

</main>

<?php get_footer('recruit'); ?>