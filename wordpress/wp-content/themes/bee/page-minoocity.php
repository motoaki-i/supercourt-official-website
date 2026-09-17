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
  $fixed_meta_value = 'minoocity';
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
          <h2 class="txt-18-28 txt-bold lh-1_35">箕面市のエリア別特徴と主要地名</h2>
          <ul class="cityarchive-other__list">
            <li>
              <p class="cityarchive-other__list-ttl">新駅周辺エリア（箕面萱野・箕面船場阪大前など）</p>
              <p class="cityarchive-other__list-txt">北大阪急行の延伸により、梅田まで直通約25分圏内となりました。「みのおキューズモール」周辺はフラットな道が多く、最新の設備を備えたサービス付き高齢者向け住宅や有料老人ホームが集まっています。</p>
            </li>
            <li>
              <p class="cityarchive-other__list-ttl">阪急箕面線エリア（箕面・桜井・牧落など）</p>
              <p class="cityarchive-other__list-txt">古くからの高級住宅街として知られ、落ち着いた佇まいの施設が多いエリアです。商店街や市役所などの公共施設が徒歩圏内にあり、長年この地域に住み慣れた方が住み替えを希望されるケースが多く見られます。</p>
            </li>
            <li>
              <p class="cityarchive-other__list-ttl">彩都・粟生エリア（彩都西・小野原など）</p>
              <p class="cityarchive-other__list-txt">東部の彩都周辺は、ゆったりとした敷地を持つ大規模な施設が充実しています。自然が非常に近く、四季の移ろいを感じながら穏やかに過ごしたい方に最適な環境です。</p>
            </li>
          </ul>
        </div>
      </div>
      <div class="cityarchive-other__inner bg-white">
        <div class="cityarchive-other__cont scfacility-inner__800">
          <h2 class="txt-18-28 txt-bold lh-1_35">箕面市の主要な施設種別ごとの費用相場</h2>
          <p class="cityarchive-other__txt">箕面市および近隣エリアの施設種別ごとの費用相場は以下の通りです。</p>
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
            <td><span class="market-price">32.1</span>万円</td>
            <td><span class="market-price">207.8</span>万円</td>
            <td><span class="market-price">10.0</span>万円</td>
            <td><span class="market-price">10.0</span>万円</td>
            </tr>
            <tr>
            <td>月額利用料</td>
            <td><span class="market-price">15.9</span>万円</td>
            <td><span class="market-price">19.9</span>万円</td>
            <td><span class="market-price">15.0</span>万円</td>
            <td><span class="market-price">17.1</span>万円</td>
            </tr>
            <tr>
            <td rowspan="2">介護付有料老人ホーム</td>
            <td>入居一時金</td>
            <td><span class="market-price">46.1</span>万円</td>
            <td><span class="market-price">755.7</span>万円</td>
            <td><span class="market-price">0.0</span>万円</td>
            <td><span class="market-price">15.0</span>万円</td>
            </tr>
            <tr>
            <td>月額利用料</td>
            <td><span class="market-price">20.2</span>万円</td>
            <td><span class="market-price">28.1</span>万円</td>
            <td><span class="market-price">19.6</span>万円</td>
            <td><span class="market-price">23.5</span>万円</td>
            </tr>
            <tr>
            <td rowspan="2">住宅型有料老人ホーム</td>
            <td>入居一時金</td>
            <td><span class="market-price">53.0</span>万円</td>
            <td><span class="market-price">270.2</span>万円</td>
            <td><span class="market-price">10.0</span>万円</td>
            <td><span class="market-price">10.0</span>万円</td>
            </tr>
            <tr>
            <td>月額利用料</td>
            <td><span class="market-price">14.3</span>万円</td>
            <td><span class="market-price">17.2</span>万円</td>
            <td><span class="market-price">13.1</span>万円</td>
            <td><span class="market-price">13.5</span>万円</td>
            </tr>
            <tr>
            <td rowspan="2">サービス付き高齢者向け住宅</td>
            <td>入居一時金</td>
            <td><span class="market-price">14.7</span>万円</td>
            <td><span class="market-price">21.0</span>万円</td>
            <td><span class="market-price">10.0</span>万円</td>
            <td><span class="market-price">11.6</span>万円</td>
            </tr>
            <tr>
            <td>月額利用料</td>
            <td><span class="market-price">16.6</span>万円</td>
            <td><span class="market-price">21.8</span>万円</td>
            <td><span class="market-price">16.0</span>万円</td>
            <td><span class="market-price">20.5</span>万円</td>
            </tr>
            <tr>
            <td rowspan="2">グループホーム</td>
            <td>入居一時金</td>
            <td><span class="market-price">15.3</span>万円</td>
            <td><span class="market-price">15.3</span>万円</td>
            <td><span class="market-price">10.0</span>万円</td>
            <td><span class="market-price">10.0</span>万円</td>
            </tr>
            <tr>
            <td>月額利用料</td>
            <td><span class="market-price">14.6</span>万円</td>
            <td><span class="market-price">14.6</span>万円</td>
            <td><span class="market-price">14.5</span>万円</td>
            <td><span class="market-price">14.7</span>万円</td>
            </tr>
            <tr>
            <td rowspan="2">ケアハウス</td>
            <td>入居一時金</td>
            <td><span class="market-price">10.0</span>万円</td>
            <td><span class="market-price">114.7</span>万円</td>
            <td><span class="market-price">0.0</span>万円</td>
            <td><span class="market-price">0.0</span>万円</td>
            </tr>
            <tr>
            <td>月額利用料</td>
            <td><span class="market-price">9.3</span>万円</td>
            <td><span class="market-price">14.9</span>万円</td>
            <td><span class="market-price">8.7</span>万円</td>
            <td><span class="market-price">16.3</span>万円</td>
            </tr>
            <tr>
            <td rowspan="2">高齢者住宅</td>
            <td>入居一時金</td>
            <td><span class="market-price">11.8</span>万円</td>
            <td><span class="market-price">12.9</span>万円</td>
            <td><span class="market-price">12.8</span>万円</td>
            <td><span class="market-price">13.7</span>万円</td>
            </tr>
            <tr>
            <td>月額利用料</td>
            <td><span class="market-price">15.8</span>万円</td>
            <td><span class="market-price">19.8</span>万円</td>
            <td><span class="market-price">13.0</span>万円</td>
            <td><span class="market-price">14.2</span>万円</td>
            </tr>
            </tbody>
            </table>
          </div>
          <p class="cityarchive-other__desc txt-13-16">※上記の費用相場は、自社調査に基づいた参考値です。個別の施設によって費用は大きく異なりますので、あくまで目安としてご活用ください。</p>
        </div>
      </div>
      <div class="cityarchive-other__inner bg-white">
        <div class="cityarchive-other__cont scfacility-inner__800">
          <h2 class="txt-18-28 txt-bold lh-1_35">箕面市の入居相談窓口のご紹介</h2>
          <ul class="cityarchive-other__list">
            <li>
              <p class="cityarchive-other__list-ttl">箕面市地域包括支援センター（市内各所）</p>
              <p class="cityarchive-other__list-txt">各エリアのケアマネジャーや医療機関と密に連携しており、希望の条件に合うホームを公平な視点で提案してくれます。</p>
            </li>
            <li>
              <p class="cityarchive-other__list-ttl">箕面市役所 高齢福祉室（本館1階）</p>
              <p class="cityarchive-other__list-txt">介護保険の申請窓口であり、市内の有料老人ホーム一覧などの公的資料を入手できます。</p>
            </li>
          </ul>
        </div>
      </div>
      <div class="cityarchive-other__inner bg-white">
        <div class="cityarchive-other__cont scfacility-inner__960">
          <h2 class="txt-18-28 txt-bold lh-1_35">箕面市の近隣エリアのご紹介</h2>
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
