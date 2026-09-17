
	<div class="sidebar-wrap">
		<p class="sidebar-cate txt-jp-m txt-bold bg-orange txt-white txt-center mb1">アーカイブ</p>
    <ul class="sidebar-monthly txt-medium ">
    <?php
    $args = array(
        'type' => 'monthly', 
        'post_type' => 'news',
				'limit'=>12
    );
    wp_get_archives($args);
    ?>
</ul>
		<p class="sidebar-cate txt-jp-m txt-bold bg-orange txt-white txt-center mt1 mb1">カテゴリー</p>
		<ul class="sidebar-categoly txt-medium">
		<li><a href="<?php echo esc_url(home_url('/news/')); ?>">すべて</a></li>
		<?php wp_list_categories(array(
			'title_li' => '',
			'hide_empty' => true,
			'exclude' => [22],
			'taxonomy' => 'news_category'
			)); ?>
		</ul>
	</div>


