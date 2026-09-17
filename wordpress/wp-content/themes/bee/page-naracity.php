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
  $fixed_meta_key   = 'area_nara';
  $fixed_meta_value = 'naracity';
  get_template_part(
    'template-parts/city-list',
    null,
    array(
      'fixed_meta_key'   => $fixed_meta_key,
      'fixed_meta_value' => $fixed_meta_value,
      'search_param_key' => 'area_nara',
    )
  );
  ?>

  <section class="cityarchive-other bg-beige space-s space-3l-bottom">
    <div class="cityarchive-other__wrap wrap-m">

      <div class="cityarchive-other__inner bg-white">
        <div class="cityarchive-other__cont scfacility-inner__800">
          <h2 class="txt-18-28 txt-bold lh-1_35">奈良市における老人ホームの概況と動向</h2>
          <h3 class="txt-15-22 txt-bold">奈良市の高齢化の状況</h3>
          <p class="cityarchive-other__txt">奈良市は、奈良県の県庁所在地であり、大阪府や京都府のベッドタウンとしての機能も担う中心都市です。<br>奈良県の高齢化率は全国平均を上回る水準で推移しており、奈良市においても高齢者人口は増加傾向にあります。2025年1月1日現在、奈良市の65歳以上の高齢者数は10万3,275人、高齢化率は29.6%となっています。特に75歳以上の後期高齢者の増加が著しく、介護サービスの需要は今後も高まる見込みです。</p>
          <p class="cityarchive-other__txt">このような状況を受け、奈良県では高齢者が住み慣れた地域で安心して暮らし続けられるよう「地域包括ケアシステム」の構築を進めています。具体的には、地域住民が主体となって運営する「通いの場」を設置し、社会参加を通じた介護予防を推進しています。医療、介護、予防、生活支援、住まいを一体的に提供する体制づくりが進められています。</p>
          <p class="cityarchive-other__txt">費用面では、奈良市は県内で比較すると相場が高い地域ですが、大阪などの大都市圏に比べると費用を抑えられる傾向があります。高価格帯の施設から、入居一時金が0円の施設まで選択肢が広く、予算に応じて探すことが可能です。</p>
        </div>
      </div>

      <div class="cityarchive-other__inner bg-white">
        <div class="cityarchive-other__cont scfacility-inner__800">
          <h2 class="txt-18-28 txt-bold lh-1_35">奈良市の施設種別ごとの費用相場</h2>
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
              <td><span class="market-price">39.0</span>万円</td>
              <td><span class="market-price">218.6</span>万円</td>
              <td><span class="market-price">5.0</span>万円</td>
              <td><span class="market-price">10.0</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">14.8</span>万円</td>
              <td><span class="market-price">18.7</span>万円</td>
              <td><span class="market-price">14.0</span>万円</td>
              <td><span class="market-price">15.4</span>万円</td>
              </tr>
              <tr>
              <td rowspan="2">介護付有料老人ホーム</td>
              <td>入居一時金</td>
              <td><span class="market-price">61.0</span>万円</td>
              <td><span class="market-price">398.1</span>万円</td>
              <td><span class="market-price">0.0</span>万円</td>
              <td><span class="market-price">33.0</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">20.7</span>万円</td>
              <td><span class="market-price">27.1</span>万円</td>
              <td><span class="market-price">17.9</span>万円</td>
              <td><span class="market-price">22.9</span>万円</td>
              </tr>
              <tr>
              <td rowspan="2">住宅型有料老人ホーム</td>
              <td>入居一時金</td>
              <td><span class="market-price">28.0</span>万円</td>
              <td><span class="market-price">323.4</span>万円</td>
              <td><span class="market-price">0.0</span>万円</td>
              <td><span class="market-price">10.0</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">13.8</span>万円</td>
              <td><span class="market-price">18.9</span>万円</td>
              <td><span class="market-price">13.5</span>万円</td>
              <td><span class="market-price">15.1</span>万円</td>
              </tr>
              <tr>
              <td rowspan="2">サービス付き高齢者向け住宅</td>
              <td>入居一時金</td>
              <td><span class="market-price">92.9</span>万円</td>
              <td><span class="market-price">140.3</span>万円</td>
              <td><span class="market-price">10.5</span>万円</td>
              <td><span class="market-price">15.0</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">15.6</span>万円</td>
              <td><span class="market-price">18.6</span>万円</td>
              <td><span class="market-price">14.9</span>万円</td>
              <td><span class="market-price">18.2</span>万円</td>
              </tr>
              <tr>
              <td rowspan="2">グループホーム</td>
              <td>入居一時金</td>
              <td><span class="market-price">11.9</span>万円</td>
              <td><span class="market-price">11.9</span>万円</td>
              <td><span class="market-price">10.0</span>万円</td>
              <td><span class="market-price">10.0</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">13.8</span>万円</td>
              <td><span class="market-price">13.9</span>万円</td>
              <td><span class="market-price">13.5</span>万円</td>
              <td><span class="market-price">13.5</span>万円</td>
              </tr>
              <tr>
              <td rowspan="2">ケアハウス</td>
              <td>入居一時金</td>
              <td><span class="market-price">9.0</span>万円</td>
              <td><span class="market-price">9.0</span>万円</td>
              <td><span class="market-price">0.0</span>万円</td>
              <td><span class="market-price">0.0</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">8.4</span>万円</td>
              <td><span class="market-price">15.2</span>万円</td>
              <td><span class="market-price">8.5</span>万円</td>
              <td><span class="market-price">14.6</span>万円</td>
              </tr>
              <tr>
              <td rowspan="2">高齢者住宅</td>
              <td>入居一時金</td>
              <td><span class="market-price">8.0</span>万円</td>
              <td><span class="market-price">11.0</span>万円</td>
              <td><span class="market-price">9.0</span>万円</td>
              <td><span class="market-price">10.0</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">11.3</span>万円</td>
              <td><span class="market-price">13.4</span>万円</td>
              <td><span class="market-price">11.5</span>万円</td>
              <td><span class="market-price">12.5</span>万円</td>
              </tr>
              </tbody>
            </table>
          </div>
          <p class="cityarchive-other__desc txt-13-16">※上記の費用相場は、自社調査に基づいた参考値です。<br>奈良市の有料老人ホームは、入居一時金が0円の施設から数千万円の施設まで幅広く、ご自身の資金計画に合わせて選ぶことが可能です。<br>月額利用料も、基本的なサービス費に加えて、個別の介護ニーズに応じて介護保険サービスの自己負担分が加わるため、要介護度によって総額は変動します。</p>
        </div>
      </div>

      <div class="cityarchive-other__inner bg-white">
        <div class="cityarchive-other__cont scfacility-inner__800">
          <h2 class="txt-18-28 txt-bold lh-1_35">奈良市の高齢者支援制度・相談窓口のご紹介</h2>
          <ul class="cityarchive-other__list">
            <li>
              <p class="cityarchive-other__list-ttl">地域包括支援センター</p>
              <p class="cityarchive-other__list-txt">介護、福祉、健康、医療など、高齢者の様々な悩みに対する総合相談窓口です。市内各所に設置されており、社会福祉士、保健師、主任ケアマネジャーなどの専門職が無料で相談に応じます。</p>
            </li>
            <li>
              <p class="cityarchive-other__list-ttl">地域づくりによる介護予防</p>
              <p class="cityarchive-other__list-txt">地域の高齢者が気軽に集える「通いの場」を地域住民が主体となって設置し、介護予防に取り組んでいます。高知発祥の「いきいき百歳体操」なども各地で実施されています。</p>
            </li>
            <li>
              <p class="cityarchive-other__list-ttl">福祉サービスに関する相談窓口</p>
              <p class="cityarchive-other__list-txt">福祉サービスの利用に関する苦情や不満は、奈良県社会福祉協議会内に設置されている「奈良県運営適正化委員会」に相談できます。</p>
            </li>
          </ul>
        </div>
      </div>

      <div class="cityarchive-other__inner bg-white">
        <div class="cityarchive-other__cont scfacility-inner__960">
          <h2 class="txt-18-28 txt-bold lh-1_35">奈良市の近隣エリアのご紹介</h2>
          <ul class="scarea__list">
            <li>
              <a href="/facility-list/nara/yamatokoriyamacity">
                <div class="scarea__list-image">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/image/scfacility/koriyamatsutsui.webp" alt="エリア施設">
                </div>
                <div class="scarea__list-info">
                  <h3 class="scarea__list-ttl scfacility__left-border-ttl txt-bold lh-1_5">大和郡山市</h3>
                  <p class="scarea__list-txt txt-13-16 lh-1_5">金魚の街として知られる城下町。歴史的な情緒と昭和レトロな雰囲気が残り、のんびりと心安らぐ生活が送れます。</p>
                  <div class="scarea__list-btn txt-12-14 txt-bold lh-1_5 txt-white bg-orange-gradiate-reverse">大和郡山市の老人ホーム・施設一覧</div>
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
