<?php 
$group_field_room = get_field('room');
$group_field_shared = get_field('shared');
$group_field_dining_room = get_field('dining_room');
$group_field_bathroom_toilet = get_field('bathroom_toilet');
$group_field_rehabilitation = get_field('rehabilitation');
$group_field_parking_exterior = get_field('parking_exterior');
$group_field_floor = get_field('floor');
$group_field_price1 = get_field('price1');
$group_field_price2 = get_field('price2');
$group_field_price3 = get_field('price3');
$group_field_table = get_field('table');
$group_field_medical_acceptance_system = get_field('medical_acceptance_system');
$group_field_infection_front_acceptance_system = get_field('infection_front_acceptance_system');
$group_field_infection_acceptance_system= get_field('acceptance_system');
$group_field_equipment= get_field('equipment');
$group_field_faq= get_field('よくある質問');

get_header(); ?>


	<!------------------------------------------------
	     コンテンツ開始
	------------------------------------------------>
	<!---------- パンクズ -->
	<div class="bg_gray">
		<ul itemscope itemtype="http://schema.org/BreadcrumbList" class="breadcrumbList container_wrap_wide font_Serif">
			<li itemscope itemprop="itemListElement" itemtype="http://schema.org/ListItem">
				<a itemprop="item" href="/">
					<span itemprop="name">ホーム</span>
				</a>
				<meta itemprop="position" content="1" />
			</li>
			<li itemscope itemprop="itemListElement" itemtype="http://schema.org/ListItem">
				<a itemprop="item" href="/facility/">
					<span itemprop="name">施設一覧</span>
				</a>
				<meta itemprop="position" content="2" />
			</li>
					
<?php
if ($terms = get_the_terms($post->ID, 'facilitys_category')) {
  foreach ( $terms as $term ) { ?>		
			<li itemscope itemprop="itemListElement" itemtype="http://schema.org/ListItem">
				<a itemprop="item" href="/facility/<?php echo esc_html($term->slug); ?>/">
					<span itemprop="name"><?php echo esc_html($term->name); ?>の有料老人ホーム</span>
				</a>
				<meta itemprop="position" content="3" />
			</li>
<?php
  }
}
?>
			<li itemscope itemprop="itemListElement" itemtype="http://schema.org/ListItem">
				<span itemprop="name"><?php the_title(); ?></span>
				<meta itemprop="position" content="4" />
			</li>

		</ul>
	</div>
	<!---------- /パンクズ -->
	<!---------- KV -->
	<section id="KV_area" style="background-image: url(<?php echo get_field('img_main'); ?>)">
		<div class="container_wrap_wide">
			<div class="txt_wrap fc_white font_Serif">
				<h1><?php the_title(); ?></h1>
				<p class="sub_txt fontM"><?php echo get_field('area'); ?><br>
					<?php echo get_field('type'); ?></p>
				
			</div>
		</div>
	</section>
	<!---------- /KV -->
	<!---------- feature_wrap -->


<?php if( get_field('commitment') ): ?>
	<section id="feature_wrap">
		<div class="container_wrap">
			<ul class="feature_list">

<?php
$fields = get_field('commitment');
if( $fields ): ?>
<?php foreach( $fields as $field ): ?>
<li><span><?php echo $field; ?></span></li>
<?php endforeach; ?>
<?php endif; ?>
			</ul>
		</div>
	</section>
<?php endif; ?>
	<!---------- /feature_wrap -->
	<!---------- lead_wrap -->
<?php if( get_field('beginning') ): ?>
	<section id="lead_wrap" class="bg_main">
		<div class="container_wrap">
			<p class="font_Serif fontM"><?php echo get_field('beginning'); ?></p>
		</div>
	</section>
<?php endif; ?>
	<!---------- /lead_wrap -->
	<!---------- con_wrap -->
	<section id="con_wrap">
		<div class="container_wrap con_space">
			<!-- 施設の特徴 -->
			<div class="h2_area">
				<h2 class="h2_ttl">施設の特徴</h2>
				<p class="h2_sub_txt">Features</p>
			</div>
			<div class="feature_area con_space_btm">

<?php
$fields = get_field('features');
if( $fields ): ?>
<?php foreach( $fields as $field ): ?>

			<?php if( $field === "パーキンソン病対応"): ?>	
				<!--  -->
				<div class="box_row">
					<div class="txt_box">
						<h3 class="font_Serif fc_main fontL">パーキンソン病対応</h3>
						<p>ご入居者の状態に合わせた個別のリハビリプログラムをもとに身体機能の維持や回復に務め、自立した生活の支援や、生活の質が向上されるよう、専門的な医療、看護、リハビリ、介護が一体となり、ご入居者の運動機能の維持や生活の質の向上を目指しております。</p>
						<div class="more_link">
							<a href="/pd/"><img src="<?php echo get_template_directory_uri(); ?>/img/btn.svg" alt=""></a>
						</div>
					</div>
					<div class="img_box"><img src="<?php echo get_template_directory_uri(); ?>/img/img_pd.jpg" alt=""></div>
				</div>
				<?php endif; ?>

				<?php if( $field == "認知症ケア"): ?>	
				<!--  -->
				<div class="box_row">
					<div class="txt_box">
						<h3 class="font_Serif fc_main fontL">認知症ケア</h3>
						<p>「したいこと」「好きなこと」「できること」に着目し、認知症ケアを行っています。これまで過ごした環境や個性を理解し、ご入居者様との信頼関係を重視。夢や目標の実現をお手伝いし、イキイキとした毎日を過ごして頂けるよう努力しています。</p>
						<div class="more_link">
							<a href="/feature/care/"><img src="<?php echo get_template_directory_uri(); ?>/img/btn.svg" alt=""></a>
						</div>
					</div>
					<div class="img_box"><img src="<?php echo get_template_directory_uri(); ?>/img/img_ninchi.jpg" alt=""></div>
				</div>
				<?php endif; ?>
				<?php if( $field == "24時間看護体制"): ?>	
				<!--  -->
				<div class="box_row">
					<div class="txt_box">
						<h3 class="font_Serif fc_main fontL">24時間看護体制</h3>
						<p>24時間体制で看護師が日常の健康管理を行います。また、理学療法士や介護士と連携し、毎日の生活動作がリハビリ訓練となるよう看護師がサポートします。</p>
						<div class="more_link">
							<a href="/pd/"><img src="<?php echo get_template_directory_uri(); ?>/img/btn.svg" alt=""></a>
						</div>
					</div>
					<div class="img_box"><img src="<?php echo get_template_directory_uri(); ?>/img/img_kango.jpg" alt=""></div>
				</div>
				<?php endif; ?>
				<?php if( $field == "リハビリ・トレーニング"): ?>	
				<!--  -->
				<div class="box_row">
					<div class="txt_box">
						<h3 class="font_Serif fc_main fontL">リハビリ・トレーニング</h3>
						<p>リハビリ分野を強化した病院で知識や技術を深めた理学療法士や作業療法士が、パーキンソン病に特化した良質なリハビリテーションをご提供します。</p>
						<div class="more_link">
							<a href="/feature/ikiiki/sc-fit/"><img src="<?php echo get_template_directory_uri(); ?>/img/btn.svg" alt=""></a>
						</div>
					</div>
					<div class="img_box"><img src="<?php echo get_template_directory_uri(); ?>/img/img_riha.jpg" alt=""></div>
				</div>
				<?php endif; ?>
				<?php if( $field == "専門医による医療体制"): ?>	
				<!--  -->
				<div class="box_row">
					<div class="txt_box">
						<h3 class="font_Serif fc_main fontL">専門医による医療体制</h3>
						<p>日常の体調管理はもちろん、提携クリニックの神経内科医による訪問診療で、継続的な医療をご提供いたします。</p>
						<div class="more_link">
							<a href="/pd/"><img src="<?php echo get_template_directory_uri(); ?>/img/btn.svg" alt=""></a>
						</div>
					</div>
					<div class="img_box"><img src="<?php echo get_template_directory_uri(); ?>/img/img_iryo.jpg" alt=""></div>
				</div>
				<?php endif; ?>
				<?php if( $field == "医薬協業による服薬管理"): ?>	
				<!--  -->
				<div class="box_row">
					<div class="txt_box">
						<h3 class="font_Serif fc_main fontL">医薬協業による服薬管理</h3>
						<p>薬剤師が看護師と連携し、パーキンソン病にとって特に大切な服薬管理や投薬調整など、安心して医療を受けられる支援を行います。</p>
						<div class="more_link">
							<a href="/pd/"><img src="<?php echo get_template_directory_uri(); ?>/img/btn.svg" alt=""></a>
						</div>
					</div>
					<div class="img_box"><img src="<?php echo get_template_directory_uri(); ?>/img/img_fukuyaku.jpg" alt=""></div>
				</div>
				<?php endif; ?>
				<?php if( $field == "天然温泉"): ?>
				<!--  -->
				<div class="box_row">
					<div class="txt_box">
						<h3 class="font_Serif fc_main fontL">天然温泉</h3>
						<p>スーパー・コートにはグループ会社である「スーパーホテルCity大阪天然温泉」または「スーパーホテル奈良・大和郡山」から天然温泉が運ばれてきます。施設に居ながらにして天然温泉をお楽しみいただくことができます。</p>
						<div class="more_link">
							<a href="/feature/bath/"><img src="<?php echo get_template_directory_uri(); ?>/img/btn.svg" alt=""></a>
						</div>
					</div>
					<div class="img_box"><img src="<?php echo get_template_directory_uri(); ?>/img/img_onsen.jpg" alt=""></div>
				</div>
				<?php endif; ?>
				<?php if( $field == "食事と健康イオン水"): ?>
				<!--  -->
				<div class="box_row">
					<div class="txt_box">
						<h3 class="font_Serif fc_main fontL">食事と健康イオン水</h3>
						<p>調理用の水や飲料水はもちろん、館内のどの蛇口をひねっても「健康イオン水」が出てきます。食材にも気を配り、季節やイベント、お体の状態に応じた献立でお食事をお楽しみ頂けます。</p>
						<div class="more_link">
							<a href="/feature/ikiiki/"><img src="<?php echo get_template_directory_uri(); ?>/img/btn.svg" alt=""></a>
						</div>
					</div>
					<div class="img_box"><img src="<?php echo get_template_directory_uri(); ?>/img/img_syoku.jpg" alt=""></div>
				</div>
				<?php endif; ?>
				<?php if( $field == "歯科健診"): ?>
				<!--  -->
				<div class="box_row">
					<div class="txt_box">
						<h3 class="font_Serif fc_main fontL">歯科健診</h3>
						<p>機器の選定や内装デザインなど理学療法士が監修したパーキンソン病特化型のリハビリテーションルームです。理学療法士など専門のスタッフがお一人お一人の状態に合わせて適切なリハビリテーションをご提供させていただきます。</p>
						<div class="more_link">
							<a href="/feature/medicine/"><img src="<?php echo get_template_directory_uri(); ?>/img/btn.svg" alt=""></a>
						</div>
					</div>
					<div class="img_box"><img src="<?php echo get_template_directory_uri(); ?>/img/img06.jpg" alt=""></div>
				</div>
				<!--  -->
				<?php endif; ?>
<?php endforeach; ?>
<?php endif; ?>
			</div>
			<!-- /施設の特徴 -->
			<!-- 居室・館内のご案内 -->
			<div class="h2_area">
				<h2 class="h2_ttl">居室・館内のご案内</h2>
				<p class="h2_sub_txt">Residence guide</p>
			</div>
			<div class="guide_area con_space_btm">
				<!--  -->
			<?php if( $group_field_room['img1']['img1'] ): ?>
				<div class="con_wrap">
					<h3 class="font_Serif fc_main fontL">居室</h3>
					<ul class="img_list">
						<?php if( $group_field_room['img1']['img1'] ): ?>
						<li><img src="<?php echo $group_field_room['img1']['img1']; ?>" alt="">
						<?php if( $group_field_room['img1']['img1_text'] ): ?>
							<p class="fontS"><?php echo $group_field_room['img1']['img1_text']; ?></p>
						<?php endif; ?>
							</li>
						<?php endif; ?>
						
						<?php if( $group_field_room['img2']['img2'] ): ?>
						<li><img src="<?php echo $group_field_room['img2']['img2']; ?>" alt="">
						<?php if( $group_field_room['img2']['img2_text'] ): ?>
							<p class="fontS"><?php echo $group_field_room['img2']['img2_text']; ?></p>
						<?php endif; ?>
							</li>
						<?php endif; ?>
						
						<?php if( $group_field_room['img3']['img3'] ): ?>
						<li><img src="<?php echo $group_field_room['img3']['img3']; ?>" alt="">
						<?php if( $group_field_room['img3']['img3_text'] ): ?>
							<p class="fontS"><?php echo $group_field_room['img3']['img3_text']; ?></p>
						<?php endif; ?>
							</li>
						<?php endif; ?>
						
						<?php if( $group_field_room['img4']['img4'] ): ?>
						<li><img src="<?php echo $group_field_room['img4']['img4']; ?>" alt="">
						<?php if( $group_field_room['img4']['img4_text'] ): ?>
							<p class="fontS"><?php echo $group_field_room['img4']['img4_text']; ?></p>
						<?php endif; ?>
							</li>
						<?php endif; ?>
						
						<?php if( $group_field_room['img5']['img5'] ): ?>
						<li><img src="<?php echo $group_field_room['img5']['img5']; ?>" alt="">
						<?php if( $group_field_room['img5']['img5_text'] ): ?>
							<p class="fontS"><?php echo $group_field_room['img5']['img5_text']; ?></p>
						<?php endif; ?>
							</li>
						<?php endif; ?>
						
						<?php if( $group_field_room['img6']['img6'] ): ?>
						<li><img src="<?php echo $group_field_room['img6']['img6']; ?>" alt="">
						<?php if( $group_field_room['img6']['img6_text'] ): ?>
							<p class="fontS"><?php echo $group_field_room['img6']['img6_text']; ?></p>
						<?php endif; ?>
							</li>
						<?php endif; ?>
					</ul>
					
						<?php if( $group_field_room['text']): ?>
					<p class="detail_txt bg_main"><?php echo $group_field_room['text']; ?></p>
						<?php endif; ?>
				</div>
				<!--  -->
			<?php endif; ?>
			<?php if( $group_field_shared['img1']['img1'] ): ?>
				<div class="con_wrap">
					<h3 class="font_Serif fc_main fontL">館内共用部</h3>
					<ul class="img_list">
						<?php if( $group_field_shared['img1']['img1'] ): ?>
						<li><img src="<?php echo $group_field_shared['img1']['img1']; ?>" alt="">
						<?php if( $group_field_shared['img1']['img1_text'] ): ?>
							<p class="fontS"><?php echo $group_field_shared['img1']['img1_text']; ?></p>
						<?php endif; ?>
							</li>
						<?php endif; ?>
						
						<?php if( $group_field_shared['img2']['img2'] ): ?>
						<li><img src="<?php echo $group_field_shared['img2']['img2']; ?>" alt="">
						<?php if( $group_field_shared['img2']['img2_text'] ): ?>
							<p class="fontS"><?php echo $group_field_shared['img2']['img2_text']; ?></p>
						<?php endif; ?>
							</li>
						<?php endif; ?>
						
						<?php if( $group_field_shared['img3']['img3'] ): ?>
						<li><img src="<?php echo $group_field_shared['img3']['img3']; ?>" alt="">
						<?php if( $group_field_shared['img3']['img3_text'] ): ?>
							<p class="fontS"><?php echo $group_field_shared['img3']['img3_text']; ?></p>
						<?php endif; ?>
							</li>
						<?php endif; ?>
						
						<?php if( $group_field_shared['img4']['img4'] ): ?>
						<li><img src="<?php echo $group_field_shared['img4']['img4']; ?>" alt="">
						<?php if( $group_field_shared['img4']['img4_text'] ): ?>
							<p class="fontS"><?php echo $group_field_shared['img4']['img4_text']; ?></p>
						<?php endif; ?>
							</li>
						<?php endif; ?>
						
						<?php if( $group_field_shared['img5']['img5'] ): ?>
						<li><img src="<?php echo $group_field_shared['img5']['img5']; ?>" alt="">
						<?php if( $group_field_shared['img5']['img5_text'] ): ?>
							<p class="fontS"><?php echo $group_field_shared['img5']['img5_text']; ?></p>
						<?php endif; ?>
							</li>
						<?php endif; ?>
						
						<?php if( $group_field_shared['img6']['img6'] ): ?>
						<li><img src="<?php echo $group_field_shared['img6']['img6']; ?>" alt="">
						<?php if( $group_field_shared['img6']['img6_text'] ): ?>
							<p class="fontS"><?php echo $group_field_shared['img6']['img6_text']; ?></p>
						<?php endif; ?>
							</li>
						<?php endif; ?>
					</ul>
					
						<?php if( $group_field_shared['text']): ?>
					<p class="detail_txt bg_main"><?php echo $group_field_shared['text']; ?></p>
						<?php endif; ?>
				</div>
			<?php endif; ?>
				<!--  -->
			<?php if( $group_field_dining_room['img1']['img1'] ): ?>
				<div class="con_wrap">
					<h3 class="font_Serif fc_main fontL">食堂</h3>
					<ul class="img_list">
						<?php if( $group_field_dining_room['img1']['img1'] ): ?>
						<li><img src="<?php echo $group_field_dining_room['img1']['img1']; ?>" alt="">
						<?php if( $group_field_dining_room['img1']['img1_text'] ): ?>
							<p class="fontS"><?php echo $group_field_dining_room['img1']['img1_text']; ?></p>
						<?php endif; ?>
							</li>
						<?php endif; ?>
						
						<?php if( $group_field_dining_room['img2']['img2'] ): ?>
						<li><img src="<?php echo $group_field_dining_room['img2']['img2']; ?>" alt="">
						<?php if( $group_field_dining_room['img2']['img2_text'] ): ?>
							<p class="fontS"><?php echo $group_field_dining_room['img2']['img2_text']; ?></p>
						<?php endif; ?>
							</li>
						<?php endif; ?>
						
						<?php if( $group_field_dining_room['img3']['img3'] ): ?>
						<li><img src="<?php echo $group_field_dining_room['img3']['img3']; ?>" alt="">
						<?php if( $group_field_dining_room['img3']['img3_text'] ): ?>
							<p class="fontS"><?php echo $group_field_dining_room['img3']['img3_text']; ?></p>
						<?php endif; ?>
							</li>
						<?php endif; ?>
						
						<?php if( $group_field_dining_room['img4']['img4'] ): ?>
						<li><img src="<?php echo $group_field_dining_room['img4']['img4']; ?>" alt="">
						<?php if( $group_field_dining_room['img4']['img4_text'] ): ?>
							<p class="fontS"><?php echo $group_field_dining_room['img4']['img4_text']; ?></p>
						<?php endif; ?>
							</li>
						<?php endif; ?>
						
						<?php if( $group_field_dining_room['img5']['img5'] ): ?>
						<li><img src="<?php echo $group_field_dining_room['img5']['img5']; ?>" alt="">
						<?php if( $group_field_dining_room['img5']['img5_text'] ): ?>
							<p class="fontS"><?php echo $group_field_dining_room['img5']['img5_text']; ?></p>
						<?php endif; ?>
							</li>
						<?php endif; ?>
						
						<?php if( $group_field_dining_room['img6']['img6'] ): ?>
						<li><img src="<?php echo $group_field_dining_room['img6']['img6']; ?>" alt="">
						<?php if( $group_field_dining_room['img6']['img6_text'] ): ?>
							<p class="fontS"><?php echo $group_field_dining_room['img6']['img6_text']; ?></p>
						<?php endif; ?>
							</li>
						<?php endif; ?>
					</ul>
					
						<?php if( $group_field_dining_room['text']): ?>
					<p class="detail_txt bg_main"><?php echo $group_field_dining_room['text']; ?></p>
						<?php endif; ?>
				</div>
			<?php endif; ?>
				<!--  -->
			<?php if( $group_field_bathroom_toilet['img1']['img1'] ): ?>
				<div class="con_wrap">
					<h3 class="font_Serif fc_main fontL">浴室・トイレ</h3>
					<ul class="img_list">
						<?php if( $group_field_bathroom_toilet['img1']['img1'] ): ?>
						<li><img src="<?php echo $group_field_bathroom_toilet['img1']['img1']; ?>" alt="">
						<?php if( $group_field_bathroom_toilet['img1']['img1_text'] ): ?>
							<p class="fontS"><?php echo $group_field_bathroom_toilet['img1']['img1_text']; ?></p>
						<?php endif; ?>
							</li>
						<?php endif; ?>
						
						<?php if( $group_field_bathroom_toilet['img2']['img2'] ): ?>
						<li><img src="<?php echo $group_field_bathroom_toilet['img2']['img2']; ?>" alt="">
						<?php if( $group_field_bathroom_toilet['img2']['img2_text'] ): ?>
							<p class="fontS"><?php echo $group_field_bathroom_toilet['img2']['img2_text']; ?></p>
						<?php endif; ?>
							</li>
						<?php endif; ?>
						
						<?php if( $group_field_bathroom_toilet['img3']['img3'] ): ?>
						<li><img src="<?php echo $group_field_bathroom_toilet['img3']['img3']; ?>" alt="">
						<?php if( $group_field_bathroom_toilet['img3']['img3_text'] ): ?>
							<p class="fontS"><?php echo $group_field_bathroom_toilet['img3']['img3_text']; ?></p>
						<?php endif; ?>
							</li>
						<?php endif; ?>
						
						<?php if( $group_field_bathroom_toilet['img4']['img4'] ): ?>
						<li><img src="<?php echo $group_field_bathroom_toilet['img4']['img4']; ?>" alt="">
						<?php if( $group_field_bathroom_toilet['img4']['img4_text'] ): ?>
							<p class="fontS"><?php echo $group_field_bathroom_toilet['img4']['img4_text']; ?></p>
						<?php endif; ?>
							</li>
						<?php endif; ?>
						
						<?php if( $group_field_bathroom_toilet['img5']['img5'] ): ?>
						<li><img src="<?php echo $group_field_bathroom_toilet['img5']['img5']; ?>" alt="">
						<?php if( $group_field_bathroom_toilet['img5']['img5_text'] ): ?>
							<p class="fontS"><?php echo $group_field_bathroom_toilet['img5']['img5_text']; ?></p>
						<?php endif; ?>
							</li>
						<?php endif; ?>
						
						<?php if( $group_field_bathroom_toilet['img6']['img6'] ): ?>
						<li><img src="<?php echo $group_field_bathroom_toilet['img6']['img6']; ?>" alt="">
						<?php if( $group_field_bathroom_toilet['img6']['img6_text'] ): ?>
							<p class="fontS"><?php echo $group_field_bathroom_toilet['img6']['img6_text']; ?></p>
						<?php endif; ?>
							</li>
						<?php endif; ?>
					</ul>
					
						<?php if( $group_field_bathroom_toilet['text']): ?>
					<p class="detail_txt bg_main"><?php echo $group_field_bathroom_toilet['text']; ?></p>
						<?php endif; ?>
				</div>
			<?php endif; ?>
				<!--  -->
			<?php if( $group_field_rehabilitation['img1']['img1'] ): ?>
				<div class="con_wrap">
					<h3 class="font_Serif fc_main fontL">リハビリテーション室</h3>
					<ul class="img_list">
						<?php if( $group_field_rehabilitation['img1']['img1'] ): ?>
						<li><img src="<?php echo $group_field_rehabilitation['img1']['img1']; ?>" alt="">
						<?php if( $group_field_rehabilitation['img1']['img1_text'] ): ?>
							<p class="fontS"><?php echo $group_field_rehabilitation['img1']['img1_text']; ?></p>
						<?php endif; ?>
							</li>
						<?php endif; ?>
						
						<?php if( $group_field_rehabilitation['img2']['img2'] ): ?>
						<li><img src="<?php echo $group_field_rehabilitation['img2']['img2']; ?>" alt="">
						<?php if( $group_field_rehabilitation['img2']['img2_text'] ): ?>
							<p class="fontS"><?php echo $group_field_rehabilitation['img2']['img2_text']; ?></p>
						<?php endif; ?>
							</li>
						<?php endif; ?>
						
						<?php if( $group_field_rehabilitation['img3']['img3'] ): ?>
						<li><img src="<?php echo $group_field_rehabilitation['img3']['img3']; ?>" alt="">
						<?php if( $group_field_rehabilitation['img3']['img3_text'] ): ?>
							<p class="fontS"><?php echo $group_field_rehabilitation['img3']['img3_text']; ?></p>
						<?php endif; ?>
							</li>
						<?php endif; ?>
						
						<?php if( $group_field_rehabilitation['img4']['img4'] ): ?>
						<li><img src="<?php echo $group_field_rehabilitation['img4']['img4']; ?>" alt="">
						<?php if( $group_field_rehabilitation['img4']['img4_text'] ): ?>
							<p class="fontS"><?php echo $group_field_rehabilitation['img4']['img4_text']; ?></p>
						<?php endif; ?>
							</li>
						<?php endif; ?>
						
						<?php if( $group_field_rehabilitation['img5']['img5'] ): ?>
						<li><img src="<?php echo $group_field_rehabilitation['img5']['img5']; ?>" alt="">
						<?php if( $group_field_rehabilitation['img5']['img5_text'] ): ?>
							<p class="fontS"><?php echo $group_field_rehabilitation['img5']['img5_text']; ?></p>
						<?php endif; ?>
							</li>
						<?php endif; ?>
						
						<?php if( $group_field_rehabilitation['img6']['img6'] ): ?>
						<li><img src="<?php echo $group_field_rehabilitation['img6']['img6']; ?>" alt="">
						<?php if( $group_field_rehabilitation['img6']['img6_text'] ): ?>
							<p class="fontS"><?php echo $group_field_rehabilitation['img6']['img6_text']; ?></p>
						<?php endif; ?>
							</li>
						<?php endif; ?>
					</ul>
					
						<?php if( $group_field_rehabilitation['text']): ?>
					<p class="detail_txt bg_main"><?php echo $group_field_rehabilitation['text']; ?></p>
						<?php endif; ?>
				</div>
			<?php endif; ?>
				<!--  -->
			<?php if( $group_field_parking_exterior['img1']['img1'] ): ?>
				<div class="con_wrap">
					<h3 class="font_Serif fc_main fontL">駐車場・外観</h3>
					<ul class="img_list">
						<?php if( $group_field_parking_exterior['img1']['img1'] ): ?>
						<li><img src="<?php echo $group_field_parking_exterior['img1']['img1']; ?>" alt="">
						<?php if( $group_field_parking_exterior['img1']['img1_text'] ): ?>
							<p class="fontS"><?php echo $group_field_parking_exterior['img1']['img1_text']; ?></p>
						<?php endif; ?>
							</li>
						<?php endif; ?>
						
						<?php if( $group_field_parking_exterior['img2']['img2'] ): ?>
						<li><img src="<?php echo $group_field_parking_exterior['img2']['img2']; ?>" alt="">
						<?php if( $group_field_parking_exterior['img2']['img2_text'] ): ?>
							<p class="fontS"><?php echo $group_field_parking_exterior['img2']['img2_text']; ?></p>
						<?php endif; ?>
							</li>
						<?php endif; ?>
						
						<?php if( $group_field_parking_exterior['img3']['img3'] ): ?>
						<li><img src="<?php echo $group_field_parking_exterior['img3']['img3']; ?>" alt="">
						<?php if( $group_field_parking_exterior['img3']['img3_text'] ): ?>
							<p class="fontS"><?php echo $group_field_parking_exterior['img3']['img3_text']; ?></p>
						<?php endif; ?>
							</li>
						<?php endif; ?>
						
						<?php if( $group_field_parking_exterior['img4']['img4'] ): ?>
						<li><img src="<?php echo $group_field_parking_exterior['img4']['img4']; ?>" alt="">
						<?php if( $group_field_parking_exterior['img4']['img4_text'] ): ?>
							<p class="fontS"><?php echo $group_field_parking_exterior['img4']['img4_text']; ?></p>
						<?php endif; ?>
							</li>
						<?php endif; ?>
						
						<?php if( $group_field_parking_exterior['img5']['img5'] ): ?>
						<li><img src="<?php echo $group_field_parking_exterior['img5']['img5']; ?>" alt="">
						<?php if( $group_field_parking_exterior['img5']['img5_text'] ): ?>
							<p class="fontS"><?php echo $group_field_parking_exterior['img5']['img5_text']; ?></p>
						<?php endif; ?>
							</li>
						<?php endif; ?>
						
						<?php if( $group_field_parking_exterior['img6']['img6'] ): ?>
						<li><img src="<?php echo $group_field_parking_exterior['img6']['img6']; ?>" alt="">
						<?php if( $group_field_parking_exterior['img6']['img6_text'] ): ?>
							<p class="fontS"><?php echo $group_field_parking_exterior['img6']['img6_text']; ?></p>
						<?php endif; ?>
							</li>
						<?php endif; ?>
					</ul>
					
						<?php if( $group_field_parking_exterior['text']): ?>
					<p class="detail_txt bg_main"><?php echo $group_field_parking_exterior['text']; ?></p>
						<?php endif; ?>
				</div>
			<?php endif; ?>
				<!--  -->
			<?php if( $group_field_floor['img1']['img1'] ): ?>
				<div class="con_wrap">
					<h3 class="font_Serif fc_main fontL">館内見取り図</h3>
					<ul class="img_list">
						<?php if( $group_field_floor['img1']['img1'] ): ?>
						<li><img src="<?php echo $group_field_floor['img1']['img1']; ?>" alt="">
						<?php if( $group_field_floor['img1']['img1_text'] ): ?>
							<p class="fontS"><?php echo $group_field_floor['img1']['img1_text']; ?></p>
						<?php endif; ?>
							</li>
						<?php endif; ?>
						
						<?php if( $group_field_floor['img2']['img2'] ): ?>
						<li><img src="<?php echo $group_field_floor['img2']['img2']; ?>" alt="">
						<?php if( $group_field_floor['img2']['img2_text'] ): ?>
							<p class="fontS"><?php echo $group_field_floor['img2']['img2_text']; ?></p>
						<?php endif; ?>
							</li>
						<?php endif; ?>
						
						<?php if( $group_field_floor['img3']['img3'] ): ?>
						<li><img src="<?php echo $group_field_floor['img3']['img3']; ?>" alt="">
						<?php if( $group_field_floor['img3']['img3_text'] ): ?>
							<p class="fontS"><?php echo $group_field_floor['img3']['img3_text']; ?></p>
						<?php endif; ?>
							</li>
						<?php endif; ?>
						
						<?php if( $group_field_floor['img4']['img4'] ): ?>
						<li><img src="<?php echo $group_field_floor['img4']['img4']; ?>" alt="">
						<?php if( $group_field_floor['img4']['img4_text'] ): ?>
							<p class="fontS"><?php echo $group_field_floor['img4']['img4_text']; ?></p>
						<?php endif; ?>
							</li>
						<?php endif; ?>
						
						<?php if( $group_field_floor['img5']['img5'] ): ?>
						<li><img src="<?php echo $group_field_floor['img5']['img5']; ?>" alt="">
						<?php if( $group_field_floor['img5']['img5_text'] ): ?>
							<p class="fontS"><?php echo $group_field_floor['img5']['img5_text']; ?></p>
						<?php endif; ?>
							</li>
						<?php endif; ?>
						
						<?php if( $group_field_floor['img6']['img6'] ): ?>
						<li><img src="<?php echo $group_field_floor['img6']['img6']; ?>" alt="">
						<?php if( $group_field_floor['img6']['img6_text'] ): ?>
							<p class="fontS"><?php echo $group_field_floor['img6']['img6_text']; ?></p>
						<?php endif; ?>
							</li>
						<?php endif; ?>
					</ul>
					
						<?php if( $group_field_floor['text']): ?>
					<p class="detail_txt bg_main"><?php echo $group_field_floor['text']; ?></p>
						<?php endif; ?>
				</div>
			<?php endif; ?>
				<!--  -->
			</div>
			<!-- /居室・館内のご案内 -->
			<?php if( $group_field_price1['move_in_fee']): ?>
			<!-- ご利用料金 -->
			<div class="h2_area">
				<h2 class="h2_ttl">ご利用料金</h2>
				<p class="h2_sub_txt">Facility fee</p>
			</div>
			<?php if( $group_field_price1['move_in_fee'] || $group_field_price1['monthly_fee'] || $group_field_price1['availability']): ?>
			<div class="table_box con_space_btm">
				<?php if( $group_field_price1['fee_name'] ): ?>
						<h3 class="font_Serif fc_main fontL mb30"><?php echo $group_field_price1['fee_name']; ?></h3>
						<?php endif; ?>
				<table class="table_price pc_table">
					<tr>
						<?php if( $group_field_price1['move_in_fee'] ): ?>
						<th>入居金</th>
						<?php endif; ?>
						<?php if( $group_field_price1['monthly_fee'] ): ?>
						<th>月額利用料</th>
						<?php endif; ?>
						<?php if( $group_field_price1['availability'] ): ?>
						<th>空室状況</th>
						<?php endif; ?>
					</tr>
					<tr>
						<?php if( $group_field_price1['move_in_fee'] ): ?>
						<td><span class="fontL fc_main fw_bold"><?php echo number_format($group_field_price1['move_in_fee']); ?></span>円</td>
						<?php endif; ?>
						<?php if( $group_field_price1['monthly_fee'] ): ?>
						<td><span class="fontL fc_main fw_bold"><?php echo number_format($group_field_price1['monthly_fee']); ?></span>円(税込)</td>
						<?php endif; ?>
						<?php if( $group_field_price1['availability'] ): ?>
						<td>
<?php if( $group_field_price1['availability'] === "ご入居受付中"): ?>	
<img src="<?php echo get_template_directory_uri(); ?>/img/icon_table_accept.svg" alt=""><span class="accept fw_bold">ご入居受付中</span>
<?php elseif( $group_field_price1['availability'] === "お問い合わせください"): ?>	
<img src="<?php echo get_template_directory_uri(); ?>/img/icon_table_noaccept.svg" alt=""><span class="noaccept fw_bold">お問い合わせください</span>
<?php endif; ?>
							</td>
						<?php endif; ?>
					</tr>
				</table>
				
				<table class="table_price sp_table">
					<?php if( $group_field_price1['move_in_fee'] ): ?>
					<tr>
						<th>入居金</th>
						<td><span class="fontL fc_main fw_bold"><?php echo $group_field_price1['move_in_fee']; ?></span>円</td>
					</tr>
						<?php endif; ?>
						<?php if( $group_field_price1['monthly_fee'] ): ?>
					<tr>
						<th>月額利用料</th>
						<td><span class="fontL fc_main fw_bold"><?php echo $group_field_price1['monthly_fee']; ?></span>円(税込)</td>
					</tr>
						<?php endif; ?>
						<?php if( $group_field_price1['availability'] ): ?>
					<tr>
						<th>空室状況</th>
						<td>
<?php if( $group_field_price1['availability'] === "ご入居受付中"): ?>	
<img src="<?php echo get_template_directory_uri(); ?>/img/icon_table_accept.svg" alt=""><span class="accept fw_bold">ご入居受付中</span>
<?php elseif( $group_field_price1['availability'] === "お問い合わせください"): ?>	
<img src="<?php echo get_template_directory_uri(); ?>/img/icon_table_noaccept.svg" alt=""><span class="noaccept fw_bold">お問い合わせください</span>
<?php endif; ?>
						</td>
					</tr>
						<?php endif; ?>
				</table>
				<?php if( $group_field_price1['annotation'] ): ?>
				<ul class="fontS note_list">
					<li><?php echo $group_field_price1['annotation']; ?></li>
				</ul>
				<?php endif; ?>
			</div>
			<!--  -->
			<?php endif; ?>
				<?php endif; ?>
			<?php if( $group_field_price2['move_in_fee'] || $group_field_price2['monthly_fee'] || $group_field_price2['availability']): ?>
			<div class="table_box con_space_btm">
				<?php if( $group_field_price2['fee_name'] ): ?>
						<h3 class="font_Serif fc_main fontL mb30"><?php echo $group_field_price2['fee_name']; ?></h3>
						<?php endif; ?>
				<table class="table_price pc_table">
					<tr>
						<?php if( $group_field_price2['move_in_fee'] ): ?>
						<th>入居金</th>
						<?php endif; ?>
						<?php if( $group_field_price2['monthly_fee'] ): ?>
						<th>月額利用料</th>
						<?php endif; ?>
						<?php if( $group_field_price2['availability'] ): ?>
						<th>空室状況</th>
						<?php endif; ?>
					</tr>
					<tr>
						<?php if( $group_field_price2['move_in_fee'] ): ?>
						<td><span class="fontL fc_main fw_bold"><?php echo number_format($group_field_price2['move_in_fee']); ?></span>円</td>
						<?php endif; ?>
						<?php if( $group_field_price2['monthly_fee'] ): ?>
						<td><span class="fontL fc_main fw_bold"><?php echo number_format($group_field_price2['monthly_fee']); ?></span>円(税込)</td>
						<?php endif; ?>
						<?php if( $group_field_price2['availability'] ): ?>
						<td>
<?php if( $group_field_price2['availability'] === "ご入居受付中"): ?>	
<img src="<?php echo get_template_directory_uri(); ?>/img/icon_table_accept.svg" alt=""><span class="accept fw_bold">ご入居受付中</span>
<?php elseif( $group_field_price2['availability'] === "お問い合わせください"): ?>	
<img src="<?php echo get_template_directory_uri(); ?>/img/icon_table_noaccept.svg" alt=""><span class="noaccept fw_bold">お問い合わせください</span>
<?php endif; ?>
							</td>
						<?php endif; ?>
					</tr>
				</table>
				
				<table class="table_price sp_table">
					<?php if( $group_field_price2['move_in_fee'] ): ?>
					<tr>
						<th>入居金</th>
						<td><span class="fontL fc_main fw_bold"><?php echo number_format($group_field_price2['move_in_fee']); ?></span>円</td>
					</tr>
						<?php endif; ?>
						<?php if( $group_field_price2['monthly_fee'] ): ?>
					<tr>
						<th>月額利用料</th>
						<td><span class="fontL fc_main fw_bold"><?php echo number_format($group_field_price2['monthly_fee']); ?></span>円(税込)</td>
					</tr>
						<?php endif; ?>
						<?php if( $group_field_price2['availability'] ): ?>
					<tr>
						<th>空室状況</th>
						<td>
<?php if( $group_field_price2['availability'] === "ご入居受付中"): ?>	
<img src="<?php echo get_template_directory_uri(); ?>/img/icon_table_accept.svg" alt=""><span class="accept fw_bold">ご入居受付中</span>
<?php elseif( $group_field_price2['availability'] === "お問い合わせください"): ?>	
<img src="<?php echo get_template_directory_uri(); ?>/img/icon_table_noaccept.svg" alt=""><span class="noaccept fw_bold">お問い合わせください</span>
<?php endif; ?>
						</td>
					</tr>
						<?php endif; ?>
				</table>
				<?php if( $group_field_price2['annotation'] ): ?>
				<ul class="fontS note_list">
					<li><?php echo $group_field_price2['annotation']; ?></li>
				</ul>
				<?php endif; ?>
			</div>
			<!--  -->
				<?php endif; ?>
			<?php if( $group_field_price3['move_in_fee'] || $group_field_price3['monthly_fee'] || $group_field_price3['availability']): ?>
			<div class="table_box con_space_btm">
				<?php if( $group_field_price3['fee_name'] ): ?>
						<h3 class="font_Serif fc_main fontL mb30"><?php echo $group_field_price3['fee_name']; ?></h3>
						<?php endif; ?>
				<table class="table_price pc_table">
					<tr>
						<?php if( $group_field_price3['move_in_fee'] ): ?>
						<th>入居金</th>
						<?php endif; ?>
						<?php if( $group_field_price3['monthly_fee'] ): ?>
						<th>月額利用料</th>
						<?php endif; ?>
						<?php if( $group_field_price3['availability'] ): ?>
						<th>空室状況</th>
						<?php endif; ?>
					</tr>
					<tr>
						<?php if( $group_field_price3['move_in_fee'] ): ?>
						<td><span class="fontL fc_main fw_bold"><?php echo number_format($group_field_price3['move_in_fee']); ?></span>円</td>
						<?php endif; ?>
						<?php if( $group_field_price3['monthly_fee'] ): ?>
						<td><span class="fontL fc_main fw_bold"><?php echo number_format($group_field_price3['monthly_fee']); ?></span>円(税込)</td>
						<?php endif; ?>
						<?php if( $group_field_price3['availability'] ): ?>
						<td>
<?php if( $group_field_price3['availability'] === "ご入居受付中"): ?>	
<img src="<?php echo get_template_directory_uri(); ?>/img/icon_table_accept.svg" alt=""><span class="accept fw_bold">ご入居受付中</span>
<?php elseif( $group_field_price3['availability'] === "お問い合わせください"): ?>	
<img src="<?php echo get_template_directory_uri(); ?>/img/icon_table_noaccept.svg" alt=""><span class="noaccept fw_bold">お問い合わせください</span>
<?php endif; ?>
							</td>
						<?php endif; ?>
					</tr>
				</table>
				
				<table class="table_price sp_table">
					<?php if( $group_field_price3['move_in_fee'] ): ?>
					<tr>
						<th>入居金</th>
						<td><span class="fontL fc_main fw_bold"><?php echo number_format($group_field_price3['move_in_fee']); ?></span>円</td>
					</tr>
						<?php endif; ?>
						<?php if( $group_field_price3['monthly_fee'] ): ?>
					<tr>
						<th>月額利用料</th>
						<td><span class="fontL fc_main fw_bold"><?php echo number_format($group_field_price3['monthly_fee']); ?></span>円(税込)</td>
					</tr>
						<?php endif; ?>
						<?php if( $group_field_price3['availability'] ): ?>
					<tr>
						<th>空室状況</th>
						<td>
<?php if( $group_field_price3['availability'] === "ご入居受付中"): ?>	
<img src="<?php echo get_template_directory_uri(); ?>/img/icon_table_accept.svg" alt=""><span class="accept fw_bold">ご入居受付中</span>
<?php elseif( $group_field_price3['availability'] === "お問い合わせください"): ?>	
<img src="<?php echo get_template_directory_uri(); ?>/img/icon_table_noaccept.svg" alt=""><span class="noaccept fw_bold">お問い合わせください</span>
<?php endif; ?>
						</td>
					</tr>
						<?php endif; ?>
				</table>
				<?php if( $group_field_price3['annotation'] ): ?>
				<ul class="fontS note_list">
					<li><?php echo $group_field_price3['annotation']; ?></li>
				</ul>
				<?php endif; ?>
			</div>
			<!--  -->
				<?php endif; ?>
			<!-- /ご利用料金 -->
			<!-- 入居対象・条件 -->
			<div class="h2_area">
				<h2 class="h2_ttl">入居対象・条件</h2>
				<p class="h2_sub_txt">Condition</p>
			</div>
			<div class="table_box con_space_btm">
				<table class="table_type01">
					<?php if(get_field('table_box1')['table_th']): ?>
					<tr>
						<th><?php echo get_field('table_box1')['table_th']; ?></th>
						<td><?php echo get_field('table_box1')['table_td']; ?></td>
					</tr>
					<?php endif; ?>
					<?php if(get_field('table_box2')['table_th']): ?>
					<tr>
						<th><?php echo get_field('table_box2')['table_th']; ?></th>
						<td><?php echo get_field('table_box2')['table_td']; ?></td>
					</tr>
					<?php endif; ?>
					<?php if(get_field('table_box2')['table_th']): ?>
					<tr>
						<th><?php echo get_field('table_box3')['table_th']; ?></th>
						<td><?php echo get_field('table_box3')['table_td']; ?></td>
					</tr>
					<?php endif; ?>
					<?php if(get_field('table_box2')['table_th']): ?>
					<tr>
						<th><?php echo get_field('table_box4')['table_th']; ?></th>
						<td><?php echo get_field('table_box4')['table_td']; ?></td>
					</tr>
					<?php endif; ?>
					<?php if(get_field('table_box2')['table_th']): ?>
					<tr>
						<th><?php echo get_field('table_box5')['table_th']; ?></th>
						<td><?php echo get_field('table_box5')['table_td']; ?></td>
					</tr>
					<?php endif; ?>
					<?php if(get_field('table_box2')['table_th']): ?>
					<tr>
						<th><?php echo get_field('table_box6')['table_th']; ?></th>
						<td><?php echo get_field('table_box6')['table_td']; ?></td>
					</tr>
					<?php endif; ?>
					<?php if(get_field('table_box2')['table_th']): ?>
					<tr>
						<th><?php echo get_field('table_box7')['table_th']; ?></th>
						<td><?php echo get_field('table_box7')['table_td']; ?></td>
					</tr>
					<?php endif; ?>
				</table>
			</div>
			<!-- /入居対象・条件 -->
		<?php if($group_field_table['table_box1']['table_th']): ?>
			<!-- 介護・医療体制 -->
			<div class="h2_area">
				<h2 class="h2_ttl">介護・医療体制</h2>
				<p class="h2_sub_txt">Nursing / Medical</p>
			</div>
			<!--<div class="table_box con_space_btm_narrow">
				<table class="table_type01">
					<?php if($group_field_table['table_box1']['table_th']): ?>
					<tr>
						<th><?php echo $group_field_table['table_box1']['table_th']; ?></th>
						<td><?php echo $group_field_table['table_box1']['table_td']; ?></td>
					</tr>
					<?php endif; ?>
					<?php if($group_field_table['table_box2']['table_th']): ?>
					<tr>
						<th><?php echo $group_field_table['table_box2']['table_th']; ?></th>
						<td><?php echo $group_field_table['table_box2']['table_td']; ?></td>
					</tr>
					<?php endif; ?>
					<?php if($group_field_table['table_box3']['table_th']): ?>
					<tr>
						<th><?php echo $group_field_table['table_box3']['table_th']; ?></th>
						<td><?php echo $group_field_table['table_box3']['table_td']; ?></td>
					</tr>
					<?php endif; ?>
					<?php if($group_field_table['table_box4']['table_th']): ?>
					<tr>
						<th><?php echo $group_field_table['table_box4']['table_th']; ?></th>
						<td><?php echo $group_field_table['table_box4']['table_td']; ?></td>
					</tr>
					<?php endif; ?>
					<?php if($group_field_table['table_box5']['table_th']): ?>
					<tr>
						<th><?php echo $group_field_table['table_box5']['table_th']; ?></th>
						<td><?php echo $group_field_table['table_box5']['table_td']; ?></td>
					</tr>
					<?php endif; ?>
					<?php if($group_field_table['table_box6']['table_th']): ?>
					<tr>
						<th><?php echo $group_field_table['table_box6']['table_th']; ?></th>
						<td><?php echo $group_field_table['table_box6']['table_td']; ?></td>
					</tr>
					<?php endif; ?>
				</table>
			</div>-->
			<!--  -->
					<?php endif; ?>
			<?php if($group_field_medical_acceptance_system['choice1']): ?>
			<h3 class="font_Serif fc_main fontL">医療面の受け入れ体制</h3>
			<ul class="conditions_list fontS">
				<li><img src="<?php echo get_template_directory_uri(); ?>/img/conditions_img01.svg" alt="">受入可能</li>
				<li><img src="<?php echo get_template_directory_uri(); ?>/img/conditions_img02.svg" alt="">受入不可</li>
				<li><img src="<?php echo get_template_directory_uri(); ?>/img/conditions_img03.svg" alt="">受入には条件があります</li>
			</ul>
			<ul class="accept_con_list">
				<?php if($group_field_medical_acceptance_system['choice1']): ?>
				<li><span>たん吸引</span><img src="<?php echo get_template_directory_uri(); ?>/img/accept_con_list_img0<?php echo $group_field_medical_acceptance_system['choice1']; ?>.svg" alt=""></li>
				<?php endif; ?>
				<?php if($group_field_medical_acceptance_system['choice2']): ?>
				<li><span>胃ろう</span><img src="<?php echo get_template_directory_uri(); ?>/img/accept_con_list_img0<?php echo $group_field_medical_acceptance_system['choice2']; ?>.svg" alt=""></li>
				<?php endif; ?>
				<?php if($group_field_medical_acceptance_system['choice3']): ?>
				<li><span>腸ろう</span><img src="<?php echo get_template_directory_uri(); ?>/img/accept_con_list_img0<?php echo $group_field_medical_acceptance_system['choice3']; ?>.svg" alt=""></li>
				<?php endif; ?>
				<?php if($group_field_medical_acceptance_system['choice4']): ?>
				<li><span>中心静脈栄養(IVH)</span><img src="<?php echo get_template_directory_uri(); ?>/img/accept_con_list_img0<?php echo $group_field_medical_acceptance_system['choice4']; ?>.svg" alt=""></li>
				<?php endif; ?>
				<?php if($group_field_medical_acceptance_system['choice5']): ?>
				<li><span>鼻腔経管</span><img src="<?php echo get_template_directory_uri(); ?>/img/accept_con_list_img0<?php echo $group_field_medical_acceptance_system['choice5']; ?>.svg" alt=""></li>
				<?php endif; ?>
				<?php if($group_field_medical_acceptance_system['choice6']): ?>
				<li><span>ストーマ</span><img src="<?php echo get_template_directory_uri(); ?>/img/accept_con_list_img0<?php echo $group_field_medical_acceptance_system['choice6']; ?>.svg" alt=""></li>
				<?php endif; ?>
				<?php if($group_field_medical_acceptance_system['choice7']): ?>
				<li><span>インシュリン投与</span><img src="<?php echo get_template_directory_uri(); ?>/img/accept_con_list_img0<?php echo $group_field_medical_acceptance_system['choice7']; ?>.svg" alt=""></li>
				<?php endif; ?>
				<?php if($group_field_medical_acceptance_system['choice8']): ?>
				<li><span>在宅酸素</span><img src="<?php echo get_template_directory_uri(); ?>/img/accept_con_list_img0<?php echo $group_field_medical_acceptance_system['choice8']; ?>.svg" alt=""></li>
				<?php endif; ?>
				<?php if($group_field_medical_acceptance_system['choice9']): ?>
				<li><span>尿バルーン</span><img src="<?php echo get_template_directory_uri(); ?>/img/accept_con_list_img0<?php echo $group_field_medical_acceptance_system['choice9']; ?>.svg" alt=""></li>
				<?php endif; ?>
				<?php if($group_field_medical_acceptance_system['choice10']): ?>
				<li><span>人工呼吸器</span><img src="<?php echo get_template_directory_uri(); ?>/img/accept_con_list_img0<?php echo $group_field_medical_acceptance_system['choice10']; ?>.svg" alt=""></li>
				<?php endif; ?>
				<?php if($group_field_medical_acceptance_system['choice11']): ?>
				<li><span>透析</span><img src="<?php echo get_template_directory_uri(); ?>/img/accept_con_list_img0<?php echo $group_field_medical_acceptance_system['choice11']; ?>.svg" alt=""></li>
				<?php endif; ?>
				<?php if($group_field_medical_acceptance_system['choice12']): ?>
				<li><span>褥瘡(とこずれ)</span><img src="<?php echo get_template_directory_uri(); ?>/img/accept_con_list_img0<?php echo $group_field_medical_acceptance_system['choice12']; ?>.svg" alt=""></li>
				<?php endif; ?>
			</ul>
			<ul class="fontS note_list con_space_btm_narrow">
				<li><?php echo get_field('medical_acceptance_system_text'); ?></li>
			</ul>
			<!--  -->
			<!--<h3 class="font_Serif fc_main fontL">感染正面の受け入れ体制</h3>
			<ul class="conditions_list fontS">
				<li><img src="<?php echo get_template_directory_uri(); ?>/img/conditions_img01.svg" alt="">受入可能</li>
				<li><img src="<?php echo get_template_directory_uri(); ?>/img/conditions_img02.svg" alt="">受入不可</li>
				<li><img src="<?php echo get_template_directory_uri(); ?>/img/conditions_img03.svg" alt="">受入には条件があります</li>
			</ul>
			<ul class="accept_con_list">
				<?php if($group_field_infection_front_acceptance_system['choice1']): ?>
				<li><span>MRSA(ブドウ球菌感染症）</span><img src="<?php echo get_template_directory_uri(); ?>/img/accept_con_list_img0<?php echo $group_field_infection_front_acceptance_system['choice1']; ?>.svg" alt=""></li>
				<?php endif; ?>
				<?php if($group_field_infection_front_acceptance_system['choice2']): ?>
				<li><span>肝炎</span><img src="<?php echo get_template_directory_uri(); ?>/img/accept_con_list_img0<?php echo $group_field_infection_front_acceptance_system['choice2']; ?>.svg" alt=""></li>
				<?php endif; ?>
				<?php if($group_field_infection_front_acceptance_system['choice3']): ?>
				<li><span>梅毒</span><img src="<?php echo get_template_directory_uri(); ?>/img/accept_con_list_img0<?php echo $group_field_infection_front_acceptance_system['choice3']; ?>.svg" alt=""></li>
				<?php endif; ?>
				<?php if($group_field_infection_front_acceptance_system['choice4']): ?>
				<li><span>疥癬（かいせん）</span><img src="<?php echo get_template_directory_uri(); ?>/img/accept_con_list_img0<?php echo $group_field_infection_front_acceptance_system['choice4']; ?>.svg" alt=""></li>
				<?php endif; ?>
				<?php if($group_field_infection_front_acceptance_system['choice5']): ?>
				<li><span>結核</span><img src="<?php echo get_template_directory_uri(); ?>/img/accept_con_list_img0<?php echo $group_field_infection_front_acceptance_system['choice5']; ?>.svg" alt=""></li>
				<?php endif; ?>
			</ul>
			<ul class="fontS note_list">
				<li><?php echo get_field('infection_front_acceptance_system_text'); ?></li>
			</ul>-->
			<!-- /介護・医療体制 -->
			<?php endif; ?>
		</div>
		
				<?php if(get_field('text')): ?>
		<!-- ご入居をお考えのみなさまへ -->
		<div class="bg_main con_space">
			<div class="container_wrap">
				<div class="h2_area text_center">
					<h2 class="h2_ttl">ご入居をお考えのみなさまへ</h2>
					<p class="h2_sub_txt">Greeting</p>
				</div>
				<div class="greeting_row">
					<div class="pic_box">
						<div class="pic_item">
							<img src="<?php echo get_field('img'); ?>" alt="画像">
						</div>
						<p><?php echo get_field('text'); ?></p>
					</div>
					<div class="txt_box font_Serif">
						<p class="fontM"><?php echo get_field('text2'); ?></p>
					</div>
				</div>

			</div>
		</div>
		<!-- /ご入居をお考えのみなさまへ -->
			<?php endif; ?>
		
		<!-- アクセス・施設概要 -->
		<div class="container_wrap con_space">
			<div class="h2_area">
				<h2 class="h2_ttl">アクセス・施設概要</h2>
				<p class="h2_sub_txt">Access / Outline</p>
			</div>
			<div class="map_wrap">
				<div class="iframe-aspect con_space_btm_narrow">
					<iframe class="mb30" src="https://maps.google.co.jp/maps?output=embed&q=<?php echo get_field('area'); ?>&z=16" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
					
					<!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3280.83288411386!2d135.5667061!3d34.684166999999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6000e07c14be1d7b%3A0xbde553e4b7144c65!2z44CSNTc3LTAwNjEg5aSn6Ziq5bqc5p2x5aSn6Ziq5biC5qOu5rKz5YaF6KW_77yR5LiB55uu77yS77yW4oiS77yS77yRIDI255WqMjHlj7c!5e0!3m2!1sja!2sjp!4v1696171801980!5m2!1sja!2sjp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>-->
				<!--  -->
					
				<h3 class="font_Serif fc_main fontL mb30">アクセス</h3>
				<div class="table_box con_space_btm_narrow">
					<table class="table_type01">
						<?php if($group_field_infection_acceptance_system['train']): ?>
						<tr>
							<th>電車でお越しの場合</th>
							<td><?php echo $group_field_infection_acceptance_system['train']; ?></td>
						</tr>
						<?php endif; ?>
						<?php if($group_field_infection_acceptance_system['car']): ?>
						<tr>
							<th>お車でお越しの場合</th>
							<td><?php echo $group_field_infection_acceptance_system['car']; ?></td>
						</tr>
						<?php endif; ?>
					</table>
				</div>
				<!--  -->
				<h3 class="font_Serif fc_main fontL mb30">施設概要</h3>
				<div class="table_box con_space_btm_narrow">
					<table class="table_type01">
						<?php if($group_field_equipment['choice5']): ?>
				<li><span>結核</span><img src="<?php echo get_template_directory_uri(); ?>/img/accept_con_list_img0<?php echo $group_field_infection_front_acceptance_system['choice5']; ?>.svg" alt=""></li>
				<?php endif; ?>
					<?php if($group_field_equipment['table_box1']): ?>
					<tr>
						<th>施設名</th>
						<td><?php echo $group_field_equipment['table_box1']; ?></td>
					</tr>
					<?php endif; ?>
					<?php if($group_field_equipment['table_box2']): ?>
					<tr>
						<th>施設の目的</th>
						<td><?php echo $group_field_equipment['table_box2']; ?></td>
					</tr>
					<?php endif; ?>
					<?php if($group_field_equipment['table_box3']): ?>
					<tr>
						<th>郵便番号</th>
						<td><?php echo $group_field_equipment['table_box3']; ?></td>
					</tr>
					<?php endif; ?>
					<?php if($group_field_equipment['table_box4']): ?>
					<tr>
						<th>所在地</th>
						<td><?php echo $group_field_equipment['table_box4']; ?></td>
					</tr>
					<?php endif; ?>
					<?php if($group_field_equipment['table_box5']): ?>
					<tr>
						<th>電話番号</th>
						<td><?php echo $group_field_equipment['table_box5']; ?></td>
					</tr>
					<?php endif; ?>
					<?php if($group_field_equipment['table_box6']): ?>
					<tr>
						<th>規模・構造</th>
						<td><?php echo $group_field_equipment['table_box6']; ?></td>
					</tr>
					<?php endif; ?>
					<?php if($group_field_equipment['table_box7']): ?>
					<tr>
						<th>開設日</th>
						<td><?php echo $group_field_equipment['table_box7']; ?></td>
					</tr>
					<?php endif; ?>
					<?php if($group_field_equipment['table_box8']): ?>
					<tr>
						<th>居室面積</th>
						<td><?php echo $group_field_equipment['table_box8']; ?></td>
					</tr>
					<?php endif; ?>
						
					<?php if($group_field_equipment['table_box9']): ?>
					<tr>
						<th>延床面積</th>
						<td><?php echo $group_field_equipment['table_box9']; ?></td>
					</tr>
					<?php endif; ?>
						
					<?php if($group_field_equipment['table_box10']): ?>
					<tr>
						<th>居室数</th>
						<td><?php echo $group_field_equipment['table_box10']; ?></td>
					</tr>
					<?php endif; ?>
						
					<?php if($group_field_equipment['table_box11']): ?>
					<tr>
						<th>介護居室区分</th>
						<td><?php echo $group_field_equipment['table_box11']; ?></td>
					</tr>
					<?php endif; ?>
						
					<?php if($group_field_equipment['table_box12']): ?>
					<tr>
						<th>定員</th>
						<td><?php echo $group_field_equipment['table_box12']; ?></td>
					</tr>
					<?php endif; ?>
						
					<?php if($group_field_equipment['table_box13']): ?>
					<tr>
						<th>権利関係</th>
						<td><?php echo $group_field_equipment['table_box13']; ?></td>
					</tr>
					<?php endif; ?>
						
					<?php if($group_field_equipment['table_box14']): ?>
					<tr>
						<th>契約期間中退去</th>
						<td><?php echo $group_field_equipment['table_box14']; ?></td>
					</tr>
					<?php endif; ?>
					</table>
				</div>
				<!--  -->
			</div>
		</div>
		<!-- /アクセス・施設概要 -->
		<!-- CTA -->
		<div class="con_space cta_wrap">
			<div class="container_wrap">
				<h2 class="font_Serif text_center fontL mb30">資料請求・見学申込はこちら</h2>
				<ul class="cta_btn_list con_space_btm_narrow">
					<li><a href="#cta_area"><img src="<?php echo get_template_directory_uri(); ?>/img/cta_img01.svg" alt="資料請求"></a></li>
					<li><a href="#cta_area"><img src="<?php echo get_template_directory_uri(); ?>/img/cta_img02.svg" alt="見学申込"></a></li>
					<li><a href="#cta_area"><img src="<?php echo get_template_directory_uri(); ?>/img/cta_img04.svg" alt="お問い合わせ"></a></li>
				</ul>
				<div class="inner_box">
					<p class="font_Serif text_center fontL fc_main mb30">お電話でもお気軽に<br class="sp">お問い合わせください</p>
					<div class="tel_item">
						<a href="tel:0120784850">
							<img src="<?php echo get_template_directory_uri(); ?>/img/cta_tell.svg" alt="0120784850"></a>
						<p class="fontS">＜土・日・祝を含む9:00~17:00＞</p>
					</div>
				</div>

			</div>
		</div>
		<!-- /CTA -->
			<?php if($group_field_faq['項目_1']['質問']): ?>
		<!-- よくあるご質問 -->
		<div class="container_wrap con_space faq_wrap">
			<div class="h2_area">
				<h2 class="h2_ttl">よくあるご質問</h2>
				<p class="h2_sub_txt">FAQ</p>
			</div>

			<div class="accordion">
				<!--  -->
				<?php if($group_field_faq['項目_1']['質問']): ?>
				<div class="accordion-item">
					<h3 class="accordion-title js-accordion-title fw_bold"><span class="fontL">Q</span><span><?php echo $group_field_faq['項目_1']['質問']; ?><span></h3>
					<div class="accordion-content">
						<p><?php echo $group_field_faq['項目_1']['回答']; ?></p>
					</div>
				</div>
					<?php endif; ?>
				<!--  -->
				<?php if($group_field_faq['項目_2']['質問']): ?>
				<div class="accordion-item">
					<h3 class="accordion-title js-accordion-title fw_bold"><span class="fontL">Q</span><span><?php echo $group_field_faq['項目_2']['質問']; ?><span></h3>
					<div class="accordion-content">
						<p><?php echo $group_field_faq['項目_2']['回答']; ?></p>
					</div>
				</div>
					<?php endif; ?>
				<!--  -->
				<?php if($group_field_faq['項目_3']['質問']): ?>
				<div class="accordion-item">
					<h3 class="accordion-title js-accordion-title fw_bold"><span class="fontL">Q</span><span><?php echo $group_field_faq['項目_3']['質問']; ?><span></h3>
					<div class="accordion-content">
						<p><?php echo $group_field_faq['項目_3']['回答']; ?></p>
					</div>
				</div>
					<?php endif; ?>
				<!--  -->
				<?php if($group_field_faq['項目_4']['質問']): ?>
				<div class="accordion-item">
					<h3 class="accordion-title js-accordion-title fw_bold"><span class="fontL">Q</span><span><?php echo $group_field_faq['項目_4']['質問']; ?><span></h3>
					<div class="accordion-content">
						<p><?php echo $group_field_faq['項目_4']['回答']; ?></p>
					</div>
				</div>
					<?php endif; ?>
				<!--  -->
				<?php if($group_field_faq['項目_5']['質問']): ?>
				<div class="accordion-item">
					<h3 class="accordion-title js-accordion-title fw_bold"><span class="fontL">Q</span><span><?php echo $group_field_faq['項目_5']['質問']; ?><span></h3>
					<div class="accordion-content">
						<p><?php echo $group_field_faq['項目_5']['回答']; ?></p>
					</div>
				</div>
					<?php endif; ?>
				<!--  -->
				<?php if($group_field_faq['項目_6']['質問']): ?>
				<div class="accordion-item">
					<h3 class="accordion-title js-accordion-title fw_bold"><span class="fontL">Q</span><span><?php echo $group_field_faq['項目_6']['質問']; ?><span></h3>
					<div class="accordion-content">
						<p><?php echo $group_field_faq['項目_6']['回答']; ?></p>
					</div>
				</div>
					<?php endif; ?>
				<!--  -->
				<?php if($group_field_faq['項目_7']['質問']): ?>
				<div class="accordion-item">
					<h3 class="accordion-title js-accordion-title fw_bold"><span class="fontL">Q</span><span><?php echo $group_field_faq['項目_7']['質問']; ?><span></h3>
					<div class="accordion-content">
						<p><?php echo $group_field_faq['項目_7']['回答']; ?></p>
					</div>
				</div>
					<?php endif; ?>
				<!--  -->
				<?php if($group_field_faq['項目_8']['質問']): ?>
				<div class="accordion-item">
					<h3 class="accordion-title js-accordion-title fw_bold"><span class="fontL">Q</span><span><?php echo $group_field_faq['項目_8']['質問']; ?><span></h3>
					<div class="accordion-content">
						<p><?php echo $group_field_faq['項目_8']['回答']; ?></p>
					</div>
				</div>
					<?php endif; ?>
				<!--  -->
			</div>

		</div>
					<?php endif; ?>
		</div>
		<!-- /よくあるご質問 -->
		<!-- 近隣の老人ホーム・介護施設のご紹介 -->
		<div class="con_space bg_main2">
			<div class="container_wrap">
				<h2 class="font_Serif fc_white text_center fontL mb30">近隣の老人ホーム・介護施設のご紹介</h2>
			</div>
			
			
		
			<div class="swiper_box">
				<div class="swiper-wrapper">
<?php
$terms = get_the_terms($post->ID, 'facilitys_category');
$term_ID = [];

foreach ((array) $terms as $term):
    array_push($term_ID, $term->term_id); 
endforeach;

$args = [
    'post_type' => 'facility_field', 
    'post__not_in' => [$post->ID],
    'posts_per_page' => 8,
    'orderby' => 'rand',
    'tax_query' => [
        [
            'taxonomy' => 'facilitys_category', 
            'terms' => $term_ID,
        ],
    ],
];
$wp_query = new WP_Query($args);
if ($wp_query->have_posts()): ?>
        <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
					<div class="swiper-slide">
						<a href="<?php the_permalink(); ?>">
							<div class="img_item">
								<img src="<?php echo get_field('img_main'); ?>" alt="" />
							</div>
							<p class="fc_white fontM"><?php the_title(); ?></p>
						</a>
					</div>
        <?php endwhile; ?>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
					<?php wp_reset_query(); ?>
					
				</div>
				<div class="container_wrap  swiper_button_row">
					<div class="swiper-button-prev"></div>
					<div class="swiper-button-next"></div>
				</div>
			</div>
		</div>
		<!-- /近隣の老人ホーム・介護施設のご紹介 -->



		<!-- 資料請求・見学申込フォーム -->
		<div class="con_space form_wrap bg_gray2" id="cta_area">
			<div class="container_wrap">
				<div class="h2_area">
					<h2 class="h2_ttl">資料請求・見学申込フォーム</h2>
					<p class="h2_sub_txt">Form</p>
				</div>

					<ul class="form_tab">
						<li class="active"><img src="<?php echo get_template_directory_uri(); ?>/img/form_tab_img01.svg" alt="資料請求"></li>
						<li><img src="<?php echo get_template_directory_uri(); ?>/img/form_tab_img02.svg" alt="見学申込"></li>
						<li><img src="<?php echo get_template_directory_uri(); ?>/img/form_tab_img04.svg" alt="お問い合わせ"></li>
					</ul>
					
					<?php echo do_shortcode( '[contact-form-7 id="8904" title="資料請求"]' ); ?>
					
					<?php echo do_shortcode( '[contact-form-7 id="8915" title="見学申込"]' ); ?>
				
					<?php echo do_shortcode( '[contact-form-7 id="8917" title="お問い合わせ"]' ); ?>
					
					
			</div>
		</div>
		<!-- /資料請求・見学申込フォーム -->
		<!-- CTA -->
		<div class="con_space cta_wrap">
			<div class="container_wrap">
				<div class="inner_box">
					<p class="font_Serif text_center fontL fc_main mb30">お電話でもお気軽に<br class="sp">お問い合わせください</p>
					<div class="tel_item">
						<a href="tel:0120784850">
							<img src="<?php echo get_template_directory_uri(); ?>/img/cta_tell.svg" alt="0120784850"></a>
						<p class="fontS">＜土・日・祝を含む9:00~17:00＞</p>
					</div>
				</div>

			</div>
		</div>
		<!-- /CTA -->
	</section>
	<!---------- /con_wrap -->





		<?php get_footer('facility'); ?>
		<script src="https://www.supercourt.jp/js/area-contents-map.js?20221023-2"></script>
		<script src="https://www.supercourt.jp/js/area-contents-view-port.js?20221023-1"></script>
		<script src="https://www.supercourt.jp/js/area-contents-scroll.js?20221023-1"></script>

		<script>
			// 各地域の施設数
			jQuery(function($) {
				const $target = $('.area-contents__facility-item-num');

				if ($target) {
					$target.each((idx, elm) => {
						const num = $(elm).closest('.area-contents__facility-item').find('.area-contents__facility-item-li').length;
						if (num) {
							$(elm).text(num + '件');
						}
					});
				}
			});
		</script>
	
		
		<script type="text/javascript" src="https://www.supercourt.jp/common/js/jquery.colorbox-min.js"></script>
		<script type="text/javascript" src="https://www.supercourt.jp/common/js/jquery.bxslider.min.js"></script>
		<script src="https://ajaxzip3.github.io/ajaxzip3.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(e) {
				$('.bxslider').bxSlider({
					auto: true,
					nextSelector: '.slider-next',
					prevSelector: '.slider-prev'
				});
				$('.bx-rooms').bxSlider({
					auto: true,
					pagerCustom: '.bx-rooms-pager'
				});
				$(".feature a.modal, .facilityFloor a").colorbox({
					retinaImage: true,
					innerWidth: "90%"
				});
			});
		</script>

		
	<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
	<script>
		$(function() {
			// タイトルをクリックすると
			$(".js-accordion-title").on("click", function() {
				// クリックした次の要素を開閉
				$(this).next().slideToggle(300);
				// タイトルにopenクラスを付け外しして矢印の向きを変更
				$(this).toggleClass("open", 300);
			});
		});
	</script>
	<script>
		const swiper = new Swiper(".swiper_box", {
			loop: true,
			navigation: {
				nextEl: ".swiper-button-next",
				prevEl: ".swiper-button-prev",
			},
			slidesPerView: 1.5,
			speed: 1000,
			autoplay: {
				delay: 1000,
				disableOnInteraction: false,
			},
			centeredSlides: true,
			breakpoints: {
				// スライドの表示枚数：500px以上の場合
				500: {
					speed: 1500,
					slidesPerView: 4.5,
				}
			}
		});
	</script>
	<script>
		$(function() {
			let tabs = $(".form_tab li"); // tabのクラスを全て取得し、変数tabsに配列で定義
			$(".form_tab li").on("click", function() { // tabをクリックしたらイベント発火
				$(".active").removeClass("active"); // activeクラスを消す
				$(this).addClass("active"); // クリックした箇所にactiveクラスを追加
				const index = tabs.index(this); // クリックした箇所がタブの何番目か判定し、定数indexとして定義
				$(".form_con").removeClass("show").eq(index).addClass("show"); // showクラスを消して、contentクラスのindex番目にshowクラスを追加
			})
		})
		
		
		
		
	</script>
	<script>
		const myFunc = () => {
			const text = document.querySelector('#text');
			const other = document.querySelector('#other');

			other.addEventListener('click', (e) => {
				if (e.target.checked) {
					text.style.display = 'inline-block';

				} else {
					text.style.display = 'none';
				}
			}, false);
		};
		myFunc();
	</script>
	<script>
jQuery(function(){
   jQuery(document).on('click','#js-zip',function(){
    AjaxZip3.zip2addr('post', '', 'area', 'area');
  });
});
</script>
			
	<script>
// エラーメッセージ位置変更
$(document).on('invalid', function() { // ①
  $.ajax().always(function () { // ②
    $('.wpcf7-form-control-wrap').each(function (index, el) { // ③
      if ($(el).find('.wpcf7-not-valid-tip').length) { // ④
        $(el).find('.wpcf7-not-valid-tip').insertBefore($(el)) // ⑤
      }
    });
  });
});
</script>
<script>
  $(function(){
    $(".wpcf7-form").prepend('<input type="hidden" name="shisetsu" value="<?php the_title(); ?>">');
  });
</script>		
<script>
	//希望連絡先 分岐
	
	//きっかけ 分岐
	$(function(){
$('input[name="cue[]"][value="その他"]').change(function() {
	var prop = $(this).prop('checked');
	if(prop){
         $('.cue_etc').show().removeAttr('disabled');
      }else{
         $('.cue_etc').hide().attr('disabled','disabled');

      }
});
		});
	

</script>
<script>					
jQuery(function($){
          $.datetimepicker.setLocale('ja');
          $('.reserve-datetime').datetimepicker({
minDate: "+3d",
 allowTimes:[
  '09:30', '10:00', '11:00',
  '12:00', '13:00', '14:00', '15:00', '16:00', '17:00'
 ]
 });
	});

</script>	