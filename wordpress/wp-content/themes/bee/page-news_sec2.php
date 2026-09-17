<?php
	$posts = get_posts( array(
		'post_type' => 'topics',
		'posts_per_page' => 3,
		'tax_query' => array(
			array(
				'taxonomy' => 'topics_category',
				'field' => 'slug',
				'terms' => array( 'news' ),
			),
		),
		'date_query' => array(
			// 現在から6ヶ月前を取得
            'after'     => date("Y-m-d", strtotime("-12 month")),
            'before'    => date("Y-m-d"),
            'inclusive' => true,
		),
	) );
	$index = 0;
?>
<section class="top-news">
	<div class="">
		<p class="top-news-title">TOPICS<br><span>お知らせ</span></p>

		<ul class="">
				<?php foreach( $posts as $post ) : setup_postdata( $post ); ?>
					<li class="cf" data-item=<?php echo $index++; ?>>
						<a href="<?php the_permalink(); ?>" class="">
							<!--<figure class="top-news-img">
								<?php if ( has_post_thumbnail() ) : ?>
									<?php the_post_thumbnail( 'medium' ); ?>
								<?php else : ?>
									<img src="<?php echo get_theme_file_uri( 'images/news-sec/noimage.png' ); ?>" alt="<?php the_title(); ?>">
								<?php endif; ?>
							</figure>-->
							<?php
								$cats = get_the_terms( get_the_ID(), 'topics_category' );
							?>
							<?php if ( $cats ) : ?> 
								<!--<p class=""><?php echo $cats[0]->name; ?></p>-->
							<?php endif; ?>
							<div class="top-news-textbox">
							<p class="top-news-post-date"><?php the_time( 'Y.m.d' ); ?></p>
							<p class="top-news-post-title"><?php the_title(); ?></p>
							</div>
						</a>
					</li>
				<?php endforeach; ?>
		</ul>

		<p class="top-news-link">
			<a href="<?php echo get_term_link( get_term_by( 'slug', 'news', 'topics_category' ) );  ?>">その他のお知らせはこちら</a>
		</p>
	</div>
</section>