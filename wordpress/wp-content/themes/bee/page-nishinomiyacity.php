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
  $fixed_meta_value = 'nishinomiyacity';
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
          <h2 class="txt-18-28 txt-bold lh-1_35">西宮市の概況と高齢化の現状</h2>
          <h3 class="scfacility__left-border-ttl txt-15-22 txt-bold">西宮市の概況</h3>
          <p class="cityarchive-other__txt">大阪と神戸のほぼ中間に位置する西宮市は、各方面へのアクセスの良さからベッドタウンとして発展し、閑静な住宅街が広がる人気のエリアです。「阪神間モダニズム」という言葉に象徴される、洗練されたライフスタイルが根付いています。令和7年（2025年）4月1日時点の推計人口は約48万人で、兵庫県内では第3位の規模を誇ります。</p>
          <h3 class="txt-15-22 txt-bold">西宮市の高齢化の状況</h3>
          <p class="cityarchive-other__txt">西宮市の65歳以上の高齢者人口は約12万5千人で、高齢化率は26.0%です。この数値は、全国平均（29.1% ※令和5年10月1日時点）や兵庫県平均（30.1% ※令和6年10月1日時点）と比較すると低い水準ですが、今後も高齢化が進むことが見込まれています。</p>
        </div>
      </div>

      <div class="cityarchive-other__inner bg-white">
        <div class="cityarchive-other__cont scfacility-inner__800">
          <h2 class="txt-18-28 txt-bold lh-1_35">西宮市の施設種別ごとの費用相場</h2>
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
              <td><span class="market-price">61.5</span>万円</td>
              <td><span class="market-price">535.3</span>万円</td>
              <td><span class="market-price">14.9</span>万円</td>
              <td><span class="market-price">26.6</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">18.1</span>万円</td>
              <td><span class="market-price">28.1</span>万円</td>
              <td><span class="market-price">16.2</span>万円</td>
              <td><span class="market-price">19.1</span>万円</td>
              </tr>
              <tr>
              <td rowspan="2">介護付有料老人ホーム</td>
              <td>入居一時金</td>
              <td><span class="market-price">71.0</span>万円</td>
              <td><span class="market-price">1192.9</span>万円</td>
              <td><span class="market-price">0.0</span>万円</td>
              <td><span class="market-price">600.0</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">23.0</span>万円</td>
              <td><span class="market-price">44.8</span>万円</td>
              <td><span class="market-price">22.2</span>万円</td>
              <td><span class="market-price">41.5</span>万円</td>
              </tr>
              <tr>
              <td rowspan="2">住宅型有料老人ホーム</td>
              <td>入居一時金</td>
              <td><span class="market-price">170.7</span>万円</td>
              <td><span class="market-price">798.4</span>万円</td>
              <td><span class="market-price">15.6</span>万円</td>
              <td><span class="market-price">18.0</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">17.2</span>万円</td>
              <td><span class="market-price">26.9</span>万円</td>
              <td><span class="market-price">17.3</span>万円</td>
              <td><span class="market-price">18.5</span>万円</td>
              </tr>
              <tr>
              <td rowspan="2">サービス付き高齢者向け住宅</td>
              <td>入居一時金</td>
              <td><span class="market-price">17.3</span>万円</td>
              <td><span class="market-price">98.3</span>万円</td>
              <td><span class="market-price">20.7</span>万円</td>
              <td><span class="market-price">22.5</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">16.0</span>万円</td>
              <td><span class="market-price">20.4</span>万円</td>
              <td><span class="market-price">15.2</span>万円</td>
              <td><span class="market-price">17.6</span>万円</td>
              </tr>
              <tr>
              <td rowspan="2">グループホーム</td>
              <td>入居一時金</td>
              <td><span class="market-price">16.4</span>万円</td>
              <td><span class="market-price">16.4</span>万円</td>
              <td><span class="market-price">17.5</span>万円</td>
              <td><span class="market-price">17.5</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">16.9</span>万円</td>
              <td><span class="market-price">17.1</span>万円</td>
              <td><span class="market-price">15.6</span>万円</td>
              <td><span class="market-price">15.6</span>万円</td>
              </tr>
              <tr>
              <td rowspan="2">ケアハウス</td>
              <td>入居一時金</td>
              <td><span class="market-price">0.0</span>万円</td>
              <td><span class="market-price">0.0</span>万円</td>
              <td><span class="market-price">0.0</span>万円</td>
              <td><span class="market-price">0.0</span>万円</td>
              </tr>
              <tr>
              <td>月額利用料</td>
              <td><span class="market-price">8.8</span>万円</td>
              <td><span class="market-price">18.2</span>万円</td>
              <td><span class="market-price">9.3</span>万円</td>
              <td><span class="market-price">19.2</span>万円</td>
              </tr>
              </tbody>
            </table>
          </div>
          <p class="cityarchive-other__desc txt-13-16">※上記は自社調査による目安の金額です。費用は施設の立地、設備、サービス内容、居室の広さなどによって大きく変動します。手厚い介護や医療サービス、充実した設備、あるいは上質な住環境を求める場合は、費用が高くなる傾向にあります。</p>
        </div>
      </div>

      <div class="cityarchive-other__inner bg-white">
        <div class="cityarchive-other__cont scfacility-inner__800">
          <h2 class="txt-18-28 txt-bold lh-1_35">西宮市の高齢者支援制度・相談窓口のご紹介</h2>
          <ul class="cityarchive-other__list">
            <li>
              <p class="cityarchive-other__list-ttl">高齢者等交通費助成事業</p>
              <p class="cityarchive-other__list-txt">70歳以上の高齢者などを対象に、阪急バス・阪神バスのICカード（グランドパス）や、タクシー利用券の購入費用の一部を助成し、外出を支援しています。</p>
            </li>
            <li>
              <p class="cityarchive-other__list-ttl">介護予防事業</p>
              <p class="cityarchive-other__list-txt">「西宮いきいき体操」など、筋力向上を目的とした介護予防プログラムを市内各所で実施し、健康寿命の延伸を支援しています。</p>
            </li>
            <li>
              <p class="cityarchive-other__list-ttl">地域包括支援センター</p>
              <p class="cityarchive-other__list-txt">高齢者の総合相談窓口として、介護予防、権利擁護、医療・介護サービスの紹介など、幅広い相談に対応しています。どこに相談したら良いか分からない場合は、まず地域包括支援センターに連絡してみましょう。</p>
            </li>
            <li>
              <p class="cityarchive-other__list-ttl">高齢者・障害者権利擁護支援センター</p>
              <p class="cityarchive-other__list-txt">高齢者虐待の相談や、認知症などで判断能力が不十分な方の財産管理などを支援する成年後見制度の利用に関する相談に応じています。</p>
            </li>
            <li>
              <p class="cityarchive-other__list-ttl">福祉サービス利用援助事業</p>
              <p class="cityarchive-other__list-txt">認知症や知的・精神障害により、福祉サービスの利用や金銭管理に不安がある方を対象に、社会福祉協議会が支援を行う事業です。</p>
            </li>
            <li>
              <p class="cityarchive-other__list-ttl">介護者（家族）への支援</p>
              <p class="cityarchive-other__list-txt">在宅で高齢者を介護する家族を対象に、介護用品の給付や慰労金を支給する「介護用品の支給・介護者慰労金の支給事業」など、介護者を支える制度も整っています。</p>
            </li>
          </ul>
        </div>
      </div>

      <div class="cityarchive-other__inner bg-white">
        <div class="cityarchive-other__cont scfacility-inner__960">
          <h2 class="txt-18-28 txt-bold lh-1_35">西宮市の近隣エリアのご紹介</h2>
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
