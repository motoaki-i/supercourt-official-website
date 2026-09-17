<?php get_header(); ?>

<?php
// nursingページの最初の方に追記
// ラベル取得用のサンプル投稿IDを取得
$temp_query = new WP_Query(['post_type' => 'facility-list', 'posts_per_page' => 1, 'fields' => 'ids']);
$sample_id = !empty($temp_query->posts) ? $temp_query->posts[0] : 0;
wp_reset_postdata();

$category_choices = [];
$type_choices = [];
$availability_choices = [];

if ($sample_id) {
    $field_cat = get_field_object('category', $sample_id);
    $category_choices = $field_cat['choices'] ?? [];
    $field_type = get_field_object('type', $sample_id);
    $type_choices = $field_type['choices'] ?? [];
    
    // 空室情報のラベル取得
    $field_price1 = get_field_object('price1', $sample_id);
    if (!empty($field_price1['sub_fields'])) {
        foreach ($field_price1['sub_fields'] as $sf) {
            if ($sf['name'] === 'availability') {
                foreach ($sf['sub_fields'] as $inner) {
                    if ($inner['name'] === 'availability_answer') {
                        $availability_choices = $inner['choices'];
                    }
                }
            }
        }
    }
}
$default_img = get_template_directory_uri() . '/assets/image/scfacility/facility_thumb_none.webp';
?>

<main id="premium">

<div class="lower-mv">
  <figure class="lower-mv-image">
    <img src="<?php bloginfo('template_directory');?>/assets/image/facility/mv_facilitylist-premium.webp" alt="">
  </figure>
  <div class="ttl-lower-wrap">
    <h1 class="ttl-lower txt-white bg-black"><?php the_title()?></h1>
  </div>
</div>

<ul class="pan">
    <li class="txt-en-s"><a href="<?php echo esc_url(home_url('/')); ?>">TOP</a></li>
    <li class="txt-en-s">-</li>
    <li class="txt-jp-s"><a href="<?php echo esc_url(home_url('/facility-list/')); ?>">有料老人ホーム・介護施設一覧</a></li>
    <li class="txt-en-s">-</li>
    <li class="txt-jp-s"><?php the_title()?></li>
</ul>

<div class="space-2s space-2s-bottom wrap-m">
プレミアムクラスの有料老人ホームで、上質で穏やかな暮らしを。ご入居者が趣味や生きがいを大切に「自分らしく」過ごしていただけるよう、当社グループの総合力を結集してオープンしたスーパー・コート プレミアム施設。<br>顧客満足度No.1＜2025年度 JCSI（ビジネスホテル業種Standard クラス）＞に輝いたスーパーホテルの「心からのおもてなし」と、長年の介護研究で培われた「介護力」でお迎えします。プレミアムな空間で、我が家のようにゆったりとお過ごしください。
</div>

<section class="bg-beige">

<div class="wrap-m space-m">
    <h2 class="ttl-jp-2l txt-bold ttl-border-l-orange2">プレミアムシリーズ（高級有料老人ホーム・介護施設）施設一覧</h2>

    <ul class="scarchive__list">
    <?php
    // 表示したい施設のスラッグを配列で指定
    $target_facility_slugs = [
        "pre_ikeda", "pre_ujiookubo", "pre_nara_gakuenmae",
        "facility-list-12132", "facility-list-12137", "facility-list-12139"
    ];

    $args = [
        'post_type'      => 'facility-list',
        'post_name__in'  => $target_facility_slugs, // スラッグで指定
        'posts_per_page' => -1,
        'orderby'        => 'post_name__in',        // 配列の順番通りに並べる
    ];
    $facility_query = new WP_Query($args);

    if ($facility_query->have_posts()) :
        while ($facility_query->have_posts()) : $facility_query->the_post();
            $f_id = get_the_ID();
            // 外部関数を使わず直接カスタムフィールドを取得
            $fields = get_fields($f_id) ?: [];

            // リンク先判定
            $special_page = $fields['special_page'] ?? [];
            $href = !empty($special_page['url']) ? $special_page['url'] : get_permalink($f_id);
            $target_attr = !empty($special_page['target_blank']) ? 'target="_blank" rel="noopener noreferrer"' : '';

            // 画像URLの取得
            $img_facility = $fields['img_facility'] ?? '';
            $img_main     = $fields['img_main'] ?? '';
            $img_url = '';
            if (!empty($img_facility)) {
                $img_url = is_array($img_facility) ? ($img_facility['url'] ?? '') : (is_numeric($img_facility) ? wp_get_attachment_image_url($img_facility, 'full') : $img_facility);
            } elseif (!empty($img_main)) {
                $img_url = is_array($img_main) ? ($img_main['url'] ?? '') : (is_numeric($img_main) ? wp_get_attachment_image_url($img_main, 'full') : $img_main);
            }
            if (empty($img_url)) $img_url = $default_img;

            // 各種データの抽出
            $categories = $fields['category'] ?? [];
            $type_val   = $fields['type'] ?? '';
            $type_label = $type_choices[$type_val] ?? $type_val;

            $price1 = $fields['price1'] ?? [];
            $availability = $price1['availability'] ?? [];
            $avail_val = $availability['availability_answer'] ?? '';
            $avail_label = $availability_choices[$avail_val] ?? '';

            $move_in_fee = (int)($price1['move_in_fee'] ?? 0);
            $monthly_amount = $price1['monthly_fee']['monthly_fee_amount'] ?? '';
            ?>

            <li>
              <a class="bg-white" href="<?php echo esc_url($href); ?>" <?php echo $target_attr; ?>>
                <div class="scarchive__list-image">
                  <img src="<?php echo esc_url($img_url); ?>" alt="<?php the_title(); ?>" loading="lazy">
                </div>
                <div class="scarchive__list-cont">
                  <div class="scarchive__list-info">
                    <?php if (!empty($categories)) : ?>
                      <ul class="scarchive__list-cate txt-12-14 txt-bold">
                        <?php foreach ($categories as $cat_slug) : if ($cat_slug === 'normal') continue; ?>
                          <li class="<?php echo esc_attr($cat_slug); ?>"><?php echo esc_html($category_choices[$cat_slug] ?? $cat_slug); ?></li>
                        <?php endforeach; ?>
                      </ul>
                    <?php endif; ?>

                    <p class="scarchive__list-type txt-12-14 txt-medium"><?php echo esc_html($type_label); ?></p>
                    <h3 class="scarchive__list-ttl txt-15-22 txt-bold"><?php the_title(); ?></h3>
                    <p class="scarchive__list-address txt-13-16 txt-medium"><?php echo esc_html($fields['area'] ?? ''); ?></p>
                    <p class="scarchive__list-station txt-12-14 txt-medium"><?php echo nl2br(esc_html($fields['station'] ?? '')); ?></p>

                    <?php if ($avail_label) : ?>
                      <div class="scarchive__list-vacant">
                        <p class="scarchive__list-vacant-block room-avail--<?php echo esc_attr($avail_val); ?> txt-13-16 txt-medium txt-white bg-yellow">
                          <?php echo esc_html($avail_label); ?>
                        </p>
                      </div>
                    <?php endif; ?>

                    <div class="scarchive__list-price">
                      <p class="scarchive__list-price-left txt-13-16 txt-medium">入居金</p>
                      <p class="scarchive__list-price-num txt-15-22 txt-medium txt-orange"><?php echo number_format($move_in_fee); ?>円</p>
                    </div>
                    <div class="scarchive__list-price">
                      <p class="scarchive__list-price-left txt-13-16 txt-medium">月額利用料</p>
                      <p class="scarchive__list-price-num txt-15-22 txt-medium txt-orange"><?php echo $monthly_amount ? number_format((int)$monthly_amount).'円' : '-'; ?></p>
                    </div>
                  </div>
                  <div class="scarchive__list-btn block txt-13-16 txt-bold txt-center txt-white bg-orange-gradiate-reverse">この施設の詳細を見る</div>
                </div>
              </a>
            </li>

        <?php endwhile; wp_reset_postdata(); endif; ?>
  </ul>

    <div class="space-s"></div>
    <div class="facility-tel-wrap bg-white txt-center">
      <p class="txt-jp-m txt-medium mb-half">入居に関するお問合せはこちら</p>
      <p class="facility-dial txt-white txt-medium mb-half">ご入居相談ダイヤル</p>
      <figure>
        <a href="tel:0120-532-029" class="ttl-jp-2l txt-bold txt-orange"><img src="<?php bloginfo('template_directory');?>/assets/image/facility/0120-532-029.svg" alt="tel"></a>
      </figure>
    </div>
    <p class="txt-center space-s"><a href="<?php echo esc_url(home_url('/facility-list/')); ?>" class="facility-btn txt-jp-l txt-white txt-bold bg-orange-gradiate-reverse">施設一覧に戻る</a></p>
</div>

</section>


<section id="general-point"  class="bg-beige relative space-l space-m-bottom">

  <div class="nursing-sub-ttl-l bg-yellow-gradiate wrap-m-left">
    <p class="ttl-en-m txt-bold txt-center txt-white">7 POINTS</p>
    <h2 class="ttl-jp-4l  txt-white txt-bold txt-center">スーパー・コート<br>プレミアムシリーズのサービス</h2>
  </div>
<br><br>
  <div class="nursing-point-wrap bg-white space-m space-3s-bottom wrap-l-left">
  <div class="wrap-m">

  <div class="nursing-point-item">
    <div class="grid2 gg2">
      <div>
        <h3 class="ttl-olive-point ttl-jp-l txt-bold txt-orange mb1 flex g-half align-start">ホスピタリティ</h3>
        <p>コンシェルジュをはじめ専門のスタッフを各所に配置、認知症ケア専門士がケアプランをコーディネートしております。ご本人を尊重したケアを実現するため、ご入居者すべての方に笑顔あふれるイキイキとした毎日をご提供しております。</p>
      </div>
      <figure><img src="<?php bloginfo('template_directory');?>/assets/image/feature/feature01.jpg" alt="ホスピタリティ"></figure>
    </div>
  </div>

  <div class="nursing-point-item">
    <div class="grid2 gg2">
      <div>
        <h3 class="ttl-olive-point ttl-jp-l txt-bold txt-orange mb1 flex g-half align-start">認知症ケア</h3>
        <p>私たちは、入居者様ご本人の「したいこと」「好きなこと」「できること」に着目し、認知症ケアを行っています。信頼関係を重視し、これまで過ごした環境や個性を理解しながら、夢や目標の実現をサポート。一人ひとりの「イキイキとした毎日」を目指して、実践と研究を重ねています。</p>
        <p><a class="point-more bg-beige txt-center txt-medium block fit" href="<?php echo esc_url(home_url('/feature/dementia/')); ?>">詳しくはこちら</a></p>
      </div>
      <figure><img src="<?php bloginfo('template_directory');?>/assets/image/feature/feature03.jpg" alt="認知症ケア"></figure>
    </div>
  </div>

  <div class="nursing-point-item">
    <div class="grid2 gg2">
      <div>
        <h3 class="ttl-olive-point ttl-jp-l txt-bold txt-orange mb1 flex g-half align-start">包括的高齢者運動<br>トレーニング</h3>
        <p>ご入居者の現状の体力・生活に合った独自の高齢者向けトレーニングを導入しております。機能訓練指導員が一人ひとりに合わせたプランを立案しており、コミュニケーションを大切にしながら機能訓練を行っております。</p>
      </div>
      <figure><img src="<?php bloginfo('template_directory');?>/assets/image/feature/feature04.jpg" alt="リハビリ・トレーニング"></figure>
    </div>
  </div>

  <div class="nursing-point-item">
    <div class="grid2 gg2">
      <div>
        <h3 class="ttl-olive-point ttl-jp-l txt-bold txt-orange mb1 flex g-half align-start">天然温泉</h3>
        <p>当社グループの「スーパーホテル」より本物の天然温泉を直送しております。温浴によるリラクゼーション効果に加え、お湯の中に溶け込んだ成分が疲労回復や神経痛、関節痛の改善など様々な効果をもたらしてくれます。</p>
      </div>
      <figure><img src="<?php bloginfo('template_directory');?>/assets/image/feature/feature05.jpg" alt="天然温泉"></figure>
    </div>
  </div>

  <div class="nursing-point-item">
    <div class="grid2 gg2">
      <div>
        <h3 class="ttl-olive-point ttl-jp-l txt-bold txt-orange mb1 flex g-half align-start">おいしい食事・水・空気</h3>
        <p>旬・素材を吟味した四季折々のお食事、温かいものは温かく、冷たいものは冷たくお召し上がりいただけるようご入居者がレストランに来られてから調理を行います。また、館内の水すべてが特許を取得している「MICA加工」により浸透性・保湿性や抗酸化力に優れた水となっております。</p>
      </div>
      <figure><img src="<?php bloginfo('template_directory');?>/assets/image/feature/feature06.jpg" alt="おいしい食事・水・空気"></figure>
    </div>
  </div>

  <div class="nursing-point-item">
    <div class="grid2 gg2">
      <div>
        <h3 class="ttl-olive-point ttl-jp-l txt-bold txt-orange mb1 flex g-half align-start">イベント・アクティビティ</h3>
        <p>ご入居者の皆様にイキイキとした生活を送っていただくために、施設ごとに年間を通してさまざまなレクリエーションを企画・開催しています。プレミアム施設では、コンシェルジュがイベントの企画・運営を手がけ、少人数グループや個別の趣味の場などもご用意しています。</p>
      </div>
      <figure><img src="<?php bloginfo('template_directory');?>/assets/image/feature/feature07.jpg" alt="イベント・アクティビティ"></figure>
    </div>
  </div>

  <div class="nursing-point-item">
    <div class="grid2 gg2">
      <div>
        <h3 class="ttl-olive-point ttl-jp-l txt-bold txt-orange mb1 flex g-half align-start">社会からの評価</h3>
        <p>環境にも人にもやさしい施設とオフィスの運営をはじめ、より良い経営を目指して行ってきた取り組みなどが評価され、さまざまな賞をいただいています。スーパー・コートはこれからも、ご入居者の皆様に「安全・清潔・イキイキした生活」を提供し続けるために、健やかでサスティナブルな経営に努めてまいります。</p>
      </div>
      <figure><img src="<?php bloginfo('template_directory');?>/assets/image/feature/feature08.jpg" alt="社会からの評価"></figure>
    </div>
  </div>

  </div>

</section>


</main>
<?php get_footer(); ?>