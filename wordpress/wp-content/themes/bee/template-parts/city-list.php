<?php
$fixed_meta_key   = isset($args['fixed_meta_key']) ? sanitize_key($args['fixed_meta_key']) : '';
$fixed_meta_value = isset($args['fixed_meta_value']) ? sanitize_text_field($args['fixed_meta_value']) : '';
$search_param_key = isset($args['search_param_key']) ? sanitize_key($args['search_param_key']) : 'area_osaka';

if ($fixed_meta_key === '' || $fixed_meta_value === '') {
  echo '<p class="txt-center">固定条件が未設定です（fixed_meta_key / fixed_meta_value）。</p>';
  return;
}

// フェーズ1: 検索パラメータ取得
$search_params = sc_get_facility_search_params($search_param_key);

$paged = max(
  1,
  get_query_var('paged') ? absint(get_query_var('paged')) :
  ( get_query_var('page') ? absint(get_query_var('page')) : 1 )
);

$pref_slugs = array('osaka');

// フェーズ1: meta_query構築（既存の検索条件）
$meta_query = sc_build_facility_meta_query($search_params, $search_param_key);

// 市区町村
$fixed_area_meta = array(
  'key'     => $fixed_meta_key,
  'value'   => $fixed_meta_value,
  'compare' => '='
);

if (empty($meta_query)) {
  $meta_query = array($fixed_area_meta);
} else {
  if (!isset($meta_query['relation'])) {
    $meta_query = array_merge(array('relation' => 'AND'), $meta_query);
  }
  $meta_query[] = $fixed_area_meta;
}

$args_query = array(
  'post_type'      => 'facility-list',
  'post_status'    => 'publish',
  'posts_per_page' => 60,
  'orderby'        => 'date',
  'order'          => 'DESC',
  'paged'          => $paged,
  'meta_query'     => $meta_query,
  'ignore_sticky_posts' => true,
);

$query = new WP_Query($args_query);

$category_choices = [];
$type_choices = [];
$commitment_choices = [];
$availability_choices = [];

// クエリに投稿があれば、最初の投稿からACFフィールド定義を取得
if ($query->have_posts()) {
  $first_post_id = $query->posts[0]->ID;

  $field_category = function_exists('get_field_object') ? get_field_object('category', $first_post_id) : null;
  $category_choices = (!empty($field_category['choices']) && is_array($field_category['choices'])) ? $field_category['choices'] : [];

  $field_type = function_exists('get_field_object') ? get_field_object('type', $first_post_id) : null;
  $type_choices = (!empty($field_type['choices']) && is_array($field_type['choices'])) ? $field_type['choices'] : [];

  $field_commitment = function_exists('get_field_object') ? get_field_object('commitment', $first_post_id) : null;
  $commitment_choices = (!empty($field_commitment['choices']) && is_array($field_commitment['choices'])) ? $field_commitment['choices'] : [];

  $field_price1 = function_exists('get_field_object') ? get_field_object('price1', $first_post_id) : null;
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

function fl_term_path_slugs($term) {
  if (!$term || is_wp_error($term)) return '';
  $slugs = array(sanitize_title($term->slug));
  $anc = get_ancestors($term->term_id, 'facilitys_category', 'taxonomy');
  if ($anc) {
    foreach ($anc as $aid) {
      $t = get_term($aid, 'facilitys_category');
      if ($t && !is_wp_error($t)) $slugs[] = sanitize_title($t->slug);
    }
  }
  $slugs = array_reverse($slugs);
  return implode('/', $slugs);
}
?>

<section class="scarchive space-2s space-s-bottom bg-beige">
  <div class="scarchive__wrap wrap-m">

    <div class="scarchive__result">
      <?php
        // 1. ページタイトル（H1と同じ内容）を取得（例：「大阪府堺市の老人ホーム・介護施設の一覧」）
        $page_title = get_the_title();
        
        // 2. 削除したい文字列を配列で指定（後ろのテキストと、都道府県名）
        $remove_words = array(
            'の老人ホーム・介護施設の一覧', 
            'の老人ホーム・介護施設一覧', 
            'の老人ホーム・介護施設',
            '大阪府', '兵庫県', '京都府', '奈良県', '滋賀県' // 都道府県名も消す場合
        );
        
        // 3. 該当の文字列を空文字に置換し、純粋な市区町村名（例：「堺市」）だけを抽出
        $city_name = str_replace($remove_words, '', $page_title);
      ?>
      <h2 class="scarchive__result-ttl txt-18-28 txt-bold scfacility__left-border-ttl">
        <?php echo esc_html($city_name); ?>にあるスーパー・コートの老人ホーム一覧（空室状況・費用）
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

        $img_facility = $facility_data['img_facility'] ?? '';
        $img_main     = $facility_data['img_main'] ?? '';
        $default_img  = get_template_directory_uri() . '/assets/image/scfacility/facility_thumb_none.webp';
        $img_url      = '';

        if (!empty($img_facility)) {
          if (is_array($img_facility) && !empty($img_facility['url'])) {
            $img_url = $img_facility['url'];
          } elseif (is_numeric($img_facility)) {
            $img_url = wp_get_attachment_image_url($img_facility, 'full');
          } else {
            $img_url = (string)$img_facility;
          }
        } elseif (!empty($img_main)) {
          if (is_array($img_main) && !empty($img_main['url'])) {
            $img_url = $img_main['url'];
          } elseif (is_numeric($img_main)) {
            $img_url = wp_get_attachment_image_url($img_main, 'full');
          } else {
            $img_url = (string)$img_main;
          }
        }

        if (empty($img_url)) {
          $img_url = $default_img;
        }

        $category_values = $facility_data['category'] ?? [];
        if (!empty($category_values) && !is_array($category_values)) {
          $category_values = array($category_values);
        }

        $type_value = $facility_data['type'] ?? '';
        $type_label = ($type_value !== '') ? ($type_choices[$type_value] ?? $type_value) : '';

        $area = $facility_data['area'] ?? '';
        $station = trim((string)($facility_data['station'] ?? ''));

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
        $m = $monthly_fee['monthly_fee_amount'] ?? '';

        $commitments = $facility_data['commitment'] ?? [];
        if (!empty($commitments) && !is_array($commitments)) {
          $commitments = array($commitments);
        }
      ?>
      <li>
        <a class="bg-white" href="<?php echo esc_url($href); ?>" <?php if ($target_blank && $url) : ?>target="_blank" rel="noopener noreferrer"<?php endif; ?>>

          <div class="scarchive__list-image">
            <img src="<?php echo esc_url($img_url); ?>" alt="">
          </div>

          <div class="scarchive__list-cont">
            <div class="scarchive__list-info">

            <?php if (!empty($category_values) && !empty($category_choices)) : ?>
              <ul class="scarchive__list-cate txt-12-14 txt-bold">
                <?php foreach ($category_values as $v) :
                  if ($v === 'normal') continue;
                  $label = $category_choices[$v] ?? $v;
                ?>
                  <li class="<?php echo esc_attr($v); ?>">
                    <?php echo esc_html($label); ?>
                  </li>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>

            <?php if ($type_label !== '') : ?>
              <p class="scarchive__list-type txt-12-14 txt-medium">
                <?php echo esc_html($type_label); ?>
              </p>
            <?php endif; ?>

              <h3 class="scarchive__list-ttl txt-15-22 txt-bold"><?php the_title(); ?></h3>

              <?php if (!empty($area)) : ?>
                <p class="scarchive__list-address txt-13-16 txt-medium"><?php echo esc_html($area); ?></p>
              <?php endif; ?>

              <?php if ($station !== '') : ?>
                <p class="scarchive__list-station txt-12-14 txt-medium">最寄駅<br><?php echo nl2br(esc_html($station)); ?></p>
              <?php endif; ?>

              <?php if ($answer_value !== '') : ?>
                <div class="scarchive__list-vacant"><span class="scarchive__list-vacant-title txt-13-16 txt-medium txt-black">空室状況</span>
                  <p class="scarchive__list-vacant-block <?php echo esc_attr($availability_class); ?> txt-13-16 txt-medium txt-white bg-yellow">
                    <?php echo esc_html($availability_label !== '' ? $availability_label : $answer_value); ?>
                  </p>
                  <p class="scarchive__list-vacant-time txt-12-14">
                    <?php echo $availability_date; ?>
                  </p>
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
                    <?php echo ($m !== '') ? esc_html(number_format((int)$m)) : '-'; ?>
                  </p>
                </div>
              </div>

              <?php if (!empty($commitments)) : ?>
                <ul class="scarchive__list-feature txt-10-12 txt-medium">
                  <?php foreach ($commitments as $c) :
                    $label = $commitment_choices[$c] ?? $c;
                  ?>
                    <li><?php echo esc_html($label); ?></li>
                  <?php endforeach; ?>
                </ul>
              <?php endif; ?>

            </div>
            <div class="scarchive__list-btn block txt-13-16 txt-bold txt-center txt-white bg-orange-gradiate-reverse">
              この施設の詳細を見る
            </div>
          </div>
        </a>
      </li>
      <?php endwhile; ?>
    </ul>

    <?php
    // ページネーション
    $pagination = paginate_links(array(
      'total'   => $query->max_num_pages,
      'current' => max(1, $paged),
      'type'    => 'array',
      'add_args' => array_filter(array(
        'entry_min'   => $search_params['entry_min'],
        'entry_max'   => $search_params['entry_max'],
        'month_min'   => $search_params['month_min'],
        'month_max'   => $search_params['month_max'],
        'ukeire'      => !empty($search_params['ukeire']) ? implode(',', $search_params['ukeire']) : '',
        'category'    => !empty($search_params['category']) ? implode(',', $search_params['category']) : '',
        $search_param_key  => !empty($search_params['area']) ? implode(',', $search_params['area']) : '',
      )),
    ));
    if (!empty($pagination) && is_array($pagination)) : ?>
    <ul class="scarchive__pager txt-13-16 txt-medium">
      <?php foreach ($pagination as $page_link) : ?>
      <li><?php echo $page_link; ?></li>
      <?php endforeach; ?>
    </ul>
    <?php endif; ?>

    <?php else : ?>
      <p class="txt-center">該当する施設が見つかりませんでした。<br>条件を少しゆるめて再度ご検索ください。</p>
    <?php endif; ?>

    <?php wp_reset_postdata(); ?>

  </div>
</section>
