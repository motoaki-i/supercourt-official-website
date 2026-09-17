<?php get_header(); ?>
<main id="column">

<div class="lower-mv">
  <figure class="lower-mv-image">
    <img src="<?php bloginfo('template_directory');?>/assets/image/cms/mv.jpg" alt="">
  </figure>
  <div class="ttl-lower-wrap">
    <p class="ttl-lower-up ttl-en-2l txt-white txt-black en-upper">column</p>
    <h1 class="ttl-lower txt-white bg-black">コラム</h1>
  </div>
</div>

<?php if ( is_post_type_archive( 'topics' ) || is_search() ) : ?>
                <ul class="pan">
                  <li class="txt-en-s"><a href="<?php echo esc_url(home_url('/')); ?>">TOP</a></li>
                  <li class="txt-en-s">-</li>
                  <li class="txt-jp-s">コラム</li>
                </ul>
              <?php elseif ( is_tax( 'topics_category' ) ) : ?>
                <ul class="pan">
                  <li class="txt-en-s"><a href="<?php echo esc_url(home_url('/')); ?>">TOP</a></li>
                  <li class="txt-en-s">-</li>
                  <li class="txt-jp-s"><?php echo get_queried_object()->name; ?></li>
                </ul>
              <?php endif; ?>

<div class="topics-wrap wrap-m">

    <div class="topics-main">

              
          
        <div class="space-s"></div>

			  	  <?php while ( have_posts() ) : the_post(); ?>

            <article>
              <a  class="content-wrap grid" href="<?php the_permalink(); ?>">

                <figure>
                      <?php if ( has_post_thumbnail() ) : ?>
                        <?php the_post_thumbnail(); ?>
                      <?php else : ?>
                        <img src="<?php echo get_theme_file_uri('/assets/image/cms/noimage.png'); ?>" alt="<?php the_title(); ?>">
                      <?php endif; ?>
                </figure>

                <div>
                  <ol class="flex g1  mb1">
                    <?php
                      $cats = get_the_terms( get_the_ID(), 'topics_category' );
                    ?>
                    <?php if ( $cats ) : ?> 
                      <button class="pi-half bg-orange txt-white txt-medium"><?php echo $cats[0]->name; ?></button>
                    <?php endif; ?>
                    <p class="txt-en information__date"><?php the_time( 'Y.m.d' ); ?></p>
                  </ol>
                  <h2 class="txt-jp-l txt-bold mb-half"><?php the_title(); ?></h2>
                  <p><?php the_excerpt(); ?></p>
                </div>
              </a>
            </article>
            <hr>
            

				    <?php endwhile; ?>

        </div>

            <div class="topics-sidebar space-s">
            <?php get_template_part('sidebar'); ?>
            </div>

        </div>

          <div class="pagination pagination_02 wrap-m space-3l-bottom space-m">
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