<?php get_header(); ?>



<main>

<div id="top" class="top-mv">
  <div class="top-mv__movie">
    <div class="top-mv__movie-inner">
      <video src="<?php bloginfo('template_directory');?>/assets/video/top/top_mv.mp4?20250319" loop autoplay muted playsinline></video>
    </div>
  </div>
  <h1 class="front-h1">関西（大阪・兵庫・京都・奈良・滋賀）で選ばれる<span class="sp-newline">老人ホーム・介護施設、スーパー・コート</span></h1>
</div>

<div class="top-topics">
  <section class="top-pickup space-s-bottom">
    <div class="wrap-m-right">
      <div class="top-topics__slide-head ttl-en-2l">
        <h2 class="en-upper txt-bold txt-white">pick up</h2>
      </div>
      <div class="slick-slider top-topics__slide-cont">

        <!--pickup-->
        <!--<div class="slick-item">
          <a href="https://www.supercourt.jp/news/news-11724/">
          <div class="slick-item__inner bg-white">
            <div class="top-pickup__slide-image">
              <img src="https://www.supercourt.jp/wordpress/wp-content/uploads/2025/11/プライム神石_リハビリ勉強会_2025.12.05_教授なし.webp" alt="プライム神石_リハビリ勉強会">
            </div>
            <p class="top-pickup__slide-txt lh-info">【参加費無料】<br>リハビリテーション勉強会</p>
          </div>
          </a>
        </div>-->

        <!--pickup-->
        <div class="slick-item">
          <a href="https://www.supercourt.jp/topics/topics-12275/">
          <div class="slick-item__inner bg-white">
            <div class="top-pickup__slide-image">
              <img src="<?php bloginfo('template_directory');?>/assets/image/top/column_fee_2026.2.webp" alt="初春の無料見学予約">
            </div>
            <p class="top-pickup__slide-txt lh-info">【2026年最新】有料老人ホームの入居費用相場を徹底解説</p>
          </div>
          </a>
        </div>

        <!--pickup-->
        <div class="slick-item">
          <a href="https://www.supercourt.jp/topics/topics-12274/">
          <div class="slick-item__inner bg-white">
            <div class="top-pickup__slide-image">
              <img src="<?php bloginfo('template_directory');?>/assets/image/top/column_visit_2026.2.webp" alt="初春の無料見学予約">
            </div>
            <p class="top-pickup__slide-txt lh-info">有料老人ホームの入居相談で失敗しないための全知識</p>
          </div>
          </a>
        </div>


        <!--pickup-->
        <div class="slick-item">
          <a href="https://www.supercourt.jp/facility-list/olive_kyonishikyogoku/">
          <div class="slick-item__inner bg-white">
            <div class="top-pickup__slide-image">
              <img src="<?php bloginfo('template_directory');?>/assets/image/top/pickup07.webp" alt="オリーブ・京西京極">
            </div>
            <p class="top-pickup__slide-txt lh-info">「オリーブ・京西京極」（京都市右京区）<br>2025年11月1日オープン</p>
          </div>
          </a>
        </div>

        <!--pickup-->
        <div class="slick-item">
          <a href="https://www.supercourt.jp/facility-list/olive_narashinomiya/">
          <div class="slick-item__inner bg-white">
            <div class="top-pickup__slide-image">
              <img src="<?php bloginfo('template_directory');?>/assets/image/top/pickup06.webp" alt="オリーブ・奈良新大宮">
            </div>
            <p class="top-pickup__slide-txt lh-info">「オリーブ・奈良新大宮」（奈良市）<br>2025年9月1日オープン</p>
          </div>
          </a>
        </div>
        
        <!--pickup-->
        <div class="slick-item">
          <a href="https://www.supercourt.jp/facility-list/olive_kusatsu/">
          <div class="slick-item__inner bg-white">
            <div class="top-pickup__slide-image">
              <img src="<?php bloginfo('template_directory');?>/assets/image/top/pickup05.webp" alt="オリーブ・草津">
            </div>
            <p class="top-pickup__slide-txt lh-info">「オリーブ・草津」（栗東市）<br>2025年4月1日オープン</p>
          </div>
          </a>
        </div>

        <!--pickup-->
        <div class="slick-item">
          <div class="slick-item__inner bg-white">
            <div class="top-pickup__slide-image">
              <img src="<?php bloginfo('template_directory');?>/assets/image/top/pickup01.jpg" alt="">
            </div>
            <p class="top-pickup__slide-txt lh-info"><a href="https://www.jqac.com/jqaward/history/2018" target="blank">2018年度 日本経営品質賞（大企業部門）を受賞（2019年）</a></p>
          </div>
        </div>

        <!--pickup-->
        <div class="slick-item">
          <div class="slick-item__inner bg-white">
            <div class="top-pickup__slide-image">
              <img src="<?php bloginfo('template_directory');?>/assets/image/top/pickup02.jpg" alt="">
            </div>
            <p class="top-pickup__slide-txt lh-info">第14回大会 日本認知症ケア学会で石崎賞受賞（2013年）</p>
          </div>
        </div>

        <!--pickup-->
        <div class="slick-item">
          <div class="slick-item__inner bg-white">
            <div class="top-pickup__slide-image">
              <img src="<?php bloginfo('template_directory');?>/assets/image/top/pickup03.jpg" alt="">
            </div>
            <p class="top-pickup__slide-txt lh-info">ハートフル企業チャレンジ応援賞受賞（2014年）</p>
          </div>
        </div>

      </div>
    </div>
    <span class="top-topics__band block bg-yellow"></span>
  </section>

  <section class="top-event space-2s-bottom">
    <div class="wrap-m-right">
      <div class="top-topics__slide-head ttl-jp-l">
        <h2 class="en-upper txt-bold txt-white">新着イベント情報</h2>
      </div>
      <div class="slick-slider top-topics__slide-cont">
<?php
$args = array(
    'post_type'      => array('post', 'news'),
    'posts_per_page' => 6,
    'tax_query'      => array(
        array(
            'taxonomy' => 'news_category',
            'field'    => 'slug',
            'terms'    => 'news-eventinfo',
        ),
    ),
);

$event_query = new WP_Query($args);

if ($event_query->have_posts()) : 
    while ($event_query->have_posts()) : $event_query->the_post(); 
?>

    <div class="slick-item">
        <a href="<?php the_permalink(); ?>">
            <div class="slick-item__inner bg-white">
                <div class="top-pickup__slide-image">
                    <?php 
                    $thumb_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
                    if (!$thumb_url) {
                        $thumb_url = get_template_directory_uri() . '/assets/image/common/noimage.jpg';
                    }
                    ?>
                    <img src="<?php echo esc_url($thumb_url); ?>" alt="<?php the_title_attribute(); ?>">
                </div>
                <div class="top-event__info lh-info">
                    <?php
                    $terms = get_the_terms(get_the_ID(), 'news_category');
                    $display_term_name = '';
                    if ($terms && !is_wp_error($terms)) {
                        foreach ($terms as $term) {
                            if ($term->slug !== 'news-eventinfo') {
                                $display_term_name = $term->name;
                                break;
                            }
                        }
                    }
                    ?>
                    <?php if ($display_term_name) : ?>
                        <span class="top-event__cate"><?php echo esc_html($display_term_name); ?></span>
                    <?php endif; ?>
                    
                    <time class="top-event__time"><?php echo get_the_time('Y.m.d'); ?></time>
                    <p class="top-event__txt txt-medium"><?php the_title(); ?></p>
                </div>
            </div>
        </a>
    </div>

<?php 
    endwhile; 
    wp_reset_postdata();
endif; 
?>

      </div>
    </div>
    <span class="top-topics__band block bg-orange"></span>
  </section>

  
  <section class="top-news space-s-bottom">
  <div class="wrap-m-right fade-in">
    <div class="top-news__head">
      <div class="top-news__ttl ttl-jp-2l">
        <h2>老人ホーム新着情報</h2>
        <span class="top-news__ttl-en block">
          <img src="<?php bloginfo('template_directory');?>/assets/image/top/news_ttl_en.svg" alt="News">
        </span>
      </div>
      <ul class="top-news__cate">
        <?php
        $terms = get_terms([
          'taxonomy' => 'news_category',
          'parent'   => 0,
        ]);

        foreach ( $terms as $term ) {
          echo '<li><a class="block bg-beige" href="'.get_term_link($term).'">'.$term->name.'</a></li>';
        }
        ?>
      </ul>
    </div>
    <div class="top-news__cont">
      <div class="top-news__left">
        <a class="btn bg-orange-gradiate-reverse txt-white txt-bold" href="/news">
          <span>VIEW ALL</span>
        </a>
      </div>
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
            'terms'    => array('news-open', 'news-information'), // 指定のスラッグ
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
  <span class="top-topics__bg block wrap-m-right">
    <span class="top-topics__bg-inner bg-beige block"></span>
  </span>
</div>

<section class="top-newfacility top-strength space-2s space-s-bottom">
  <div class="wrap-m">
    <p class="ttl-en-m txt-bold txt-center txt-orange">SERIES</p>
    <h2 class="top-strength__cont__ttl fade-in ttl-jp-4l txt-bold txt-center" style="margin-bottom: 60px;">シリーズのご紹介</h2>
    <ul class="top-newfacility-wrap">
    <li class="top-newfacility-item">
      <a href="https://www.supercourt.jp/facility-list/premium">
      <figure><img src="<?php bloginfo('template_directory');?>/assets/image/facility/series_premium.webp" alt=""></figure>
      <h3 class="mt1 txt-bold txt-center txt-jp-l">スーパー・コート プレミアム<br><span class="txt-jp-s">SUPERCOURT PREMIUM</span></h3>
      <p class="txt-center">コンシェルジュが寄り添う日々<br>自分らしく、上質な時間を愉しむおもてなし</p>
      </a>
    </li>
    <li class="top-newfacility-item">
      <a href="https://www.supercourt.jp/facility-list/prime">
      <figure><img src="<?php bloginfo('template_directory');?>/assets/image/facility/series_prime.webp" alt=""></figure>
      <h3 class="mt1 txt-bold txt-center txt-jp-l">スーパー・コート プライム<br><span class="txt-jp-s">SUPERCOURT PRIME</span></h3>
      <p class="txt-center">病院個室以上の安心とくつろぎを<br>24時間看護とオーダーメイドリハビリ</p>
      </a>
    </li>
    <li class="top-newfacility-item">
      <a href="https://www.supercourt.jp/facility-list/olive">
      <figure><img src="<?php bloginfo('template_directory');?>/assets/image/facility/series_olive.webp" alt=""></figure>
      <h3 class="mt1 txt-bold txt-center txt-jp-l">オリーブ<br><span class="txt-jp-s">OLIVE</span></h3>
      <p class="txt-center">上質で落ち着きのある専門住宅<br>質の高い個別リハビリのための老人ホーム</p>
      </a>
    </li>
    <li class="top-newfacility-item">
      <a href="https://www.supercourt.jp/facility-list/">
      <figure><img src="<?php bloginfo('template_directory');?>/assets/image/facility/series_supercourt.webp" alt=""></figure>
      <h3 class="mt1 txt-bold txt-center txt-jp-l">スーパー・コート<br><span class="txt-jp-s">SUPERCOURT</span></h3>
      <p class="txt-center">安全・清潔・イキイキとした暮らし<br>天然温泉とおもてなしの介護</p>
      </a>
    </li>
  </ul>
  </div>
</section>

<section class="top-facility space-2s bg-orange mt2">
  <div class="top-facility__wrap">
  <div class="top-facility__map fade-in">
      <img src="<?php bloginfo('template_directory');?>/assets/image/top/facility_list_new.png" alt="" usemap="#Map">
      <map name="Map">
  <area shape="poly" coords="1206,554,1102,581,1170,609,1170,610,1083,641,1017,605,986,579,924,578,895,574,880,589,866,587,820,516,831,466,845,422,886,394,897,382,899,328,882,287,887,232,1021,230,1042,280,1084,299,1083,313,1031,346,1130,408,1167,483,1208,536" href="https://www.supercourt.jp/facility-list/hyougo/" alt="兵庫の施設一覧" title="兵庫の施設一覧">
  <area shape="poly" coords="1049,649,1026,736,1057,785,1055,786,1015,792,956,793,956,792,963,784,947,777,950,750,976,744,1003,686" href="https://www.supercourt.jp/facility-list/hyougo/" alt="兵庫の施設一覧" title="兵庫の施設一覧">
  <area shape="poly" coords="1130,186,1138,187,1165,232,1129,277,1130,277,1137,271,1150,264,1154,267,1156,273,1146,281,1149,285,1169,294,1166,313,1183,302,1193,310,1194,310,1194,306,1180,288,1181,276,1215,258,1218,260,1211,302,1227,326,1230,353,1294,376,1309,377,1330,401,1412,432,1338,456,1342,532,1368,541,1403,584,1366,601,1367,603,1394,621,1394,622,1328,609,1364,598,1299,554,1276,554,1250,513,1157,475,1125,403,1039,367,1035,333,1084,301,1044,285,1031,261,1027,240,1031,235,1043,237,1058,224,1089,210,1098,195" href="https://www.supercourt.jp/facility-list/kyoto/" alt="京都の施設一覧" title="京都の施設一覧">
  <area shape="poly" coords="1192,686,1208,657,1203,633,1146,608,1120,607,1105,594,1109,565,1204,552,1203,533,1167,484,1248,512,1276,553,1365,570,1287,608,1276,672,1280,714,1271,743,1270,743,1270,735,1181,758,1156,777,1105,763,1112,755,1192,686" href="https://www.supercourt.jp/facility-list/osaka/" alt="大阪の施設一覧" title="大阪の施設一覧">
    <area shape="poly" coords="1284,608,1325,608,1358,621,1403,626,1415,667,1446,694,1405,809,1456,847,1392,863,1331,946,1330,936,1307,931,1242,925,1241,894,1230,864,1206,859,1210,811,1287,808,1298,798,1270,744,1277,715,1274,635" href="https://www.supercourt.jp/facility-list/nara/" alt="奈良の施設一覧" title="奈良の施設一覧">
</map>
<script src="<?php bloginfo('template_directory');?>/assets/js/imageMapResizer.min.js"></script>
<script>imageMapResize();</script>
    </div>
    <div class="top-facility__cont fade-in">
      <div class="top-facility__cont-copy"><img src="<?php bloginfo('template_directory');?>/assets/image/top/facilities-copy.svg" alt=""></div>
      <h2 class="top-facility__cont__ttl txt-white ttl-jp-4l">老人ホーム・介護施設一覧</h2>
      <p class="txt-white top-facility__cont__txt">スーパー・コートは大阪府下を中心に、兵庫、京都、奈良、滋賀で約60施設の老人ホーム・介護施設を直営しています。</p>
      <div class="top-facility__link">
        <a class="top-facility__btn btn bg-black txt-jp-m txt-white txt-bold txt-center" href="/facility-list/premium">
          <span><h3>プレミアム<br>シリーズの一覧</h3></span>
        </a>
        <a class="top-facility__btn btn bg-black txt-jp-m txt-white txt-bold txt-center" href="/facility-list/prime">
          <span><h3>プライム<br>シリーズの一覧</h3></span>
        </a>
        <a class="top-facility__btn btn bg-black txt-jp-m txt-white txt-bold txt-center" href="/facility-list/olive">
          <span><h3>オリーブ<br>シリーズの一覧</h3></span>
        </a>
        <a class="top-facility__btn btn bg-black txt-jp-m txt-white txt-bold txt-center" href="/facility-list/parkinson">
          <span><h3>パーキンソン病<br>専門施設の一覧</h3></span>
        </a>
        <a class="top-facility__btn btn bg-black txt-jp-m txt-white txt-bold txt-center" href="/facility-list/osaka">
          <span><h3>大阪府の<br class="sp-only">老人ホーム<br>介護施設の一覧</h3></span>
        </a>
        <a class="top-facility__btn btn bg-black txt-jp-m txt-white txt-bold txt-center" href="/facility-list/hyougo">
          <span><h3>兵庫県の<br class="sp-only">老人ホーム<br>介護施設の一覧</h3></span>
        </a>
        <a class="top-facility__btn btn bg-black txt-jp-m txt-white txt-bold txt-center" href="/facility-list/kyoto">
          <span><h3>京都府の<br class="sp-only">老人ホーム<br>介護施設の一覧</h3></span>
        </a>
        <a class="top-facility__btn btn bg-black txt-jp-m txt-white txt-bold txt-center" href="/facility-list/nara">
          <span><h3>奈良県の<br class="sp-only">老人ホーム<br>介護施設の一覧</h3></span>
        </a>
        <a class="top-facility__btn btn bg-black txt-jp-m txt-white txt-bold txt-center" href="/facility-list/shiga">
          <span><h3>滋賀県の<br class="sp-only">老人ホーム<br>介護施設の一覧</h3></span>
        </a>
      </div>
      <a class="top-service__btn btn bg-orange-gradiate-reverse txt-jp-m txt-white txt-bold" href="/facility-list"><span>老人ホーム・介護施設を探す</span></a>
    </div>
  </div>
</section>





<section class="top-move-in space-s">
  <div class="top-move-in-cont">
    <div class="top-move-in-cont__img">
      <h2 class="top-move-in-cont__ttl txt-orange ttl-jp-4l fade-in">入居を<span class="ib">お考えの方へ</span></h2>
      <div class="image-zoom">
        <img class="image-zoom__inner" src="<?php bloginfo('template_directory');?>/assets/image/top/movein-img01.jpg" alt="">
      </div>
    </div>
    <div class="top-move-in-cont-right fade-in">
      <a class="top-move-in__cont-button bg-white" href="/process"><div class="txt-black txt-jp-l txt-bold"><span class="txt-orange">入居</span>の流れ</div><img src="<?php bloginfo('template_directory');?>/assets/image/top/arrow-black.svg" alt=""></a>
<a class="top-move-in__cont-button bg-white" href="/kengakureport"><div class="txt-black txt-jp-l txt-bold"><span class="txt-orange">見学</span>レポート</div><img src="<?php bloginfo('template_directory');?>/assets/image/top/arrow-black.svg" alt=""></a>
<a class="top-move-in__cont-button bg-white" href="/voice"><div class="txt-black txt-jp-l txt-bold"><span class="txt-orange">お客様</span>の声</div><img src="<?php bloginfo('template_directory');?>/assets/image/top/arrow-black.svg" alt=""></a>
</div>
</div>
<div class="top-move-in-cont-bottom space-3l space-2l-bottom">
<div class="top-move-in-cont-bottom-img02 fade-in"><img src="<?php bloginfo('template_directory');?>/assets/image/top/movein-img02.jpg" alt=""></div>
<div class="top-move-in-cont-bottom-img03 fade-in"><img src="<?php bloginfo('template_directory');?>/assets/image/top/movein-img03.jpg" alt=""></div>
<div class="top-move-in-cont-bottom-img04 fade-in"><img src="<?php bloginfo('template_directory');?>/assets/image/top/movein-img04.jpg" alt=""></div>
<div class="top-move-in-cont-bottom-copy fade-blur"><img src="<?php bloginfo('template_directory');?>/assets/image/top/movein-copy.svg" alt=""></div>
<div class="top-move-in-cont-bottom-txt ttl-jp-l txt-center txt-bold">地域の方に<br>
「スーパー・コートがあるから<span class="ib">老後が安心」だと</span><br>
おもっていただくこと</div>
</div>
<span class="top-move-in-bg"></span>
</section>


<section class="top-service space-3s space-2l-bottom">
  <div class="top-service__wrap wrap-m-right flex align-start">
    <div class="top-service__left fade-in">
      <div class="top-ttl01 ttl-jp-4l">
        <span class="top-ttl01-en block">
          <img src="<?php bloginfo('template_directory');?>/assets/image/top/service_ttl_en.svg" alt="Service">
        </span>
        <div class="top-ttl01-jp txt-orange bg-white">
          <h2 class="top-ttl01-jp__inner">スーパー・コートの老人ホーム・介護施設サービス</h2>
        </div>
      </div>
      <p class="top-service__txt txt-just">パーキンソン病専門の介護施設をはじめ難病ケアに対して専門的な体制を整えた老人ホームを大阪・兵庫・京都・奈良・滋賀で60施設直営。全ての老人ホーム・介護施設で、安全・清潔・イキイキとした日々をお過ごしいただけるよう、熟練スタッフの専門チームがお一人おひとりに寄り添った介護・看護体制を整えています。</p>
      <a class="top-service__btn btn bg-orange-gradiate-reverse txt-jp-m txt-white txt-bold" href="/service"><span>スーパー・コートのサービス</span></a>
      <span class="top-service__left-bg block bg-yellow"></span>
    </div>
    <div class="top-service__right">
      <div class="top-service__image fade-in">
        <img src="<?php bloginfo('template_directory');?>/assets/image/top/service-people.jpg" alt="リハビリや日々のケアを行うスーパー・コートのスタッフと入居者様">
      </div>
      <span class="top-service__script block fade-blur">
        <img src="<?php bloginfo('template_directory');?>/assets/image/top/service_script.svg" alt="Our Service">
      </span>
    </div>
  </div>
  <span class="top-service__bottom-bg block wrap-m-left bg-beige"></span>
</section>


<section class="top-about space-l">
  <div class="top-about__wrap flex align-start">
    <div class="top-about__left fade-in">
      <img src="<?php bloginfo('template_directory');?>/assets/image/top/about-building.jpg" alt="スーパー・コートの老人ホームの外観">
    </div>
    <div class="top-about__right fade-in">
      <div class="top-ttl01 ttl-jp-4l">
        <span class="top-ttl01-en block">
          <img src="<?php bloginfo('template_directory');?>/assets/image/top/about_ttl_en.svg" alt="About">
        </span>
        <div class="top-ttl01-jp bg-white">
          <h2 class="top-ttl01-jp__inner">老人ホーム運営にかける<br>スーパー・コートの思い</h2>
        </div>
      </div>
      <p class="top-about__txt txt-just">ご利用者の暮らしの中にたくさんの日常の感動を生みだすため、ホテル運営で培ったおもてなしの精神で、介護ケアを基本から徹底的に磨き上げ、誰にも真似ができない品質へ高め続けています。スーパー・コートは企業理念に基づいた使命・行動指針を全社に浸透させ、介護のその先を見据えたサービスの提供に努めています。</p>
      <a class="top-about__btn btn bg-orange-gradiate-reverse txt-jp-m txt-white txt-bold" href="/company">
        <span>スーパー・コートとは</span>
      </a>
      <div class="top-about__right-image">
        <img src="<?php bloginfo('template_directory');?>/assets/image/top/about-people.jpg" alt="スーパー・コートの老人ホームのご入居者">
      </div>
    </div>
    <span class="top-about__bg block bg-beige"></span>
  </div>
</section>


<section class="top-strength bg-gray space-m space-l-bottom">
  <div class="wrap-m">
    <div class="top-strength-copy fade-blur"><img src="<?php bloginfo('template_directory');?>/assets/image/top/strength-copy.svg" alt="strength"></div>
  <h2 class="top-strength__cont__ttl txt-orange ttl-jp-4l fade-in">スーパー・コートの<span class="ib">特徴</span></h2>
  <div class="top-strength__cont-wrap fade-in">
    <a href="/feature/hospitality"><img src="<?php bloginfo('template_directory');?>/assets/image/top/strength-button01.svg" alt="ホスピタリティ"></a>
    <a href="/feature/medical"><img src="<?php bloginfo('template_directory');?>/assets/image/top/strength-button02.svg" alt="安心の医療体制"></a>
    <a href="/feature/dementia"><img src="<?php bloginfo('template_directory');?>/assets/image/top/strength-button03.svg" alt="認知症ケア"></a>
    <a href="/feature/training"><img src="<?php bloginfo('template_directory');?>/assets/image/top/strength-button04.svg" alt="リハビリ・トレーニング"></a>
    <a href="/feature/bath"><img src="<?php bloginfo('template_directory');?>/assets/image/top/strength-button05.svg" alt="天然温泉"></a>
    <a href="/feature/meal"><img src="<?php bloginfo('template_directory');?>/assets/image/top/strength-button06.svg" alt="おいしいお食事・水・空気"></a>
    <a href="/feature/event"><img src="<?php bloginfo('template_directory');?>/assets/image/top/strength-button07.svg" alt="イベント・アクティビティ"></a>
    <a href="/feature/social"><img src="<?php bloginfo('template_directory');?>/assets/image/top/strength-button08.svg" alt="社会からの評価"></a>
  </div>
</div>
</section>


<!-- お客様の声セクション用CSS -->
<style>
.top-google-reviews {
    background-color: #F5F0E6;
    padding: 60px 0;
}
.top-google-reviews__container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: space-between;
}
.top-google-reviews__card {
    background: #fff;
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    padding: 20px;
    width: calc(50% - 10px);
    box-sizing: border-box;
    box-shadow: 0 1px 3px rgba(0,0,0,0.05);
}
.top-google-reviews__header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
}
.top-google-reviews__user {
    display: flex;
    align-items: center;
    gap: 12px;
}
.top-google-reviews__avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    font-weight: bold;
}
.top-google-reviews__name {
    font-size: 16px;
    font-weight: bold;
    color: #333;
}
.top-google-reviews__logo svg {
    width: 24px;
    height: 24px;
}
.top-google-reviews__rating {
    color: #fbbc04;
    font-size: 20px;
    letter-spacing: 2px;
    margin-bottom: 8px;
    line-height: 1;
}
.top-google-reviews__text {
    font-size: 14px;
    line-height: 1.6;
    color: #444;
}
.top-google-reviews__btn-wrap {
    text-align: center;
    margin-top: 40px;
}
/* スマホ表示: 1カラム */
@media (max-width: 768px) {
    .top-google-reviews__card {
        width: 100%; 
    }
}
</style>

<!-- お客様の声セクション 本体 -->
<section class="top-google-reviews space-m space-l-bottom">
  <div class="wrap-m fade-in">
    <div class="ttl-jp-4l txt-center" style="margin-bottom: 40px;">
      <h2 class="txt-bold txt-orange">老人ホームへ<span class="ib">ご入居されている</span><br>お客様・ご家族の声</h2>
    </div>
    
    <div class="top-google-reviews__container">
      
      <!-- 口コミ 1件目 -->
      <div class="top-google-reviews__card">
        <div class="top-google-reviews__header">
          <div class="top-google-reviews__user">
            <div class="top-google-reviews__avatar" style="background-color: #4285F4;">r</div>
            <div class="top-google-reviews__name">rur</div>
          </div>
          <div class="top-google-reviews__logo">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
          </div>
        </div>
        <div class="top-google-reviews__rating">★★★★★</div>
        <div class="top-google-reviews__text">入居している家族になります。<br>入居の検討の時に施設に見学いかせて頂きました。施設の雰囲気がとても良く施設長様初め職員の皆様が挨拶してくれ、とても気持ち良く感じました。入居相談員の方も親身になってきいてくださり、入居をしてからも看護師さん、ケアマネージャーさん、主任さんが父のことを真剣に考えて下さり、今はスーパーコートを選んでよかったと思います。</div>
      </div>

      <!-- 口コミ 2件目 -->
      <div class="top-google-reviews__card">
        <div class="top-google-reviews__header">
          <div class="top-google-reviews__user">
            <div class="top-google-reviews__avatar" style="background-color: #34A853;">M</div>
            <div class="top-google-reviews__name">M O</div>
          </div>
          <div class="top-google-reviews__logo">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
          </div>
        </div>
        <div class="top-google-reviews__rating">★★★★★</div>
        <div class="top-google-reviews__text">パーキンソン病の父がお世話になりました。かなり重度でしたが受け入れていただきとてもありがたかったです。
病院ともしっかりと連携を取られています。父は入所後しばらくして癌が見つかり余命があまりなかったのですが、病院のお医者さまからの説明にも施設長や看護師さんが同席してくださいました。残された時間をできるだけ大切にしたいという私たち家族の気持ちに寄り添って細やかに対応してくださったおかげで、穏やかで温かい時間を過ごすことができました。
スーパーコート住之江は、スタッフの皆さまとても優しくて明るく、家庭的な雰囲気の施設だと思います。家族以上に父のことを考えて接してくださり、父もスタッフのみなさんにお世話していただくのがとても嬉しそうでした。
本当によくしていただき、ここでお世話になって良かったと、家族一同とても感謝しています。</div>
      </div>

      <!-- 口コミ 3件目 -->
      <div class="top-google-reviews__card">
        <div class="top-google-reviews__header">
          <div class="top-google-reviews__user">
            <div class="top-google-reviews__avatar" style="background-color: #FBBC05;">K</div>
            <div class="top-google-reviews__name">K T</div>
          </div>
          <div class="top-google-reviews__logo">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
          </div>
        </div>
        <div class="top-google-reviews__rating">★★★★★</div>
        <div class="top-google-reviews__text">見学時に施設内が明るく清潔だったのと、スタッフさんが感じ良くニコニコされていたのが印象的でした。
入居後、実際にスタッフさんと接すると話しやすく、心配事があっても相談しやすいなと思い安心しました。
素敵な笑顔のスタッフさんがいらっしゃるので、訪問時に会えるかな？と私の楽しみができました。
急変時もしっかり対応してくださったので、こちらに母をお願いして良かったです。</div>
      </div>

      <!-- 口コミ 4件目 -->
      <div class="top-google-reviews__card">
        <div class="top-google-reviews__header">
          <div class="top-google-reviews__user">
            <div class="top-google-reviews__avatar" style="background-color: #EA4335;">R</div>
            <div class="top-google-reviews__name">R B</div>
          </div>
          <div class="top-google-reviews__logo">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
          </div>
        </div>
        <div class="top-google-reviews__rating">★★★★★</div>
        <div class="top-google-reviews__text">母が入所してお世話になっています。
ここに決めたのは施設長さんを始め、事務担当の方、ケアマネさん、看護士さんから介護士さん、作業療法士の方、清掃担当の職員の方々が、明るく親切でとてもいい印象があったからです。その第一印象は裏切られることなかって本当に良かったと思います。
母も職員の方々にお世話してもらい、毎日楽しそうでとても居心地が良さそうです。
こちらも始めてで色々分からない事がありましたが、その都度丁寧に回答いただき本当にありがたい限りです。
遠方に住む娘としては、安心して母をお願い出来る信頼できる施設です。</div>
      </div>

      <!-- 口コミ 5件目 -->
      <div class="top-google-reviews__card">
        <div class="top-google-reviews__header">
          <div class="top-google-reviews__user">
            <div class="top-google-reviews__avatar" style="background-color: #8E24AA;">M</div>
            <div class="top-google-reviews__name">O M</div>
          </div>
          <div class="top-google-reviews__logo">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
          </div>
        </div>
        <div class="top-google-reviews__rating">★★★★★</div>
        <div class="top-google-reviews__text">住宅型から介護型のスーパーコートさんに移りました、介護に関して、こんなにも住宅型と差があるのだと驚いています。手厚いのはもちろん介護士さん、お世話してくださる職員さん皆さんの連携も素晴らしく、住宅型でのわずらわしさや、心配事全てが解決され、母も笑顔が増えレクも毎日あったり、部屋にこもる時間が無くなり、認知症の進行も止まっているように見えます。新しい場所に移すのは不安でしたが、スーパーコートさんに転居して本当に良かったです。</div>
      </div>

      <!-- 口コミ 6件目 -->
      <div class="top-google-reviews__card">
        <div class="top-google-reviews__header">
          <div class="top-google-reviews__user">
            <div class="top-google-reviews__avatar" style="background-color: #F4511E;">S</div>
            <div class="top-google-reviews__name">T S</div>
          </div>
          <div class="top-google-reviews__logo">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
          </div>
        </div>
        <div class="top-google-reviews__rating">★★★★★</div>
        <div class="top-google-reviews__text">義理の母、主人の叔母がお世話になりました。スタッフの皆さんは、とても優しく接してくださり感謝しております。幸い母の時にお世話になったスタッフさんも何人かいらっしゃって、親切にしていただきました。みなさんの笑顔、思いやりが、入居者一人一人に伝わって、どの方も感謝されていると思います。今の体制を維持していただいて、みなさんに愛されるスーパーコートでいてください。心からお礼申し上げます。</div>
      </div>

      <!-- 口コミ 7件目 -->
      <div class="top-google-reviews__card">
        <div class="top-google-reviews__header">
          <div class="top-google-reviews__user">
            <div class="top-google-reviews__avatar" style="background-color: #00ACC1;">M</div>
            <div class="top-google-reviews__name">I M</div>
          </div>
          <div class="top-google-reviews__logo">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
          </div>
        </div>
        <div class="top-google-reviews__rating">★★★★★</div>
        <div class="top-google-reviews__text">施設長さんを始め、スタッフの方々には感謝しています。いつも明るく親切にご対応頂いています。リクリェーション、イベント、訪問医による診察、歯科検診、訪問看護、日々の介護、何より温泉水を使用した大浴場での入浴は本人も満足そうです。食事も美味しいと毎食完食している様です。何か些細な事象でも必ず家族へご連絡頂けて安心して任せていられる施設です。</div>
      </div>

      <!-- 口コミ 8件目 -->
      <div class="top-google-reviews__card">
        <div class="top-google-reviews__header">
          <div class="top-google-reviews__user">
            <div class="top-google-reviews__avatar" style="background-color: #4285F4;">C</div>
            <div class="top-google-reviews__name">Y C</div>
          </div>
          <div class="top-google-reviews__logo">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
          </div>
        </div>
        <div class="top-google-reviews__rating">★★★★★</div>
        <div class="top-google-reviews__text">こちらへ入居後、母はとても元気になりました。親切で明るいスタッフさんばかりですし、楽しいレクリエーションや美味しいお食事の時間を通してお友達も出来、心身共に安定しています。一人暮らしの母に対する心配も大幅に減り、私自身も随分余裕が出来ました。
相談事にもすぐ対処してくださるので心強いです。近くにこんな良い施設があってラッキーだったなぁ、と感じています。</div>
      </div>

      <!-- 口コミ 9件目 -->
      <div class="top-google-reviews__card">
        <div class="top-google-reviews__header">
          <div class="top-google-reviews__user">
            <div class="top-google-reviews__avatar" style="background-color: #34A853;">R</div>
            <div class="top-google-reviews__name">R R</div>
          </div>
          <div class="top-google-reviews__logo">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
          </div>
        </div>
        <div class="top-google-reviews__rating">★★★★★</div>
        <div class="top-google-reviews__text">明るくセンスの良い内装、グレードの高いお食事に楽しいイベント、温泉やフィットネスなど充実しています。何よりスタッフの方達が皆さん感じよく親切で、いつも爽やかな挨拶をしてくださいます。入居している父も、皆親切で環境も申し分ないと言っております。いつもお世話になりありがとうございます</div>
      </div>

      <!-- 口コミ 10件目 -->
      <div class="top-google-reviews__card">
        <div class="top-google-reviews__header">
          <div class="top-google-reviews__user">
            <div class="top-google-reviews__avatar" style="background-color: #EA4335;">N</div>
            <div class="top-google-reviews__name">N A</div>
          </div>
          <div class="top-google-reviews__logo">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
          </div>
        </div>
        <div class="top-google-reviews__rating">★★★★★</div>
        <div class="top-google-reviews__text">母がお世話になっています
この施設では、パーキンソン病に関する専門的な知識を持ったスタッフが常駐しており、最新の治療法やケア技術を取り入れています
母の病状や生活スタイルに合わせた個別のケアプランを作成してくれるため、とても安心しています。スタッフは常に母の状態を見守り、必要な対応を迅速に行ってくれます
パーキンソン病に特化したリハビリプログラムがあり、専門の理学療法士によるサポートを受けることができるのも素晴らしいと思います</div>
      </div>

    </div>

    <!-- Googleの場所検索リンク -->
    <div class="top-google-reviews__btn-wrap">
      <a href="https://www.google.com/maps/search/?api=1&query=有料老人ホーム+スーパー・コート" target="_blank" class="btn bg-orange-gradiate-reverse txt-white txt-bold">
        <span>スーパー・コート各施設の口コミを見る</span>
      </a>
    </div>
  </div>
</section>


<section class="top-youtube">
    <div class="wrap-m-right fade-in">
      <div class="top-topics__slide-head ttl-en-2l">
        <h2 class="txt-bold txt-white">YouTube</h2>
      </div>
      <div class="youtube-slider top-topics__slide-cont">
        <div class="slick-item">
          <div class="top-youtube__slide-video" style="padding-top: 0;">
            <a href="https://www.youtube.com/watch?v=IWjedCSRqSY" target="_blank"><img src="https://img.youtube.com/vi/IWjedCSRqSY/maxresdefault.jpg" alt=""></a>
          </div>
        </div>
        <div class="slick-item">
          <div class="top-youtube__slide-video">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/8Op3_DfutjI?si=Idnb37qjBA3JPXvu" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
          </div>
        </div>
        <div class="slick-item">
          <div class="top-youtube__slide-video">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/cs1cBQ_xMJw?si=bdEy6R7ISMI8LO1I" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
          </div>
        </div>
        <div class="slick-item">
          <div class="top-youtube__slide-video">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/r0OuqkQ-DEQ?si=Vuncx-kaT802ya77" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
          </div>
        </div>
        <div class="slick-item">
          <div class="top-youtube__slide-video">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/CeWw8qUg5pQ?si=HXEi_hm7mpXtO64c" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
          </div>
        </div>
        <div class="slick-item">
          <div class="top-youtube__slide-video">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/yMOI0vDbCL0?si=OaJeA3nEPqcbVa3X" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </div>
    <span class="top-topics__band block bg-orange"></span>
  </section>


<section class="space-2s space-2s-bottom wrap-m">
 <p class="ttl-en-m txt-bold txt-center">COLUMN</p>
 <h2 class="ttl-jp-4l  txt-orange txt-bold txt-center mb1">介護のお役立ちコラム</h2>

 <?php
  $args = [
    'post_type' => 'topics', 
    'posts_per_page' => 3, 
  ];
  $query = new WP_Query($args); ?>
 
<?php if ($query->have_posts()):?>
 
  <ul class="top-newfacility-wrap">
 
    <?php while ($query->have_posts()) : $query->the_post(); ?>
 
    <li class="top-newfacility-item">
      <a href="<?php the_permalink(); ?>">
      <figure>
                      <?php if ( has_post_thumbnail() ) : ?>
                        <?php the_post_thumbnail(); ?>
                      <?php else : ?>
                        <img src="<?php echo get_theme_file_uri('/assets/image/cms/noimage.png'); ?>" alt="<?php the_title(); ?>">
                      <?php endif; ?>
      </figure>
      <time class="top-event__time"><?php echo get_the_time('Y.m.d'); ?></time>
      <h4 class="top-event__txt txt-medium"><?php the_title(); ?></h4>
      </a>
    </li>
 
    <?php endwhile; ?>
 
  </ul>
 
<?php endif; wp_reset_postdata(); ?>

<p class="space-3s"><a class="archive-btn  bg-yellow txt-white txt-center" href="<?php echo home_url('/topics/'); ?>">一覧へ</a></p>

</section>





</main>


<script>
  $(function(){
    $('.slick-slider').slick({
      infinite: false,
      slidesToShow: 3,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });
    $('.event-slider').slick({
      infinite: false,
      slidesToShow: 3,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });
    $('.youtube-slider').slick({
      infinite: false,
      slidesToShow: 3,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });
  });
</script>

<?php get_footer(); ?>
