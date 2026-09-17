<?php 
/*
Template Name: thanks
*/

get_header('facility');
?>


	<!------------------------------------------------
	     コンテンツ開始
	------------------------------------------------>

  <div class="mailform inquirys">
    <div class="pt">
        <h1><?php the_title(); ?></h1>
    </div>
    <div class="content">
      <div class="container">
      <ol class="pankuzu">
          <li><a href="/">ホーム&nbsp;</a></li>
            <li><?php the_title(); ?></li>
        </ol>
        <div class="lead">
          <?php the_content(); ?>
        </div>

      </div>
    </div>
  </div>
<?php get_footer('facility'); ?>