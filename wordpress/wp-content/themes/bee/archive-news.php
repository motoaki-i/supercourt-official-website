<?php get_header(); ?>
<main id="news">

<div class="lower-mv">
  <figure class="lower-mv-image">
    <img src="<?php bloginfo('template_directory');?>/assets/image/cms/mv.jpg" alt="">
  </figure>
  <div class="ttl-lower-wrap">
    <p class="ttl-lower-up ttl-en-2l txt-white txt-black en-upper">news</p>
    <h1 class="ttl-lower txt-white bg-black">新着情報</h1>
  </div>
</div>

<?php if ( is_post_type_archive( 'news' ) || is_search() ) : ?>
                <ul class="pan">
                  <li class="txt-en-s"><a href="<?php echo esc_url(home_url('/')); ?>">TOP</a></li>
                  <li class="txt-en-s">-</li>
                  <li class="txt-jp-s">新着情報</li>
                </ul>
              <?php elseif ( is_tax( 'news_category' ) ) : ?>
                <ul class="pan">
                  <li class="txt-en-s"><a href="<?php echo esc_url(home_url('/')); ?>">TOP</a></li>
                  <li class="txt-en-s">-</li>
                  <li class="txt-jp-s"><a href="<?php echo esc_url(home_url('/news/')); ?>">新着情報</a></li>
                  <li class="txt-en-s">-</li>
                  <li class="txt-jp-s"><?php echo get_queried_object()->name; ?></li>
                </ul>
              <?php endif; ?>

  <div class="topics-wrap wrap-m">

    <div class="topics-main">

          <div class="space-s"></div>

			  	  <?php while ( have_posts() ) : the_post(); ?>

            <article>
              <a  class="content-wrap grid align-center" href="<?php the_permalink(); ?>">
                  <ol class="flex g1 align-center">
                    <p class="txt-en information__date"><?php the_time( 'Y.m.d' ); ?></p>
                    <?php
                      $cats = get_the_terms( get_the_ID(), 'news_category' );
                    ?>
                    <?php if ( $cats ) : ?> 
                      <button class="pi-half bg-orange txt-white txt-medium"><?php echo $cats[0]->name; ?></button>
                    <?php endif; ?>
                  </ol>
                  <h2 class="txt-jp-l txt-bold"><?php the_title(); ?></h2>
              </a>
            </article>
            <hr>
            

				    <?php endwhile; ?>

    </div>

    <div class="topics-sidebar space-s">
        <?php get_template_part('sidebar-news'); ?>
    </div>

  </div>

          <div class="pagination pagination_02 wrap-m space-m-bottom space-3s">
            <?php
              the_posts_pagination(
                array(
                    'mid_size'      => 1, // 現在ページの左右に表示するページ番号の数
                    'prev_next'     => true, // 「前へ」「次へ」のリンクを表示する場合はtrue
                    'prev_text'     => __( '<'), // 「前へ」リンクのテキスト
                    'next_text'     => __( '>'), // 「次へ」リンクのテキスト
                    'type'          => 'list', // 戻り値の指定 (plain/list)
                    'screen_reader_text' => ' ',
                )
              );
            ?>
          </div>
    

  
      
</main>	  
<?php get_footer(); ?>