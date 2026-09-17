<?php
/**
 * Facility List Search Form Component
 * 施設検索フォームの共通コンポーネント
 */

if (!defined('ABSPATH')) exit;

// デフォルト値
$defaults = array(
    'form_action'         => '',
    'pref_slug'           => '',
    'selected_areas'      => array(),
    'selected_categories' => array(),
    'selected_ukeire'     => array(),
    'area_field_name'     => '',
    'area_label'          => '市区町村',
);

$args = wp_parse_args($args, $defaults);

// 施設カテゴリ（直書きで固定）
$category_choices = array(
    'premium'   => 'プレミアム',
    'prime'     => 'プライム',
    'olive'    => 'オリーブ',
    'rihabili'    => 'リハビリ特化型ナーシングホーム',
    'supercourt'    => 'スーパー・コート',
);

// 受け入れ対象（直書きで固定）
$ukeire_choices = array(
    'independent' => '自立',
    'support'     => '要支援',
    'care'        => '要介護',
    'dementia'    => '認知症',
    'parkinson'   => 'パーキンソン病',
    'hours_24'    => '24時間看護',
);

// エリアフィールド（都道府県ごとに異なる）
$area_choices = array();
if (!empty($args['area_field_name'])) {
    $area_field = function_exists('get_field_object') ? get_field_object($args['area_field_name']) : null;
    
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

// 都道府県タームを取得
$pref_terms = get_terms(array(
    'taxonomy'   => 'facilitys_category',
    'hide_empty' => false,
    'orderby'    => 'name',
    'order'      => 'ASC',
));

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
    <div class="scarchive-search__wrap wrap-m space-3s space-s-bottom">
        <form class="scarchive-search__inner txt-13-16" method="get" action="<?php echo esc_url($args['form_action']); ?>">

            <div class="scarchive-search__head txt-16-24 txt-bold">希望する条件から検索する</div>


            <!-- 都道府県（SEO対応テキストリンク） -->
            <div class="scarchive-search__item">
                <div class="scarchive-search__left">
                    <div class="scarchive-search__ttl txt-bold scfacility__left-border-ttl">都道府県</div>
                </div>
                <div class="scarchive-search__right">
                    <?php if (!is_wp_error($pref_terms) && !empty($pref_terms)) : ?>
                        <ul class="pref-link-list">
                            <li>
                                <a href="<?php echo esc_url(home_url('/facility-list/')); ?>" class="pref-link-item js-pref-link <?php if (empty($args['pref_slug'])) echo 'is-active'; ?>">
                                    すべて
                                </a>
                            </li>
                            <?php foreach ($pref_terms as $t): 
                                $path = fl_term_path_slugs($t);
                                $term_url = home_url(user_trailingslashit('facility-list/' . $path));
                                $is_active = ($args['pref_slug'] === $t->slug);
                            ?>
                                <li>
                                    <a href="<?php echo esc_url($term_url); ?>" class="pref-link-item js-pref-link <?php if ($is_active) echo 'is-active'; ?>">
                                        <?php echo esc_html($t->name); ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>

            <!-- エリア（市区町村） -->
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

            <!-- 施設カテゴリ -->
            <div class="scarchive-search__item">
                <div class="scarchive-search__left">
                    <div class="scarchive-search__ttl txt-bold scfacility__left-border-ttl">シリーズ・タイプ</div>
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

            <!-- 受け入れ条件 -->
            <div class="scarchive-search__item">
                <div class="scarchive-search__left">
                    <div class="scarchive-search__ttl txt-bold scfacility__left-border-ttl">受入対象・特徴</div>
                </div>
                <div class="scarchive-search__right">
                    <ul class="ukeire-checks checkbox-list">
                        <?php foreach ($ukeire_choices as $val => $label): ?>
                            <li class="ukeire_li">
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
                <!--<a class="btn-reset txt-orange" href="<?php echo esc_url($args['form_action']); ?>">検索条件をリセット</a>-->
            </div>

        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    

    // 2. 都道府県リンククリック時のチェック条件引き継ぎ処理
    const prefLinks = document.querySelectorAll('.js-pref-link');
    prefLinks.forEach(function(link) {
        link.addEventListener('click', function(e) {
            const form = link.closest('form');
            if (!form) return;

            e.preventDefault();
            const baseUrl = this.getAttribute('href');
            
            const formData = new FormData(form);
            const params = new URLSearchParams();

            for (const [key, value] of formData.entries()) {
                if (value !== '') {
                    params.append(key, value);
                }
            }

            const qs = params.toString();
            const dest = qs ? (baseUrl.replace(/\/+$/, '') + '/?' + qs) : baseUrl;
            window.location.href = dest;
        });
    });
});
</script>