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
  $fixed_meta_key   = 'area_shiga';
  $fixed_meta_value = 'rittocity';
  get_template_part(
    'template-parts/city-list',
    null,
    array(
      'fixed_meta_key'   => $fixed_meta_key,
      'fixed_meta_value' => $fixed_meta_value,
      'search_param_key' => 'area_shiga',
    )
  );
  ?>

  <section class="cityarchive-other bg-beige space-s">
    <div class="cityarchive-other__wrap wrap-m">

      <div class="cityarchive-other__inner bg-white">
        <div class="cityarchive-other__cont scfacility-inner__800">
          <h2 class="txt-18-28 txt-bold lh-1_35">栗東市のエリア別特徴と主要地名</h2>
          <ul class="cityarchive-other__list">
            <li>
              <p class="cityarchive-other__list-ttl">草津駅・栗東駅周辺エリア（大路・綣・下戸山など）</p>
              <p class="cityarchive-other__list-txt">JR草津駅東口側やJR栗東駅周辺は、再開発によりフラットな道が多く、車椅子での移動もスムーズです。大型商業施設（エイスクエアやアル・プラザ栗東）に近いため、外出を楽しみたい自立〜軽度の方に人気の高いエリアです。</p>
            </li>
            <li>
              <p class="cityarchive-other__list-ttl">手原・安養寺エリア（市役所周辺）</p>
              <p class="cityarchive-other__list-txt">JR草津線手原駅を中心とした、市役所や図書館が集まる行政の中心地です。古くからの住宅街で落ち着きがあり、地域密着型のグループホームや小規模多機能型居宅介護施設が充実しています。</p>
            </li>
            <li>
              <p class="cityarchive-other__list-ttl">金勝・南部エリア（御園・荒張など）</p>
              <p class="cityarchive-other__list-txt">豊かな緑に囲まれたエリアです。広大な敷地を活かした特別養護老人ホームや、開放的な眺望を楽しめる介護付有料老人ホームがあり、静かな環境で療養したい方に適しています。</p>
            </li>
          </ul>
        </div>
      </div>

      <div class="cityarchive-other__inner bg-white">
        <div class="cityarchive-other__cont scfacility-inner__800">
          <h2 class="txt-18-28 txt-bold lh-1_35">栗東市および近隣エリアの施設種別ごとの費用相場</h2>
          <div class="cityarchive-other__table">
            <table>
              <thead>
              <tr>
              <th>施設種別</th>
              <th>入居一時金（平均値）</th>
              <th>月額利用料（平均値）</th>
              </tr>
              </thead>
              <tbody>
              <tr>
              <td>介護付き有料老人ホーム</td>
              <td>873.9万円</td>
              <td>23.3万円</td>
              </tr>
              <tr>
              <td>住宅型有料老人ホーム</td>
              <td>35.0万円</td>
              <td>16.7万円</td>
              </tr>
              <tr>
              <td>サービス付き高齢者向け住宅</td>
              <td>15.6万円</td>
              <td>16.2万円</td>
              </tr>
              <tr>
              <td>グループホーム</td>
              <td>13.2万円</td>
              <td>14.9万円</td>
              </tr>
              <tr>
              <td>ケアハウス</td>
              <td>48.9万円</td>
              <td>12.0万円</td>
              </tr>
              <tr>
              <td>高齢者住宅</td>
              <td>8.0万円</td>
              <td>10.3万円</td>
              </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="cityarchive-other__inner bg-white">
        <div class="cityarchive-other__cont scfacility-inner__800">
          <h2 class="txt-18-28 txt-bold lh-1_35">栗東市の入居相談窓口のご紹介</h2>
          <ul class="cityarchive-other__list">
            <li>
              <p class="cityarchive-other__list-ttl">栗東市地域包括支援センター（市役所内・安養寺）</p>
              <p class="cityarchive-other__list-txt">保健師や社会福祉士などの専門職が常駐し、施設選びから介護予防まで、栗東市の福祉に関するあらゆる相談の起点となります。</p>
            </li>
            <li>
              <p class="cityarchive-other__list-ttl">栗東市役所 高齢福祉課（1階）</p>
              <p class="cityarchive-other__list-txt">介護保険の申請や、市内の高齢者向け住まいに関する資料提供を行っています。</p>
            </li>
          </ul>
        </div>
      </div>

    </div>
  </section>


<div class="scarchive-search space-s bg-beige space-m-bottom">
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

</main>

<?php get_footer(); ?>
