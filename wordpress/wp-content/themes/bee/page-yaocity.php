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
  $fixed_meta_value = 'yaocity';
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
          <h2 class="txt-18-28 txt-bold lh-1_35">八尾市の施設種別ごとの費用相場</h2>
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
              <td><span class="market-price">15.7</span>万円</td>
              <td><span class="market-price">71.1</span>万円</td>
              <td><span class="market-price">10.0</span>万円</td>
              <td><span class="market-price">10.0</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">13.0</span>万円</td>
              <td><span class="market-price">15.1</span>万円</td>
              <td><span class="market-price">12.1</span>万円</td>
              <td><span class="market-price">13.0</span>万円</td>
              </tr>
              <tr>
              <td rowspan="2">介護付有料老人ホーム</td>
              <td>入居一時金</td>
              <td><span class="market-price">48.2</span>万円</td>
              <td><span class="market-price">364.3</span>万円</td>
              <td><span class="market-price">0.0</span>万円</td>
              <td><span class="market-price">0.0</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">17.2</span>万円</td>
              <td><span class="market-price">21.8</span>万円</td>
              <td><span class="market-price">16.9</span>万円</td>
              <td><span class="market-price">18.6</span>万円</td>
              </tr>
              <tr>
              <td rowspan="2">住宅型有料老人ホーム</td>
              <td>入居一時金</td>
              <td><span class="market-price">10.1</span>万円</td>
              <td><span class="market-price">29.9</span>万円</td>
              <td><span class="market-price">10.0</span>万円</td>
              <td><span class="market-price">10.0</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">11.7</span>万円</td>
              <td><span class="market-price">12.9</span>万円</td>
              <td><span class="market-price">11.2</span>万円</td>
              <td><span class="market-price">11.8</span>万円</td>
              </tr>
              <tr>
              <td rowspan="2">サービス付き高齢者向け住宅</td>
              <td>入居一時金</td>
              <td><span class="market-price">11.8</span>万円</td>
              <td><span class="market-price">14.8</span>万円</td>
              <td><span class="market-price">10.0</span>万円</td>
              <td><span class="market-price">10.0</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">13.6</span>万円</td>
              <td><span class="market-price">17.9</span>万円</td>
              <td><span class="market-price">12.7</span>万円</td>
              <td><span class="market-price">16.4</span>万円</td>
              </tr>
              <tr>
              <td rowspan="2">グループホーム</td>
              <td>入居一時金</td>
              <td><span class="market-price">8.3</span>万円</td>
              <td><span class="market-price">9.0</span>万円</td>
              <td><span class="market-price">0.0</span>万円</td>
              <td><span class="market-price">10.0</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">12.8</span>万円</td>
              <td><span class="market-price">12.9</span>万円</td>
              <td><span class="market-price">13.3</span>万円</td>
              <td><span class="market-price">13.4</span>万円</td>
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
              <td><span class="market-price">9.9</span>万円</td>
              <td><span class="market-price">15.9</span>万円</td>
              <td><span class="market-price">10.0</span>万円</td>
              <td><span class="market-price">10.0</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">9.6</span>万円</td>
              <td><span class="market-price">10.1</span>万円</td>
              <td><span class="market-price">9.8</span>万円</td>
              <td><span class="market-price">9.9</span>万円</td>
              </tr>
              </tbody>
            </table>
          </div>
          <p class="cityarchive-other__desc txt-13-16">※上記は自社調査による目安の金額です。費用は施設の立地、設備、サービス内容、居室の広さなどによって大きく変動します。<br>特に八尾市では、入居一時金が0円の施設や、月額利用料が比較的安価な施設が豊富に存在し、初期費用を抑えたい方にとって選択肢が広がるでしょう。</p>
        </div>
      </div>
      <div class="cityarchive-other__inner bg-white">
        <div class="cityarchive-other__cont scfacility-inner__800">
          <h2 class="txt-18-28 txt-bold lh-1_35"> 八尾市の高齢者支援制度・相談窓口のご紹介</h2>
          <ul class="cityarchive-other__list">
            <li>
              <p class="cityarchive-other__list-ttl">相談窓口</p>
              <p class="cityarchive-other__list-txt">「地域包括支援センター」が、介護、福祉、健康、医療などに関する高齢者の総合相談窓口となっています。また、福祉サービスに関する総合的な相談窓口として「いきいきネット相談支援センター」も設置されています。</p>
            </li>
            <li>
              <p class="cityarchive-other__list-ttl">在宅生活の支援</p>
              <p class="cityarchive-other__list-txt">自宅をバリアフリー化する際の「高齢者住宅改造費助成」や、認知症の方の「徘徊高齢者家族支援サービス」など、在宅での生活を支える制度があります。</p>
            </li>
            <li>
              <p class="cityarchive-other__list-ttl">医療費の助成</p>
              <p class="cityarchive-other__list-txt">所得などの要件に応じて、医療費の自己負担額を軽減する「老人医療費助成制度」が利用できます。</p>
            </li>
            <li>
              <p class="cityarchive-other__list-ttl">見守り・権利擁護</p>
              <p class="cityarchive-other__list-txt">「高齢者見守りネットワーク」や、成年後見制度の利用支援を行う「権利擁護センター」があり、地域全体で高齢者の安全と権利を守る体制が整っています。</p>
            </li>
            <li>
              <p class="cityarchive-other__list-ttl">生きがい・社会参加</p>
              <p class="cityarchive-other__list-txt">仲間づくりや社会貢献活動を行う「高齢クラブ（老人クラブ）」への支援や、介護予防のための「河内音頭体操教室」など、生きがいを持って元気に過ごすための活動が盛んです。</p>
            </li>
          </ul>
        </div>
      </div>
      <div class="cityarchive-other__inner bg-white">
        <div class="cityarchive-other__cont scfacility-inner__960">
          <h2 class="txt-18-28 txt-bold lh-1_35">八尾市の近隣エリアのご紹介</h2>
          <ul class="scarea__list">
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
            <li>
              <a href="/facility-list/osaka/higashiosakacity">
                <div class="scarea__list-image">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/image/scfacility/shinishikiri.webp" alt="エリア施設">
                </div>
                <div class="scarea__list-info">
                  <h4 class="scarea__list-ttl scfacility__left-border-ttl txt-bold lh-1_5">東大阪市</h4>
                  <p class="scarea__list-txt txt-13-16 lh-1_5">モノづくりの街としての活気と、ラグビーの聖地としての顔を持つ元気な街。人情味あふれる温かい雰囲気が魅力です。</p>
                  <div class="scarea__list-btn txt-12-14 txt-bold lh-1_5 txt-white bg-orange-gradiate-reverse">東大阪市の老人ホーム・施設一覧</div>
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
