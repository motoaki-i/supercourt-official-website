<div class="sidebar-wrap">
		<!--<p class="sidebar-cate txt-jp-m txt-bold bg-orange txt-white txt-center mb1">アーカイブ</p>
    <ul class="sidebar-monthly txt-medium ">
    <?php
    $args = array(
        'type' => 'monthly', 
        'post_type' => 'topics', 
				'limit'=>12
    );
    wp_get_archives($args);
    ?>
</ul>-->
<!---->
<p class="sidebar-cate txt-jp-m txt-bold bg-orange txt-white txt-center mb1">最新の記事</p>
<?php 
            $args = array(
              'post_type' => 'topics',
              'posts_per_page' => 3
            );
            $query = new WP_Query($args); ?>
            <?php if ( $query->have_posts() ) : ?>
            <?php while ( $query->have_posts() ) : $query->the_post();?>
            <div class="sidebar_archive mb1">
                <a href="<?php the_permalink(); ?>">
                    <div class="sidebar_img">
                    <?php if(has_post_thumbnail()): ?>
                  <img class="thumbnail-image" src="<?php the_post_thumbnail_url('medium'); ?>">
                <?php endif; ?>
                  </div>
                  </a>
                  <div class="side_right">
                    <a href="<?php the_permalink(); ?>" class="right_post_ttl"><?php the_title(); ?></a>
                  </div>
            </div>
            <?php endwhile; wp_reset_postdata(); endif; ?> 
<!---->
		<p class="sidebar-cate txt-jp-m txt-bold bg-orange txt-white txt-center mt1 mb1">カテゴリー</p>
		<ul class="sidebar-categoly txt-medium">
		<li><a href="<?php echo esc_url(home_url('/topics/')); ?>">すべて</a></li>
		<?php wp_list_categories(array('title_li' => '', 'hide_empty' => false, 'exclude' => [22,25], 'taxonomy' => 'topics_category')); ?>
		</ul>
	</div>