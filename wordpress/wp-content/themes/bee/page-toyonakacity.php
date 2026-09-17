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
  $fixed_meta_value = 'toyonakacity';
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
          <h2 class="txt-18-28 txt-bold lh-1_35">豊中市のエリア別特徴と主要地名</h2>
          <ul class="cityarchive-other__list">
            <li>
              <p class="cityarchive-other__list-ttl">北大阪急行沿線エリア（千里中央・桃山台・緑地公園など）</p>
              <p class="cityarchive-other__list-txt">千里ニュータウンを中心とした、計画的に整備された美しい街並みが特徴です。駅周辺には大型商業施設や銀行が集まっており、利便性を最優先する方に人気です。このエリアは「高級老人ホーム」の激戦区でもあり、ホテルのような設備を備えた施設が多く見られます。</p>
            </li>
            <li>
              <p class="cityarchive-other__list-ttl">阪急宝塚線沿線エリア（豊中・岡町・曽根など）</p>
              <p class="cityarchive-other__list-txt">古くからの屋敷街や住宅地が広がり、下町情緒と気品が同居するエリアです。平坦な道が多く、徒歩圏内に商店街や公共施設があるため、自立〜軽度の方も安心して暮らせます。</p>
            </li>
            <li>
              <p class="cityarchive-other__list-ttl">北部・彩都エリア（少路など）</p>
              <p class="cityarchive-other__list-txt">大阪モノレール沿線や、北部の高台に位置するエリアです。眺望が良く、閑静な環境を好む方に適しています。比較的新しく、広々とした敷地を持つ施設が点在しています。</p>
            </li>
          </ul>
        </div>
      </div>
      <div class="cityarchive-other__inner bg-white">
        <div class="cityarchive-other__cont scfacility-inner__800">
          <h2 class="txt-18-28 txt-bold lh-1_35">豊中市の費用相場｜老人ホーム・介護施設の施設種別ごとの料金表</h2>
          <p class="cityarchive-other__txt">豊中市の老人ホームの費用は、施設の種類やサービス内容、立地によって大きく異なります。ここでは、主要な施設種別ごとの入居一時金と月額利用料の相場、そして費用に含まれるものと別途必要なもの、公的制度の活用について解説します。</p>
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
            <td><span class="market-price">20.3</span>万円</td>
            <td><span class="market-price">123.0</span>万円</td>
            <td><span class="market-price">10.0</span>万円</td>
            <td><span class="market-price">10.0</span>万円</td>
            </tr>
            <tr>
            <td>月額利用料</td>
            <td><span class="market-price">14.1</span>万円</td>
            <td><span class="market-price">16.8</span>万円</td>
            <td><span class="market-price">13.1</span>万円</td>
            <td><span class="market-price">14.2</span>万円</td>
            </tr>
            <tr>
            <td rowspan="2">介護付有料老人ホーム</td>
            <td>入居一時金</td>
            <td><span class="market-price">41.3</span>万円</td>
            <td><span class="market-price">491.4</span>万円</td>
            <td><span class="market-price">0.0</span>万円</td>
            <td><span class="market-price">0.0</span>万円</td>
            </tr>
            <tr>
            <td>月額利用料</td>
            <td><span class="market-price">18.2</span>万円</td>
            <td><span class="market-price">23.9</span>万円</td>
            <td><span class="market-price">18.3</span>万円</td>
            <td><span class="market-price">19.6</span>万円</td>
            </tr>
            <tr>
            <td rowspan="2">住宅型有料老人ホーム</td>
            <td>入居一時金</td>
            <td><span class="market-price">23.4</span>万円</td>
            <td><span class="market-price">108.0</span>万円</td>
            <td><span class="market-price">10.0</span>万円</td>
            <td><span class="market-price">10.0</span>万円</td>
            </tr>
            <tr>
            <td>月額利用料</td>
            <td><span class="market-price">12.5</span>万円</td>
            <td><span class="market-price">14.3</span>万円</td>
            <td><span class="market-price">11.8</span>万円</td>
            <td><span class="market-price">12.4</span>万円</td>
            </tr>
            <tr>
            <td rowspan="2">サービス付き高齢者向け住宅</td>
            <td>入居一時金</td>
            <td><span class="market-price">13.2</span>万円</td>
            <td><span class="market-price">17.7</span>万円</td>
            <td><span class="market-price">10.0</span>万円</td>
            <td><span class="market-price">10.0</span>万円</td>
            </tr>
            <tr>
            <td>月額利用料</td>
            <td><span class="market-price">15.2</span>万円</td>
            <td><span class="market-price">20.0</span>万円</td>
            <td><span class="market-price">14.3</span>万円</td>
            <td><span class="market-price">18.7</span>万円</td>
            </tr>
            <tr>
            <td rowspan="2">グループホーム</td>
            <td>入居一時金</td>
            <td><span class="market-price">10.3</span>万円</td>
            <td><span class="market-price">11.0</span>万円</td>
            <td><span class="market-price">10.0</span>万円</td>
            <td><span class="market-price">10.0</span>万円</td>
            </tr>
            <tr>
            <td>月額利用料</td>
            <td><span class="market-price">13.4</span>万円</td>
            <td><span class="market-price">13.5</span>万円</td>
            <td><span class="market-price">13.8</span>万円</td>
            <td><span class="market-price">13.9</span>万円</td>
            </tr>
            <tr>
            <td rowspan="2">ケアハウス</td>
            <td>入居一時金</td>
            <td><span class="market-price">27.7</span>万円</td>
            <td><span class="market-price">218.5</span>万円</td>
            <td><span class="market-price">20.0</span>万円</td>
            <td><span class="market-price">149.9</span>万円</td>
            </tr>
            <tr>
            <td>月額利用料</td>
            <td><span class="market-price">10.7</span>万円</td>
            <td><span class="market-price">15.4</span>万円</td>
            <td><span class="market-price">9.9</span>万円</td>
            <td><span class="market-price">15.3</span>万円</td>
            </tr>
            <tr>
            <td rowspan="2">高齢者住宅</td>
            <td>入居一時金</td>
            <td><span class="market-price">10.4</span>万円</td>
            <td><span class="market-price">16.5</span>万円</td>
            <td><span class="market-price">10.0</span>万円</td>
            <td><span class="market-price">10.0</span>万円</td>
            </tr>
            <tr>
            <td>月額利用料</td>
            <td><span class="market-price">10.2</span>万円</td>
            <td><span class="market-price">11.0</span>万円</td>
            <td><span class="market-price">9.9</span>万円</td>
            <td><span class="market-price">10.0</span>万円</td>
            </tr>
            </tbody>
            </table>
          </div>
          <p class="cityarchive-other__desc txt-13-16">※上記の費用相場は、自社調査に基づいた参考値です。個別の施設によって費用は大きく異なりますので、あくまで目安としてご活用ください。</p>
        </div>
      </div>
      <div class="cityarchive-other__inner bg-white">
        <div class="cityarchive-other__cont scfacility-inner__800">
          <h2 class="txt-18-28 txt-bold lh-1_35">豊中市の入居相談窓口のご紹介</h2>
          <ul class="cityarchive-other__list">
            <li>
              <p class="cityarchive-other__list-ttl">地域包括支援センター「ほっと」（市内各所）</p>
              <p class="cityarchive-other__list-txt">「千里中央」「豊中駅前」など、お住まいの地域ごとに担当が決まっており、地元の施設情報の収集に最適です。</p>
            </li>
            <li>
              <p class="cityarchive-other__list-ttl">豊中市役所 長寿社会推進課（中桜塚）</p>
              <p class="cityarchive-other__list-txt">有料老人ホームの設置届出情報の確認や、介護保険制度全般の相談を受け付けています。</p>
            </li>
          </ul>
        </div>
      </div>
      <div class="cityarchive-other__inner bg-white">
        <div class="cityarchive-other__cont scfacility-inner__960">
          <h2 class="txt-18-28 txt-bold lh-1_35">豊中市の近隣エリアのご紹介</h2>
          <ul class="scarea__list">
            <li>
              <a href="/facility-list/osaka/suitacity">
                <div class="scarea__list-image">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/image/scfacility/minamisenri.webp" alt="エリア施設">
                </div>
                <div class="scarea__list-info">
                  <h4 class="scarea__list-ttl scfacility__left-border-ttl txt-bold lh-1_5">吹田市</h4>
                  <p class="scarea__list-txt txt-13-16 lh-1_5">万博記念公園などの自然と、国立循環器病研究センターなどの医療都市機能が調和。住環境と安心の医療が揃う街です。</p>
                  <div class="scarea__list-btn txt-12-14 txt-bold lh-1_5 txt-white bg-orange-gradiate-reverse">吹田市の老人ホーム・施設一覧</div>
                </div>
              </a>
            </li>
            <li>
              <a href="/facility-list/osaka/minoocity">
                <div class="scarea__list-image">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/image/scfacility/onobara.webp" alt="エリア施設">
                </div>
                <div class="scarea__list-info">
                  <h4 class="scarea__list-ttl scfacility__left-border-ttl txt-bold lh-1_5">箕面市</h4>
                  <p class="scarea__list-txt txt-13-16 lh-1_5">箕面大滝などの豊かな自然と、落ち着いた街並みが魅力。四季の移ろいを感じながら、ゆったりと心豊かに暮らせるエリアです。</p>
                  <div class="scarea__list-btn txt-12-14 txt-bold lh-1_5 txt-white bg-orange-gradiate-reverse">箕面市の老人ホーム・施設一覧</div>
                </div>
              </a>
            </li>
            <li>
              <a href="/facility-list/osaka/ikedacity">
                <div class="scarea__list-image">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/image/scfacility/pre_ikeda.webp" alt="エリア施設">
                </div>
                <div class="scarea__list-info">
                  <h4 class="scarea__list-ttl scfacility__left-border-ttl txt-bold lh-1_5">池田市</h4>
                  <p class="scarea__list-txt txt-13-16 lh-1_5">五月山や猪名川など自然に恵まれた歴史ある庭園都市。大阪空港へのアクセスも良く、文化的な薫りと静けさが漂います。</p>
                  <div class="scarea__list-btn txt-12-14 txt-bold lh-1_5 txt-white bg-orange-gradiate-reverse">池田市の老人ホーム・施設一覧</div>
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
