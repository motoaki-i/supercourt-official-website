<?php get_header('nursing'); ?>

<?php
// nursingページの最初の方に追記
// ラベル取得用のサンプル投稿IDを取得
$temp_query = new WP_Query(['post_type' => 'facility-list', 'posts_per_page' => 1, 'fields' => 'ids']);
$sample_id = !empty($temp_query->posts) ? $temp_query->posts[0] : 0;
wp_reset_postdata();

$category_choices = [];
$type_choices = [];
$availability_choices = [];

if ($sample_id) {
    $field_cat = get_field_object('category', $sample_id);
    $category_choices = $field_cat['choices'] ?? [];
    $field_type = get_field_object('type', $sample_id);
    $type_choices = $field_type['choices'] ?? [];
    
    // 空室情報のラベル取得
    $field_price1 = get_field_object('price1', $sample_id);
    if (!empty($field_price1['sub_fields'])) {
        foreach ($field_price1['sub_fields'] as $sf) {
            if ($sf['name'] === 'availability') {
                foreach ($sf['sub_fields'] as $inner) {
                    if ($inner['name'] === 'availability_answer') {
                        $availability_choices = $inner['choices'];
                    }
                }
            }
        }
    }
}
$default_img = get_template_directory_uri() . '/assets/image/scfacility/facility_thumb_none.webp';
?>

<main id="nursing">

<div class="nursing-mv relative">
		<figure class="nursing-mv-image">
      <img src="<?php bloginfo('template_directory');?>/assets/image/nursing/mv.webp" alt="">
		</figure>
    <div class="ttl-nursing-wrap">
			<div class="middle">
        <h1 class="ttl-jp-4l txt-white  txt-medium">パーキンソン病・神経難病に特化した<br class="pc-only">リハビリ専門老人ホーム・介護施設</h1>
        <p class="txt-jp-s txt-white">大阪・兵庫・京都・奈良・滋賀でパーキンソン病・神経難病に特化した老人ホーム「リハビリ特化型ナーシングホーム」</p>
			</div>
	</div>
</div>


<section class="bg-beige space-3s">
  <!--breadcrumbs-->
    <div class="breadcrumbs-container mb2">
      <ul class="scfacility-breadcrumbs txt-12-14 txt-medium">
        <li class="txt-en-s"><a href="<?php echo esc_url(home_url('/')); ?>">TOP</a></li>
        <li class="txt-jp-s"><a href="<?php echo esc_url(home_url('/service/')); ?>">サービス</a></li>
        <li class="txt-jp-s"><?php the_title()?></li>
      </ul>
    </div>
  <div class="wrap-m space-s-bottom">
    <div>
      <h2 class="ttl-jp-4l ttl-border-b-green txt-green1 txt-bold">大阪・兵庫・京都・奈良・滋賀で選ばれる、<br class="pc-only">パーキンソン病・神経難病に特化した専門ホーム</h2>
      <div class="grid2 gg2">
      <figure><img src="<?php bloginfo('template_directory');?>/assets/image/nursing/service01.jpg" alt=""></figure>
      <p class="">スーパー・コートでは、パーキンソン病や脊髄小脳変性症など神経難病の患者様のケアにも対応した、「神経内科医の往診」「パーキンソン病に特化したリハビリプログラム（理学療法士、作業療法士）」「24時間体制の訪問看護」「医師・薬剤師・看護師が連携した服薬管理」といった専門的なサポートが整った老人ホームを大阪、兵庫、京都、奈良、滋賀で運営。建物の設計から全てを整えた「オリーブシリーズ」などの介護施設「リハビリ特化型ナーシングホーム」がパーキンソン病・神経難病のご入居者の毎日に安心のサポートをご提供いたします。</p>
      </div>
    </div>
  </div>
</section>

<!--
<section class="bg-beige space-2s-bottom">
  <div class="nursing-sub-ttl-l bg-green wrap-m-left">
    <p class="ttl-en-m txt-bold txt-yellow">SPECIALIZED SUPPORT</p>
    <h2 class="ttl-jp-4l  txt-white txt-bold">パーキンソン病・神経難病への<br class="pc-only">専門的で手厚いサポートを追求</h2>
  </div>
  <div class="space-3s sp-only"></div>
  <div class="wrap-m-right">
    <div class="grid2 gg2 align-center">
      <p class="pi2">パーキンソン病や脊髄小脳変性症などの神経難病では、患者様ごと時間帯ごとに変化する症状に対して、適切で細やかなケアが求められます。スーパー・コートでは、パーキンソン病・神経難病のご入居者お一人おひとりに、医療・看護・服薬・リハビリの整った包括的な介護ケアをご提供いたします。</p>
      <figure><img src="<?php bloginfo('template_directory');?>/assets/image/nursing/service01.jpg" alt=""></figure>
    </div>
  </div>
</section>
-->


<section id="nursing-point"  class="bg-beige">

  <div class="nursing-sub-ttl-r bg-green wrap-m-right">
    <p class="ttl-en-m txt-bold txt-yellow txt-center">4POINTS</p>
    <h2 class="ttl-jp-4l txt-white txt-bold txt-center">パーキンソン病・神経難病への<br class="pc-only">専門サービス・職員体制</h2>
  </div>
  <div class="nursing-point-wrap bg-white space-s space-3s-bottom">
  <div class="wrap-m">

    <p class="pi2 mb2">パーキンソン病や脊髄小脳変性症などの神経難病では、患者様ごと時間帯ごとに変化する症状に対して、適切で細やかなケアが求められます。スーパー・コートでは、パーキンソン病・神経難病のご入居者お一人おひとりに、医療・看護・服薬・リハビリの整った包括的な介護ケアをご提供いたします。</p>

  <div class="nursing-point-item">
    <div class="grid2 gg2">
      <div>
        <h3 class="ttl-nursing-service ttl-jp-l txt-bold txt-green1 mb1 flex g-half align-start">パーキンソン病・神経難病に特化したリハビリプログラム（理学療法士・作業療法士監修）</h3>
        <p>パーキンソン病の治療・介護において、薬物療法と並び特に重要なのがリハビリです。<br>進行性の病気であるパーキンソン病にとってリハビリは、運動機能や日常生活動作（ADL）の維持・改善、合併症の予防、精神的な安定など、多岐にわたる効果が期待できます。スーパー・コートでは、専門の理学療法士、作業療法士がご入居者様一人ひとりの症状や状態に合わせた個別のリハビリプログラムを作成し、症状の維持・改善につとめています。</p>
      </div>
      <figure><img src="<?php bloginfo('template_directory');?>/assets/image/facility/olive/mainservice_rihabilitation.webp" alt="point01"></figure>
    </div>
    <div class="mt2">
      <div class="point-more-toggle-item grid2 gg2 bg-beige p2">
      <div>
        <figure><img src="<?php bloginfo('template_directory');?>/assets/image/nursing/point01-1.jpg" alt="個別リハビリ"></figure>
        <h4 class="ttl-jp-m txt-bold mt-half mb-half">個別リハビリ</h4>
        <p>パーキンソン病に精通しているリハビリスタッフが、ご入居者様の要介護度に応じて最適なリハビリプログラムをマンツーマンで実施します。</p>
      </div>
      <div>
        <figure><img src="<?php bloginfo('template_directory');?>/assets/image/nursing/point01-2.jpg" alt="生活リハビリ"></figure>
        <h4 class="ttl-jp-m txt-bold mt-half mb-half">生活リハビリ</h4>
        <p>日常動作に対するアドバイスや福祉用具の選定を行い、パーキンソン病の患者様により安全な日常生活をお過ごしいただけるようにご支援します。</p>
      </div>
      <div>
        <figure><img src="<?php bloginfo('template_directory');?>/assets/image/nursing/point01-3.jpg" alt="摂食・嚥下アプローチ"></figure>
        <h4 class="ttl-jp-m txt-bold mt-half mb-half">摂食・嚥下アプローチ</h4>
        <p>摂食・嚥下リハビリテーション学会に所属しているスタッフが、誤嚥性肺炎などを予防するために、パーキンソン病のご入居者のお食事の支援を実施します。
        </p>
      </div>
      <div>
        <figure><img src="<?php bloginfo('template_directory');?>/assets/image/nursing/point01-4.jpg" alt="リハビリスペース"></figure>
        <h4 class="ttl-jp-m txt-bold mt-half mb-half">リハビリスペース</h4>
        <p>パーキンソン病の方に最適なトレーニングが行えるリハビリ専用マシーンを設置しています。日々のリハビリ訓練にご活用いただけます。</p>
      </div>
      </div>
    </div>
  </div>


<div class="nursing-point-item">
<h3 class="ttl-nursing-service ttl-jp-l txt-bold txt-green1 mb1 flex g-half align-start">パーキンソン病でも「自分の足で歩く」を諦めない。<br>転倒の不安を解消する、最新の歩行リハビリテーション</h3>

<p class="mb2">「最近、足がすくむことが増えて、歩くのが怖そう……」「転倒して怪我をしないか、片時も目が離せない」<br>
パーキンソン病のリハビリにおいて、ご本人とご家族が一番に直面するのは「転倒への恐怖心」ではないでしょうか。<br>
スーパーコートでは、その不安に寄り添い、科学的根拠に基づいた「免荷（めんか）装置」による歩行トレーニングを導入しています。</p>

<div class="grid2 gg2 mb2">
<div class="embed-movie-landscape"><iframe src="https://www.youtube.com/embed/X4VRKgCoBcQ?si=pDJhHJ7zLnk6YQLi&rel=0" title="「免荷（めんか）装置付トレッドミル」による歩行トレーニング" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe></div>
<div>
<h4 class="ttl-jp-l txt-medium txt-bold txt-green1 mb1">もう一度、一緒に歩ける未来を</h4>
<p class="mb2">パーキンソン病特有の「すくみ足」や「小刻み歩行」。転倒への恐怖心から歩くことを諦めていませんか？スーパー・コートでは、専用ハーネスで身体を支え体重負担を軽減する「免荷（めんか）装置付トレッドミル」を導入しています。最大の特徴は、転倒リスクをゼロにすることでリハビリへの心理的ハードルを下げ、前向きな意欲を引き出す点にあります。<br>
動画のBefore/Afterでは、足を引きずり不安定だった歩行が、装置を用いた一定リズムの学習により、歩幅が大きく膝もしっかり上がるスムーズな足取りへと劇的に変化した様子をご覧いただけます。私たちは、単なる訓練ではなく、ご入居者様が再び自分の足で歩く自信を取り戻し、自由な毎日を過ごせるよう専門チームでサポートいたします。</p>
</div>
</div>

<div class="grid2 gg2 mb2">
<div>
<h4 class="ttl-jp-l txt-medium txt-bold txt-green1 mb1">「転ばない」という絶対的な安心感が、前向きな意欲を引き出す</h4>
<p>この装置の最大の特徴は、専用のハーネスで身体を優しく吊り上げ、体重の負担を調整できることです。万が一バランスを崩しても、装置がしっかりと支えるため、転倒のリスクはゼロ。<br>
「転ぶのが怖いから歩きたくない」という心理的なブレーキを外し、「ここなら安全に練習できる」という自信が、リハビリへの積極性を生み出します。</p>
</div>
<figure><img src="<?php bloginfo('template_directory');?>/assets/image/nursing/rihabilitation-menka.webp" alt="免荷装置を使用したパーキンソン病向け歩行訓練の様子"></figure>
</div>

<div class="grid2 gg2 mb2">
<figure><img src="<?php bloginfo('template_directory');?>/assets/image/nursing/rihabilitation-tredmile.webp" alt="「免荷（めんか）装置付トレッドミル」による歩行トレーニング"></figure>
<div>
<h4 class="ttl-jp-l txt-medium txt-bold txt-green1 mb1">リズムを脳に覚えさせる、理想的な歩行訓練</h4>
<p class="mb2">パーキンソン病特有の「すくみ足」や「小刻み歩行」に対し、トレッドミル（歩行マシン）が刻む一定のリズムは非常に有効で、平行棒での歩行と併用しています。</p>
<dl class="mb2">
<dt class="txt-green1">歩幅の維持</dt>
<dd class="mb1">マシンの速度に合わせることで、自然と理想的な歩幅を保ちます。</dd>
<dt class="txt-green1">正しい姿勢</dt>
<dd class="mb1">身体が支えられているため、前かがみの姿勢を正し、前を向いて歩く習慣が身につきます。</dd>
<dt class="txt-green1">成功体験の積み重ね</dt>
<dd> 「自分の力でしっかり歩けた」という実感は、脳へのポジティブな刺激となり、日常生活の動作向上へと繋がります。</dd>
</dl>
</div>
</div>

</div>


  <div class="nursing-point-item">
    <div class="grid2 gg2">
      <figure><img src="<?php bloginfo('template_directory');?>/assets/image/facility/olive/mainservice_homecall.webp" alt="point02"></figure>
      <div>
        <h3 class="ttl-nursing-service ttl-jp-l txt-bold txt-green1 mb1 flex g-half align-start">神経内科専門医師による訪問診療で<br class="pc-only">入居後も医療を継続</h3>
        <p>パーキンソン病の専門医である神経内科医が定期的に訪問し、お一人おひとりに対して、薬物療法、パーキンソン病特有の運動機能の症状、併発する自律神経や精神、認知機能の症状も含め総合的に管理することで入居後も専門的な治療を維持、QOL（生活の質）の維持・向上を目指します。神経内科医が、看護師、介護士、薬剤師と密に連携し、ご入居者様一人ひとりに合わせた最適なケアを提供します。</p>
        <p><a class="nursing-service-more txt-center txt-medium block fit" href="<?php echo esc_url(home_url('/feature/medical/')); ?>">詳しくはこちら</a></p>
      </div>
    </div>
  </div>

  <div class="nursing-point-item">
    <div class="grid2 gg2">
      <div>
        <h3 class="ttl-nursing-service ttl-jp-l txt-bold txt-green1 mb1 flex g-half align-start">24時間体制の訪問看護</h3>
        <p>症状が時間帯によって大きく変化するパーキンソン病において、夜間や早朝での急変にも即座に対応するため24時間の看護体制が重要になります。日常の健康管理、施設内での医療処置や医療機関との連携、医師と連携した正確な服薬管理には不可欠な体制です。パーキンソン病の進行に伴う日常生活動作（ADL）の低下時には食事、排泄、入浴などの日常生活のサポートも行うなど、24時間体制で患者さんの自立を支援します。</p>
      </div>
      <figure><img src="<?php bloginfo('template_directory');?>/assets/image/facility/olive/mainservice_nurse.webp" alt="point03"></figure>
    </div>
  </div>

  <div class="nursing-point-item">
    <div class="grid2 gg2">
      <figure><img src="<?php bloginfo('template_directory');?>/assets/image/facility/olive/mainservice_pharmacist.webp" alt="point04"></figure>
      <div>
        <h3 class="ttl-nursing-service ttl-jp-l txt-bold txt-green1 mb1 flex g-half align-start">薬剤師と看護師が連携した服薬管理</h3>
        <p>パーキンソン病や脊髄小脳変性症などの神経難病において、特に重要なのが薬物療法とその管理です。<br>スーパー・コートでは神経内科医の指示のもと、担当の薬剤師が適切な薬の種類、量、飲み合わせで配薬、看護師が体調や効果を細かく観察しながら投薬を調整・指導します。医師と薬剤師、看護師が密接に連携して、患者様お一人おひとりの服薬状況を把握し、適切な服薬管理を行っています。</p>
      </div>
    </div>

  </div>
  </div>

</section>


<div class="wrap-m space-3s space-l-bottom">
  <div class="facility-cta facility-cta-row">
    <div class="facility-cta-item bg-white facility-cta-tel txt-center">
      <a class="facility-cta-inner" href="tel:0120-532-029">
        <p class="facility-cta-txt  txt-medium">お電話でのお問合せはこちら</p>
        <p class="facility-cta-dial bg-green-gradiate txt-bold txt-white">ご入居相談専用ダイヤル</p>
        <p class="facility-cta-tel-num txt-bold txt-green1"><i class="fas fa-phone-alt fa"></i><span>0120-532-029</span></p>
      </a>
    </div>
    <div class="facility-cta-item bg-white facility-cta-form txt-center">
			<div class="facility-cta-inner">
				<p class="facility-cta-txt  txt-medium">メールでのお問合せはこちら</p>
				<ul class="facility-cta-form-list txt-white">
					<li class="facility-cta-visit">
						<a href="#form">
							<span class="facility-cta-form-icon">
								<img src="<?php bloginfo('template_directory');?>/assets/image/common/cta_visit.png" alt="">
							</span>
							<p class="facility-cta-form-txt txt-bold txt-center">見学申込</p>
						</a>
					</li>
					<li class="facility-cta-document">
						<a href="#form">
							<span class="facility-cta-form-icon">
								<img src="<?php bloginfo('template_directory');?>/assets/image/common/cta_document.png" alt="">
							</span>
							<p class="facility-cta-form-txt txt-bold txt-center">資料請求</p>
						</a>
					</li>
					<li class="facility-cta-contact">
						<a href="#form">
							<span class="facility-cta-form-icon">
								<img src="<?php bloginfo('template_directory');?>/assets/image/common/cta_contact.png" alt="">
							</span>
							<p class="facility-cta-form-txt txt-bold txt-center">お問合せ</p>
						</a>
					</li>
				</ul>
			</div>
		</div>
  </div>
</div>


<section class="space-m-bottom">
  <div class="nursing-sub-ttl-l bg-green wrap-m-left">
    <p class="ttl-en-m txt-bold txt-center txt-brightgold">FACILITY SERVICE</p>
    <h2 class="ttl-jp-4l  txt-white txt-bold txt-center">スーパー・コートだからできる<br class="pc-only">施設サービス</h2>
  </div>
  <div class="wrap-m">

    <div class="grid2 gg2 space-3s">
      <figure><img src="<?php bloginfo('template_directory');?>/assets/image/nursing/service02.jpg" alt=""></figure>
      <div>
        <h3 class="ttl-nursing-service ttl-jp-l txt-bold txt-green1 mb1">ホテル運営で培う<br class="sp-only">ホスピタリティ</h3>
        <p>スーパー・コートの運営母体は、ライフスタイルホテルを全国展開するスーパーホテルです。 ご入居者様には心地良さを感じてお過ごしいただけるよう、ホテル事業で培ったホスピタリティを介護の現場にも取り入れています。パーキンソン病や脊髄小脳変性症などの神経難病の方に専門的な介護ケアを行う「リハビリ特化型ナーシングホーム」においては、お一人おひとりの症状や固有の特徴をよく理解し、適切な対応を心得た介護・看護スタッフが在籍しています。日々お過ごしいただくなかでの感情の機微や、小さな状態の変化も見逃しません。<br>パーキンソン病などの神経難病は進行性の疾患だからこそ、介護の現場では日々の変化に適応できるホスピタリティを大切にしています。</p>
        <p><a class="point-more bg-beige txt-center txt-medium block fit" href="<?php echo esc_url(home_url('/feature/hospitality/')); ?>">詳しくはこちら</a></p>
      </div>
    </div>

    <div class="grid2 gg2 space-3s">
      <div>
        <h3 class="ttl-nursing-service ttl-jp-l txt-bold txt-green1 mb1">サービス向上の取り組みと<br class="sp-only">介護・職員体制</h3>
        <p>教育に際しては、「介護技術認定制度ケアマイスター」の取得を推奨し、どのスタッフでも一定以上の介護品質を提供できる仕組みを完備。さらにスーパー・コートでは、「ご利用者3人に対し1人以上の介護職員の設置」という基準の遵守はもちろん、プラスアルファの人員を配置する「3人対1.5人」の体制も順次進めております。<br>※「介護技術認定制度ケアマイスター」は一般社団法人 日本ケアマイスター協会の商標登録。</p>
      </div>
      <figure><img src="<?php bloginfo('template_directory');?>/assets/image/nursing/service01.jpg" alt=""></figure>
    </div>

    <div class="grid2 gg2 space-3s">
      <figure><img src="<?php bloginfo('template_directory');?>/assets/image/nursing/service04.jpg" alt=""></figure>
      <div>
        <h3 class="ttl-nursing-service ttl-jp-l txt-bold txt-green1 mb1">大阪・奈良で湧出する<br class="pc-only">本物の天然温泉</h3>
        <p>スーパー・コートでは、スーパーホテル大阪天然温泉「秀吉ゆかりの湯」、または奈良・大和郡山「秀吉ゆかりの湯」から直送される天然温泉をお楽しみいただけます。<br>湯あたりしにくくなめらかな心地よさでご高齢の方にも安心してお入りいただけます。<br>お肌に優しく、神経痛や筋肉痛を和らげ、日々の疲労回復を促します。<br>天下人ゆかりの歴史ロマンあふれる名湯でのくつろぎは、心と体に活力を与える特別な時間。<br>スーパーホテルグループだからこそ実現できた、日々の贅沢をご提供します。</p>
        <p><a  class="point-more bg-beige txt-center txt-medium block fit" href="<?php echo esc_url(home_url('/feature/bath/')); ?>">詳しくはこちら</a></p>
      </div>
    </div>

    <div class="grid2 gg2 space-3s">
      <div>
        <h3 class="ttl-nursing-service ttl-jp-l txt-bold txt-green1 mb1">館内すべての水が<br class="pc-only">「健康イオン水」</h3>
        <p>館内で利用する水はすべて「MICA加工」を施した健康イオン水です。<br>大阪府立大学名誉教授・清水教永医学博士監修、世界8か国で特許を取得している水で、浸透力や抗酸化力に優れています。<br>調理用の水や飲料水、お風呂で使う水も全て、蛇口をひねれば健康イオン水をご利用いただけます。<br>口当たりはまろやかで飲みやすく、肌あたりもやわらかで敏感肌の方にも安心です。<br>健康イオン水でからだの内側からいきいきと輝く毎日をサポートいたします。<br>※対象外の施設もございます。</p>
        <p><a  class="point-more bg-beige txt-center txt-medium block fit" href="<?php echo esc_url(home_url('/feature/meal/')); ?>">詳しくはこちら</a></p>
      </div>
      <figure><img src="<?php bloginfo('template_directory');?>/assets/image/facility/olive/kodawari03.jpg" alt=""></figure>
    </div>

    <div class="grid2 gg2 space-3s">
      <figure><img src="<?php bloginfo('template_directory');?>/assets/image/facility/olive/kodawari04.jpg" alt=""></figure>
      <div>
        <h3 class="ttl-nursing-service ttl-jp-l txt-bold txt-green1 mb1">光の力で空気を洗う<br class="pc-only">安全な空気清浄システム</h3>
        <p>東京理科大学栄誉教授・藤嶋昭博士と共同開発したユーヴィックス社製「光触媒空気清浄システム」を導入。<br>化学物質に頼らない人体に安全な方法で空気を清浄します。<br>目に見えないウイルスや、気になるニオイのもとを特殊なフィルターがキャッチ。そこに光の力をくわえることで、無害な水と二酸化炭素に分解します。<br>医療機関でも採用されているほど高性能でありながら、作動音はとても静かなので、夜の眠りを妨げることもありません。<br>居室の天井には調湿・脱臭効果のある珪藻土を使用するなど、スーパー・コートでは目に見えない「空気」の質にもこだわっています。<br>※対象外の施設もございます。</p>
        <p><a  class="point-more bg-beige txt-center txt-medium block fit" href="<?php echo esc_url(home_url('/feature/meal/')); ?>">詳しくはこちら</a></p>
      </div>
    </div>

  </div>
</section>

<section class="space-m-bottom">
  <div class="nursing-sub-ttl-l bg-green wrap-m-left">
    <p class="ttl-en-m txt-bold txt-center txt-brightgold">FLOW</p>
    <h2 class="ttl-jp-4l  txt-white txt-bold txt-center">パーキンソン病・神経難病の<br class="pc-only">特化型ホームの<br class="pc-only">1日の流れ・過ごし方</h2>
  </div>
  <div class="grid3 gg2 wrap-m space-3s">
    <div>
      <figure><img src="<?php bloginfo('template_directory');?>/assets/image/nursing/flow01.jpg" alt="起床・着替え"></figure>
      <p class="mt1">6:30～7:00頃を目安に起床。朝日を感じる居室から気持ちの良い1日が始まります。おひとりでの着替えが難しい場合はスタッフが自主性を重んじながら必要な介助をいたします。</p>
    </div>
    <div>
      <figure><img src="<?php bloginfo('template_directory');?>/assets/image/nursing/flow02.jpg" alt="朝食"></figure>
      <p class="mt1">1日の始まりはおいしく栄養と安全を考えた朝食から。お米には国産のコシヒカリを使用。施設の厨房で調理師が作ったできたてをお楽しみください。</p>
    </div>
    <div>
      <figure><img src="<?php bloginfo('template_directory');?>/assets/image/nursing/flow03.jpg" alt="個別リハビリテーション"></figure>
      <p class="mt1">朝食と休憩の後は、特にパーキンソン病などの神経難病をお持ちのご入居者のリハビリタイム。リハビリの実施は週5回行える体制を整えています。医師の指示のもとお一人おひとりに適切な回数で、1回あたり30分程度で実施。お一人おひとりに合わせた個別のプログラムで、身体機能の維持・改善を目指します。</p>
    </div>
    <div>
      <figure><img src="<?php bloginfo('template_directory');?>/assets/image/nursing/flow04.jpg" alt="お風呂"></figure>
      <p class="mt1">個々のお時間や気持ちのよいリハビリの合間に、天然温泉のご入浴です。定期的にスーパーホテルから届く天然温泉をお楽しみいただけます。浴室の床は、滑り防止のため畳仕様です。※一部施設を除く。</p>
    </div>
    <div>
      <figure><img src="<?php bloginfo('template_directory');?>/assets/image/nursing/flow05.jpg" alt="昼食"></figure>
      <p class="mt1">再び食堂・レストランにお集まり昼食をお召し上がりいただきます。朝食同様、施設の厨房で調理したできたてメニューです。施設によっては2種類のメニューからお好きなものをお選びいただけます。</p>
    </div>
    <div>
      <figure><img src="<?php bloginfo('template_directory');?>/assets/image/nursing/flow06.jpg" alt="体操"></figure>
      <p class="mt1">スーパー・コート独自のトレーニング・エクササイズ「SC-Fit」を実施している施設もございます。日々を自分らしくお過ごしいただけるよう、体力向上を目指し楽しみながら継続できるプログラムとなっています。</p>
    </div>
    <div>
      <figure><img src="<?php bloginfo('template_directory');?>/assets/image/nursing/flow07.jpg" alt="おやつ・レクリエーション"></figure>
      <p class="mt1">特別イベントの月祭など多彩なレクリエーションをお楽しみいただきます。おやつは毎日15時にご提供。ご購入されたものをお好きなときにお召し上がりいただくこともできます。</p>
    </div>
    <div>
      <figure><img src="<?php bloginfo('template_directory');?>/assets/image/nursing/flow08.jpg" alt="夕食"></figure>
      <p class="mt1">おいしいく楽しい夕食で1日を締めくくります。一部施設では、月に数回、いつもより豪華な「ごちそうメニュー」もご用意しています。</p>
    </div>
    <div>
      <figure><img src="<?php bloginfo('template_directory');?>/assets/image/nursing/flow09.jpg" alt="着替え・就寝"></figure>
      <p class="mt1">夕食後は就寝となります。介護用ベッドのレンタルも可能です。要介護2以上であれば介護保険が適用できます。</p>
    </div>

  </div>
</section>

<!--
<section class="nursing-price bg-green wrap-m space-3s space-3s-bottom">
  <p class="ttl-en-m txt-bold txt-center txt-brightgold">PRICE INFORMATION</p>
  <h2 class="ttl-jp-4l txt-white txt-bold txt-center mb1">ご利用料金のご案内</h2>
  <div class="grid2 gg1">
      <div class="bg-white txt-center p1">
        <p class="txt-medium"><span class="pi1 txt-bold">入居金</span><br class="sp-only"><span class="big txt-en txt-green1 ">0</span>円（税込）</p>
      </div>
      <div class="bg-white txt-center p1">
        <p class="txt-medium"><span class="pi1 txt-bold">月額利用料</span><br class="sp-only"><span class="big txt-en txt-green1 ">104,000</span>円〜</p>
      </div>
  </div>
  <p class="txt-white mt1">※月額利用料には、家賃、管理費、食費が含まれております。 ※上記はあくまでも一例です。実際の費用は施設により異なります。 ※自己負担額は介護保険により異なります</p>
</section>
-->

<section class="bg-blue space-s space-2l-bottom">
  <div class="maw-880 space-2s-bottom">
    <p class="ttl-en-m txt-bold txt-center">CARE LEVEL</p>
    <h2 class="ttl-jp-4l txt-green1 txt-bold txt-center mb1">要介護度</h2>
    <p>スーパー・コートのご入居者様のうち約18％が入居後に要介護度が改善されています。</p>
    <figure class="mt1 mb1"><img src="<?php bloginfo('template_directory');?>/assets/image/nursing/level.jpg" alt="スーパー・コート入居者の要介護度改善実績グラフ。約18％が改善"></figure>
    <p>リハビリテーションや天然温泉、おいしいお食事をはじめとする、ご入居者様に日々を楽しく感じていただくための取り組みが、要介護度の改善に繋がっている可能性があるという研究結果が出ております。 また、ご入居者様に提供している上記サービスのみならず、スタッフへの定期的な研修等による介護の質向上への取り組みも、この結果に寄与していると考えられます。</p>
  </div>
  <hr>
  <div class="maw-880 space-2s">
    <p class="ttl-en-m txt-bold txt-center">SUBJECT / MEDICAL CARE</p>
    <h2 class="ttl-jp-4l txt-green1 txt-bold txt-center mb1">入居対象と医療行為の対応</h2>
    <h3 class="bg-white p1 txt-green1 ttl-jp-m txt-bold txt-center">入居対象</h3>
    <p class="middle txt-jp-m txt-medium mt1 mb2">パーキンソン病　脊髄小脳変性症 　多系統萎縮症　進行性核上性麻痺　大脳皮質基底核変性症</p>
    <h3 class="bg-white p1 txt-green1 ttl-jp-m txt-bold txt-center">医療行為の対応</h3>
    <p class="middle mt1 mb1">※対応項目は施設によって異なります。<br>○受入可能　△要相談　×受入不可<br>※「○：受け入れ可能」の項目は、ご入居される方のお身体の状態などの理由で、受け入れ可能化どうかが変わります。<br>まずはお電話などでご相談ください。</p>
    <figure><img src="<?php bloginfo('template_directory');?>/assets/image/nursing/accept.svg" alt="パーキンソン病・神経難病の医療行為対応表。胃ろう・吸引・インスリン等"></figure>
  </div>


<div class="wrap-m space-m">
  <div class="facility-cta facility-cta-row">
    <div class="facility-cta-item bg-white facility-cta-tel txt-center">
      <a class="facility-cta-inner" href="tel:0120-532-029">
        <p class="facility-cta-txt  txt-medium">お電話でのお問合せはこちら</p>
        <p class="facility-cta-dial bg-green-gradiate txt-bold txt-white">ご入居相談専用ダイヤル</p>
        <p class="facility-cta-tel-num txt-bold txt-green1"><i class="fas fa-phone-alt fa"></i><span>0120-532-029</span></p>
      </a>
    </div>
    <div class="facility-cta-item bg-white facility-cta-form txt-center">
			<div class="facility-cta-inner">
				<p class="facility-cta-txt  txt-medium">メールでのお問合せはこちら</p>
				<ul class="facility-cta-form-list txt-white">
					<li class="facility-cta-visit">
						<a href="#form">
							<span class="facility-cta-form-icon">
								<img src="<?php bloginfo('template_directory');?>/assets/image/common/cta_visit.png" alt="">
							</span>
							<p class="facility-cta-form-txt txt-bold txt-center">見学申込</p>
						</a>
					</li>
					<li class="facility-cta-document">
						<a href="#form">
							<span class="facility-cta-form-icon">
								<img src="<?php bloginfo('template_directory');?>/assets/image/common/cta_document.png" alt="">
							</span>
							<p class="facility-cta-form-txt txt-bold txt-center">資料請求</p>
						</a>
					</li>
					<li class="facility-cta-contact">
						<a href="#form">
							<span class="facility-cta-form-icon">
								<img src="<?php bloginfo('template_directory');?>/assets/image/common/cta_contact.png" alt="">
							</span>
							<p class="facility-cta-form-txt txt-bold txt-center">お問合せ</p>
						</a>
					</li>
				</ul>
			</div>
		</div>
  </div>
</div>


</section>





<section class="bg-beige">
  <div class="bg-green space-3s space-3s-bottom">
      <p class="ttl-en-m txt-bold txt-center txt-brightgold">FACILITY</p>
      <h2 class="ttl-jp-4l txt-white txt-bold txt-center">パーキンソン病・神経難病の<br class="pc-only">専門体制を整えた<br class="pc-only">介護施設・老人ホーム一覧</h2>
  </div>
  <div class="maw-880 space-2s space-3s-bottom">
  <p class="txt-jp-m middle">スーパー・コートでは、パーキンソン病専門の老人ホーム・介護施設「リハビリ特化型ナーシングホーム」を、大阪・兵庫・京都・奈良・滋賀と関西一円で直営し、各地に密着したパーキンソン病・神経難病への介護・看護をご提供してます。</p>
  </div>
  
  <div class="wrap-m space-s-bottom">
  <h2 class="ttl-jp-2l txt-bold ttl-border-l-green">大阪府のパーキンソン病専門の老人ホーム・介護施設</h2>
  <p class="txt-jp-m middle mb2">大阪府内（大阪市淀川区・城東区・東住吉区や、堺市、東大阪市、豊中市、門真市等）の主要エリアにパーキンソン病専門ホームを展開しています。各施設では神経内科専門医による訪問診療体制を整え、24時間体制の訪問看護と専門的なリハビリテーションで、大阪にお住まいの患者様とご家族をサポートいたします。</p>
    <ul class="scarchive__list">
    <?php
    // 表示したい施設のスラッグを配列で指定
    $target_facility_slugs = [
        "olive_minamisenri", "osakajo", "mikuni", "higashiyodogawa",
        "higashisumiyoshi2", "hirano", "suminoe", "kire", "onobara",
        "toyonakamomoyamadai", "kadoma", "takaida", "sakai", "shirasagi",
        "kamiishi", "takaishi"
    ];

    $args = [
        'post_type'      => 'facility-list',
        'post_name__in'  => $target_facility_slugs, // スラッグで指定
        'posts_per_page' => -1,
        'orderby'        => 'post_name__in',        // 配列の順番通りに並べる
    ];
    $facility_query = new WP_Query($args);

    if ($facility_query->have_posts()) :
        while ($facility_query->have_posts()) : $facility_query->the_post();
            $f_id = get_the_ID();
            // 外部関数を使わず直接カスタムフィールドを取得
            $fields = get_fields($f_id) ?: [];

            // リンク先判定
            $special_page = $fields['special_page'] ?? [];
            $href = !empty($special_page['url']) ? $special_page['url'] : get_permalink($f_id);
            $target_attr = !empty($special_page['target_blank']) ? 'target="_blank" rel="noopener noreferrer"' : '';

            // 画像URLの取得
            $img_facility = $fields['img_facility'] ?? '';
            $img_main     = $fields['img_main'] ?? '';
            $img_url = '';
            if (!empty($img_facility)) {
                $img_url = is_array($img_facility) ? ($img_facility['url'] ?? '') : (is_numeric($img_facility) ? wp_get_attachment_image_url($img_facility, 'full') : $img_facility);
            } elseif (!empty($img_main)) {
                $img_url = is_array($img_main) ? ($img_main['url'] ?? '') : (is_numeric($img_main) ? wp_get_attachment_image_url($img_main, 'full') : $img_main);
            }
            if (empty($img_url)) $img_url = $default_img;

            // 各種データの抽出
            $categories = $fields['category'] ?? [];
            $type_val   = $fields['type'] ?? '';
            $type_label = $type_choices[$type_val] ?? $type_val;

            $price1 = $fields['price1'] ?? [];
            $availability = $price1['availability'] ?? [];
            $avail_val = $availability['availability_answer'] ?? '';
            $avail_label = $availability_choices[$avail_val] ?? '';

            $move_in_fee = (int)($price1['move_in_fee'] ?? 0);
            $monthly_amount = $price1['monthly_fee']['monthly_fee_amount'] ?? '';
            ?>

            <li>
              <a class="bg-white" href="<?php echo esc_url($href); ?>" <?php echo $target_attr; ?>>
                <div class="scarchive__list-image">
                  <img src="<?php echo esc_url($img_url); ?>" alt="<?php the_title(); ?>" loading="lazy">
                </div>
                <div class="scarchive__list-cont">
                  <div class="scarchive__list-info">
                    <?php if (!empty($categories)) : ?>
                      <ul class="scarchive__list-cate txt-12-14 txt-bold">
                        <?php foreach ($categories as $cat_slug) : if ($cat_slug === 'normal') continue; ?>
                          <li class="<?php echo esc_attr($cat_slug); ?>"><?php echo esc_html($category_choices[$cat_slug] ?? $cat_slug); ?></li>
                        <?php endforeach; ?>
                      </ul>
                    <?php endif; ?>

                    <p class="scarchive__list-type txt-12-14 txt-medium"><?php echo esc_html($type_label); ?></p>
                    <h3 class="scarchive__list-ttl txt-15-22 txt-bold"><?php the_title(); ?></h3>
                    <p class="scarchive__list-address txt-13-16 txt-medium"><?php echo esc_html($fields['area'] ?? ''); ?></p>
                    <p class="scarchive__list-station txt-12-14 txt-medium"><?php echo nl2br(esc_html($fields['station'] ?? '')); ?></p>

                    <?php if ($avail_label) : ?>
                      <div class="scarchive__list-vacant">
                        <p class="scarchive__list-vacant-block room-avail--<?php echo esc_attr($avail_val); ?> txt-13-16 txt-medium txt-white bg-yellow">
                          <?php echo esc_html($avail_label); ?>
                        </p>
                      </div>
                    <?php endif; ?>

                    <div class="scarchive__list-price">
                      <p class="scarchive__list-price-left txt-13-16 txt-medium">入居金</p>
                      <p class="scarchive__list-price-num txt-15-22 txt-medium txt-orange"><?php echo number_format($move_in_fee); ?>円</p>
                    </div>
                    <div class="scarchive__list-price">
                      <p class="scarchive__list-price-left txt-13-16 txt-medium">月額利用料</p>
                      <p class="scarchive__list-price-num txt-15-22 txt-medium txt-orange"><?php echo $monthly_amount ? number_format((int)$monthly_amount).'円' : '-'; ?></p>
                    </div>
                  </div>
                  <div class="scarchive__list-btn block txt-13-16 txt-bold txt-center txt-white bg-orange-gradiate-reverse">この施設の詳細を見る</div>
                </div>
              </a>
            </li>

        <?php endwhile; wp_reset_postdata(); endif; ?>
  </ul>
    </div>
    
    <!--<p><a class="nursing-facility-more bg-black txt-white fit block" href="https://www.supercourt.jp/facility-list/parkinson/">パーキンソン病専門施設の一覧</a></p>-->

<div class="wrap-m space-s-bottom">
  <h2 class="ttl-jp-2l txt-bold ttl-border-l-green">兵庫県のパーキンソン病専門の老人ホーム・介護施設</h2>
  <p class="txt-jp-m middle mb2">兵庫県内（神戸市、西宮市、宝塚市、川西市、尼崎市等）の阪神エリアを中心に、パーキンソン病・神経難病に特化した施設を運営しています。理学療法士・作業療法士による専門リハビリプログラムを完備し、生活の質の維持・向上を目指します。病院からの退院先や、在宅介護が困難になった際の安心の住まいとして選ばれています。</p>
    <ul class="scarchive__list">
    <?php
    // 表示したい施設のスラッグを配列で指定
    $target_facility_slugs = [
        "facility-list-12131", "olive_takarazuka", "inadera", "minamihanayashiki", "kobe_kita"
    ];

    $args = [
        'post_type'      => 'facility-list',
        'post_name__in'  => $target_facility_slugs, // スラッグで指定
        'posts_per_page' => -1,
        'orderby'        => 'post_name__in',        // 配列の順番通りに並べる
    ];
    $facility_query = new WP_Query($args);

    if ($facility_query->have_posts()) :
        while ($facility_query->have_posts()) : $facility_query->the_post();
            $f_id = get_the_ID();
            // 外部関数を使わず直接カスタムフィールドを取得
            $fields = get_fields($f_id) ?: [];

            // リンク先判定
            $special_page = $fields['special_page'] ?? [];
            $href = !empty($special_page['url']) ? $special_page['url'] : get_permalink($f_id);
            $target_attr = !empty($special_page['target_blank']) ? 'target="_blank" rel="noopener noreferrer"' : '';

            // 画像URLの取得
            $img_facility = $fields['img_facility'] ?? '';
            $img_main     = $fields['img_main'] ?? '';
            $img_url = '';
            if (!empty($img_facility)) {
                $img_url = is_array($img_facility) ? ($img_facility['url'] ?? '') : (is_numeric($img_facility) ? wp_get_attachment_image_url($img_facility, 'full') : $img_facility);
            } elseif (!empty($img_main)) {
                $img_url = is_array($img_main) ? ($img_main['url'] ?? '') : (is_numeric($img_main) ? wp_get_attachment_image_url($img_main, 'full') : $img_main);
            }
            if (empty($img_url)) $img_url = $default_img;

            // 各種データの抽出
            $categories = $fields['category'] ?? [];
            $type_val   = $fields['type'] ?? '';
            $type_label = $type_choices[$type_val] ?? $type_val;

            $price1 = $fields['price1'] ?? [];
            $availability = $price1['availability'] ?? [];
            $avail_val = $availability['availability_answer'] ?? '';
            $avail_label = $availability_choices[$avail_val] ?? '';

            $move_in_fee = (int)($price1['move_in_fee'] ?? 0);
            $monthly_amount = $price1['monthly_fee']['monthly_fee_amount'] ?? '';
            ?>

            <li>
              <a class="bg-white" href="<?php echo esc_url($href); ?>" <?php echo $target_attr; ?>>
                <div class="scarchive__list-image">
                  <img src="<?php echo esc_url($img_url); ?>" alt="<?php the_title(); ?>" loading="lazy">
                </div>
                <div class="scarchive__list-cont">
                  <div class="scarchive__list-info">
                    <?php if (!empty($categories)) : ?>
                      <ul class="scarchive__list-cate txt-12-14 txt-bold">
                        <?php foreach ($categories as $cat_slug) : if ($cat_slug === 'normal') continue; ?>
                          <li class="<?php echo esc_attr($cat_slug); ?>"><?php echo esc_html($category_choices[$cat_slug] ?? $cat_slug); ?></li>
                        <?php endforeach; ?>
                      </ul>
                    <?php endif; ?>

                    <p class="scarchive__list-type txt-12-14 txt-medium"><?php echo esc_html($type_label); ?></p>
                    <h3 class="scarchive__list-ttl txt-15-22 txt-bold"><?php the_title(); ?></h3>
                    <p class="scarchive__list-address txt-13-16 txt-medium"><?php echo esc_html($fields['area'] ?? ''); ?></p>
                    <p class="scarchive__list-station txt-12-14 txt-medium"><?php echo nl2br(esc_html($fields['station'] ?? '')); ?></p>

                    <?php if ($avail_label) : ?>
                      <div class="scarchive__list-vacant">
                        <p class="scarchive__list-vacant-block room-avail--<?php echo esc_attr($avail_val); ?> txt-13-16 txt-medium txt-white bg-yellow">
                          <?php echo esc_html($avail_label); ?>
                        </p>
                      </div>
                    <?php endif; ?>

                    <div class="scarchive__list-price">
                      <p class="scarchive__list-price-left txt-13-16 txt-medium">入居金</p>
                      <p class="scarchive__list-price-num txt-15-22 txt-medium txt-orange"><?php echo number_format($move_in_fee); ?>円</p>
                    </div>
                    <div class="scarchive__list-price">
                      <p class="scarchive__list-price-left txt-13-16 txt-medium">月額利用料</p>
                      <p class="scarchive__list-price-num txt-15-22 txt-medium txt-orange"><?php echo $monthly_amount ? number_format((int)$monthly_amount).'円' : '-'; ?></p>
                    </div>
                  </div>
                  <div class="scarchive__list-btn block txt-13-16 txt-bold txt-center txt-white bg-orange-gradiate-reverse">この施設の詳細を見る</div>
                </div>
              </a>
            </li>

        <?php endwhile; wp_reset_postdata(); endif; ?>
  </ul>
    </div>


<div class="wrap-m space-s-bottom">
  <h2 class="ttl-jp-2l txt-bold ttl-border-l-green">京都府のパーキンソン病専門の老人ホーム・介護施設</h2>
  <p class="txt-jp-m middle mb2">京都府内（京都市中京区・右京区・伏見区や宇治市等）において、パーキンソン病専門のナーシングホームを展開。お一人おひとりの症状に合わせた「薬物療法（服薬管理）」と「個別リハビリ」を軸に、専門性の高い介護ケアを提供します。古都・京都の落ち着いた環境で、24時間看護の安心と共に自分らしい生活を支援いたします。</p>
    <ul class="scarchive__list">
    <?php
    // 表示したい施設のスラッグを配列で指定
    $target_facility_slugs = [
        "facility-list-12141", "shijo", "rokujizo", "nishikyougoku"
    ];

    $args = [
        'post_type'      => 'facility-list',
        'post_name__in'  => $target_facility_slugs, // スラッグで指定
        'posts_per_page' => -1,
        'orderby'        => 'post_name__in',        // 配列の順番通りに並べる
    ];
    $facility_query = new WP_Query($args);

    if ($facility_query->have_posts()) :
        while ($facility_query->have_posts()) : $facility_query->the_post();
            $f_id = get_the_ID();
            // 外部関数を使わず直接カスタムフィールドを取得
            $fields = get_fields($f_id) ?: [];

            // リンク先判定
            $special_page = $fields['special_page'] ?? [];
            $href = !empty($special_page['url']) ? $special_page['url'] : get_permalink($f_id);
            $target_attr = !empty($special_page['target_blank']) ? 'target="_blank" rel="noopener noreferrer"' : '';

            // 画像URLの取得
            $img_facility = $fields['img_facility'] ?? '';
            $img_main     = $fields['img_main'] ?? '';
            $img_url = '';
            if (!empty($img_facility)) {
                $img_url = is_array($img_facility) ? ($img_facility['url'] ?? '') : (is_numeric($img_facility) ? wp_get_attachment_image_url($img_facility, 'full') : $img_facility);
            } elseif (!empty($img_main)) {
                $img_url = is_array($img_main) ? ($img_main['url'] ?? '') : (is_numeric($img_main) ? wp_get_attachment_image_url($img_main, 'full') : $img_main);
            }
            if (empty($img_url)) $img_url = $default_img;

            // 各種データの抽出
            $categories = $fields['category'] ?? [];
            $type_val   = $fields['type'] ?? '';
            $type_label = $type_choices[$type_val] ?? $type_val;

            $price1 = $fields['price1'] ?? [];
            $availability = $price1['availability'] ?? [];
            $avail_val = $availability['availability_answer'] ?? '';
            $avail_label = $availability_choices[$avail_val] ?? '';

            $move_in_fee = (int)($price1['move_in_fee'] ?? 0);
            $monthly_amount = $price1['monthly_fee']['monthly_fee_amount'] ?? '';
            ?>

            <li>
              <a class="bg-white" href="<?php echo esc_url($href); ?>" <?php echo $target_attr; ?>>
                <div class="scarchive__list-image">
                  <img src="<?php echo esc_url($img_url); ?>" alt="<?php the_title(); ?>" loading="lazy">
                </div>
                <div class="scarchive__list-cont">
                  <div class="scarchive__list-info">
                    <?php if (!empty($categories)) : ?>
                      <ul class="scarchive__list-cate txt-12-14 txt-bold">
                        <?php foreach ($categories as $cat_slug) : if ($cat_slug === 'normal') continue; ?>
                          <li class="<?php echo esc_attr($cat_slug); ?>"><?php echo esc_html($category_choices[$cat_slug] ?? $cat_slug); ?></li>
                        <?php endforeach; ?>
                      </ul>
                    <?php endif; ?>

                    <p class="scarchive__list-type txt-12-14 txt-medium"><?php echo esc_html($type_label); ?></p>
                    <h3 class="scarchive__list-ttl txt-15-22 txt-bold"><?php the_title(); ?></h3>
                    <p class="scarchive__list-address txt-13-16 txt-medium"><?php echo esc_html($fields['area'] ?? ''); ?></p>
                    <p class="scarchive__list-station txt-12-14 txt-medium"><?php echo nl2br(esc_html($fields['station'] ?? '')); ?></p>

                    <?php if ($avail_label) : ?>
                      <div class="scarchive__list-vacant">
                        <p class="scarchive__list-vacant-block room-avail--<?php echo esc_attr($avail_val); ?> txt-13-16 txt-medium txt-white bg-yellow">
                          <?php echo esc_html($avail_label); ?>
                        </p>
                      </div>
                    <?php endif; ?>

                    <div class="scarchive__list-price">
                      <p class="scarchive__list-price-left txt-13-16 txt-medium">入居金</p>
                      <p class="scarchive__list-price-num txt-15-22 txt-medium txt-orange"><?php echo number_format($move_in_fee); ?>円</p>
                    </div>
                    <div class="scarchive__list-price">
                      <p class="scarchive__list-price-left txt-13-16 txt-medium">月額利用料</p>
                      <p class="scarchive__list-price-num txt-15-22 txt-medium txt-orange"><?php echo $monthly_amount ? number_format((int)$monthly_amount).'円' : '-'; ?></p>
                    </div>
                  </div>
                  <div class="scarchive__list-btn block txt-13-16 txt-bold txt-center txt-white bg-orange-gradiate-reverse">この施設の詳細を見る</div>
                </div>
              </a>
            </li>

        <?php endwhile; wp_reset_postdata(); endif; ?>
  </ul>
    </div>


    <div class="wrap-m space-s-bottom">
  <h2 class="ttl-jp-2l txt-bold ttl-border-l-green">奈良県のパーキンソン病専門の老人ホーム・介護施設</h2>
  <p class="txt-jp-m middle mb2">奈良県内（奈良市・大和郡山市等）の駅からアクセス良好な立地に、パーキンソン病・神経難病専門の老人ホームを配置しています。指定難病受給者証をお持ちの方への医療費軽減制度の活用についても詳しくご説明可能です。24時間体制の訪問看護と地域医療の連携により、重症度（ホーエン・ヤールの重症度分類）が高い方の受け入れも積極的に行っています。</p>
    <ul class="scarchive__list">
    <?php
    // 表示したい施設のスラッグを配列で指定
    $target_facility_slugs = [
        "facility-list-12138", "jr-nara"
    ];

    $args = [
        'post_type'      => 'facility-list',
        'post_name__in'  => $target_facility_slugs, // スラッグで指定
        'posts_per_page' => -1,
        'orderby'        => 'post_name__in',        // 配列の順番通りに並べる
    ];
    $facility_query = new WP_Query($args);

    if ($facility_query->have_posts()) :
        while ($facility_query->have_posts()) : $facility_query->the_post();
            $f_id = get_the_ID();
            // 外部関数を使わず直接カスタムフィールドを取得
            $fields = get_fields($f_id) ?: [];

            // リンク先判定
            $special_page = $fields['special_page'] ?? [];
            $href = !empty($special_page['url']) ? $special_page['url'] : get_permalink($f_id);
            $target_attr = !empty($special_page['target_blank']) ? 'target="_blank" rel="noopener noreferrer"' : '';

            // 画像URLの取得
            $img_facility = $fields['img_facility'] ?? '';
            $img_main     = $fields['img_main'] ?? '';
            $img_url = '';
            if (!empty($img_facility)) {
                $img_url = is_array($img_facility) ? ($img_facility['url'] ?? '') : (is_numeric($img_facility) ? wp_get_attachment_image_url($img_facility, 'full') : $img_facility);
            } elseif (!empty($img_main)) {
                $img_url = is_array($img_main) ? ($img_main['url'] ?? '') : (is_numeric($img_main) ? wp_get_attachment_image_url($img_main, 'full') : $img_main);
            }
            if (empty($img_url)) $img_url = $default_img;

            // 各種データの抽出
            $categories = $fields['category'] ?? [];
            $type_val   = $fields['type'] ?? '';
            $type_label = $type_choices[$type_val] ?? $type_val;

            $price1 = $fields['price1'] ?? [];
            $availability = $price1['availability'] ?? [];
            $avail_val = $availability['availability_answer'] ?? '';
            $avail_label = $availability_choices[$avail_val] ?? '';

            $move_in_fee = (int)($price1['move_in_fee'] ?? 0);
            $monthly_amount = $price1['monthly_fee']['monthly_fee_amount'] ?? '';
            ?>

            <li>
              <a class="bg-white" href="<?php echo esc_url($href); ?>" <?php echo $target_attr; ?>>
                <div class="scarchive__list-image">
                  <img src="<?php echo esc_url($img_url); ?>" alt="<?php the_title(); ?>" loading="lazy">
                </div>
                <div class="scarchive__list-cont">
                  <div class="scarchive__list-info">
                    <?php if (!empty($categories)) : ?>
                      <ul class="scarchive__list-cate txt-12-14 txt-bold">
                        <?php foreach ($categories as $cat_slug) : if ($cat_slug === 'normal') continue; ?>
                          <li class="<?php echo esc_attr($cat_slug); ?>"><?php echo esc_html($category_choices[$cat_slug] ?? $cat_slug); ?></li>
                        <?php endforeach; ?>
                      </ul>
                    <?php endif; ?>

                    <p class="scarchive__list-type txt-12-14 txt-medium"><?php echo esc_html($type_label); ?></p>
                    <h3 class="scarchive__list-ttl txt-15-22 txt-bold"><?php the_title(); ?></h3>
                    <p class="scarchive__list-address txt-13-16 txt-medium"><?php echo esc_html($fields['area'] ?? ''); ?></p>
                    <p class="scarchive__list-station txt-12-14 txt-medium"><?php echo nl2br(esc_html($fields['station'] ?? '')); ?></p>

                    <?php if ($avail_label) : ?>
                      <div class="scarchive__list-vacant">
                        <p class="scarchive__list-vacant-block room-avail--<?php echo esc_attr($avail_val); ?> txt-13-16 txt-medium txt-white bg-yellow">
                          <?php echo esc_html($avail_label); ?>
                        </p>
                      </div>
                    <?php endif; ?>

                    <div class="scarchive__list-price">
                      <p class="scarchive__list-price-left txt-13-16 txt-medium">入居金</p>
                      <p class="scarchive__list-price-num txt-15-22 txt-medium txt-orange"><?php echo number_format($move_in_fee); ?>円</p>
                    </div>
                    <div class="scarchive__list-price">
                      <p class="scarchive__list-price-left txt-13-16 txt-medium">月額利用料</p>
                      <p class="scarchive__list-price-num txt-15-22 txt-medium txt-orange"><?php echo $monthly_amount ? number_format((int)$monthly_amount).'円' : '-'; ?></p>
                    </div>
                  </div>
                  <div class="scarchive__list-btn block txt-13-16 txt-bold txt-center txt-white bg-orange-gradiate-reverse">この施設の詳細を見る</div>
                </div>
              </a>
            </li>

        <?php endwhile; wp_reset_postdata(); endif; ?>
  </ul>
    </div>


    <div class="wrap-m">
  <h2 class="ttl-jp-2l txt-bold ttl-border-l-green">滋賀県のパーキンソン病専門の老人ホーム・介護施設</h2>
  <p class="txt-jp-m middle mb2">滋賀県（栗東市・草津市エリア）にて、パーキンソン病に特化した最新のリハビリ環境を整えたナーシングホームを運営しています。滋賀エリアにお住まいの神経難病患者様が、住み慣れた地域で専門的なリハビリと看護を受けながら、明るくイキイキと過ごせるよう、ホテル運営で培ったおもてなしの心でサポートいたします。</p>
    <ul class="scarchive__list">
    <?php
    // 表示したい施設のスラッグを配列で指定
    $target_facility_slugs = [
        "facility-list-12136"
    ];

    $args = [
        'post_type'      => 'facility-list',
        'post_name__in'  => $target_facility_slugs, // スラッグで指定
        'posts_per_page' => -1,
        'orderby'        => 'post_name__in',        // 配列の順番通りに並べる
    ];
    $facility_query = new WP_Query($args);

    if ($facility_query->have_posts()) :
        while ($facility_query->have_posts()) : $facility_query->the_post();
            $f_id = get_the_ID();
            // 外部関数を使わず直接カスタムフィールドを取得
            $fields = get_fields($f_id) ?: [];

            // リンク先判定
            $special_page = $fields['special_page'] ?? [];
            $href = !empty($special_page['url']) ? $special_page['url'] : get_permalink($f_id);
            $target_attr = !empty($special_page['target_blank']) ? 'target="_blank" rel="noopener noreferrer"' : '';

            // 画像URLの取得
            $img_facility = $fields['img_facility'] ?? '';
            $img_main     = $fields['img_main'] ?? '';
            $img_url = '';
            if (!empty($img_facility)) {
                $img_url = is_array($img_facility) ? ($img_facility['url'] ?? '') : (is_numeric($img_facility) ? wp_get_attachment_image_url($img_facility, 'full') : $img_facility);
            } elseif (!empty($img_main)) {
                $img_url = is_array($img_main) ? ($img_main['url'] ?? '') : (is_numeric($img_main) ? wp_get_attachment_image_url($img_main, 'full') : $img_main);
            }
            if (empty($img_url)) $img_url = $default_img;

            // 各種データの抽出
            $categories = $fields['category'] ?? [];
            $type_val   = $fields['type'] ?? '';
            $type_label = $type_choices[$type_val] ?? $type_val;

            $price1 = $fields['price1'] ?? [];
            $availability = $price1['availability'] ?? [];
            $avail_val = $availability['availability_answer'] ?? '';
            $avail_label = $availability_choices[$avail_val] ?? '';

            $move_in_fee = (int)($price1['move_in_fee'] ?? 0);
            $monthly_amount = $price1['monthly_fee']['monthly_fee_amount'] ?? '';
            ?>

            <li>
              <a class="bg-white" href="<?php echo esc_url($href); ?>" <?php echo $target_attr; ?>>
                <div class="scarchive__list-image">
                  <img src="<?php echo esc_url($img_url); ?>" alt="<?php the_title(); ?>" loading="lazy">
                </div>
                <div class="scarchive__list-cont">
                  <div class="scarchive__list-info">
                    <?php if (!empty($categories)) : ?>
                      <ul class="scarchive__list-cate txt-12-14 txt-bold">
                        <?php foreach ($categories as $cat_slug) : if ($cat_slug === 'normal') continue; ?>
                          <li class="<?php echo esc_attr($cat_slug); ?>"><?php echo esc_html($category_choices[$cat_slug] ?? $cat_slug); ?></li>
                        <?php endforeach; ?>
                      </ul>
                    <?php endif; ?>

                    <p class="scarchive__list-type txt-12-14 txt-medium"><?php echo esc_html($type_label); ?></p>
                    <h3 class="scarchive__list-ttl txt-15-22 txt-bold"><?php the_title(); ?></h3>
                    <p class="scarchive__list-address txt-13-16 txt-medium"><?php echo esc_html($fields['area'] ?? ''); ?></p>
                    <p class="scarchive__list-station txt-12-14 txt-medium"><?php echo nl2br(esc_html($fields['station'] ?? '')); ?></p>

                    <?php if ($avail_label) : ?>
                      <div class="scarchive__list-vacant">
                        <p class="scarchive__list-vacant-block room-avail--<?php echo esc_attr($avail_val); ?> txt-13-16 txt-medium txt-white bg-yellow">
                          <?php echo esc_html($avail_label); ?>
                        </p>
                      </div>
                    <?php endif; ?>

                    <div class="scarchive__list-price">
                      <p class="scarchive__list-price-left txt-13-16 txt-medium">入居金</p>
                      <p class="scarchive__list-price-num txt-15-22 txt-medium txt-orange"><?php echo number_format($move_in_fee); ?>円</p>
                    </div>
                    <div class="scarchive__list-price">
                      <p class="scarchive__list-price-left txt-13-16 txt-medium">月額利用料</p>
                      <p class="scarchive__list-price-num txt-15-22 txt-medium txt-orange"><?php echo $monthly_amount ? number_format((int)$monthly_amount).'円' : '-'; ?></p>
                    </div>
                  </div>
                  <div class="scarchive__list-btn block txt-13-16 txt-bold txt-center txt-white bg-orange-gradiate-reverse">この施設の詳細を見る</div>
                </div>
              </a>
            </li>

        <?php endwhile; wp_reset_postdata(); endif; ?>
  </ul>
    <div class="space-s"></div>
    </div>


</section>

<section class="bg-beige space-2s space-2s-bottom">
  <div class="wrap-m">
    <p class="ttl-en-m txt-bold txt-center">STAFF</p>
    <h2 class="ttl-jp-4l  txt-green1 txt-bold txt-center mb1">スタッフ紹介</h2>
    <div class="grid3 gg2">
      <div>
        <figure class="mb-half"><img src="<?php bloginfo('template_directory');?>/assets/image/nursing/staff01.png" alt=""></figure>
        <p>毎朝の検温・バイタルチェックからお食事の準備・介助、排せつの確認など、ご入居者様の日々の生活を全般的にサポートしています。この仕事をしていて「うれしいな」と感じるのは、レクリエーション中にご入居者の楽しそうな姿を見たときです。スーパー・コートは、スタッフの人柄が良く、私自身、社会人として尊敬している先輩もいるので、ご入居者様の皆様も安心してお過ごしいただける環境だと胸を張って言えます。</p>
      </div>
      <div>
        <figure class="mb-half"><img src="<?php bloginfo('template_directory');?>/assets/image/nursing/staff02.png" alt=""></figure>
        <p>日々、介護スタッフと密に連携してご入居者様の健康管理や医療ケアを行っています。介護施設での看護、特にパーキンソン病のご入居者様に対しては生活を通じた様々なサポートが重要になるので、医療従事者の視点だけでなく介護の視点も意識したケアを大切にしています。体調や健康状態のことはもちろんイキイキと生活されている姿を見守ることにとてもやりがいを感じています。</p>
      </div>
      <div>
        <figure class="mb-half"><img src="<?php bloginfo('template_directory');?>/assets/image/nursing/staff03.png" alt=""></figure>
        <p>毎日、ご入居者様にトレーニングや体操を指導しています。柔道整復師として整骨院、デイサービス、特別養護老人ホームでキャリアを重ねたあと、学生時代の同級生からスーパー・コートを勧められ、入社しました。配属されてすぐに実感したのは、スーパーホテルが母体であることによる、どこよりも丁寧なおもてなしの心です。私もスーパー・コートの一員として、ご入居者様への寄り添いを日々意識しています。</p>
      </div>
    </div>
  </div>
</section>

<section class="space-2s space-2s-bottom wrap-m">
  <p class="ttl-en-m txt-bold txt-center">THOUGHT</p>
  <h2 class="ttl-jp-4l txt-green1 txt-bold txt-center mb1">スーパー・コートの想い</h2>
  <div class="nursing-ceo gg2">
    <figure><img src="<?php bloginfo('template_directory');?>/assets/image/nursing/ceo.jpg" alt=""></figure>
    <p>パーキンソン病・神経難病を患っているからといって、自分らしい生活をあきらめる必要はございません。 <br>私たちスーパー・コートは、パーキンソン病や脊髄小脳変性症などの神経難病をお持ちの方に、ひとりの尊厳ある人生、ご家族にとっての大切な存在、わたしたちと時代を共にする社会の一員として、イキイキとした毎日を送っていただきたいと考えております。<br><br>近年は、早期診断・早期治療により、パーキンソン病などの神経難病の方でも支障なく日常生活を送れるようになってきました。しかしそれはあくまでも「病気の治療」という観点での話です。 本来の自分らしい生き方を取り戻すという意味においては、服薬やリハビリ、医療、日常生活などのさまざまな場面で、お一人おひとりに寄り添った支援が必要となります。 その実現のため、私たちスーパー・コートのパーキンソン病・神経難病に特化した介護施設（リハビリ特化型ナーシングホーム）では、病院やご家庭ではなかなか難しい、介護・看護・医療の整った日常生活の包括的なサポートのご提供をお約束いたします。</p>
  </div>
</section>
<hr>

<section class="space-2s space-2l-bottom wrap-m">
<p class="ttl-en-m txt-bold txt-center">QUESTION</p>
<h2 class="ttl-jp-4l txt-green1 txt-bold txt-center mb1">パーキンソン病・神経難病<br class="pc-only">専門ホームのよくある質問</h2>

<dl class="ac mb1">
<dt class="bg-green  ac-parent">
<div class="ac-parent-flex flex g1 align-center">
<p class="question txt-white txt-bold txt-center  ttl-en-m">Q</p><p class="question-item txt-white txt-medium txt-jp-m">「リハビリ特化型ナーシングホーム」の入居対象はどんな人ですか？</p>
</div>
</dt>
<dd class="bg-white  ac-child">
<div class="ac-child-flex flex g1">
<p class="answer-item txt-regular">スーパー・コートが直営するパーキンソン病などの難病の専門介護施設「リハビリ特化型ナーシングホーム」では、下記の難病（厚生労働大臣が定める別表7・8の疾病・状態）の方を入居対象としています。<br><br>
<span class="txt-bold txt-green1">パーキンソン病（ヤール3以上）、進行性核上性麻痺、多系統萎縮症、大脳皮質基底核変性症、脊髄小脳変性症、がん末期、多発性硬化症、重症筋無力症、スモン、筋萎縮性側索硬化症、ハンチントン病、進行性筋ジストロフィー症、プリオン病、亜急性硬化性全脳炎、ライソゾーム病、副腎白質ジストロフィー、脊髄性筋萎縮症、球脊髄性筋萎縮症、性炎症性脱髄性多発神経炎、後天性免疫不全症候群、頸髄損傷、人工呼吸器を使用している状態</span><br>※指定難病受給者証をお持ちの方</p>
</div>
</dd>
</dl>

<dl class="ac mb1 mt2">
<dt class="bg-green  ac-parent">
<div class="ac-parent-flex flex g1 align-center">
<p class="question txt-white txt-bold txt-center  ttl-en-m">Q</p><p class="question-item txt-white txt-medium txt-jp-m">パーキンソン専門は、パーキンソン病に罹っている方だけが対象ですか？</p>
</div>
</dt>
<dd class="bg-white  ac-child">
<div class="ac-child-flex flex g1">
<p class="answer-item txt-regular">スーパー・コートのパーキンソン病専門の老人ホームでは、下記の疾病の方を入居対象としています。<br><br>
<span class="txt-bold txt-green1">パーキンソン病（ヤール3以上）、進行性核上性麻痺、大脳皮質基底核変性症、多系統萎縮症、脊髄小脳変性症</span><br>※指定難病受給者証をお持ちの方<br><br>「リハビリ特化型ナーシングホーム」が入居対象としている「厚生労働大臣が定める別表7・8の疾病・状態」のうち、上記の5疾患が、パーキンソン病専門の介護施設の入居対象としています。</p>
</div>
</dd>
</dl>

<dl class="ac mb1 mt2">
<dt class="bg-green  ac-parent">
<div class="ac-parent-flex flex g1 align-center">
<p class="question txt-white txt-bold txt-center  ttl-en-m">Q</p><p class="question-item txt-white txt-medium txt-jp-m">入居にかかる料金はいくらぐらいですか？</p>
</div>
</dt>
<dd class="bg-white  ac-child">
<div class="ac-child-flex flex g1">
<p class="answer-item txt-regular">入居金は0円です。月額利用料は98,000円～ですが、施設により異なりますので、まずはお問い合わせください。</p>
</div>
</dd>
</dl>

<dl class="ac mb1 mt2">
<dt class="bg-green  ac-parent">
<div class="ac-parent-flex flex g1 align-center">
<p class="question txt-white txt-bold txt-center  ttl-en-m">Q</p><p class="question-item txt-white txt-medium txt-jp-m">月額費用に含まれている項目を教えてください。</p>
</div>
</dt>
<dd class="bg-white  ac-child">
<div class="ac-child-flex flex g1">
<p class="answer-item txt-regular">家賃、管理費、食費が含まれております。</p>
</div>
</dd>
</dl>

<dl class="ac mb1 mt2">
<dt class="bg-green  ac-parent">
<div class="ac-parent-flex flex g1 align-center">
<p class="question txt-white txt-bold txt-center  ttl-en-m">Q</p><p class="question-item txt-white txt-medium txt-jp-m">リハビリの頻度はどれぐらいですか？</p>
</div>
</dt>
<dd class="bg-white  ac-child">
<div class="ac-child-flex flex g1">
<p class="answer-item txt-regular">リハビリの実施は週5回行える体制を整えています。医師の指示のもとお一人おひとりに適切な回数で、1回あたり30分程度で実施しております。</p>
</div>
</dd>
</dl>

<dl class="ac mb1 mt2">
<dt class="bg-green  ac-parent">
<div class="ac-parent-flex flex g1 align-center">
<p class="question txt-white txt-bold txt-center  ttl-en-m">Q</p><p class="question-item txt-white txt-medium txt-jp-m">家族の面会は可能ですか？</p>
</div>
</dt>
<dd class="bg-white  ac-child">
<div class="ac-child-flex flex g1">
<p class="answer-item txt-regular">9:00～18:00の間で可能でございます。それ以外の時間でも事前にご連絡いただければ対応可能です。</p>
</div>
</dd>
</dl>

<dl class="ac mb1 mt2">
<dt class="bg-green  ac-parent">
<div class="ac-parent-flex flex g1 align-center">
<p class="question txt-white txt-bold txt-center  ttl-en-m">Q</p><p class="question-item txt-white txt-medium txt-jp-m">入居後も外出や外泊はできますか？</p>
</div>
</dt>
<dd class="bg-white  ac-child">
<div class="ac-child-flex flex g1">
<p class="answer-item txt-regular">ご家族さまの許可のうえ、事前に届出をいただけますと可能です。</p>
</div>
</dd>
</dl>

<dl class="ac mb1 mt2">
<dt class="bg-green  ac-parent">
<div class="ac-parent-flex flex g1 align-center">
<p class="question txt-white txt-bold txt-center  ttl-en-m">Q</p><p class="question-item txt-white txt-medium txt-jp-m">食事は施設内で作っていますか？</p>
</div>
</dt>
<dd class="bg-white  ac-child">
<div class="ac-child-flex flex g1">
<p class="answer-item txt-regular">施設内の厨房で調理を行っております。</p>
</div>
</dd>
</dl>

</section>

<hr>

<section id="form" class="wrap-m bg-white mt2">
  <div class="facility-list-form-inner">
  <div class="tabs-wrap space-3s">
    <ul class="tabs txt-bold">
      <li class="tabs-btn txt-center" data-tab="1">資料請求</li>
      <li class="tabs-btn txt-center" data-tab="2">見学申込</li>
      <li class="tabs-btn txt-center" data-tab="3">お問い合わせ</li>
    </ul>
  </div>

  <div  class="pi1 space-2s space-2l-bottom">
    <div id="tab1" class="tabs-cont">
      <p class="facility-list-form-ttl txt-center txt-medium">資料請求フォームが<br class="sp-only">選択されています</p>
      <?php echo do_shortcode('[contact-form-7 id="9d53f3e" title="新共通資料請求"]'); ?>
    </div>
    <div id="tab2" class="tabs-cont">
      <p class="facility-list-form-ttl txt-center txt-medium">見学申込フォームが<br class="sp-only">選択されています</p>
      <?php echo do_shortcode('[contact-form-7 id="adc9899" title="新共通見学希望"]'); ?>
    </div>
    <div id="tab3" class="tabs-cont">
      <p class="facility-list-form-ttl txt-center txt-medium">お問い合わせフォームが<br class="sp-only">選択されています</p>
      <?php echo do_shortcode('[contact-form-7 id="e6f4eea" title="新共通お問い合わせ"]'); ?>
    </div>
  </div>
  </div>
</section>

<hr>

<section class="space-2s space-2s-bottom wrap-m">
 <p class="ttl-en-m txt-bold txt-center">COLUMN</p>
 <h2 class="ttl-jp-4l txt-green1 txt-bold txt-center mb1">コラム</h2>

 <?php
  $args = [
    'post_type' => 'topics', 
    'posts_per_page' => 3, 
  ];
  $query = new WP_Query($args); ?>
 
<?php if ($query->have_posts()):?>
 
  <ul class="top-newfacility-wrap">
 
    <?php while ($query->have_posts()) : $query->the_post(); ?>
 
    <li class="top-newfacility-item">
      <a href="<?php the_permalink(); ?>">
      <figure>
                      <?php if ( has_post_thumbnail() ) : ?>
                        <?php the_post_thumbnail(); ?>
                      <?php else : ?>
                        <img src="<?php echo get_theme_file_uri('/assets/image/cms/noimage.png'); ?>" alt="<?php the_title(); ?>">
                      <?php endif; ?>
      </figure>
      <time class="top-event__time"><?php echo get_the_time('Y.m.d'); ?></time>
      <h4 class="top-event__txt txt-medium"><?php the_title(); ?></h4>
      </a>
    </li>
 
    <?php endwhile; ?>
 
  </ul>
 
<?php endif; wp_reset_postdata(); ?>

<p class="space-3s"><a class="archive-btn  bg-yellow txt-white txt-center" href="<?php echo home_url('/topics/'); ?>">一覧へ</a></p>

</section>

</main>

<script>
$('.ac-parent').on('click', function () {
    $(this).next().slideToggle();
    $(this).toggleClass("open");
    $('.ac-parent').not(this).removeClass('open');
    $('.ac-parent').not($(this)).next('.ac-child').slideUp();
  });
</script>

<?php get_footer(); ?>
