<?php get_header(); ?>

<main id="download">

<div class="lower-mv">
  <figure class="lower-mv-image">
    <img src="<?php bloginfo('template_directory');?>/assets/image/about/mv.jpg" alt="">
  </figure>
  <div class="ttl-lower-wrap">
    <p class="ttl-lower-up ttl-en-2l txt-white txt-black en-upper">donwload</p>
    <h1 class="ttl-lower txt-white bg-black"><?php the_title()?></h1>
  </div>
</div>

<ul class="pan">
    <li class="txt-en-s"><a href="<?php echo esc_url(home_url('/')); ?>">TOP</a></li>
    <li class="txt-en-s">-</li>
    <li class="txt-jp-s"><?php the_title()?></li>
</ul>


</main>

<?php get_footer(); ?>