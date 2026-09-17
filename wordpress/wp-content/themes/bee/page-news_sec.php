<?php
	$posts = get_posts( array(
		'post_type' => 'topics',
		'posts_per_page' => 6,
		'tax_query' => array(
			array(
				'taxonomy' => 'topics_category',
				'field' => 'slug',
				'terms' => array( 'news' ),
			),
		),
		'date_query' => array(
			// 現在から6ヶ月前を取得
            'after'     => date("Y-m-d", strtotime("-6 month")),
            'before'    => date("Y-m-d"),
            'inclusive' => true,
		),
	) );
	$index = 0;
?>
<section class="news-sec a">
	<div class="inner">
		<h2 class="cmn-ttl"><span>NEWS</span></h2>

		<div class="news-sec__list-wrapper">
			<div class="news-sec__list">
				<?php foreach( $posts as $post ) : setup_postdata( $post ); ?>
					<div class="news-sec-item" data-item=<?php echo $index++; ?>>
						<a href="<?php the_permalink(); ?>" class="news-sec-item__link">
							<div class="news-sec-item__pic">
								<?php if ( has_post_thumbnail() ) : ?>
									<?php the_post_thumbnail( 'medium' ); ?>
								<?php else : ?>
									<img src="<?php echo get_theme_file_uri( 'images/news-sec/noimage.png' ); ?>" alt="<?php the_title(); ?>">
								<?php endif; ?>
							</div>
							<?php
								$cats = get_the_terms( get_the_ID(), 'topics_category' );
							?>
							<?php if ( $cats ) : ?> 
								<p class="news-sec-item__cat"><?php echo $cats[0]->name; ?></p>
							<?php endif; ?>
							<p class="news-sec-item__ttl"><?php the_title(); ?></p>
							<div class="news-sec-item__footer">
								<p class="news-sec-item__time"><?php the_time( 'Y.m.d' ); ?></p>
							</div>
						</a>
					</div>
				<?php endforeach; ?>
			</div>
		</div>

		<p class="news-sec__more">
			<a href="<?php echo get_term_link( get_term_by( 'slug', 'news', 'topics_category' ) );  ?>">お知らせを見る</a>
		</p>
	</div>
</section>