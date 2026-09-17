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
  $fixed_meta_value = 'yamatokoriyamacity';
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
          <h2 class="txt-18-28 txt-bold lh-1_35">大和郡山市の概況と高齢化の動向</h2>
          <h3 class="txt-15-22 txt-bold">大和郡山市の概況</h3>
          <p class="cityarchive-other__txt">奈良県の北部に位置する大和郡山市は、奈良盆地北部の豊かな自然に恵まれた地域です。古くから金魚の養殖が盛んで、市内に点在する多くの池が独特の景観を形成しています。中心部は城下町の名残をとどめ、歴史と風情を感じさせます。交通はJR関西本線と近鉄橿原線が通り、大阪や京都へのアクセスも良好です。</p>
          <h3 class="txt-15-22 txt-bold">大和郡山市の高齢化の動向</h3>
          <p class="cityarchive-other__txt">特に、大和郡山市やその周辺の有料老人ホームは、都市部に比べて費用が比較的安価な傾向にあり、入居一時金が0円のプランや、月額利用料を抑えたプランを提供する施設も見られます。グループホームも家庭的な雰囲気が人気ですが、施設によっては空きがない場合もあります。</p>
          <p class="cityarchive-other__txt">市の推計によると、2024年4月1日時点の高齢化率は34.1%に達しており、全国平均（29.1% ※2023年10月1日時点）を上回る状況です。このような状況に対応するため、市は多様な高齢者福祉サービスを積極的に展開しています。</p>
        </div>
      </div>

      <div class="cityarchive-other__inner bg-white">
        <div class="cityarchive-other__cont scfacility-inner__800">
          <h2 class="txt-18-28 txt-bold lh-1_35">大和郡山市および近隣エリアの施設種別ごとの費用相場</h2>
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
              <td><span class="market-price">43.5</span>万円</td>
              <td><span class="market-price">247.4</span>万円</td>
              <td><span class="market-price">10.0</span>万円</td>
              <td><span class="market-price">10.0</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">15.2</span>万円</td>
              <td><span class="market-price">19.2</span>万円</td>
              <td><span class="market-price">14.5</span>万円</td>
              <td><span class="market-price">15.7</span>万円</td>
              </tr>
              <tr>
              <td rowspan="2">介護付有料老人ホーム</td>
              <td>入居一時金</td>
              <td><span class="market-price">66.1</span>万円</td>
              <td><span class="market-price">441.5</span>万円</td>
              <td><span class="market-price">0.0</span>万円</td>
              <td><span class="market-price">33.0</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">21.1</span>万円</td>
              <td><span class="market-price">26.6</span>万円</td>
              <td><span class="market-price">18.9</span>万円</td>
              <td><span class="market-price">22.5</span>万円</td>
              </tr>
              <tr>
              <td rowspan="2">住宅型有料老人ホーム</td>
              <td>入居一時金</td>
              <td><span class="market-price">29.9</span>万円</td>
              <td><span class="market-price">348.2</span>万円</td>
              <td><span class="market-price">0.0</span>万円</td>
              <td><span class="market-price">10.0</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">14.0</span>万円</td>
              <td><span class="market-price">19.4</span>万円</td>
              <td><span class="market-price">13.6</span>万円</td>
              <td><span class="market-price">15.5</span>万円</td>
              </tr>
              <tr>
              <td rowspan="2">サービス付き高齢者向け住宅</td>
              <td>入居一時金</td>
              <td><span class="market-price">96.9</span>万円</td>
              <td><span class="market-price">146.6</span>万円</td>
              <td><span class="market-price">11.0</span>万円</td>
              <td><span class="market-price">15.0</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">15.8</span>万円</td>
              <td><span class="market-price">19.0</span>万円</td>
              <td><span class="market-price">15.0</span>万円</td>
              <td><span class="market-price">19.8</span>万円</td>
              </tr>
              <tr>
              <td rowspan="2">グループホーム</td>
              <td>入居一時金</td>
              <td><span class="market-price">15.1</span>万円</td>
              <td><span class="market-price">15.1</span>万円</td>
              <td><span class="market-price">15.7</span>万円</td>
              <td><span class="market-price">15.7</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">14.4</span>万円</td>
              <td><span class="market-price">14.6</span>万円</td>
              <td><span class="market-price">14.5</span>万円</td>
              <td><span class="market-price">14.5</span>万円</td>
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
              <td><span class="market-price">7.5</span>万円</td>
              <td><span class="market-price">7.5</span>万円</td>
              <td><span class="market-price">7.5</span>万円</td>
              <td><span class="market-price">7.5</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">11.3</span>万円</td>
              <td><span class="market-price">11.4</span>万円</td>
              <td><span class="market-price">11.3</span>万円</td>
              <td><span class="market-price">11.4</span>万円</td>
              </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="cityarchive-other__inner bg-white">
        <div class="cityarchive-other__cont scfacility-inner__800">
          <h2 class="txt-18-28 txt-bold lh-1_35">大和郡山市の高齢者支援制度・相談窓口のご紹介</h2>
          <ul class="cityarchive-other__list">
            <li>
              <p class="cityarchive-other__list-ttl">地域包括支援センター</p>
              <p class="cityarchive-other__list-txt">高齢者のための総合相談窓口です。保健師、社会福祉士、主任ケアマネジャーなどの専門職が、介護予防や権利擁護、成年後見制度の利用支援など、様々な困りごとについて無料で相談に応じてくれます。</p>
            </li>
            <li>
              <p class="cityarchive-other__list-ttl">在宅福祉サービス</p>
              <p class="cityarchive-other__list-txt">配食サービスや緊急通報システムの設置、紙おむつの支給など、在宅での生活を支える市独自のサービスが充実しています。</p>
            </li>
            <li>
              <p class="cityarchive-other__list-ttl">生きがいづくり・介護予防</p>
              <p class="cityarchive-other__list-txt">高齢者向けの趣味の教室や教養講座、介護予防のための「いきいき筋力アップ教室」などを開催し、健康寿命を延ばすための取り組みを積極的に行っています。</p>
            </li>
            <li>
              <p class="cityarchive-other__list-ttl">認知症支援</p>
              <p class="cityarchive-other__list-txt">認知症の方とその家族が安心して暮らせるよう、早期発見・対応を行う「認知症初期集中支援チーム」の設置や、認知症カフェの開催など、多角的な支援を行っています。</p>
            </li>
          </ul>
        </div>
      </div>

      <div class="cityarchive-other__inner bg-white">
        <div class="cityarchive-other__cont scfacility-inner__960">
          <h2 class="txt-18-28 txt-bold lh-1_35">大和郡山市の近隣エリアのご紹介</h2>
          <ul class="scarea__list">
            <li>
              <a href="/facility-list/nara/naracity">
                <div class="scarea__list-image">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/image/scfacility/narashinomiya.webp" alt="エリア施設">
                </div>
                <div class="scarea__list-info">
                  <h3 class="scarea__list-ttl scfacility__left-border-ttl txt-bold lh-1_5">奈良市</h3>
                  <p class="scarea__list-txt txt-13-16 lh-1_5">東大寺や奈良公園など、国宝・世界遺産に囲まれた古都。豊かな自然と歴史の重みを感じながら、穏やかに暮らせるエリアです。</p>
                  <div class="scarea__list-btn txt-12-14 txt-bold lh-1_5 txt-white bg-orange-gradiate-reverse">奈良市の老人ホーム・施設一覧</div>
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
