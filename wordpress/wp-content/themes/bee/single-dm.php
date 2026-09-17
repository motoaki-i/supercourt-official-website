<?php 
$group_field_formlink_all = get_field('formlink_all');
$group_field_formlink_request = get_field('formlink_request');
$group_field_formlink_request = get_field('formlink_inspection');
$group_field_formlink_request = get_field('formlink_inquirys');
$group_field_facilitypage = get_field('facilitypage');
$group_field_facilityblog = get_field('facilityblog');
$group_field_facilitytiktok = get_field('facilitytiktok');
$group_field_facilityinstagram = get_field('facilityinstagram');
$group_field_facilityyoutube = get_field('facilityyoutube');
$group_field_googlereview = get_field('googlereview');
$group_field_googlemap = get_field('googlemap');

get_header(); ?>

<main id="supercourt">



<style>

article.dmlpcontainer {
  width: 90%;
  max-width: 900px;
  margin: 60px auto 40px;
}

article.dmlpcontainer h1 {
  font-size: 24px;
  letter-spacing: 2px;
  color: #9f8039;
  font-weight: bold;
  border-bottom: 2px solid #9f8039;
  margin: 0 0 30px 0;
}



.spdisp {
  display: none;
}

.lplinks {
  margin: 0 0 40px 0;
}

ul.lplinkslist {
  margin: 0 0 30px 0;
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap;
}
ul.lplinkslist li {
  width: 100%;
  margin: 0;
  padding: 0;
}
ul.lplinkslist li a {
  display: block;
  width: 100%;
  position: relative;
  margin: 0 0 0 0;
  border-bottom: 1px dotted #39c;
  padding: 20px 0 20px 0;
  line-height: 1.4;
}
ul.lplinkslist li a span.snsicon {
  display: block;
  width: 30px;
  position: absolute;
  right: 0;
  top: 50%;
  transform: translateY(-50%);
}



@media (max-width: 640px) {

.spdisp {
  display: initial;
}

article.dmlpcontainer {
  margin: 70px auto 40px;
}

article.dmlpcontainer h1 {
  font-size: 18px;
  line-height: 1.6;
  margin: 0 0 10px 0;
  padding-bottom: 5px;
}



}




</style>

<body class="dmlppage" id="PAGETOP">

<ul class="pan">
			<li class="txt-en-s"><a href="<?php echo esc_url(home_url('/')); ?>">TOP</a></li>
			<li class="txt-en-s">-</li>
			<li class="txt-jp-s"><?php the_title()?></li>
</ul>


<article class="dmlpcontainer">

<div class=""><h1><?php the_title(); ?></h1></div>

<section class="lplinks">

<ul class="lplinkslist">

<?php if( get_field('formlink_all') ): ?>
<li>
<a href="<?php echo get_field('formlink_all'); ?>" target="blank">資料請求・見学申込・お問合せフォーム<span class="snsicon"><img alt="supercourt" src="https://www.supercourt.jp/images/snsicon-supercourt.webp"></span></a>
</li>
<?php endif; ?>

<?php if( get_field('formlink_request') ): ?>
<li>
<a href="<?php echo get_field('formlink_request'); ?>" target="blank">資料請求<span class="snsicon"><img alt="supercourt" src="https://www.supercourt.jp/images/snsicon-supercourt.webp"></span></a>
</li>
<?php endif; ?>

<?php if( get_field('formlink_inspection') ): ?>
<li>
<a href="<?php echo get_field('formlink_inspection'); ?>" target="blank">見学申込<span class="snsicon"><img alt="supercourt" src="https://www.supercourt.jp/images/snsicon-supercourt.webp"></span></a>
</li>
<?php endif; ?>

<?php if( get_field('formlink_inquirys') ): ?>
<li>
<a href="<?php echo get_field('formlink_inquirys'); ?>" target="blank">お問合せフォーム<span class="snsicon"><img alt="supercourt" src="https://www.supercourt.jp/images/snsicon-supercourt.webp"></span></a>
</li>
<?php endif; ?>


<li>
<a href="<?php echo get_field('facilitypage'); ?>" target="blank">施設公式ホームページ<span class="snsicon"><img alt="supercourt" src="https://www.supercourt.jp/images/snsicon-supercourt.webp"></span></a>
</li>

<li>
<a href="<?php echo get_field('facilityblog'); ?>" target="blank">施設公式ブログ<span class="snsicon"><img alt="supercourt" src="https://www.supercourt.jp/images/snsicon-supercourt.webp"></span></a>
</li>

<?php if( get_field('facilitytiktok') ): ?>
<li>
<a href="<?php echo get_field('facilitytiktok'); ?>" target="blank">施設公式&nbsp;TikTok<span class="snsicon"><img alt="TikTok" src="https://www.supercourt.jp/images/snsicon-tiktok.webp"></span></a>
</li>
<?php endif; ?>

<?php if( get_field('facilityinstagram') ): ?>
<li>
<a href="<?php echo get_field('facilityinstagram'); ?>" target="blank">施設公式&nbsp;Instagram<span class="snsicon"><img alt="Instagram" src="https://www.supercourt.jp/images/snsicon-instagram.webp"></span></a>
</li>
<?php endif; ?>

<?php if( get_field('facilityyoutube') ): ?>
<li>
<a href="<?php echo get_field('facilityyoutube'); ?>" target="blank">施設公式&nbsp;YouTube<span class="snsicon"><img alt="YouTube" src="https://www.supercourt.jp/images/snsicon-youtube.webp"></span></a>
</li>
<?php endif; ?>

<li><a href="tel:0120-746-158">お電話でのお問合せ<span class="snsicon"><img alt="フリーコール" src="https://www.supercourt.jp/images/snsicon-freecall.webp"></span></a></li>

</ul>


<ul class="lplinkslist">
<li><a href="https://www.tiktok.com/@super.court" target="blank">スーパー・コート公式&nbsp;TikTok<span class="snsicon"><img alt="TikTok" src="https://www.supercourt.jp/images/snsicon-tiktok.webp"></span></a></li>
<li><a href="https://www.instagram.com/super.court/" target="blank">スーパー・コート公式&nbsp;Instagram<br class="spdisp">「介護の教科書」<span class="snsicon"><img alt="Instagram" src="https://www.supercourt.jp/images/snsicon-instagram.webp"></span></a></li>
<li><a href="https://www.youtube.com/@user-ph6ei7ru1k" target="blank">スーパー・コート公式&nbsp;YouTube<br class="spdisp">「おもてなしの介護」<span class="snsicon"><img alt="YouTube" src="https://www.supercourt.jp/images/snsicon-youtube.webp"></span></a></li>
<li><a href="https://recruit.supercourt.co.jp/" target="blank">新卒採用サイト<span class="snsicon"><img alt="スーパー・コート公式" src="https://www.supercourt.jp/images/snsicon-supercourt.webp"></span></a></li>
<li><a href="https://career.supercourt.co.jp/" target="blank">キャリア採用サイト<span class="snsicon"><img alt="スーパー・コート公式" src="https://www.supercourt.jp/images/snsicon-supercourt.webp"></span></a></li>
</ul>

</section>

</article>


<?php get_footer(); ?>

php echo $author_twitter; ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
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