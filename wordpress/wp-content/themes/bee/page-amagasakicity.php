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
  $fixed_meta_value = 'amagasakicity';
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
          <h2 class="txt-18-28 txt-bold lh-1_35">尼崎市のエリア別特徴と主要地名</h2>
          <ul class="cityarchive-other__list">
            <li>
              <p class="cityarchive-other__list-ttl">北部エリア（阪急沿線：武庫之荘・塚口など）</p>
              <p class="cityarchive-other__list-txt">閑静な住宅街が広がる、落ち着いた環境が魅力です。バリアフリー化が進んだ「武庫之荘」周辺には、庭園付きの高級志向な住宅型有料老人ホームも点在しています。</p>
            </li>
            <li>
              <p class="cityarchive-other__list-ttl">中央エリア（JR沿線：立花・尼崎など）</p>
              <p class="cityarchive-other__list-txt">JR尼崎駅周辺の再開発により、利便性が飛躍的に向上しました。「あまがさきキューズモール」などの商業施設や大規模病院が集まっており、買い物や通院のしやすさを重視する方に選ばれています。</p>
            </li>
            <li>
              <p class="cityarchive-other__list-ttl">南部エリア（阪神沿線：出屋敷・尼崎・武庫川など）</p>
              <p class="cityarchive-other__list-txt">下町情緒が残り、地域コミュニティが活発です。比較的費用を抑えた介護付有料老人ホームや、昔ながらの繋がりを大切にするグループホームが充実しています。</p>
            </li>
          </ul>
        </div>
      </div>

      <div class="cityarchive-other__inner bg-white">
        <div class="cityarchive-other__cont scfacility-inner__800">
          <h2 class="txt-18-28 txt-bold lh-1_35">尼崎市の施設種別ごとの費用相場</h2>
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
              <td><span class="market-price">16.6</span>万円</td>
              <td><span class="market-price">57.6</span>万円</td>
              <td><span class="market-price">10.0</span>万円</td>
              <td><span class="market-price">11.1</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">14.8</span>万円</td>
              <td><span class="market-price">17.5</span>万円</td>
              <td><span class="market-price">13.9</span>万円</td>
              <td><span class="market-price">14.8</span>万円</td>
              </tr>
              <tr>
              <td rowspan="2">介護付有料老人ホーム</td>
              <td>入居一時金</td>
              <td><span class="market-price">25.6</span>万円</td>
              <td><span class="market-price">76.9</span>万円</td>
              <td><span class="market-price">0.0</span>万円</td>
              <td><span class="market-price">0.0</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">17.8</span>万円</td>
              <td><span class="market-price">21.3</span>万円</td>
              <td><span class="market-price">18.2</span>万円</td>
              <td><span class="market-price">18.2</span>万円</td>
              </tr>
              <tr>
              <td rowspan="2">住宅型有料老人ホーム</td>
              <td>入居一時金</td>
              <td><span class="market-price">18.7</span>万円</td>
              <td><span class="market-price">209.2</span>万円</td>
              <td><span class="market-price">10.0</span>万円</td>
              <td><span class="market-price">10.0</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">14.3</span>万円</td>
              <td><span class="market-price">19.4</span>万円</td>
              <td><span class="market-price">12.8</span>万円</td>
              <td><span class="market-price">14.0</span>万円</td>
              </tr>
              <tr>
              <td rowspan="2">サービス付き高齢者向け住宅</td>
              <td>入居一時金</td>
              <td><span class="market-price">16.7</span>万円</td>
              <td><span class="market-price">20.7</span>万円</td>
              <td><span class="market-price">10.8</span>万円</td>
              <td><span class="market-price">12.8</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">15.1</span>万円</td>
              <td><span class="market-price">18.1</span>万円</td>
              <td><span class="market-price">13.9</span>万円</td>
              <td><span class="market-price">16.9</span>万円</td>
              </tr>
              <tr>
              <td rowspan="2">グループホーム</td>
              <td>入居一時金</td>
              <td><span class="market-price">10.4</span>万円</td>
              <td><span class="market-price">10.4</span>万円</td>
              <td><span class="market-price">10.0</span>万円</td>
              <td><span class="market-price">10.0</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">14.6</span>万円</td>
              <td><span class="market-price">14.7</span>万円</td>
              <td><span class="market-price">14.5</span>万円</td>
              <td><span class="market-price">14.6</span>万円</td>
              </tr>
              <tr>
              <td rowspan="2">ケアハウス</td>
              <td>入居一時金</td>
              <td><span class="market-price">30.0</span>万円</td>
              <td><span class="market-price">30.0</span>万円</td>
              <td><span class="market-price">30.0</span>万円</td>
              <td><span class="market-price">30.0</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">11.7</span>万円</td>
              <td><span class="market-price">20.3</span>万円</td>
              <td><span class="market-price">11.7</span>万円</td>
              <td><span class="market-price">20.3</span>万円</td>
              </tr>
              <tr>
              <td rowspan="2">高齢者住宅</td>
              <td>入居一時金</td>
              <td><span class="market-price">12.8</span>万円</td>
              <td><span class="market-price">14.7</span>万円</td>
              <td><span class="market-price">9.8</span>万円</td>
              <td><span class="market-price">10.0</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">12.0</span>万円</td>
              <td><span class="market-price">12.6</span>万円</td>
              <td><span class="market-price">12.1</span>万円</td>
              <td><span class="market-price">12.1</span>万円</td>
              </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="cityarchive-other__inner bg-white">
        <div class="cityarchive-other__cont scfacility-inner__800">
          <h2 class="txt-18-28 txt-bold lh-1_35">尼崎市の入居相談窓口のご紹介</h2>
          <ul class="cityarchive-other__list">
            <li>
              <p class="cityarchive-other__list-ttl">地域包括支援センター（市内12か所）</p>
              <p class="cityarchive-other__list-txt">「武庫東」「園田北」など、日常生活圏域ごとに設置されており、地域の施設情報に精通した専門員に無料で相談できます。</p>
            </li>
            <li>
              <p class="cityarchive-other__list-ttl">尼崎市役所 高齢介護課（本庁北館3階）</p>
              <p class="cityarchive-other__list-txt">制度の仕組みや、市内の施設一覧などの公式資料を入手できます。</p>
            </li>
          </ul>
        </div>
      </div>
    
      <div class="cityarchive-other__inner bg-white">
        <div class="cityarchive-other__cont scfacility-inner__960">
          <h2 class="txt-18-28 txt-bold lh-1_35">尼崎市の近隣エリアのご紹介</h2>
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
