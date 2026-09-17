<?php
	$posts = get_posts( array(
		'post_type' => 'topics',
		'posts_per_page' => 6,
		'tax_query' => array(
			array(
				'taxonomy' => 'topics_category',
				'field' => 'slug',
				'terms' => array( 'column' ),
			),
		),
		'date_query' => array(
			// 現在から6ヶ月前を取得
            'after'     => date("Y-m-d", strtotime("-6 month")),
            'before'    => date("Y-m-d"),
            'inclusive' => true,
		),
	) );
	$blog_shisetsu_category = get_term_by( 'slug', 'supercourt', 'topics_category' )
?>
<section class="blog-sec">
	<div class="inner">
		<h2 class="cmn-ttl"><span>COLUMN</span></h2>

		<div class="blog-sec__list-wrapper">
			<div class="blog-sec__list">
				<?php foreach( $posts as $post ) : setup_postdata( $post ); ?>
					<div class="blog-sec-item">
						<a href="<?php the_permalink(); ?>" class="blog-sec-item__link">
							<div class="blog-sec-item__pic">
								<?php if ( has_post_thumbnail() ) : ?>
									<?php the_post_thumbnail( 'medium' ); ?>
								<?php else : ?>
									<img src="<?php echo get_theme_file_uri( 'images/news-sec/noimage.png' ); ?>" alt="<?php the_title(); ?>">
								<?php endif; ?>
							</div>
							<p class="blog-sec-item__ttl"><?php the_title(); ?></p>
							<div class="blog-sec-item__footer">
								<p class="blog-sec-item__time"><?php the_time( 'Y.m.d' ); ?></p>
								<?php
									$shisetsu_cat = null;
									$cats = get_the_terms( get_the_ID(), 'topics_category' );
									foreach( $cats as $cat ) {
										while ( $cat->parent ) {
											if ( $cat->parent === $blog_shisetsu_category->term_id ) {
												$shisetsu_cat = $cat;
												break;
											}
											$cat = get_term( $cat->parent, 'topics_category' );
										}
									}
								?>
								<?php if ( $shisetsu_cat ) : ?>
									<p class="blog-sec-item__cat"><?php echo $shisetsu_cat->name; ?></p>
								<?php endif; ?>
							</div>
						</a>
					</div>
				<?php endforeach; ?>
			</div>
		</div>

		<p class="blog-sec__more">
			<a href="<?php echo get_term_link( get_term_by( 'slug', 'column', 'topics_category' ) );  ?>">コラム一覧を見る</a>
		</p>
	</div>
</section>