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
  $fixed_meta_key   = 'area_hyougo';
  $fixed_meta_value = 'takarazukacity';
  get_template_part(
    'template-parts/city-list',
    null,
    array(
      'fixed_meta_key'   => $fixed_meta_key,
      'fixed_meta_value' => $fixed_meta_value,
      'search_param_key' => 'area_hyougo',
    )
  );
  ?>

  <section class="cityarchive-other bg-beige space-s space-3l-bottom">
    <div class="cityarchive-other__wrap wrap-m">

      <div class="cityarchive-other__inner bg-white">
        <div class="cityarchive-other__cont scfacility-inner__800">
          <h2 class="txt-18-28 txt-bold lh-1_35">宝塚市の概況と高齢化の現状</h2>
          <h3 class="scfacility__left-border-ttl txt-15-22 txt-bold">宝塚市の概況</h3>
          <p class="cityarchive-other__txt">宝塚市は兵庫県の南東部に位置し、阪急宝塚線や今津線が市内を通り、交通の利便性が高い街です。近年、全国的に人口減少が課題となる中、宝塚市の人口も緩やかな減少傾向にあります。</p>
          <h3 class="txt-15-22 txt-bold">宝塚市の高齢化の状況</h3>
          <p class="cityarchive-other__txt">令和7年（2025年）5月1日時点の推計人口は約22万2千人、65歳以上の高齢者人口は約6万7千人で、高齢化率は30.4%に達しています。このように増加する高齢者人口に対応するため、宝塚市は高齢者福祉に力を入れています。例えば、市社会福祉協議会が実施する「日常生活自立支援事業（宝塚市あんしんサポート）」では、福祉サービスの利用援助や日常的な金銭管理のお手伝いなど、きめ細やかなサポートを提供しています。</p>
          <p class="cityarchive-other__txt">一方で、高齢者数の増加に伴い、介護施設の需要も高まっています。特に公的施設である特別養護老人ホームは入居希望者が多く、すぐに入居することが難しい状況も見られます。</p>
        </div>
      </div>

      <div class="cityarchive-other__inner bg-white">
        <div class="cityarchive-other__cont scfacility-inner__800">
          <h2 class="txt-18-28 txt-bold lh-1_35">宝塚市の施設種別ごとの費用相場</h2>
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
              <td><span class="market-price">135.6</span>万円</td>
              <td><span class="market-price">946.0</span>万円</td>
              <td><span class="market-price">10.0</span>万円</td>
              <td><span class="market-price">25.0</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">18.5</span>万円</td>
              <td><span class="market-price">28.2</span>万円</td>
              <td><span class="market-price">17.9</span>万円</td>
              <td><span class="market-price">19.9</span>万円</td>
              </tr>
              <tr>
              <td rowspan="2">介護付有料老人ホーム</td>
              <td>入居一時金</td>
              <td><span class="market-price">398.6</span>万円</td>
              <td><span class="market-price">2100.2</span>万円</td>
              <td><span class="market-price">0.0</span>万円</td>
              <td><span class="market-price">480.0</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">20.2</span>万円</td>
              <td><span class="market-price">29.1</span>万円</td>
              <td><span class="market-price">20.3</span>万円</td>
              <td><span class="market-price">30.2</span>万円</td>
              </tr>
              <tr>
              <td rowspan="2">住宅型有料老人ホーム</td>
              <td>入居一時金</td>
              <td><span class="market-price">89.8</span>万円</td>
              <td><span class="market-price">2236.2</span>万円</td>
              <td><span class="market-price">86.3</span>万円</td>
              <td><span class="market-price">321.0</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">19.2</span>万円</td>
              <td><span class="market-price">63.0</span>万円</td>
              <td><span class="market-price">16.9</span>万円</td>
              <td><span class="market-price">26.8</span>万円</td>
              </tr>
              <tr>
              <td rowspan="2">サービス付き高齢者向け住宅</td>
              <td>入居一時金</td>
              <td><span class="market-price">18.8</span>万円</td>
              <td><span class="market-price">19.4</span>万円</td>
              <td><span class="market-price">13.9</span>万円</td>
              <td><span class="market-price">15.1</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">17.7</span>万円</td>
              <td><span class="market-price">18.8</span>万円</td>
              <td><span class="market-price">15.9</span>万円</td>
              <td><span class="market-price">17.9</span>万円</td>
              </tr>
              <tr>
              <td rowspan="2">グループホーム</td>
              <td>入居一時金</td>
              <td><span class="market-price">12.9</span>万円</td>
              <td><span class="market-price">12.9</span>万円</td>
              <td><span class="market-price">0.0</span>万円</td>
              <td><span class="market-price">0.0</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">17.4</span>万円</td>
              <td><span class="market-price">17.4</span>万円</td>
              <td><span class="market-price">17.1</span>万円</td>
              <td><span class="market-price">17.1</span>万円</td>
              </tr>
              </tbody>
            </table>
          </div>
          <p class="cityarchive-other__desc txt-13-16">※上記の費用相場は、自社調査に基づき作成しています。個別の施設によって費用は大きく異なりますので、あくまで目安としてご活用ください。</p>
        </div>
      </div>

      <div class="cityarchive-other__inner bg-white">
        <div class="cityarchive-other__cont scfacility-inner__800">
          <h2 class="txt-18-28 txt-bold lh-1_35">宝塚市の高齢者支援制度・相談窓口のご紹介</h2>
          <ul class="cityarchive-other__list">
            <li>
              <p class="cityarchive-other__list-ttl">地域包括支援センター</p>
              <p class="cityarchive-other__list-txt">高齢者の介護、福祉、健康、医療などに関する総合的な相談窓口です。市内7か所に設置されており、専門の職員が様々な相談に対応しています。</p>
            </li>
            <li>
              <p class="cityarchive-other__list-ttl">日常生活自立支援事業（宝塚市あんしんサポート）</p>
              <p class="cityarchive-other__list-txt">福祉サービスの利用手続きの援助や、日常的な金銭管理（預金の払い戻し、公共料金の支払いなど）を社会福祉協議会がお手伝いするサービスです（有料）。</p>
            </li>
            <li>
              <p class="cityarchive-other__list-ttl">いきがい支援事業</p>
              <p class="cityarchive-other__list-txt">老人クラブや老人福祉センターなどを拠点に、高齢者の社会参加や仲間づくりを支援しています。</p>
            </li>
            <li>
              <p class="cityarchive-other__list-ttl">介護予防事業</p>
              <p class="cityarchive-other__list-txt">閉じこもり予防のための訪問や、体力づくりのための体操教室などを開催し、高齢者が健康で自立した生活を送れるよう支援しています。</p>
            </li>
          </ul>
        </div>
      </div>
    
      <div class="cityarchive-other__inner bg-white">
        <div class="cityarchive-other__cont scfacility-inner__960">
          <h2 class="txt-18-28 txt-bold lh-1_35">宝塚市の近隣エリアのご紹介</h2>
          <ul class="scarea__list">
            <li>
              <a href="/facility-list/hyougo/kawanishicity">
                <div class="scarea__list-image">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/image/scfacility/minamihanayashiki.webp" alt="エリア施設">
                </div>
                <div class="scarea__list-info">
                  <h3 class="scarea__list-ttl scfacility__left-border-ttl txt-bold lh-1_5">川西市</h3>
                  <p class="scarea__list-txt txt-13-16 lh-1_5">「清和源氏発祥の地」として知られ、里山の自然とニュータウンが調和。大阪への通勤圏でありながら静かに暮らせる街です。</p>
                  <div class="scarea__list-btn txt-12-14 txt-bold lh-1_5 txt-white bg-orange-gradiate-reverse">川西市の老人ホーム・施設一覧</div>
                </div>
              </a>
            </li>
            <li>
              <a href="/facility-list/hyougo/amagasakicity">
                <div class="scarea__list-image">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/image/scfacility/inadera.webp" alt="エリア施設">
                </div>
                <div class="scarea__list-info">
                  <h3 class="scarea__list-ttl scfacility__left-border-ttl txt-bold lh-1_5">尼崎市</h3>
                  <p class="scarea__list-txt txt-13-16 lh-1_5">大阪・神戸のどちらへも電車で一本という抜群のアクセス。平坦な道が多く、買い物や通院など日々の移動が楽な街です。</p>
                  <div class="scarea__list-btn txt-12-14 txt-bold lh-1_5 txt-white bg-orange-gradiate-reverse">尼崎市の老人ホーム・施設一覧</div>
                </div>
              </a>
            </li>
            <li>
              <a href="/facility-list/hyougo/nishinomiyacity">
                <div class="scarea__list-image">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/image/scfacility/mondoyakujin-gallery01.webp" alt="エリア施設">
                </div>
                <div class="scarea__list-info">
                  <h3 class="scarea__list-ttl scfacility__left-border-ttl txt-bold lh-1_5">西宮市</h3>
                  <p class="scarea__list-txt txt-13-16 lh-1_5">大阪と神戸の中間に位置する人気の文教住宅都市。甲子園球場や酒蔵通りなど多彩な顔を持ち、洗練された暮らしが叶います。</p>
                  <div class="scarea__list-btn txt-12-14 txt-bold lh-1_5 txt-white bg-orange-gradiate-reverse">西宮市の老人ホーム・施設一覧</div>
                </div>
              </a>
            </li>
            <li>
              <a href="/facility-list/hyougo/kobecity">
                <div class="scarea__list-image">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/image/scfacility/kobekita.webp" alt="エリア施設">
                </div>
                <div class="scarea__list-info">
                  <h3 class="scarea__list-ttl scfacility__left-border-ttl txt-bold lh-1_5">神戸市</h3>
                  <p class="scarea__list-txt txt-13-16 lh-1_5">海と山に囲まれた美しい景観と、異国情緒あふれる港町。高度な医療機関も多く、都会的で洗練されたシニアライフを楽しめます。</p>
                  <div class="scarea__list-btn txt-12-14 txt-bold lh-1_5 txt-white bg-orange-gradiate-reverse">神戸市の老人ホーム・施設一覧</div>
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
