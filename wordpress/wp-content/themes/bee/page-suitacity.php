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
  $fixed_meta_value = 'suitacity';
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
          <h2 class="txt-18-28 txt-bold lh-1_35">吹田市のエリア別特徴と主要地名</h2>
          <ul class="cityarchive-other__list">
            <li>
              <p class="cityarchive-other__list-ttl">北部・千里エリア（千里中央・桃山台・古江台・藤白台など）</p>
              <p class="cityarchive-other__list-txt">千里ニュータウンを中心とした、日本屈指の高級住宅街です。坂道が多いものの、遊歩道が整備されており、緑豊かな環境で過ごせるのが特徴です。このエリアは「高級老人ホーム」の激戦区で、手厚い介護体制や豪華な共用部を備えた施設が多く見られます。</p>
            </li>
            <li>
              <p class="cityarchive-other__list-ttl">中央・健都エリア（岸部・千里丘など）</p>
              <p class="cityarchive-other__list-txt">JR岸部駅周辺は、国立循環器病研究センターの移転に伴い「健都」として再開発されました。「健康寿命を延ばす」というコンセプトのもと、医療連携が非常にスムーズな最新の高齢者向け住宅が増えています。</p>
            </li>
            <li>
              <p class="cityarchive-other__list-ttl">南部エリア（江坂・吹田・豊津など）</p>
              <p class="cityarchive-other__list-txt">江坂周辺は、大阪メトロ御堂筋線（北大阪急行）の利便性を活かした都市型エリアです。利便性が極めて高く、ご家族が仕事帰りに面会に寄りやすい施設が多いのが特徴です。JR吹田駅周辺は下町情緒があり、地域密着型のグループホームなども充実しています。</p>
            </li>
          </ul>
        </div>
      </div>
      <div class="cityarchive-other__inner bg-white">
        <div class="cityarchive-other__cont scfacility-inner__800">
          <h2 class="txt-18-28 txt-bold lh-1_35">吹田市の老人ホーム・介護施設の費用相場</h2>
          <p class="cityarchive-other__txt">吹田市の老人ホームの費用は、施設の種類やサービス内容、立地によって大きく異なります。ここでは、主要な施設種別の費用相場と、費用の内訳について解説します。</p>
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
            <td><span class="market-price">19.7</span>万円</td>
            <td><span class="market-price">111.8</span>万円</td>
            <td><span class="market-price">10.0</span>万円</td>
            <td><span class="market-price">10.0</span>万円</td>
            </tr>
            <tr>
            <td>月額利用料</td>
            <td><span class="market-price">14.0</span>万円</td>
            <td><span class="market-price">16.6</span>万円</td>
            <td><span class="market-price">13.0</span>万円</td>
            <td><span class="market-price">14.0</span>万円</td>
            </tr>
            <tr>
            <td rowspan="2">介護付有料老人ホーム</td>
            <td>入居一時金</td>
            <td><span class="market-price">42.5</span>万円</td>
            <td><span class="market-price">493.8</span>万円</td>
            <td><span class="market-price">0.0</span>万円</td>
            <td><span class="market-price">0.0</span>万円</td>
            </tr>
            <tr>
            <td>月額利用料</td>
            <td><span class="market-price">18.1</span>万円</td>
            <td><span class="market-price">23.8</span>万円</td>
            <td><span class="market-price">18.2</span>万円</td>
            <td><span class="market-price">19.5</span>万円</td>
            </tr>
            <tr>
            <td rowspan="2">住宅型有料老人ホーム</td>
            <td>入居一時金</td>
            <td><span class="market-price">21.2</span>万円</td>
            <td><span class="market-price">75.8</span>万円</td>
            <td><span class="market-price">10.0</span>万円</td>
            <td><span class="market-price">10.0</span>万円</td>
            </tr>
            <tr>
            <td>月額利用料</td>
            <td><span class="market-price">12.4</span>万円</td>
            <td><span class="market-price">14.0</span>万円</td>
            <td><span class="market-price">11.8</span>万円</td>
            <td><span class="market-price">12.4</span>万円</td>
            </tr>
            <tr>
            <td rowspan="2">サービス付き高齢者向け住宅</td>
            <td>入居一時金</td>
            <td><span class="market-price">12.9</span>万円</td>
            <td><span class="market-price">17.4</span>万円</td>
            <td><span class="market-price">10.0</span>万円</td>
            <td><span class="market-price">10.0</span>万円</td>
            </tr>
            <tr>
            <td>月額利用料</td>
            <td><span class="market-price">15.1</span>万円</td>
            <td><span class="market-price">19.8</span>万円</td>
            <td><span class="market-price">14.2</span>万円</td>
            <td><span class="market-price">18.4</span>万円</td>
            </tr>
            <tr>
            <td rowspan="2">グループホーム</td>
            <td>入居一時金</td>
            <td><span class="market-price">10.3</span>万円</td>
            <td><span class="market-price">11.1</span>万円</td>
            <td><span class="market-price">10.0</span>万円</td>
            <td><span class="market-price">10.0</span>万円</td>
            </tr>
            <tr>
            <td>月額利用料</td>
            <td><span class="market-price">13.3</span>万円</td>
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
            <td><span class="market-price">10.6</span>万円</td>
            <td><span class="market-price">16.7</span>万円</td>
            <td><span class="market-price">10.0</span>万円</td>
            <td><span class="market-price">10.0</span>万円</td>
            </tr>
            <tr>
            <td>月額利用料</td>
            <td><span class="market-price">10.1</span>万円</td>
            <td><span class="market-price">10.9</span>万円</td>
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
          <h2 class="txt-18-28 txt-bold lh-1_35">吹田市の入居相談窓口のご紹介</h2>
          <ul class="cityarchive-other__list">
            <li>
              <p class="cityarchive-other__list-ttl">吹田市地域包括支援センター（市内13か所）</p>
              <p class="cityarchive-other__list-txt">「吹田」「千里山」「山田」など、お住まいの地域ごとに細かく分かれており、近隣の施設の評判やリハビリ体制に詳しい専門職に相談できます。</p>
            </li>
            <li>
              <p class="cityarchive-other__list-ttl">吹田市役所 高齢福祉室（低層棟1階）</p>
              <p class="cityarchive-other__list-txt">介護保険の認定申請や、有料老人ホーム一覧・空き状況に関する公的情報の提供を行っています。</p>
            </li>
          </ul>
        </div>
      </div>
      <div class="cityarchive-other__inner bg-white">
        <div class="cityarchive-other__cont scfacility-inner__960">
          <h2 class="txt-18-28 txt-bold lh-1_35">吹田市の近隣エリアのご紹介</h2>
          <ul class="scarea__list">
            <li>
              <a href="/facility-list/osaka/toyonakacity">
                <div class="scarea__list-image">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/image/scfacility/senrichuou.webp" alt="エリア施設">
                </div>
                <div class="scarea__list-info">
                  <h4 class="scarea__list-ttl scfacility__left-border-ttl txt-bold lh-1_5">豊中市</h4>
                  <p class="scarea__list-txt txt-13-16 lh-1_5">大阪都心へのアクセスが良く、服部緑地など緑豊かな公園も点在。北摂エリアを代表する、閑静で人気のある住宅都市です。</p>
                  <div class="scarea__list-btn txt-12-14 txt-bold lh-1_5 txt-white bg-orange-gradiate-reverse">豊中市の老人ホーム・施設一覧</div>
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
