<?php get_header(); ?>

<main id="about">

<div class="space-3l"></div>

<div id="wrapper" class="wrap-m">
  <div class="content_area">
    <div class="slick-slider">
      <div class="slick-item">
        <p>1枚目</p>
      </div>
      <div class="slick-item">
        <p>2枚目</p>
      </div>
      <div class="slick-item">
        <p>3枚目</p>
      </div>
      <div class="slick-item">
        <p>4枚目</p>
      </div>
      <div class="slick-item">
        <p>5枚目</p>
      </div>
      <div class="slick-item">
        <p>6枚目</p>
      </div>
      <div class="slick-item">
        <p>7枚目</p>
      </div>
    </div>
  </div>
</div>
<div class="space-3l"></div>

<div class="top-topics">
  <div class="top-pickup space-m-bottom">
    <div class="wrap-m-right">
      <div class="top-topics__slide-cont">
        <div class="slick-slider">
          <div class="slick-item">
            <p>1枚目</p>
          </div>
          <div class="slick-item">
            <p>2枚目</p>
          </div>
          <div class="slick-item">
            <p>3枚目</p>
          </div>
          <div class="slick-item">
            <p>4枚目</p>
          </div>
          <div class="slick-item">
            <p>5枚目</p>
          </div>
          <div class="slick-item">
            <p>6枚目</p>
          </div>
          <div class="slick-item">
            <p>7枚目</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="space-3l space-3l-bottom"></div>

</main>

<script>
  
  $(function(){
    $('.slick-slider').slick({
    infinite: false,
    slidesToShow: 3,
    slidesToScroll: 1,
  });
  });
</script>

<?php get_footer(); ?>