<?php get_header(); ?>

<?php
// フェーズ1: 検索パラメータ取得
$search_params = sc_get_facility_search_params('area_kyoto');

$paged = max(
  1,
  get_query_var('paged') ? absint(get_query_var('paged')) :
  ( get_query_var('page') ? absint(get_query_var('page')) : 1 )
);

$pref_slugs = array('kyoto');

// フェーズ1: meta_query構築
$meta_query = sc_build_facility_meta_query($search_params, 'area_kyoto');

$args = array(
  'post_type'      => 'facility-list',
  'posts_per_page' => 60,
  'order'          => 'DESC',
  'paged'          => $paged,
  'tax_query'      => array(
    array(
      'taxonomy'         => 'facilitys_category',
      'field'            => 'slug',
      'terms'            => $pref_slugs,
      'operator'         => 'IN',
      'include_children' => true,
    ),
  ),
);

if (!empty($meta_query)) {
  $args['meta_query'] = $meta_query;
}

$query = new WP_Query($args);

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

<main id="facility">

  <div class="lower-mv">
    <figure class="lower-mv-image">
      <img src="<?php bloginfo('template_directory');?>/assets/image/facility/mv.jpg"  alt="京都の老人ホームならスーパー・コート" class="skip-lazy">
    </figure>
    <div class="ttl-lower-wrap">
      <p class="ttl-lower-up ttl-en-2l txt-white en-upper txt-bold">facility</p>
      <h1 class="ttl-lower txt-white bg-black"><span class="ib">京都の老人ホーム・介護施設一覧</span></h1>
    </div>
  </div>

<div class="breadcrumbs-container">
<ul class="scfacility-breadcrumbs txt-12-14 txt-medium">
    <li>
        <a href="/">TOP</a>
    </li>
    <li>
        <a href="/facility-list/">老人ホーム・介護施設一覧</a>
    </li>

    <?php
    global $post;
    // 1. 親ページを遡る（都道府県の親＝施設一覧）
    $ancestors = get_post_ancestors($post->ID);
    $ancestors = array_reverse($ancestors);

    foreach ($ancestors as $ancestor_id) :
        $ancestor_post = get_post($ancestor_id);
        
        // 「facility-list（施設一覧）」は既に上で手動出力しているのでスキップ
        if ($ancestor_post->post_name === 'facility-list') continue;
    ?>
    <li>
        <a href="<?php echo esc_url(get_permalink($ancestor_id)); ?>"><?php echo esc_html(get_the_title($ancestor_id)); ?></a>
    </li>
    <?php endforeach; ?>

    <li>
        <span><?php the_title(); ?></span>
    </li>
</ul>
</div>

  <?php
  // フェーズ1: 検索フォームコンポーネント化
  get_template_part('template-parts/facility-search-form', null, array(
    'form_action'         => get_permalink(),
    'pref_slug'           => 'kyoto',
    'selected_areas'      => $search_params['area'],
    'selected_categories' => $search_params['category'],
    'selected_ukeire'     => $search_params['ukeire'],
    'entry_min'           => $search_params['entry_min'],
    'entry_max'           => $search_params['entry_max'],
    'month_min'           => $search_params['month_min'],
    'month_max'           => $search_params['month_max'],
    'area_field_name'     => 'area_kyoto',
    'area_label'          => '市区町村（京都）',
  ));
  ?>

  <section class="scarchive space-s space-m-bottom bg-beige">
    <div class="scarchive__wrap wrap-m">

<div class="scarchive__result">
  <h2 class="scarchive__result-ttl txt-18-28 txt-bold scfacility__left-border-ttl">
    <?php
    $hit_count = $query->found_posts;

    // 1. スラッグから日本語ラベルへの変換マッピング
    $ukeire_labels = [
        'independent' => '自立', 'support' => '要支援', 'care' => '要介護',
        'dementia' => '認知症', 'parkinson' => 'パーキンソン病', 'hours_24' => '24時間看護',
    ];
    $cat_labels = [
        'parkinson' => 'パーキンソン病専門', 'nursing' => 'ナーシングホーム',
        'premium' => 'プレミアムシリーズ', 'prime' => 'プライムシリーズ', 'normal' => '一般施設','olive'    => 'オリーブ',
        'supercourt'    => 'スーパー・コート',
    ];

    // 市区町村のマッピング（functions.phpのリストに基づく）
    $area_labels = [
        'kyotocity' => '京都市', 'ujicity' => '宇治市'
    ];

    $filter_display = [];

    // 都道府県（タクソノミー）
    if (is_tax('facilitys_category')) {
        $qo = get_queried_object();
        $filter_display[] = $qo->name;
    }

    // 2. 市区町村のチェックを反映
    $target_area_keys = ['area_osaka', 'area_hyougo', 'area_kyoto', 'area_nara', 'area_shiga'];
    foreach ($target_area_keys as $key) {
        if (!empty($_GET[$key]) && is_array($_GET[$key])) {
            foreach ($_GET[$key] as $val) {
                if (isset($area_labels[$val])) {
                    $filter_display[] = $area_labels[$val];
                }
            }
        }
    }

    // 受け入れ対象
    if (!empty($search_params['ukeire'])) {
        foreach ($search_params['ukeire'] as $val) {
            $filter_display[] = $ukeire_labels[$val] ?? $val;
        }
    }

    // 施設カテゴリ
    if (!empty($search_params['category'])) {
        foreach ($search_params['category'] as $val) {
            $filter_display[] = $cat_labels[$val] ?? $val;
        }
    }

    // 金額（月額）
    if (!empty($search_params['month_min']) || !empty($search_params['month_max'])) {
        $price_text = '月額';
        if ($search_params['month_min']) $price_text .= number_format($search_params['month_min'] / 10000) . '万円〜';
        if ($search_params['month_max']) $price_text .= number_format($search_params['month_max'] / 10000) . '万円以下';
        $filter_display[] = $price_text;
    }

    // 3. タイトルの出力
    if (!empty($filter_display)) {
        echo '京都府の「<span class="txt-orange">' . esc_html(implode('・', $filter_display)) . '</span>」の老人ホーム・介護施設';
    } else {
        the_title();
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

              

                <h3 class="scarchive__list-ttl txt-15-22 txt-bold"><?php the_title(); ?></h3>

                <?php if ($type_label !== '') : ?>
                <p class="scarchive__list-type txt-12-14 txt-medium">
                  <?php echo esc_html($type_label); ?>
                </p>
              <?php endif; ?>

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
                <?php the_title(); ?>の詳細を見る
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
          'area_kyoto'  => !empty($search_params['area']) ? implode(',', $search_params['area']) : '',
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
        <div class="wrap-m" style="margin-top: 20px; padding: 20px; background: #fff; border-radius: 5px; text-align: center;">
        <p>お探しの条件に一致する施設が見つかりませんでした。</p>
        <p style="margin-top: 10px;">条件を減らして再度検索をお試しください。</p>
        <a href="<?php echo home_url('/facility-list/'); ?>" class="btn-reset" style="display: inline-block; margin-top: 15px; color: #f39800; text-decoration: underline;">条件をすべてリセットする</a>
        </div>
      <?php endif; ?>

      <?php wp_reset_postdata(); ?>

    </div>
  </section>

   <section class="scarchive-feature space-s space-s-bottom">
    <div class="scarchive-feature__area scarchive-feature__wrap maw-1370 bg-white space-3s space-3s-bottom">
      <div class="scarchive-feature__inner scfacility-inner__1134">
        <div class="scfacility__bottom-border-ttl">
          <h2 class="txt-18-28 txt-bold">京都府の各市区町村から老人ホーム・介護施設を絞り込む</h2>
        </div>
        <ul class="scarea__list">
          <li>
            <a href="/facility-list/kyoto/kyotocity">
              <div class="scarea__list-image">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/image/scfacility/olive_kyonishikyogoku.webp" alt="エリア施設">
              </div>
              <div class="scarea__list-info">
                <h3 class="scarea__list-ttl scfacility__left-border-ttl txt-bold lh-1_5">京都市</h3>
                <p class="scarea__list-txt txt-13-16 lh-1_5">千年の歴史と文化が息づく日本を代表する古都「京都市」。四季折々の風情を感じられる寺社仏閣が身近にあり、落ち着きと賑わいが調和する街です。</p>
                <div class="scarea__list-btn txt-12-14 txt-bold lh-1_5 txt-white bg-orange-gradiate-reverse">京都市の老人ホーム・介護施設一覧</div>
              </div>
            </a>
          </li>
          <li>
            <a href="/facility-list/kyoto/ujicity">
              <div class="scarea__list-image">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/image/scfacility/uji-gallery1.webp" alt="エリア施設">
              </div>
              <div class="scarea__list-info">
                <h3 class="scarea__list-ttl scfacility__left-border-ttl txt-bold lh-1_5">宇治市</h3>
                <p class="scarea__list-txt txt-13-16 lh-1_5">世界遺産・平等院や宇治茶で有名な歴史都市「宇治市」。宇治川の美しい流れと緑豊かな景観の中で、ゆったりとした時間が流れます。</p>
                <div class="scarea__list-btn txt-12-14 txt-bold lh-1_5 txt-white bg-orange-gradiate-reverse">宇治市の老人ホーム・介護施設一覧</div>
              </div>
            </a>
          </li>
        </ul>
      </div>
    </div>

<div class="scarchive-search">
  <div class="scarchive-feature__inner scfacility-inner__1134">
      <div class="txt-16-24 txt-bold">都道府県から老人ホーム・介護施設を絞り込む</div>
    <ul class="facility-list-preflinks facility-list-preflinks-bottom">
      <li>
        <a href="/facility-list/osaka/" class="txt-13-16 txt-bold lh-1_5 txt-black">大阪府の<br>老人ホーム・介護施設一覧</a>
      </li>
      <li>
        <a href="/facility-list/hyougo/" class="txt-13-16 txt-bold lh-1_5 txt-black">兵庫県の<br>老人ホーム・介護施設一覧</a>
      </li>
      <li>
        <a href="/facility-list/kyoto/" class="txt-13-16 txt-bold lh-1_5 txt-black">京都府の<br>老人ホーム・介護施設一覧</a>
      </li>
      <li>
        <a href="/facility-list/nara/" class="txt-13-16 txt-bold lh-1_5 txt-black">奈良県の<br>老人ホーム・介護施設一覧</a>
      </li>
      <li>
        <a href="/facility-list/shiga/" class="txt-13-16 txt-bold lh-1_5 txt-black">滋賀県の<br>老人ホーム・介護施設一覧</a>
      </li>
    </ul>
  </div>
</div>

  </section>

<section class="scarchive-feature bg-beige space-m space-s-bottom">
  <div class="scarchive-feature__point scarchive-feature__wrap maw-1370 bg-white space-1 space-3s-bottom">
    <div class="scfacility-ttl scfacility-ttl--overlap txt-center">
      <span class="scfacility-ttl__en block txt-bold en-upper lh-1_25">local home guide</span>
      <h2 class="scfacility-ttl__jp txt-20-32 txt-bold txt-orange">京都府の老人ホーム・介護施設の特徴</h2>
    </div>
      <div class="scarchive-feature__inner scfacility-inner__1134 space-3s lh-1_75">
        <ul class="scarchive-feature__point-list">
          <li>
            <div class="scarchive-feature__point-image">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/image/scfacility/scarchive_point01_kyoto.webp" alt="伝統と利便性の共存する京都府のエリア別・施設動向">
            </div>
            <div class="scarchive-feature__point-box">
              <h3 class="scarchive-feature__point-ttl scfacility__left-border-ttl txt-15-22 txt-bold">伝統と利便性の共存する京都府のエリア別・施設動向</h3>
              <p class="scarchive-feature__point-txt mb1">京都府内での施設探しは、大きく分けて「京都市内（洛中・周辺）」と「乙訓・山城（南部）」「中丹・丹後（北部）」で、その性質が劇的に異なります。</p>
              <dl class="mb1">
                <dt>京都市内エリア（北区・左京区・中京区など）</dt>
                <dd>歴史的建造物や景観条例の影響もあり、大規模な新築が難しいエリアです。そのため、既存の建物を活かしたアットホームな施設や、ホテルのようなホスピタリティを重視した高級志向の施設に人気が集中しています。</dd>
              </dl>
              <dl class="mb1">
                <dt>京都南部エリア（宇治市・城陽市・木津川市など）</dt>
                <dd>大阪・奈良へのアクセスも良く、比較的広々とした敷地を持つ住宅型有料老人ホームやサ高住が増加しています。</dd>
              </dl>
              <dl class="mb1">
                <dt>京都北部エリア</dt>
                <dd>公的な特別養護老人ホームが中心ですが、民間施設の供給が限られているため、早めの情報収集が不可欠な地域です。</dd>
              </dl>
              <dl class="mb1 bg-beige p1">
                <dt>スーパー・コートの視点</dt>
                <dd>京都の風情を大切にするご入居者様のために、私たちは「接遇（おもてなし）」を最優先に考えています。京都らしい落ち着いた環境の中で、ホテルクオリティのサービスを提供することが私たちのこだわりです。</dd>
              </dl>
            </div>
          </li>
          <li>
            <div class="scarchive-feature__point-image">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/image/scfacility/scarchive_point03.webp" alt="人口動態から見る京都の未来｜学生の街が直面する高齢化">
            </div>
            <div class="scarchive-feature__point-box">
              <h3 class="scarchive-feature__point-ttl scfacility__left-border-ttl txt-15-22 txt-bold">人口動態から見る京都の未来｜学生の街が直面する高齢化</h3>
              <p class="scarchive-feature__point-txt mb1">京都府は「学生の街」として知られ、若年層の流入が多い一方で、卒業後の転出による人口流出と、定住者の高齢化という課題を抱えています。</p>
              <p class="scarchive-feature__point-txt">京都府では、定住人口が減少しても経済を維持できるよう、観光と介護が連携した「交流人口の拡大」にも力を入れています。これは、施設においても「ご家族が観光ついでに面会に来やすい」という京都ならではのメリットに繋がっています。</p>
            </div>
          </li>
          <li>
            <div class="scarchive-feature__point-image">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/image/scfacility/scarchive_point04.webp" alt="京都府の要介護認定の現状と「在宅・施設」の選択">
            </div>
            <div class="scarchive-feature__point-box">
              <h3 class="scarchive-feature__point-ttl scfacility__left-border-ttl txt-15-22 txt-bold">京都府の要介護認定の現状と「在宅・施設」の選択</h3>
              <p class="scarchive-feature__point-txt mb1">京都府の要介護認定率は全国平均をわずかに上回る水準（約21.8%）で推移しています。特筆すべきは、「訪問看護」や「小規模多機能型居宅介護」の需要が非常に高い点です。</p>
              <p class="scarchive-feature__point-txt">これは「最期まで住み慣れた京都で過ごしたい」という意向の表れでもあります。しかし、在宅介護の限界を感じてから施設を探し始めるケースが多く、京都市内の人気施設では待機期間が発生することもあります。</p>
            </div>
          </li>
          <li>
            <div class="scarchive-feature__point-image">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/image/scfacility/scarchive_point06_kyoto.webp" alt="京都府独自の介護予防「きょうと健康長寿日本一プラン」">
            </div>
            <div class="scarchive-feature__point-box">
              <h3 class="scarchive-feature__point-ttl scfacility__left-border-ttl txt-15-22 txt-bold">京都府独自の介護予防「きょうと健康長寿日本一プラン」</h3>
              <p class="scarchive-feature__point-txt mb1">京都府では、健康寿命を延ばすための独自の指針「きょうと健康長寿日本一プラン」を推進しています。</p>
              <dl class="mb1">
                <dt>がん対策の徹底</dt>
                <dd>早期発見・治療のためのネットワーク構築。</dd>
              </dl>
              <dl class="mb1">
                <dt>フレイル（虚弱）予防</dt>
                <dd>地域の「地域介護予防推進センター」を中心とした、口腔ケアや運動指導の実施。</dd>
              </dl>
              <p class="mb1 bg-beige p1">スーパー・コートでは、この府の方針に呼応し、「自立支援」を軸としたケアを行っています。ただ介護をするのではなく、ご自身でできることを増やし、再び京都の街を散策できるような身体機能の維持をサポートしています。</p>
            </div>
          </li>
          <li>
            <div class="scarchive-feature__point-image">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/image/scfacility/scarchive_point05_kyoto.webp" alt="認知症ケアの先進モデル「京都式オレンジプラン」">
            </div>
            <div class="scarchive-feature__point-box">
              <h3 class="scarchive-feature__point-ttl scfacility__left-border-ttl txt-15-22 txt-bold">認知症ケアの先進モデル「京都式オレンジプラン」</h3>
              <p class="scarchive-feature__point-txt mb1">認知症になっても安心して暮らせる街づくりを目指す「京都式オレンジプラン」は、全国的にも注目されています。</p>
              <dl class="mb1">
                <dt>認知症初期集中支援チーム</dt>
                <dd>早期の診断と介入をサポート。</dd>
              </dl>
              <dl class="mb1">
                <dt>あんしん病院</dt>
                <dd>在宅療養中に体調を崩した際、一時的に入院を受け入れるバックアップ体制。</dd>
              </dl>
              <dl class="mb1 bg-beige p1">
                <dt>スーパー・コートの強み</dt>
                <dd>私たちは認知症ケアの専門知識を持つスタッフを配置し、ご入居者様の不安に寄り添う「認知症専門フロア」を備えた施設も展開しています。京都の地域包括ケアシステムと連携し、医療と介護の切れ目ないサービスを提供します。</dd>
              </dl>
            </div>
          </li>
          <li>
            <div class="scarchive-feature__point-image">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/image/scfacility/scarchive_point02_kyoto.webp" alt="京都府で納得の介護施設選びのために運営適正化委員会">
            </div>
            <div class="scarchive-feature__point-box">
              <h3 class="scarchive-feature__point-ttl scfacility__left-border-ttl txt-15-22 txt-bold">京都府で納得の介護施設選びのために運営適正化委員会</h3>
              <p class="scarchive-feature__point-txt mb1">万が一、施設サービスに対して「説明と違う」「スタッフの対応に不安がある」と感じた場合、京都府には強力な相談窓口が存在します。</p>
              <dl class="mb1">
                <dt>京都府社会福祉協議会「運営適正化委員会」</dt>
                <dd>第三者の専門家が中立な立場で苦情を解決します。</dd>
              </dl>
              <dl class="mb1">
                <dt>地域包括支援センター</dt>
                <dd>京都市内には各学区ごとに設置されており、身近な相談が可能です。</dd>
              </dl>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </section>

  <section class="scarchive-strength space-m bg-white">
    <div class="scarchive-strength__wrap wrap-m">
      <div class="scfacility-ttl txt-center">
        <span class="scfacility-ttl__en block txt-bold en-upper lh-1_25">strength</span>
        <h2 class="scfacility-ttl__jp txt-20-32 txt-bold txt-orange">スーパー・コートの強み</h2>
      </div>
      <ul class="scarchive-strength__list">
        <li>
          <div class="scarchive-strength__list-image">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/image/scfacility/scarchive_strength01.webp" alt="全施設直営">
          </div>
          <h3 class="scarchive-strength__list-ttl scfacility__bottom-border-ttl txt-15-20 txt-bold txt-center lh-1_3">全施設直営</h3>
        </li>
        <li>
          <div class="scarchive-strength__list-image">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/image/scfacility/scarchive_strength02.webp" alt="天然温泉">
          </div>
          <h3 class="scarchive-strength__list-ttl scfacility__bottom-border-ttl txt-15-20 txt-bold txt-center lh-1_3">天然温泉</h3>
        </li>
        <li>
          <div class="scarchive-strength__list-image">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/image/scfacility/scarchive_strength03.webp" alt="パーキンソン病専門ケア">
          </div>
          <h3 class="scarchive-strength__list-ttl scfacility__bottom-border-ttl txt-15-20 txt-bold txt-center lh-1_3">パーキンソン病専門ケア</h3>
        </li>
      </ul>
      <ul class="scarchive-strength__list">
        <li>
          <div class="scarchive-strength__list-image">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/image/scfacility/scarchive_strength04.webp" alt="24時間の看護体制">
          </div>
          <h3 class="scarchive-strength__list-ttl scfacility__bottom-border-ttl txt-15-20 txt-bold txt-center lh-1_3">24時間の看護体制</h3>
        </li>
        <li>
          <div class="scarchive-strength__list-image">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/image/scfacility/scarchive_strength05.webp" alt="充実のリハビリ">
          </div>
          <h3 class="scarchive-strength__list-ttl scfacility__bottom-border-ttl txt-15-20 txt-bold txt-center lh-1_3">充実のリハビリ</h3>
        </li>
        <li>
          <div class="scarchive-strength__list-image">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/image/scfacility/scarchive_strength06.webp" alt="ごちそうメニュー">
          </div>
          <h3 class="scarchive-strength__list-ttl scfacility__bottom-border-ttl txt-15-20 txt-bold txt-center lh-1_3">ごちそうメニュー</h3>
        </li>
      </ul>
    </div>
  </section>

  <section class="scarchive-reason space-m space-m-bottom bg-white">
    <div class="scarchive-reason__wrap wrap-m maw-960">
      <div class="scfacility-ttl txt-center">
        <span class="scfacility-ttl__en block txt-bold en-upper lh-1_25">reason</span>
        <h2 class="scfacility-ttl__jp txt-20-32 txt-bold txt-orange">スーパー・コートが京都府で<br class="sp-only">選ばれる理由</h2>
      </div>
      <ul class="scarchive-reason__list lh-1_75">
        <li>
          <div class="scarchive-reason__list-left">
            <p class="scarchive-reason__list-subttl txt-12-14 txt-bold txt-orange">理由01</p>
            <h3 class="scarchive-reason__list-ttl txt-16-24 txt-bold scfacility__bottom-border-ttl">全60施設直営ならではの<br>「安心」と「上質なサービス」</h3>
            <p class="scarchive-reason__list-txt txt-just">関西エリアを中心に全60施設をすべて直営で運営。きめ細やかで温かい「おもてなしの精神」で、スタッフ全員がお客様の声を大切に「日常の感動を追求」、どの施設でも質の高い介護と心地よいサービスを提供できるよう、「ご家族のような安心」が感じられるチームケアをお届けしています。</p>
          </div>
          <div class="scarchive-reason__list-image">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/image/scfacility/scarchive_reason01.webp" alt="理由01">
          </div>
        </li>
        <li>
          <div class="scarchive-reason__list-left">
            <p class="scarchive-reason__list-subttl txt-12-14 txt-bold txt-orange">理由02</p>
            <h3 class="scarchive-reason__list-ttl txt-16-24 txt-bold scfacility__bottom-border-ttl">お身体の状態に合わせた<br>「専門的なケア」と「充実の医療連携」</h3>
            <p class="scarchive-reason__list-txt txt-just">28拠点のパーキンソン病などの専門的なケア実績に基づいた、確かな介護力・看護力があります。理学療法士によるリハビリや、夜間も安心の看護体制、医師による定期往診など、医療と介護がスムーズに連携。お薬の管理から日々の健康相談、専門的な医療処置が必要になった場合まで、お身体の状態に合わせて柔軟にサポートします。</p>
          </div>
          <div class="scarchive-reason__list-image">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/image/scfacility/scarchive_reason02.webp" alt="理由02">
          </div>
        </li>
        <li>
          <div class="scarchive-reason__list-left">
            <p class="scarchive-reason__list-subttl txt-12-14 txt-bold txt-orange">理由03</p>
            <h3 class="scarchive-reason__list-ttl txt-16-24 txt-bold scfacility__bottom-border-ttl">心豊かな毎日を送るための<br>「快適な住環境」と「彩りある生活」</h3>
            <p class="scarchive-reason__list-txt txt-just"> 「施設に入っても楽しみを諦めないでほしい」。そんな想いから、多くの施設で本物の「天然温泉」を導入しています。さらに、季節感あふれる美味しいお食事や、日々のレクリエーション、エンタメイベントも充実。心も体もリラックスできる環境で、笑顔あふれる彩り豊かな毎日をお過ごしいただけます。</p>
          </div>
          <div class="scarchive-reason__list-image">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/image/scfacility/scarchive_reason03.webp" alt="理由03">
          </div>
        </li>
      </ul>
    </div>
  </section>

  <section class="scarchive-match bg-beige space-m space-s-bottom">
    <div class="scarchive-match__wrap wrap-m">
      <ul class="scarchive-match__list">
        <li class="bg-white space-1">
          <div class="scfacility-ttl scfacility-ttl--overlap txt-center">
            <span class="scfacility-ttl__en block txt-bold en-upper lh-1_25">Your Best Match</span>
            <h2 class="scfacility-ttl__jp txt-20-32 txt-bold txt-orange">あなたにピッタリの<br>スーパー・コートの京都府の施設</h2>
          </div>
          <div class="scarchive-match__list-inner scfacility-inner__960 lh-1_75">
            <div class="scarchive-match__list-cont scarchive-match__list-head">
              <div class="scarchive-match__list-left">
                <h3 class="scarchive-match__list-ttl txt-16-24 txt-bold scfacility__bottom-border-ttl">住宅型有料老人ホーム</h3>
                <div class="scarchive-match__list-box">
                  <h4 class="scarchive-match__list-subttl txt-bold">特徴</h4>
                  <p class="scarchive-match__list-txt txt-13-16 txt-just">生活支援（食事・見守り等）に加え、個別のケアプランに応じて「訪問介護」や「訪問看護」の事業所を自由に組み合わせて利用できる住まいです。外部のプロフェッショナルがマンツーマンでケアを行うため、お一人おひとりの状態に合わせたきめ細やかな対応が可能です。 スーパー・コートでは、医療・介護事業所との密な連携により、要介護度の高い方や医療依存度の高い方でも、介護付きホームと遜色ない手厚いケアを受けていただけます。</p>
                </div>
              </div>
              <div class="scarchive-match__list-right">
                <div class="scarchive-match__list-image">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/image/scfacility/scarchive_match_jutaku.webp" alt="住宅型有料老人ホーム">
                </div>
              </div>
            </div>
            <div class="scarchive-match__list-cont">
              <div class="scarchive-match__list-left">
                <div class="scarchive-match__list-box">
                  <h4 class="scarchive-match__list-subttl txt-bold">メリット</h4>
                  <ul class="scarchive-match__list-point txt-13-16 lh-1_45">
                    <li>ご自身の状態に合わせてサービスを選べるため、無駄がなく納得感があります。</li>
                    <li>訪問介護・看護を利用することで、入浴やケアの時間、スタッフを独占してゆったりとケアが受けられます。</li>
                    <li>将来、介護度が上がっても、ケアプランの見直しでサービスを増やせるため、長く安心して住み続けられます。</li>
                  </ul>
                </div>
              </div>
              <div class="scarchive-match__list-right">
                <div class="scarchive-match__list-box">
                  <h4 class="scarchive-match__list-subttl txt-bold">こんな方に向いています</h4>
                  <ul class="scarchive-match__list-point txt-13-16 lh-1_45">
                    <li>自分らしいペースや生活スタイルを大切にしたい方</li>
                    <li>「集団的なケア」よりも「個別の手厚いケア」を望まれる方</li>
                    <li>将来の変化に備えつつ、現在の要介護度に応じた生活を楽しみたい方</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li class="bg-white">
          <div class="scarchive-match__list-inner scfacility-inner__960 lh-1_75">
            <div class="scarchive-match__list-cont scarchive-match__list-head">
              <div class="scarchive-match__list-left">
                <h3 class="scarchive-match__list-ttl txt-16-24 txt-bold scfacility__bottom-border-ttl">介護付き有料老人ホーム<br>（特定施設入居者生活介護）</h3>
                <div class="scarchive-match__list-box">
                  <h4 class="scarchive-match__list-subttl txt-bold">特徴</h4>
                  <p class="scarchive-match__list-txt txt-13-16 txt-just">24時間常駐の施設スタッフによる「介護保険内（定額）の包括的なケア」をベースに、さらに手厚いサポート体制を整えた住まいです。 スーパー・コートの介護付きホームは、単に定額で介護を受けるだけでなく、必要に応じて「医療保険」を活用し、外部の専門医による訪問診療や、理学療法士等による個別リハビリテーションを受けることが可能です。これにより、パーキンソン病などの難病の方や、濃厚な医療処置が必要な方にも高度なケアを提供します。</p>
                </div>
              </div>
              <div class="scarchive-match__list-right">
                <div class="scarchive-match__list-image">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/image/scfacility/scarchive_match_kaigotsuki.webp" alt="介護付き有料老人ホーム">
                </div>
              </div>
            </div>
            <div class="scarchive-match__list-cont">
              <div class="scarchive-match__list-left">
                <div class="scarchive-match__list-box">
                  <h4 class="scarchive-match__list-subttl txt-bold">メリット</h4>
                  <ul class="scarchive-match__list-point txt-13-16 lh-1_45">
                    <li>介護費用の見通しが立つ「定額制」でありながら、外部連携により個別リハビリなどの専門ケアも受けられます。</li>
                    <li>夜間も含め常にケアスタッフが配置され、緊急時の対応や頻繁な見守りもスムーズです。</li>
                    <li>協力医療機関との連携が深く、通院が困難な方でも往診等の医療サービスを施設内で受けられます。</li>
                  </ul>
                </div>
              </div>
              <div class="scarchive-match__list-right">
                <div class="scarchive-match__list-box">
                  <h4 class="scarchive-match__list-subttl txt-bold">こんな方に向いています</h4>
                  <ul class="scarchive-match__list-point txt-13-16 lh-1_45">
                    <li>介護費用の負担を一定に抑えつつ、専門的な医療・リハビリも受けたい方</li>
                    <li>24時間いつでもスタッフがそばにいる環境で、不安なく過ごしたい方</li>
                    <li>パーキンソン病などで、日常的な介護と専門的な治療の両立が必要な方</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li class="bg-white">
          <div class="scarchive-match__list-inner scfacility-inner__960 lh-1_75">
            <div class="scarchive-match__list-cont scarchive-match__list-head">
              <div class="scarchive-match__list-left">
                <h3 class="scarchive-match__list-ttl txt-16-24 txt-bold scfacility__bottom-border-ttl"><span class="ib">パーキンソン病専門施設</span><span class="ib">（指定難病対応）</span></h3>
                <div class="scarchive-match__list-box">
                  <h4 class="scarchive-match__list-subttl txt-bold">特徴</h4>
                  <p class="scarchive-match__list-txt txt-13-16 txt-just">パーキンソン病などの神経難病の方に特化し、その症状や生活上の課題を熟知したスタッフチームが運営する住まいです。神経内科の専門医との連携、24時間看護体制、そして病状の進行予防・改善を目指す専門リハビリを一体的に提供します。住宅型・介護付きそれぞれの枠組みを超え、「難病ケアのプロフェッショナル」として、ご入居者様の生活を支えます。</p>
                </div>
              </div>
              <div class="scarchive-match__list-right">
                <div class="scarchive-match__list-image">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/image/scfacility/scarchive_match_parkinson.webp" alt="パーキンソン病専門施設（指定難病対応）">
                </div>
              </div>
            </div>
            <div class="scarchive-match__list-cont">
              <div class="scarchive-match__list-left">
                <div class="scarchive-match__list-box">
                  <h4 class="scarchive-match__list-subttl txt-bold">メリット</h4>
                  <ul class="scarchive-match__list-point txt-13-16 lh-1_45">
                    <li>「症状の日内変動」など、専門的な知識を持ったスタッフが対応します。</li>
                    <li>医療依存度が高くなっても、看護・介護・医療が連携して長期的にお支えします。</li>
                    <li>神経難病に特に重要な「薬のコントロール」「リハビリ」に対する高い専門性でケアします。</li>
                  </ul>
                </div>
              </div>
              <div class="scarchive-match__list-right">
                <div class="scarchive-match__list-box">
                  <h4 class="scarchive-match__list-subttl txt-bold">こんな方に向いています</h4>
                  <ul class="scarchive-match__list-point txt-13-16 lh-1_45">
                    <li>専門的なリハビリや服薬調整が必要な、パーキンソン病・神経難病の方</li>
                    <li>一般的な老人ホームでは対応が難しいと断られた経験がある方</li>
                    <li>家族の負担を軽減しつつ、医療・看護体制の整った場所で暮らしたい方</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li class="bg-white">
          <div class="scarchive-match__list-inner scfacility-inner__960 lh-1_75">
            <div class="scarchive-match__list-cont scarchive-match__list-head">
              <div class="scarchive-match__list-left">
                <h3 class="scarchive-match__list-ttl txt-16-24 txt-bold scfacility__bottom-border-ttl">ナーシングホーム（ホスピス型住宅）</h3>
                <div class="scarchive-match__list-box">
                  <h4 class="scarchive-match__list-subttl txt-bold">特徴</h4>
                  <p class="scarchive-match__list-txt txt-13-16 txt-just">ナーシングホームは、パーキンソン病専門施設としての機能に加え、さらに幅広い「指定難病（別表7に該当する疾患）」や「ガン末期」の方などを対象とした、医療特化型の住まいです。 24時間365日看護師が常駐し、主治医や緩和ケアチームと連携することで、より柔軟に医療処置に対応。高い専門性の安心感と、ご自宅のような自由さを兼ね備えた「ホスピス型住宅」として、最期の瞬間までその人らしい生活を尊重します。</p>
                </div>
              </div>
              <div class="scarchive-match__list-right">
                <div class="scarchive-match__list-image">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/image/scfacility/scarchive_match_nursing.webp" alt="ナーシングホーム（ホスピス型住宅）">
                </div>
              </div>
            </div>
            <div class="scarchive-match__list-cont">
              <div class="scarchive-match__list-left">
                <div class="scarchive-match__list-box">
                  <h4 class="scarchive-match__list-subttl txt-bold">メリット</h4>
                  <ul class="scarchive-match__list-point txt-13-16 lh-1_45">
                    <li>夜間も看護師がいるため、吸引・点滴・酸素療法などの医療処置が常時必要な方も安心して暮らせます。</li>
                    <li>痛みを和らげる緩和ケアや、看取り（ターミナルケア）の実績が豊富で、ご家族との大切な時間を穏やかに過ごせます。</li>
                    <li>パーキンソン病関連疾患だけでなく、ALS（筋萎縮性側索硬化症）や多系統萎縮症など、他施設では受入困難な難病の方も入居可能です。</li>
                  </ul>
                </div>
              </div>
              <div class="scarchive-match__list-right">
                <div class="scarchive-match__list-box">
                  <h4 class="scarchive-match__list-subttl txt-bold">こんな方に向いています</h4>
                  <ul class="scarchive-match__list-point txt-13-16 lh-1_45">
                    <li>別表7に該当する厚生労働大臣が定める疾病（指定難病等）をお持ちの方</li>
                    <li>ガン末期や、人工呼吸器・気管切開などで常時医療ケアが必要な方</li>
                    <li>病院ではなく、自分らしい環境で最期まで穏やかに過ごしたい方</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </section>

  <section class="scarchive-cost bg-beige space-s space-m-bottom">
    <div class="scarchive-cost__wrap wrap-m space-1 bg-white">
      <div class="scfacility-ttl scfacility-ttl--overlap txt-center">
        <span class="scfacility-ttl__en block txt-bold en-upper lh-1_25">care cost guide</span>
        <h2 class="scfacility-ttl__jp txt-20-32 txt-bold txt-orange">京都府の老人ホーム・<br class="sp-only">介護施設の<br>費用の解説</h2>
      </div>
      <div class="scarchive-cost__inner scfacility-inner__960">
        <ul class="scarchive-cost__list lh-1_75">
          <li>
            <h3 class="scarchive-cost__list-ttl scfacility__left-border-ttl lh-1_45 txt-bold">入居一時金（前払金）</h3>
            <p class="scarchive-cost__list-txt txt-13-16">入居一時金は、居室や共用設備を終身（または一定期間）利用するための権利として、入居時にお支払いいただく費用です。<br>主に施設の設備維持や運営の安定化に充てられますが、多くの施設で「償却期間」が定められており、期間内に退去された場合は、未償却分が返還される仕組み（返還金制度）が一般的です。</p>
            <p class="txt-12-14 lh-1_45 mt1">※プランによっては、入居一時金が0円の「月払い方式」を選べる施設もございます。</p>
          </li>
          <li>
            <h3 class="scarchive-cost__list-ttl scfacility__left-border-ttl lh-1_45 txt-bold">月額利用料</h3>
            <p class="scarchive-cost__list-txt txt-13-16">毎月の生活にかかる「基本料金」です。 主に以下の3つで構成されています。<br><span class="txt-medium">家賃相当額</span>：お部屋の賃料です（一時金プランの場合は減額されます）。<br><span class="txt-medium">管理費</span>：共用部の光熱費・清掃費、事務管理部門の人件費、生活支援サービス費などが含まれます。<br><span class="txt-medium">食費</span>：1日3食（＋おやつ等）の食材費と厨房管理費です。</p>
            <p class="txt-12-14 lh-1_45 mt1">※スーパー・コートでは、栄養バランスと美味しさにこだわったお食事を提供しています。</p>
          </li>
          <li>
            <h3 class="scarchive-cost__list-ttl scfacility__left-border-ttl lh-1_45 txt-bold">その他にかかる費用（介護保険・医療費など）</h3>
            <p class="scarchive-cost__list-txt txt-13-16 txt-just">月額利用料とは別に、ご利用状況に応じて以下の費用が必要です。<br><span class="txt-medium">介護保険自己負担額</span>：介護サービス費用の1割～3割（所得による）をご負担いただきます。要介護度によって上限額が異なります。<br><span class="txt-medium">医療費・薬代</span>：訪問診療や通院、処方薬にかかる費用です（医療保険適用）。<br><span class="txt-medium">日用品・消耗品費</span>：オムツ代、理美容代、個人的な嗜好品などは実費となります。</p>
          </li>
          <li>
            <h3 class="scarchive-cost__list-ttl scfacility__left-border-ttl lh-1_45 txt-bold">京都府の高齢者向け助成金・補助金</h3>
            <p class="scarchive-cost__list-txt txt-13-16 txt-just">京都府内の自治体では、地域福祉を重視した様々な高齢者支援が行われています。<br><span class="txt-medium">高額介護サービス費等の支給</span>： 介護費用の負担が大きくなりすぎないよう、所得に応じた還付制度が利用できます。<br><span class="txt-medium">紙おむつ等の支給事業</span>： 京都市などの多くの自治体で、在宅や特定の条件下の高齢者に対し、紙おむつの現物支給や購入券の交付を行っています。<br><span class="txt-medium">高齢者福祉タクシー利用助成</span>： 移動が困難な高齢者を対象に、タクシー料金の一部を助成する制度を設けている地域があります。</p>
            <p class="txt-12-14 lh-1_45 mt1">※申請方法や対象者は、各市町村の高齢福祉課等へお問い合わせください。</p>
          </li>
        </ul>
        <!-- <div class="scarchive-cost__plan">
          <h3 class="scarchive-cost__list-ttl scfacility__left-border-ttl lh-1_45 txt-bold">スーパー・コートの料金プラン</h3>
          <div class="scroll-table">
            <div class="scroll-table__wrap">
              <table class="scarchive-cost__table lh-1_3">
                <tbody>
                  <tr>
                    <th>施設名</th>
                    <th>施設種別</th>
                    <th>入居金</th>
                    <th>月額利用料</th>
                    <th>施設ページ</th>
                  </tr>
                  <tr>
                    <th>スーパー・コート三国</th>
                    <td>介護付き有料老人ホーム</td>
                    <td><span class="txt-18-28 txt-medium txt-orange">0</span><span>円</span></td>
                    <td><span class="txt-18-28 txt-medium txt-orange">105,003</span><span>円</span></td>
                    <td>
                      <a class="scarchive-cost__table-btn txt-bold txt-white bg-orange-gradiate-reverse" href="">
                        <span>詳細</span>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <th>スーパー・コート東淀川</th>
                    <td>介護付き有料老人ホーム</td>
                    <td><span class="txt-18-28 txt-medium txt-orange">0</span><span>円</span></td>
                    <td><span class="txt-18-28 txt-medium txt-orange">105,003</span><span>円</span></td>
                    <td>
                      <a class="scarchive-cost__table-btn txt-bold txt-white bg-orange-gradiate-reverse" href="">
                        <span>詳細</span>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <th>スーパー・コート京都城公園</th>
                    <td>介護付き有料老人ホーム</td>
                    <td><span class="txt-18-28 txt-medium txt-orange">0</span><span>円</span></td>
                    <td><span class="txt-18-28 txt-medium txt-orange">105,003</span><span>円</span></td>
                    <td>
                      <a class="scarchive-cost__table-btn txt-bold txt-white bg-orange-gradiate-reverse" href="">
                        <span>詳細</span>
                      </a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div> -->
      </div>
    </div>
  </section>

  <section class="scfacility-flow space-2s">
		<div class="scfacility-flow__wrap maw-960">
			<div class="scfacility-ttl txt-center">
				<span class="scfacility-ttl__en txt-bold en-upper">Flow</span>
				<h2 class="scfacility-ttl__jp txt-20-32 txt-bold txt-orange">ご入居までの流れ</h2>
			</div>
			<ul class="scfacility-flow__list lh-1_75">
				<li class="bg-beige">
					<div class="scfacility-flow__list-ttl">
						<div class="scfacility-flow__list-number txt-center">
							<span class="txt-10-12 txt-white txt-medium block">FLOW</span>
							<span class="txt-16-24 txt-white txt-medium block">01</span>
						</div>
						<h3 class="scfacility-flow__list-ttl-inner ib txt-bold txt-16-24">お問合せ</h3>
					</div>
					<p class="scfacility-flow__list-desc scfacility__left-border-ttl">ご興味をお持ちいただけましたら、インターネットまたはお電話でお問合せください。介護相談室の担当者が対応させていただきます。</p>
				</li>
				<li class="bg-beige">
					<div class="scfacility-flow__list-ttl">
						<div class="scfacility-flow__list-number txt-center">
							<span class="txt-10-12 txt-white txt-medium block">FLOW</span>
							<span class="txt-16-24 txt-white txt-medium block">02</span>
						</div>
						<h3 class="scfacility-flow__list-ttl-inner ib txt-bold txt-16-24">ご見学</h3>
					</div>
					<p class="scfacility-flow__list-desc scfacility__left-border-ttl">お部屋や食堂、浴室など施設内の見学、料金についてもご案内させていただきます。ご予約優先となりますので、ご都合に合わせて下記より見学をお申し込みください。ご入居に関するご不安なども、お気軽にご相談くだい。
					<span class="ib txt-13-16 lh-1_3">※所要時間は1時間〜1時間半が目安です。</span>
					</p>
				</li>
				<li class="bg-beige">
					<div class="scfacility-flow__list-ttl">
						<div class="scfacility-flow__list-number txt-center">
							<span class="txt-10-12 txt-white txt-medium block">FLOW</span>
							<span class="txt-16-24 txt-white txt-medium block">03</span>
						</div>
						<h3 class="scfacility-flow__list-ttl-inner ib txt-bold txt-16-24">施設利用申込み</h3>
					</div>
					<p class="scfacility-flow__list-desc scfacility__left-border-ttl">ご利用申込みに際し、書類のご提出をお願いいたします。所定様式の健康診断書、ご入居者アンケートへのご回答、ご家族様（ご本人様）より、収入証明書・保険証のコピー（介護保険・医療保険）をご準備ください。</p>
				</li>
				<li class="bg-beige">
					<div class="scfacility-flow__list-ttl">
						<div class="scfacility-flow__list-number txt-center">
							<span class="txt-10-12 txt-white txt-medium block">FLOW</span>
							<span class="txt-16-24 txt-white txt-medium block">04</span>
						</div>
						<h3 class="scfacility-flow__list-ttl-inner ib txt-bold txt-16-24">入居前面談</h3>
					</div>
					<p class="scfacility-flow__list-desc scfacility__left-border-ttl">必要書類のご提出後、面談の日時をご相談させていただきます。ご自宅や病院などへ担当者が伺い、ご提出いただいた書類をもとに確認のため、ご本人様とご家族様の両方とご一緒に面談させていただきます。
					<span class="ib txt-13-16 lh-1_3">※面談結果によっては入居をお断りさせていただくこともございます。予めご了承ください。</span>
					</p>
				</li>
				<li class="bg-beige">
					<div class="scfacility-flow__list-ttl">
						<div class="scfacility-flow__list-number txt-center">
							<span class="txt-10-12 txt-white txt-medium block">FLOW</span>
							<span class="txt-16-24 txt-white txt-medium block">05</span>
						</div>
						<h3 class="scfacility-flow__list-ttl-inner ib txt-bold txt-16-24">契約ご入居</h3>
					</div>
					<p class="scfacility-flow__list-desc scfacility__left-border-ttl">入居日が決定しましたら、ご入居いただけます。<br>本契約日を入居日とし、契約書をお渡しいたします。</p>
				</li>
			</ul>
		</div>
	</section>

  <section class="scfacility-check space-m space-s-bottom">
		<div class="scfacility-check__wrap maw-1370">
			<div class="scfacility-ttl txt-center">
				<span class="scfacility-ttl__en txt-bold en-upper">Check Point</span>
				<h2 class="scfacility-ttl__jp txt-20-32 txt-bold txt-orange">ご見学時のチェックポイント</h2>
			</div>
			<div class="scfacility-check__cont__wrap space-3s">
				<div class="scfacility-check__cont lh-1_75">
					<div class="scfacility-check__item bg-beige">
						<h3 class="scfacility-check__item-ttl scfacility__left-border-ttl txt-15-20 txt-bold ib">
							施設の清潔感と安全性
						</h3>
						<p class="txt-just">
							共用スペースや居室は清潔か、廊下は広く手すりが設置されているか、段差はないかなど、安全で快適な環境かを確認しましょう。
						</p>
					</div>
					<div class="scfacility-check__item bg-beige">
						<h3 class="scfacility-check__item-ttl scfacility__left-border-ttl txt-15-20 txt-bold ib">
							スタッフの対応や専門性
						</h3>
						<p class="txt-just">
							スタッフは笑顔で挨拶してくれるか、入居者に丁寧に接しているか、質問に対して分かりやすく誠実に答えてくれるかなどを確認しましょう。
						</p>
					</div>
					<div class="scfacility-check__item bg-beige">
						<h3 class="scfacility-check__item-ttl scfacility__left-border-ttl txt-15-20 txt-bold ib">
							入居者の様子
						</h3>
						<p class="txt-just">
							入居者がリラックスした表情で過ごしているか、談話室などで楽しそうに交流しているかなどを観察しましょう。
						</p>
					</div>
					<div class="scfacility-check__item bg-beige">
						<h3 class="scfacility-check__item-ttl scfacility__left-border-ttl txt-15-20 txt-bold ib">
							食事の確認
						</h3>
						<p class="txt-just">
							可能であれば食事を試食させてもらい、味付けや量、温かいものが温かく提供されるかなどを確認します。
						</p>
					</div>
					<div class="scfacility-check__item bg-beige">
						<h3 class="scfacility-check__item-ttl scfacility__left-border-ttl txt-15-20 txt-bold ib">
							緊急時の対応体制
						</h3>
						<p class="txt-just">
							夜間や緊急時の人員体制、協力医療機関との連携方法などを具体的に質問し、確認しておきましょう。
						</p>
					</div>
					<div class="scfacility-check__item bg-beige">
						<h3 class="scfacility-check__item-ttl scfacility__left-border-ttl txt-15-20 txt-bold ib">
							イベント・レクリエーションの見学
						</h3>
						<p class="txt-just">
							どのような活動が行われているか、入居者の参加状況はどうかなどを確認しましょう。
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>

  <section class="scarchive-feature bg-beige space-s space-s-bottom">

<div class="scarchive-search bg-beige">
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


  <!-- <section class="scfacility-voice space-3s space-2s-bottom">
		<div class="scfacility-voice__wrap wrap-m">
			<div class="scfacility-ttl txt-center">
				<span class="scfacility-ttl__en txt-bold en-upper">Voice</span>
				<h2 class="scfacility-ttl__jp txt-20-32 txt-bold txt-orange">京都の老人ホーム・<br>介護施設のご入居者の声</h2>
			</div>
			<ul class="scfacility-voice__list space-3s">
				<li>
					<div class="scfacility-voice__list-person">
						<div class="scfacility-voice__list-image">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/image/scfacility/scfacility-voice01.png" alt="">
						</div>
						<span class="scfacility-voice__list-ttl txt-bold">A.A.さん（70歳）</span>
					</div>
					<p class="scfacility-voice__list-desc txt-13-16 lh-1_75">ご入居者の声が入ります。ご入居者の声が入ります。ご入居者の声が入ります。ご入居者の声が入ります。ご入居者の声が入ります。</p>
				</li>
        <li>
					<div class="scfacility-voice__list-person">
						<div class="scfacility-voice__list-image">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/image/scfacility/scfacility-voice01.png" alt="">
						</div>
						<span class="scfacility-voice__list-ttl txt-bold">A.A.さん（70歳）</span>
					</div>
					<p class="scfacility-voice__list-desc txt-13-16 lh-1_75">ご入居者の声が入ります。ご入居者の声が入ります。ご入居者の声が入ります。ご入居者の声が入ります。ご入居者の声が入ります。</p>
				</li>
        <li>
					<div class="scfacility-voice__list-person">
						<div class="scfacility-voice__list-image">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/image/scfacility/scfacility-voice01.png" alt="">
						</div>
						<span class="scfacility-voice__list-ttl txt-bold">A.A.さん（70歳）</span>
					</div>
					<p class="scfacility-voice__list-desc txt-13-16 lh-1_75">ご入居者の声が入ります。ご入居者の声が入ります。ご入居者の声が入ります。ご入居者の声が入ります。ご入居者の声が入ります。</p>
				</li>
			</ul>
		</div>
	</section> -->

 

</main>

<script>
window.addEventListener('DOMContentLoaded', () => {
    // '.facility-item' を実際の施設カードのクラス名に変更してください
    const firstFacility = document.querySelector('.scarchive__result-ttl');

    if (firstFacility) {
        const cardTop = firstFacility.getBoundingClientRect().top + window.scrollY;
        const viewportHeight = window.innerHeight;
        const peekHeight = window.innerWidth < 768 ? 310 : 360; // スマホ80px / PC120px見せる

        const targetScrollY = cardTop - viewportHeight + peekHeight;

        window.scrollTo({
            top: Math.max(0, targetScrollY),
            behavior: 'smooth'
        });
    }
});
</script>

<?php get_footer(); ?>
