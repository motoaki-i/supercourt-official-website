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
  $fixed_meta_value = 'matsubaracity';
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
          <h2 class="txt-18-28 txt-bold lh-1_35">松原市の概況と高齢化の現状</h2>
          <h3 class="scfacility__left-border-ttl txt-15-22 txt-bold">松原市の概況</h3>
          <p class="cityarchive-other__txt">大阪府のほぼ中央に位置する松原市は、大阪市と堺市に挟まれたベッドタウンとして発展してきました。市内には大きな産業はありませんが、その分、静かで落ち着いた住環境が魅力です。生活に必要な商業施設も充実しており、日常の買い物に困ることはありません。また、古墳や寺社仏閣といった歴史的な名所も点在し、都会の利便性と歴史・文化が融合した街として評価されています。</p>
          <h3 class="txt-15-22 txt-bold">松原市の高齢化の状況</h3>
          <p class="cityarchive-other__txt">松原市の人口は1980年代半ばをピークに減少傾向にありますが、高齢化は進行しています。令和7年（2025年）4月末時点の高齢化率（65歳以上人口の割合）は32.2%に達しており、大阪府全体の高齢化率（29.2% ※令和6年1月1日時点）を上回っています。それに伴い、要介護認定者数も増加しており、高齢者福祉の重要性が高まっています。</p>
        </div>
      </div>
      <div class="cityarchive-other__inner bg-white">
        <div class="cityarchive-other__cont scfacility-inner__800">
          <h2 class="txt-18-28 txt-bold lh-1_35">松原市の施設種別ごとの費用相場</h2>
          <p class="cityarchive-other__txt">以下の表は、松原市における各施設種別の入居一時金と月額利用料の相場です。これはあくまで目安であり、施設の立地、設備、提供されるサービス内容によって費用は大きく異なります。</p>
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
              <td><span class="market-price">18.0</span>万円</td>
              <td><span class="market-price">84.3</span>万円</td>
              <td><span class="market-price">10.0</span>万円</td>
              <td><span class="market-price">10.0</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">13.1</span>万円</td>
              <td><span class="market-price">15.3</span>万円</td>
              <td><span class="market-price">12.3</span>万円</td>
              <td><span class="market-price">13.1</span>万円</td>
              </tr>
              <tr>
              <td rowspan="2">介護付有料老人ホーム</td>
              <td>入居一時金</td>
              <td><span class="market-price">61.2</span>万円</td>
              <td><span class="market-price">432.4</span>万円</td>
              <td><span class="market-price">0.0</span>万円</td>
              <td><span class="market-price">0.0</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">17.1</span>万円</td>
              <td><span class="market-price">22.2</span>万円</td>
              <td><span class="market-price">16.6</span>万円</td>
              <td><span class="market-price">18.7</span>万円</td>
              </tr>
              <tr>
              <td rowspan="2">住宅型有料老人ホーム</td>
              <td>入居一時金</td>
              <td><span class="market-price">10.3</span>万円</td>
              <td><span class="market-price">34.8</span>万円</td>
              <td><span class="market-price">10.0</span>万円</td>
              <td><span class="market-price">10.0</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">11.7</span>万円</td>
              <td><span class="market-price">12.9</span>万円</td>
              <td><span class="market-price">11.3</span>万円</td>
              <td><span class="market-price">11.8</span>万円</td>
              </tr>
              <tr>
              <td rowspan="2">サービス付き高齢者向け住宅</td>
              <td>入居一時金</td>
              <td><span class="market-price">11.9</span>万円</td>
              <td><span class="market-price">17.2</span>万円</td>
              <td><span class="market-price">10.0</span>万円</td>
              <td><span class="market-price">10.0</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">13.7</span>万円</td>
              <td><span class="market-price">18.0</span>万円</td>
              <td><span class="market-price">12.7</span>万円</td>
              <td><span class="market-price">16.8</span>万円</td>
              </tr>
              <tr>
              <td rowspan="2">グループホーム</td>
              <td>入居一時金</td>
              <td><span class="market-price">9.0</span>万円</td>
              <td><span class="market-price">9.7</span>万円</td>
              <td><span class="market-price">10.0</span>万円</td>
              <td><span class="market-price">10.0</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">13.1</span>万円</td>
              <td><span class="market-price">13.2</span>万円</td>
              <td><span class="market-price">13.4</span>万円</td>
              <td><span class="market-price">13.5</span>万円</td>
              </tr>
              <tr>
              <td rowspan="2">ケアハウス</td>
              <td>入居一時金</td>
              <td><span class="market-price">34.0</span>万円</td>
              <td><span class="market-price">241.7</span>万円</td>
              <td><span class="market-price">20.0</span>万円</td>
              <td><span class="market-price">149.9</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">10.6</span>万円</td>
              <td><span class="market-price">16.0</span>万円</td>
              <td><span class="market-price">9.9</span>万円</td>
              <td><span class="market-price">15.3</span>万円</td>
              </tr>
              <tr>
              <td rowspan="2">高齢者住宅</td>
              <td>入居一時金</td>
              <td><span class="market-price">10.6</span>万円</td>
              <td><span class="market-price">16.6</span>万円</td>
              <td><span class="market-price">10.0</span>万円</td>
              <td><span class="market-price">10.0</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">9.7</span>万円</td>
              <td><span class="market-price">10.4</span>万円</td>
              <td><span class="market-price">9.8</span>万円</td>
              <td><span class="market-price">9.9</span>万円</td>
              </tr>
              </tbody>
            </table>
          </div>
          <p class="cityarchive-other__desc txt-13-16">※上記の費用相場は、自社調査に基づき作成しています。個別の施設によって費用は大きく異なりますので、あくまで目安としてご活用ください。</p>
        </div>
      </div>
      <div class="cityarchive-other__inner bg-white">
        <div class="cityarchive-other__cont scfacility-inner__800">
          <h2 class="txt-18-28 txt-bold lh-1_35"> 松原市の高齢者支援制度・相談窓口のご紹介</h2>
          <ul class="cityarchive-other__list">
            <li>
              <p class="cityarchive-other__list-ttl">地域包括支援センター</p>
              <p class="cityarchive-other__list-txt">高齢者の身近な総合相談窓口として、介護に関する相談、介護予防、権利擁護、医療機関との連携など、様々な支援を行っています。松原市には日常生活圏域ごとに複数のセンターが設置されています。</p>
            </li>
            <li>
              <p class="cityarchive-other__list-ttl">在宅生活を支えるサービス</p>
              <p class="cityarchive-other__list-txt">急病や災害時に備える「緊急通報システム」、栄養バランスのとれた食事を届ける「高齢者食事サービス事業」、紙おむつを支給する「家族介護用品支給事業」など、在宅での生活を支える多様なサービスが提供されています。</p>
            </li>
            <li>
              <p class="cityarchive-other__list-ttl">介護予防・生きがいづくり</p>
              <p class="cityarchive-other__list-txt">「いきいき介護予防事業」として、体力づくりや認知症予防の教室が開催されています。また、老人クラブや老人福祉センターを通じて、趣味や仲間づくりの場も提供されています。</p>
            </li>
            <li>
              <p class="cityarchive-other__list-ttl">見守り活動</p>
              <p class="cityarchive-other__list-txt">民生委員・児童委員による見守り活動や、地域の事業者と連携した「高齢者見守り協力事業」など、地域全体で高齢者を支える体制づくりが進められています。</p>
            </li>
          </ul>
        </div>
      </div>
      <div class="cityarchive-other__inner bg-white">
        <div class="cityarchive-other__cont scfacility-inner__960">
          <h2 class="txt-18-28 txt-bold lh-1_35">松原市の近隣エリアのご紹介</h2>
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
              <a href="/facility-list/osaka/yaocity">
                <div class="scarea__list-image">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/image/scfacility/yao.webp" alt="エリア施設">
                </div>
                <div class="scarea__list-info">
                  <h4 class="scarea__list-ttl scfacility__left-border-ttl txt-bold lh-1_5">八尾市</h4>
                  <p class="scarea__list-txt txt-13-16 lh-1_5">河内音頭の故郷として知られる歴史ある街。大型ショッピングモールなどの買い物環境も整い、生活の利便性が高いエリアです。</p>
                  <div class="scarea__list-btn txt-12-14 txt-bold lh-1_5 txt-white bg-orange-gradiate-reverse">八尾市の老人ホーム・施設一覧</div>
                </div>
              </a>
            </li>
            <li>
              <a href="/facility-list/osaka/osakacity">
                <div class="scarea__list-image">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/image/scfacility/osakajo.webp" alt="エリア施設">
                </div>
                <div class="scarea__list-info">
                  <h4 class="scarea__list-ttl scfacility__left-border-ttl txt-bold lh-1_5">大阪市</h4>
                  <p class="scarea__list-txt txt-13-16 lh-1_5">商業施設や高度医療機関が充実した西日本最大の都市。交通の便が非常に良く、都会的な利便性と安心感が両立するエリアです。</p>
                  <div class="scarea__list-btn txt-12-14 txt-bold lh-1_5 txt-white bg-orange-gradiate-reverse">大阪市の老人ホーム・施設一覧</div>
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
