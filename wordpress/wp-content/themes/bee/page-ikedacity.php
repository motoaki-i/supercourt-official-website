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
  $fixed_meta_value = 'ikedacity';
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
          <h2 class="txt-18-28 txt-bold lh-1_35">池田市における老人ホームの概況と動向</h2>
          <h3 class="scfacility__left-border-ttl txt-15-22 txt-bold">池田市の概況</h3>
          <p class="cityarchive-other__txt">池田市は、大阪国際空港（伊丹空港）が利用できる交通の要衝であり、阪急電鉄の「宝塚本線」や「箕面線」が市内を走り、大阪の中心部へも約20分とアクセス抜群です。バス路線も充実しており、阪急バスや箕面市のコミュニティバス「オレンジゆずるバス」に加え、60歳以上の高齢者などが無料で乗車できる池田市の福祉巡回バスも運行しています。</p>
          <h3 class="txt-15-22 txt-bold">池田市の高齢化の状況</h3>
          <p class="cityarchive-other__txt">令和7年（2025年）4月末時点の人口は約10万3千人、高齢化率は29.3%で、全国平均（29.1% ※令和5年10月1日時点）と同水準です。市は高齢者福祉サービスを積極的に推進しており、介護保険サービスによる在宅介護サポートだけでなく、特別養護老人ホームなどの施設サービスも提供しています。</p>
          <p class="cityarchive-other__txt">また、池田市内には有料老人ホームも点在しており、高級志向の施設も見られます。入居時の費用は0円から数千万円、月額利用料も15万円台から40万円を超える施設まで幅広く、駅から近い、設備が充実しているなど、料金に見合った好条件の施設が豊富です。認知症対応や看取り対応が可能な施設も増えており、池田市は終の棲家として良い選択肢となるでしょう。</p>
        </div>
      </div>
      <div class="cityarchive-other__inner bg-white">
        <div class="cityarchive-other__cont scfacility-inner__800">
          <h2 class="txt-18-28 txt-bold lh-1_35">池田市の施設種別ごとの費用相場</h2>
          <p class="cityarchive-other__txt">池田市および近隣エリアの施設種別ごとの費用相場は以下の通りです。</p>
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
            <td><span class="market-price">45.3</span>万円</td>
            <td><span class="market-price">225.5</span>万円</td>
            <td><span class="market-price">10.0</span>万円</td>
            <td><span class="market-price">10.0</span>万円</td>
            </tr>
            <tr>
            <td>月額利用料</td>
            <td><span class="market-price">16.0</span>万円</td>
            <td><span class="market-price">20.0</span>万円</td>
            <td><span class="market-price">15.0</span>万円</td>
            <td><span class="market-price">17.3</span>万円</td>
            </tr>
            <tr>
            <td rowspan="2">介護付有料老人ホーム</td>
            <td>入居一時金</td>
            <td><span class="market-price">71.9</span>万円</td>
            <td><span class="market-price">621.8</span>万円</td>
            <td><span class="market-price">0.0</span>万円</td>
            <td><span class="market-price">10.0</span>万円</td>
            </tr>
            <tr>
            <td>月額利用料</td>
            <td><span class="market-price">20.5</span>万円</td>
            <td><span class="market-price">27.7</span>万円</td>
            <td><span class="market-price">19.4</span>万円</td>
            <td><span class="market-price">25.6</span>万円</td>
            </tr>
            <tr>
            <td rowspan="2">住宅型有料老人ホーム</td>
            <td>入居一時金</td>
            <td><span class="market-price">82.9</span>万円</td>
            <td><span class="market-price">393.8</span>万円</td>
            <td><span class="market-price">10.0</span>万円</td>
            <td><span class="market-price">10.0</span>万円</td>
            </tr>
            <tr>
            <td>月額利用料</td>
            <td><span class="market-price">14.2</span>万円</td>
            <td><span class="market-price">17.0</span>万円</td>
            <td><span class="market-price">13.1</span>万円</td>
            <td><span class="market-price">13.5</span>万円</td>
            </tr>
            <tr>
            <td rowspan="2">サービス付き高齢者向け住宅</td>
            <td>入居一時金</td>
            <td><span class="market-price">16.2</span>万円</td>
            <td><span class="market-price">19.1</span>万円</td>
            <td><span class="market-price">12.3</span>万円</td>
            <td><span class="market-price">18.2</span>万円</td>
            </tr>
            <tr>
            <td>月額利用料</td>
            <td><span class="market-price">16.5</span>万円</td>
            <td><span class="market-price">22.2</span>万円</td>
            <td><span class="market-price">15.9</span>万円</td>
            <td><span class="market-price">20.7</span>万円</td>
            </tr>
            <tr>
            <td rowspan="2">グループホーム</td>
            <td>入居一時金</td>
            <td><span class="market-price">15.5</span>万円</td>
            <td><span class="market-price">15.5</span>万円</td>
            <td><span class="market-price">10.0</span>万円</td>
            <td><span class="market-price">10.0</span>万円</td>
            </tr>
            <tr>
            <td>月額利用料</td>
            <td><span class="market-price">14.5</span>万円</td>
            <td><span class="market-price">14.6</span>万円</td>
            <td><span class="market-price">14.5</span>万円</td>
            <td><span class="market-price">14.7</span>万円</td>
            </tr>
            <tr>
            <td rowspan="2">ケアハウス</td>
            <td>入居一時金</td>
            <td><span class="market-price">15.0</span>万円</td>
            <td><span class="market-price">172.1</span>万円</td>
            <td><span class="market-price">15.0</span>万円</td>
            <td><span class="market-price">172.1</span>万円</td>
            </tr>
            <tr>
            <td>月額利用料</td>
            <td><span class="market-price">10.8</span>万円</td>
            <td><span class="market-price">14.2</span>万円</td>
            <td><span class="market-price">10.8</span>万円</td>
            <td><span class="market-price">14.2</span>万円</td>
            </tr>
            <tr>
            <td rowspan="2">高齢者住宅</td>
            <td>入居一時金</td>
            <td><span class="market-price">0.0</span>万円</td>
            <td><span class="market-price">0.0</span>万円</td>
            <td><span class="market-price">0.0</span>万円</td>
            <td><span class="market-price">0.0</span>万円</td>
            </tr>
            <tr>
            <td>月額利用料</td>
            <td><span class="market-price">21.8</span>万円</td>
            <td><span class="market-price">30.6</span>万円</td>
            <td><span class="market-price">21.8</span>万円</td>
            <td><span class="market-price">30.6</span>万円</td>
            </tr>
            </tbody>
            </table>
          </div>
          <p class="cityarchive-other__desc txt-13-16">※上記の費用相場は、自社調査に基づいた参考値です。個別の施設によって費用は大きく異なりますので、あくまで目安としてご活用ください。</p>
        </div>
      </div>
      <div class="cityarchive-other__inner bg-white">
        <div class="cityarchive-other__cont scfacility-inner__960">
          <h2 class="txt-18-28 txt-bold lh-1_35">池田市の近隣エリアのご紹介</h2>
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
