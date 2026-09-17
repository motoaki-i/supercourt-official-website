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
  $fixed_meta_value = 'ujicity';
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
          <h2 class="txt-18-28 txt-bold lh-1_35">宇治市の概況と高齢化の状況</h2>
          <h3 class="scfacility__left-border-ttl txt-15-22 txt-bold">宇治市の概況</h3>
          <p class="cityarchive-other__txt">宇治市は、京都府の南部に位置し、世界遺産の「平等院」や「宇治上神社」など数多くの歴史的遺産が点在する、緑豊かな美しい街です。銘茶「宇治茶」の産地としても全国的に有名で、歴史と自然が調和した魅力にあふれています。京都市へのアクセスも良く、ベッドタウンとしても発展してきました。</p>
          <h3 class="txt-15-22 txt-bold">宇治市の高齢化の状況</h3>
          <p class="cityarchive-other__txt">宇治市の高齢化率（65歳以上人口の割合）は、令和6年（2024年）5月1日時点で30.7%となっており、全国平均と同水準で推移しています。市は「年齢に関係なく楽しく暮らせる街づくり」を掲げ、多様な高齢者福祉サービスを展開しています。</p>
        </div>
      </div>

      <div class="cityarchive-other__inner bg-white">
        <div class="cityarchive-other__cont scfacility-inner__800">
          <h2 class="txt-18-28 txt-bold lh-1_35">宇治市の施設種別ごとの費用相場</h2>
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
              <td><span class="market-price">9.9</span>万円</td>
              <td><span class="market-price">59.3</span>万円</td>
              <td><span class="market-price">11.8</span>万円</td>
              <td><span class="market-price">13.6</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">14.8</span>万円</td>
              <td><span class="market-price">17.9</span>万円</td>
              <td><span class="market-price">14.6</span>万円</td>
              <td><span class="market-price">16.0</span>万円</td>
              </tr>
              <tr>
              <td rowspan="2">介護付有料老人ホーム</td>
              <td>入居一時金</td>
              <td><span class="market-price">0.0</span>万円</td>
              <td><span class="market-price">0.0</span>万円</td>
              <td><span class="market-price">0.0</span>万円</td>
              <td><span class="market-price">0.0</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">18.6</span>万円</td>
              <td><span class="market-price">18.6</span>万円</td>
              <td><span class="market-price">18.6</span>万円</td>
              <td><span class="market-price">18.6</span>万円</td>
              </tr>
              <tr>
              <td rowspan="2">住宅型有料老人ホーム</td>
              <td>入居一時金</td>
              <td><span class="market-price">8.6</span>万円</td>
              <td><span class="market-price">281.6</span>万円</td>
              <td><span class="market-price">8.0</span>万円</td>
              <td><span class="market-price">17.2</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">13.9</span>万円</td>
              <td><span class="market-price">19.3</span>万円</td>
              <td><span class="market-price">12.8</span>万円</td>
              <td><span class="market-price">16.9</span>万円</td>
              </tr>
              <tr>
              <td rowspan="2">サービス付き高齢者向け住宅</td>
              <td>入居一時金</td>
              <td><span class="market-price">11.3</span>万円</td>
              <td><span class="market-price">16.7</span>万円</td>
              <td><span class="market-price">10.9</span>万円</td>
              <td><span class="market-price">11.0</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">15.3</span>万円</td>
              <td><span class="market-price">20.8</span>万円</td>
              <td><span class="market-price">14.6</span>万円</td>
              <td><span class="market-price">17.0</span>万円</td>
              </tr>
              <tr>
              <td rowspan="2">グループホーム</td>
              <td>入居一時金</td>
              <td><span class="market-price">9.4</span>万円</td>
              <td><span class="market-price">9.4</span>万円</td>
              <td><span class="market-price">13.6</span>万円</td>
              <td><span class="market-price">13.6</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">15.0</span>万円</td>
              <td><span class="market-price">15.0</span>万円</td>
              <td><span class="market-price">14.8</span>万円</td>
              <td><span class="market-price">14.8</span>万円</td>
              </tr>
              <tr>
              <td rowspan="2">ケアハウス</td>
              <td>入居一時金</td>
              <td><span class="market-price">20.0</span>万円</td>
              <td><span class="market-price">20.0</span>万円</td>
              <td><span class="market-price">20.0</span>万円</td>
              <td><span class="market-price">20.0</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">8.4</span>万円</td>
              <td><span class="market-price">14.3</span>万円</td>
              <td><span class="market-price">8.4</span>万円</td>
              <td><span class="market-price">14.3</span>万円</td>
              </tr>
              </tbody>
            </table>
          </div>
          <p class="cityarchive-other__desc txt-13-16">上記の表は平均値ですが、宇治市内には入居一時金が0円の施設も多く存在します。 ご自身の予算に合わせた施設選びが重要です。</p>
        </div>
      </div>

      <div class="cityarchive-other__inner bg-white">
        <div class="cityarchive-other__cont scfacility-inner__800">
          <h2 class="txt-18-28 txt-bold lh-1_35">宇治市の高齢者支援制度・相談窓口のご紹介</h2>
          <ul class="cityarchive-other__list">
            <li>
              <p class="cityarchive-other__list-ttl">地域包括支援センター</p>
              <p class="cityarchive-other__list-txt">市内に7か所設置されており、高齢者の介護、福祉、健康、医療などに関する総合的な相談窓口となっています。主任ケアマネジャー、保健師、社会福祉士などの専門職が対応します。</p>
            </li>
            <li>
              <p class="cityarchive-other__list-ttl">介護予防・日常生活支援総合事業</p>
              <p class="cityarchive-other__list-txt">要支援認定を受けた方や、基本チェックリストで事業対象者と判定された方が、訪問型サービスや通所型サービス（デイサービス）などを利用できます。</p>
            </li>
            <li>
              <p class="cityarchive-other__list-ttl">老人園芸ひろば	</p>
              <p class="cityarchive-other__list-txt">高齢者が気軽に園芸を楽しめるよう、農地を低料金で貸し出しています。土に親しみながら、心身の健康維持や仲間づくりができる場です。</p>
            </li>
            <li>
              <p class="cityarchive-other__list-ttl">配食サービス</p>
              <p class="cityarchive-other__list-txt">食事の確保が困難な高齢者宅へ、栄養バランスの取れた食事を配達するとともに、安否確認を行います。</p>
            </li>
            <li>
              <p class="cityarchive-other__list-ttl">認知症支援</p>
              <p class="cityarchive-other__list-txt">認知症のご本人や家族を支える「認知症カフェ」の運営支援や、認知症に関する正しい知識を学ぶ「認知症サポーター養成講座」などを開催しています。</p>
            </li>
          </ul>
        </div>
      </div>
    
      <div class="cityarchive-other__inner bg-white">
        <div class="cityarchive-other__cont scfacility-inner__960">
          <h2 class="txt-18-28 txt-bold lh-1_35">宇治市の近隣エリアのご紹介</h2>
          <ul class="scarea__list">
            <li>
              <a href="/facility-list/kyoto/kyotocity">
                <div class="scarea__list-image">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/image/scfacility/olive_kyonishikyogoku.webp" alt="エリア施設">
                </div>
                <div class="scarea__list-info">
                  <h3 class="scarea__list-ttl scfacility__left-border-ttl txt-bold lh-1_5">京都市</h3>
                  <p class="scarea__list-txt txt-13-16 lh-1_5">千年の歴史と文化が息づく古都。四季折々の風情を感じられる寺社仏閣が身近にあり、落ち着きと賑わいが調和する街です。</p>
                  <div class="scarea__list-btn txt-12-14 txt-bold lh-1_5 txt-white bg-orange-gradiate-reverse">京都市の老人ホーム・施設一覧</div>
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
