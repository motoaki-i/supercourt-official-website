<?php get_header(); ?>

<main id="olive olive-kusatsu" class="facility-detail-page olive-detail-page">

<div class="lp-mv relative">
  <figure class="lp-mv-image">
    <img src="<?php bloginfo('template_directory');?>/assets/image/facility/prime/mv_primekamiishi.webp" alt="">
  </figure>
  <div class="ttl-lp-wrap bg-gold-gradiate relative">
    <!--<p class="ttl-lp-up ttl-lp-up--narashinomiya"><img src="<?php bloginfo('template_directory');?>/assets/image/facility/olive/ttl-narashinomiya.svg" alt="Olive Narashinomiya"></p>-->
    <!--<figure class="lp-logo"><img src="<?php bloginfo('template_directory');?>/assets/image/facility/olive/logo.png" alt="OLIVE"></figure>-->
    <h1 class="ttl-lp-jp txt-white  txt-medium">介護付き有料老人ホーム｜堺市堺区<br>スーパー・コート プライム神石</h1>
    <!--<p class="ttl-lp-open">2025年<br><span>9</span>月<span>1</span>日<br>オープン</p>-->
  </div>
</div>

<section class="lp-overview space-l-bottom bg-beige">
  <div class="lp-overview-wrap">
    <div class="lp-overview-inner wrap-l-right space-s-bottom">
      <ul class="pan space-3s-bottom">
      <li class="txt-en-s"><a href="<?php echo esc_url(home_url('/')); ?>">TOP</a></li>
      <li class="txt-en-s">-</li>
      <li class="txt-jp-s"><a href="<?php echo esc_url(home_url('/facility-list/')); ?>">有料老人ホーム・介護施設一覧</a></li>
      <li class="txt-en-s">-</li>
      <li class="txt-jp-s"><?php the_title()?></li>
    </ul>
    <!--<div class="space-s-bottom">
              <a href="https://www.supercourt.jp/news/news-11724/" target="_blank"><img src="https://www.supercourt.jp/wordpress/wp-content/uploads/2025/11/プライム神石_リハビリ勉強会_2025.12.05_教授なし.webp" alt="プライム神石_リハビリ勉強会"></a>
    </div>-->


<section class="scfacility-blog mt2 space-3s-bottom">
    <div class="scfacility-ttl txt-center">
        <span class="scfacility-ttl__en txt-bold en-upper">Blog</span>
        <h2 class="scfacility-ttl__jp txt-24-40 txt-bold txt-darkgold">新着施設ブログ</h2>
    </div>
    <div class="scfacility-blog__cont__wrap mt2">
        <?php
            // 表示したいブログのURLを直接指定
            $base_url = 'https://www.supercourt.jp/blog/kamiishi2/';
            $base_url = rtrim( $base_url, '/' );
            
            // フィードURLの設定（通常のWordPressの場合は /feed/ が一般的です）
            // 元のコードに合わせて /xml/atom.xml としていますが、表示されない場合は /feed/ に変更してください
            $feed_url = $base_url . '/xml/atom.xml';
            
            echo do_shortcode(
                '[mt_feed url="' . esc_url( $feed_url ) . '" count="3" more="' . esc_url( $base_url . '/' ) . '"]'
            );
        ?>
    </div>
    <div class="scfacility-btn__wrap">
        <?php $blog_url = 'https://www.supercourt.jp/blog/kamiishi2/'; ?>
        <a class="scfacility__btn scfacility-blog__btn btn bg-orange-gradiate-reverse" href="<?php echo esc_url( $blog_url ); ?>" target="_blank">
            <span class="txt-13-16 txt-white txt-bold">施設ブログの一覧はこちら</span>
        </a>
    </div>


<?php
/**
 * イベント情報表示パーツ（固定ページ用・手動指定版）
 * 表示したいイベントカテゴリスラッグを以下の '' の中に入力してください
 */
$manual_event_slug = 'news-event-prime-kamiishi'; // ← ここを表示したいスラッグに書き換える
?>

<?php
if ($manual_event_slug) :
    // 1. クエリの設定
    $args = array(
        'post_type'      => array('post', 'news'), // 投稿タイプ
        'posts_per_page' => 3,                     // 表示件数
        'tax_query'      => array(
            array(
                'taxonomy' => 'news_category',     // タクソノミー名
                'field'    => 'slug',
                'terms'    => $manual_event_slug,  // 手動指定したスラッグ
            ),
        ),
    );

    $event_query = new WP_Query($args);

    // 2. 投稿がある場合のみ枠ごと表示
    if ($event_query->have_posts()) : ?>

        <section class="scfacility-events mt2">
            <div class="scfacility-events__inner maw-960">
                <div class="scfacility-ttl txt-center">
                    <span class="scfacility-ttl__en txt-bold en-upper">Events</span>
                    <h2 class="scfacility-ttl__jp txt-24-40 txt-bold txt-darkgold"><?php the_title(); ?>のイベント情報</h2>
                </div>

                <div class="scfacility-events__cont mt2">
                    <ul class="event-list">
                        <?php while ($event_query->have_posts()) : $event_query->the_post(); ?>
                            <?php 
                            // サムネイルURL取得（ない場合はNo Image画像）
                            $thumb_url = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                            if (!$thumb_url) {
                                $thumb_url = get_template_directory_uri() . '/assets/image/common/noimage.jpg';
                            }
                            ?>
                            <li class="event-item">
                                <a href="<?php the_permalink(); ?>" class="event-item__link" target="_blank">
                                    <div class="event-item__thumb">
                                        <img src="<?php echo esc_url($thumb_url); ?>" alt="<?php the_title(); ?>" loading="lazy">
                                    </div>
                                    <div class="event-item__info">
                                        <span class="event-item__date txt-12-14"><?php the_time('Y.m.d'); ?></span>
                                        <h3 class="event-item__title txt-bold txt-15-20"><?php the_title(); ?></h3>
                                    </div>
                                </a>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            </div>
        </section>

        <?php 
        wp_reset_postdata(); 
    endif;
endif;
?>

</section>

<div class="">
        <div class="space-s-bottom">
      <figure class="mb1 facility-feature-banner"><a href="#form"><img src="<?php bloginfo('template_directory');?>/assets/image/facility/prime/prime-trialplan.webp" alt="point04"></a></figure>
    </div>
    </div>


    <div class="lp-overview-cont">
      <h2 class="lp-overview-ttl ttl-border-b-gold txt-darkgold txt-bold txt-center">安心と上質が融合した<br>プライムシリーズ</h2>
      <p class="mb1 txt-center ttl-jp-ml txt-bold mb1">難病ケアも可能な専門スタッフが寄り添う、<br>イキイキ・上質・心地よい暮らし</p>
      <figure class="mb1"><img src="<?php bloginfo('template_directory');?>/assets/image/facility/prime/prime-kaigo.webp" alt="専門リハビリ"></figure>
      <p class="txt-jp-m middle">確かな安心のもとで人生を謳歌する場所、それがスーパー・コートのプライムシリーズです。<br>妥協しない、上質な暮らしを追求する方のための住まいとして、私たちは最高のサービスをご用意しました。<br>専門セラピストが監修する個別リハビリ、24時間体制の看護ケア、栄養と彩りに満ちたお食事、そして心身を癒す天然温泉。<br>これらすべてが、あなたの「やりたいこと」を支え、心豊かな毎日を実現します。<br>安心と快適、そして何よりも自分らしい輝きに満ちた日々が、ここにはあります。</p>
    </div>
  </div>
  </div>
</section>


<section id="olive-point" class="bg-beige relative">
  
  <div class="olive-sub-ttl-r bg-gold-gradiate wrap-m-right">
    <p class="ttl-ensrf-m txt-bold txt-center txt-brightgold">FEATURES</p>
    <h2 class="ttl-jp-4l  txt-white txt-bold txt-center">イキイキ・上質・心地よい<br>プライムな施設サービス</h2>
  </div>

  <div class="olive-point-wrap bg-white space-m space-3s-bottom wrap-l-right">

    <div class="wrap-m grid2 gg2">
      <div class="">
          <figure class="mb1"><img src="<?php bloginfo('template_directory');?>/assets/image/facility/prime/prime-thumb-meal.webp" alt="point04"></figure>
          <h3 class="ttl-premiumolive-point ttl-jp-l txt-bold txt-gold">バリエーション豊かな<br>こだわりのお食事</h3>
      </div>
      <div class="">
          <figure class="mb1"><img src="<?php bloginfo('template_directory');?>/assets/image/facility/prime/prime-thumb-onsen.webp" alt="point04"></figure>
           <h3 class="ttl-premiumolive-point ttl-jp-l txt-bold txt-gold">本物の天然温泉がある<br>週3回の特別な寛ぎ</h3>
      </div>
      <div class="">
          <figure class="mb1"><img src="<?php bloginfo('template_directory');?>/assets/image/facility/prime/prime-thumb-nursing.webp" alt="point03"></figure>
          <h3 class="ttl-premiumolive-point ttl-jp-l txt-bold txt-gold">日々の安心を支える<br>24時間看護体制</h3>
      </div>
      <div class="">
          <figure class="mb1"><img src="<?php bloginfo('template_directory');?>/assets/image/facility/prime/prime-thumb-reha.webp" alt="point01"></figure>
          <h3 class="ttl-premiumolive-point ttl-jp-l txt-bold txt-gold">専門セラピストが監修する<br>リハビリテーション</h3>
      </div>
    </div>

  </div>
  
</section>

<section class="space-s space-s-bottom">
<div class="olive-sub-ttl-r bg-gold-gradiate wrap-m-right mb2">
    <p class="ttl-ensrf-m txt-bold txt-center txt-brightgold">SPECIAL DISHES</p>
    <h2 class="ttl-jp-4l txt-white txt-bold txt-center">こだわり食材の<br>メニュー豊かなお食事</h2>
</div>
<div class="wrap-m">
  <figure class="mb1"><img src="<?php bloginfo('template_directory');?>/assets/image/facility/prime/prime-main-meal.webp" alt="専門リハビリ"></figure>
    <div class="mt2">
      <div class="">
        <h3 class="txt-center ttl-jp-2l txt-bold mb1 txt-gold">洗練された空間でいただく<br>こだわりの食材が彩る<br>ワンランク上のお食事</h3>
        <p class="space-3s-bottom">食は毎日の楽しみであり、生きる力そのものです。旬の食材を活かした、見た目にも美しい手作りの料理を日替わりでご提供します。和・洋・中のバラエティ豊かなメニューは、いつもの食卓を豊かに彩ります。また、咀嚼や嚥下が難しい方には、専門スタッフが一人ひとりの状態に合わせて食事形態を工夫。食べる喜びを諦めることなく、美味しく安全なお食事をお楽しみいただけます。</p>

      <section class="space-3s-bottom">
        <h4 class="ttl-jp-l txt-bold txt-center mb-half lineadd-lr">朝食</h4>
        <div class="col3-wrap">
        <div class="col3-child">
          <figure><img src="<?php bloginfo('template_directory');?>/assets/image/facility/prime/prime-morning_5.webp" alt="旬を味わう、小鉢を添えた伝統的な和膳"></figure>
          <p class="txt-bold mt-half mb-half">旬を味わう、小鉢を添えた伝統的な和膳</p>
        </div>
        <div class="col3-child">
          <figure><img src="<?php bloginfo('template_directory');?>/assets/image/facility/prime/prime-morning_1.webp" alt="優雅な朝を彩る、ホテルライクなモーニング"></figure>
          <p class="txt-bold mt-half mb-half">優雅な朝を彩る、ホテルライクなモーニング</p>
        </div>
        <div class="col3-child">
          <figure><img src="<?php bloginfo('template_directory');?>/assets/image/facility/prime/prime-morning_4.webp" alt="お出汁が染み渡る、鶏と大根の滋味深い朝御飯"></figure>
          <p class="txt-bold mt-half mb-half">お出汁が染み渡る、鶏と大根の滋味深い朝御飯</p>
        </div>
        <div class="col3-child">
          <figure><img src="<?php bloginfo('template_directory');?>/assets/image/facility/prime/prime-morning_2.webp" alt="焼きたてパンと彩り副菜のヘルシープレート"></figure>
          <p class="txt-bold mt-half mb-half">焼きたてパンと彩り副菜のヘルシープレート</p>
        </div>
        <div class="col3-child">
          <figure><img src="<?php bloginfo('template_directory');?>/assets/image/facility/prime/prime-morning_6.webp" alt="出汁香る玉子焼きと、栄養豊かなひじき煮の定番朝食"></figure>
          <p class="txt-bold mt-half mb-half">出汁香る玉子焼きと、栄養豊かなひじき煮の定番朝食</p>
        </div>
        <div class="col3-child">
          <figure><img src="<?php bloginfo('template_directory');?>/assets/image/facility/prime/prime-morning_3.webp" alt="ふわとろ卵と新鮮野菜の色彩豊かな朝食"></figure>
          <p class="txt-bold mt-half mb-half">ふわとろ卵と新鮮野菜の色彩豊かな朝食</p>
        </div>
        </div>
      </section>

      
      <section class="space-3s-bottom">
        <h4 class="ttl-jp-l txt-bold txt-center mb-half lineadd-lr">昼食</h4>
        <div class="col3-wrap">
        <div class="col3-child">
          <figure><img src="<?php bloginfo('template_directory');?>/assets/image/facility/prime/prime-lunch_1.webp" alt="香ばしく焼き上げた旬魚の西京焼き膳"></figure>
          <p class="txt-bold mt-half mb-half">香ばしく焼き上げた旬魚の西京焼き膳</p>
        </div>
        <div class="col3-child">
          <figure><img src="<?php bloginfo('template_directory');?>/assets/image/facility/prime/prime-lunch_4.webp" alt="華やかな海老の散らし寿司と、揚げたて天ぷら盛り合わせ"></figure>
          <p class="txt-bold mt-half mb-half">華やかな海老の散らし寿司と、揚げたて天ぷら盛り合わせ</p>
        </div>
        <div class="col3-child">
          <figure><img src="<?php bloginfo('template_directory');?>/assets/image/facility/prime/prime-lunch_3.webp" alt="お揚げが自慢のいなり寿司と、お出汁香るおうどん"></figure>
          <p class="txt-bold mt-half mb-half">お揚げが自慢のいなり寿司と、お出汁香るおうどん</p>
        </div>
         <div class="col3-child">
          <figure><img src="<?php bloginfo('template_directory');?>/assets/image/facility/prime/prime-lunch_2.webp" alt="旨味凝縮！鯖の味噌煮と彩り天ぷらの和定食"></figure>
          <p class="txt-bold mt-half mb-half">旨味凝縮！鯖の味噌煮と彩り天ぷらの和定食</p>
        </div>
        <div class="col3-child">
          <figure><img src="<?php bloginfo('template_directory');?>/assets/image/facility/prime/prime-lunch_5.webp" alt="サクッとジューシー！特製ソースのメンチカツ御膳"></figure>
          <p class="txt-bold mt-half mb-half">サクッとジューシー！特製ソースのメンチカツ御膳</p>
        </div>
        <div class="col3-child">
          <figure><img src="<?php bloginfo('template_directory');?>/assets/image/facility/prime/prime-lunch_6.webp" alt="ふんわり卵のソース仕立て。食欲をそそる自慢の一品"></figure>
          <p class="txt-bold mt-half mb-half">ふんわり卵のソース仕立て。食欲をそそる自慢の一品</p>
        </div>
        </div>
      </section>
      

      <section class="">
        <h4 class="ttl-jp-l txt-bold txt-center mb-half lineadd-lr">夕食</h4>
        <div class="col3-wrap">
        <div class="col3-child">
          <figure><img src="<?php bloginfo('template_directory');?>/assets/image/facility/prime/prime-diner_1.webp" alt="香り豊かな炊き込み御飯と、旬魚の煮付け定食"></figure>
          <p class="txt-bold mt-half mb-half">香り豊かな炊き込み御飯と、旬魚の煮付け定食</p>
        </div>
        <div class="col3-child">
          <figure><img src="<?php bloginfo('template_directory');?>/assets/image/facility/prime/prime-diner_2.webp" alt="ふっくら手作りハンバーグ、濃厚デミグラスソース"></figure>
          <p class="txt-bold mt-half mb-half">ふっくら手作りハンバーグ、濃厚デミグラスソース</p>
        </div>
        <div class="col3-child">
          <figure><img src="<?php bloginfo('template_directory');?>/assets/image/facility/prime/prime-diner_3.webp" alt="旨味溢れる海鮮八宝菜と一口餃子の中華御膳"></figure>
          <p class="txt-bold mt-half mb-half">旨味溢れる海鮮八宝菜と一口餃子の中華御膳</p>
        </div>
        <div class="col3-child">
          <figure><img src="<?php bloginfo('template_directory');?>/assets/image/facility/prime/prime-diner_4.webp" alt="旬魚の旨味を引き立てる、煮物と小鉢の滋味深い和膳"></figure>
          <p class="txt-bold mt-half mb-half">旬魚の旨味を引き立てる、煮物と小鉢の滋味深い和膳</p>
        </div>
        <div class="col3-child">
          <figure><img src="<?php bloginfo('template_directory');?>/assets/image/facility/prime/prime-diner_5.webp" alt="サクサク海老フライとタルタルソースの贅沢盛り"></figure>
          <p class="txt-bold mt-half mb-half">サクサク海老フライとタルタルソースの贅沢盛り</p>
        </div>
        <div class="col3-child">
          <figure><img src="<?php bloginfo('template_directory');?>/assets/image/facility/prime/prime-diner_6.webp" alt="白身魚のふんわり揚げ出し、彩りあんかけ御膳"></figure>
          <p class="txt-bold mt-half mb-half">白身魚のふんわり揚げ出し、彩りあんかけ御膳</p>
        </div>
        </div>
      </section>

    </div>
    </div>
</div>
</section>

<section class="space-s space-s-bottom">
<div class="olive-sub-ttl-l bg-gold-gradiate wrap-m-left mb2">
    <p class="ttl-ensrf-m txt-bold txt-center txt-brightgold">NATURAL HOT SPRING</p>
    <h2 class="ttl-jp-4l txt-white txt-bold txt-center">天然温泉のあるホーム</h2>
</div>
<div class="wrap-m">
  <figure class="mb1"><img src="<?php bloginfo('template_directory');?>/assets/image/facility/prime/prime-main-onsen.webp" alt="専門リハビリ"></figure>
    <div class="mt2">
      <div class="">
        <h3 class="txt-center ttl-jp-2l txt-bold mb1 txt-gold">自宅に本物の天然温泉がある<br>日々を特別なものにする<br>週3回の心地よい寛ぎ</h3>
        <p class="mb2">日々の暮らしそのものが、心と体を癒す時間であってほしい。私たちはそう考えます。<br>リフレッシュと活力を育む週3回のバスタイムでは、当ホームにいながら本物の天然温泉で心ゆくまでおくつろぎいただけます。洗練された住空間と、きめ細やかなサービスの中で、満ち足りた毎日をお過ごしください。</p>
        <p class="bg-beige1 p1">当社グループのスーパーホテル大阪天然温泉より本物の天然温泉を搬入。週3回の天然温泉で身も心もリフレッシュして下さい。</p>
    </div>
    </div>
</div>
</section>

<section class="space-s space-s-bottom">
<div class="olive-sub-ttl-r bg-gold-gradiate wrap-m-right mb2">
    <p class="ttl-ensrf-m txt-bold txt-center txt-brightgold">24HOUR NURSING</p>
    <h2 class="ttl-jp-4l txt-white txt-bold txt-center">24時間看護体制</h2>
</div>
<div class="wrap-m">
  <figure class="mb1"><img src="<?php bloginfo('template_directory');?>/assets/image/facility/prime/prime-main-nursing.webp" alt="専門リハビリ"></figure>
    <div class="mt2">
      <div class="">
        <h3 class="txt-center ttl-jp-2l txt-bold mb1 txt-gold">難病の方への専門的なケアで培う<br>高水準の24時間看護だから<br>安心して日々を楽しめます</h3>
        <p class="mb2">日中も、静かに休まれる夜も、24時間365日、看護師が施設に常駐。<br>急な体調の変化や夜間の不安にも迅速に対応できる体制は、神経難病専門施設だからこそ実現できる安心です。<br>ご本人様はもちろん、ご家族様にも安らぎをご提供いたします。</p>
        <p class="bg-beige1 p1">痰吸引や胃瘻などの処置が必要な方でも安心してご利用いただけます。</p>
    </div>
    </div>
</div>
</section>

<section class="space-s space-s-bottom">
<div class="olive-sub-ttl-l bg-gold-gradiate wrap-m-left mb2">
    <p class="ttl-ensrf-m txt-bold txt-center txt-brightgold">REHABILITATION</p>
    <h2 class="ttl-jp-4l txt-white txt-bold txt-center">リハビリテーション</h2>
</div>
<div class="wrap-m">
  <figure class="mb1"><img src="<?php bloginfo('template_directory');?>/assets/image/facility/prime/prime-main-rihabiti.webp" alt="専門リハビリ"></figure>
    <div class="mt2">
      <div class="">
        <h3 class="txt-center ttl-jp-2l txt-bold mb1 txt-gold">専門セラピストによる<br>イキイキとした毎日を叶える<br>リハビリプランをご提供</h3>
        <p class="mb2">当施設のリハビリは、機能の維持・回復だけを目指すものではありません。お一人おひとりの「やりたいこと」「続けたいこと」を実現し、暮らしの質を高めることを目的としています。神経難病ケアで培った高度なノウハウを持つ理学療法士が、あなたの「歩く」「食べる」「楽しむ」という豊かな日々の継続をサポートします。</p>
        <p class="bg-beige1 p1">理学療法士監修によるリハビリをご提供いたします。退院(入居)後、30日間は週5回、31日目以降は週3回リハビリを受けることができます。また外の空気に触れながら、中庭でのリハビリも好評です。</p>

      <!--
      <div class="point-more-toggle-item grid3 gg2">
      <div>
        <figure><img src="<?php bloginfo('template_directory');?>/assets/image/facility/prime/prime-pt.webp" alt="個別リハビリ"></figure>
        <h4 class="ttl-jp-m txt-bold mt-half mb-half">理学療法士（PT）</h4>
        <p> 「自分の脚で歩いて観光したい。」そんな想いを叶えるため、平行棒やウォーキングマシンを使ったトレーニングで下肢筋力を強化。車いすの制限を受けずに楽しめる、自由でアクティブな毎日をサポートします。</p>
      </div>
      <div>
        <figure><img src="<?php bloginfo('template_directory');?>/assets/image/facility/prime/prime-ot.webp" alt="生活リハビリ"></figure>
        <h4 class="ttl-jp-m txt-bold mt-half mb-half">作業療法士（OT）</h4>
        <p>お食事やお手洗い、着替えといった日常の動作を、できる限りご自身の力で。「できる」自信を取り戻し、自分らしい生活を続けるため、手先の訓練などを通じて、具体的な生活動作を支えます。</p>
      </div>
      <div>
        <figure><img src="<?php bloginfo('template_directory');?>/assets/image/facility/prime/prime-st.webp" alt="摂食・嚥下アプローチ"></figure>
        <h4 class="ttl-jp-m txt-bold mt-half mb-half">言語聴覚士（ST）</h4>
        <p>人生の大きな喜びである「食」を、いつまでも楽しむために。専門的な発声・嚥下訓練を通じて、ご自身の口でおいしく食事ができる楽しみを、最後まで守ります。</p>
      </div>
      </div>
        -->
    </div>
    </div>
</div>
</section>





<section class="space-m space-l-bottom">

<div class="olive-sub-ttl-l bg-gold-gradiate wrap-m-left">
    <p class="ttl-ensrf-m txt-bold txt-center txt-brightgold">FACILITY </p>
    <h2 class="ttl-jp-4l  txt-white txt-bold txt-center">館内のご案内</h2>
</div>

<div class="olive-kodawari-item-wrap grid2 gg2 space-3s bg-white wrap-m">

<div class="olive-kodawari-item">
<figure><img src="https://www.supercourt.jp/wordpress/wp-content/uploads/2025/10/堺神石2号館-14.jpg.webp" alt="外観"></figure>
<h3 class="ttl-jp-m txt-medium mt1 mb1">エントランス</h3>
</div>

<div class="olive-kodawari-item">
<figure><img src="https://www.supercourt.jp/wordpress/wp-content/uploads/2025/04/%E5%A0%BA%E7%A5%9E%E7%9F%B32%E5%8F%B7%E9%A4%A8_%E3%82%A8%E3%83%B3%E3%83%88%E3%83%A9%E3%83%B3%E3%82%B9%E3%83%9B%E3%83%BC%E3%83%AB.webp" alt="レストラン"></figure>
<h3 class="ttl-jp-m txt-medium mt1 mb1">エントランスホール</h3>
</div>

<div class="olive-kodawari-item">
<figure><img src="https://www.supercourt.jp/wordpress/wp-content/uploads/2025/09/%E3%83%97%E3%83%A9%E3%82%A4%E3%83%A0%E7%A5%9E%E7%9F%B3_%E3%82%A8%E3%83%B3%E3%83%88%E3%83%A9%E3%83%B3%E3%82%B9.webp" alt="エントランス"></figure>
<h3 class="ttl-jp-m txt-medium mt1 mb1">風除室</h3>
</div>

<div class="olive-kodawari-item">
<figure><img src="https://www.supercourt.jp/wordpress/wp-content/uploads/2023/11/%E5%A0%BA%E7%A5%9E%E7%9F%B32%E5%8F%B7%E9%A4%A8-10.jpg.webp" alt="エントランスシンク"></figure>
<h3 class="ttl-jp-m txt-medium mt1 mb1">中庭</h3>
</div>

<div class="olive-kodawari-item">
<figure><img src="https://www.supercourt.jp/wordpress/wp-content/uploads/2025/04/%E5%A0%BA%E7%A5%9E%E7%9F%B32%E5%8F%B7%E9%A4%A8_%E5%B1%85%E5%AE%A4.webp" alt=""></figure>
<h3 class="ttl-jp-m txt-medium mt1 mb1">居室（モデルルーム）</h3>
</div>

<div class="olive-kodawari-item">
<figure><img src="https://www.supercourt.jp/wordpress/wp-content/uploads/2025/04/%E5%A0%BA%E7%A5%9E%E7%9F%B32%E5%8F%B7%E9%A4%A8_%E3%83%AA%E3%83%8F%E3%83%93%E3%83%AA%E3%82%B9%E3%83%9A%E3%83%BC%E3%82%B9.webp" alt="リハビリルーム"></figure>
<h3 class="ttl-jp-m txt-medium mt1 mb1">リハビリスペース</h3>
</div>


<div class="olive-kodawari-item">
<figure><img src="https://www.supercourt.jp/wordpress/wp-content/uploads/2025/09/%E3%83%97%E3%83%A9%E3%82%A4%E3%83%A0%E7%A5%9E%E7%9F%B3_%E3%83%80%E3%82%A4%E3%83%8B%E3%83%B3%E3%82%B01.webp" alt="リハビリガーデン"></figure>
<h3 class="ttl-jp-m txt-medium mt1 mb1">レストラン</h3>
</div>


<div class="olive-kodawari-item">
<figure><img src="https://www.supercourt.jp/wordpress/wp-content/uploads/2023/11/%E5%A0%BA%E7%A5%9E%E7%9F%B32%E5%8F%B7%E9%A4%A8-4.jpg.webp" alt="大浴場"></figure>
<h3 class="ttl-jp-m txt-medium mt1 mb1">大浴場・天然温泉</h3>
</div>

<div class="olive-kodawari-item">
<figure><img src="https://www.supercourt.jp/wordpress/wp-content/uploads/2023/11/%E5%A0%BA%E7%A5%9E%E7%9F%B32%E5%8F%B7%E9%A4%A8-1.jpg.webp" alt="機械浴室"></figure>
<h3 class="ttl-jp-m txt-medium mt1 mb1">機械浴室</h3>
</div>



<div class="olive-kodawari-item">
<figure><img src="https://www.supercourt.jp/wordpress/wp-content/uploads/2025/04/%E5%A0%BA%E7%A5%9E%E7%9F%B32%E5%8F%B7%E9%A4%A8_%E3%82%A8%E3%83%AC%E3%83%99%E3%83%BC%E3%82%BF%E3%83%BC%E3%83%9B%E3%83%BC%E3%83%AB.webp" alt="理美容室"></figure>
<h3 class="ttl-jp-m txt-medium mt1 mb1">エレベーターホール</h3>
</div>

<div class="olive-kodawari-item">
<figure><img src="https://www.supercourt.jp/wordpress/wp-content/uploads/2023/11/%E5%A0%BA%E7%A5%9E%E7%9F%B32%E5%8F%B7%E9%A4%A8-16.jpg.webp" alt="廊下"></figure>
<h3 class="ttl-jp-m txt-medium mt1 mb1">駐車場</h3>
</div>


</div>

</section>



<section>
  <div class="lp-price-wrap wrap-m bg-gold-gradiate space-3s space-m-bottom">
    <p class="ttl-ensrf-m txt-bold txt-center txt-brightgold">PRICE INFORMATION</p>
    <h2 class="ttl-jp-4l txt-white txt-bold txt-center mb2">ご利用料金のご案内</h2>

    <div>

    <div class="space-3s-bottom">
    <h3 class="ttl-jp-l txt-bold txt-center mb1">要支援・要介護（一般）プラン</h3>
    　<div class="grid2 gg1 mb2">
        <div class="bg-white txt-center p1">
          <p class="txt-medium"><span class="pi1 txt-bold">入居金</span><br class="sp-only"><span class="big txt-en txt-gold ">0</span>円</p>
        </div>
        <div class="bg-white txt-center p1">
          <p class="txt-medium"><span class="pi1 txt-bold">月額利用料</span><br class="sp-only"><span class="big txt-en txt-gold ">262,624</span>円（税込）</p>
        </div>
      </div>

      <div class="bg-beige1 p1 mt1">［ 入居対象 ］　要支援1　要支援2　要介護1　要介護2　要介護3　要介護4　要介護5</div>
      <p class="txt-jp-s mt1 txt-white">※ご利⽤料⾦は1⽇3⾷、⾷事代含んでおります。<br>※リハビリ費用はご利⽤料⾦に含んでおります。<br>※個室内電気代が別途必要となります。<br>※介護保険、医療保険適用による負担額が別途必要となります。</p>
    </div>
  </div>


    <!--<div>
    <h3 class="ttl-jp-l txt-bold txt-center mb1">パーキンソン病（難病）受入プラン</h3>
    <div class="grid2 gg1">
        <div class="bg-white txt-center p1">
          <p class="txt-medium"><span class="pi1 txt-bold">入居金</span><br class="sp-only"><span class="big txt-en txt-gold ">0</span>円</p>
        </div>
        <div class="bg-white txt-center p1">
          <p class="txt-medium"><span class="pi1 txt-bold">月額利用料</span><br class="sp-only"><span class="big txt-en txt-gold ">134,519</span>円（税込）</p>
        </div>
      </div>
      <div class="bg-beige1 p1 mt1">
      ［ 入居対象 ］　●パーキンソン病（ヤール3以上）　●進行性核上性麻痺　●大脳皮質基底核変性症　●多系統萎縮症　●脊髄小脳変性症<br>
      ［ 要介護度 ］　要支援1　要支援2　要介護1　要介護2　要介護3　要介護4　要介護5
      </div>
      <p class="txt-jp-s mt1 mb2">※ご利⽤料⾦は1⽇3⾷、⾷事代含んでおります。<br>※個室内電気代が別途必要となります。<br>※介護保険、医療保険適用による負担額が別途必要となります。</p>
    </div>-->

    <div class="cta2025 space-s">
      <div class="cta2025__wrap">
        <div class="cta2025__inner">
          <a class="cta2025__btn" href="tel:0120-532-029">
            <div class="cta2025__btn-image">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/image/scfacility/cta2025_tel.svg" alt="お電話で相談 0120-532-029">
            </div>
            <div class="cta2025__btn-tel txt-white txt-medium">
              <span class="cta2025__btn-tel-icon">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/image/common/tel_block_white.svg" alt="">
              </span>
              <span class="cta2025__btn-tel-num">0120-532-029</span>
            </div>
          </a>
          <a class="cta2025__btn" href="#form">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/image/scfacility/cta2025_mail.svg" alt="メールで相談する">
          </a>
        </div>
      </div>
    </div>

    </div>
</section>

<!--
<section class="space-m-bottom">
  <div class="bg-gold-gradiate space-3s space-3s-bottom">
      <p class="ttl-ensrf-m txt-bold txt-center txt-brightgold">GALLERY</p>
      <h2 class="ttl-jp-4l  txt-white txt-bold txt-center">ギャラリー</h2>
  </div>
  <div class="slick-lp">
    <figure><img src="<?php bloginfo('template_directory');?>/assets/image/facility/olive/narashinomiya-gallery-exterior1.webp" alt=""><figcaption>外観</figcaption></figure>
    <figure><img src="<?php bloginfo('template_directory');?>/assets/image/facility/olive/narashinomiya-gallery-exterior2.webp" alt=""><figcaption>外観</figcaption></figure>
    <figure><img src="<?php bloginfo('template_directory');?>/assets/image/facility/olive/narashinomiya-gallery-entrance1.webp" alt=""><figcaption>エントランス</figcaption></figure>
    <figure><img src="<?php bloginfo('template_directory');?>/assets/image/facility/olive/narashinomiya-gallery-rihabili3.webp" alt=""><figcaption>リハビリルーム</figcaption></figure>
    <figure><img src="<?php bloginfo('template_directory');?>/assets/image/facility/olive/narashinomiya-gallery-rihabili7.webp" alt=""><figcaption>リハビリルーム</figcaption></figure>
    <figure><img src="<?php bloginfo('template_directory');?>/assets/image/facility/olive/narashinomiya-gallery-rihabili5.webp" alt=""><figcaption>リハビリルーム</figcaption></figure>
    <figure><img src="<?php bloginfo('template_directory');?>/assets/image/facility/olive/narashinomiya-gallery-hotspring1.webp" alt=""><figcaption>浴室エントランス</figcaption></figure>
    <figure><img src="<?php bloginfo('template_directory');?>/assets/image/facility/olive/narashinomiya-gallery-hotspring4.webp" alt=""><figcaption>大浴場</figcaption></figure>
    <figure><img src="<?php bloginfo('template_directory');?>/assets/image/facility/olive/narashinomiya-gallery-hotspring5.webp" alt=""><figcaption>大浴場</figcaption></figure>
    <figure><img src="<?php bloginfo('template_directory');?>/assets/image/facility/olive/narashinomiya-gallery-machinebathroom.webp" alt=""><figcaption>機械浴室</figcaption></figure>
    <figure><img src="<?php bloginfo('template_directory');?>/assets/image/facility/olive/narashinomiya-gallery-hotspring2.webp" alt=""><figcaption>更衣室</figcaption></figure>
    <figure><img src="<?php bloginfo('template_directory');?>/assets/image/facility/olive/kusatsu-gallery-15.webp" alt=""><figcaption>居室</figcaption></figure>
    <figure><img src="<?php bloginfo('template_directory');?>/assets/image/facility/olive/kusatsu-gallery-17.webp" alt=""><figcaption>居室</figcaption></figure>
    <figure><img src="<?php bloginfo('template_directory');?>/assets/image/facility/olive/kusatsu-gallery-18.webp" alt=""><figcaption>居室内トイレ</figcaption></figure>
    <figure><img src="<?php bloginfo('template_directory');?>/assets/image/facility/olive/narashinomiya-gallery-dining1.webp" alt=""><figcaption>レストラン</figcaption></figure>
    <figure><img src="<?php bloginfo('template_directory');?>/assets/image/facility/olive/narashinomiya-gallery-dining2.webp" alt=""><figcaption>レストラン</figcaption></figure>
    <figure><img src="<?php bloginfo('template_directory');?>/assets/image/facility/olive/narashinomiya-gallery-lobby3.webp" alt=""><figcaption>ウェルカムサロン</figcaption></figure>
    <figure><img src="<?php bloginfo('template_directory');?>/assets/image/facility/olive/narashinomiya-gallery-exterior.webp" alt=""><figcaption>ロビー</figcaption></figure>
    <figure><img src="<?php bloginfo('template_directory');?>/assets/image/facility/olive/narashinomiya-gallery-counter1.webp" alt=""><figcaption>コンシェルジュカウンター</figcaption></figure>
    <figure><img src="<?php bloginfo('template_directory');?>/assets/image/facility/olive/narashinomiya-gallery-counter2.webp" alt=""><figcaption>コンシェルジュカウンター</figcaption></figure>
    <figure><img src="<?php bloginfo('template_directory');?>/assets/image/facility/olive/narashinomiya-gallery-counselingroom.webp" alt=""><figcaption>相談室</figcaption></figure>
    <figure><img src="<?php bloginfo('template_directory');?>/assets/image/facility/olive/kusatsu-gallery-25.webp" alt=""><figcaption>居室フロア廊下</figcaption></figure>
    <figure><img src="<?php bloginfo('template_directory');?>/assets/image/facility/olive/narashinomiya-gallery-elvhall1.webp" alt=""><figcaption>エレベーターホール</figcaption></figure>
    <figure><img src="<?php bloginfo('template_directory');?>/assets/image/facility/olive/narashinomiya-gallery-ribiyouroom.webp" alt=""><figcaption>理美容室</figcaption></figure>
    <figure><img src="<?php bloginfo('template_directory');?>/assets/image/facility/olive/kusatsu-gallery-29.webp" alt=""><figcaption>共用トイレ</figcaption></figure>
  </div>
</section>
-->

<section class="space-m space-2l-bottom bg-beige">
  <div class="maw-880">

    <p class="ttl-ensrf-m txt-bold txt-center txt-darkgold">MEDICAL PRACTICE</p>
    <h2 class="ttl-jp-4l ttl-border-b-gold txt-bold txt-center">医療行為への対応</h2>
    <p class="txt-center">○受入可能　△要相談　×受入不可</p>
    <p class="txt-jp-s middle">※「○：受け入れ可能」の項目は、ご入居される方のお身体の状態などの理由で、受け入れ可能かどうかが変わります。<br>まずはお電話などでご相談ください。</p>
    <figure class="mt2 space-3s-bottom"><img src="<?php bloginfo('template_directory');?>/assets/image/facility/prime/accept-kamiishi1.svg" alt="医療面の受け入れ"></figure>


    <p class="ttl-ensrf-m txt-bold txt-center txt-darkgold">FACILITIES OVERVIEW</p>
    <h2 class="ttl-jp-4l ttl-border-b-gold txt-bold txt-center">施設概要</h2>
    <table class="facility-overview-table">
      <tr>
        <th>施設名</th>
        <td>スーパー・コート プライム神石</td>
      </tr>
      <tr>
        <th>施設の目的</th>
        <td>介護付き有料老人ホーム</td>
      </tr>
      <tr>
        <th>所在地</th>
        <td>大阪府堺市堺区神石市之町19番27号</td>
      </tr>
      <tr>
        <th>電話番号</th>
        <td>施設直通 ： <a href="tel:072-265-4850">072-265-4850</a><br>入居相談 ： <a href="tel:0120-532-029">0120-532-029</a></td>
      </tr>
      <tr>
        <th>規模・構造</th>
        <td>鉄骨ALC造地上４階建</td>
      </tr>
      <tr>
        <th>居室数</th>
        <td>51室</td>
      </tr>
      <tr>
        <th>定員</th>
        <td>51名</td>
      </tr>
      <tr>
        <th>居室面積</th>
        <td>18.00～20.27m²</td>
      </tr>
      
      <tr>
        <th>住居の権利形態</th>
        <td>利用権方式</td>
      </tr>
      <tr>
        <th>最寄駅</th>
        <td>JR阪和線「津久野」駅より徒歩約15分</td>
      </tr>
      <tr>
        <th>開設日</th>
        <td>平成20年2月1日</td>
      </tr>
      <tr>
        <th>延床面積</th>
        <td>1526.68㎡</td>
      </tr>
      <tr>
        <th>共用施設</th>
        <td>食堂兼機能訓練室、健康管理室、談話スペース、一般浴場、特別浴室、他</td>
      </tr>
    </table>
  </div>

  <div class="cta2025 space-s">
    <div class="cta2025__wrap">
      <div class="cta2025__inner">
        <a class="cta2025__btn" href="tel:0120-532-029">
          <div class="cta2025__btn-image">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/image/scfacility/cta2025_tel.svg" alt="お電話で相談 0120-532-029">
          </div>
          <div class="cta2025__btn-tel txt-white txt-medium">
            <span class="cta2025__btn-tel-icon">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/image/common/tel_block_white.svg" alt="">
            </span>
            <span class="cta2025__btn-tel-num">0120-532-029</span>
          </div>
        </a>
        <a class="cta2025__btn" href="#form">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/image/scfacility/cta2025_mail.svg" alt="メールで相談する">
        </a>
      </div>
    </div>
  </div>

</section>

<section class="lp-access">
  <div class="lp-access-wrap bg-gold-gradiate wrap-m space-3s space-m-bottom">
    <p class="ttl-ensrf-m txt-bold txt-center txt-brightgold">ACCESS</p>
    <h2 class="ttl-jp-4l txt-white txt-bold txt-center mb1">アクセス</h2>
    <div class="maw-880">
      <div class="lp-gmap">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3286.138488536339!2d135.46470979999998!3d34.5500488!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6000db4371d98df7%3A0x24288998f6e743f0!2z5pyJ5paZ6ICB5Lq644Ob44O844OgIOOCueODvOODkeODvOODu-OCs-ODvOODiFByaW1l5aC656We55-z!5e0!3m2!1sja!2sjp!4v1759148225589!5m2!1sja!2sjp" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
      <p class="txt-jp-l txt-medium middle txt-white mt2 mb2">JR阪和線「津久野」駅より徒歩約15分<br>〒590-0813　<br class="sp-only">大阪府堺市堺区神石市之町19番27号<br>TEL：<a href="tel:0120-532-029">0120-532-029</a>（通話料無料ご入居相談窓口）</p>

<!--
<h3 class="txt-white ttl-jp-m txt-bold mb1">【オリーブ・奈良新大宮】立地環境のご紹介</h3>
<p class="txt-white mb2">世界遺産が点在し、豊かな歴史と文化が息づく古都・奈良。その中心市街地にほど近く、穏やかな住環境が広がる奈良市法華寺町に、2025年9月、パーキンソン病専門の住宅型有料老人ホーム「オリーブ・奈良新大宮」は誕生します。</p>

<h3 class="txt-white ttl-jp-m txt-bold mb1">歴史と自然に抱かれた、穏やかな住環境</h3>
<p class="txt-white mb2">施設の近隣には、特別史跡である平城宮跡が広がり、歴史の趣を身近に感じられる閑静な住宅街です。世界遺産の東大寺や興福寺、春日大社を擁する奈良公園へもアクセスしやすく、ご家族様が来訪された際には、古都の四季折々の美しい自然や散策をお楽しみいただけます。歴史と風格に満ちた落ち着いた環境は、穏やかで質の高い暮らしを求める方に最適です。</p>

<h3 class="txt-white ttl-jp-m txt-bold mb1">都心へも好アクセス、利便性に優れた立地</h3>
<p class="txt-white mb2">最寄りの近鉄奈良線「新大宮駅」までは、徒歩10分。新大宮駅からは、大阪（難波）や神戸（三宮）といった主要都市へ乗り換えなしでアクセスできるため、ご家族様もご来訪しやすい便利な立地にあります。駅周辺にはスーパーマーケットやコンビニエンスストアが複数点在し、日々のお買い物にも困りません。また、気軽にご利用いただける飲食店から伝統的な日本料理店まで、多彩なレストランが揃っており、ご入居者様とご家族様とのお食事の時間も豊かに彩ります。</p>

<h3 class="txt-white ttl-jp-m txt-bold mb1">高まる需要に応える、安心の医療・介護環境</h3>
<p class="txt-white mb2">奈良県の高齢化率は全国平均を上回っており、特に専門的なケアを必要とする介護施設への需要が高まっています。奈良市の高齢化率も33.5%（2023年10月1日時点）に達し、今後も上昇が見込まれる中、地域に根差した介護サービスの重要性は増しています。<br>
「オリーブ・奈良新大宮」が立地する奈良市内には、多くのクリニックや総合病院が存在し、万全の医療体制が整っています。奈良県が進める「地域包括ケアシステム」の理念のもと、地域の医療機関と密に連携しながら、ご入居者様の健康をしっかりと見守ります。</p>

<p class="txt-white">歴史的な落ち着きと、現代的な利便性を兼ね備えた「オリーブ・奈良新大宮」。交通の便が良く、穏やかで安心できるこの地で、専門性の高いケアと心からのおもてなしとともに、安らぎに満ちた日々をお約束します。</p>
-->

    </div>
  </div>
</section>

<section class="bg-beige space-m space-s-bottom">
  <p class="ttl-ensrf-m txt-bold txt-center txt-darkgold">GREETING</p>
  <h2 class="ttl-jp-4l ttl-border-b-gold txt-bold txt-center">施設長挨拶</h2>

<div class="wrap-m maw-880">
<div class="supercourt-facility-greeting-item grid gg2">
<figure>
<img src="https://www.supercourt.jp/wordpress/wp-content/uploads/2023/10/施設長写真_0007_東　辰紀.jpg" alt="画像">
</figure>
<p class="fontM txt-just">介護付き有料老人ホーム スーパー・コートプライム神石は、令和7年9月1日より新たなサービスをご提供させていただくこととなりました。医療面では専門的なリハビリと24時間の看護体制をご提供し、生活面では食材と彩にこだわったお食事をご提供いたします。ご自分らしい穏やかな日々を送っていただけるよう、スタッフ一同、全力でサポートいたします。皆様にお会いできる日を心よりお待ちしております。</p>
</div>
</div>
</section>

<section class="space-s space-2l-bottom bg-beige">
  <div class="lp-blog-wrap bg-white maw-960 grid align-center space-3s space-3s-bottom">
    <figure><img src="https://www.supercourt.jp/wordpress/wp-content/uploads/2025/04/%E5%A0%BA%E7%A5%9E%E7%9F%B32%E5%8F%B7%E9%A4%A8_%E3%82%A8%E3%83%B3%E3%83%88%E3%83%A9%E3%83%B3%E3%82%B9%E3%83%9B%E3%83%BC%E3%83%AB.webp"></figure>
    <div>
      <p class="ttl-en-m txt-bold">FACILITY BLOG</p>
      <h2 class="ttl-jp-4l txt-darkgold txt-bold mb-half">施設ブログ</h2>
      <p><?php the_title(); ?>の日々の様子をご紹介しています。</p>
      <p class="mt2 txt-center"><a class="lp-blog-more relative" href="https://www.supercourt.jp/blog/kamiishi2/" target="_blank">詳しく見る</a></p>
    </div>
  </div>
</section>

<section id="form" class="wrap-m bg-white">
  <div class="facility-list-form-inner">
  <div class="tabs-wrap space-3s">
    <ul class="tabs txt-bold">
      <li class="tabs-btn txt-center" data-tab="1">見学申込</li>
      <li class="tabs-btn txt-center" data-tab="2">資料請求</li>
      <li class="tabs-btn txt-center" data-tab="3">お問い合わせ</li>
    </ul>
  </div>

  <div  class="pi1 space-2l-bottom">
        <div id="tab1" class="tabs-cont">
          <p class="txt-center active-tab-infomation active-tab-infomation01">見学予約フォームが選択されています</p>
          <?php echo do_shortcode('[contact-form-7 id="a92f5d4" title="見学申込"]'); ?>
        </div>
        <div id="tab2" class="tabs-cont">
          <p class="txt-center active-tab-infomation active-tab-infomation02">ダウンロードをご希望の方はこちら<br class="sp-only"><span class="form-dlbtn"><a href="https://www.supercourt.jp/data_request_dl/">資料ダウンロード</a></span></p>
          <?php echo do_shortcode('[contact-form-7 id="0711522" title="資料請求"]'); ?>
        </div>
        <div id="tab3" class="tabs-cont">
          <p class="txt-center active-tab-infomation active-tab-infomation03">相談・空室確認フォームが選択されています</p>
          <?php echo do_shortcode('[contact-form-7 id="baf6b3a" title="お問い合わせ"]'); ?>
        </div>
      </div>
  </div>
</section>

<!--
<section class="space-s space-s-bottom maw-880">
  <p class="ttl-en-m txt-bold txt-center">IN-HOUSE VR TOUR</p>
  <h2 class="ttl-jp-4l  txt-green1 txt-bold txt-center mb1">館内VRツアー</h2>
  <figure class="olive-vr"><a href="https://my.matterport.com/show/?m=dukdMuEjUJk" target="_blank"><img src="<?php bloginfo('template_directory');?>/assets/image/facility/olive/vr.webp" alt="バーチャル館内見学"></a></figure>
</section>
-->

<!--
<section class="space-s space-3l-bottom bg-blue">
  <div class="lp-blog-wrap bg-white maw-960 grid align-center space-3s space-3s-bottom">
    <figure><img src="<?php bloginfo('template_directory');?>/assets/image/facility/olive/blog.jpg"></figure>
    <div>
      <p class="ttl-ensrf-m txt-bold txt-gold">FACILITY BLOG</p>
      <h2 class="ttl-jp-4l txt-grayish txt-bold mb-half">施設ブログ</h2>
      <p><?php the_title(); ?>の日々の様子をご紹介しています。</p>
      <p class="mt2 txt-center"><a class="lp-blog-more relative" href="https://www.supercourt.jp/blog/olive_kusatsu/" target="_blank">詳しく見る</a></p>
    </div>
  </div>
</section>
-->

</main>



<script>
  $(function(){    
  $('.slick-lp').slick({
    autoplaySpeed:800,
    autoplay:true,
    speed: 1600,
    dots:false,
    accessibility:true,
    slidesToShow: 3,
    slidesToScroll: 1,
      responsive: [{
      breakpoint: 767,
      settings: {
      slidesToShow: 1,
      },
    },]
  });
});
</script>

<?php get_footer(); ?>
