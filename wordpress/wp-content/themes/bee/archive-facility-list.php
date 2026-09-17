<?php

get_header();

// フェーズ1: 検索パラメータ取得（全都道府県共通）
$search_params = sc_get_facility_search_params('');

$paged = max(
  1,
  get_query_var('paged') ? absint(get_query_var('paged')) :
  (get_query_var('page') ? absint(get_query_var('page')) : 1)
);

// 一旦クエリを実行して投稿を取得
$temp_args = [
  'post_type'      => 'facility-list',
  'posts_per_page' => 1,
  'fields'         => 'ids',
];
$temp_query = new WP_Query($temp_args);
$sample_post_id = !empty($temp_query->posts) ? $temp_query->posts[0] : 0;
wp_reset_postdata();

$category_choices = [];
$type_choices = [];
$commitment_choices = [];
$availability_choices = [];

if ($sample_post_id) {
  $field_category = function_exists('get_field_object') ? get_field_object('category', $sample_post_id) : null;
  $category_choices = (!empty($field_category['choices']) && is_array($field_category['choices'])) ? $field_category['choices'] : [];
  
  $field_type = function_exists('get_field_object') ? get_field_object('type', $sample_post_id) : null;
  $type_choices = (!empty($field_type['choices']) && is_array($field_type['choices'])) ? $field_type['choices'] : [];
  
  $field_commitment = function_exists('get_field_object') ? get_field_object('commitment', $sample_post_id) : null;
  $commitment_choices = (!empty($field_commitment['choices']) && is_array($field_commitment['choices'])) ? $field_commitment['choices'] : [];
  
  $field_price1 = function_exists('get_field_object') ? get_field_object('price1', $sample_post_id) : null;
  if (!empty($field_price1['sub_fields']) && is_array($field_price1['sub_fields'])) {
    foreach ($field_price1['sub_fields'] as $sf) {
      if (($sf['name'] ?? '') === 'availability' && !empty($sf['sub_fields']) && is_array($sf['sub_fields'])) {
        foreach ($sf['sub_fields'] as $inner) {
          if (($inner['name'] ?? '') === 'availability_answer' && !empty($inner['choices']) && is_array($inner['choices'])) {
            $availability_choices = $inner['choices'];
            break 2;
          }
        }
      }
    }
  }
}

$tax_query = [];
if (is_tax('facilitys_category')) {
  $qo = get_queried_object();
  if ($qo && !is_wp_error($qo) && !empty($qo->slug)) {
    $tax_query[] = [
      'taxonomy'         => 'facilitys_category',
      'field'            => 'slug',
      'terms'            => [sanitize_title($qo->slug)],
      'operator'         => 'IN',
      'include_children' => true,
    ];
  }
}

// フェーズ1: meta_query構築
$meta_query = sc_build_facility_meta_query($search_params, '');

$args = [
  'post_type'      => 'facility-list',
  'posts_per_page' => 60,
  'paged'          => $paged,
  'orderby'        => 'date',
  'order'          => 'DESC',
];

if (!empty($tax_query)) {
  $args['tax_query'] = $tax_query;
}

if (!empty($meta_query)) {
  $args['meta_query'] = $meta_query;
}

$query = new WP_Query($args);

$default_img = get_template_directory_uri() . '/assets/image/scfacility/facility_thumb_none.webp';
?>

<main id="facility">

  <div class="lower-mv">
    <figure class="lower-mv-image">
      <img src="<?php bloginfo('template_directory');?>/assets/image/facility/mv.jpg" alt="">
    </figure>
    <div class="ttl-lower-wrap">
      <p class="ttl-lower-up ttl-en-2l txt-white en-upper txt-bold">facility</p>
      <h1 class="ttl-lower txt-white bg-black"><span class="ib">関西（大阪・兵庫・京都・奈良・滋賀）の老人ホーム・介護施設一覧</span></h1>
    </div>
  </div>

  <div class="breadcrumbs-container">
  <ul class="scfacility-breadcrumbs txt-12-14 txt-medium space-m-bottom">
    <li>
        <a href="/">TOP</a>
    </li>
    <li>
        <span>老人ホーム・介護施設一覧</span>
    </li>
</ul>
</div>


  <?php
  // フェーズ1: 検索フォームコンポーネント化（全都道府県共通）
  get_template_part('template-parts/facility-search-form', null, array(
    'form_action'         => home_url('/facility-list/'),
    'pref_slug'           => '', // 全都道府県
    'selected_areas'      => $search_params['area'],
    'selected_categories' => $search_params['category'],
    'selected_ukeire'     => $search_params['ukeire'],
    'entry_min'           => $search_params['entry_min'],
    'entry_max'           => $search_params['entry_max'],
    'month_min'           => $search_params['month_min'],
    'month_max'           => $search_params['month_max'],
    'area_field_name'     => '',
    'area_label'          => '市区町村（全都道府県）',
  ));
  ?>




  <section class="scarchive space-3l-bottom bg-beige space-s">

<div class="scarchive__wrap wrap-m">

<div class="scarchive__result">
  <h2 class="scarchive__result-ttl txt-18-28 txt-bold scfacility__left-border-ttl">
    <?php
    // 1. ヒット件数の取得
    $hit_count = $query->found_posts;

    // 2. スラッグから日本語ラベルへの変換マッピング（確実に日本語を出すために定義）
    $ukeire_labels = [
        'independent' => '自立',
        'support'     => '要支援',
        'care'        => '要介護',
        'dementia'    => '認知症',
        'parkinson'   => 'パーキンソン病',
        'hours_24'    => '24時間看護',
    ];

    $cat_labels = [
        'parkinson' => 'パーキンソン病専門',
        'nursing'   => 'ナーシングホーム',
        'premium'   => 'プレミアムシリーズ',
        'prime'     => 'プライムシリーズ',
        'normal'    => '一般施設',
        'olive'    => 'オリーブ',
        'supercourt'    => 'スーパー・コート',
    ];

    // 3. 検索条件ラベルの収集
    $filter_display = [];

    // 都道府県（タクソノミー）
    if (is_tax('facilitys_category')) {
        $qo = get_queried_object();
        $filter_display[] = $qo->name;
    }

    // 受け入れ対象（日本語に変換）
    if (!empty($search_params['ukeire'])) {
        foreach ($search_params['ukeire'] as $val) {
            $filter_display[] = isset($ukeire_labels[$val]) ? $ukeire_labels[$val] : $val;
        }
    }

    // 施設カテゴリ（日本語に変換）
    if (!empty($search_params['category'])) {
        foreach ($search_params['category'] as $val) {
            $filter_display[] = isset($cat_labels[$val]) ? $cat_labels[$val] : $val;
        }
    }

    // 金額（月額）
    if (!empty($search_params['month_min']) || !empty($search_params['month_max'])) {
        $price_text = '月額';
        if ($search_params['month_min']) $price_text .= number_format($search_params['month_min'] / 10000) . '万円〜';
        if ($search_params['month_max']) $price_text .= number_format($search_params['month_max'] / 10000) . '万円以下';
        $filter_display[] = $price_text;
    }

    // 4. タイトルの出力
    if (!empty($filter_display)) {
        echo '「<span class="txt-orange">' . esc_html(implode('・', $filter_display)) . '</span>」の老人ホーム・介護施設の検索結果';
    } else {
        echo 'すべての老人ホーム・介護施設一覧';
    }
    ?>
    <span class="scarchive__result-count" style="margin-left: 0px; font-size: 0.7em; color: #666;">
        （<?php echo $hit_count; ?>件）
    </span>
  </h2>
  <div class="scarchive__result-right"></div>
</div>

      <?php if ($query->have_posts()) : ?>
        <ul class="scarchive__list">
          <?php while ($query->have_posts()) : $query->the_post(); ?>

            <?php
            // フェーズ1: 軽量ヘルパー関数を使用
            $facility_data = sc_get_facility_list_data(get_the_ID());

            $special_page  = $facility_data['special_page'] ?? [];
            $url           = $special_page['url'] ?? '';
            $target_blank  = !empty($special_page['target_blank']);
            $href          = $url ? $url : get_permalink();

            $img_facility  = $facility_data['img_facility'] ?? '';
            $img_main      = $facility_data['img_main'] ?? '';

            $img_url = '';
            if (!empty($img_facility)) {
              if (is_array($img_facility) && !empty($img_facility['url'])) {
                $img_url = $img_facility['url'];
              } elseif (is_numeric($img_facility)) {
                // 画像IDの場合、URLに変換
                $img_url = wp_get_attachment_image_url($img_facility, 'full');
              } else {
                $img_url = (string)$img_facility;
              }
            } elseif (!empty($img_main)) {
              if (is_array($img_main) && !empty($img_main['url'])) {
                $img_url = $img_main['url'];
              } elseif (is_numeric($img_main)) {
                // 画像IDの場合、URLに変換
                $img_url = wp_get_attachment_image_url($img_main, 'full');
              } else {
                $img_url = (string)$img_main;
              }
            }
            
            if (empty($img_url)) {
              $img_url = $default_img;
            }

            $categories = $facility_data['category'] ?? [];
            $type_value = $facility_data['type'] ?? '';
            $type_label = ($type_value !== '') ? ($type_choices[$type_value] ?? $type_value) : '';

            $area = $facility_data['area'] ?? '';
            $station = $facility_data['station'] ?? '';
            $station = trim((string)$station);

            $commitments = $facility_data['commitment'] ?? [];

            $price1 = $facility_data['price1'] ?? [];
            $availability = $price1['availability'] ?? [];
            $answer_value = $availability['availability_answer'] ?? '';
            $availability_label = ($answer_value !== '' && !empty($availability_choices))
              ? ($availability_choices[$answer_value] ?? '')
              : '';

            $availability_class = ($answer_value !== '') ? ('room-avail--' . sanitize_html_class($answer_value)) : '';
            $availability_date  = !empty($availability['availability_date']) ? esc_html($availability['availability_date']) : '';

            $move_in_fee_raw = $price1['move_in_fee'] ?? '';
            $move_in_fee_num = ($move_in_fee_raw !== '' && $move_in_fee_raw !== null) ? (int)$move_in_fee_raw : 0;

            $monthly_fee = $price1['monthly_fee'] ?? [];
            $monthly_amount = $monthly_fee['monthly_fee_amount'] ?? '';
            ?>

            <li>
              <a class="bg-white" href="<?php echo esc_url($href); ?>"
                <?php if ($target_blank && $url) : ?>target="_blank" rel="noopener noreferrer"<?php endif; ?>>

                <div class="scarchive__list-image">
                  <img src="<?php echo esc_url($img_url); ?>" alt="">
                </div>

                <div class="scarchive__list-cont">
                  <div class="scarchive__list-info">

                    <?php if (!empty($categories) && !empty($category_choices)) : ?>
                      <ul class="scarchive__list-cate txt-12-14 txt-bold">
                        <?php foreach ($categories as $value) :
                          if ($value === 'normal') continue;
                          $label = $category_choices[$value] ?? $value;
                        ?>
                          <li class="<?php echo esc_attr($value); ?>"><?php echo esc_html($label); ?></li>
                        <?php endforeach; ?>
                      </ul>
                    <?php endif; ?>

                    

                    <h3 class="scarchive__list-ttl txt-15-22 txt-bold"><?php the_title(); ?></h3>

                    <?php if ($type_label !== '') : ?>
                      <p class="scarchive__list-type txt-12-14 txt-medium"><?php echo esc_html($type_label); ?></p>
                    <?php endif; ?>

                    <?php if (!empty($area)) : ?>
                      <p class="scarchive__list-address txt-13-16 txt-medium"><?php echo esc_html($area); ?></p>
                    <?php endif; ?>

                    <?php if ($station !== '') : ?>
                      <p class="scarchive__list-station txt-12-14 txt-medium">最寄駅<br><?php echo nl2br(esc_html($station)); ?></p>
                    <?php endif; ?>

                    <?php if ($answer_value !== '' && $availability_label !== '') : ?>
                      <div class="scarchive__list-vacant"><span class="scarchive__list-vacant-title txt-13-16 txt-medium txt-black">空室状況</span>
                        <p class="scarchive__list-vacant-block <?php echo esc_attr($availability_class); ?> txt-13-16 txt-medium txt-white bg-yellow">
                          <?php echo esc_html($availability_label); ?>
                        </p>
                        <p class="scarchive__list-vacant-time txt-12-14"><?php echo $availability_date; ?></p>
                      </div>
                    <?php endif; ?>

                    <div class="scarchive__list-price">
                      <p class="scarchive__list-price-left txt-13-16 txt-medium">入居金</p>
                      <div class="scarchive__list-price-right">
                        <p class="scarchive__list-price-num txt-15-22 txt-medium">
                          <?php echo esc_html(number_format($move_in_fee_num)); ?>
                        </p>
                      </div>
                    </div>

                    <div class="scarchive__list-price">
                      <p class="scarchive__list-price-left txt-13-16 txt-medium">月額利用料</p>
                      <div class="scarchive__list-price-right">
                        <p class="scarchive__list-price-num txt-15-22 txt-medium">
                          <?php echo ($monthly_amount !== '' && $monthly_amount !== null) ? esc_html(number_format((int)$monthly_amount)) : '-'; ?>
                        </p>
                      </div>
                    </div>

                    <?php if (!empty($commitments)) : ?>
                      <ul class="scarchive__list-feature txt-10-12 txt-medium">
                        <?php foreach ($commitments as $commitment) :
                          $label = $commitment_choices[$commitment] ?? $commitment;
                        ?>
                          <li><?php echo esc_html($label); ?></li>
                        <?php endforeach; ?>
                      </ul>
                    <?php endif; ?>

                  </div>

                  <div class="scarchive__list-btn block txt-13-16 txt-bold txt-center txt-white bg-orange-gradiate-reverse">
                    この老人ホームの詳細を見る
                  </div>
                </div>

              </a>
            </li>

          <?php endwhile; ?>
        </ul>

        <?php
        $pagination = paginate_links([
          'total'   => $query->max_num_pages,
          'current' => max(1, $paged),
          'type'    => 'array',
        ]);
        ?>

        <?php if (!empty($pagination) && is_array($pagination)) : ?>
          <ul class="scarchive__pager txt-13-16 txt-medium">
            <?php foreach ($pagination as $page_link) : ?>
              <li><?php echo $page_link; ?></li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>

      <?php else : ?>
        <div class="wrap-m" style="margin-top: 20px; padding: 20px; background: #fff; border-radius: 5px; text-align: center;">
        <p>お探しの条件に一致する施設が見つかりませんでした。</p>
        <p style="margin-top: 10px;">条件を減らして再度検索をお試しください。</p>
        <a href="<?php echo home_url('/facility-list/'); ?>" class="btn-reset" style="display: inline-block; margin-top: 15px; color: #f39800; text-decoration: underline;">条件をすべてリセットする</a>
        </div>
      <?php endif; ?>

      <?php wp_reset_postdata(); ?>

    </div>


<div class="scarchive-search space-2s bg-beige">
  <div class="scarchive-feature__inner scfacility-inner__1134">
      <div class="txt-16-24 txt-bold">都道府県で老人ホームを絞り込む</div>
    <ul class="facility-list-preflinks facility-list-preflinks-bottom">
      <li>
        <a href="/facility-list/osaka/" class="txt-13-16 txt-bold lh-1_5 txt-black">大阪府の<br>老人ホーム・施設一覧</a>
      </li>
      <li>
        <a href="/facility-list/hyougo/" class="txt-13-16 txt-bold lh-1_5 txt-black">兵庫県の<br>老人ホーム・施設一覧</a>
      </li>
      <li>
        <a href="/facility-list/kyoto/" class="txt-13-16 txt-bold lh-1_5 txt-black">京都府の<br>老人ホーム・施設一覧</a>
      </li>
      <li>
        <a href="/facility-list/nara/" class="txt-13-16 txt-bold lh-1_5 txt-black">奈良県の<br>老人ホーム・施設一覧</a>
      </li>
      <li>
        <a href="/facility-list/shiga/" class="txt-13-16 txt-bold lh-1_5 txt-black">滋賀県の<br>老人ホーム・施設一覧</a>
      </li>
    </ul>
  </div>
</div>


  </section>

</main>

<script>
window.addEventListener('DOMContentLoaded', () => {
    // '.facility-item' を実際の施設カードのクラス名に変更してください
    const firstFacility = document.querySelector('.scarchive__result-ttl');

    if (firstFacility) {
        const cardTop = firstFacility.getBoundingClientRect().top + window.scrollY;
        const viewportHeight = window.innerHeight;
        const peekHeight = window.innerWidth < 768 ? 290 : 360; // スマホ80px / PC120px見せる

        const targetScrollY = cardTop - viewportHeight + peekHeight;

        window.scrollTo({
            top: Math.max(0, targetScrollY),
            behavior: 'smooth'
        });
    }
});
</script>

<?php get_footer(); ?>
