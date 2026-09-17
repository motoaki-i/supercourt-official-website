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
  $fixed_meta_key   = 'area_osaka';
  $fixed_meta_value = 'takaishicity';
  get_template_part(
    'template-parts/city-list',
    null,
    array(
      'fixed_meta_key'   => $fixed_meta_key,
      'fixed_meta_value' => $fixed_meta_value,
      'search_param_key' => 'area_osaka',
    )
  );
  ?>

  <section class="cityarchive-other bg-beige space-s space-3l-bottom">
    <div class="cityarchive-other__wrap wrap-m">
      <div class="cityarchive-other__inner bg-white">
        <div class="cityarchive-other__cont scfacility-inner__800">
          <h2 class="txt-18-28 txt-bold lh-1_35">高石市の施設種別ごとの費用相場</h2>
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
              <td><span class="market-price">21.9</span>万円</td>
              <td><span class="market-price">83.2</span>万円</td>
              <td><span class="market-price">10.0</span>万円</td>
              <td><span class="market-price">10.0</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">13.1</span>万円</td>
              <td><span class="market-price">15.5</span>万円</td>
              <td><span class="market-price">12.5</span>万円</td>
              <td><span class="market-price">13.4</span>万円</td>
              </tr>
              <tr>
              <td rowspan="2">介護付有料老人ホーム</td>
              <td>入居一時金</td>
              <td><span class="market-price">116.9</span>万円</td>
              <td><span class="market-price">597.9</span>万円</td>
              <td><span class="market-price">0.0</span>万円</td>
              <td><span class="market-price">5.0</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">15.6</span>万円</td>
              <td><span class="market-price">20.3</span>万円</td>
              <td><span class="market-price">14.4</span>万円</td>
              <td><span class="market-price">16.7</span>万円</td>
              </tr>
              <tr>
              <td rowspan="2">住宅型有料老人ホーム</td>
              <td>入居一時金</td>
              <td><span class="market-price">11.2</span>万円</td>
              <td><span class="market-price">34.2</span>万円</td>
              <td><span class="market-price">10.0</span>万円</td>
              <td><span class="market-price">10.0</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">12.0</span>万円</td>
              <td><span class="market-price">13.3</span>万円</td>
              <td><span class="market-price">11.5</span>万円</td>
              <td><span class="market-price">12.0</span>万円</td>
              </tr>
              <tr>
              <td rowspan="2">サービス付き高齢者向け住宅</td>
              <td>入居一時金</td>
              <td><span class="market-price">10.8</span>万円</td>
              <td><span class="market-price">19.3</span>万円</td>
              <td><span class="market-price">10.0</span>万円</td>
              <td><span class="market-price">10.0</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">13.4</span>万円</td>
              <td><span class="market-price">17.4</span>万円</td>
              <td><span class="market-price">12.6</span>万円</td>
              <td><span class="market-price">17.8</span>万円</td>
              </tr>
              <tr>
              <td rowspan="2">グループホーム</td>
              <td>入居一時金</td>
              <td><span class="market-price">11.4</span>万円</td>
              <td><span class="market-price">11.4</span>万円</td>
              <td><span class="market-price">13.5</span>万円</td>
              <td><span class="market-price">13.5</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">13.9</span>万円</td>
              <td><span class="market-price">13.9</span>万円</td>
              <td><span class="market-price">13.2</span>万円</td>
              <td><span class="market-price">13.2</span>万円</td>
              </tr>
              <tr>
              <td rowspan="2">高齢者住宅</td>
              <td>入居一時金</td>
              <td><span class="market-price">19.2</span>万円</td>
              <td><span class="market-price">20.5</span>万円</td>
              <td><span class="market-price">20.0</span>万円</td>
              <td><span class="market-price">20.0</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">11.5</span>万円</td>
              <td><span class="market-price">14.2</span>万円</td>
              <td><span class="market-price">11.3</span>万円</td>
              <td><span class="market-price">14.0</span>万円</td>
              </tr>
              </tbody>
            </table>
          </div>
          <p class="cityarchive-other__desc txt-13-16">※上記の費用相場は、自社調査に基づき作成しています。個別の施設によって費用は大きく異なりますので、あくまで目安としてご活用ください。</p>
        </div>
      </div>
      <div class="cityarchive-other__inner bg-white">
        <div class="cityarchive-other__cont scfacility-inner__800">
          <h2 class="txt-18-28 txt-bold lh-1_35"> 高石市の高齢者支援制度・相談窓口のご紹介</h2>
          <ul class="cityarchive-other__list">
            <li>
              <p class="cityarchive-other__list-ttl">高石市役所 健康福祉部 高齢介護課</p>
              <p class="cityarchive-other__list-txt">介護保険の申請手続きや介護サービス、高齢者支援制度に関する情報提供や相談の総合窓口です。</p>
            </li>
            <li>
              <p class="cityarchive-other__list-ttl">地域包括支援センター</p>
              <p class="cityarchive-other__list-txt">高齢者の身近な相談窓口として、介護、福祉、健康、医療など様々な面から支援を行っています。高石市内には複数のセンターがあり、お住まいの地域によって担当が異なります。</p>
            </li>
            <li>
              <p class="cityarchive-other__list-ttl">高齢者向け見守り活動</p>
              <p class="cityarchive-other__list-txt">地域の団体やボランティアによる見守り活動が行われており、一人暮らしの高齢者などが安心して暮らせるようサポートしています。</p>
            </li>
            <li>
              <p class="cityarchive-other__list-ttl">高石市社会福祉協議会</p>
              <p class="cityarchive-other__list-txt">住民が主体となった福祉活動を推進しており、ボランティア活動への参加や、高齢者向けの様々な催しを開催しています。</p>
            </li>
          </ul>
        </div>
      </div>
      <div class="cityarchive-other__inner bg-white">
        <div class="cityarchive-other__cont scfacility-inner__960">
          <h2 class="txt-18-28 txt-bold lh-1_35">高石市の近隣エリアのご紹介</h2>
          <ul class="scarea__list">
            <li>
              <a href="/facility-list/osaka/sakaicity">
                <div class="scarea__list-image">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/image/scfacility/sakai.webp" alt="エリア施設">
                </div>
                <div class="scarea__list-info">
                  <h4 class="scarea__list-ttl scfacility__left-border-ttl txt-bold lh-1_5">堺市</h4>
                  <p class="scarea__list-txt txt-13-16 lh-1_5">世界遺産・百舌鳥古墳群を有する政令指定都市。歴史的な風情と都市機能が融合し、医療や福祉も充実した住みよい街です。</p>
                  <div class="scarea__list-btn txt-12-14 txt-bold lh-1_5 txt-white bg-orange-gradiate-reverse">堺市の老人ホーム・施設一覧</div>
                </div>
              </a>
            </li>
            <li>
              <a href="/facility-list/osaka/matsubaracity">
                <div class="scarea__list-image">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/image/scfacility/matsubara.webp" alt="エリア施設">
                </div>
                <div class="scarea__list-info">
                  <h4 class="scarea__list-ttl scfacility__left-border-ttl txt-bold lh-1_5">松原市</h4>
                  <p class="scarea__list-txt txt-13-16 lh-1_5">大阪市に隣接し、南大阪の交通の要衝として発展。活気ある商店街や親しみやすい地域性が魅力の、温かい街です。</p>
                  <div class="scarea__list-btn txt-12-14 txt-bold lh-1_5 txt-white bg-orange-gradiate-reverse">松原市の老人ホーム・施設一覧</div>
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
