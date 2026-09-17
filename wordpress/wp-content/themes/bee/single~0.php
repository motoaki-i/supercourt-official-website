<?php set_views_count( get_the_ID() ); ?>
<?php get_header(); ?>

<?php if (have_posts()) : the_post(); ?>
   <!-- InstanceBeginEditable name="contents" -->
<div class="approach--common hospitality hospitality__detail topics-single" id="facility-top">
   <div class="hospitality__inner">
      <div class="container">
         <div class="wrap">
         <div class="pt">
            <p class="topics-single__ttl">新着情報</p>
         </div>
         <ol class="pankuzu">
            <li><a href="/">ホーム&nbsp;</a></li>
            <li><a href="<?php echo home_url('topics/'); ?>">新着情報&nbsp;</a></li>
            <li class="breadcrumbs__title"><?php the_title(); ?></li>
         </ol>
         <!-- <form class="search__wrapper" action="">
            <input class="search_input" type="text" name="post_type" value="">
            <i class="fa fa-search"></i>
         </form> -->
         <div class="content ">
            <ol class="information_wrapper">
               <?php
                  $cats = get_the_terms( get_the_ID(), 'topics_category' );
               ?>
               <?php if ( $cats ) : ?> 
                  <button class="information__button"><?php echo $cats[0]->name; ?></button>
               <?php endif; ?>
               <p class=" information__date"><?php the_time( 'Y.m.d' ); ?></p>
            </ol>
               <div class="row">
                  <div class="row" style="padding-top: 16px;">
                     <h1 class="column--details--title"><?php the_title(); ?></h1>
                  </div>
               </div>
               <div class="topics-single__eyecatch">
                  <?php
                  if ( $cats && !is_wp_error($cats) && has_post_thumbnail()) :
                     if ( $cats[0]->slug !== 'news' ) : ?>
                        <img src="<?php echo get_the_post_thumbnail_url(null, 'full'); ?>" alt="<?php the_title_attribute(); ?>">
                     <?php elseif ( get_field('詳細ページへのアイキャッチ画像を表示する') ) : ?>
                        <img src="<?php echo get_the_post_thumbnail_url(null, 'full'); ?>" alt="<?php the_title_attribute(); ?>">
                     <?php
                     endif;
                  endif;
                  ?>
               </div>
            <div class="topics-content">
               <?php the_content(); ?>
            </div>

            <div class="share_article">
               <div class="share--text">Share this article</div>
               <div class="dashed">
               <img src="<?php echo get_theme_file_uri('images/topics/Line 309.png'); ?>" alt="">
               </div>
               <div class=" icons">
                  <a target="_blank" href="https://twitter.com/share?url=<?php echo get_permalink(); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                  <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink(); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                  <a target="_blank" href="https://social-plugins.line.me/lineit/share?url=<?php echo get_permalink(); ?>"><img class="fa-line" src="<?php echo get_theme_file_uri('images/topics/icons8-line.svg'); ?>" alt=""></a>
               </div>
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

            <div class="row backToList ">
               <div class="col_4 backToList__btn__left">
                  <?php if (get_previous_post()):?>
                     <i class="fa fa-angle-left"></i>
                     <?php previous_post_link('%link'); ?>
                  <?php endif; ?>
               </div>
               <div class="col_3 backToList__btn"><a href="<?php echo home_url('topics/'); ?>">一覧へ戻る</a></div>
               <div class="col_4 backToList__btn__right">
                  <?php if (get_next_post()):?>
                     <?php next_post_link('%link'); ?>
                     <i class="fa fa-angle-right"></i>
                  <?php endif; ?>
               </div>
            </div>
         </div>

         <?php
            $cats = get_the_terms( get_the_ID(), 'topics_category' );
            $the_query = null;
            if ( $cats ) {
               foreach ( $cats as $cat ) {
                  $category_name .= $cat->slug . ',';
               }
               $args = array(
                  'post_type' 		=> 'topics',
                  'posts_per_page'	=> 3,
                  'category_name' 	=> $category_name
               );
               $the_query = new WP_Query( $args );
            }
         ?>
         <?php if ( $the_query && $the_query->have_posts() ) : ?> 
         <div class="topics-related">
            <p class="h1__title2">関連記事</p>
            <div class="inner header__list">
               <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
               <div class="col_2_8 list">
                  <a href="<?php the_permalink(); ?>">
                     <?php if ( has_post_thumbnail() ) : ?>
                        <?php the_post_thumbnail(); ?>
                     <?php else : ?>
                        <img src="<?php echo get_theme_file_uri('images/topics/noimage.png'); ?>" alt="<?php the_title(); ?>">
                     <?php endif; ?>
                     <p class="sidebar--ttl"><?php the_title(); ?></p>
                     <p class="sidebar--date"><?php the_time( 'Y.m.d' ); ?></p>
                  </a>
               </div>
               <?php endwhile; ?>
            </div>
         </div>
         <?php endif; ?>
         </div>

         <?php get_template_part('sidebar-topics'); ?>

      </div>


   </div>

   <!-- <?php include(dirname(__FILE__).'../../../../../_p-contact.php'); ?> -->

</div>

<?php endif; ?>
<?php get_footer(); ?>