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
  $fixed_meta_value = 'kawanishicity';
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
          <h2 class="txt-18-28 txt-bold lh-1_35">川西市の概況と高齢化の動向</h2>
          <h3 class="scfacility__left-border-ttl txt-15-22 txt-bold">川西市の概況</h3>
          <p class="cityarchive-other__txt">川西市は兵庫県の南東部に位置し、大阪府に隣接しています。JR福知山線、阪急宝塚本線、能勢電鉄妙見線が市内を通り、交通の利便性が非常に高い地域です。大阪国際空港（伊丹空港）にも近く、遠方からのアクセスも良好です。</p>
          <h3 class="txt-15-22 txt-bold">川西市の高齢化の状況</h3>
          <p class="cityarchive-other__txt">川西市の高齢化は顕著で、令和7年（2025年）4月末時点の高齢化率（65歳以上人口の割合）は32.2％に達しており、全国平均（29.1% ※令和5年10月1日時点）や兵庫県平均（30.1% ※令和6年10月1日時点）を上回っています。令和5年度末の要介護・要支援認定者数は1万2千人を超えており、介護サービスの需要は年々高まっています。</p>
          <p class="cityarchive-other__txt">このような状況に対応するため、川西市では有料老人ホームやサービス付き高齢者向け住宅（サ高住）などの高齢者向け施設の整備が進んでいます。費用面では多様な選択肢があり、比較的安価な施設から手厚いサービスを提供する高価格帯の施設まで、ニーズや予算に合わせて選ぶことが可能です。</p>
        </div>
      </div>

      <div class="cityarchive-other__inner bg-white">
        <div class="cityarchive-other__cont scfacility-inner__800">
          <h2 class="txt-18-28 txt-bold lh-1_35">川西市の施設種別ごとの費用相場</h2>
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
              <td><span class="market-price">22.9</span>万円</td>
              <td><span class="market-price">25.2</span>万円</td>
              <td><span class="market-price">18.4</span>万円</td>
              <td><span class="market-price">20.0</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">15.9</span>万円</td>
              <td><span class="market-price">19.2</span>万円</td>
              <td><span class="market-price">15.6</span>万円</td>
              <td><span class="market-price">16.9</span>万円</td>
              </tr>
              <tr>
              <td rowspan="2">介護付有料老人ホーム</td>
              <td>入居一時金</td>
              <td><span class="market-price">4.3</span>万円</td>
              <td><span class="market-price">4.3</span>万円</td>
              <td><span class="market-price">0.0</span>万円</td>
              <td><span class="market-price">0.0</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">19.2</span>万円</td>
              <td><span class="market-price">21.7</span>万円</td>
              <td><span class="market-price">18.6</span>万円</td>
              <td><span class="market-price">18.6</span>万円</td>
              </tr>
              <tr>
              <td rowspan="2">住宅型有料老人ホーム</td>
              <td>入居一時金</td>
              <td><span class="market-price">21.7</span>万円</td>
              <td><span class="market-price">21.7</span>万円</td>
              <td><span class="market-price">30.0</span>万円</td>
              <td><span class="market-price">30.0</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">12.6</span>万円</td>
              <td><span class="market-price">12.6</span>万円</td>
              <td><span class="market-price">11.8</span>万円</td>
              <td><span class="market-price">11.8</span>万円</td>
              </tr>
              <tr>
              <td rowspan="2">サービス付き高齢者向け住宅</td>
              <td>入居一時金</td>
              <td><span class="market-price">43.5</span>万円</td>
              <td><span class="market-price">49.4</span>万円</td>
              <td><span class="market-price">19.7</span>万円</td>
              <td><span class="market-price">25.4</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">16.7</span>万円</td>
              <td><span class="market-price">22.4</span>万円</td>
              <td><span class="market-price">16.2</span>万円</td>
              <td><span class="market-price">21.2</span>万円</td>
              </tr>
              <tr>
              <td rowspan="2">グループホーム</td>
              <td>入居一時金</td>
              <td><span class="market-price">21.0</span>万円</td>
              <td><span class="market-price">21.0</span>万円</td>
              <td><span class="market-price">20.0</span>万円</td>
              <td><span class="market-price">20.0</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">14.8</span>万円</td>
              <td><span class="market-price">14.9</span>万円</td>
              <td><span class="market-price">15.1</span>万円</td>
              <td><span class="market-price">15.3</span>万円</td>
              </tr>
              <tr>
              <td rowspan="2">ケアハウス</td>
              <td>入居一時金</td>
              <td><span class="market-price">15.0</span>万円</td>
              <td><span class="market-price">15.0</span>万円</td>
              <td><span class="market-price">15.0</span>万円</td>
              <td><span class="market-price">15.0</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">9.3</span>万円</td>
              <td><span class="market-price">24.4</span>万円</td>
              <td><span class="market-price">9.3</span>万円</td>
              <td><span class="market-price">24.4</span>万円</td>
              </tr>
              <tr>
              <td rowspan="2">高齢者住宅</td>
              <td>入居一時金</td>
              <td><span class="market-price">17.5</span>万円</td>
              <td><span class="market-price">25.0</span>万円</td>
              <td><span class="market-price">17.5</span>万円</td>
              <td><span class="market-price">25.0</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">12.7</span>万円</td>
              <td><span class="market-price">18.4</span>万円</td>
              <td><span class="market-price">12.7</span>万円</td>
              <td><span class="market-price">18.4</span>万円</td>
              </tr>
              </tbody>
            </table>
          </div>
          <p class="cityarchive-other__desc txt-13-16">入居一時金が0円の施設では月額利用料がその分高めに、逆に高額な入居一時金を支払うことで月額利用料が抑えられるプランが設定されていることが一般的です。<br>費用は重要な要素ですが、金額だけで判断せず、サービス内容や介護体制とのバランスを総合的に見ることが大切です。</p>
        </div>
      </div>

      <div class="cityarchive-other__inner bg-white">
        <div class="cityarchive-other__cont scfacility-inner__800">
          <h2 class="txt-18-28 txt-bold lh-1_35">川西市の高齢者支援制度・相談窓口のご紹介</h2>
          <ul class="cityarchive-other__list">
            <li>
              <p class="cityarchive-other__list-ttl">地域包括支援センター</p>
              <p class="cityarchive-other__list-txt">市内に7か所設置されており、高齢者の介護、福祉、健康、医療などに関する総合的な相談窓口となっています。専門の職員が様々な相談に対応します。</p>
            </li>
            <li>
              <p class="cityarchive-other__list-ttl">在宅高齢者等紙おむつ給付事業</p>
              <p class="cityarchive-other__list-txt">常時おむつを必要とする在宅の高齢者に対し、紙おむつを現物支給する制度です（所得制限などの要件あり）。</p>
            </li>
            <li>
              <p class="cityarchive-other__list-ttl">ひとり暮らし高齢者等給食サービス事業</p>
              <p class="cityarchive-other__list-txt">調理が困難なひとり暮らしの高齢者などに、栄養バランスのとれた食事を配達するとともに、安否確認を行います。</p>
            </li>
            <li>
              <p class="cityarchive-other__list-ttl">高齢者等見守り・SOSネットワーク事業</p>
              <p class="cityarchive-other__list-txt">認知症などにより行方不明になる可能性のある方を事前に登録し、地域ぐるみで早期発見・保護に協力する仕組みです。</p>
            </li>
            <li>
              <p class="cityarchive-other__list-ttl">緊急通報システム設置事業</p>
              <p class="cityarchive-other__list-txt">ひとり暮らしの高齢者などの急病や災害時に、ボタン一つで受信センターに通報できる機器を設置する事業です。</p>
            </li>
          </ul>
        </div>
      </div>
    
      <div class="cityarchive-other__inner bg-white">
        <div class="cityarchive-other__cont scfacility-inner__960">
          <h2 class="txt-18-28 txt-bold lh-1_35">川西市の近隣エリアのご紹介</h2>
          <ul class="scarea__list">
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
