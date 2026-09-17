<?php get_header(); ?>

<main id="facility">

  <div class="lower-mv">
    <figure class="lower-mv-image">
      <img src="<?php bloginfo('template_directory');?>/assets/image/facility/mv.jpg" alt="">
    </figure>
    <div class="ttl-lower-wrap">
      <p class="ttl-lower-up ttl-en-2l txt-white en-upper txt-bold">facility</p>
      <h1 class="ttl-lower txt-white bg-black"><span class="ib"><?php the_title()?></span></h1>
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
    // 1. 現在のページの親ページIDをすべて取得（配列は [親, 祖父, ...] の順）
    $ancestors = get_post_ancestors($post->ID);

    // 2. 配列を逆転させて [祖父, 親, ...] の順にする（施設一覧 > 都道府県）
    $ancestors = array_reverse($ancestors);

    foreach ($ancestors as $ancestor_id) :
        $ancestor_post = get_post($ancestor_id);
        $slug = $ancestor_post->post_name;

        // 「facility-list（施設一覧）」は既に上で手動出力しているのでスキップ
        if ($slug === 'facility-list') continue;

        $title = get_the_title($ancestor_id);
        
        // 都道府県名（大阪府など）の場合の表示名称変換
        if (strpos($title, '府') !== false || strpos($title, '県') !== false) {
            $display_name = $title . '';
        } else {
            $display_name = $title;
        }
    ?>
    <li>
        <a href="<?php echo esc_url(get_permalink($ancestor_id)); ?>"><?php echo esc_html($display_name); ?></a>
    </li>
    <?php endforeach; ?>

    <li>
        <span><?php the_title(); ?></span>
    </li>
</ul>
</div>

<section class="scfacility-head bg-beige">
<div class="scfacility-head__inner wrap-m maw-1370">
        <?php
        $commitments  = $getfields['commitment'] ?? [];
        ?>

        <?php if ( !empty($commitments) && !empty($commitment_choices) ) : ?>
        <ul class="scfacility-head__point txt-12-14 txt-bold txt-orange">
          <?php foreach( $commitments as $value ): ?>
            <?php $label = $commitment_choices[$value] ?? $value; ?>
            <li class="<?php echo esc_attr($value); ?>">
              <!-- <span class="scfacility-head__point-icon"></span> -->
              <span class="scfacility-head__point-txt">
                <?php echo esc_html($label); ?>
              </span>
            </li>
          <?php endforeach; ?>
        </ul>
        <?php endif; ?>

        <?php $beginning  = $getfields['beginning'] ?? ''; ?>
        <?php if ( $beginning ) : ?>
          <p class="scfacility-head__txt txt-15-20 txt-just"><?php echo nl2br( wp_kses_post( $beginning ) ); ?></p>
        <?php endif; ?>
    </div>
</section>

  <?php
  $fixed_meta_key   = 'area_kyoto';
  $fixed_meta_value = 'kyotocity';
  get_template_part(
    'template-parts/city-list',
    null,
    array(
      'fixed_meta_key'   => $fixed_meta_key,
      'fixed_meta_value' => $fixed_meta_value,
      'search_param_key' => 'area_kyoto',
    )
  );
  ?>

  <section class="cityarchive-other bg-beige space-s space-3l-bottom">
    <div class="cityarchive-other__wrap wrap-m">

      <div class="cityarchive-other__inner bg-white">
        <div class="cityarchive-other__cont scfacility-inner__800">
          <h2 class="txt-18-28 txt-bold lh-1_35">京都市の概況と高齢化の現状</h2>
          <h3 class="scfacility__left-border-ttl txt-15-22 txt-bold">京都市の概況</h3>
          <p class="cityarchive-other__txt">京都市は、日本を代表する観光都市であり、第二次世界大戦の戦災を免れたことで、多くの神社仏閣や歴史的な街並みが今なお残る、文化の薫り高い街です。国内外からの観光客で賑わい、散策するだけでも風情を感じられます。</p>
          <h3 class="txt-15-22 txt-bold">京都市の高齢化の状況</h3>
          <p class="cityarchive-other__txt">京都市の人口は、令和5年（2023年）10月1日時点の推計で約144万9千人、そのうち65歳以上の高齢者人口は約41万1千人で、高齢化率は28.4%と全国平均とほぼ同じ水準です。しかし、市内11区の多くで高齢化率が20%を超えており、特に北区、上京区、東山区などでは、75歳以上の後期高齢者の割合が前期高齢者を上回る特徴が見られます。</p>
          <p class="cityarchive-other__txt">令和4年度末時点での要介護・要支援認定者数は約9万9千人にのぼり、介護サービスへの需要は年々増加傾向にあります。今後も高齢者人口の増加が見込まれるため、老人ホームの重要性はますます高まっていくと予想されます。</p>
        </div>
      </div>

      <div class="cityarchive-other__inner bg-white">
        <div class="cityarchive-other__cont scfacility-inner__800">
          <h2 class="txt-18-28 txt-bold lh-1_35">京都市の施設種別ごとの費用相場</h2>
          <div class="cityarchive-other__table">
            <table>
              <thead>
              <tr>
              <th rowspan="2">施設種別</th>
              <th rowspan="2">項目</th>
              <th colspan="2">平均値</th>
              <th colspan="2">中央値</th>
              </tr>
              <tr>
              <th>最低金額</th>
              <th>最高金額</th>
              <th>最低金額</th>
              <th>最高金額</th>
              </tr>
              </thead>
              <tbody>
              <tr>
              <td rowspan="2">全て</td>
              <td>入居一時金</td>
              <td><span class="market-price">65.9</span>万円</td>
              <td><span class="market-price">309.9</span>万円</td>
              <td><span class="market-price">13.7</span>万円</td>
              <td><span class="market-price">16.8</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">17.1</span>万円</td>
              <td><span class="market-price">21.2</span>万円</td>
              <td><span class="market-price">16.5</span>万円</td>
              <td><span class="market-price">17.9</span>万円</td>
              </tr>
              <tr>
              <td rowspan="2">介護付有料老人ホーム</td>
              <td>入居一時金</td>
              <td><span class="market-price">150.6</span>万円</td>
              <td><span class="market-price">1074.8</span>万円</td>
              <td><span class="market-price">0.0</span>万円</td>
              <td><span class="market-price">83.9</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">19.7</span>万円</td>
              <td><span class="market-price">31.9</span>万円</td>
              <td><span class="market-price">18.9</span>万円</td>
              <td><span class="market-price">21.6</span>万円</td>
              </tr>
              <tr>
              <td rowspan="2">住宅型有料老人ホーム</td>
              <td>入居一時金</td>
              <td><span class="market-price">196.5</span>万円</td>
              <td><span class="market-price">603.0</span>万円</td>
              <td><span class="market-price">15.0</span>万円</td>
              <td><span class="market-price">16.7</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">15.3</span>万円</td>
              <td><span class="market-price">18.1</span>万円</td>
              <td><span class="market-price">15.0</span>万円</td>
              <td><span class="market-price">15.0</span>万円</td>
              </tr>
              <tr>
              <td rowspan="2">サービス付き高齢者向け住宅</td>
              <td>入居一時金</td>
              <td><span class="market-price">11.8</span>万円</td>
              <td><span class="market-price">16.4</span>万円</td>
              <td><span class="market-price">13.8</span>万円</td>
              <td><span class="market-price">15.0</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">17.4</span>万円</td>
              <td><span class="market-price">21.5</span>万円</td>
              <td><span class="market-price">18.0</span>万円</td>
              <td><span class="market-price">19.2</span>万円</td>
              </tr>
              <tr>
              <td rowspan="2">グループホーム</td>
              <td>入居一時金</td>
              <td><span class="market-price">12.3</span>万円</td>
              <td><span class="market-price">12.3</span>万円</td>
              <td><span class="market-price">14.2</span>万円</td>
              <td><span class="market-price">14.2</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">16.3</span>万円</td>
              <td><span class="market-price">16.3</span>万円</td>
              <td><span class="market-price">16.0</span>万円</td>
              <td><span class="market-price">16.0</span>万円</td>
              </tr>
              <tr>
              <td rowspan="2">ケアハウス</td>
              <td>入居一時金</td>
              <td><span class="market-price">10.0</span>万円</td>
              <td><span class="market-price">10.0</span>万円</td>
              <td><span class="market-price">0.0</span>万円</td>
              <td><span class="market-price">0.0</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">12.1</span>万円</td>
              <td><span class="market-price">15.0</span>万円</td>
              <td><span class="market-price">8.8</span>万円</td>
              <td><span class="market-price">15.1</span>万円</td>
              </tr>
              <tr>
              <td rowspan="2">高齢者住宅</td>
              <td>入居一時金</td>
              <td><span class="market-price">26.0</span>万円</td>
              <td><span class="market-price">59.3</span>万円</td>
              <td><span class="market-price">26.0</span>万円</td>
              <td><span class="market-price">59.3</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">11.3</span>万円</td>
              <td><span class="market-price">19.5</span>万円</td>
              <td><span class="market-price">11.3</span>万円</td>
              <td><span class="market-price">19.5</span>万円</td>
              </tr>
              </tbody>
            </table>
          </div>
          <p class="cityarchive-other__desc txt-13-16">※上記の費用相場は、自社調査に基づき作成しています。個別の施設によって費用は大きく異なりますので、あくまで目安としてご活用ください。</p>
        </div>
      </div>

      <div class="cityarchive-other__inner bg-white">
        <div class="cityarchive-other__cont scfacility-inner__800">
          <h2 class="txt-18-28 txt-bold lh-1_35">京都市の高齢者支援制度・相談窓口のご紹介</h2>
          <ul class="cityarchive-other__list">
            <li>
              <p class="cityarchive-other__list-ttl">地域包括支援センター</p>
              <p class="cityarchive-other__list-txt">市内各所に設置されており、介護、福祉、健康、医療など、高齢者に関する様々な相談に対応する総合相談窓口です。介護予防ケアプランの作成なども行っています。</p>
            </li>
            <li>
              <p class="cityarchive-other__list-ttl">地域介護予防推進センター</p>
              <p class="cityarchive-other__list-txt">健康教室や介護予防に関する講座などを実施し、高齢者の健康づくりを支援しています。</p>
            </li>
            <li>
              <p class="cityarchive-other__list-ttl">地域支え合い活動創出コーディネーター</p>
              <p class="cityarchive-other__list-txt">高齢者が地域で孤立することなく、生きがいを持って暮らせるよう、地域の様々な支え合い活動を支援しています。</p>
            </li>
            <li>
              <p class="cityarchive-other__list-ttl">介護相談員派遣事業</p>
              <p class="cityarchive-other__list-txt">介護相談員が介護サービス施設を訪問し、利用者や家族からサービスの疑問や不満を聞き、事業者との橋渡しを行う事業です。</p>
            </li>
            <li>
              <p class="cityarchive-other__list-ttl">京都市社会福祉協議会</p>
              <p class="cityarchive-other__list-txt">介護保険サービスだけでなく、権利擁護や生活資金の相談など、高齢者の様々な生活課題に対応しています。</p>
            </li>
          </ul>
        </div>
      </div>
    
      <div class="cityarchive-other__inner bg-white">
        <div class="cityarchive-other__cont scfacility-inner__960">
          <h2 class="txt-18-28 txt-bold lh-1_35">京都市の近隣エリアのご紹介</h2>
          <ul class="scarea__list">
            <li>
              <a href="/facility-list/kyoto/ujicity">
                <div class="scarea__list-image">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/image/scfacility/uji-gallery1.webp" alt="エリア施設">
                </div>
                <div class="scarea__list-info">
                  <h3 class="scarea__list-ttl scfacility__left-border-ttl txt-bold lh-1_5">宇治市</h3>
                  <p class="scarea__list-txt txt-13-16 lh-1_5">世界遺産・平等院や宇治茶で有名な歴史都市。宇治川の美しい流れと緑豊かな景観の中で、ゆったりとした時間が流れます。</p>
                  <div class="scarea__list-btn txt-12-14 txt-bold lh-1_5 txt-white bg-orange-gradiate-reverse">宇治市の老人ホーム・施設一覧</div>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    
<div class="scarchive-search space-s bg-beige">
<div class="scarchive-feature__inner scfacility-inner__1134">
    <div class="scarchive-search__head scfacility__left-border-ttl txt-16-24 txt-bold">都道府県から探す</div>
  <ul class="scarea__list2">
    <li>
      <a href="/facility-list/osaka">
          <div class="scarea__list-btn txt-13-16 txt-bold lh-1_5 txt-white bg-orange-gradiate-reverse">大阪府の<br class="pc-only">老人ホーム・施設一覧</div>
      </a>
    </li>
    <li>
      <a href="/facility-list/hyougo">
          <div class="scarea__list-btn txt-13-16 txt-bold lh-1_5 txt-white bg-orange-gradiate-reverse">兵庫県の<br class="pc-only">老人ホーム・施設一覧</div>
      </a>
    </li>
    <li>
      <a href="/facility-list/kyoto">
          <div class="scarea__list-btn txt-13-16 txt-bold lh-1_5 txt-white bg-orange-gradiate-reverse">京都府の<br class="pc-only">老人ホーム・施設一覧</div>
      </a>
    </li>
    <li>
      <a href="/facility-list/nara">
          <div class="scarea__list-btn txt-13-16 txt-bold lh-1_5 txt-white bg-orange-gradiate-reverse">奈良県の<br class="pc-only">老人ホーム・施設一覧</div>
      </a>
    </li>
    <li>
      <a href="/facility-list/shiga">
          <div class="scarea__list-btn txt-13-16 txt-bold lh-1_5 txt-white bg-orange-gradiate-reverse">滋賀県の<br class="pc-only">老人ホーム・施設一覧</div>
      </a>
    </li>
  </ul>
</div>
</div>
  </section>

</main>

<?php get_footer(); ?>
