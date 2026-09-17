<?php
/**
 * Facility List Search Form Component
 * 施設検索フォームの共通コンポーネント
 * 
 * @param array $args {
 *     @type string $form_action          フォームのaction URL
 *     @type string $pref_slug            現在の都道府県スラッグ（'osaka', 'hyougo', 'shiga' など）
 *     @type array  $selected_areas       選択済みエリア配列
 *     @type array  $selected_categories  選択済みカテゴリ配列
 *     @type array  $selected_ukeire      選択済み受け入れ条件配列
 *     @type string $entry_min            入居金下限
 *     @type string $entry_max            入居金上限
 *     @type string $month_min            月額下限
 *     @type string $month_max            月額上限
 *     @type string $area_field_name      エリアフィールド名（'area_osaka', 'area_hyougo' など）
 *     @type string $area_label           エリアラベル（'市区町村（大阪）' など）
 * }
 */

if (!defined('ABSPATH')) exit;

// デフォルト値
$defaults = array(
    'form_action'         => '',
    'pref_slug'           => '',
    'selected_areas'      => array(),
    'selected_categories' => array(),
    'selected_ukeire'     => array(),
    'entry_min'           => '',
    'entry_max'           => '',
    'month_min'           => '',
    'month_max'           => '',
    'area_field_name'     => '',
    'area_label'          => '市区町村',
);

$args = wp_parse_args($args, $defaults);

// 金額リスト（万円 → 円）
$man_list = array(0, 10, 12, 14, 16, 18, 20, 25, 30, 40, 50);
$yen_list = array_map(function($v) { return $v * 10000; }, $man_list);

// ACFフィールドオブジェクトを取得（ループ外で一度だけ）
$category_field = function_exists('get_field_object') ? get_field_object('category') : null;
$category_choices = ($category_field && !empty($category_field['choices'])) 
    ? $category_field['choices'] 
    : array(
        'parkinson' => 'パーキンソン病専門',
        'nursing' => 'ナーシングホーム',
        'premium' => 'プレミアムシリーズ',
        'prime' => 'プライムシリーズ',
        'normal' => '一般施設',
      );

$ukeire_field = function_exists('get_field_object') ? get_field_object('price1_ukeire') : null;
$ukeire_choices = ($ukeire_field && !empty($ukeire_field['choices'])) 
    ? $ukeire_field['choices'] 
    : array(
        'independent' => '自立',
        'support' => '要支援',
        'care'  => '要介護',
        'dementia' => '認知症',
        'parkinson' => 'パーキンソン病',
        'hours_24' => '24時間看護',
      );

// エリアフィールド（都道府県ごとに異なる）
$area_choices = array();
if (!empty($args['area_field_name'])) {
    $area_field = function_exists('get_field_object') ? get_field_object($args['area_field_name']) : null;
    
    // 参考ファイルから取得した正確なデフォルト値
    $default_areas = array(
        'area_osaka' => array(
            'osakacity'        => '大阪市',
            'sakaicity'        => '堺市',
            'higashiosakacity' => '東大阪市',
            'toyonakacity'     => '豊中市',
            'takatsukicity'    => '高槻市',
            'suitacity'        => '吹田市',
            'ibarakicity'      => '茨木市',
            'ikedacity'        => '池田市',
            'minoocity'        => '箕面市',
            'kadomacity'       => '門真市',
            'daitocity'        => '大東市',
            'yaocity'          => '八尾市',
            'matsubaracity'    => '松原市',
            'takaishicity'     => '高石市',
        ),
        'area_hyougo' => array(
            'kobecity' => '神戸市',
            'nishinomiyacity' => '西宮市',
            'takarazukacity'  => '宝塚市',
            'amagasakicity'   => '尼崎市',
            'kawanishicity'   => '川西市',
        ),
        'area_kyoto' => array(
            'kyotocity' => '京都市',
            'ujicity'   => '宇治市',
        ),
        'area_nara' => array(
            'naracity'            => '奈良市',
            'yamatokoriyamacity' => '大和郡山市',
        ),
        'area_shiga' => array(
            'rittocity' => '栗東市',
        ),
    );
    
    $area_choices = ($area_field && !empty($area_field['choices'])) 
        ? $area_field['choices'] 
        : ($default_areas[$args['area_field_name']] ?? array());
}

// 都道府県タームを取得（parent指定なし、全タームを取得）
$pref_terms = get_terms(array(
    'taxonomy'   => 'facilitys_category',
    'hide_empty' => false,
    'orderby'    => 'name',
    'order'      => 'ASC',
));

// fl_term_path_slugs関数が定義されているか確認
if (!function_exists('fl_term_path_slugs')) {
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
}
?>

<div class="scarchive-search bg-beige">
    <div class="scarchive-search__wrap wrap-m bg-white space-3s space-3s-bottom">
        <!-- フォーム送信先 -->
        <form class="scarchive-search__inner txt-13-16" method="get" action="<?php echo esc_url($args['form_action']); ?>">

            <div class="scarchive-search__head txt-16-24 txt-bold txt-center"><i class="fas fa-search"></i> 希望する条件から検索する</div>

            <div id="js-search-toggle" class="scarchive-search__toggle-btn">
                検索条件を変更する <span class="icon"><i class="fas fa-angle-down"></i></span>
            </div>

            <div id="js-search-body" class="scarchive-search__body">
                <div class="scarchive-search__body-inner">

            <!-- 都道府県：セレクト → onchangeで /facility-list/{slug}/ へ -->
            <div class="scarchive-search__item">
                <div class="scarchive-search__left">
                    <div class="scarchive-search__ttl txt-bold scfacility__left-border-ttl">都道府県</div>
                </div>
                <div class="scarchive-search__right">
                    <?php if (!is_wp_error($pref_terms) && !empty($pref_terms)) : ?>
                        <select id="prefSelect" class="pref-select">
                            <option value="" data-url="<?php echo home_url('/facility-list/'); ?>">
                                すべて
                            </option>
                            <?php foreach ($pref_terms as $t): 
                                $path = fl_term_path_slugs($t);
                                // /facility-list/{path}/ を確定で作る
                                $term_url = home_url(user_trailingslashit('facility-list/' . $path));
                            ?>
                                <option
                                    value="<?php echo esc_attr($t->slug); ?>"
                                    data-url="<?php echo esc_url($term_url); ?>"
                                    <?php selected($args['pref_slug'], $t->slug); ?>
                                >
                                    <?php echo esc_html($t->name); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                        <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const sel = document.getElementById('prefSelect');
                            if (!sel) return;
                            sel.addEventListener('change', function() {
                                const url = this.options[this.selectedIndex].getAttribute('data-url') || '';
                                const params = new URLSearchParams(window.location.search);
                                params.delete('prefectures'); // パスに出すのでクエリからは削除
                                const qs = params.toString();
                                const dest = qs ? (url.replace(/\/+$/, '') + '/?' + qs) : url;
                                window.location.href = dest;
                            });
                            // --- ここからアコーディオン用追加 ---
                            const toggleBtn = document.getElementById('js-search-toggle');
                            const searchBody = document.getElementById('js-search-body');

                            if (toggleBtn && searchBody) {
                                toggleBtn.addEventListener('click', function() {
                                    // クラスの付け外し
                                    searchBody.classList.toggle('is-open');
                                    toggleBtn.classList.toggle('is-active');

                                    // ボタンのテキスト切り替え
                                    if (searchBody.classList.contains('is-open')) {
                                        toggleBtn.innerHTML = '検索条件を閉じる <span class="icon"><i class="fas fa-angle-up"></i></span>';
                                    } else {
                                        toggleBtn.innerHTML = '検索条件を変更する <span class="icon"><i class="fas fa-angle-down"></i></span>';
                                    }
                                });
                            }
                                                    // --- ここまで ---
                        });
                        </script>
                    <?php endif; ?>
                </div>
            </div>

            <!-- エリア（市区町村）※ACFは「選択（Select）」、UIはチェックボックス -->
            <?php if (!empty($args['area_field_name']) && !empty($area_choices)) : ?>
            <div class="scarchive-search__item">
                <div class="scarchive-search__left">
                    <div class="scarchive-search__ttl txt-bold scfacility__left-border-ttl"><?php echo esc_html($args['area_label']); ?></div>
                </div>
                <div class="scarchive-search__right">
                    <ul class="area-<?php echo esc_attr(str_replace('area_', '', $args['area_field_name'])); ?>-checks checkbox-list">
                        <?php foreach ($area_choices as $val => $label): ?>
                            <li>
                                <label>
                                    <input type="checkbox" name="<?php echo esc_attr($args['area_field_name']); ?>[]" value="<?php echo esc_attr($val); ?>"
                                        <?php checked(in_array($val, $args['selected_areas'], true)); ?>>
                                    <span><?php echo esc_html($label); ?></span>
                                </label>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <?php endif; ?>

            <!-- 施設カテゴリ（category）-->
            <div class="scarchive-search__item">
                <div class="scarchive-search__left">
                    <div class="scarchive-search__ttl txt-bold scfacility__left-border-ttl">施設カテゴリ</div>
                </div>
                <div class="scarchive-search__right">
                    <ul class="category-checks checkbox-list">
                        <?php foreach ($category_choices as $val => $label): ?>
                            <li>
                                <label>
                                    <input type="checkbox" name="category[]" value="<?php echo esc_attr($val); ?>"
                                        <?php checked(in_array($val, $args['selected_categories'], true)); ?>>
                                    <span><?php echo esc_html($label); ?></span>
                                </label>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <!-- 入居金 -->
            <div class="scarchive-search__item">
                <div class="scarchive-search__left">
                    <div class="scarchive-search__ttl txt-bold scfacility__left-border-ttl">入居金</div>
                </div>
                <div class="scarchive-search__right">
                    <label class="mr-8">
                        <select name="entry_min">
                            <?php foreach ($yen_list as $i => $yen): ?>
                                <option value="<?php echo esc_attr($yen); ?>" <?php selected($args['entry_min'], $yen); ?>>
                                    <?php echo esc_html($man_list[$i]); ?>万円
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                    <label>
                        <select name="entry_max">
                            <option value="" <?php selected($args['entry_max'], ''); ?>>上限なし</option>
                            <?php foreach ($yen_list as $i => $yen): ?>
                                <option value="<?php echo esc_attr($yen); ?>" <?php selected($args['entry_max'], $yen); ?>>
                                    <?php echo esc_html($man_list[$i]); ?>万円
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                </div>
            </div>

            <!-- 月額利用料 -->
            <div class="scarchive-search__item">
                <div class="scarchive-search__left">
                    <div class="scarchive-search__ttl txt-bold scfacility__left-border-ttl">月額利用料</div>
                </div>
                <div class="scarchive-search__right">
                    <label class="mr-8">
                        <select name="month_min">
                            <option value="" <?php selected($args['month_min'], ''); ?>>下限なし</option>
                            <?php foreach ($yen_list as $i => $yen): ?>
                                <option value="<?php echo esc_attr($yen); ?>" <?php selected($args['month_min'], $yen); ?>>
                                    <?php echo esc_html($man_list[$i]); ?>万円
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                    <label>
                        <select name="month_max">
                            <option value="" <?php selected($args['month_max'], ''); ?>>上限なし</option>
                            <?php foreach ($yen_list as $i => $yen): ?>
                                <option value="<?php echo esc_attr($yen); ?>" <?php selected($args['month_max'], $yen); ?>>
                                    <?php echo esc_html($man_list[$i]); ?>万円
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                </div>
            </div>

            <!-- 受け入れ条件 -->
            <div class="scarchive-search__item">
                <div class="scarchive-search__left">
                    <div class="scarchive-search__ttl txt-bold scfacility__left-border-ttl">受け入れ対象</div>
                </div>
                <div class="scarchive-search__right">
                    <ul class="ukeire-checks checkbox-list">
                        <?php foreach ($ukeire_choices as $val => $label): ?>
                            <li>
                                <label>
                                    <input type="checkbox" name="ukeire[]" value="<?php echo esc_attr($val); ?>"
                                        <?php checked(in_array($val, $args['selected_ukeire'], true)); ?>>
                                    <span><?php echo esc_html($label); ?></span>
                                </label>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <div class="scarchive-search__btn">
                <button type="submit">この条件で検索</button>
                <a class="btn-reset txt-orange" href="<?php echo esc_url($args['form_action']); ?>">検索条件をリセット</a>
            </div>

            </div>
            </div>
        </form>

        <!--
        <?php
        // 選択中バッジ
        $area_selected = $args['selected_areas'];
        $category_selected = $args['selected_categories'];
        $ukeire_selected = $args['selected_ukeire'];
        $entry_min = $args['entry_min'];
        $entry_max = $args['entry_max'];
        $month_min = $args['month_min'];
        $month_max = $args['month_max'];
        
        if (!empty($area_selected) || !empty($category_selected) || !empty($ukeire_selected) || $entry_min!=='' || $entry_max!=='' || $month_min!=='' || $month_max!==''):
        ?>
            <div class="active-filters txt-12-14 wrap-m space-s">
                <strong>選択中：</strong>
                <ul class="inline-badges">
                    <?php
                    if ($entry_min !== '') echo '<li class="badge">入居金 下限: '.esc_html(number_format($entry_min)).'円</li>';
                    if ($entry_max !== '') echo '<li class="badge">入居金 上限: '.esc_html(number_format($entry_max)).'円</li>';
                    if ($month_min !== '') echo '<li class="badge">月額 下限: '.esc_html(number_format($month_min)).'円</li>';
                    if ($month_max !== '') echo '<li class="badge">月額 上限: '.esc_html(number_format($month_max)).'円</li>';

                    if (!empty($ukeire_selected) && !empty($ukeire_choices)) {
                        foreach ($ukeire_selected as $v) {
                            $label = $ukeire_choices[$v] ?? $v;
                            echo '<li class="badge">'.esc_html($label).'</li>';
                        }
                    }
                    if (!empty($category_selected) && !empty($category_choices)) {
                        foreach ($category_selected as $v) {
                            $label = $category_choices[$v] ?? $v;
                            echo '<li class="badge">'.esc_html($label).'</li>';
                        }
                    }
                    if (!empty($area_selected) && !empty($area_choices)) {
                        foreach ($area_selected as $v) {
                            $label = $area_choices[$v] ?? $v;
                            echo '<li class="badge">'.esc_html($label).'</li>';
                        }
                    }
                    ?>
                </ul>
            </div>
        <?php endif; ?>
                    -->

    </div>
</div>
