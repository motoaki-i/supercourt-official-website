<?php set_views_count( get_the_ID() ); ?>
<?php get_header(); ?>
<main id="topics">

<?php if (have_posts()) : the_post(); ?>
  
   

<div class="lower-mv">
  <figure class="lower-mv-image">
    <img src="<?php bloginfo('template_directory');?>/assets/image/cms/mv.jpg" alt="">
  </figure>
  <div class="ttl-lower-wrap">
    <p class="ttl-lower-up ttl-en-2l txt-white txt-black en-upper">column</p>
    <p class="ttl-lower txt-white bg-black">コラム</p>
  </div>
</div>

         <ul class="pan">
            <li class="txt-en-s"><a href="<?php echo esc_url(home_url('/')); ?>">TOP</a></li>
            <li>-</li>
            <li class="txt-jp-s"><a href="<?php echo esc_url(home_url('/topics/')); ?>">コラム</a></li>
            <li>-</li>
            <li class="txt-jp-s"><?php the_title()?></li>
         </ul>
        
      <div class="topics-wrap wrap-m space-m space-m-bottom">

         <div class="topics-main">

            <ol class="flex g1">
               <?php
                  $cats = get_the_terms( get_the_ID(), 'topics_category' );
               ?>
               <?php if ( $cats ) : ?> 
                  <button class="pi-half  bg-orange txt-white txt-medium"><?php echo $cats[0]->name; ?></button>
               <?php endif; ?>
				<p class="topics_date flex">
               <span>公開日:<time class="txt-en information__date" itemprop="datePublished" datetime="<?php the_time('Y.m.d');?>"><?php the_time('Y.m.d');?></time></span>
			 <span>更新日:<time class="txt-en information__date" itemprop="dateModified" datetime="<?php the_modified_date('Y.m.d');?>"><?php the_modified_date('Y.m.d'); ?></time></span>
               </p>         
            </ol>

               <div class="mt1 mb1">
                  <h1 class="post-ttl ttl-jp-2l txt-bold"><?php the_title(); ?></h1>
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
              






            <div class="space-s"></div>
                  <p class="related-ttl mb2 txt-white bg-orange txt-bold">関連記事</p>
                  <?php
                     if (function_exists('yarpp_related')) {
                        yarpp_related();
                  }?> 
               
            </div>

            <div class="space-s"><?php echo do_shortcode('[sc name="supervision"][/sc]'); ?></div>
                
                  


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
                  </div>

               </div>

            <?php endif; ?>

            
               
               <p class="space-3s"><a class="archive-btn  bg-orange-gradiate txt-white txt-center" href="<?php echo home_url('topics/'); ?>">一覧へ戻る</a></p>
               <div class="space-m-bottom sp-only"></div>
            
         </div>
         

         <div class="topics-sidebar">
           <?php get_template_part('sidebar-topics'); ?>
         </div>

   
      </div>

<?php endif; ?>
</main>
<?php get_footer(); ?>