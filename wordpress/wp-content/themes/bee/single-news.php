<?php set_views_count( get_the_ID() ); ?>
<?php get_header(); ?>
<main id="news">

<?php if (have_posts()) : the_post(); ?>
   
<div class="lower-mv">
  <figure class="lower-mv-image">
    <img src="<?php bloginfo('template_directory');?>/assets/image/cms/mv.jpg" alt="">
  </figure>
  <div class="ttl-lower-wrap">
    <p class="ttl-lower-up ttl-en-2l txt-white txt-black en-upper">news</p>
    <h1 class="ttl-lower txt-white bg-black">お知らせ</h1>
  </div>
</div>

<ul class="pan">
            <li class="txt-en-s"><a href="<?php echo esc_url(home_url('/')); ?>">TOP</a></li>
            <li>-</li>
            <li class="txt-jp-s"><a href="<?php echo esc_url(home_url('/news/')); ?>">お知らせ</a></li>
            <li>-</li>
            <li class="txt-jp-s"><?php the_title()?></li>
</ul>

<div class="topics-wrap wrap-m space-m space-m-bottom">


         <div class="topics-main">

            <ol class="flex g1">
               <?php
                  $cats = get_the_terms( get_the_ID(), 'news_category' );
               ?>
               <?php if ( $cats ) : ?> 
                  <button class="pi-half  bg-orange txt-white txt-medium"><?php echo $cats[0]->name; ?></button>
               <?php endif; ?>
         
                     <time class="txt-en information__date" itemprop="datePublished" datetime="<?php the_time('Y.m.d');?>"><?php the_time('Y.m.d');?></time>
            </ol>

            <div class="mt1 mb1">
                  <h2 class="post-ttl ttl-jp-2l txt-bold"><?php the_title(); ?></h2>
            </div>

            <div class="topics-content">
               <?php the_content(); ?>
               <div class="space-s"></div>
               
            </div>
            
            <?php
               $authors = get_the_terms( get_the_ID(), 'author_category' );
            ?>
            <?php if ( $authors ) : ?>
               <?php
                  $term = $authors[0];
                  $term_id 		= $term->term_id;
                  $author_name 	= $term->name;
                  $author_slug 	= $term->slug;
                  $author_img 	= get_field( '画像', 'author_category_' . $term_id );
                  $author_txt 	= get_field( '自己紹介', 'author_category_' . $term_id );
                  $author_sns 	= get_field( 'sns', 'author_category_' . $term_id );
               ?>
               <div class="row">
                  <h4 class="article__writer">この記事を書いた人</h4>
               </div>
               
               <div class="row internal_link writer__profile">

                  <div class="col_4 writer__image">
                     <?php if ( $author_img ) : ?>
                        <img src="<?php echo $author_img['sizes']['large']; ?>" alt="'<?php echo $author_name; ?>">
                     <?php else : ?>
                        <img src="<?php echo get_theme_file_uri( 'images/topics/author_noimage.png' ); ?>" alt="">
                     <?php endif; ?>
                  </div>

                  <div class="col_8 flex">
                  <div class="writer__information">
                     <p class="writers__name"><?php echo $author_name; ?></p>
                     <p><?php echo $author_txt; ?></p>
                  </div>
                  <?php if( $author_sns[ 'twitter' ] || $author_sns[ 'facebook' ] || $author_sns[ 'instagram' ] ) : ?>
                     <?php 
                        $author_twitter 	= $author_sns[ 'twitter' ];
                        $author_facebook 	= $author_sns[ 'facebook' ];
                        $author_instagram 	= $author_sns[ 'instagram' ];
                     ?>
                     <div class="writer icons">
                        <?php if( $author_twitter ) : ?>
                           <a target="_blank" href="<?php echo $author_twitter; ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <?php endif; ?>
                        <?php if ( $author_facebook ) : ?>
                           <a target="_blank" href="<?php echo $author_facebook; ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <?php endif; ?>
                        <?php if ( $author_instagram ) : ?>
                           <a target="_blank" href="<?php echo $author_instagram; ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        <?php endif; ?>
                     </div>
                  <?php endif; ?>
                  </div>
               </div>
            <?php endif; ?>

         
            <p class="space-3s"><a class="archive-btn  bg-orange-gradiate txt-white txt-center" href="<?php echo home_url('news/'); ?>">一覧へ戻る</a></p>
            <div class="space-m-bottom sp-only"></div>
         </div>

         <div class="topics-sidebar">
            <?php get_template_part('sidebar-news'); ?>
         </div>

</div>

<?php endif; ?>
</main>
<?php get_footer(); ?>