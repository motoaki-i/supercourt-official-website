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

<main id="parkinson">

<div class="lower-mv">
  <figure class="lower-mv-image">
    <img src="<?php bloginfo('template_directory');?>/assets/image/facility/mv_facilitylist-pd.webp" alt="">
  </figure>
  <div class="ttl-lower-wrap">
    <h1 class="ttl-lower txt-white bg-black"><?php the_title()?></h1>
  </div>
</div>

<ul class="pan">
    <li class="txt-en-s"><a href="<?php echo esc_url(home_url('/')); ?>">TOP</a></li>
    <li class="txt-en-s">-</li>
    <li class="txt-jp-s"><a href="<?php echo esc_url(home_url('/facility-list/')); ?>">老人ホーム・介護施設一覧</a></li>
    <li class="txt-en-s">-</li>
    <li class="txt-jp-s"><?php the_title()?></li>
</ul>

<div class="space-2s space-2s-bottom wrap-m">
スーパー・コートでは、理学療法士や作業療法士などの専門スタッフが個別リハビリや集団リハビリなどを実施している施設がございます。<br>
ご入居者の状態に合わせた個別のリハビリプログラムをもとに身体機能の維持や回復に務め、自立した生活の支援や、生活の質が向上されるよう、専門的な医療、看護、リハビリ、介護が一体となり、ご入居者の運動機能の維持や生活の質の向上を目指しております。また、24時間看護師によるサービスを提供している施設もございますので、夜間帯に医療行為が必要な方でも安心してご入居いただけます。
</div>

<section class="bg-beige">

<div class="wrap-m space-m space-m-bottom">

  <h2 class="ttl-jp-2l txt-bold ttl-border-l-orange2">大阪府のパーキンソン病専門の老人ホーム・介護施設</h2>
    <ul class="scarchive__list">
    <?php
    // 表示したい施設のスラッグを配列で指定
    $target_facility_slugs = [
        "olive_minamisenri", "osakajo", "mikuni", "higashiyodogawa",
        "higashisumiyoshi2", "hirano", "suminoe", "kire",
        "toyonakamomoyamadai", "kadoma", "takaida", "sakai", "shirasagi",
        "kamiishi", "takaishi"
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

    
    <!--<p><a class="nursing-facility-more bg-black txt-white fit block" href="https://www.supercourt.jp/facility-list/parkinson/">パーキンソン病専門施設の一覧</a></p>-->


  <h2 class="ttl-jp-2l txt-bold ttl-border-l-orange2">兵庫県のパーキンソン病専門の老人ホーム・介護施設</h2>
    <ul class="scarchive__list">
    <?php
    // 表示したい施設のスラッグを配列で指定
    $target_facility_slugs = [
        "facility-list-12131", "olive_takarazuka", "inadera", "minamihanayashiki", "kobe_kita"
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
   


  <h2 class="ttl-jp-2l txt-bold ttl-border-l-orange2">京都府のパーキンソン病専門の老人ホーム・介護施設</h2>
    <ul class="scarchive__list">
    <?php
    // 表示したい施設のスラッグを配列で指定
    $target_facility_slugs = [
        "facility-list-12141", "shijo", "rokujizo", "nishikyougoku"
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




  <h2 class="ttl-jp-2l txt-bold ttl-border-l-orange2">奈良県のパーキンソン病専門の老人ホーム・介護施設</h2>
    <ul class="scarchive__list">
    <?php
    // 表示したい施設のスラッグを配列で指定
    $target_facility_slugs = [
        "facility-list-12138", "jr-nara"
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




  <h2 class="ttl-jp-2l txt-bold ttl-border-l-orange2">滋賀県のパーキンソン病専門の老人ホーム・介護施設</h2>
    <ul class="scarchive__list">
    <?php
    // 表示したい施設のスラッグを配列で指定
    $target_facility_slugs = [
        "facility-list-12136"
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

<section id="nursing-point"  class="bg-beige relative space-2l space-m-bottom">

  <div class="nursing-sub-ttl-l bg-green wrap-m-left">
    <p class="ttl-en-m txt-bold txt-center txt-yellow">4POINTS</p>
    <h2 class="ttl-jp-4l  txt-white txt-bold txt-center">スーパー・コートの<br>パーキンソン病・神経難病ケア</h2>
  </div>
<br><br>
  <div class="nursing-point-wrap bg-white space-m space-3s-bottom wrap-l-left">
  <div class="wrap-m">

  <div class="nursing-point-item">
    <div class="grid2 gg2">
      <div>
        <h3 class="ttl-olive-point ttl-jp-l txt-bold txt-orange mb1 flex g-half align-start">理学療法士・作業療法士が監修するリハビリプログラム</h3>
        <p>パーキンソン病の治療・介護において、リハビリは薬物療法と並び重要です。進行性の病気であるパーキンソン病にとって、運動機能や日常生活動作（ADL）の維持・改善、合併症予防、精神的な安定など、多岐にわたる効果が期待できます。
オリーブ・草津では、理学療法士・作業療法士・言語聴覚士といった専門職が、お一人おひとりに合わせた個別のリハビリプログラムを作成し、症状の維持・改善を目指します。</p>
      </div>
      <figure><img src="<?php bloginfo('template_directory');?>/assets/image/facility/olive/serapisuto.webp" alt="point01"></figure>
    </div>
  </div>

  <div class="nursing-point-item">
    <div class="grid2 gg2">
      <div>
        <h3 class="ttl-olive-point ttl-jp-l txt-bold txt-orange mb1 flex g-half align-start">神経内科専門医師による訪問診療</h3>
        <p>パーキンソン病の専門医である神経内科医が定期的に訪問し、薬物療法、パーキンソン病特有の運動機能の症状、併発する自律神経や精神・認知機能の症状も含めた総合的な管理で、入居後も専門的な治療を維持し、QOL（生活の質）の維持・向上を目指します。</p>
      </div>
      <figure><img src="<?php bloginfo('template_directory');?>/assets/image/nursing/point02.jpg" alt="point02"></figure>
    </div>
  </div>

  <div class="nursing-point-item">
    <div class="grid2 gg2">
      <div>
        <h3 class="ttl-olive-point ttl-jp-l txt-bold txt-orange mb1 flex g-half align-start">24時間体制の訪問看護</h3>
        <p>症状が時間帯によって大きく変化するパーキンソン病において、夜間・早朝での急変にも即座に対応するためには、24時間の看護体制が重要です。
日常の健康管理、施設内での医療処置や医療機関との連携、正確な服薬管理はもちろん、日常生活動作（ADL）が低下している方には、介護士と連携して、食事、排泄、入浴などの日常生活のサポートも行います。</p>
      </div>
      <figure><img src="<?php bloginfo('template_directory');?>/assets/image/facility/olive/nurse.webp" alt="point03"></figure>
    </div>
  </div>

  <div class="nursing-point-item">
    <div class="grid2 gg2">
      <div>
        <h3 class="ttl-olive-point ttl-jp-l txt-bold txt-orange mb1 flex g-half align-start">薬剤師と看護師が連携した服薬管理</h3>
        <p>パーキンソン病や脊髄小脳変性症などの神経難病において重要な薬物療法とその管理について、神経内科医の指示のもと担当の薬剤師が適切な薬の種類・量・飲み合わせで配薬します。看護師は体調を細かく観察しながら投薬を調整・指導します。
医師と薬剤師・看護師が密接に連携して、ご入居者お一人おひとりの服薬状況を把握し、適切な服薬管理を行います。</p>
      </div>
      <figure><img src="<?php bloginfo('template_directory');?>/assets/image/nursing/point04.jpg" alt="point04"></figure>
    </div>

  </div>
  </div>

</section>


</main>
<?php get_footer(); ?>