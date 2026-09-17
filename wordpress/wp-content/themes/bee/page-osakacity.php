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
  $fixed_meta_value = 'osakacity';
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
          <h2 class="txt-18-28 txt-bold lh-1_35">大阪市における老人ホームの概況と動向</h2>
          <h3 class="scfacility__left-border-ttl txt-15-22 txt-bold">大阪市の概況</h3>
          <p class="cityarchive-other__txt">大阪市は西日本における経済の中心地であり、人口の多さに比例して老人ホームの数も非常に多く、費用やサービス内容において幅広い選択肢があります。<br>特に老人ホームが集中しているのは、大阪市内では中央区や天王寺区、阿倍野区といった都心部や、吹田市、豊中市などの北摂地域です。</p>
          <h3 class="txt-15-22 txt-bold">大阪市の老人ホームの状況</h3>
          <p class="cityarchive-other__txt">これらの地域は地価も高く、それに伴い入居一時金が1,000万円以上、月額利用料も20万円～30万円以上するような高級志向の施設も存在します。<br>一方で、入居一時金が0円から数十万円、月額利用料も15万円前後という施設もあり、予算に応じて選択肢は豊富です。<br>また、近年では、比較的自立度の高い方向けの「サービス付き高齢者向け住宅（サ高住）」が急増しているのも大阪市の特徴です。<br>医療ニーズが高い方は、看護師の配置体制や協力医療機関との連携などを特に注意深く確認する必要があります。</p>
        </div>
      </div>

      <div class="cityarchive-other__inner bg-white">
        <div class="cityarchive-other__cont scfacility-inner__800">
          <h2 class="txt-18-28 txt-bold lh-1_35">大阪市の施設種別ごとの費用相場</h2>
          <p class="cityarchive-other__txt">大阪市の主要な施設種別ごとの入居一時金、月額利用料の費用相場は以下の通りです。</p>
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
                  <td><span class="market-price">15.8</span>万円</td>
                  <td><span class="market-price">91.1</span>万円</td>
                  <td><span class="market-price">10.0</span>万円</td>
                  <td><span class="market-price">10.0</span>万円</td>
                </tr>
                <tr>
                  <td>月額利用料</td>
                  <td><span class="market-price">13.3</span>万円</td>
                  <td><span class="market-price">15.5</span>万円</td>
                  <td><span class="market-price">12.5</span>万円</td>
                  <td><span class="market-price">13.3</span>万円</td>
                </tr>
                <tr>
                  <td rowspan="2">介護付有料老人ホーム</td>
                  <td>入居一時金</td>
                  <td><span class="market-price">39.9</span>万円</td>
                  <td><span class="market-price">410.5</span>万円</td>
                  <td><span class="market-price">0.0</span>万円</td>
                  <td><span class="market-price">0.0</span>万円</td>
                </tr>
                <tr>
                  <td>月額利用料</td>
                  <td><span class="market-price">17.6</span>万円</td>
                  <td><span class="market-price">22.5</span>万円</td>
                  <td><span class="market-price">17.6</span>万円</td>
                  <td><span class="market-price">18.9</span>万円</td>
                </tr>
                <tr>
                  <td rowspan="2">住宅型有料老人ホーム</td>
                  <td>入居一時金</td>
                  <td><span class="market-price">11.3</span>万円</td>
                  <td><span class="market-price">41.9</span>万円</td>
                  <td><span class="market-price">10.0</span>万円</td>
                  <td><span class="market-price">10.0</span>万円</td>
                </tr>
                <tr>
                  <td>月額利用料</td>
                  <td><span class="market-price">11.8</span>万円</td>
                  <td><span class="market-price">13.1</span>万円</td>
                  <td><span class="market-price">11.4</span>万円</td>
                  <td><span class="market-price">12.0</span>万円</td>
                </tr>
                <tr>
                  <td rowspan="2">サービス付き高齢者向け住宅</td>
                  <td>入居一時金</td>
                  <td><span class="market-price">12.2</span>万円</td>
                  <td><span class="market-price">15.5</span>万円</td>
                  <td><span class="market-price">10.0</span>万円</td>
                  <td><span class="market-price">10.0</span>万円</td>
                </tr>
                <tr>
                  <td>月額利用料</td>
                  <td><span class="market-price">14.3</span>万円</td>
                  <td><span class="market-price">18.8</span>万円</td>
                  <td><span class="market-price">13.0</span>万円</td>
                  <td><span class="market-price">16.8</span>万円</td>
                </tr>
                <tr>
                  <td rowspan="2">グループホーム</td>
                  <td>入居一時金</td>
                  <td><span class="market-price">9.0</span>万円</td>
                  <td><span class="market-price">9.8</span>万円</td>
                  <td><span class="market-price">10.0</span>万円</td>
                  <td><span class="market-price">10.0</span>万円</td>
                </tr>
                <tr>
                  <td>月額利用料</td>
                  <td><span class="market-price">13.1</span>万円</td>
                  <td><span class="market-price">13.3</span>万円</td>
                  <td><span class="market-price">13.6</span>万円</td>
                  <td><span class="market-price">13.8</span>万円</td>
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
                  <td><span class="market-price">10.3</span>万円</td>
                  <td><span class="market-price">16.8</span>万円</td>
                  <td><span class="market-price">10.0</span>万円</td>
                  <td><span class="market-price">10.0</span>万円</td>
                </tr>
                <tr>
                  <td>月額利用料</td>
                  <td><span class="market-price">9.7</span>万円</td>
                  <td><span class="market-price">10.2</span>万円</td>
                  <td><span class="market-price">9.8</span>万円</td>
                  <td><span class="market-price">9.9</span>万円</td>
                </tr>
              </tbody>
            </table>
          </div>
          <p class="cityarchive-other__desc txt-13-16">※上記は自社調査による目安の金額です。費用は施設の立地、設備、サービス内容、居室の広さなどによって大きく変動します。</p>
        </div>
      </div>

      <div class="cityarchive-other__inner bg-white">
        <div class="cityarchive-other__cont scfacility-inner__800">
          <h2 class="txt-18-28 txt-bold lh-1_35">大阪市の入居相談窓口のご紹介</h2>
          <ul class="cityarchive-other__list">
            <li>
              <p class="cityarchive-other__list-ttl">地域包括支援センター（各地域）</p>
              <p class="cityarchive-other__list-txt">お住まいの区の「あんしんさぽーと」などの名称で運営されている場合もあります。24区全てに配置されており、地域の施設の「生の情報」を得るのに最適です。</p>
            </li>
            <li>
              <p class="cityarchive-other__list-ttl">大阪市福祉局 高齢者施策部</p>
              <p class="cityarchive-other__list-txt">介護保険全般や、市内の施設一覧、各施設の行政処分情報の有無など、公的な確認が可能です。</p>
            </li>
          </ul>
        </div>
      </div>

      <div class="cityarchive-other__inner bg-white">
        <div class="cityarchive-other__cont scfacility-inner__960">
          <h2 class="txt-18-28 txt-bold lh-1_35">大阪市の近隣エリアのご紹介</h2>
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
            <li>
              <a href="/facility-list/osaka/daitocity">
                <div class="scarea__list-image">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/image/scfacility/daito.webp" alt="エリア施設">
                </div>
                <div class="scarea__list-info">
                  <h4 class="scarea__list-ttl scfacility__left-border-ttl txt-bold lh-1_5">大東市</h4>
                  <p class="scarea__list-txt txt-13-16 lh-1_5">飯盛山の麓に広がり、歴史と自然が息づく街。大阪市内へのアクセスも良く、落ち着いた環境で穏やかに過ごせます。</p>
                  <div class="scarea__list-btn txt-12-14 txt-bold lh-1_5 txt-white bg-orange-gradiate-reverse">大東市の老人ホーム・施設一覧</div>
                </div>
              </a>
            </li>
            <li>
              <a href="/facility-list/osaka/kadomacity">
                <div class="scarea__list-image">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/image/scfacility/kadoma.webp" alt="エリア施設">
                </div>
                <div class="scarea__list-info">
                  <h4 class="scarea__list-ttl scfacility__left-border-ttl txt-bold lh-1_5">門真市</h4>
                  <p class="scarea__list-txt txt-13-16 lh-1_5">大阪市内へのアクセスが良好で、生活利便施設が充実。下町情緒が残る親しみやすい雰囲気の中で安心して暮らせます。</p>
                  <div class="scarea__list-btn txt-12-14 txt-bold lh-1_5 txt-white bg-orange-gradiate-reverse">門真市の老人ホーム・施設一覧</div>
                </div>
              </a>
            </li>
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
              <a href="/facility-list/osaka/yaocity/">
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
