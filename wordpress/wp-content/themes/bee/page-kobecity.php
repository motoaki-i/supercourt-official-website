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
  $fixed_meta_value = 'kobecity';
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
          <h2 class="txt-18-28 txt-bold lh-1_35">神戸市の概況と高齢化の現状</h2>
          <h3 class="scfacility__left-border-ttl txt-15-22 txt-bold">市の概況</h3>
          <p class="cityarchive-other__txt">神戸市は、1995年の阪神・淡路大震災から見事に復興を遂げ、現在では活気あふれる国際都市として発展しています。その暮らしやすさは世界的にも評価されており、2012年にはスイスのECAインターナショナル社による「世界で最も住みやすい都市」ランキングでアジアの都市として最高位の5位に選ばれました。</p>
          <h3 class="txt-15-22 txt-bold">高齢化の状況</h3>
          <p class="cityarchive-other__txt">神戸市の高齢化率（65歳以上人口の割合）は、令和6年（2024年）4月1日時点で29.9%となっており、全国平均（29.1% ※令和5年10月1日時点）とほぼ同水準ですが、後期高齢者（75歳以上）の人口は増加傾向にあります。このような状況の中、神戸市は兵庫県内の高齢者施設の約4割が集まる、選択肢が非常に豊富な都市です。</p>
          <p class="cityarchive-other__txt">数だけでなく種類も多岐にわたり、ご自身のニーズに合った施設を見つけやすいのが大きな特徴と言えます。有料老人ホームは、豪華な設備や手厚いサービスを提供する施設から、比較的利用しやすい費用の施設まで幅広く存在します。「高級住宅街」というイメージが強い神戸市ですが、予算に応じた施設選びが可能です。市は今後も医療・介護・住宅の連携を推進し、サービス付き高齢者向け住宅の整備や公共交通機関のバリアフリー化など、高齢者に優しい街づくりを積極的に進めています。</p>
        </div>
      </div>

      <div class="cityarchive-other__inner bg-white">
        <div class="cityarchive-other__cont scfacility-inner__800">
          <h2 class="txt-18-28 txt-bold lh-1_35">神戸市の施設種別ごとの費用相場</h2>
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
              <td><span class="market-price">140.8</span>万円</td>
              <td><span class="market-price">782.7</span>万円</td>
              <td><span class="market-price">18.0</span>万円</td>
              <td><span class="market-price">20.7</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">16.6</span>万円</td>
              <td><span class="market-price">21.7</span>万円</td>
              <td><span class="market-price">15.8</span>万円</td>
              <td><span class="market-price">17.0</span>万円</td>
              </tr>
              <tr>
              <td rowspan="2">介護付有料老人ホーム</td>
              <td>入居一時金</td>
              <td><span class="market-price">440.4</span>万円</td>
              <td><span class="market-price">2835.3</span>万円</td>
              <td><span class="market-price">0.0</span>万円</td>
              <td><span class="market-price">625.0</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">20.3</span>万円</td>
              <td><span class="market-price">32.5</span>万円</td>
              <td><span class="market-price">19.0</span>万円</td>
              <td><span class="market-price">30.1</span>万円</td>
              </tr>
              <tr>
              <td rowspan="2">住宅型有料老人ホーム</td>
              <td>入居一時金</td>
              <td><span class="market-price">85.5</span>万円</td>
              <td><span class="market-price">399.2</span>万円</td>
              <td><span class="market-price">20.0</span>万円</td>
              <td><span class="market-price">25.1</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">16.5</span>万円</td>
              <td><span class="market-price">24.3</span>万円</td>
              <td><span class="market-price">14.8</span>万円</td>
              <td><span class="market-price">17.0</span>万円</td>
              </tr>
              <tr>
              <td rowspan="2">サービス付き高齢者向け住宅</td>
              <td>入居一時金</td>
              <td><span class="market-price">63.6</span>万円</td>
              <td><span class="market-price">164.9</span>万円</td>
              <td><span class="market-price">17.1</span>万円</td>
              <td><span class="market-price">20.0</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">16.2</span>万円</td>
              <td><span class="market-price">19.6</span>万円</td>
              <td><span class="market-price">16.2</span>万円</td>
              <td><span class="market-price">18.3</span>万円</td>
              </tr>
              <tr>
              <td rowspan="2">グループホーム</td>
              <td>入居一時金</td>
              <td><span class="market-price">17.3</span>万円</td>
              <td><span class="market-price">17.9</span>万円</td>
              <td><span class="market-price">18.0</span>万円</td>
              <td><span class="market-price">18.8</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">14.4</span>万円</td>
              <td><span class="market-price">14.5</span>万円</td>
              <td><span class="market-price">13.9</span>万円</td>
              <td><span class="market-price">13.9</span>万円</td>
              </tr>
              <tr>
              <td rowspan="2">ケアハウス</td>
              <td>入居一時金</td>
              <td><span class="market-price">34.2</span>万円</td>
              <td><span class="market-price">104.2</span>万円</td>
              <td><span class="market-price">0.0</span>万円</td>
              <td><span class="market-price">30.0</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">16.4</span>万円</td>
              <td><span class="market-price">20.6</span>万円</td>
              <td><span class="market-price">15.7</span>万円</td>
              <td><span class="market-price">20.4</span>万円</td>
              </tr>
              <tr>
              <td rowspan="2">高齢者住宅</td>
              <td>入居一時金</td>
              <td><span class="market-price">31.2</span>万円</td>
              <td><span class="market-price">36.1</span>万円</td>
              <td><span class="market-price">30.0</span>万円</td>
              <td><span class="market-price">32.8</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">11.3</span>万円</td>
              <td><span class="market-price">14.6</span>万円</td>
              <td><span class="market-price">11.2</span>万円</td>
              <td><span class="market-price">12.6</span>万円</td>
              </tr>
              </tbody>
            </table>
          </div>
          <p class="cityarchive-other__desc txt-13-16">※上記は自社調査による目安の金額です。費用は施設の立地、設備、サービス内容、居室の広さなどによって大きく変動します。 特に神戸市では、都心部の好立地や豪華な設備を備えた施設で、高額な入居一時金を設定しているケースも見られます。</p>
        </div>
      </div>

      <div class="cityarchive-other__inner bg-white">
        <div class="cityarchive-other__cont scfacility-inner__800">
          <h2 class="txt-18-28 txt-bold lh-1_35">神戸市の高齢者支援制度・相談窓口のご紹介</h2>
          <ul class="cityarchive-other__list">
            <li>
              <p class="cityarchive-other__list-ttl">あんしんすこやかセンター（地域包括支援センター）業</p>
              <p class="cityarchive-other__list-txt">社会福祉士、保健師、主任ケアマネジャーなどが常駐し、高齢者の福祉や介護に関する総合相談窓口として機能しています。介護予防の相談から権利擁護支援（成年後見制度の活用支援など）まで、幅広い相談に対応しています。</p>
            </li>
            <li>
              <p class="cityarchive-other__list-ttl">一般介護予防事業</p>
              <p class="cityarchive-other__list-txt">65歳以上であれば誰でも参加できる事業で、市内各地の地域福祉センターなどで体操やレクリエーション、給食、専門職による介護予防講座などが開催されています。地域での生きがいづくりの場としても機能しています。</p>
            </li>
            <li>
              <p class="cityarchive-other__list-ttl">こうべ介護予防応援団</p>
              <p class="cityarchive-other__list-txt">神戸市の後援のもと、市民団体が介護予防の普及啓発に取り組む活動です。「介護予防ぱんだ」というマスコットを活用し、市民の介護予防への理解を促しています。</p>
            </li>
            <li>
              <p class="cityarchive-other__list-ttl">地域ケア会議</p>
              <p class="cityarchive-other__list-txt">あんしんすこやかセンターが中心となり、地域の専門職（ケアマネジャー、民生委員、介護事業者など）が集まり、高齢者支援のあり方について話し合う会議が各地で開催されています。</p>
            </li>
            <li>
              <p class="cityarchive-other__list-ttl">入退院支援の強化</p>
              <p class="cityarchive-other__list-txt">病院への入院から退院、そして在宅復帰までをスムーズに行うため、かかりつけ医や介護事業者、訪問看護、ケアマネジャーとの連携強化を図っています。</p>
            </li>
          </ul>
        </div>
      </div>

      <div class="cityarchive-other__inner bg-white">
        <div class="cityarchive-other__cont scfacility-inner__960">
          <h2 class="txt-18-28 txt-bold lh-1_35">神戸市の近隣エリアのご紹介</h2>
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
              <a href="/facility-list/hyougo/takarazukacity">
                <div class="scarea__list-image">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/image/scfacility/takarazuka.webp" alt="エリア施設">
                </div>
                <div class="scarea__list-info">
                  <h3 class="scarea__list-ttl scfacility__left-border-ttl txt-bold lh-1_5">宝塚市</h3>
                  <p class="scarea__list-txt txt-13-16 lh-1_5">宝塚歌劇団の本拠地として華やかな文化が薫る街。武庫川の清流と山並みに囲まれた、上品で落ち着いた住環境が魅力です。</p>
                  <div class="scarea__list-btn txt-12-14 txt-bold lh-1_5 txt-white bg-orange-gradiate-reverse">宝塚市の老人ホーム・施設一覧</div>
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
